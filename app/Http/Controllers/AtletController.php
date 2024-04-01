<?php

namespace App\Http\Controllers;

use App\Models\Atlet;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AtletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // menentukan username
        $username = Auth::user()->username;

        // menentukan nama kontingen
        $carikontingen = DB::table('kontingens')->where('id_username_official', $username)->get()[0];
        $kontingen = $carikontingen->nama_kontingen;

        $atlet = Atlet::where('id_username_official', $username)->paginate();

        // status pembayaran invoice
        $invoice = Invoice::where('id_username_official', $username)->get()->first();

        return view('official-kejurnas.atlet.index')
            ->with('atlet', $atlet)
            ->with('kontingen', $kontingen)
            ->with('invoice', $invoice);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('official-kejurnas.atlet.atlet-tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $username = Auth::user()->username;
        $kontingen = DB::table('kontingens')->where('id_username_official', $username)->get()[0];

        $request->validate(
            [
                'nama_atlet' => 'required',
                'tempat_lahir' => 'required',
                'tgl_lahir' => 'required',
                'jk' => 'required',
                'id_username_official' => 'required',
                'golongan' =>  'required',
                'foto_atlet' => 'required',
                'foto_atlet' => 'file|image|mimes:jpg,jpeg,png,JPG,JPEG,PNG|max:2048',
                'akte' => 'required',
                'rekomendasi' => 'required',
                'izin_orangtua' => 'required',
                'suket_sehat' => 'required'
            ],
            [
                'nama_atlet' => 'wajib diisi*',
                'tempat_lahir' => 'wajib diisi*',
                'tgl_lahir' => 'wajib diisi*',
                'id_username_official' => 'wajib diisi*',
                'golongan' => 'wajib diisi*',
                'foto_atlet' => 'wajib diisi*',
                'akte' => 'wajib diisi*',
                'foto_atlet:required' => 'wajib diisi',
                'foto_atlet:mimes' => 'format file tidak sesuai',
                'foto_atlet:max' => 'ukuran foto maksimal 2MB',
                'rekomendasi' => 'wajib diisi',
                'izin_orangtua' => 'wajib diisi',
                'suket_sehat' => 'wajib diisi'
            ]
        );

        // pengisian kolom bantu
        $golongan = ambilHurufAwal($request->golongan);
        $jk = $request->jk;
        $kelas = $request->kelas_tanding;
        $seni = ambilHurufAwal($request->seni);

        $bantu = $golongan . '-' . $jk . '-' . $kelas . '-' . $seni;

        // verifikasi berkas
        $foto = false;
        // Jika user upload foto
        if ($request->hasFile('foto_atlet')) {

            // Validasi gambar
            $foto_file = $request->file('foto_atlet'); // mengambil file dari form
            $foto = date('ymdhis') . '.' . $foto_file->getClientOriginalExtension(); // meriname file, antisipasi nama file double
            $foto_file->storeAs('public/foto-atlet/', $foto); // memindahkan file ke folder public agar bisa diakses
        }

        $akte = false;
        // Jika user upload akte
        if ($request->hasFile('akte')) {

            // Validasi gambar
            $akte_file = $request->file('akte'); // mengambil file dari form
            $akte = date('ymdhis') . '.' . $akte_file->getClientOriginalExtension(); // meriname file, antisipasi nama file double
            $akte_file->storeAs('public/akte/', $akte); // memindahkan file ke folder public agar bisa diakses
        }

        $rekomendasi = false;
        // Jika user upload surat rekoomendasi
        if ($request->hasFile('rekomendasi')) {

            // Validasi gambar
            $rekomendasi_file = $request->file('rekomendasi'); // mengambil file dari form
            $rekomendasi = date('ymdhis') . '.' . $rekomendasi_file->getClientOriginalExtension(); // meriname file, antisipasi nama file double
            $rekomendasi_file->storeAs('public/rekomendasi/', $rekomendasi); // memindahkan file ke folder public agar bisa diakses
        }

        $izin_orangtua = false;
        // Jika user upload suket izin
        if ($request->hasFile('izin_orangtua')) {

            // Validasi gambar
            $izin_orangtua_file = $request->file('izin_orangtua'); // mengambil file dari form
            $izin_orangtua = date('ymdhis') . '.' . $izin_orangtua_file->getClientOriginalExtension(); // meriname file, antisipasi nama file double
            $izin_orangtua_file->storeAs('public/suket-izin/', $izin_orangtua); // memindahkan file ke folder public agar bisa diakses
        }

        $suket_sehat = false;
        // Jika user upload suket sehat
        if ($request->hasFile('suket_sehat')) {

            // Validasi gambar
            $suket_sehat_file = $request->file('suket_sehat'); // mengambil file dari form
            $suket_sehat = date('ymdhis') . '.' . $suket_sehat_file->getClientOriginalExtension(); // meriname file, antisipasi nama file double
            $suket_sehat_file->storeAs('public/suket-sehat/', $suket_sehat); // memindahkan file ke folder public agar bisa diakses
        }


        $atlet = [
            'nama_atlet' => $request->nama_atlet,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'jk' => $request->jk,
            'id_username_official' => $username,
            'kontingen' => $kontingen,
            'bantu' => $bantu,
            'golongan' => $request->golongan,
            'berat_badan' => $request->berat_badan,
            'kelas_tanding' => $request->kelas_tanding,
            'seni' => $request->seni,
            'foto_atlet' => $foto,
            'akte' => $akte,
            'rekomendasi' => $rekomendasi,
            'izin_orangtua' => $izin_orangtua,
            'suket_sehat' => $suket_sehat
        ];

        dd($atlet);
        Atlet::create($atlet);

        return redirect()->to('official/atlet')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $kalimat = "Belajar PHP dengan Copilot";
        $kata_array = explode(" ", $kalimat);
        $kata_pertama_setiap_kata = ucwords($kalimat);
        echo $kata_pertama_setiap_kata; // Output: Belajar PHP Dengan Copilot

        $tgl = date('l, d M Y');
        $tgl2 = date('Y-m-d');
        // $tanggal = tanggalIndonesia(date('2024-04-01'));
        $tanggal2 = tanggalIndonesia($tgl2);

        dd($tanggal2);


        $atlet = Atlet::where('id', $id)->first();

        return view('official-kejurnas.atlet.atlet-show')->with('atlet', $atlet);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $atlet = Atlet::where('id', $id)->first();

        return view('official-kejurnas.atlet.atlet-edit')->with('atlet', $atlet);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $username = Auth::user()->username;
        // $kontingen = DB::table('kontingens')->where('id_username_official', $username)->get()[0];

        $request->validate(
            [
                'nama_atlet' => 'required',
                'tempat_lahir' => 'required',
                'tgl_lahir' => 'required',
                'jk' => 'required',
                'id_username_official' => 'required',
                'golongan' =>  'required',
                'foto_atlet' => 'file|image|mimes:jpg,jpeg,png,JPG,JPEG,PNG|max:2048'
            ],
            [
                'nama_atlet' => 'wajib diisi*',
                'tempat_lahir' => 'wajib diisi*',
                'tgl_lahir' => 'wajib diisi*',
                'id_username_official' => 'wajib diisi*',
                'golongan' => 'wajib diisi*'
            ]
        );

        // validasi file baru
        // validasi foto

        $foto = false;
        // Jika user upload foto
        if ($request->hasFile('foto_atlet')) {

            // Validasi gambar
            $foto_file = $request->file('foto_atlet'); // mengambil file dari form
            $foto = date('ymdhis') . '.' . $foto_file->getClientOriginalExtension(); // meriname file, antisipasi nama file double
            $foto_file->storeAs('public/foto-atlet/', $foto); // memindahkan file ke folder public agar bisa diakses

            // hapus file lama
            Storage::delete('public/foto-etlet/' . $request->foto_atlet_lama);

            $atlet['foto_atlet'] = $foto;
            Atlet::where('id', $id)->update($atlet);
        } else {
            $atlet['foto_atlet'] = $request->foto_atlet_lama;
        }

        $akte = false;
        // Jika user upload akte
        if ($request->hasFile('akte')) {

            // Validasi gambar
            $akte_file = $request->file('akte'); // mengambil file dari form
            $akte = date('ymdhis') . '.' . $akte_file->getClientOriginalExtension(); // meriname file, antisipasi nama file double
            $akte_file->storeAs('public/akte/', $akte); // memindahkan file ke folder public agar bisa diakses
        }

        $rekomendasi = false;
        // Jika user upload surat rekoomendasi
        if ($request->hasFile('rekomendasi')) {

            // Validasi gambar
            $rekomendasi_file = $request->file('rekomendasi'); // mengambil file dari form
            $rekomendasi = date('ymdhis') . '.' . $rekomendasi_file->getClientOriginalExtension(); // meriname file, antisipasi nama file double
            $rekomendasi_file->storeAs('public/rekomendasi/', $rekomendasi); // memindahkan file ke folder public agar bisa diakses
        }

        $izin_orangtua = false;
        // Jika user upload suket izin
        if ($request->hasFile('izin_orangtua')) {

            // Validasi gambar
            $izin_orangtua_file = $request->file('izin_orangtua'); // mengambil file dari form
            $izin_orangtua = date('ymdhis') . '.' . $izin_orangtua_file->getClientOriginalExtension(); // meriname file, antisipasi nama file double
            $izin_orangtua_file->storeAs('public/suket-izin/', $izin_orangtua); // memindahkan file ke folder public agar bisa diakses
        }

        $suket_sehat = false;
        // Jika user upload suket sehat
        if ($request->hasFile('suket_sehat')) {

            // Validasi gambar
            $suket_sehat_file = $request->file('suket_sehat'); // mengambil file dari form
            $suket_sehat = date('ymdhis') . '.' . $suket_sehat_file->getClientOriginalExtension(); // meriname file, antisipasi nama file double
            $suket_sehat_file->storeAs('public/suket-sehat/', $suket_sehat); // memindahkan file ke folder public agar bisa diakses
        }

        $atlet = [
            'nama_atlet' => $request->nama_atlet,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'jk' => $request->jk,
            'golongan' => $request->golongan,
            'berat_badan' => $request->berat_badan,
            'kelas_tanding' => $request->kelas_tanding,
            'seni' => $request->seni,
            'foto_atlet' => $foto,
            'akte' => $akte,
            'rekomendasi' => $rekomendasi,
            'izin_orangtua' => $izin_orangtua,
            'suket_sehat' => $suket_sehat
        ];

        // dd($atlet);
        Atlet::where('id', $id)->update($atlet);

        return redirect()->to('official/atlet')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Atlet::where('id', $id)->delete();

        return redirect()->to('official/atlet')->with('success', 'Data berhasil dihapus');
    }
}
