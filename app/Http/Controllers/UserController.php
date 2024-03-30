<?php

namespace App\Http\Controllers;

use App\Models\Kontingen;
use App\Models\User;
use Illuminate\Http\Request;

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

        // dd($userpass);

        User::create($user);
        Kontingen::create($kontingen);

        return redirect()->to('admin-kejurnas/user')->with('success', 'Data berhasil ditambahkan');
    }

    public function registrasi(Request $request)
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
            'alamat' => $request->alamat,
            'kontingen' => $request->kontingen,
            'level' => 'official',
            'username' => 'rwk-' . date('ndhis'),
            'password' => 'rwk-' . date('ndhis'),
        ];

        User::create($user);

        dd('oko');

        // return redirect()->to('/login');
    }
}
