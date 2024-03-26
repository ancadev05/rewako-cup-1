@extends('tampilan.tema_utama')

{{-- title --}}
@section('title')
    From A
@endsection
{{-- /title --}}

{{-- konten --}}
@section('konten')
    <div class="kertas border shadow mb-3" id="print">
        <h5 class="border border-dark rounded d-inline p-2">A - 1</h5>
        
        <div class="mb-2">
            <p class="text-center fw-bold">FORMULIR KONFIRMASI PESERTA <br>
                KEJUARAAN PENCAK SILAT TAPAK SUCI <br>
                GOLONGAN USIA DINI
                </p>
        </div>

        <span>Yang bertanda tangan dibawah ini,</span>
        <table>
            <tr>
                <td>Kontingen Tapak Suci</td>
                <td>: Gowa A</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: Kabupaten Gowa</td>
            </tr>
        </table>

        <span>Memberikan Konformasi Peserta Kejuaraan Pencak Silat TAPAK SUCI dalam Kelas Pertandingan / Jenis Perlombaan sebagai beriktu :</span>
        <span>A. PENCAK SILAT OLAHRAGA TAPAK SUCI (<i>lingkari yang diikuti</i>)</span>
    </div>

    <button href="#" class="btn btn-sm btn-success d-block m-auto" onclick="return printArea(print)">Download</button>
@endsection
