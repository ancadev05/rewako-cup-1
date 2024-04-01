@extends('tampilan.tema_utama')

{{-- title --}}
@section('title')
    Admin | Invoice
@endsection
{{-- /title --}}

{{-- konten --}}
@section('konten')
    <h3 class="mb-3">Status Pembayaran Official</h3>

    <div class="mb-2 d-flex justify-content-end">
        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#tambahUser">Tambah User <i
                class="fa fa-plus ms-2"></i></button>
    </div>

    <div class="shadow p-2 border rounded">
        <div class="table-responsive">
            <table class="table table-sm table-striped table-hover">
                <thead class="text-center ">
                    <tr>
                        <th>No</th>
                        <th>Nama Official</th>
                        <th>Kontingen</th>
                        <th>No. Invoice</th>
                        <th>Aksi</th>
                        <th>Ket.</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($invoice as $item)
                        <tr>
                            <td>1</td>
                            <td>{{ $item->nama_official }}</td>
                            <td>{{ $item->id_kontingen }}</td>
                            <td>{{ $item->id_username_official }}</td>
                            <td class="text-center">
                                @if ($item->pembayaran == 0)
                                    <form action="{{ url('/admin-kejurnas/invoice/' . $item->id) }}" method="post">
                                        @csrf
                                        <button class="btn btn-sm btn-outline-danger">
                                            <i class="fas fa-toggle-off" style="font-size: 20px"></i>
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ url('/admin-kejurnas/invoice/' . $item->id) }}" method="post">
                                        @csrf
                                        <button class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-toggle-on" style="font-size: 20px"></i>
                                        </button>
                                    </form>
                                @endif
                            </td>
                            <td>
                                @if ($item->pembayaran == 0)
                                    <span class="text-danger fw-bold"> <i class="fas fa-exclamation-circle"></i> Pending...</span>
                                @else
                                    <span class="text-success fw-bold"><i class="fas fa-check-circle"></i> Lunas</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection {{-- /konten --}}