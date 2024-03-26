@extends('tampilan.tema_utama')

{{-- title --}}
@section('title')
    Coba Fitur
@endsection
{{-- /title --}}

{{-- konten --}}
@section('konten')
    <h3 class="border-bottom border-2 mb-3">Coba Fitur</h3>

    <h5>Nama kontingen : </h5>
    
    <p>{{ $data }}</p>
@endsection
