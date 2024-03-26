<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function official()
    {
        return view('/official');
    }

    public function adminkejurnas()
    {
        return view('admin-kejurnas');
    }
}
