@extends('tampilan.tema_utama')

{{-- title --}}
@section('title')
    Atlet
@endsection
{{-- /title --}}

{{-- konten --}}
@section('konten')
    <h3 class="mb-3">Daftar Atlet</h3>

    <div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Nama Kontingen</td>
                        <td>Alamat</td>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <div class="mb-2 d-flex justify-content-end">
        <a href="{{ url('/atlet/atlet-tambah') }}" class="btn btn-sm btn-primary">Tambah Atlet<i
                class="fa fa-plus ms-2"></i></a>
    </div>

    <div class="shadow p-2 border rounded">
        <div class="table-responsive">
            <table class="table table-sm table-striped table-hover">
                <thead class="text-center ">
                    <tr>
                        <th>No</th>
                        <th>Nama Kontingen</th>
                        <th>Nama Atlet</th>
                        <th>JK</th>
                        <th>Golongan</th>
                        <th>Kelas Tanding</th>
                        <th>Seni</th>
                        <th>Status <br> Berkas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($atlet as $item)
                        <tr>
                            <td class="text-center">1</td>
                            <td>{{ $item->id_kontingen }}</td>
                            <td>{{ $item->nama_atlet }}</td>
                            <td class="text-center">{{ $item->jk }}</td>
                            <td>{{ $item->id_golongan }}</td>
                            <td class="text-center">{{ $item->id_kelas_tanding }}</td>
                            <td>{{ $item->id_seni }}</td>
                            <td class="text-center"><i class="fas fa-check-circle text-success"></i></td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
