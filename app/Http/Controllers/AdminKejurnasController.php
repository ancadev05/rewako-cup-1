<?php

namespace App\Http\Controllers;

use App\Models\Atlet;
use Illuminate\Http\Request;

class AdminKejurnasController extends Controller
{
    public function index(){
        return view('admin-kejurnas.dashboard');
    }

    public function atlet(){
        $atlet = Atlet::get();
        return view('official-kejurnas.atlet.index')->with('atlet', $atlet);
    }
}
