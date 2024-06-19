@extends('tampilan.tema_utama')

{{-- title --}}
@section('title')
    Admin | Kontingen
@endsection
{{-- /title --}}

{{-- konten --}}
@section('konten')
    <h3 class="border-bottom border-2 mb-3">Daftar Kontingen</h3>

    <div class="shadow p-2 border rounded">
        <div class="table-responsive">
            <table class="table table-sm table-striped table-hover">
                <thead class="text-center ">
                    <tr>
                        <th>No</th>
                        <th>Nama Kontingen</th>
                        <th>Alamat</th>
                        <th>Jumlah Atlet</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <span class="text-white">
                        <?php $i = 1; ?>
                    </span>
                    @forelse ($jml_atlet_kontingen as $item)
                    {{-- @forelse ($kontingen as $item) --}}
                        <tr>
                            <td class="text-center">{{ $i }}</td>
                            <td>{{ $item->id_username_official }}</td>
                            <td>{{ $item->kontingen }}</td>
                            <td>{{ $item->jumlah_atlet }}</td>
                            <td class="text-center">
                                {{-- <a href="{{ url('/official/atlet/' . $item->id) }}" class="btn btn-secondary"
                                    style="--bs-btn-padding-y:.25rem; --bs-btn-padding-x:.25rem;--bs-btn-font-size:.70rem;"><i
                                        class="fas fa-eye"></i></a>
                                <a href="{{ url('/official/atlet/' . $item->id . '/edit') }}" class="btn btn-warning"
                                    style="--bs-btn-padding-y:.25rem; --bs-btn-padding-x:.25rem;--bs-btn-font-size:.70rem;"><i
                                        class="fas fa-edit"></i></a>
                                <form action="{{ url('/official/atlet/' . $item->id) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Anda yakin ingin hapus data?')">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger"
                                        style="--bs-btn-padding-y:.25rem; --bs-btn-padding-x:.25rem;--bs-btn-font-size:.70rem;"><i
                                            class="fas fa-trash-alt"></i></button>
                                </form> --}}
                            </td>
                        </tr>
                        <?php $i++; ?>
                    @empty
                        <div class="alert alert-danger">
                            Belum ada kontingen yang terdaftar.
                        </div>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
@endsection {{-- /konten --}}
