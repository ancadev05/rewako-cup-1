@extends('tampilan.tema_utama')

{{-- title --}}
@section('title')
    Atlet
@endsection
{{-- /title --}}

{{-- konten --}}
@section('konten')
    <h3 class="">Daftar Atlet</h3>
    {{-- @if (Auth::user()->level == 'official') --}}
        <h5>Kontingen : {{ $kontingen}}</h5>
    {{-- @endif --}}

    <div class="mb-2 d-flex justify-content-end">
        <a href="{{ url('/official/atlet') }}" class="btn btn-sm btn-primary">Tambah Atlet<i
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
                    <span class="text-white">
                        <?php $i = 1; ?>
                    </span>
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
                                <a href="{{ url('/official/atlet') }}" class="btn btn-warning"
                                    style="--bs-btn-padding-y:.25rem; --bs-btn-padding-x:.25rem;--bs-btn-font-size:.70rem;"><i
                                        class="fas fa-edit"></i></a>
                                <button class="btn btn-danger"
                                    style="--bs-btn-padding-y:.25rem; --bs-btn-padding-x:.25rem;--bs-btn-font-size:.70rem;"><i
                                        class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        {{ $i++ }}
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
