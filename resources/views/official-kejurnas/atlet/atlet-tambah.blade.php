@extends('tampilan.tema_utama')

{{-- title --}}
@section('title')
    Tambah Atlet
@endsection
{{-- /title --}}

{{-- konten --}}
@section('konten')
    <h3 class="border-bottom border-2 mb-3">Tambah Atlet</h3>

    <div class="rounded shadow p-2 border">
        <form action="">
            <div class="table-responsive mb-3">
                <table class="table table-borderless">
                    <tr>
                        <td width="25%"><label for="nama_atlet">Nama Atlet</label></td>
                        <td><input class="form-control" type="text" name="nama_atlet" id="nama_atlet" value="{{ old('nama_atlet') }}"></td>
                    </tr>
                    <tr>
                        <td><label for="tempat_lahir">Tempat Lahir</label></td>
                        <td><input class="form-control" type="text" name="tempat_lahir" id="tempat_lahir"></td>
                    </tr>
                    <tr>
                        <td><label for="tgl_lahir">Tanggal Lahir</label></td>
                        <td><input class="form-control" type="date" name="tgl_lahir" id="tgl_lahir"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button class="btn btn-sm btn-secondary" onclick="hitung()" type="button">Cek Usia</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="golongan">Golongan</label>
                        </td>
                        <td>
                            <input class="form-control" type="text" name="golongan" id="golongan" disabled>
                            <small style="font-size: 12px; color:red;" id="hitung"></small>
                        </td>
                    </tr>
                    <tr>
                        <td class=""><label for="jk">Jenis Kelamin</label></td>
                        <td>
                            <div class="d-flex">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="jk" id="jk1"
                                        value="PA">
                                    <label class="form-check-label" for="jk1">Laki-Laki</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jk" id="jk2"
                                        value="PI">
                                    <label class="form-check-label" for="jk2">Perempuan</label>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="kontingen">Kontingen</label></td>
                        <td>
                            <select class="form-select">
                                <option selected>-- Pilih Kontingen --</option>
                                <option value="1">Kontingen 1</option>
                                <option value="2">Kontingen 2</option>
                                <option value="3">Kontingen 3</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="my-3"></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="border-bottom border-1">Kategori Tanding :</td>
                    </tr>
                    <tr>
                        <td><label for="bb">Berat Badan</label></td>
                        <td><input class="form-control" type="number" name="bb" id="bb"
                                placeholder="isi berupa angka saja"></td>
                    </tr>
                    <tr>
                        <td><label for="kelas">Kelas</label></td>
                        <td>
                            <select class="form-select" name="kelas" id="kelas">
                                <option value="">-- Pilih Kelas --</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="E">E</option>
                                <option value="F">F</option>
                                <option value="G">G</option>
                                <option value="H">H</option>
                                <option value="I">I</option>
                                <option value="J">J</option>
                                <option value="K">K</option>
                                <option value="L">L</option>
                                <option value="M">M</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="my-3"></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="border-bottom border-1">Kategori Seni :</td>
                    </tr>
                    <tr>
                        <td><label for="seni">Seni</label></td>
                        <td>
                            <select class="form-select" name="seni" id="seni">
                                <option value="">-- Pilih Kategori --</option>
                                <option value="Tunggal Tangan Kosong">Tunggal Tangan Kosong</option>
                                <option value="Tunggal Bersenjata">Tunggal Bersenjata</option>
                                <option value="Ganda Tangan Kosong">Ganda Tangan Kosong</option>
                                <option value="Ganda Bersenjata">Ganda Bersenjata</option>
                                <option value="Ganda Tangan Kosong dan Bersenjata">Ganda Tangan Kosong dan Bersenjata
                                </option>
                                <option value="Trio">Trio</option>
                            </select>
                        </td>
                    </tr>
                    {{-- Upload Berkas --}}
                    <tr>
                        <td colspan="2">
                            <div class="my-3"></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="border-bottom border-1">Upload Berkas</td>
                    </tr>
                    <tr>
                        <td><label class=" form-label" for="foto">Foto Atlet</label></td>
                        <td>
                            <input class=" form-control form-control-sm" type="file" name="foto" id="foto">
                        </td>
                    </tr>
                    <tr>
                        <td><label class=" form-label" for="akte">Akte</label></td>
                        <td>
                            <input class=" form-control form-control-sm" type="file" name="akte" id="akte">
                        </td>
                    </tr>
                    <tr>
                        <td><label class=" form-label" for="rekomendasi">Rekomendasi</label></td>
                        <td>
                            <input class=" form-control form-control-sm" type="file" name="rekomendasi"
                                id="rekomendasi">
                        </td>
                    </tr>
                    <tr>
                        <td><label class="form-label" for="suket_izin">Surat Izin dan Pernyataan Orang Tua</label></td>
                        <td>
                            <input class="form-control form-control-sm" type="file" name="suket_izin"
                                id="suket_izin">
                        </td>
                    </tr>
                    <tr>
                        <td><label class="form-label" for="suket_sehat">Suket Sehat</label></td>
                        <td>
                            <input class="form-control form-control-sm" type="file" name="suket_sehat"
                                id="suket_sehat">
                        </td>
                    </tr>
                </table>
            </div>

            <div class="alert alert-warning border-0 border-start border-5 border-warning shadow" role="alert">
                <span>Pastikan data atlet diisi dengan benar dan sesaui dengan berkas aslinya sebelum klik tombol tambah
                    dibawah...</span>
            </div>


            <div class="mt-4 mb-3 d-flex justify-content-end">
                <button class="btn btn-sm btn-primary me-2">Tambah</button>
                <a href="{{ url('/atlet') }}" class="btn btn-sm btn-danger">Batal</a>
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
