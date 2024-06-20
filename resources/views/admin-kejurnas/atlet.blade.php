@extends('tampilan.tema_utama')

{{-- title --}}
@section('title')
    Admin | Atlet
@endsection
{{-- /title --}}

{{-- konten --}}
@section('konten')
    <h3 class="border-bottom border-2 mb-3">Daftar Atlet Keseluruhan</h3>

    @if (count($duplikat_kelas) > 0)
        <div class="mb-2">
            <div class="alert alert-danger border-0 border-start border-5 border-danger shadow">
                @foreach ($duplikat_kelas as $item)
                    <ul>
                        <li>
                            <i class="fas fa-exclamation-triangle text-warning"></i> Maaf, Anda memiliki pesilat yang
                            memiliki golongan dan kategori yang sama di kontingen <b>{{ $item->kontingen }}</b> pada golongan
                            <b>{{ $item->golongan }}</b> kategori tanding/seni <b>{{ $item->kelas_tanding }}</b><b>/{{ $item->jk }}</b>. </br>
                        </li>
                    </ul>
                @endforeach
                Silahkan hapus salah
                satunya atau daftarkan di kontingen lain
            </div>
        </div>
    @endif

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
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <span class="text-white">
                        <?php $i = 1; ?>
                    </span>
                    @forelse ($atlet as $item)
                        <tr>
                            {{-- <td class="text-center">{{ $i }}</td> --}}
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nama_atlet }}</td>
                            <td class="text-center">{{ $item->jk }}</td>
                            <td>{{ $item->golongan }}</td>
                            <td class="text-center">{{ $item->kelas_tanding }}</td>
                            <td>{{ $item->seni }}</td>
                            <td class="text-center">
                                @if ($item->foto_atlet)
                                    <i class="fas fa-check-circle text-success"></i>
                                @else
                                    <i class="fas fa-exclamation-circle text-warning"></i>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ url('/admin-kejurnas/atlet/' . $item->id) }}" class="btn btn-secondary"
                                    style="--bs-btn-padding-y:.25rem; --bs-btn-padding-x:.25rem;--bs-btn-font-size:.70rem;"><i
                                        class="fas fa-eye"></i></a>
                                {{-- admin kejurnas tidak boleh menghapus dan mengedit data atlet --}}
                                {{-- <a href="{{ url('/admin-kejurnas/atlet/' . $item->id . '/edit') }}"
                                            class="btn btn-warning"
                                            style="--bs-btn-padding-y:.25rem; --bs-btn-padding-x:.25rem;--bs-btn-font-size:.70rem;"><i
                                                class="fas fa-edit"></i></a>
                                        <form action="{{ url('/admin-kejurnas/atlet/' . $item->id) }}" method="POST"
                                            class="d-inline" onsubmit="return confirm('Anda yakin ingin hapus data?')">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger"
                                                style="--bs-btn-padding-y:.25rem; --bs-btn-padding-x:.25rem;--bs-btn-font-size:.70rem;"><i
                                                    class="fas fa-trash-alt"></i></button>
                                        </form> --}}
                            </td>
                        </tr>
                        <?php $i++; ?>
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
