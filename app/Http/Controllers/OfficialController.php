<?php

namespace App\Http\Controllers;

use App\Models\Atlet;
use App\Models\Invoice;
use App\Models\Kontingen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\ViewController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OfficialController extends Controller
{
    public function index()
    {
        // username official
        $username = Auth::user()->username;

        $official = User::where('username', $username)->first();

        // nama kontingen
        $kontingen = Kontingen::where('id_username_official', $username)->first();

        // mencari nama atlet
        $atlet = Atlet::where('id_username_official', $username)->get()->count();

        // status pembayaran kontingen bersangkutan
        $invoice = Invoice::where('id_username_official', $username)->get()->first();

        return view('official-kejurnas.dashboard')
            ->with('official', $official)
            ->with('kontingen', $kontingen)
            ->with('atlet', $atlet)
            ->with('invoice', $invoice);
    }

    public function download()
    {
        $username = Auth::user()->username; // nama user sesuai username yang login
        $invoice = Invoice::where('id_username_official', $username)->get()->first();
        // dd($invoice->pembayaran);
        return view('official-kejurnas.download-berkas.index')->with('invoice', $invoice);
    }
}
