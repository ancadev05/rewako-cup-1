<?php

namespace App\Http\Controllers;

use App\Models\Atlet;
use App\Models\Invoice;
use Illuminate\Http\Request;

class DownloadBerkasController extends Controller
{
    public function index()
    {
        $invoice = Invoice::get();
        return view('official-kejurnas.download-berkas.index')->with('invoice', $invoice);
    }

    public function kwitansi()
    {
        $atlet = Atlet::get();

        // jumlah atlet
        $aTanding = 10;
        $aTunggal = 5;
        $aGanda = 4;
        $aTrio = 3;

        // biaya pendaftaran atlet
        $kTanding = 250000;
        $kTunggal = 250000;
        $kGanda = 225000;
        $kTrio = 200000;

        // jumlah biaya
        $jumlah = ($kTanding * $aTanding) + ($kTunggal * $aTunggal) + ($kGanda * $aGanda) + ($kTrio * $aTrio);

        $data = [
            [
                'aTanding' => $aTanding,
                'aTunggal' => $aTunggal,
                'aGanda' => $aGanda,
                'aTrio' => $aTrio
            ],
            [
                'kTanding' => format_uang($kTanding),
                'kTunggal' => format_uang($kTunggal),
                'kGanda' => format_uang($kGanda),
                'kTrio' => format_uang($kTrio)
            ],
            [
                'tanding' => format_uang($kTanding * $aTanding),
                'tunggal' => format_uang($kTunggal * $aTunggal),
                'ganda' => format_uang($kGanda * $aGanda),
                'trio' => format_uang($kTrio * $aTrio)
            ],
            [
                'jumlah' => format_uang($jumlah)
            ]
        ];
        return view('official-kejurnas.download-berkas.kwitansi')->with('data', $data);
    }

    public function idcard()
    {
        return view('official-kejurnas.download-berkas.idcard');
    }
    public function a1()
    {
        return view('official-kejurnas.download-berkas.a-1');
    }
}

