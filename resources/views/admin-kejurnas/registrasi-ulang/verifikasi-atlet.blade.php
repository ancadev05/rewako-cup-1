@extends('tampilan.tema_utama')

{{-- title --}}
@section('title')
    Admin | Verifikasi Berkas
@endsection
{{-- /title --}}

{{-- konten --}}
@section('konten')
    <h3 class="border-bottom border-2 mb-3">Verifikasi Berkas Kontingen Atlet</h3>

    {{-- data kontingen --}}
    <div class="shadow p-2 border rounded mb-3">
        <div class="table-responsive">
            <table class="table table-sm">
                <tr>
                    <td rowspan="6"><img src="{{ asset('storage/foto-official/' . $kontingen->user->foto_official) }}"
                            alt="img" srcset="" width="100px"></td>
                    <td>Username</td>
                    <td>: {{ $kontingen->user->username }}</td>
                </tr>
                <tr>
                    <td>Nama Official</td>
                    <td>: {{ $kontingen->user->name }}</td>
                </tr>
                <tr>
                    <td>Kontingen</td>
                    <td>: {{ $kontingen->nama_kontingen }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>: {{ $kontingen->alamat }}</td>
                </tr>
                <tr>
                    <td>No WA</td>
                    <td>: {{ $kontingen->user->no_wa }}</td>
                </tr>
                <tr>
                    <td>Jumlah Atlet</td>
                    <td>: {{ $jml_atlet }}</td>
                </tr>
            </table>
        </div>
    </div>

    <div class="shadow p-2 border rounded mb-3">
        <h3>Total Pembayaran</h3>
        <h3>Rp{{ format_uang($total_biaya) }},-</h3>
    </div>

    {{-- melihat data duplikat perkontingen --}}
    @if (count($duplikat_kelas) > 0)
        <div class="mb-2">
            <div class="alert alert-danger border-0 border-start border-5 border-danger shadow">
                @foreach ($duplikat_kelas as $item)
                    <ul>
                        <li>
                            <i class="fas fa-exclamation-triangle text-warning"></i> Maaf, Anda memiliki pesilat yang
                            memiliki golongan dan kategori yang sama di kontingen <b>{{ $item->kontingen }}</b> pada
                            golongan
                            <b>{{ $item->golongan }}</b> kategori tanding/seni
                            <b>{{ $item->kelas_tanding }}</b><b>/{{ $item->jk }}</b>. </br>
                        </li>
                    </ul>
                @endforeach
                Silahkan hapus salah
                satunya atau daftarkan di kontingen lain
            </div>
        </div>
    @endif
    {{-- melihat data duplikat perkontingen --}}

    {{-- data atlet --}}
    <div class="shadow p-2 border rounded">
        <div class="table-responsive">
            <table class="table table-sm table-striped table-hover w-100" id="atlet">
                <thead class="text-center ">
                    <tr>
                        <th>#id</th>
                        <th>Foto</th>
                        <th>Nama Atlet</th>
                        <th>JK</th>
                        <th>Golongan</th>
                        <th>Kelas Tanding</th>
                        <th>Seni</th>
                        <th>Ket</th>
                    </tr>
                </thead>

                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($atlet as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>
                                <img src="{{ asset('storage/foto-atlet/' . $item->foto_atlet) }}" alt="img"
                                    srcset="" width="60px">
                            </td>
                            <td>{{ $item->nama_atlet }}</td>
                            <td>{{ $item->jk }}</td>
                            <td>{{ $item->golongan }}</td>
                            <td>{{ $item->kelas_tanding }}</td>
                            <td>{{ $item->seni }}</td>
                            <td>
                                <a href="{{ url('/admin-kejurnas/verifikasi-per-atlet/' . $item->id) }}">Verifikasi</a>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>

    <div class="d-flex justify-content-end mt-3">
        <buttton class="btn btn-sm btn-danger me-2" onclick="back()">Kembali</buttton>
        {{-- jika mau ekspor pdf --}}
        {{-- <a class="btn btn-sm btn-warning" href="{{ url('/admin-kejurnas/id-card/' . $kontingen->user->username) }} ?export=pdf">Cetak Id Card</a> --}}
        <a class="btn btn-sm btn-warning" href="{{ url('/admin-kejurnas/id-card/' . $kontingen->user->username) }}">Cetak
            Id Card</a>
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

        function back() {
            window.history.back()
        }
    </script>
@endsection
