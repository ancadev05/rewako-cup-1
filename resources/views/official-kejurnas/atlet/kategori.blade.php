@extends('tampilan.tema_utama')

{{-- title --}}
@section('title')
    Dashboard
@endsection
{{-- /title --}}

{{-- konten --}}
@section('konten')
    <form action="">
        <div>
            <label for="tgl" class="form-label">Tanggal</label>
            <input type="date" name="tgl" id="tgl" class="form-control" required>
        </div>
        <button type="button" onclick="hitung()">Cek Kategori</button>
        <div>
            <label for="kategori" class="form-label">Kategori</label>
            <input type="text" name="kategori" id="kategori" class="form-control" disabled>
            <small><i>Kategori akan terisi otomatis saat input tanggal lahir</i></small>
        </div>
    </form>


    <script>
        function hitung() {
            const tglLahir = new Date(document.getElementById('tgl').value)
            const kategori = document.getElementById('kategori')
            const tglSekarang = new Date()

            const selisih = tglSekarang.getTime() - tglLahir.getTime()

            const usiaHari = Math.round(selisih / (1000 * 3600 * 24))

            // kategori berdasarkan usia hari
            const pud = 3650
            const ud = 4380
            const pr = 5110
            const r = 6205
            const d = 12775
            const m = 16425

            if(usiaHari <= ud && usiaHari >= ud){
              const isiKategori = 'Usia Dini'
              kategori.value = isiKategori
            } else if (usiaHari <= pr && usiaHari > ud){
              const isiKategori = 'Pra Remaja'
              kategori.value = isiKategori
            } else if (usiaHari <= r && usiaHari > pr){
              const isiKategori = 'Remaja'
              kategori.value = isiKategori
            } else if (usiaHari <= d && usiaHari > r){
              const isiKategori = 'Dewasa'
              kategori.value = isiKategori
            } else if (usiaHari <= m && usiaHari > d){
              const isiKategori = 'Master'
              kategori.value = isiKategori
            } else{
              const isiKategori = 'Anda tidak termasuk kategori'
              kategori.value = isiKategori
            }
        }
    </script>
@endsection
