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
            <table class="table table-sm table-striped table-hover w-100" id="atlet">
                <thead class="text-center ">
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama Official</th>
                        <th>Kontingen</th>
                        <th>Alamat</th>
                        <th>Verifikasi</th>
                    </tr>
                </thead>

                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($kontingen as $item)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $item->user->username }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->nama_kontingen }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>
                                <a href="{{ url('/admin-kejurnas/verifikasi-atlet/' . $item->user->username) }}">verifikasi</a>
                            </td>
                        </tr>
                        @php
                            $i++;
                        @endphp
                    @endforeach
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
