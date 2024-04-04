<?php

namespace App\Http\Controllers;

use App\Models\Atlet;
use App\Models\Invoice;
use App\Models\User;
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

    public function invoice()
    {
        // menentukan username
        $username = Auth::user()->username;

        // akun user
        $user = User::where('username', $username)->get()->first();

        // menentukan nama kontingen
        $kontingen = DB::table('kontingens')->where('id_username_official', $username)->get()[0];

        // menampilkan daftar atlet sesuai kontingen/username
        $atlet = Atlet::where('id_username_official', $username)->paginate();

        // status pembayaran invoice
        $invoice = Invoice::where('id_username_official', $username)->get()->first();

        // menghitung jumlah atlet setiap kategori
        $kategori = [
            // pra usia dini
            'pud_tunggal' => DB::table('atlets')->where('id_username_official', $username)->where('golongan', 'Pra Usia Dini')->whereIn('seni', ['Tunggal Tangan Kosong', 'Tunggal Bersenjata'])->get()->count(),
            // usia dini
            'ud_tanding' => DB::table('atlets')->where('id_username_official', $username)->where('golongan', 'Usia Dini')->where('bantu_tanding', 'T')->get()->count(),
            'ud_tunggal' => DB::table('atlets')->where('id_username_official', $username)->where('golongan', 'Usia Dini')->whereIn('seni', ['Tunggal Tangan Kosong', 'Tunggal Bersenjata'])->get()->count(),
            // pra remaja
            'pr_tanding' => DB::table('atlets')->where('id_username_official', $username)->where('golongan', 'Pra Remaja')->where('bantu_tanding', 'T')->get()->count(),
            'pr_tunggal' => DB::table('atlets')->where('id_username_official', $username)->where('golongan', 'Pra Remaja')->whereIn('seni', ['Tunggal Tangan Kosong', 'Tunggal Bersenjata'])->get()->count(),
            'pr_ganda' => DB::table('atlets')->where('id_username_official', $username)->where('golongan', 'Pra Remaja')->whereIn('seni', ['Ganda Tangan Kosong', 'Ganda Bersenjata', 'Ganda Tangan Kosong dan Bersenjata'])->get()->count(),
            // reamaja
            'r_tanding' => DB::table('atlets')->where('id_username_official', $username)->where('golongan', 'Remaja')->where('bantu_tanding', 'T')->get()->count(),
            'r_tunggal' => DB::table('atlets')->where('id_username_official', $username)->where('golongan', 'Remaja')->whereIn('seni', ['Tunggal Tangan Kosong', 'Tunggal Bersenjata'])->get()->count(),
            'r_ganda' => DB::table('atlets')->where('id_username_official', $username)->where('golongan', 'Remaja')->whereIn('seni', ['Ganda Tangan Kosong', 'Ganda Bersenjata', 'Ganda Tangan Kosong dan Bersenjata'])->get()->count(),
            'r_trio' => DB::table('atlets')->where('id_username_official', $username)->where('golongan', 'Remaja')->whereIn('seni', ['Trio'])->get()->count(),
            // dewasa
            'd_tanding' => DB::table('atlets')->where('id_username_official', $username)->where('golongan', 'Dewasa')->where('bantu_tanding', 'T')->get()->count(),
            'd_tunggal' => DB::table('atlets')->where('id_username_official', $username)->where('golongan', 'Dewasa')->whereIn('seni', ['Tunggal Tangan Kosong', 'Tunggal Bersenjata'])->get()->count(),
            'd_ganda' => DB::table('atlets')->where('id_username_official', $username)->where('golongan', 'Dewasa')->whereIn('seni', ['Ganda Tangan Kosong', 'Ganda Bersenjata', 'Ganda Tangan Kosong dan Bersenjata'])->get()->count(),
            'd_trio' => DB::table('atlets')->where('id_username_official', $username)->where('golongan', 'Dewasa')->whereIn('seni', ['Trio'])->get()->count(),
        ];


        // menghitung jumlah atlet per golongan dan kategori
        // pra usia dini
        $pud_tunggal = $kategori['pud_tunggal'];
        // usia dini
        $ud_tanding = $kategori['ud_tanding'];
        $ud_tunggal = $kategori['ud_tunggal'];
        // pra remaja
        $pr_tanding = $kategori['pr_tanding'];
        $pr_tunggal = $kategori['pr_tunggal'];
        $pr_ganda = $kategori['pr_ganda'];
        // remaja
        $r_tanding = $kategori['r_tanding'];
        $r_tunggal = $kategori['r_tunggal'];
        $r_ganda = $kategori['r_ganda'];
        $r_trio = $kategori['r_trio'];
        // dewasa
        $d_tanding = $kategori['d_tanding'];
        $d_tunggal = $kategori['d_tunggal'];
        $d_ganda = $kategori['d_ganda'];
        $d_trio = $kategori['d_trio'];

        // biaya pendaftaran atlet
        $by_tanding = 250000;
        $by_tunggal = 250000;
        $by_ganda = 225000;

        // $by_trio = 700000;

        // perhitungan biaya kategori seni trio remaja
        if ($r_trio > 0 && $r_trio <= 3) { // trio pra usia dini
            $byr_trio = 700000;
        } elseif ($r_trio > 3 && $r_trio <= 6) { // trioo usia dini
            $byr_trio = 1400000;
        } elseif ($r_trio > 6 && $r_trio <= 9) { // trioo pra remaja
            $byr_trio = 2100000;
        } elseif ($r_trio > 9 && $r_trio <= 12) { // trioo remaja
            $byr_trio = 2800000;
        } elseif ($r_trio > 12 && $r_trio <= 15) { // trioo dewasa
            $byr_trio = 3500000;
        } elseif ($r_trio > 15 && $r_trio <= 18) { // trioo master
            $byr_trio = 4200000;
        }
        // perhitungan biaya kategori seni trio dewasa
        if ($d_trio > 0 && $d_trio <= 3) { // trio pra usia dini
            $byd_trio = 700000;
        } elseif ($d_trio > 3 && $d_trio <= 6) { // trioo usia dini
            $byd_trio = 1400000;
        } elseif ($d_trio > 6 && $d_trio <= 9) { // trioo pra remaja
            $byd_trio = 2100000;
        } elseif ($d_trio > 9 && $d_trio <= 12) { // trioo remaja
            $byd_trio = 2800000;
        } elseif ($d_trio > 12 && $d_trio <= 15) { // trioo dewasa
            $byd_trio = 3500000;
        } elseif ($d_trio > 15 && $d_trio <= 18) { // trioo master
            $byd_trio = 4200000;
        }

        // biaya per kategori dan golongan
        $biaya = [
            // pra usia dini
            'by_pud_tunggal' => $pud_tunggal * $by_tunggal,
            // usia dini
            'by_ud_tanding' => $ud_tanding * $by_tanding,
            'by_ud_tunggal' => $ud_tunggal * $by_tunggal,
            // pra remaja
            'by_pr_tanding' => $pr_tanding * $by_tanding,
            'by_pr_tunggal' => $pr_tunggal * $by_tunggal,
            'by_pr_ganda' => $pr_ganda * $by_ganda,
            // remaja
            'by_r_tanding' => $r_tanding * $by_tanding,
            'by_r_tunggal' => $r_tunggal * $by_tunggal,
            'by_r_ganda' => $r_ganda * $by_ganda,
            'by_r_trio' => $byr_trio,
            // dewasa
            'by_d_tanding' => $d_tanding * $by_tanding,
            'by_d_tunggal' => $d_tunggal * $by_tunggal,
            'by_d_ganda' => $d_ganda * $by_ganda,
            'by_d_trio' => $byd_trio,

            // total biaya per golongan
            // total pra usia dini
            'jml_pud' => $pud_tunggal * $by_tunggal,
            // total usia dini
            'jml_ud' => ($ud_tanding * $by_tanding) + ($ud_tunggal * $by_tunggal),
            // total pra remaja
            'jml_pr' => ($pr_tanding * $by_tanding) + ($pr_tunggal * $by_tunggal) + ($pr_ganda * $by_ganda),
            // total remaja
            'jml_r' => ($r_tanding * $by_tanding) + ($r_tunggal * $by_tunggal) + ($r_ganda * $by_ganda) + ($byr_trio),
            // total dewasa
            'jml_d' => ($d_tanding * $by_tanding) + ($d_tunggal * $by_tunggal) + ($d_ganda * $by_ganda) + ($byd_trio),

        ];

        // total biaya keseluruhan
        $total = $biaya['jml_pud'] + $biaya['jml_ud'] + $biaya['jml_pr'] + $biaya['jml_r'] + $biaya['jml_d'];



        // dd($biaya);



        // $a = DB::table('atlets')->where('id_', $kontingen)->where('kelas_tanding', 'A')->get()->count();
        // $b = DB::table('atlets')->where('id_', $kontingen)->where('kelas_tanding', 'B')->get()->count();
        // $c = DB::table('atlets')->where('id_', $kontingen)->where('kelas_tanding', 'C')->get()->count();
        // $d = DB::table('atlets')->where('id_', $kontingen)->where('kelas_tanding', 'D')->get()->count();
        // $e = DB::table('atlets')->where('id_', $kontingen)->where('kelas_tanding', 'E')->get()->count();
        // $f = DB::table('atlets')->where('id_', $kontingen)->where('kelas_tanding', 'F')->get()->count();
        // $g = DB::table('atlets')->where('id_', $kontingen)->where('kelas_tanding', 'G')->get()->count();
        // $h = DB::table('atlets')->where('id_', $kontingen)->where('kelas_tanding', 'H')->get()->count();
        // $i = DB::table('atlets')->where('id_', $kontingen)->where('kelas_tanding', 'I')->get()->count();
        // $j = DB::table('atlets')->where('id_', $kontingen)->where('kelas_tanding', 'J')->get()->count();
        // $k = DB::table('atlets')->where('id_', $kontingen)->where('kelas_tanding', 'K')->get()->count();
        // $l = DB::table('atlets')->where('id_', $kontingen)->where('kelas_tanding', 'L')->get()->count();
        // $m = DB::table('atlets')->where('id_', $kontingen)->where('kelas_tanding', 'M')->get()->count();


        return view('official-kejurnas.download-berkas.invoice')
            ->with('user', $user)
            ->with('kategori', $kategori)
            ->with('atlet', $atlet)
            ->with('kontingen', $kontingen)
            ->with('biaya', $biaya)
            ->with('totalBiaya', $total)
            ->with('invoice', $invoice);


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

        // return view('official-kejurnas.download-berkas.invoice')
        //     ->with('data', $data)
        //     ->with('invoice', $invoice)
        //     ->with('alamatKontingen', $alamatKontingen)
        //     ->with('golongan',);
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
