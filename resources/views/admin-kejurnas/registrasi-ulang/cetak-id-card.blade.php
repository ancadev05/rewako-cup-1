<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $kontingen->nama_kontingen }}</title>

    {{-- Desain Template --}}
    <link href="{{ asset('assets/template-css/styles.css') }}" rel="stylesheet" />
    {{-- Font Awesome --}}
    {{-- <link href="{{ asset('assets/fontawesome/css/all.css') }}" rel="stylesheet" /> --}}
    {{-- costum css - Alert animasi --}}
    <link href="{{ asset('assets/costum-style/css-costum.css') }}" rel="stylesheet" />

    {{-- <style>
        @media print{
            
        }
    </style> --}}

</head>

<body>

    {{-- <div>.</div>
    <div>.</div>
    <div>.</div>
    <div>.</div>
    <div>.</div>

    <div>.</div>
    <div>.</div>
    <div>.</div>
    <div>.</div>
    <div>.</div> --}}

    <div class="ayo">
    @foreach ($atlet_fix as $item)
        <span class="id-card">
                <h4 class="sebagai">PESERTA</h4>
                {{-- <img src="{{ asset('storage/img-web/id-card.png') }}" alt="" srcset="" width="321px" class="template-id"> --}}
                <div class="foto-atlet "
                    style="
            background-image: url('{{ asset('/storage/foto-atlet/' . $item->foto_atlet) }}');
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            ">
                </div>

                <div class="biodata">
                    <div>
                        <label for="">Nama</label> <br>
                        <input type="text" name="" id="" value="{{ $item->nama_atlet }}">
                    </div>
                    <div>
                        <label for="">Golongan - JK</label> <br>
                        <input type="text" name="" id=""
                            value="{{ $item->golongan . '-' . $item->jk }}">
                    </div>
                    <div>
                        <label for="">Kontingen</label> <br>
                        <input type="text" name="" id="" value="{{ $item->kontingen }}">
                    </div>
                    <div>
                        <label for="">Kelas Tanding</label> <br>
                        <input type="text" name="" id="" value="{{ $item->kelas_tanding }}">
                    </div>
                    <div>
                        <label for="">Seni</label> <br>
                        <input type="text" name="" id="" value="{{ $item->seni }}">
                    </div>
                    <div class="no-id">
                        <label for="">ID</label>
                        <input type="text" name="" id="" value="{{ $item->id }}">
                    </div>
                    {{-- <div class="nama">{{ $item->nama_atlet }}</div>
            <div class="golongan">{{ $item->golongan ."/". $item->jk}}</div>
            <div class="kontingen">{{ $item->kontingen}}</div>
            <div class="kelas">{{ $item->kelas_tanding}}</div>
            <div class="seni">{{ $item->seni}}</div> --}}
                </div>

                {{-- <span class="no-id">{{ $item->id}}</span> --}}
                {{-- <img src="{{ asset('storage/foto-atlet/' . $item->foto_atlet) }}" alt="" srcset="" width="321px" class="foto-atlet"> --}}
        </span>
        {{-- <hr> --}}
    @endforeach
</div>

    <div class="id-card-official">
        <div class="foto-official rounded"
            style="
            background-image: url('{{ asset('/storage/foto-official/' . $kontingen->user->foto_official) }}');
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            ">
        </div>
        <div class="biodata-official">
            <div class="nam-off">
                {{ $kontingen->user->name }}
            </div>
            <div class="kon-off">
                {{ $kontingen->nama_kontingen }}
            </div>
        </div>
    </div>
    <div>.</div>
    <hr>
    {{-- official --}}
    {{-- <div class="row row-cols-2 me-1"> --}}
    {{-- <div class="cetak">
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
    </div> --}}

    {{-- atlet --}}
    {{-- <div class="row row-cols-2 g-5 me-1">
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
    </div> --}}

    {{-- Jquery --}}
    <script src="{{ asset('assets/jquery/jquery-3.7.1.min.js') }}"></script>

    {{-- JS Costum --}}
    <script src="{{ asset('assets/template-js/scripts.js') }}"></script>

    {{-- Bootstrap 5 --}}
    {{-- <script src="{{ asset('assets/bootstrap5/js/bootstrap.js') }}"></script> --}}
    <script src="{{ asset('assets/bootstrap5/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap5/js/popper.min.js') }}"></script>

    {{-- SweetAlert --}}
    <script src="{{ asset('assets/sweetalert/sweetalert2.all.min.js') }}"></script>

    {{-- Script Costum --}}
    <script src="{{ asset('assets/template-js/script-costum.js') }}"></script>
</body>

</html>
