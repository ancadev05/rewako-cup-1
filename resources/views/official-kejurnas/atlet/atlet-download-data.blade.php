@extends('tampilan.tema_utama')

{{-- title --}}
@section('title')
    Download Data Atlet
@endsection
{{-- /title --}}

{{-- konten --}}
@section('konten')
<button class="btn btn-sm btn-success mb-4"
        onclick="return printArea(print)"><i class="fas fa-file-download"></i> Download</button>

<div id="print">
    {{-- data kontingen --}}

    <div class="table-responsive">
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
    </div>
    <hr>
    <hr>
    {{-- /data kontingen --}}

    {{-- data atlet --}}
    {{-- atlet pra usia dini --}}
    <div class="mt-3">
        <h5>Atlet Pra Usia Dini</h5>
        @forelse ($atlet_pud as $item)
            <hr>
            <div class="table-responsive">
                <table class="table table-borderless table-sm">
                    <tr>
                        <td rowspan="8" width="180px">
                            <img src="{{ asset('storage/foto-atlet/' . $item->foto_atlet) }}" alt="belum-upload-foto"
                                width="113.38582677px">
                        </td>
                        <td width="200px">Nama Atlet</td>
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
            </div>
            <hr>
        @empty
            <div class="alert alert-info">Tidak ada atlet terdaftar pada golongan ini.</div>
        @endforelse
    </div>
    {{-- /atlet pra usia dini --}}
    <div class="page-break"></div>
    {{-- atlet usia dini --}}
    <div class="mt-3">
        <h5>Atlet Usia Dinii</h5>
        @forelse ($atlet_ud as $item)
            <hr>
            <div class="table-responsive">
                <table class="table table-borderless table-sm">
                    <tr>
                        <td rowspan="8" width="180px">
                            <img src="{{ asset('storage/foto-atlet/' . $item->foto_atlet) }}" alt="belum-upload-foto"
                                width="113.38582677px">
                        </td>
                        <td width="200px">Nama Atlet</td>
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
            </div>
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
            <div class="table-responsive">
                <table class="table table-borderless table-sm">
                    <tr>
                        <td rowspan="8" width="180px">
                            <img src="{{ asset('storage/foto-atlet/' . $item->foto_atlet) }}" alt="belum-upload-foto"
                                width="113.38582677px">
                        </td>
                        <td width="200px">Nama Atlet</td>
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
            </div>
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
            <div class="table-responsive">
                <table class="table table-borderless table-sm">
                    <tr>
                        <td rowspan="8" width="180px">
                            <img src="{{ asset('storage/foto-atlet/' . $item->foto_atlet) }}" alt="belum-upload-foto"
                                width="113.38582677px">
                        </td>
                        <td width="200px">Nama Atlet</td>
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
            </div>
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
            <div class="table-responsive">
                <table class="table table-borderless table-sm">
                    <tr>
                        <td rowspan="8" width="180px">
                            <img src="{{ asset('storage/foto-atlet/' . $item->foto_atlet) }}" alt="belum-upload-foto"
                                width="113.38582677px">
                        </td>
                        <td width="200px">Nama Atlet</td>
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
            </div>
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
            <div class="table-responsive">
                <table class="table table-borderless table-sm">
                    <tr>
                        <td rowspan="8" width="180px">
                            <img src="{{ asset('storage/foto-atlet/' . $item->foto_atlet) }}" alt="belum-upload-foto"
                                width="113.38582677px">
                        </td>
                        <td width="200px">Nama Atlet</td>
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
            </div>
            <hr>
        @empty
            <div class="alert alert-info">Tidak ada atlet terdaftar pada golongan ini.</div>
        @endforelse
    </div>
    {{-- /atlet master --}}
    {{-- /data official dan atlet --}}
</div>
    
@endsection
