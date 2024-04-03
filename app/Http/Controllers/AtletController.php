<?php

namespace App\Http\Controllers;

use App\Models\Atlet;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AtletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // menentukan username
        $username = Auth::user()->username;

        // akun user
        $user = User::where('username', $username)->get()->first();

        // menentukan nama kontingen
        $kontingen = DB::table('kontingens')->where('id_username_official', $username)->get()[0];

        // menampilkan daftar atlet sesuai kontingen/username
        $atlet = Atlet::where('id_username_official', $username)->orderBy('seni', 'asc')->paginate();

        // status pembayaran invoice
        $invoice = Invoice::where('id_username_official', $username)->get()->first();

        return view('official-kejurnas.atlet.index')
            ->with('user', $user)
            ->with('atlet', $atlet)
            ->with('kontingen', $kontingen)
            ->with('invoice', $invoice);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('official-kejurnas.atlet.atlet-tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // nama username official
        $username = Auth::user()->username;

        // nama koontingen
        $kontingen = DB::table('kontingens')->where('id_username_official', $username)->get()[0];

        $request->validate(
            [
                'nama_atlet' => 'required',
                'tempat_lahir' => 'required',
                'tgl_lahir' => 'required',
                'jk' => 'required',
                'golongan' =>  'required',
                'foto_atlet' => 'required|file|image|mimes:jpg,jpeg,png,JPG,JPEG,PNG|max:2048'
            ],
            [
                'nama_atlet' => 'wajib diisi*',
                'tempat_lahir' => 'wajib diisi*',
                'tgl_lahir' => 'wajib diisi*',
                'golongan' => 'wajib diisi*',
                'foto_atlet:required' => 'wajib diisi*',
                'foto_atlet:mimes' => 'format file tidak sesuai',
                'foto_atlet:image' => 'file tidak sesuai'
            ]
        );

        // pengisian kolom bantu
        $golongan = ambilHurufAwal($request->golongan);
        $jk = $request->jk;
        $kelas = $request->kelas_tanding;
        $seni = ambilHurufAwal($request->seni);

        $kTanding = $request->kelas_tanding == '-' ? '0' : 'T';
        $kSeni = $request->seni == '-' ? '0' : 'S';

        $bantu = $golongan . '/' . $jk . '/' . $kTanding . '.' . $kSeni . '/' . $kelas . '.' . $seni;
        // golongan/jk/tanding-seni/kelas-kategori


        // Jika user upload foto
        $foto = false;
        if ($request->hasFile('foto_atlet')) {
            // Validasi gambar
            $foto_file = $request->file('foto_atlet'); // mengambil file dari form
            $foto = date('ymdhis') . '.' . $foto_file->getClientOriginalExtension(); // meriname file, antisipasi nama file double
            $foto_file->storeAs('public/foto-atlet/', $foto); // memindahkan file ke folder public agar bisa diakses
        }

        $atlet = [
            'nama_atlet' => strtoupper($request->nama_atlet),
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'jk' => $request->jk,
            'id_username_official' => $username,
            'kontingen' => $kontingen->nama_kontingen,
            'bantu' => $bantu,
            'bantu_tanding' => $kTanding,
            'bantu_seni' => $kSeni,
            'golongan' => $request->golongan,
            'kelas_tanding' => $request->kelas_tanding,
            'seni' => $request->seni,
            'foto_atlet' => $foto,
        ];

        Atlet::create($atlet);

        return redirect()->to('official/atlet')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $atlet = Atlet::where('id', $id)->first();

        return view('official-kejurnas.atlet.atlet-show')->with('atlet', $atlet);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $atlet = Atlet::where('id', $id)->first();

        return view('official-kejurnas.atlet.atlet-edit')->with('atlet', $atlet);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'nama_atlet' => 'required',
                'tempat_lahir' => 'required',
                'tgl_lahir' => 'required',
                'jk' => 'required',
                'golongan' =>  'required',
                'foto_atlet' => 'required|file|image|mimes:jpg,jpeg,png,JPG,JPEG,PNG|max:2048'
            ],
            [
                'nama_atlet' => 'wajib diisi*',
                'tempat_lahir' => 'wajib diisi*',
                'tgl_lahir' => 'wajib diisi*',
                'golongan' => 'wajib diisi*',
                'foto_atlet:required' => 'wajib diisi*',
                'foto_atlet:mimes' => 'format file tidak sesuai',
                'foto_atlet:image' => 'file tidak sesuai'
            ]
        );

        // pengisian kolom bantu
        $golongan = ambilHurufAwal($request->golongan);
        $jk = $request->jk;
        $kelas = $request->kelas_tanding;
        $seni = ambilHurufAwal($request->seni);

        $kTanding = $request->kelas_tanding == '-' ? '0' : 'T';
        $kSeni = $request->seni == '-' ? '0' : 'S';

        $bantu = $golongan . '/' . $jk . '/' . $kTanding . '.' . $kSeni . '/' . $kelas . '.' . $seni;
        // golongan/jk/tanding-seni/kelas-kategori

        // validasi foto
        $foto = false;
        // Jika user upload foto
        if ($request->hasFile('foto_atlet')) {

            // Validasi gambar
            $foto_file = $request->file('foto_atlet'); // mengambil file dari form
            $foto = date('ymdhis') . '.' . $foto_file->getClientOriginalExtension(); // meriname file, antisipasi nama file double
            $foto_file->storeAs('public/foto-atlet/', $foto); // memindahkan file ke folder public agar bisa diakses

            // hapus file lama
            Storage::delete('public/foto-atlet/' . $request->foto_atlet_lama);

            $atlet['foto_atlet'] = $foto;
            Atlet::where('id', $id)->update($atlet);
        } else {
            $atlet['foto_atlet'] = $request->foto_atlet_lama;
        }

        $atlet = [
            'nama_atlet' => strtoupper($request->nama_atlet),
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'jk' => $request->jk,
            'bantu' => $bantu,
            'bantu_tanding' => $kTanding,
            'bantu_seni' => $kSeni,
            'golongan' => $request->golongan,
            'kelas_tanding' => $request->kelas_tanding,
            'seni' => $request->seni,
            'foto_atlet' => $foto,
        ];

        Atlet::where('id', $id)->update($atlet);

        return redirect()->to('official/atlet')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // menghapus juga filnye //
        // cari file fotonya
        $cariFoto = Atlet::where('id', $id)->first();

        // hapus file lama
        Storage::delete('public/foto-atlet/' . $cariFoto->foto_atlet);

        Atlet::where('id', $id)->delete();

        return redirect()->to('official/atlet')->with('success', 'Data berhasil dihapus');
    }
}
