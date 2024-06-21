@extends('tampilan.tema_utama')

{{-- title --}}
@section('title')
    {{ $atlet->nama_atlet }}
@endsection
{{-- /title --}}

{{-- konten --}}
@section('konten')
    <h3 class="border-bottom border-2 mb-3">Data Atlet</h3>

    <div class="rounded shadow p-2 border">

        <div class="table-responsive mb-3">
            <table class="table table-borderless">
                <tr>
                    <td width="25%">Id Atlet</td>
                    <td>: {{ $atlet->id }}</td>
                    <td rowspan="11"><img src="{{ asset('storage/foto-atlet/' . $atlet->foto_atlet) }}" alt=""
                            width="200px"></td>
                </tr>
                <tr>
                    <td width="25%">Nama Atlet</td>
                    <td>: {{ $atlet->nama_atlet }}</td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td>: {{ $atlet->tempat_lahir }}</td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>: {{ tanggalIndonesia($atlet->tgl_lahir) }}</td>
                </tr>
                <tr>
                    <?php $atlet->jk == 'PA' ? ($jk = 'Laki-Laki') : ($jk = 'Perempuan'); ?>
                    <td>Jenis Kelamin</td>
                    <td>: {{ $jk }}</td>
                </tr>
                <tr>
                    <td>Golongan</td>
                    <td>: {{ $atlet->golongan }}</td>
                </tr>
                <tr>
                    <td>Kontingen</td>
                    <td>: {{ $atlet->kontingen }}</td>
                </tr>
                <tr>
                    <td colspan="2" class="border-bottom border-1"><b>Kategori Tanding :</b></td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td>: {{ $atlet->kelas_tanding }}</td>
                </tr>
                <tr>
                    <td colspan="2" class="border-bottom border-1"><b>Kategori Seni :</b></td>
                </tr>
                <tr>
                    <td><label for="seni">Seni</label></td>
                    <td>: {{ $atlet->seni }}</td>
                </tr>
            </table>
        </div>

        <form action="{{ url('/admin-kejurnas/verifikasi-fix') }}" method="post">
            @csrf
            @method('post')
            <input type="hidden" name="atlet_id" value="{{ $atlet->id }}">
            <table class="table table-sm w-100">
                <tr>
                    <td class="w-50">Surat Rekomendasi</td>
                    <td><input class="form-check-input border-danger" type="checkbox" name="s_rekomendasi" id="s_rekomendasi"></td>
                </tr>
                <tr>
                    <td>Akte/Ijazah</td>
                    <td><input class="form-check-input" type="checkbox" name="akte" id="akte"></td>
                </tr>
                <tr>
                    <td>Surat Izin Orangtua</td>
                    <td><input class="form-check-input" type="checkbox" name="s_izin" id="s_izin"></td>
                </tr>
                <tr>
                    <td>Surat Keterangan Sehat</td>
                    <td><input class="form-check-input" type="checkbox" name="s_sehat" id="s_sehat"></td>
                </tr>
                <tr>
                    <td>Surat Pernyataan Atlet</td>
                    <td><input class="form-check-input" type="checkbox" name="s_pernyataan" id="s_pernyataan"></td>
                </tr>
            </table>

            <buttton class="btn btn-sm btn-danger" onclick="back()">Kembali</buttton>
            <buttton class="btn btn-sm btn-primary" type="submit">Submit</buttton>
        </form>

        <form action="" method="post">
            <button>ook</button>
        </form>

    </div>
@endsection

@section('script')
    <script>
        function back() {
            window.history.back()
        }
    </script>
@endsection
