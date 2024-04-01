<?php

namespace App\Http\Controllers;

use App\Models\Atlet;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DownloadBerkasController extends Controller
{
    public function index()
    {
        $invoice = Invoice::get();
        return view('official-kejurnas.download-berkas.index')->with('invoice', $invoice);
    }

    public function invoice(){
        $atlet = Atlet::get();

        // username official
        $username = Auth::user()->username;

        // nama kontingen sesuai username official
        $carikontingen = DB::table('kontingens')->where('id_username_official', $username)->get()[0];
        $kontingen = $carikontingen->nama_kontingen;

        // status pembayaran kontingen bersangkutan
        $invoice = Invoice::where('id_username_official', $username)->get()->first();

        // count golongan atlet
        $golongan = Atlet::where('golongan')->get();
        // $pudTanding = Atlet::where('golongan', 'Pra Usia Dini')->orwhere('kelas_tanding','M')->get();
        $pudTanding = DB::table('atlets')->where('golongan', 'Pra Usia Dini')->where('kelas_tanding', 'A' or 'M' or 'H')->get();
        // $pudSeni = Atlet::where('golongan', 'Pra Usia Dini')->where()->get();
        // dd($pudTanding);

        // count atlet tanding
        $a = DB::table('atlets')->where('kontingen', $kontingen)->where('kelas_tanding', 'A')->get()->count();
        $b = DB::table('atlets')->where('kontingen', $kontingen)->where('kelas_tanding', 'B')->get()->count();
        $c = DB::table('atlets')->where('kontingen', $kontingen)->where('kelas_tanding', 'C')->get()->count();
        $d = DB::table('atlets')->where('kontingen', $kontingen)->where('kelas_tanding', 'D')->get()->count();
        $e = DB::table('atlets')->where('kontingen', $kontingen)->where('kelas_tanding', 'E')->get()->count();
        $f = DB::table('atlets')->where('kontingen', $kontingen)->where('kelas_tanding', 'F')->get()->count();
        $g = DB::table('atlets')->where('kontingen', $kontingen)->where('kelas_tanding', 'G')->get()->count();
        $h = DB::table('atlets')->where('kontingen', $kontingen)->where('kelas_tanding', 'H')->get()->count();
        $i = DB::table('atlets')->where('kontingen', $kontingen)->where('kelas_tanding', 'I')->get()->count();
        $j = DB::table('atlets')->where('kontingen', $kontingen)->where('kelas_tanding', 'J')->get()->count();
        $k = DB::table('atlets')->where('kontingen', $kontingen)->where('kelas_tanding', 'K')->get()->count();
        $l = DB::table('atlets')->where('kontingen', $kontingen)->where('kelas_tanding', 'L')->get()->count();
        $m = DB::table('atlets')->where('kontingen', $kontingen)->where('kelas_tanding', 'M')->get()->count();

        // count atlet seni
        $ttk = DB::table('atlets')->where('kontingen', $kontingen)->where('seni', 'Tunggal Tangan Kosong')->get()->count();
        $tb = DB::table('atlets')->where('kontingen', $kontingen)->where('seni', 'Tunggal Bersenjata')->get()->count();
        $gtk = DB::table('atlets')->where('kontingen', $kontingen)->where('seni', 'Ganda Tangan Kosong')->get()->count();
        $gb = DB::table('atlets')->where('kontingen', $kontingen)->where('seni', 'Ganda Bersenjata')->get()->count();
        $gtkb = DB::table('atlets')->where('kontingen', $kontingen)->where('seni', 'Ganda Tangan Kosong dan Bersenjata')->get()->count();
        $trio = DB::table('atlets')->where('kontingen', $kontingen)->where('seni', 'Trio')->get()->count();


        // jumlah atlet
        $aTanding = $a + $b + $c + $d + $e + $f + $g + $h + $i + $j + $k + $l + $m;
        $aTunggal = $ttk + $tb;
        $aGanda = $gtk + $gb + $gtkb;
        $aTrio = $trio;

        // biaya pendaftaran atlet
        $kTanding = 250000;
        $kTunggal = 250000;
        $kGanda = 225000;

        // perhitungan biaya kategori seni trio
        if ($aTrio >= 0 && $aTrio <= 3) { // trio pra usia dini
            $kTrio = 700000;
        } elseif ($aTrio > 3 && $aTrio <= 6) { // trioo usia dini
            $kTrio = 1400000;
        } elseif ($aTrio > 6 && $aTrio <= 9) { // trioo pra remaja
            $kTrio = 2100000;
        } elseif ($aTrio > 9 && $aTrio <= 12) { // trioo remaja
            $kTrio = 2800000;
        } elseif ($aTrio > 12 && $aTrio <= 15) { // trioo dewasa
            $kTrio = 3500000;
        } elseif ($aTrio > 15 && $aTrio <= 18) { // trioo master
            $kTrio = 4200000;
        }

        // jumlah biaya
        $jumlah = ($kTanding * $aTanding) + ($kTunggal * $aTunggal) + ($kGanda * $aGanda) + ($kTrio * $aTrio);

        $data = [
            [ //index 0
                'aTanding' => $aTanding,
                'aTunggal' => $aTunggal,
                'aGanda' => $aGanda,
                'aTrio' => $aTrio
            ],
            [ //index 1
                'kTanding' => format_uang($kTanding),
                'kTunggal' => format_uang($kTunggal),
                'kGanda' => format_uang($kGanda),
                'kTrio' => format_uang($kTrio)
            ],
            [ //index 2
                'tanding' => format_uang($kTanding * $aTanding),
                'tunggal' => format_uang($kTunggal * $aTunggal),
                'ganda' => format_uang($kGanda * $aGanda),
                'trio' => format_uang($kTrio * $aTrio)
            ],
            [ //index 3
                'jumlah' => format_uang($jumlah)
            ],
            [ //index 4
                'namaKontingen' => $kontingen
            ],
            [ //index 5
                'statusBayar' => $invoice->pembayaran
            ]

        ];

        return view('official-kejurnas.download-berkas.invoice')
            ->with('data', $data)
            ->with('golongan',);
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

