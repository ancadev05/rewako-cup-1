<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
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

        $invoice = [
            'id_username_official' => strtoupper($userpass),
            'nama_official' => $request->name,
            'pembayaran' => 0
        ];

        User::create($user);
        Kontingen::create($kontingen);
        Invoice::create($invoice);

        return redirect()->to('admin-kejurnas/user')->with('success', 'Data berhasil ditambahkan');
    }
}
