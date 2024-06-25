@extends('tampilan.tema_utama')

{{-- title --}}
@section('title')
    Id Card
@endsection
{{-- /title --}}

{{-- konten --}}
@section('konten')
    {{-- tombol --}}
    <div class="mb-3" id="tombol">
        <buttton class="btn btn-sm btn-danger me-2" onclick="window.history.back()">Kembali</buttton>
        <button class="btn btn-sm btn-secondary " onclick="window.print()">Cetak</button>
    </div>


   

    @foreach ($atlet_fix as $item)
    <span class="template-id" 
    style="background-image: url({{ asset('storage/img-web/id-card.png') }});
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;width :321px; height:397px;">
        {{-- <img src="{{ asset('storage/img-web/id-card.png') }}" alt="" srcset="" width="321px" class="template-id"> --}}
        <img src="{{ asset('storage/foto-atlet/' . $item->foto_atlet) }}" alt="" srcset="" width="321px" class="foto-atlet">

    </span>
    @endforeach
@endsection
