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

        $atlet = Atlet::get()->count();
        $kontingen = Kontingen::get()->count();
        $jkpa = DB::table('atlets')->where('jk', 'PA')->get()->count();
        $pud = DB::table('atlets')->where('golongan', 'Pra Usia Dini')->get()->count();
        $ud = DB::table('atlets')->where('golongan', 'Usia Dini')->get()->count();
        $pr = DB::table('atlets')->where('golongan', 'Pra Remaja')->get()->count();
        $r = DB::table('atlets')->where('golongan', 'remaja')->get()->count();
        $d = DB::table('atlets')->where('golongan', 'Dewasa')->get()->count();
        $m = DB::table('atlets')->where('golongan', 'Master')->get()->count();

        return view('admin-kejurnas.dashboard')
            ->with('atlet', $atlet)
            ->with('kontingen', $kontingen)
            ->with('jk', $jkpa)
            ->with('pud', $pud)
            ->with('ud', $ud)
            ->with('pr', $pr)
            ->with('r', $r)
            ->with('d', $d)
            ->with('m', $m);
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

    // verifikasi atlet
    public function verifikasiAtlet()
    {
        return view('admin-kejurnas.registrasi-ulang.verifikasi-atlet');
    }
}
