@extends('tampilan.tema_utama')

{{-- title --}}
@section('title')
    Admin | Atlet Fix
@endsection
{{-- /title --}}

{{-- konten --}}
@section('konten')
    <h3 class="border-bottom border-2 mb-3">Daftar Atlet Fix</h3>

    {{-- filter --}}
    <div class="mb-3">
        <form action="{{ url('/admin-kejurnas/data-fix') }}" method="post">
            @csrf
            <input type="hidden" name="filter" value="1">
            <div class="row row-cols-5 g-3">
                <div class="col">
                    <select name="kelas_tanding" class="form-select" aria-label="size 3 select example">
                        <option value="" selected>== Kelas ==</option>
                        @foreach ($kelas_tanding as $item)
                            <option value="{{ $item->nama_kelas }}">{{ $item->nama_kelas }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <select name="kontingen" class="form-select" aria-label="size 3 select example">
                        <option value="" selected>== Kontingen ==</option>
                        @foreach ($kontingen as $item)
                            <option value="{{ $item->id_kontingen }}">{{ $item->id_kontingen }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <select name="seni" class="form-select" aria-label="size 3 select example">
                        <option value="" selected>== Seni ==</option>
                        @foreach ($seni as $item)
                            <option value="{{ $item->kategori_seni }}">{{ $item->kategori_seni }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <select name="golongan" class="form-select" aria-label="size 3 select example">
                        <option value="" selected>== Golongan ==</option>
                        @foreach ($golongan as $item)
                            <option value="{{ $item->nama_golongan }}">{{ $item->nama_golongan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <select name="jk" class="form-select" aria-label="size 3 select example">
                        <option value="" selected>== Jenis Kelamin ==</option>
                        <option value="PA">PA</option>
                        <option value="PI">PI</option>
                    </select>
                </div>
            </div>

            {{-- submit --}}
            <button class="btn btn-sm btn-primary mt-2">Cek</button>
        </form>
    </div>

    <div class="shadow p-2 border rounded">
        <div class="table-responsive">
            <table class="table table-sm table-striped table-hover" id="atlet">
                <thead class="text-center ">
                    <tr>
                        <th>#id</th>
                        <th>Nama Atlet</th>
                        <th>JK</th>
                        <th>Golongan</th>
                        <th>Kelas Tanding</th>
                        <th>Seni</th>
                        <th>Kontingen</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($atlet_fix as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nama_atlet }}</td>
                            <td>{{ $item->jk }}</td>
                            <td>{{ $item->golongan }}</td>
                            <td>{{ $item->kelas_tanding }}</td>
                            <td>{{ $item->seni }}</td>
                            <td>{{ $item->kontingen }}</td>
                        </tr>
                    @empty
                        <div class="alert alert-danger">
                            Belum ada atlet yang terdaftar.
                        </div>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('datatables')
    <script>
        // $(document).ready(function() {
        $("#atlet").DataTable({
            layout: {
                top: {
                    buttons: ["excel", "pdf", "print"],
                    // buttons: ["copy", "excel", "pdf", "colvis", "print"],
                },
            }
        });
        // });
    </script>
@endsection
