@extends('tampilan.tema_utama')

{{-- title --}}
@section('title')
    Admin | Dashboard
@endsection
{{-- /title --}}

{{-- konten --}}
@section('konten')
    <h6 class="mb-3">Dashboard</h6>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3 mb-4">
        <div class="col">
            <div class="card text-bg-primary shadow">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Kontingen</h5>
                    <h1>{{ $kontingen }}</h1>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-bg-danger shadow">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Atlet</h5>
                    <h1>{{ $atlet }}</h1>
                </div>
            </div>
        </div>
    </div>
    
    {{-- pesilat berdasar jenis kelamin --}}
    <h6>Pesilat Berdasarkan Jenis Kelamin</h6>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3 mb-4">
        <div class="col">
            <div class="card text-bg-primary shadow">
                <div class="card-body">
                    <h5 class="card-title">Laki-laki</h5>
                    <h1>{{ $jk }}</h1>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-bg-danger shadow">
                <div class="card-body">
                    <h5 class="card-title">Perempuan</h5>
                    <h1>{{ $atlet - $jk }}</h1>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- /konten --}}
