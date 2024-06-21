<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Atlet;
use App\Models\Invoice;
use App\Models\Kontingen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VerifikasiController extends Controller
{
   // verifikasi atlet
   public function verifikasiAtlet(string $username)
   {
       // #####################################################################

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
       $total_biaya = $biaya['jml_pud'] + $biaya['jml_ud'] + $biaya['jml_pr'] + $biaya['jml_r'] + $biaya['jml_d'];
       // #####################################################################

       // #####################################################################
       // untuk mengecek kelas yang di isi oleh dua orang
       $duplikat_kelas = DB::table('atlets')
       ->select('kontingen', 'golongan', 'kelas_tanding', 'jk', DB::raw('COUNT(*) as jumlah'))
       ->where('id_username_official', $username)
       ->where('kelas_tanding', '!=', '-')
       ->groupBy('kontingen', 'golongan', 'kelas_tanding', 'jk')
       ->havingRaw('COUNT(*) > 1')
       ->get();
       // #####################################################################
       
       $kontingen = Kontingen::where('id_username_official', $username)->first();
       $atlet = Atlet::where('id_username_official', $username)->get();
       $jml_atlet = Atlet::where('id_username_official', $username)->count();

       return view('admin-kejurnas.registrasi-ulang.verifikasi-atlet')
       ->with('kontingen', $kontingen)
       ->with('jml_atlet', $jml_atlet)
       ->with('total_biaya', $total_biaya)
       ->with('duplikat_kelas', $duplikat_kelas)
       ->with('atlet', $atlet);
   }

   public function verifikasiPerAtlet(string $id)
   {
        $atlet = Atlet::where('id', $id)->first();

        return view('admin-kejurnas.registrasi-ulang.verifikasi-per-atlet')
       ->with('atlet', $atlet);
   }

   public function verifikasiFix(Request $request)
   {
    return 'ok'    ;
    dd($request);
   }
}
