<?php

namespace App\Http\Controllers;

use App\Models\Atlet;
use Illuminate\Http\Request;

class AtletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $atlet = Atlet::get();
        return view('official-kejurnas.atlet.index')->with('atlet', $atlet);
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

        $request->validate(
            [
                'nama_atlet' => 'required',
                'tempat_lahir' => 'required',
                'tgl_lahir' => 'required',
                'jk' => 'required',
                'id_username_official' => 'required',
                'golongan' => 'required',
                'kelas_tanding' => 'required',
                'seni' => 'required',
                'foto_atlet' => 'required',
                'akte' => 'required',
            ],[
                'nama_atlet' => 'wajib diisi*',
                'tempat_lahir' => 'wajib diisi*',
                'tgl_lahir' => 'wajib diisi*',
                'id_username_official' => 'wajib diisi*',
                'id_golongan' => 'wajib diisi*',
                'id_kontingen' => 'wajib diisi*',
                'id_kelas_tanding' => 'wajib diisi*',
                'id_seni' => 'wajib diisi*',
                'foto_atlet' => 'wajib diisi*',
                'akte' => 'wajib diisi*',
            ]
        );

        $foto = false;
        // Jika user upload foto
        if ($request->hasFile('gambar')) {

            // Validasi gambar
            $foto_file = $request->file('foto'); // mengambil file dari form
            $foto = date('ymdhis') . '.' . $foto_file->getClientOriginalExtension(); // meriname file, antisipasi nama file double
            $foto_file->storeAs('public/foto-atlet/', $foto); // memindahkan file ke folder public agar bisa diakses
        }

        $atlet = [
            'nama_atlet' => $request->nama_atlet,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'jk' => $request->jk,
            'id_username_official' => $request->id_username_official,
            'id_golongan' => $request->id_golongan,
            'id_kontingen' => $request->id_kontingen,
            'id_kelas_tanding' => $request->id_kelas_tanding,
            'id_seni' => $request->id_seni,
            'foto_atlet' => $foto
        ];

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
