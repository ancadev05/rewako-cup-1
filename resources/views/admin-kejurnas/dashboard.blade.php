@extends('tampilan.tema_utama')

{{-- title --}}
@section('title')
    Admin | Dashboard
@endsection
{{-- /title --}}

{{-- konten --}}
@section('konten')
    <h4 class="mb-3">Dashboard</h4>
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
    <h4>Pesilat Berdasarkan Jenis Kelamin</h4>
    <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 g-3 mb-4">
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

    {{-- pesilat berdasar golongan --}}
    <h4>Pesilat Berdasarkan Golongan</h4>
    <div class="row row-cols-2 row-cols-sm-3 row-cols-md-6 g-3 mb-4">
        <div class="col">
            <div class="card text-bg-secondary shadow">
                <div class="card-body">
                    <h5 class="card-title">Pra Usia Dini</h5>
                    <h1>{{ $pud }}</h1>
                    <h5>PA : {{ $pud_pa }} / PI : {{ $pud - $pud_pa }}</h5>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-bg-warning shadow">
                <div class="card-body">
                    <h5 class="card-title">Usia Dini</h5>
                    <h1>{{ $ud }}</h1>
                    <h5>PA : {{ $ud_pa }} / PI : {{ $ud - $ud_pa }}</h5>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-bg-primary shadow">
                <div class="card-body">
                    <h5 class="card-title">Pra Remaja</h5>
                    <h1>{{ $pr }}</h1>
                    <h5>PA : {{ $pr_pa }} / PI : {{ $pr - $pr_pa }}</h5>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-bg-success shadow">
                <div class="card-body">
                    <h5 class="card-title">Remaja</h5>
                    <h1>{{ $r }}</h1>
                    <h5>PA : {{ $r_pa }} / PI : {{ $r - $r_pa }}</h5>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-bg-danger shadow">
                <div class="card-body">
                    <h5 class="card-title">Dewasa</h5>
                    <h1>{{ $d }}</h1>
                    <h5>PA : {{ $d_pa }} / PI : {{ $d - $d_pa }}</h5>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-bg-dark shadow">
                <div class="card-body">
                    <h5 class="card-title">Master</h5>
                    <h1>{{ $m }}</h1>
                    <h5>PA : {{ $m_pa }} / PI : {{ $m - $m_pa }}</h5>
                </div>
            </div>
        </div>
    </div>

    {{-- pesilat berdasar kategori --}}
    <h4>Pesilat Berdasarkan Kategori</h4>
    <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 g-3 mb-4">
        <div class="col">
            <div class="card text-bg-danger shadow">
                <div class="card-body">
                    <h5 class="card-title">Tanding</h5>
                    <h1>{{ $kt }}</h1>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-bg-warning shadow">
                <div class="card-body">
                    <h5 class="card-title">Seni</h5>
                    <h1>{{ $ks }}</h1>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- /konten --}}
