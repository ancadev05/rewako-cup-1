@extends('tampilan.tema_utama')

{{-- title --}}
@section('title')
    Admin | Sudah Bayar
@endsection
{{-- /title --}}

{{-- konten --}}
@section('konten')
    <h3 class="border-bottom border-2 mb-3">Daftar Kontingen</h3>

    <div class="shadow p-2 border rounded">
        <div class="table-responsive">
            <table class="table table-sm table-striped table-hover" id="tbl">
                <thead class="text-center ">
                    <tr>
                        <th>No</th>
                        <th>No.Invoice</th>
                        <th>Nama Official</th>
                        <th>Nama Kontingen</th>
                        <th>Jumlah Atlet</th>
                        <th>Total Pembayaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <span class="text-white">
                        <?php $i = 1; ?>
                    </span>
                    @forelse ($invoice as $item)
                        <tr>
                            <td class="text-center">{{ $i }}</td>
                            <td>{{ $item->id_username_official }}</td>
                            <td>{{ $item->nama_official }}</td>
                            <td>{{ $item->id_kontingen }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>Rp{{ format_uang($item->dp) }}</td>
                            <td class="text-center">
                                <a href="{{ url('/admin-kejurnas/invoice-kontingen/' . $item->id_username_official) }}">invoice</a>
                                {{-- <a href="{{ url('/official/atlet/' . $item->id) }}" class="btn btn-secondary"
                                    style="--bs-btn-padding-y:.25rem; --bs-btn-padding-x:.25rem;--bs-btn-font-size:.70rem;"><i
                                        class="fas fa-eye"></i></a>
                                <a href="{{ url('/official/atlet/' . $item->id . '/edit') }}" class="btn btn-warning"
                                    style="--bs-btn-padding-y:.25rem; --bs-btn-padding-x:.25rem;--bs-btn-font-size:.70rem;"><i
                                        class="fas fa-edit"></i></a> --}}
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

@section('datatables')
    {{-- <script>
        // $(document).ready(function() {
            $("#tbl").DataTable({
                layout: {
                    top: {
                        buttons: ["excel", "pdf", "print"],
                        // buttons: ["copy", "excel", "pdf", "colvis", "print"],
                    },
                }
            });
        // });
    </script> --}}
@endsection
