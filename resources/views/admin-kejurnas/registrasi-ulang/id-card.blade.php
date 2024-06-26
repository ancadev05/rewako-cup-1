@extends('tampilan.tema_utama')

{{-- title --}}
@section('title')
{{ $kontingen->nama_kontingen }}
@endsection
{{-- /title --}}

{{-- konten --}}
@section('konten')
    {{-- tombol --}}
    <div class="mb-3" id="tombol">
        <buttton class="btn btn-sm btn-danger me-2" onclick="window.history.back()">Kembali</buttton>
        <button class="btn btn-sm btn-secondary " onclick="cetakHalaman()">Cetak</button>
    </div>

    <div class="id-card-official">
        <h4 class="off">OFFICIAL</h4>
        <div class="foto-official rounded" style="
            background-image: url('{{ asset('/storage/foto-official/'.$kontingen->user->foto_official) }}');
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            ">
        </div>
        <div class="biodata-official">
            <label for="">Nama</label> <br>
                <div class="border p-1 fw-bold bg-white">{{ $kontingen->user->name }}</div>
                <label for="">Kontingen</label> <br>
                <div class="border p-1 fw-bold bg-white">{{ $kontingen->nama_kontingen }}</div>
        </div>
    </div>

    <hr>

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
                <label for="">Nama</label> <br>
                <div class="border p-1 fw-bold bg-white">{{ $item->nama_atlet }}</div>
                <label for="">Golongan - JK</label> <br>
                <div class="border p-1 fw-bold bg-white">{{ $item->golongan . '-' . $item->jk }}</div>
                <label for="">Kontingen</label> <br>
                <div class="border p-1 fw-bold bg-white">{{ $item->kontingen }}</div>
                <label for="">Kelas Tanding</label> <br>
                <div class="border p-1 fw-bold bg-white">{{ $item->kelas_tanding }}</div>
                <label for="">Seni</label> <br>
                <div class="border p-1 fw-bold bg-white">{{ $item->seni }}</div>
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
    @endforeach

    
    
@endsection

@section('script')
    <script>
        function cetakHalaman() {
            // Menunggu sampai semua gambar selesai dimuat
            window.addEventListener('load', function() {
                window.print(); // Memanggil fungsi pencetakan bawaan dari browser
            });
        }
    </script>
@endsection
