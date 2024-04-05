<?php

namespace App\Http\Controllers;

use App\Models\Atlet;
use App\Models\Invoice;
use App\Models\Kontingen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $user = User::get();
        $kontingen = Kontingen::get();

        return view('admin-kejurnas.user')
            ->with('user', $user)
            ->with('kontingen', $kontingen);
    }

    public function tambah()
    {
        return view('admin-kejurnas.user-tambah');
    }

    // membuat akun user
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'no_wa' => 'required'
            ]
        );

        $userpass = 'rwk-' . date('ndhis');

        $user = [
            'name' => $request->name,
            'no_wa' => $request->no_wa,
            'level' => 'official',
            'username' => $userpass,
            'password' => $userpass,
        ];

        $kontingen = [
            'nama_kontingen' => $request->kontingen,
            'alamat' => $request->alamat,
            'id_username_official' => $userpass
        ];

        $invoice = [
            'id_username_official' => $userpass,
            'nama_official' => $request->name,
            'id_kontingen' => $request->kontingen,
            'pembayaran' => 0
        ];

        User::create($user);
        Kontingen::create($kontingen);
        Invoice::create($invoice);

        return redirect()->to('admin-kejurnas/user')->with('success', 'Data berhasil ditambahkan');
    }

    // menampilkan halaman setting user di bagian official
    public function setting($username)
    {
        $official = User::where('username', $username)->get()->first();
        $kontingen = Kontingen::where('id_username_official', $username)->get()->first();
        return view('official-kejurnas.official-setting')
            ->with('official', $official)
            ->with('kontingen', $kontingen);
    }

    // pengeditan akun user
    public function update(Request $request, string $username)
    {

        $request->validate(
            [
                'name' => 'required',
                'no_wa' => 'required'
            ]
        );

        $user = [
            'name' => $request->name,
            'no_wa' => $request->no_wa,
            'foto_official' => $request->foto_official
        ];

        $kontingen = [
            'nama_kontingen' => $request->kontingen,
            'alamat' => $request->alamat,
        ];

        $atlet = [
            'kontingen' => $request->kontingen
        ];

        // Jika user upload foto
        if ($request->hasFile('foto_official')) {
            // Validasi gambar
            $foto_file = $request->file('foto_official'); // mengambil file dari form
            $foto = date('ymdhis') . '.' . $foto_file->getClientOriginalExtension(); // meriname file, antisipasi nama file double
            $foto_file->storeAs('public/foto-official/', $foto); // memindahkan file ke folder public agar bisa diakses

            // hapus file lama
            Storage::delete('public/foto-official/' . $request->foto_official_lama);

            $user['foto_official'] = $foto;
            User::where('username', $username)->update($user);
        } else {
            $user['foto_official'] = $request->foto_official_lama;
        }

        User::where('username', $username)->update($user);
        Kontingen::where('id_username_official', $username)->update($kontingen);
        Atlet::where('id_username_official', $username)->update($atlet);

        $official = User::where('username', $username)->get()->first();
        $kontingen = Kontingen::where('id_username_official', $username)->get()->first();
        // return redirect()->to('admin-kejurnas/user')->with('success', 'Data berhasil ditambahkan');


        // return view('official-kejurnas.official-setting')
        return redirect()->to('/official/setting/' . $username)
            ->with('official', $official)
            ->with('kontingen', $kontingen)
            ->with('success', 'Data berhasil diubah');
    }
}
