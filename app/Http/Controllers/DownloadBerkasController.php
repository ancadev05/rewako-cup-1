<?php

namespace App\Http\Controllers;

use App\Models\Atlet;
use App\Models\Invoice;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Queue\Events\Looping;
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

        // perhitungan biaya kategori seni trio remaja
        if ($r_trio == 0) { // jika belum ada trioo
            $byr_trio = 0;
        } elseif ($r_trio > 0 && $r_trio <= 3) { // trio pra usia dini
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
        if ($d_trio == 0) { // jika belum ada trioo
            $byd_trio = 0;
        } elseif ($d_trio > 0 && $d_trio <= 3) { // trio pra usia dini
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

        return view('official-kejurnas.download-berkas.invoice')
            ->with('user', $user)
            ->with('kategori', $kategori)
            ->with('atlet', $atlet)
            ->with('kontingen', $kontingen)
            ->with('biaya', $biaya)
            ->with('totalBiaya', $total)
            ->with('invoice', $invoice);
    }

    public function invoiceKontingen(string $username)
    {
        // menentukan username
        // $username = Auth::user()->username;

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

        // perhitungan biaya kategori seni trio remaja
        if ($r_trio == 0) { // jika belum ada trioo
            $byr_trio = 0;
        } elseif ($r_trio > 0 && $r_trio <= 3) { // trio pra usia dini
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
        if ($d_trio == 0) { // jika belum ada trioo
            $byd_trio = 0;
        } elseif ($d_trio > 0 && $d_trio <= 3) { // trio pra usia dini
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

        $dp = [
            "dp" => $total
        ];

        // for($i )
        Invoice::where('id_username_official', $username)->update($dp);

        return redirect()->to('admin-kejurnas/pserta-suda-bayar');

        // return view('admin-kejurnas.invoice-kontingen')
        //     ->with('user', $user)
        //     ->with('kategori', $kategori)
        //     ->with('atlet', $atlet)
        //     ->with('kontingen', $kontingen)
        //     ->with('biaya', $biaya)
        //     ->with('totalBiaya', $total)
        //     ->with('invoice', $invoice);
    }

    // download data atlet per kontingen
    public function dataAtlet(Request $request)
    {
        // menentukan username
        $username = Auth::user()->username;

        // akun user
        $user = User::where('username', $username)->get()->first();

        // menentukan nama kontingen
        $kontingen = DB::table('kontingens')->where('id_username_official', $username)->get()[0];

        // menampilkan daftar atlet sesuai kontingen/username (golongan)
        $atlet_pud = Atlet::where('id_username_official', $username)->where('golongan', 'Pra Usia Dini')->orderBy('bantu', 'asc')->get();
        $atlet_ud = Atlet::where('id_username_official', $username)->where('golongan', 'Usia Dini')->orderBy('bantu', 'asc')->get();
        $atlet_pr = Atlet::where('id_username_official', $username)->where('golongan', 'Pra Remaja')->orderBy('bantu', 'asc')->get();
        $atlet_r = Atlet::where('id_username_official', $username)->where('golongan', 'Remaja')->orderBy('bantu', 'asc')->get();
        $atlet_d = Atlet::where('id_username_official', $username)->where('golongan', 'Dewasa')->orderBy('bantu', 'asc')->get();
        $atlet_m = Atlet::where('id_username_official', $username)->where('golongan', 'Master')->orderBy('bantu', 'asc')->get();

        // generate pdf
        if ($request->get('export') == 'pdf') {
            $pdf = Pdf::loadView('official-kejurnas.atlet.pdf.atlet',
                [
                    'official' => $user,
                    'kontingen' => $kontingen,
                    'atlet_pud' => $atlet_pud,
                    'atlet_ud' => $atlet_ud,
                    'atlet_pr' => $atlet_pr,
                    'atlet_r' => $atlet_r,
                    'atlet_d' => $atlet_d,
                    'atlet_m' => $atlet_m
                ] 
            );

            return $pdf->download('data-atlet.pdf');
        }

        return view('official-kejurnas.atlet.atlet-download-data')
            ->with('official', $user)
            ->with('kontingen', $kontingen)
            ->with('atlet_pud', $atlet_pud)
            ->with('atlet_ud', $atlet_ud)
            ->with('atlet_pr', $atlet_pr)
            ->with('atlet_r', $atlet_r)
            ->with('atlet_d', $atlet_d)
            ->with('atlet_m', $atlet_m);
    }
}
