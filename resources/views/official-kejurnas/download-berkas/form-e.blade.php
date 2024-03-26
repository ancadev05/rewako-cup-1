@extends('tampilan.tema_utama')

{{-- title --}}
@section('title')
    From A
@endsection
{{-- /title --}}

{{-- konten --}}
@section('konten')
    <div class="kertas border shadow mb-3" id="print">
        <div class="mb-2 fw-bold">
            <p class="text-center">FORM E <br>SURAT PERNYATAAN OFFICIAL</p>
        </div>

        <br>

        <p>Yang bertanda tangan dibawah ini,</p>
        <table class="mx-5 mb-3">
            <tr>
                <td width="200px">Nama</td>
                <td>: Nama Official</td>
            </tr>
            <tr>
                <td>Tempat Tanggal Lahir</td>
                <td>: Gow 17 Agustus 1999</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>: Laki-laki</td>
            </tr>
            <tr>
                <td>Kontingen</td>
                <td>: Gowa A</td>
            </tr>
        </table>

        <p>Dengan ini menyatakan bahwa saya bersedia mematuhi dan bertanggung jawab atas <b>PRIBADI SAYA</b> selama
            kejuaraan berlangsung sesuai ketentuan yang berlaku</p>

        <br>

        <div class="d-flex flex-row-reverse me-5">
            <div>
                <p>Gowa, 05 Mei 2024</p>
                <br><br><br>
                <span><b><u>Nama Official</u></b></span>
            </div>
        </div>
    </div>

    <button href="#" class="btn btn-sm btn-success d-block m-auto" onclick="return printArea(print)">Download</button>
@endsection
