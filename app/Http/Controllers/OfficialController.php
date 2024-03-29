<?php

namespace App\Http\Controllers;

use App\Models\Atlet;
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
        $atlet = Atlet::get();

        function format_uang($angka)
        {
            return number_format($angka, 0, ',', '.');
        }

        // kontingen
        $kontingen = 'Gowa B';

        // berdasar kontingen
        // $takalar = DB::table('atlets')->where('kontingen', $kontingen)->get();


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
            ],
            [
                'namaKontingen' => $kontingen
            ]

        ];

        return view('official-kejurnas.dashboard')->with('data', $data);
    }

    public function atlet(){

        $username = Auth::user()->username; // nama user sesuai username yang login
        $atlet = DB::table('atlets')->where('id_username_official', $username)->get();
        // $atlet = DB::table('atlets')->where('kontingen', $kontingen)->get();
        // dd($atlet);


        return view('official-kejurnas.atlet.index')->with('atlet', $atlet);
    }

    public function download(){
        return view('official-kejurnas.download-berkas.index');
    }
}
