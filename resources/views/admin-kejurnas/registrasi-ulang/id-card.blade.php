@extends('tampilan.tema_utama')

{{-- title --}}
@section('title')
    Id Card
@endsection
{{-- /title --}}

{{-- konten --}}
@section('konten')
{{-- tombol --}}
<div class="mb-3">
    <buttton class="btn btn-sm btn-danger me-2" onclick="window.history.back()">Kembali</buttton>
    <button class="btn btn-sm btn-secondary " onclick="window.print()">Cetak</button>
</div>
    <div class="row row-cols-2 g-1 me-1" id="tombol">
        @foreach ($atlet_fix as $item)
            <div class="col">
                <div class="border p-2" id="id-card">
                    <span>OPEN TURNAMEN NASIONAL</span>
                    <span>PENCAK SILAT TAPAK SUCI</span>
                    <h1>opern turnamen</h1>
                    <div class="d-flex">
                        <div class="rounded-3 me-2" id="foto-atlet"
                            style="
                    
                    background-image: url({{ asset('storage/foto-atlet/' . $item->foto_atlet) }});
                    background-position: center;
                    background-size: cover;
                    background-repeat: no-repeat;">
                        </div>
                        <div class="fw-bold w-100" style="font-size: 11px">
                            <div class="bg-white rounded-2 p-1 mb-1">{{ $item->id }}</div>
                            <div class="bg-white rounded-2 p-1 mb-1">{{ $item->nama_atlet }}</div>
                            <div class="bg-white rounded-2 p-1 mb-1">{{ $item->jk }}</div>
                            <div class="bg-white rounded-2 p-1 mb-1" style="font-size-adjust: inherit;">
                                {{ $item->kontingen }}</div>
                            <div class="bg-white rounded-2 p-1 mb-1">{{ $item->golongan }}</div>
                            <div class="bg-white rounded-2 p-1 mb-1">{{ $item->kelas_tanding }}</div>
                            <div class="bg-white rounded-2 p-1 mb-1">{{ $item->seni }}</div>
                        </div>
                        <table>

                        </table>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
