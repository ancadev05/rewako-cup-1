<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    public function index()
    {
        return view('official-kejurnas.login');
    }

    public function login(Request $request)
    {
        // validasi username dan password
        $request->validate(
            [
                'username' => 'required',
                'password' => 'required'
            ],
            [
                'username.required' => 'username wajib diisi',
                'password.required' => 'password wajib diisi'
            ]
        );

        // menampung isi username dan password
        $infologin = [
            'username' => $request->username,
            'password' => $request->password
        ];

        //  proses pengecekan jika email dan password terdaftar
        if (Auth::attempt($infologin)) {
            // mengalahkan kehalaman sesuai level username
            if (Auth::user()->level == 'official') {
                return redirect('/official');
            } elseif(Auth::user()->level == 'admin-kejurnas'){
                return redirect('/admin-kejurnas');
            }
        } else {
            return redirect('/rewako-cup')->withErrors('username dan password tidak sesuai')->withInput();
        }
    }

    // function logout
    public function logout()
    {
        Auth::logout();
        return redirect('/rewako-cup');
    }
}
