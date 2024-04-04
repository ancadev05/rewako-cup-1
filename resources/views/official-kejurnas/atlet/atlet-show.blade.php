@extends('tampilan.tema_utama')

{{-- title --}}
@section('title')
    {{ $atlet->nama_atlet }}
@endsection
{{-- /title --}}

{{-- konten --}}
@section('konten')
    <h3 class="border-bottom border-2 mb-3">{{ $atlet->nama_atlet }}</h3>

    <div class="rounded shadow p-2 border">

        <div class="table-responsive mb-3">
            <table class="table table-borderless">
                <tr>
                    <td width="25%">Nama Atlet</td>
                    <td>: {{ $atlet->nama_atlet }}</td>
                    <td rowspan="10"><img src="{{ asset('storage/foto-atlet/' . $atlet->foto_atlet) }}" alt=""
                            width="200px"></td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td>: {{ $atlet->tempat_lahir }}</td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>: {{ tanggalIndonesia($atlet->tgl_lahir) }}</td>
                </tr>
                <tr>
                    <td>Golongan</td>
                    <td>: {{ $atlet->golongan }}</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>: {{ $atlet->jk }}</td>
                </tr>
                <tr>
                    <td colspan="2" class="border-bottom border-1"><b>Kategori Tanding :</b></td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td>: {{ $atlet->kelas_tanding }}</td>
                </tr>
                <tr>
                    <td colspan="2" class="border-bottom border-1"><b>Kategori Seni :</b></td>
                </tr>
                <tr>
                    <td><label for="seni">Seni</label></td>
                    <td>: {{ $atlet->seni }}</td>
                </tr>
            </table>
        </div>

        <div class="mt-4 mb-3 d-flex justify-content-end">
            <a href="{{ url('/official/atlet') }}" class="btn btn-sm btn-danger">Kembali</a>
        </div>
    </div>
@endsection
