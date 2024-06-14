<?php

namespace App\Http\Controllers;

use App\Models\Atlet;
use App\Models\Invoice;
use App\Models\Kontingen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminKejurnasController extends Controller
{
    public function index()
    {

        // jumlah atlet
        $atlet = Atlet::get()->count();
        // jumlah kontingen
        $kontingen = Kontingen::get()->count();
        // jenis kelamin
        $jkpa = DB::table('atlets')->where('jk', 'PA')->get()->count();
        // golongan
        $pud = DB::table('atlets')->where('golongan', 'Pra Usia Dini')->get()->count();
        $ud = DB::table('atlets')->where('golongan', 'Usia Dini')->get()->count();
        $pr = DB::table('atlets')->where('golongan', 'Pra Remaja')->get()->count();
        $r = DB::table('atlets')->where('golongan', 'remaja')->get()->count();
        $d = DB::table('atlets')->where('golongan', 'Dewasa')->get()->count();
        $m = DB::table('atlets')->where('golongan', 'Master')->get()->count();
        $pud_pa = DB::table('atlets')->where('golongan', 'Pra Usia Dini')->where('jk', 'PA')->get()->count();
        $ud_pa = DB::table('atlets')->where('golongan', 'Usia Dini')->where('jk', 'PA')->get()->count();
        $pr_pa = DB::table('atlets')->where('golongan', 'Pra Remaja')->where('jk', 'PA')->get()->count();
        $r_pa = DB::table('atlets')->where('golongan', 'remaja')->where('jk', 'PA')->get()->count();
        $d_pa = DB::table('atlets')->where('golongan', 'Dewasa')->where('jk', 'PA')->get()->count();
        $m_pa = DB::table('atlets')->where('golongan', 'Master')->where('jk', 'PA')->get()->count();
        // kategori
        $kt = DB::table('atlets')->where('bantu_tanding', 'T')->get()->count();
        $ks = DB::table('atlets')->where('bantu_seni', 'S')->get()->count();

        return view('admin-kejurnas.dashboard')
            ->with('atlet', $atlet)
            ->with('kontingen', $kontingen)
            ->with('jk', $jkpa)
            ->with('pud', $pud)
            ->with('ud', $ud)
            ->with('pr', $pr)
            ->with('r', $r)
            ->with('d', $d)
            ->with('m', $m)
            ->with('pud_pa', $pud_pa)
            ->with('ud_pa', $ud_pa)
            ->with('pr_pa', $pr_pa)
            ->with('r_pa', $r_pa)
            ->with('d_pa', $d_pa)
            ->with('m_pa', $m_pa)
            ->with('kt', $kt)
            ->with('ks', $ks);
    }

    public function atlet()
    {
        $atlet = Atlet::orderBy('id','asc')->get();

        return view('admin-kejurnas.atlet')->with('atlet', $atlet);
    }

    // melihat detail atlet dari admin
    public function atletDetail(string $id){
        $atlet = Atlet::where('id', $id)->first();

        return view('official-kejurnas.atlet.atlet-show')->with('atlet', $atlet);
    }
    
    public function kontingen()
    {
        // $kontingen = Kontingen::orderBy('id', 'asc')->get();

        // menghitung jumlah atlet per kontingen
        $kontingen = DB::table('atlets')
                        ->select('id_username_official', DB::raw('COUNT(*) as jumlah_atlet'))
                        ->groupBy('id_username_official')
                        ->get();

                        dd($kontingen);
        return view('admin-kejurnas.kontingen')->with('kontingen', $kontingen);
    }

    // pengelola invoice
    public function pembayaran()
    {
        $invoice = Invoice::get();
        $kontingen = Kontingen::get();

        return view('admin-kejurnas.pembayaran')
            ->with('invoice', $invoice)
            ->with('kontingen', $kontingen);
    }

    // verifikasi pembayaran
    public function verifikasiPembayaran(string $id)
    {

        $pembayaran = Invoice::where('id', $id)->first();
        $status = $pembayaran->pembayaran;
        // dd($pembayaran->pembayaran);

        if ($status == 1) {
            $invoice = [
                'pembayaran' => 0
            ];
            Invoice::where('id', $id)->update($invoice);
        } else {
            $invoice = [
                'pembayaran' => 1
            ];
            Invoice::where('id', $id)->update($invoice);
        }

        // $invoice = [
        //     'pembayaran' => 1
        // ];

        // Invoice::where('id', $id)->update($invoice);

        return redirect()->to('admin-kejurnas/pembayaran')->with('success', 'Status pembayaran telah diubah');
    }

    // yang suda bayar
    public function sudaBayar()
    {
        $invoice = Invoice::where('pembayaran', 1)->get();
        // $kontingen = Kontingen::

        $pelatihAtletCounts = DB::table('atlets')
                                ->select('id_username_official', DB::raw('COUNT(*) as jumlah_atlet'))
                                ->groupBy('id_username_official')
                                ->get();

        return view('admin-kejurnas.sudah-bayar')->with('invoice', $invoice);
    }

    // verifikasi atlet
    public function verifikasiAtlet()
    {
        return view('admin-kejurnas.registrasi-ulang.verifikasi-atlet');
    }

    // detail peserta
    public function detailPeserta()
    {
        // jumlah atlet
        $atlet = Atlet::get()->count();
        // jumlah kontingen
        $kontingen = Kontingen::get()->count();
        // jenis kelamin
        $jkpa = DB::table('atlets')->where('jk', 'PA')->get()->count();
        // golongan
        
        // remaja
        $r_t_a = DB::table('atlets')->where('bantu', 'R/PA/T.0/A.-')->get()->count();
        $r_t_b = DB::table('atlets')->where('bantu', 'R/PA/T.0/B.-')->get()->count();
        $r_t_c = DB::table('atlets')->where('bantu', 'R/PA/T.0/C.-')->get()->count();
        $r_t_d = DB::table('atlets')->where('bantu', 'R/PA/T.0/D.-')->get()->count();
        $r_t_e = DB::table('atlets')->where('bantu', 'R/PA/T.0/E.-')->get()->count();
        $r_t_f = DB::table('atlets')->where('bantu', 'R/PA/T.0/F.-')->get()->count();
        $r_t_g = DB::table('atlets')->where('bantu', 'R/PA/T.0/G.-')->get()->count();
        $r_t_h = DB::table('atlets')->where('bantu', 'R/PA/T.0/H.-')->get()->count();
        $r_t_i = DB::table('atlets')->where('bantu', 'R/PA/T.0/I.-')->get()->count();
        $r_t_j = DB::table('atlets')->where('bantu', 'R/PA/T.0/J.-')->get()->count();
        $r_t_a_pi = DB::table('atlets')->where('bantu', 'R/PI/T.0/A.-')->get()->count();
        $r_t_b_pi = DB::table('atlets')->where('bantu', 'R/PI/T.0/B.-')->get()->count();
        $r_t_c_pi = DB::table('atlets')->where('bantu', 'R/PI/T.0/C.-')->get()->count();
        $r_t_d_pi = DB::table('atlets')->where('bantu', 'R/PI/T.0/D.-')->get()->count();
        $r_t_e_pi = DB::table('atlets')->where('bantu', 'R/PI/T.0/E.-')->get()->count();
        $r_t_f_pi = DB::table('atlets')->where('bantu', 'R/PI/T.0/F.-')->get()->count();

        // dewasa
        $d_t_a = DB::table('atlets')->where('bantu', 'D/PA/T.0/A.-')->get()->count();
        $d_t_b = DB::table('atlets')->where('bantu', 'D/PA/T.0/B.-')->get()->count();
        $d_t_c = DB::table('atlets')->where('bantu', 'D/PA/T.0/C.-')->get()->count();
        $d_t_d = DB::table('atlets')->where('bantu', 'D/PA/T.0/D.-')->get()->count();
        $d_t_e = DB::table('atlets')->where('bantu', 'D/PA/T.0/E.-')->get()->count();
        $d_t_f = DB::table('atlets')->where('bantu', 'D/PA/T.0/F.-')->get()->count();
        $d_t_g = DB::table('atlets')->where('bantu', 'D/PA/T.0/G.-')->get()->count();
        $d_t_h = DB::table('atlets')->where('bantu', 'D/PA/T.0/H.-')->get()->count();
        $d_t_i = DB::table('atlets')->where('bantu', 'D/PA/T.0/I.-')->get()->count();
        $d_t_j = DB::table('atlets')->where('bantu', 'D/PA/T.0/J.-')->get()->count();
        $d_t_a_pi = DB::table('atlets')->where('bantu', 'D/PI/T.0/A.-')->get()->count();
        $d_t_b_pi = DB::table('atlets')->where('bantu', 'D/PI/T.0/B.-')->get()->count();
        $d_t_c_pi = DB::table('atlets')->where('bantu', 'D/PI/T.0/C.-')->get()->count();
        $d_t_d_pi = DB::table('atlets')->where('bantu', 'D/PI/T.0/D.-')->get()->count();
        $d_t_e_pi = DB::table('atlets')->where('bantu', 'D/PI/T.0/E.-')->get()->count();
        $d_t_f_pi = DB::table('atlets')->where('bantu', 'D/PI/T.0/F.-')->get()->count();
        

        return view('admin-kejurnas.detail-peserta')
            ->with('atlet', $atlet)
            ->with('kontingen', $kontingen)
            ->with('jk', $jkpa)
            ->with('r_t_a', $r_t_a)
            ->with('r_t_b', $r_t_b)
            ->with('r_t_c', $r_t_c)
            ->with('r_t_d', $r_t_d)
            ->with('r_t_e', $r_t_e)
            ->with('r_t_f', $r_t_f)
            ->with('r_t_g', $r_t_g)
            ->with('r_t_h', $r_t_h)
            ->with('r_t_i', $r_t_i)
            ->with('r_t_j', $r_t_j)
            ->with('r_t_a_pi', $r_t_a_pi)
            ->with('r_t_b_pi', $r_t_b_pi)
            ->with('r_t_c_pi', $r_t_c_pi)
            ->with('r_t_d_pi', $r_t_d_pi)
            ->with('r_t_e_pi', $r_t_e_pi)
            ->with('r_t_f_pi', $r_t_f_pi);
    }
}
