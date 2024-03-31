@extends('tampilan.tema_utama')

{{-- title --}}
@section('title')
{{ $atlet->nama_atlet }}
@endsection
{{-- /title --}}

{{-- konten --}}
@section('konten')
    <h3 class="border-bottom border-2 mb-3">{{ $atlet->nama_atlet }}</h3>

    <div class="rounded shadow p-2 border">
        <form action="{{ url('official/atlet/'.$atlet->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

            {{-- file lama --}}
            <input type="hidden" name="foto_atlet_lama" value="{{ $atlet->foto_atlet }}">
            <input type="hidden" name="akte_lama" value="{{ $atlet->akte }}">
            <input type="hidden" name="rekomendasi_lama" value="{{ $atlet->rekomendasi }}">
            <input type="hidden" name="izin_orangtua_lama" value="{{ $atlet->izin_orangtua }}">
            <input type="hidden" name="suket_sehat_lama" value="{{ $atlet->suket_sehat }}">

            <div class="table-responsive mb-3">
                <table class="table table-borderless">
                    <tr>
                        <td width="25%">Nama Atlet</td>
                        <td>: {{ $atlet->nama_atlet }}</td>
                        <td rowspan="10"><img src="{{ asset('storage/foto-atlet/'.$atlet->foto_atlet) }}" alt="" width="200px"></td>
                    </tr>
                    <tr>
                        <td>Tempat Lahir</td>
                        <td>: {{ $atlet->tempat_lahir }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>: {{ $atlet->tgl_lahir }}</td>
                    </tr>
                    <tr>
                        <td>Golongan</td>
                        <td>: {{ $atlet->golongan }}</td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>: {{ $atlet->jk }}</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="border-bottom border-1"><b>Kategori Tanding :</b></td>
                    </tr>
                    <tr>
                        <td>Berat Badan</td>
                        <td>: {{ $atlet->berat_badan }}</td>
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
                    {{-- Upload Berkas --}}
                    <tr>
                        <td colspan="2">
                            <div class="my-3"></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="border-bottom border-1"><b>Upload Berkas</b></td>
                    </tr>
                    <tr>
                        <td><label class=" form-label" for="foto_atlet">Foto Atlet</label></td>
                        <td>
                            <input class=" form-control form-control-sm @error('foto_atlet') is-invalid @enderror"
                                type="file" name="foto_atlet" id="foto_atlet">
                            @error('foto_atlet')
                                <small class="invalid-feedback"> {{ $message }}
                                </small>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td><label class=" form-label" for="akte">Akte</label></td>
                        <td>
                            <input class=" form-control form-control-sm @error('akte') is-invalid @enderror"
                                type="file" name="akte" id="akte">
                            @error('akte')
                                <small class="invalid-feedback"> {{ $message }}
                                </small>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td><label class=" form-label" for="rekomendasi">Rekomendasi</label></td>
                        <td>
                            <input class=" form-control form-control-sm @error('rekomendasi') is-invalid @enderror"
                                type="file" name="rekomendasi" id="rekomendasi">
                            @error('rekomendasi')
                                <small class="invalid-feedback"> {{ $message }}
                                </small>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td><label class="form-label" for="suket_izin">Surat Izin dan Pernyataan Orang Tua</label></td>
                        <td>
                            <input class="form-control form-control-sm @error('suket_izin') is-invalid @enderror"
                                type="file" name="suket_izin" id="suket_izin">
                            @error('suket_izin')
                                <small class="invalid-feedback"> {{ $message }}
                                </small>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td><label class="form-label" for="suket_sehat">Suket Sehat</label></td>
                        <td>
                            <input class="form-control form-control-sm @error('suket_sehat') is-invalid @enderror"
                                type="file" name="suket_sehat" id="suket_sehat">
                            @error('suket_sehat')
                                <small class="invalid-feedback"> {{ $message }}
                                </small>
                            @enderror
                        </td>
                    </tr>
                </table>
            </div>

            <div class="alert alert-warning border-0 border-start border-5 border-warning shadow" role="alert">
                <span>Pastikan data atlet diisi dengan benar dan sesaui dengan berkas aslinya sebelum klik tombol tambah
                    dibawah...</span>
            </div>


            <div class="mt-4 mb-3 d-flex justify-content-end">
                <button type="submit" class="btn btn-sm btn-primary me-2">Ubah</button>
                <a href="{{ url('/official/atlet') }}" class="btn btn-sm btn-danger">Batal</a>
            </div>
        </form>
    </div>

    <script>
        // Function menghitung golongan tanding
        function hitung() {
            const tglLahir = new Date(document.getElementById('tgl_lahir').value)
            const kategori = document.getElementById('golongan')
            const hitung = document.getElementById('hitung')
            const coba = document.getElementById('coba')

            // tanggal kejuaraan
            const tglSekarang = new Date('2024/06/30')
            // const tglSekarang = new Date()

            // usia berdasar waktu
            const selisih = tglSekarang.getTime() - tglLahir.getTime()

            // dikonfersi menjadi hari
            const usiaHari = Math.round(selisih / (1000 * 3600 * 24))

            // kategori berdasarkan minimal usia hari
            const pud = 2920 // 8th - pra usia dini
            const ud = 3651 // 10th 1hr - usia dini
            const pr = 4381 // 12th 1hr - pra remaja
            const r = 5111 // 14th 1hr - remaja
            const d = 6206 // 17th 1hr - dewasa
            const m = 12776 // 30th 1hr - master
            const max = 16425 // 45th

            // agar halaman tidak reload saat menjalankan fungsi
            event.preventDefault()

            // perhitungan rincian usia
            const seconds = selisih / 1000
            const minutes = seconds / 60
            const hours = minutes / 60
            const days = hours / 24
            const month = days / 30.4375
            const years = month / 12

            if (usiaHari >= pud && usiaHari < ud) {
                let isiKategori = 'Pra Usia Dini'
                kategori.value = isiKategori
                hitung.innerHTML =
                    `usia Anda ${Math.floor(years)} tahun, ${Math.floor(month % 12)} bulan, ${Math.floor(days % 30.4375)} hari (per 30 Juni 2024)`
            } else if (usiaHari >= ud && usiaHari < pr) {
                let isiKategori = 'Usia Dini'
                kategori.value = isiKategori
                hitung.innerHTML =
                    `usia Anda ${Math.floor(years)} tahun, ${Math.floor(month % 12)} bulan, ${Math.floor(days % 30.4375)} hari (per 30 Juni 2024)`
            } else if (usiaHari >= pr && usiaHari < r) {
                let isiKategori = 'Pra Remaja'
                kategori.value = isiKategori
                hitung.innerHTML =
                    `usia Anda ${Math.floor(years)} tahun, ${Math.floor(month % 12)} bulan, ${Math.floor(days % 30.4375)} hari (per 30 Juni 2024)`
            } else if (usiaHari >= r && usiaHari < d) {
                let isiKategori = 'Remaja'
                kategori.value = isiKategori
                hitung.innerHTML =
                    `usia Anda ${Math.floor(years)} tahun, ${Math.floor(month % 12)} bulan, ${Math.floor(days % 30.4375)} hari (per 30 Juni 2024)`
            } else if (usiaHari >= d && usiaHari < m) {
                let isiKategori = 'Dewasa'
                kategori.value = isiKategori
                hitung.innerHTML =
                    `usia Anda ${Math.floor(years)} tahun, ${Math.floor(month % 12)} bulan, ${Math.floor(days % 30.4375)} hari (per 30 Juni 2024)`
            } else if (usiaHari >= m && usiaHari <= max) {
                let isiKategori = 'Master'
                kategori.value = isiKategori
                hitung.innerHTML =
                    `usia Anda ${Math.floor(years)} tahun, ${Math.floor(month % 12)} bulan, ${Math.floor(days % 30.4375)} hari (per 30 Juni 2024)`
            } else {
                let isiKategori = 'Anda tidak termasuk kategori'
                kategori.value = isiKategori
                hitung.innerHTML =
                    `usia Anda ${Math.floor(years)} tahun, ${Math.floor(month % 12)} bulan, ${Math.floor(days % 30.4375)} hari (per 30 Juni 2024)`
            }
        }
    </script>
@endsection
