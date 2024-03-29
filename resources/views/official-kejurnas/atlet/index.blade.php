@extends('tampilan.tema_utama')

{{-- title --}}
@section('title')
    Atlet
@endsection
{{-- /title --}}

{{-- konten --}}
@section('konten')
    <h3 class="">Daftar Atlet</h3>
    <h5>Kontingen : Gowa A</h5>

    <div class="mb-2 d-flex justify-content-end">
        <a href="{{ url('/official/atlet-tambah') }}" class="btn btn-sm btn-primary">Tambah Atlet<i
                class="fa fa-plus ms-2"></i></a>
    </div>

    <div class="shadow p-2 border rounded">
        <div class="table-responsive">
            <table class="table table-sm table-striped table-hover">
                <thead class="text-center ">
                    <tr>
                        <th>No</th>
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
                    <?php $i=1;?>
                    @foreach ($atlet as $item)
                        <tr>
                            <td class="text-center">{{ $i }}</td>
                            <td>{{ $item->nama_atlet }}</td>
                            <td class="text-center">{{ $item->jk }}</td>
                            <td>{{ $item->golongan }}</td>
                            <td class="text-center">{{ $item->kelas_tanding }}</td>
                            <td>{{ $item->seni }}</td>
                            <td class="text-center"><i class="fas fa-check-circle text-success"></i></td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        {{ $i++ }}
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
