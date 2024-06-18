@extends('tampilan.tema_utama')

{{-- title --}}
@section('title')
    Admin | Verifikasi Berkas
@endsection
{{-- /title --}}

{{-- konten --}}
@section('konten')
    <h3 class="border-bottom border-2 mb-3">Verifikasi Berkas Atlet</h3>

    {{-- data kontingen --}}
    <div class="shadow p-2 border rounded mb-3">
        <div class="table-responsive">
            <table class="table table-sm">
                @foreach ($kontingen as $item)
                <tr>
                    <td rowspan="5"><img src="{{ asset('storage/foto-official/' . $item->foto_official) }}" alt="img" srcset="" width="100px"></td>
                    <td>Username</td>
                    <td>: {{ $item->user->username }}</td>
                </tr>
                <tr>
                    <td>Nama Official</td>
                    <td>: {{ $item->user->name }}</td>
                </tr>
                <tr>
                    <td>Kontingen</td>
                    <td>: {{ $item->nama_kontingen }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>: {{ $item->alamat }}</td>
                </tr>
                <tr>
                    <td>No WA</td>
                    <td>: {{ $item->user->no_wa }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>

    {{-- data atlet --}}
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
                        <th>S. Rekom</th>
                        <th>Akte/Ijazah</th>
                        <th>S. Izin</th>
                        <th>S. Sehat</th>
                        <th>S. Pernyataan</th>
                        <th>Ket</th>
                    </tr>
                </thead>

                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($atlet as $item)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>
                                <img src="{{ asset('storage/foto-atlet/' . $item->foto_atlet) }}" alt="img"
                                    srcset="" width="60px">
                            </td>
                            <td>{{ $item->nama_atlet }}</td>
                            <td>{{ $item->jk }}</td>
                            <td>{{ $item->golongan }}</td>
                            <td>{{ $item->kelas_tanding }}</td>
                            <td>{{ $item->seni }}</td>
                            <td><input type="checkbox" name="" id="" class="form-check-input"></td>
                            <td><input type="checkbox" name="" id="" class="form-check-input"></td>
                            <td><input type="checkbox" name="" id="" class="form-check-input"></td>
                            <td><input type="checkbox" name="" id="" class="form-check-input"></td>
                            <td><input type="checkbox" name="" id="" class="form-check-input"></td>
                            <td>submit</td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>

    <buttton class="btn btn-sm btn-danger mt-3" onclick="back()">Kembali</buttton>
@endsection

@section('datatables')
    <script>
        $(document).ready(function() {
            $('#atlet').DataTable();
        });
        $('#atlet').DataTable({
            select: true
        });

        function back() {
            window.history.back()
        }
    </script>
@endsection
