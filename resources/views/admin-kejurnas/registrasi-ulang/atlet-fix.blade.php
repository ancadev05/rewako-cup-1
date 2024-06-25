@extends('tampilan.tema_utama')

{{-- title --}}
@section('title')
    Admin | Tarik Data
@endsection
{{-- /title --}}

{{-- konten --}}
@section('konten')
    <h3 class="border-bottom border-2 mb-3">Daftar Atlet Fix</h3>

    <div class="shadow p-2 border rounded">
        <div class="table-responsive">
            <table class="table table-sm table-striped table-hover" id="atlet">
                <thead class="text-center ">
                    <tr>
                        <th>#id</th>
                        <th>Nama Atlet</th>
                        <th>JK</th>
                        <th>Golongan</th>
                        <th>Kelas Tanding</th>
                        <th>Seni</th>
                        <th>Kontingen</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($atlet_fix as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nama_atlet }}</td>
                            <td>{{ $item->jk }}</td>
                            <td>{{ $item->golongan }}</td>
                            <td>{{ $item->kelas_tanding}}</td>
                            <td>{{ $item->seni}}</td>
                            <td>{{ $item->kontingen}}</td>
                        </tr>
                    @empty
                        <div class="alert alert-danger">
                            Belum ada atlet yang terdaftar.
                        </div>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('datatables')
    <script>
        // $(document).ready(function() {
            $("#atlet").DataTable({
                layout: {
                    top: {
                        buttons: ["excel", "pdf", "print"],
                        // buttons: ["copy", "excel", "pdf", "colvis", "print"],
                    },
                }
            });
        // });
    </script>
@endsection
