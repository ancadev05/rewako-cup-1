<?php

namespace App\Http\Controllers;

use App\Models\Atlet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AtletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $username = Auth::user()->username;
        $carikontingen = DB::table('kontingens')->where('id_username_official', $username)->get()[0];
        $atlet = DB::table('atlets')->where('id_username_official', $username)->get();
        $kontingen = $carikontingen->nama_kontingen;

        // $atlet = Atlet::get();

        return view('official-kejurnas.atlet.index')
        ->with('atlet', $atlet)
        ->with('kontingen', $kontingen);
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

        // $request->validate(
        //     [
        //         'nama_atlet' => 'required',
        //         'tempat_lahir' => 'required',
        //         'tgl_lahir' => 'required',
        //         'jk' => 'required',
        //         'id_username_official' => 'required',
        //         'golongan' =>  'required',
        //         'berat_badan' =>  'required',
        //         'kelas_tanding' => 'required',
        //         'seni' => 'required',
        //         'foto_atlet' => 'required',
        //         'akte' => 'required',
        //     ],
        //     [
        //         'nama_atlet' => 'wajib diisi*',
        //         'tempat_lahir' => 'wajib diisi*',
        //         'tgl_lahir' => 'wajib diisi*',
        //         'id_username_official' => 'wajib diisi*',
        //         'golongan' => 'wajib diisi*',
        //         'kontingen' => 'wajib diisi*',
        //         'kelas_tanding' => 'wajib diisi*',
        //         'seni' => 'wajib diisi*',
        //         'foto_atlet' => 'wajib diisi*',
        //         'akte' => 'wajib diisi*',
        //     ]
        // );

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

        $suket_izin = false;
        // Jika user upload suket izin
        if ($request->hasFile('suket_izin')) {

            // Validasi gambar
            $suket_izin_file = $request->file('suket_izin'); // mengambil file dari form
            $suket_izin = date('ymdhis') . '.' . $suket_izin_file->getClientOriginalExtension(); // meriname file, antisipasi nama file double
            $suket_izin_file->storeAs('public/suket-izin/', $suket_izin); // memindahkan file ke folder public agar bisa diakses
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
            'golongan' => $request->golongan,
            'kontingen' => $kontingen->nama_kontingen,
            'berat_badan' => $request->berat_badan,
            'kelas_tanding' => $request->kelas_tanding,
            'seni' => $request->seni,
            'foto_atlet' => $foto,
            'akte' => $akte,
            'rekomendasi' => $rekomendasi,
            'izin_orangtua' => $suket_izin,
            'suket_sehat' => $suket_sehat
        ];

        // dd($atlet);
        Atlet::create($atlet);

        return redirect()->to('official/atlet')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        return "";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
