<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = User::get();
        return view('admin-kejurnas.user')->with('user', $user);
    }

    public function tambah()
    {
        return view('admin-kejurnas.user-tambah');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required'
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

        return redirect()->to('admin-kejurnas/user')->with('success', 'Data berhasil ditambahkan');
    }
}
