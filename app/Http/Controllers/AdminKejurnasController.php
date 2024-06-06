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
        $kontingen = Kontingen::orderBy('id', 'asc')->get();
        // dd($kontingen);
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

        return view('admin-kejurnas.sudah-bayar')->with('invoice', $invoice);
    }

    // verifikasi atlet
    public function verifikasiAtlet()
    {
        return view('admin-kejurnas.registrasi-ulang.verifikasi-atlet');
    }
}
