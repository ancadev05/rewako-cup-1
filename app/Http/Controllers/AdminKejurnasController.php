<?php

namespace App\Http\Controllers;

use App\Models\Atlet;
use App\Models\AtletFix;
use App\Models\Golongan;
use App\Models\Invoice;
use App\Models\KelasTanding;
use App\Models\Kontingen;
use App\Models\Seni;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Dompdf\Options;
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
        $r = DB::table('atlets')->where('golongan', 'Remaja')->get()->count();
        $d = DB::table('atlets')->where('golongan', 'Dewasa')->get()->count();
        $m = DB::table('atlets')->where('golongan', 'Master')->get()->count();
        $pud_pa = DB::table('atlets')->where('golongan', 'Pra Usia Dini')->where('jk', 'PA')->get()->count();
        $ud_pa = DB::table('atlets')->where('golongan', 'Usia Dini')->where('jk', 'PA')->get()->count();
        $pr_pa = DB::table('atlets')->where('golongan', 'Pra Remaja')->where('jk', 'PA')->get()->count();
        $r_pa = DB::table('atlets')->where('golongan', 'Remaja')->where('jk', 'PA')->get()->count();
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
        $atlet = Atlet::orderBy('id', 'asc')->get();
        // $kontingen = Kontingen::get();

        // untuk mengecek kelas yang di isi oleh dua orang
        $duplikat_kelas = DB::table('atlets')
            ->select('kontingen', 'golongan', 'kelas_tanding', 'jk', DB::raw('COUNT(*) as jumlah'))
            ->where('kelas_tanding', '!=', '-')
            ->groupBy('kontingen', 'golongan', 'kelas_tanding', 'jk')
            ->havingRaw('COUNT(*) > 1')
            ->get();

        return view('admin-kejurnas.atlet')
            // ->with('kontingen', $kontingen)
            ->with('duplikat_kelas', $duplikat_kelas)
            ->with('atlet', $atlet);
    }

    // melihat detail atlet dari admin
    public function atletDetail(string $id)
    {
        $atlet = Atlet::where('id', $id)->first();

        return view('official-kejurnas.atlet.atlet-show')->with('atlet', $atlet);
    }

    public function kontingen()
    {
        $kontingen = Kontingen::orderBy('id', 'asc')->get();

        // menghitung jumlah atlet per kontingen
        $jml_atlet_kontingen = DB::table('atlets')
            ->select('id_username_official', 'kontingen', DB::raw('COUNT(*) as jumlah_atlet'))
            ->groupBy('id_username_official', 'kontingen')
            ->get();

        // dd($jml_atlet_kontingen);
        return view('admin-kejurnas.kontingen')
            ->with('kontingen', $kontingen)
            ->with('jml_atlet_kontingen', $jml_atlet_kontingen);
        // return view('admin-kejurnas.kontingen')->with('kontingen', $kontingen);
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
        $username = $pembayaran->id_username_official;

        if ($status == 1) {
            $invoice = [
                'pembayaran' => 0
            ];
            $bayar = [
                'bayar' => 0
            ];

            Invoice::where('id', $id)->update($invoice);
            AtletFix::where('id_username_official', $username)->update($bayar);
        } else {
            $invoice = [
                'pembayaran' => 1
            ];
            $bayar = [
                'bayar' => 1
            ];
            Invoice::where('id', $id)->update($invoice);
            AtletFix::where('id_username_official', $username)->update($bayar);
        }

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

    // verifikasi berkas
    public function verifikasiBerkas()
    {
        $user = User::get();
        $kontingen = Kontingen::get();

        return view('admin-kejurnas.registrasi-ulang.verifikasi-berkas')
            ->with('kontingen', $kontingen);
    }

    // cetak id card
    public function cetakIdCard(Request $request, string $username)
    {
        $user = User::where('username', $username)->first();
        $kontingen = Kontingen::where('id_username_official', $username)->first();
        $atlet_fix = Atlet::where('id_username_official', $username)->get();

        // generate pdf
        if ($request->get('export') == 'pdf') {
            // $options = new Options();
            // $options->set('isHtml5ParserEnabled', true);
            // $options->set('isPhpEnabled', true); // Aktifkan PHP di dalam template

            // // Konfigurasi untuk ukuran kertas dan margin
            // $options->setPaper('A4', 'portrait'); // 'portrait' untuk orientasi potret, 'landscape' untuk orientasi lanskap
            // $options->setDebugLayoutPaddingBox('margin-top', 20); // Atur margin atas
            // $options->setOption('margin-right', 20); // Atur margin kanan
            // $options->setOption('margin-bottom', 40); // Atur margin bawah
            // $options->setOption('margin-left', 40); // Atur margin kiri
    
            // // Instansiasi DOMPDF dengan opsi yang sudah dikonfigurasi
            // $dompdf = new Dompdf($options);

            // // Render view ke dalam PDF
            // $dompdf->loadHtml(view('admin-kejurnas.registrasi-ulang.cetak-id-card', ['atlet_fix' => $atlet_fix])->render());
            
            // // Render PDF (output)
            // $dompdf->render();
            
            // // Stream PDF ke browser
            // return $dompdf->stream('data-atlet.pdf');

            $pdf = Pdf::loadView('admin-kejurnas.registrasi-ulang.cetak-id-card', 
            [
                'atlet_fix' => $atlet_fix,
                'kontingen' => $kontingen
            ]);

            return $pdf->stream('data-atlet.pdf');
        }

        return view('admin-kejurnas.registrasi-ulang.id-card')
            ->with('user', $user)
            ->with('kontingen', $kontingen)
            ->with('atlet_fix', $atlet_fix);
    }

    // detail peserta
    public function detailPeserta()
    {
        // jumlah atlet
        $atlet = AtletFix::where('bayar', 1)->get()->count();
        // jumlah kontingen
        $kontingen = Invoice::where('pembayaran', 1)->get()->count();
        // jenis kelamin
        $jkpa = DB::table('atlets')->where('jk', 'PA')->get()->count();
        // golongan

        $atlets = DB::table('atlet_fixes')->where('bayar', 1);

        // pra usia dini
        // seni
        $pud_s_ttk    = DB::table($atlets)->where('golongan', 'Pra Usia Dini')->where('seni', 'Tunggal Tangan Kosong')->where('jk', 'PA')->get()->count();
        $pud_s_tb     = DB::table($atlets)->where('golongan', 'Pra Usia Dini')->where('seni', 'Tunggal Bersenjata')->where('jk', 'PA')->get()->count();
        $pud_s_ttk_pi = DB::table($atlets)->where('golongan', 'Pra Usia Dini')->where('seni', 'Tunggal Tangan Kosong')->where('jk', 'PI')->get()->count();
        $pud_s_tb_pi  = DB::table($atlets)->where('golongan', 'Pra Usia Dini')->where('seni', 'Tunggal Bersenjata')->where('jk', 'PI')->get()->count();


        // usia dini
        // tanding
        $ud_t_a = DB::table($atlets)->where('golongan', 'Usia Dini')->where('kelas_tanding', 'A')->where('jk', 'PA')->get()->count();
        $ud_t_b = DB::table($atlets)->where('golongan', 'Usia Dini')->where('kelas_tanding', 'B')->where('jk', 'PA')->get()->count();
        $ud_t_c = DB::table($atlets)->where('golongan', 'Usia Dini')->where('kelas_tanding', 'C')->where('jk', 'PA')->get()->count();
        $ud_t_d = DB::table($atlets)->where('golongan', 'Usia Dini')->where('kelas_tanding', 'D')->where('jk', 'PA')->get()->count();
        $ud_t_e = DB::table($atlets)->where('golongan', 'Usia Dini')->where('kelas_tanding', 'E')->where('jk', 'PA')->get()->count();
        $ud_t_f = DB::table($atlets)->where('golongan', 'Usia Dini')->where('kelas_tanding', 'F')->where('jk', 'PA')->get()->count();
        $ud_t_g = DB::table($atlets)->where('golongan', 'Usia Dini')->where('kelas_tanding', 'G')->where('jk', 'PA')->get()->count();
        $ud_t_h = DB::table($atlets)->where('golongan', 'Usia Dini')->where('kelas_tanding', 'H')->where('jk', 'PA')->get()->count();
        $ud_t_i = DB::table($atlets)->where('golongan', 'Usia Dini')->where('kelas_tanding', 'I')->where('jk', 'PA')->get()->count();
        $ud_t_j = DB::table($atlets)->where('golongan', 'Usia Dini')->where('kelas_tanding', 'J')->where('jk', 'PA')->get()->count();
        $ud_t_k = DB::table($atlets)->where('golongan', 'Usia Dini')->where('kelas_tanding', 'K')->where('jk', 'PA')->get()->count();
        $ud_t_l = DB::table($atlets)->where('golongan', 'Usia Dini')->where('kelas_tanding', 'L')->where('jk', 'PA')->get()->count();
        $ud_t_m = DB::table($atlets)->where('golongan', 'Usia Dini')->where('kelas_tanding', 'M')->where('jk', 'PA')->get()->count();
        $ud_t_bebas = DB::table($atlets)->where('golongan', 'Usia Dini')->where('kelas_tanding', 'BEBAS')->where('jk', 'PA')->get()->count(); //
        $ud_t_a_pi = DB::table($atlets)->where('golongan', 'Usia Dini')->where('kelas_tanding', 'A')->where('jk', 'PI')->get()->count();
        $ud_t_b_pi = DB::table($atlets)->where('golongan', 'Usia Dini')->where('kelas_tanding', 'B')->where('jk', 'PI')->get()->count();
        $ud_t_c_pi = DB::table($atlets)->where('golongan', 'Usia Dini')->where('kelas_tanding', 'C')->where('jk', 'PI')->get()->count();
        $ud_t_d_pi = DB::table($atlets)->where('golongan', 'Usia Dini')->where('kelas_tanding', 'D')->where('jk', 'PI')->get()->count();
        $ud_t_e_pi = DB::table($atlets)->where('golongan', 'Usia Dini')->where('kelas_tanding', 'E')->where('jk', 'PI')->get()->count();
        $ud_t_f_pi = DB::table($atlets)->where('golongan', 'Usia Dini')->where('kelas_tanding', 'F')->where('jk', 'PI')->get()->count();
        $ud_t_g_pi = DB::table($atlets)->where('golongan', 'Usia Dini')->where('kelas_tanding', 'G')->where('jk', 'PI')->get()->count();
        $ud_t_h_pi = DB::table($atlets)->where('golongan', 'Usia Dini')->where('kelas_tanding', 'H')->where('jk', 'PI')->get()->count();
        $ud_t_i_pi = DB::table($atlets)->where('golongan', 'Usia Dini')->where('kelas_tanding', 'I')->where('jk', 'PI')->get()->count();
        $ud_t_j_pi = DB::table($atlets)->where('golongan', 'Usia Dini')->where('kelas_tanding', 'J')->where('jk', 'PI')->get()->count();
        $ud_t_k_pi = DB::table($atlets)->where('golongan', 'Usia Dini')->where('kelas_tanding', 'K')->where('jk', 'PI')->get()->count();
        $ud_t_l_pi = DB::table($atlets)->where('golongan', 'Usia Dini')->where('kelas_tanding', 'L')->where('jk', 'PI')->get()->count();
        $ud_t_m_pi = DB::table($atlets)->where('golongan', 'Usia Dini')->where('kelas_tanding', 'M')->where('jk', 'PI')->get()->count();
        $ud_t_bebas_pi = DB::table($atlets)->where('golongan', 'Usia Dini')->where('kelas_tanding', 'BEBAS')->where('jk', 'PI')->get()->count(); //
        // seni
        $ud_s_ttk    = DB::table($atlets)->where('golongan', 'Usia Dini')->where('seni', 'Tunggal Tangan Kosong')->where('jk', 'PA')->get()->count();
        $ud_s_tb     = DB::table($atlets)->where('golongan', 'Usia Dini')->where('seni', 'Tunggal Bersenjata')->where('jk', 'PA')->get()->count();
        $ud_s_ttk_pi = DB::table($atlets)->where('golongan', 'Usia Dini')->where('seni', 'Tunggal Tangan Kosong')->where('jk', 'PI')->get()->count();
        $ud_s_tb_pi  = DB::table($atlets)->where('golongan', 'Usia Dini')->where('seni', 'Tunggal Bersenjata')->where('jk', 'PI')->get()->count();

        // pra remaja
        // tanding
        $pr_t_a = DB::table($atlets)->where('golongan', 'Pra Remaja')->where('kelas_tanding', 'A')->where('jk', 'PA')->get()->count();
        $pr_t_b = DB::table($atlets)->where('golongan', 'Pra Remaja')->where('kelas_tanding', 'B')->where('jk', 'PA')->get()->count();
        $pr_t_c = DB::table($atlets)->where('golongan', 'Pra Remaja')->where('kelas_tanding', 'C')->where('jk', 'PA')->get()->count();
        $pr_t_d = DB::table($atlets)->where('golongan', 'Pra Remaja')->where('kelas_tanding', 'D')->where('jk', 'PA')->get()->count();
        $pr_t_e = DB::table($atlets)->where('golongan', 'Pra Remaja')->where('kelas_tanding', 'E')->where('jk', 'PA')->get()->count();
        $pr_t_f = DB::table($atlets)->where('golongan', 'Pra Remaja')->where('kelas_tanding', 'F')->where('jk', 'PA')->get()->count();
        $pr_t_g = DB::table($atlets)->where('golongan', 'Pra Remaja')->where('kelas_tanding', 'G')->where('jk', 'PA')->get()->count();
        $pr_t_h = DB::table($atlets)->where('golongan', 'Pra Remaja')->where('kelas_tanding', 'H')->where('jk', 'PA')->get()->count();
        $pr_t_i = DB::table($atlets)->where('golongan', 'Pra Remaja')->where('kelas_tanding', 'I')->where('jk', 'PA')->get()->count();
        $pr_t_j = DB::table($atlets)->where('golongan', 'Pra Remaja')->where('kelas_tanding', 'J')->where('jk', 'PA')->get()->count();
        $pr_t_k = DB::table($atlets)->where('golongan', 'Pra Remaja')->where('kelas_tanding', 'K')->where('jk', 'PA')->get()->count();
        $pr_t_l = DB::table($atlets)->where('golongan', 'Pra Remaja')->where('kelas_tanding', 'L')->where('jk', 'PA')->get()->count();
        $pr_t_m = DB::table($atlets)->where('golongan', 'Pra Remaja')->where('kelas_tanding', 'M')->where('jk', 'PA')->get()->count();
        $pr_t_bebas = DB::table($atlets)->where('golongan', 'Pra Remaja')->where('kelas_tanding', 'BEBAS')->where('jk', 'PA')->get()->count(); //
        $pr_t_a_pi = DB::table($atlets)->where('golongan', 'Pra Remaja')->where('kelas_tanding', 'A')->where('jk', 'PI')->get()->count();
        $pr_t_b_pi = DB::table($atlets)->where('golongan', 'Pra Remaja')->where('kelas_tanding', 'B')->where('jk', 'PI')->get()->count();
        $pr_t_c_pi = DB::table($atlets)->where('golongan', 'Pra Remaja')->where('kelas_tanding', 'C')->where('jk', 'PI')->get()->count();
        $pr_t_d_pi = DB::table($atlets)->where('golongan', 'Pra Remaja')->where('kelas_tanding', 'D')->where('jk', 'PI')->get()->count();
        $pr_t_e_pi = DB::table($atlets)->where('golongan', 'Pra Remaja')->where('kelas_tanding', 'E')->where('jk', 'PI')->get()->count();
        $pr_t_f_pi = DB::table($atlets)->where('golongan', 'Pra Remaja')->where('kelas_tanding', 'F')->where('jk', 'PI')->get()->count();
        $pr_t_g_pi = DB::table($atlets)->where('golongan', 'Pra Remaja')->where('kelas_tanding', 'G')->where('jk', 'PI')->get()->count();
        $pr_t_h_pi = DB::table($atlets)->where('golongan', 'Pra Remaja')->where('kelas_tanding', 'H')->where('jk', 'PI')->get()->count();
        $pr_t_i_pi = DB::table($atlets)->where('golongan', 'Pra Remaja')->where('kelas_tanding', 'I')->where('jk', 'PI')->get()->count();
        $pr_t_j_pi = DB::table($atlets)->where('golongan', 'Pra Remaja')->where('kelas_tanding', 'J')->where('jk', 'PI')->get()->count();
        $pr_t_k_pi = DB::table($atlets)->where('golongan', 'Pra Remaja')->where('kelas_tanding', 'K')->where('jk', 'PI')->get()->count();
        $pr_t_l_pi = DB::table($atlets)->where('golongan', 'Pra Remaja')->where('kelas_tanding', 'L')->where('jk', 'PI')->get()->count();
        $pr_t_m_pi = DB::table($atlets)->where('golongan', 'Pra Remaja')->where('kelas_tanding', 'M')->where('jk', 'PI')->get()->count();
        $pr_t_bebas_pi = DB::table($atlets)->where('golongan', 'Pra Remaja')->where('kelas_tanding', 'BEBAS')->where('jk', 'PI')->get()->count(); //
        // seni
        $pr_s_ttk    = DB::table($atlets)->where('golongan', 'Pra Remaja')->where('seni', 'Tunggal Tangan Kosong')->where('jk', 'PA')->get()->count();
        $pr_s_tb     = DB::table($atlets)->where('golongan', 'Pra Remaja')->where('seni', 'Tunggal Bersenjata')->where('jk', 'PA')->get()->count();
        $pr_s_gtk    = DB::table($atlets)->where('golongan', 'Pra Remaja')->where('seni', 'Ganda Tangan Kosong')->where('jk', 'PA')->get()->count();
        $pr_s_gb     = DB::table($atlets)->where('golongan', 'Pra Remaja')->where('seni', 'Ganda Bersenjata')->where('jk', 'PA')->get()->count();
        $pr_s_gtkb   = DB::table($atlets)->where('golongan', 'Pra Remaja')->where('seni', 'Ganda Tangan Kosong dan Bersenjata')->where('jk', 'PA')->get()->count();
        $pr_s_ttk_pi = DB::table($atlets)->where('golongan', 'Pra Remaja')->where('seni', 'Tunggal Tangan Kosong')->where('jk', 'PI')->get()->count();
        $pr_s_tb_pi  = DB::table($atlets)->where('golongan', 'Pra Remaja')->where('seni', 'Tunggal Bersenjata')->where('jk', 'PI')->get()->count();
        $pr_s_gtk_pi = DB::table($atlets)->where('golongan', 'Pra Remaja')->where('seni', 'Ganda Tangan Kosong')->where('jk', 'PI')->get()->count();
        $pr_s_gb_pi  = DB::table($atlets)->where('golongan', 'Pra Remaja')->where('seni', 'Ganda Bersenjata')->where('jk', 'PI')->get()->count();
        $pr_s_gtkb_pi = DB::table($atlets)->where('golongan', 'Pra Remaja')->where('seni', 'Ganda Tangan Kosong dan Bersenjata')->where('jk', 'PI')->get()->count();


        // remaja
        // tanding
        $r_t_a = DB::table($atlets)->where('golongan', 'Remaja')->where('kelas_tanding', 'A')->where('jk', 'PA')->get()->count();
        $r_t_b = DB::table($atlets)->where('golongan', 'Remaja')->where('kelas_tanding', 'B')->where('jk', 'PA')->get()->count();
        $r_t_c = DB::table($atlets)->where('golongan', 'Remaja')->where('kelas_tanding', 'C')->where('jk', 'PA')->get()->count();
        $r_t_d = DB::table($atlets)->where('golongan', 'Remaja')->where('kelas_tanding', 'D')->where('jk', 'PA')->get()->count();
        $r_t_e = DB::table($atlets)->where('golongan', 'Remaja')->where('kelas_tanding', 'E')->where('jk', 'PA')->get()->count();
        $r_t_f = DB::table($atlets)->where('golongan', 'Remaja')->where('kelas_tanding', 'F')->where('jk', 'PA')->get()->count();
        $r_t_g = DB::table($atlets)->where('golongan', 'Remaja')->where('kelas_tanding', 'G')->where('jk', 'PA')->get()->count();
        $r_t_h = DB::table($atlets)->where('golongan', 'Remaja')->where('kelas_tanding', 'H')->where('jk', 'PA')->get()->count();
        $r_t_i = DB::table($atlets)->where('golongan', 'Remaja')->where('kelas_tanding', 'I')->where('jk', 'PA')->get()->count();
        $r_t_j = DB::table($atlets)->where('golongan', 'Remaja')->where('kelas_tanding', 'J')->where('jk', 'PA')->get()->count();
        $r_t_a_pi = DB::table($atlets)->where('golongan', 'Remaja')->where('kelas_tanding', 'A')->where('jk', 'PI')->get()->count();
        $r_t_b_pi = DB::table($atlets)->where('golongan', 'Remaja')->where('kelas_tanding', 'B')->where('jk', 'PI')->get()->count();
        $r_t_c_pi = DB::table($atlets)->where('golongan', 'Remaja')->where('kelas_tanding', 'C')->where('jk', 'PI')->get()->count();
        $r_t_d_pi = DB::table($atlets)->where('golongan', 'Remaja')->where('kelas_tanding', 'D')->where('jk', 'PI')->get()->count();
        $r_t_e_pi = DB::table($atlets)->where('golongan', 'Remaja')->where('kelas_tanding', 'E')->where('jk', 'PI')->get()->count();
        $r_t_f_pi = DB::table($atlets)->where('golongan', 'Remaja')->where('kelas_tanding', 'F')->where('jk', 'PI')->get()->count();
        // seni
        $r_s_ttk = DB::table($atlets)->where('golongan', 'Remaja')->where('seni', 'Tunggal Tangan Kosong')->where('jk', 'PA')->get()->count();
        $r_s_tb = DB::table($atlets)->where('golongan', 'Remaja')->where('seni', 'Tunggal Bersenjata')->where('jk', 'PA')->get()->count();
        $r_s_gtk = DB::table($atlets)->where('golongan', 'Remaja')->where('seni', 'Ganda Tangan Kosong')->where('jk', 'PA')->get()->count();
        $r_s_gb = DB::table($atlets)->where('golongan', 'Remaja')->where('seni', 'Ganda Bersenjata')->where('jk', 'PA')->get()->count();
        $r_s_gtkb = DB::table($atlets)->where('golongan', 'Remaja')->where('seni', 'Ganda Tangan Kosong dan Bersenjata')->where('jk', 'PA')->get()->count();
        $r_s_t = DB::table($atlets)->where('golongan', 'Remaja')->where('seni', 'Trio')->where('jk', 'PA')->get()->count();
        $r_s_ttk_pi = DB::table($atlets)->where('golongan', 'Remaja')->where('seni', 'Tunggal Tangan Kosong')->where('jk', 'PI')->get()->count();
        $r_s_tb_pi = DB::table($atlets)->where('golongan', 'Remaja')->where('seni', 'Tunggal Bersenjata')->where('jk', 'PI')->get()->count();
        $r_s_gtk_pi = DB::table($atlets)->where('golongan', 'Remaja')->where('seni', 'Ganda Tangan Kosong')->where('jk', 'PI')->get()->count();
        $r_s_gb_pi = DB::table($atlets)->where('golongan', 'Remaja')->where('seni', 'Ganda Bersenjata')->where('jk', 'PI')->get()->count();
        $r_s_gtkb_pi = DB::table($atlets)->where('golongan', 'Remaja')->where('seni', 'Ganda Tangan Kosong dan Bersenjata')->where('jk', 'PI')->get()->count();
        $r_s_t_pi = DB::table($atlets)->where('golongan', 'Remaja')->where('seni', 'Trio')->where('jk', 'PI')->get()->count();

        // dewasa
        // tanding
        $d_t_a = DB::table($atlets)->where('golongan', 'Dewasa')->where('kelas_tanding', 'A')->where('jk', 'PA')->get()->count();
        $d_t_b = DB::table($atlets)->where('golongan', 'Dewasa')->where('kelas_tanding', 'B')->where('jk', 'PA')->get()->count();
        $d_t_c = DB::table($atlets)->where('golongan', 'Dewasa')->where('kelas_tanding', 'C')->where('jk', 'PA')->get()->count();
        $d_t_d = DB::table($atlets)->where('golongan', 'Dewasa')->where('kelas_tanding', 'D')->where('jk', 'PA')->get()->count();
        $d_t_e = DB::table($atlets)->where('golongan', 'Dewasa')->where('kelas_tanding', 'E')->where('jk', 'PA')->get()->count();
        $d_t_f = DB::table($atlets)->where('golongan', 'Dewasa')->where('kelas_tanding', 'F')->where('jk', 'PA')->get()->count();
        $d_t_g = DB::table($atlets)->where('golongan', 'Dewasa')->where('kelas_tanding', 'G')->where('jk', 'PA')->get()->count();
        $d_t_h = DB::table($atlets)->where('golongan', 'Dewasa')->where('kelas_tanding', 'H')->where('jk', 'PA')->get()->count();
        $d_t_i = DB::table($atlets)->where('golongan', 'Dewasa')->where('kelas_tanding', 'I')->where('jk', 'PA')->get()->count();
        $d_t_j = DB::table($atlets)->where('golongan', 'Dewasa')->where('kelas_tanding', 'J')->where('jk', 'PA')->get()->count();
        $d_t_a_pi = DB::table($atlets)->where('golongan', 'Dewasa')->where('kelas_tanding', 'A')->where('jk', 'PI')->get()->count();
        $d_t_b_pi = DB::table($atlets)->where('golongan', 'Dewasa')->where('kelas_tanding', 'B')->where('jk', 'PI')->get()->count();
        $d_t_c_pi = DB::table($atlets)->where('golongan', 'Dewasa')->where('kelas_tanding', 'C')->where('jk', 'PI')->get()->count();
        $d_t_d_pi = DB::table($atlets)->where('golongan', 'Dewasa')->where('kelas_tanding', 'D')->where('jk', 'PI')->get()->count();
        $d_t_e_pi = DB::table($atlets)->where('golongan', 'Dewasa')->where('kelas_tanding', 'E')->where('jk', 'PI')->get()->count();
        $d_t_f_pi = DB::table($atlets)->where('golongan', 'Dewasa')->where('kelas_tanding', 'F')->where('jk', 'PI')->get()->count();
        // seni
        $d_s_ttk    = DB::table($atlets)->where('golongan', 'Dewasa')->where('seni', 'Tunggal Tangan Kosong')->where('jk', 'PA')->get()->count();
        $d_s_tb     = DB::table($atlets)->where('golongan', 'Dewasa')->where('seni', 'Tunggal Bersenjata')->where('jk', 'PA')->get()->count();
        $d_s_gtk    = DB::table($atlets)->where('golongan', 'Dewasa')->where('seni', 'Ganda Tangan Kosong')->where('jk', 'PA')->get()->count();
        $d_s_gb     = DB::table($atlets)->where('golongan', 'Dewasa')->where('seni', 'Ganda Bersenjata')->where('jk', 'PA')->get()->count();
        $d_s_gtkb   = DB::table($atlets)->where('golongan', 'Dewasa')->where('seni', 'Ganda Tangan Kosong dan Bersenjata')->where('jk', 'PA')->get()->count();
        $d_s_t      = DB::table($atlets)->where('golongan', 'Dewasa')->where('seni', 'Trio')->where('jk', 'PA')->get()->count();
        $d_s_ttk_pi = DB::table($atlets)->where('golongan', 'Dewasa')->where('seni', 'Tunggal Tangan Kosong')->where('jk', 'PI')->get()->count();
        $d_s_tb_pi  = DB::table($atlets)->where('golongan', 'Dewasa')->where('seni', 'Tunggal Bersenjata')->where('jk', 'PI')->get()->count();
        $d_s_gtk_pi = DB::table($atlets)->where('golongan', 'Dewasa')->where('seni', 'Ganda Tangan Kosong')->where('jk', 'PI')->get()->count();
        $d_s_gb_pi  = DB::table($atlets)->where('golongan', 'Dewasa')->where('seni', 'Ganda Bersenjata')->where('jk', 'PI')->get()->count();
        $d_s_gtkb_pi = DB::table($atlets)->where('golongan', 'Dewasa')->where('seni', 'Ganda Tangan Kosong dan Bersenjata')->where('jk', 'PI')->get()->count();
        $d_s_t_pi   = DB::table($atlets)->where('golongan', 'Dewasa')->where('seni', 'Trio')->where('jk', 'PI')->get()->count();


        return view('admin-kejurnas.detail-peserta')
            ->with('atlet', $atlet)
            ->with('kontingen', $kontingen)
            ->with('jk', $jkpa)
            // seni pra usia dini
            ->with('pud_s_ttk', $pud_s_ttk)
            ->with('pud_s_tb', $pud_s_tb)
            ->with('pud_s_ttk_pi', $pud_s_ttk_pi)
            ->with('pud_s_tb_pi', $pud_s_tb_pi)
            // tanding usia dini
            ->with('ud_t_a', $ud_t_a)
            ->with('ud_t_b', $ud_t_b)
            ->with('ud_t_c', $ud_t_c)
            ->with('ud_t_d', $ud_t_d)
            ->with('ud_t_e', $ud_t_e)
            ->with('ud_t_f', $ud_t_f)
            ->with('ud_t_g', $ud_t_g)
            ->with('ud_t_h', $ud_t_h)
            ->with('ud_t_i', $ud_t_i)
            ->with('ud_t_j', $ud_t_j)
            ->with('ud_t_k', $ud_t_k)
            ->with('ud_t_l', $ud_t_l)
            ->with('ud_t_m', $ud_t_m)
            ->with('ud_t_bebas', $ud_t_bebas)
            ->with('ud_t_a_pi', $ud_t_a_pi)
            ->with('ud_t_b_pi', $ud_t_b_pi)
            ->with('ud_t_c_pi', $ud_t_c_pi)
            ->with('ud_t_d_pi', $ud_t_d_pi)
            ->with('ud_t_e_pi', $ud_t_e_pi)
            ->with('ud_t_f_pi', $ud_t_f_pi)
            ->with('ud_t_g_pi', $ud_t_g_pi)
            ->with('ud_t_h_pi', $ud_t_h_pi)
            ->with('ud_t_i_pi', $ud_t_i_pi)
            ->with('ud_t_j_pi', $ud_t_j_pi)
            ->with('ud_t_k_pi', $ud_t_k_pi)
            ->with('ud_t_l_pi', $ud_t_l_pi)
            ->with('ud_t_m_pi', $ud_t_m_pi)
            ->with('ud_t_bebas_pi', $ud_t_bebas_pi)
            // seni usia dini
            ->with('ud_s_ttk', $ud_s_ttk)
            ->with('ud_s_tb', $ud_s_tb)
            ->with('ud_s_ttk_pi', $ud_s_ttk_pi)
            ->with('ud_s_tb_pi', $ud_s_tb_pi)
            // tanding pra remaja
            ->with('pr_t_a', $pr_t_a)
            ->with('pr_t_b', $pr_t_b)
            ->with('pr_t_c', $pr_t_c)
            ->with('pr_t_d', $pr_t_d)
            ->with('pr_t_e', $pr_t_e)
            ->with('pr_t_f', $pr_t_f)
            ->with('pr_t_g', $pr_t_g)
            ->with('pr_t_h', $pr_t_h)
            ->with('pr_t_i', $pr_t_i)
            ->with('pr_t_j', $pr_t_j)
            ->with('pr_t_k', $pr_t_k)
            ->with('pr_t_l', $pr_t_l)
            ->with('pr_t_m', $pr_t_m)
            ->with('pr_t_bebas', $pr_t_bebas)
            ->with('pr_t_a_pi', $pr_t_a_pi)
            ->with('pr_t_b_pi', $pr_t_b_pi)
            ->with('pr_t_c_pi', $pr_t_c_pi)
            ->with('pr_t_d_pi', $pr_t_d_pi)
            ->with('pr_t_e_pi', $pr_t_e_pi)
            ->with('pr_t_f_pi', $pr_t_f_pi)
            ->with('pr_t_g_pi', $pr_t_g_pi)
            ->with('pr_t_h_pi', $pr_t_h_pi)
            ->with('pr_t_i_pi', $pr_t_i_pi)
            ->with('pr_t_j_pi', $pr_t_j_pi)
            ->with('pr_t_k_pi', $pr_t_k_pi)
            ->with('pr_t_l_pi', $pr_t_l_pi)
            ->with('pr_t_m_pi', $pr_t_m_pi)
            ->with('pr_t_bebas_pi', $pr_t_bebas_pi)
            // seni pra remaja
            ->with('pr_s_ttk', $pr_s_ttk)
            ->with('pr_s_tb', $pr_s_tb)
            ->with('pr_s_gtk', $pr_s_gtk)
            ->with('pr_s_gb', $pr_s_gb)
            ->with('pr_s_gtkb', $pr_s_gtkb)
            ->with('pr_s_ttk_pi', $pr_s_ttk_pi)
            ->with('pr_s_tb_pi', $pr_s_tb_pi)
            ->with('pr_s_gtk_pi', $pr_s_gtk_pi)
            ->with('pr_s_gb_pi', $pr_s_gb_pi)
            ->with('pr_s_gtkb_pi', $pr_s_gtkb_pi)
            // tanding remaja
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
            ->with('r_t_f_pi', $r_t_f_pi)
            // seni remaja
            ->with('r_s_ttk', $r_s_ttk)
            ->with('r_s_tb', $r_s_tb)
            ->with('r_s_gtk', $r_s_gtk)
            ->with('r_s_gb', $r_s_gb)
            ->with('r_s_gtkb', $r_s_gtkb)
            ->with('r_s_t', $r_s_t)
            ->with('r_s_ttk_pi', $r_s_ttk_pi)
            ->with('r_s_tb_pi', $r_s_tb_pi)
            ->with('r_s_gtk_pi', $r_s_gtk_pi)
            ->with('r_s_gb_pi', $r_s_gb_pi)
            ->with('r_s_gtkb_pi', $r_s_gtkb_pi)
            ->with('r_s_t_pi', $r_s_t_pi)
            // tanding dewasa
            ->with('d_t_a', $d_t_a)
            ->with('d_t_b', $d_t_b)
            ->with('d_t_c', $d_t_c)
            ->with('d_t_d', $d_t_d)
            ->with('d_t_e', $d_t_e)
            ->with('d_t_f', $d_t_f)
            ->with('d_t_g', $d_t_g)
            ->with('d_t_h', $d_t_h)
            ->with('d_t_i', $d_t_i)
            ->with('d_t_j', $d_t_j)
            ->with('d_t_a_pi', $d_t_a_pi)
            ->with('d_t_b_pi', $d_t_b_pi)
            ->with('d_t_c_pi', $d_t_c_pi)
            ->with('d_t_d_pi', $d_t_d_pi)
            ->with('d_t_e_pi', $d_t_e_pi)
            ->with('d_t_f_pi', $d_t_f_pi)
            // seni dewasa
            ->with('d_s_ttk', $d_s_ttk)
            ->with('d_s_tb', $d_s_tb)
            ->with('d_s_gtk', $d_s_gtk)
            ->with('d_s_gb', $d_s_gb)
            ->with('d_s_gtkb', $d_s_gtkb)
            ->with('d_s_t', $d_s_t)
            ->with('d_s_ttk_pi', $d_s_ttk_pi)
            ->with('d_s_tb_pi', $d_s_tb_pi)
            ->with('d_s_gtk_pi', $d_s_gtk_pi)
            ->with('d_s_gb_pi', $d_s_gb_pi)
            ->with('d_s_gtkb_pi', $d_s_gtkb_pi)
            ->with('d_s_t_pi', $d_s_t_pi);
    }

    // cek file
    // public function file()
    // {
    //     return 
    // }

    // dp
    public function dp(Request $request, string $id)
    {
        $status_dp = Invoice::where('id', $id)->first();

        // dd($status_dp->dp);
        // dd($request->dp);

        if ($request->dp == null) {
            return redirect()->to('admin-kejurnas/pembayaran')->with('success', 'tidak ada DP');
        }

        $dp = [
            'dp' => $request->dp
        ];

        // dd($dp);

        Invoice::where('id', $id)->update($dp);

        // if ($status == 1) {
        //     $invoice = [
        //         'pembayaran' => 0
        //     ];
        //     Invoice::where('id', $id)->update($invoice);
        // } else {
        //     $invoice = [
        //         'pembayaran' => 1
        //     ];
        //     Invoice::where('id', $id)->update($invoice);
        // }

        return redirect()->to('admin-kejurnas/pembayaran')->with('success', 'Sudah DP');
    }

    // tarik data
    public function dataFix(Request $request)
    {
        if ($request->filter == 1) {

            // dd($request);

            $filter = $request->filter;
            $f_kelas_tanding = $request->kelas_tanding;
            $f_kontingen = $request->kontingen;
            $f_seni = $request->seni;
            $f_golongan = $request->golongan;
            $f_jk = $request->jk;

            $dp = 0;

            $kelas_tanding = KelasTanding::get();
            $seni = Seni::get();
            $golongan = Golongan::get();
            $kontingen = Invoice::where('pembayaran', 1)->orderBy('id_kontingen', 'asc')->get();

            // filter data atlet
            $atlet_fix = AtletFix::where('kelas_tanding', $f_kelas_tanding)
                ->orWhere('kontingen', $f_kontingen)
                ->orWhere('seni', $f_seni)
                ->orWhere('golongan', $f_golongan)
                ->orWhere('jk', $f_jk)
                ->orWhere('bayar', 1)
                ->get();

            return view('admin-kejurnas.registrasi-ulang.atlet-cari')
                ->with('kelas_tanding', $kelas_tanding)
                ->with('kontingen', $kontingen)
                ->with('seni', $seni)
                ->with('golongan', $golongan)
                ->with('atlet_fix', $atlet_fix);
        }

        $dp = 0;

        $kelas_tanding = KelasTanding::get();
        $seni = Seni::get();
        $golongan = Golongan::get();
        $kontingen = Invoice::where('pembayaran', 1)->orderBy('id_kontingen', 'asc')->get();
        $atlet_fix = AtletFix::where('bayar', 1)->get();



        return view('admin-kejurnas.registrasi-ulang.atlet-fix')
            ->with('kelas_tanding', $kelas_tanding)
            ->with('kontingen', $kontingen)
            ->with('seni', $seni)
            ->with('golongan', $golongan)
            ->with('atlet_fix', $atlet_fix);
    }

    // mencari pesilat dengan kriteria tertentu
    public function atletCari(Request $request)
    {
        // dd($request);
        if($request->filter == 1) {
            
            $f_kelas_tanding = $request->kelas_tanding;
            $f_kontingen = $request->kontingen;
            $f_seni = $request->seni;
            $f_golongan = $request->golongan;
            $f_jk = $request->jk;

            $kelas_tanding = KelasTanding::get();
            $seni = Seni::get();
            $golongan = Golongan::get();
            $kontingen = Invoice::where('pembayaran', 1)->orderBy('id_kontingen', 'asc')->get();

            // filter data atlet
            $atlet_fix = AtletFix::where('kelas_tanding', $f_kelas_tanding)
                ->where('kontingen', $f_kontingen)
                ->where('seni', $f_seni)
                ->where('golongan', $f_golongan)
                ->where('jk', $f_jk)
                ->where('bayar', 1)
                ->get();

                dd($atlet_fix);

            return view('admin-kejurnas.registrasi-ulang.atlet-cari')
                ->with('kelas_tanding', $kelas_tanding)
                ->with('kontingen', $kontingen)
                ->with('seni', $seni)
                ->with('golongan', $golongan)
                ->with('atlet_fix', $atlet_fix);
        } else {
            $kelas_tanding = KelasTanding::get();
            $seni = Seni::get();
            $golongan = Golongan::get();
            $kontingen = Invoice::where('pembayaran', 1)->orderBy('id_kontingen', 'asc')->get();
            $atlet_fix = AtletFix::where('bayar', 1)->get();

            return view('admin-kejurnas.registrasi-ulang.atlet-cari')
                ->with('kelas_tanding', $kelas_tanding)
                ->with('kontingen', $kontingen)
                ->with('seni', $seni)
                ->with('golongan', $golongan)
                ->with('atlet_fix', $atlet_fix);
        }
        // $f_kelas_tanding = $request->kelas_tanding;
        //     $f_kontingen = $request->kontingen;
        //     $f_seni = $request->seni;
        //     $f_golongan = $request->golongan;
        //     $f_jk = $request->jk;

        //     $kelas_tanding = KelasTanding::get();
        //     $seni = Seni::get();
        //     $golongan = Golongan::get();
        //     $kontingen = Invoice::where('pembayaran', 1)->orderBy('id_kontingen', 'asc')->get();

        //     // filter data atlet
        //     $atlet_fix = AtletFix::where('kelas_tanding', $f_kelas_tanding)
        //         ->orWhere('kontingen', $f_kontingen)
        //         ->orWhere('seni', $f_seni)
        //         ->orWhere('golongan', $f_golongan)
        //         ->orWhere('jk', $f_jk)
        //         ->orWhere('bayar', 1)
        //         ->get();

        //     return view('admin-kejurnas.registrasi-ulang.atlet-cari')
        //         ->with('kelas_tanding', $kelas_tanding)
        //         ->with('kontingen', $kontingen)
        //         ->with('seni', $seni)
        //         ->with('golongan', $golongan)
        //         ->with('atlet_fix', $atlet_fix);
    }
}
