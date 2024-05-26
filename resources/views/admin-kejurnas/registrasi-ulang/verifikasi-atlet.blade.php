@extends('tampilan.tema_utama')

{{-- title --}}
@section('title')
    Atlet
@endsection
{{-- /title --}}

{{-- konten --}}
@section('konten')
    <h3 class="border-bottom border-2 mb-3">Verifikasi Berkas</h3>

    <div class="shadow p-2 border rounded">
        <div class="table-responsive">
            <table class="table table-sm table-striped table-hover" id="atlet">
                <thead class="text-center ">
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nama Atlet</th>
                        <th>JK</th>
                        <th>Golongan</th>
                        <th>Kelas Tanding</th>
                        <th>Seni</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>1.</td>
                        <td></td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('datatables')
    <script>
        $(document).ready(function() {
            $('#atlet').DataTable();
        });
        $('#atlet').DataTable({
            select: true
        });
    </script>
@endsection
