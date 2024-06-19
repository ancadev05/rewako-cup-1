@extends('tampilan.tema_utama')

{{-- title --}}
@section('title')
    Id Card
@endsection
{{-- /title --}}

{{-- konten --}}
@section('konten')
<button class="btn btn-sm btn-secondary mb-3">Cetak</button>
    <div class="row row-cols-2 g-1 me-1">
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
                        <div class="fw-bold w-100">
                            <div class="bg-white rounded-2 p-1 mb-1">{{ $item->id }}</div>
                            <div class="bg-white rounded-2 p-1 mb-1">{{ $item->nama_atlet }}</div>
                            <div class="bg-white rounded-2 p-1 mb-1">{{ $item->jk }}</div>
                            <div class="bg-white rounded-2 p-1 mb-1" style="font-size-adjust: inherit;">
                                {{ $item->kontingen }}</div>
                            <div class="bg-white rounded-2 p-1 mb-1">{{ $item->golongan }}</div>
                            <div class="bg-white rounded-2 p-1 mb-1">{{ $item->kelas_tanding }}</div>
                        </div>
                        <table>

                        </table>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
