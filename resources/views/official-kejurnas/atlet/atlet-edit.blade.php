@extends('tampilan.tema_utama')

{{-- title --}}
@section('title')
    Edit Atlet
@endsection
{{-- /title --}}

{{-- konten --}}
@section('konten')
    <h3 class="border-bottom border-2 mb-3">Edit Atlet</h3>

    <div class="rounded shadow p-2 border">
        <form action="{{ url('official/atlet/' . $atlet->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

            {{-- file lama --}}
            <input type="hidden" name="foto_atlet_lama" value="{{ $atlet->foto_atlet }}">

            <div class="table-responsive mb-3">
                <table class="table table-borderless">
                    <tr>
                        <td width="25%"><label for="nama_atlet">Nama Atlet</label></td>
                        <td>
                            <input class="form-control @error('nama_atlet') is-invalid @enderror" type="text"
                                name="nama_atlet" id="nama_atlet" value="{{ $atlet->nama_atlet }}">
                            @error('nama_atlet')
                                <small class="invalid-feedback"> {{ $message }} </small>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td><label for="tempat_lahir">Tempat Lahir</label></td>
                        <td>
                            <input class="form-control @error('tempat_lahir') is-invalid @enderror" type="text"
                                name="tempat_lahir" id="tempat_lahir" value="{{ $atlet->tempat_lahir }}">
                            @error('tempat_lahir')
                                <small class="invalid-feedback"> {{ $message }} </small>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td><label for="tgl_lahir">Tanggal Lahir</label></td>
                        <td>
                            <input class="form-control @error('tgl_lahir') is-invalid @enderror" type="date"
                                name="tgl_lahir" id="tgl_lahir" value="{{ $atlet->tgl_lahir }}">
                            @error('tgl_lahir')
                                <small class="invalid-feedback"> {{ $message }} </small>
                            @enderror
                        </td>
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
                            <input class="form-control @error('golongan') is-invalid @enderror" type="text"
                                name="golongan" id="golongan" readonly value="{{ $atlet->golongan }}">
                            <small style="font-size: 12px; color:red;" id="hitung"></small>
                            @error('golongan')
                                <small class="invalid-feedback"> {{ 'tekan tombol Cek Usia untuk mengetahui golongan' }}
                                </small>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td class=""><label for="jk">Jenis Kelamin</label></td>
                        <td>
                            <div class="d-flex">
                                @php
                                    $jk = $atlet->jk;
                                @endphp
                                <div class="form-check me-3">
                                    <input class="form-check-input @error('jk') is-invalid @enderror" type="radio"
                                        name="jk" id="jk1" value="PA" {{ $jk == 'PA' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="jk1">Laki-Laki</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input @error('jk') is-invalid @enderror"" type="radio"
                                        name="jk" id="jk2" value="PI" {{ $jk == 'PI' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="jk2">Perempuan</label>
                                </div>
                                @error('jk')
                                    <small class="invalid-feedback"> {{ $message }} </small>
                                @enderror
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="my-3"></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="border-bottom border-1"><b>Kategori Tanding :</b></td>
                    </tr>
                    <tr>
                        <td><label for="kelas_tanding">Kelas</label></td>
                        <td>
                            @php
                                $kelas = $atlet->kelas_tanding;
                            @endphp
                            <select class="form-select @error('kelas_tanding') is-invalid @enderror" name="kelas_tanding"
                                id="kelas_tanding">
                                <option value="-">-- Pilih Kelas --</option>
                                <option value="A" {{ $kelas == 'A' ? 'selected' : '' }}>A</option>
                                <option value="B" {{ $kelas == 'B' ? 'selected' : '' }}>B</option>
                                <option value="C" {{ $kelas == 'C' ? 'selected' : '' }}>C</option>
                                <option value="D" {{ $kelas == 'D' ? 'selected' : '' }}>D</option>
                                <option value="E" {{ $kelas == 'E' ? 'selected' : '' }}>E</option>
                                <option value="F" {{ $kelas == 'F' ? 'selected' : '' }}>F</option>
                                <option value="G" {{ $kelas == 'G' ? 'selected' : '' }}>G</option>
                                <option value="H" {{ $kelas == 'H' ? 'selected' : '' }}>H</option>
                                <option value="I" {{ $kelas == 'I' ? 'selected' : '' }}>I</option>
                                <option value="J" {{ $kelas == 'J' ? 'selected' : '' }}>J</option>
                                <option value="K" {{ $kelas == 'K' ? 'selected' : '' }}>K</option>
                                <option value="L" {{ $kelas == 'L' ? 'selected' : '' }}>L</option>
                                <option value="M" {{ $kelas == 'M' ? 'selected' : '' }}>M</option>
                                <option value="BEBAS" {{ $kelas == 'BEBAS' ? 'selected' : '' }}>BEBAS</option>
                            </select>
                            @error('kelas_tanding')
                                <small class="invalid-feedback"> {{ $message }}
                                </small>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="my-3"></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="border-bottom border-1"><b>Kategori Seni :</b></td>
                    </tr>
                    <tr>
                        <td><label for="seni">Seni</label></td>
                        <td>
                            @php
                                $seni = $atlet->seni;
                            @endphp
                            <select class="form-select @error('seni') is-invalid @enderror" name="seni" id="seni">
                                <option value="-">-- Pilih Kategori --</option>
                                <option value="Tunggal Tangan Kosong"
                                    {{ $seni == 'Tunggal Tangan Kosong' ? 'selected' : '' }}>Tunggal Tangan Kosong</option>
                                <option value="Tunggal Bersenjata" {{ $seni == 'Tunggal Bersenjata' ? 'selected' : '' }}>
                                    Tunggal Bersenjata</option>
                                <option value="Ganda Tangan Kosong" {{ $seni == 'Ganda Tangan Kosong' ? 'selected' : '' }}>
                                    Ganda Tangan Kosong</option>
                                <option value="Ganda Bersenjata" {{ $seni == 'Ganda Bersenjata' ? 'selected' : '' }}>Ganda
                                    Bersenjata</option>
                                <option value="Ganda Tangan Kosong dan Bersenjata"
                                    {{ $seni == 'Ganda Tangan Kosong dan Bersenjata' ? 'selected' : '' }}>Ganda Tangan
                                    Kosong dan Bersenjata
                                </option>
                                <option value="Trio" {{ $seni == 'Trio' ? 'selected' : '' }}>Trio</option>
                            </select>
                            @error('seni')
                                <small class="invalid-feedback"> {{ $message }}
                                </small>
                            @enderror
                        </td>
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
                            <ul style="font-size: 11px; color:red;">
                                <li>Ukuran foto Max 2MB</li>
                                <li>Latar Biru ukuran 3 x 4 cm</li>
                            </ul>
                        </td>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="mb-3 d-flex justify-content-end">
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
