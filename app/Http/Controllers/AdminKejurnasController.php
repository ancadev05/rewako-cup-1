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

        return view('admin-kejurnas.dashboard')
            ->with('atlet', $atlet)
            ->with('kontingen', $kontingen)
            ->with('jk', $jkpa);
    }

    public function atlet()
    {
        $atlet = Atlet::get();
        return view('official-kejurnas.atlet.index')->with('atlet', $atlet);
    }

    // pengelola invoice
    public function invoice()
    {
        $invoice = Invoice::get();
        $kontingen = Kontingen::get();

        return view('admin-kejurnas.invoice')
            ->with('invoice', $invoice)
            ->with('kontingen', $kontingen);
    }

    // verifikasi pembayaran
    public function verifikasiPembayaran(string $id)
    {

        // dd($id);

        $invoice = [
            'pembayaran' => 1
        ];

        Invoice::where('id', $id)->update($invoice);

        return redirect()->to('admin-kejurnas/invoice')->with('success', 'Status pembayaran telah diubah');
    }
}
