@extends('tampilan.tema_utama')

{{-- title --}}
@section('title')
    ID Card
@endsection
{{-- /title --}}

{{-- konten --}}
@section('konten')
    <div class="kertas-idcard shadow mb-3" id="print">
        <h3 class="mb-3">ID Card Official</h3>
        <div class="d-inline mb-3">
            <img src="{{ asset('assets/img/idcard.webp') }}" alt="id-card" srcset="" class="id-card">
            <img src="{{ asset('assets/img/idcard.webp') }}" alt="id-card" srcset="" class="id-card">
            <img src="{{ asset('assets/img/idcard.webp') }}" alt="id-card" srcset="" class="id-card">
        </div>

        <h3 class="mb-3">ID Card Peserta</h3>
        <div class="d-inline">
            <img src="{{ asset('assets/img/idcard.webp') }}" alt="id-card" srcset="" class="id-card">
            <img src="{{ asset('assets/img/idcard.webp') }}" alt="id-card" srcset="" class="id-card">
            <img src="{{ asset('assets/img/idcard.webp') }}" alt="id-card" srcset="" class="id-card">
            <img src="{{ asset('assets/img/idcard.webp') }}" alt="id-card" srcset="" class="id-card">
            <img src="{{ asset('assets/img/idcard.webp') }}" alt="id-card" srcset="" class="id-card">
            <img src="{{ asset('assets/img/idcard.webp') }}" alt="id-card" srcset="" class="id-card">
            <img src="{{ asset('assets/img/idcard.webp') }}" alt="id-card" srcset="" class="id-card">
            <img src="{{ asset('assets/img/idcard.webp') }}" alt="id-card" srcset="" class="id-card">
            <img src="{{ asset('assets/img/idcard.webp') }}" alt="id-card" srcset="" class="id-card">
            <img src="{{ asset('assets/img/idcard.webp') }}" alt="id-card" srcset="" class="id-card">
            <img src="{{ asset('assets/img/idcard.webp') }}" alt="id-card" srcset="" class="id-card">
            <img src="{{ asset('assets/img/idcard.webp') }}" alt="id-card" srcset="" class="id-card">
            <img src="{{ asset('assets/img/idcard.webp') }}" alt="id-card" srcset="" class="id-card">

        </div>
    </div>
    <button href="#" class="btn btn-sm btn-success d-block m-auto" onclick="return printArea(print)">Download</button>
@endsection
