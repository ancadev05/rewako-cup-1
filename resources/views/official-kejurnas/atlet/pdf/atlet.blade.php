<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Data Atlet</title>

    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('storage/img-web/ts.png') }}" type="image/x-icon">

    {{-- Desain Template --}}
    <link href="{{ asset('assets/template-css/styles.css') }}" rel="stylesheet" />
    {{-- Alert animasi --}}
    <link href="{{ asset('assets/costum-style/css-costum.css') }}" rel="stylesheet" />
    {{-- SweetAlert --}}
    <link rel="stylesheet" href="{{ asset('assets/sweetalert/sweetalert2.min.css') }}">
    {{-- datatables --}}
    <link rel="stylesheet" href="{{ asset('assets/datatables/datatables.css') }}">

    <style>
        .page-break {
            page-break-after: always;
        }
        </style>
</head>

<body>

    {{-- data kontingen --}}

    <table class="table table-sm table-borderless">
        <tr>
            <th rowspan="4">
                <img src="{{ asset('storage/foto-official/' . $official->foto_official) }}" alt="belum-upload-foto"
                    width="113.38582677px">
            </th>
            <th>Nama Official</th>
            <th>: {{ $official->name }}</th>
        </tr>
        <tr>
            <th>Nomor HP</th>
            <th>: {{ $official->no_wa }}</th>
        </tr>
        <tr>
            <th>Nama Kontingen</th>
            <th>: {{ $kontingen->nama_kontingen }}</th>
        </tr>
        <tr>
            <th>Alamat</th>
            <th>: {{ $kontingen->alamat }}</th>
        </tr>
    </table>
    <hr>
    <hr>
    {{-- /data kontingen --}}

    {{-- data atlet --}}
    {{-- atlet pra usia dini --}}
    <div class="mt-3">
        <h5>Atlet Pra Usia Dini</h5>
        @forelse ($atlet_pud as $item)
            <hr>
            <table class="table table-borderless table-sm">
                <tr>
                    <td rowspan="8">
                        <img src="{{ asset('storage/foto-atlet/' . $item->foto_atlet) }}" alt="belum-upload-foto"
                            width="113.38582677px">
                    </td>
                    <td style="width: 35%">Nama Atlet</td>
                    <td>: {{ $item->nama_atlet }}</td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td>: {{ $item->tempat_lahir }}</td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>: {{ tanggalIndonesia(date($item->tgl_lahir)) }}</td>
                </tr>
                <tr>
                    <?php $item->jk == 'PA' ? ($jk = 'Laki-Laki') : ($jk = 'Perempuan'); ?>
                    <td>Jenis Kelamin</td>
                    <td>: {{ $jk }}</td>
                </tr>
                <tr>
                    <td>Golongan</td>
                    <td>: {{ $item->golongan }}</td>
                </tr>
                <tr>
                    <td>Kontingen</td>
                    <td>: {{ $item->kontingen }}</td>
                </tr>
                <tr>
                    <td>Kelas Tanding</td>
                    <td>: {{ $item->kelas_tanding }}</td>
                </tr>
                <tr>
                    <td>Seni</label></td>
                    <td>: {{ $item->seni }}</td>
                </tr>
            </table>
            <hr>
        @empty
            <div class="alert alert-info">Tidak ada atlet terdaftar pada golongan ini.</div>
        @endforelse
    </div>
    {{-- /atlet pra usia dini --}}
    <div class="page-break"></div>
    {{-- atlet usia dini --}}
    <div class="mt-3">
        <h5>Atlet Usia Dini</h5>
        @forelse ($atlet_ud as $item)
            <hr>
            <table class="table table-borderless table-sm">
                <tr>
                    <td rowspan="8">
                        <img src="{{ asset('storage/foto-atlet/' . $item->foto_atlet) }}" alt="belum-upload-foto"
                            width="113.38582677px">
                    </td>
                    <td style="width: 35%">Nama Atlet</td>
                    <td>: {{ $item->nama_atlet }}</td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td>: {{ $item->tempat_lahir }}</td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>: {{ tanggalIndonesia(date($item->tgl_lahir)) }}</td>
                </tr>
                <tr>
                    <?php $item->jk == 'PA' ? ($jk = 'Laki-Laki') : ($jk = 'Perempuan'); ?>
                    <td>Jenis Kelamin</td>
                    <td>: {{ $jk }}</td>
                </tr>
                <tr>
                    <td>Golongan</td>
                    <td>: {{ $item->golongan }}</td>
                </tr>
                <tr>
                    <td>Kontingen</td>
                    <td>: {{ $item->kontingen }}</td>
                </tr>
                <tr>
                    <td>Kelas Tanding</td>
                    <td>: {{ $item->kelas_tanding }}</td>
                </tr>
                <tr>
                    <td>Seni</label></td>
                    <td>: {{ $item->seni }}</td>
                </tr>
            </table>
            <hr>
        @empty
            <div class="alert alert-info">Tidak ada atlet terdaftar pada golongan ini.</div>
        @endforelse
    </div>
    {{-- /atlet usia dini --}}
    {{-- atlet pra remaja --}}
    <div class="mt-3">
        <h5>Atlet Pra Remaja</h5>
        @forelse ($atlet_pr as $item)
            <hr>
            <table class="table table-borderless table-sm">
                <tr>
                    <td rowspan="8">
                        <img src="{{ asset('storage/foto-atlet/' . $item->foto_atlet) }}" alt="belum-upload-foto"
                            width="113.38582677px">
                    </td>
                    <td style="width: 35%">Nama Atlet</td>
                    <td>: {{ $item->nama_atlet }}</td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td>: {{ $item->tempat_lahir }}</td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>: {{ tanggalIndonesia(date($item->tgl_lahir)) }}</td>
                </tr>
                <tr>
                    <?php $item->jk == 'PA' ? ($jk = 'Laki-Laki') : ($jk = 'Perempuan'); ?>
                    <td>Jenis Kelamin</td>
                    <td>: {{ $jk }}</td>
                </tr>
                <tr>
                    <td>Golongan</td>
                    <td>: {{ $item->golongan }}</td>
                </tr>
                <tr>
                    <td>Kontingen</td>
                    <td>: {{ $item->kontingen }}</td>
                </tr>
                <tr>
                    <td>Kelas Tanding</td>
                    <td>: {{ $item->kelas_tanding }}</td>
                </tr>
                <tr>
                    <td>Seni</label></td>
                    <td>: {{ $item->seni }}</td>
                </tr>
            </table>
            <hr>
        @empty
            <div class="alert alert-info">Tidak ada atlet terdaftar pada golongan ini.</div>
        @endforelse
    </div>
    {{-- /atlet pra remaja --}}
    {{-- atlet remaja --}}
    <div class="mt-3">
        <h5>Atlet Remaja</h5>
        @forelse ($atlet_r as $item)
            <hr>
            <table class="table table-borderless table-sm">
                <tr>
                    <td rowspan="8">
                        <img src="{{ asset('storage/foto-atlet/' . $item->foto_atlet) }}" alt="belum-upload-foto"
                            width="113.38582677px">
                    </td>
                    <td style="width: 35%">Nama Atlet</td>
                    <td>: {{ $item->nama_atlet }}</td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td>: {{ $item->tempat_lahir }}</td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>: {{ tanggalIndonesia(date($item->tgl_lahir)) }}</td>
                </tr>
                <tr>
                    <?php $item->jk == 'PA' ? ($jk = 'Laki-Laki') : ($jk = 'Perempuan'); ?>
                    <td>Jenis Kelamin</td>
                    <td>: {{ $jk }}</td>
                </tr>
                <tr>
                    <td>Golongan</td>
                    <td>: {{ $item->golongan }}</td>
                </tr>
                <tr>
                    <td>Kontingen</td>
                    <td>: {{ $item->kontingen }}</td>
                </tr>
                <tr>
                    <td>Kelas Tanding</td>
                    <td>: {{ $item->kelas_tanding }}</td>
                </tr>
                <tr>
                    <td>Seni</label></td>
                    <td>: {{ $item->seni }}</td>
                </tr>
            </table>
            <hr>
        @empty
            <div class="alert alert-info">Tidak ada atlet terdaftar pada golongan ini.</div>
        @endforelse
    </div>
    {{-- /atlet remaja --}}
    {{-- atlet dewasa --}}
    <div class="mt-3">
        <h5>Atlet Dewasa</h5>
        @forelse ($atlet_d as $item)
            <hr>
            <table class="table table-borderless table-sm">
                <tr>
                    <td rowspan="8">
                        <img src="{{ asset('storage/foto-atlet/' . $item->foto_atlet) }}" alt="belum-upload-foto"
                            width="113.38582677px">
                    </td>
                    <td style="width: 35%">Nama Atlet</td>
                    <td>: {{ $item->nama_atlet }}</td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td>: {{ $item->tempat_lahir }}</td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>: {{ tanggalIndonesia(date($item->tgl_lahir)) }}</td>
                </tr>
                <tr>
                    <?php $item->jk == 'PA' ? ($jk = 'Laki-Laki') : ($jk = 'Perempuan'); ?>
                    <td>Jenis Kelamin</td>
                    <td>: {{ $jk }}</td>
                </tr>
                <tr>
                    <td>Golongan</td>
                    <td>: {{ $item->golongan }}</td>
                </tr>
                <tr>
                    <td>Kontingen</td>
                    <td>: {{ $item->kontingen }}</td>
                </tr>
                <tr>
                    <td>Kelas Tanding</td>
                    <td>: {{ $item->kelas_tanding }}</td>
                </tr>
                <tr>
                    <td>Seni</label></td>
                    <td>: {{ $item->seni }}</td>
                </tr>
            </table>
            <hr>
        @empty
            <div class="alert alert-info">Tidak ada atlet terdaftar pada golongan ini.</div>
        @endforelse
    </div>
    {{-- /atlet dewasa --}}
    {{-- atlet master --}}
    <div class="mt-3">
        <h5>Atlet Master</h5>
        @forelse ($atlet_m as $item)
            <hr>
            <table class="table table-borderless table-sm">
                <tr>
                    <td rowspan="8">
                        <img src="{{ asset('storage/foto-atlet/' . $item->foto_atlet) }}" alt="belum-upload-foto"
                            width="113.38582677px">
                    </td>
                    <td style="width: 35%">Nama Atlet</td>
                    <td>: {{ $item->nama_atlet }}</td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td>: {{ $item->tempat_lahir }}</td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>: {{ tanggalIndonesia(date($item->tgl_lahir)) }}</td>
                </tr>
                <tr>
                    <?php $item->jk == 'PA' ? ($jk = 'Laki-Laki') : ($jk = 'Perempuan'); ?>
                    <td>Jenis Kelamin</td>
                    <td>: {{ $jk }}</td>
                </tr>
                <tr>
                    <td>Golongan</td>
                    <td>: {{ $item->golongan }}</td>
                </tr>
                <tr>
                    <td>Kontingen</td>
                    <td>: {{ $item->kontingen }}</td>
                </tr>
                <tr>
                    <td>Kelas Tanding</td>
                    <td>: {{ $item->kelas_tanding }}</td>
                </tr>
                <tr>
                    <td>Seni</label></td>
                    <td>: {{ $item->seni }}</td>
                </tr>
            </table>
            <hr>
        @empty
            <div class="alert alert-info">Tidak ada atlet terdaftar pada golongan ini.</div>
        @endforelse
    </div>
    {{-- /atlet master --}}
    {{-- /data official dan atlet --}}


    {{-- Jquery --}}
    <script src="{{ asset('assets/jquery/jquery-3.7.1.min.js') }}"></script>

    {{-- JS Costum --}}
    <script src="{{ asset('assets/template-js/scripts.js') }}"></script>

    {{-- Bootstrap 5 --}}
    {{-- <script src="{{ asset('assets/bootstrap5/js/bootstrap.js') }}"></script> --}}
    <script src="{{ asset('assets/bootstrap5/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap5/js/popper.min.js') }}"></script>

    {{-- SweetAlert --}}
    <script src="{{ asset('assets/sweetalert/sweetalert2.all.min.js') }}"></script>

    {{-- Script Costum --}}
    <script src="{{ asset('assets/template-js/script-costum.js') }}"></script>

    {{-- datatables --}}
    <script src="{{ asset('assets/datatables/datatables.js') }}"></script>
</body>

</html>
