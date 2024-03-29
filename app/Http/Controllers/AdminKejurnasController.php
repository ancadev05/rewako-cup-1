<?php

namespace App\Http\Controllers;

use App\Models\Atlet;
use App\Models\Kontingen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminKejurnasController extends Controller
{
    public function index()
    {

        $atlet = Atlet::get()->count();
        $kontingen = Kontingen::get()->count();
        $jkpa = DB::table('atlets')->where('jk', 'PA')->get()->count();

        return view('admin-kejurnas.dashboard')
            ->with('atlet', $atlet)
            ->with('kontingen', $kontingen)
            ->with('jk',$jkpa);
    }

    public function atlet()
    {
        $atlet = Atlet::get();
        return view('official-kejurnas.atlet.index')->with('atlet', $atlet);
    }
}
