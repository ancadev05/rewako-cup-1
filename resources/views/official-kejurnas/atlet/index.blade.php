@extends('tampilan.tema_utama')

{{-- title --}}
@section('title')
    Atlet
@endsection
{{-- /title --}}

{{-- konten --}}
@section('konten')
    <h3 class="border-bottom border-2 mb-3">Daftar Atlet</h3>
    {{-- nama ini hanya akan muncul saat login official --}}
    @if (Auth::user()->level == 'official')
        <div>
            <table class="table table-sm table-borderless border-bottom border-2 mb-3">
                <tr class="fw-bold">
                    <td>Nama Official</td>
                    <td>: {{ $user->name }}</td>
                    <td>Nama Kontingen</td>
                    <td>: {{ $kontingen->nama_kontingen }}</td>
                </tr>
                <tr class="fw-bold">
                    <td>No. Whatsapp</td>
                    <td>: {{ $user->no_wa }}</td>
                    <td>Alamat Kontingen</td>
                    <td>: {{ $kontingen->alamat }}</td>
                </tr>
            </table>
        </div>

        {{-- pemberitahuan --}}
        <div class="alert alert-warning border-0 border-start border-5 border-warning shadow" role="alert">
            <ul class="">
                <li>Fitur Tambah, Edit dan Hapus Atlet akan hilang setalah melakukan pembayaran</li>
                <li>Jadi pastikan data Atlet sudah fix sebelum melakukan pembayaran</li>
            </ul>
        </div>
    @endif

    {{-- pembeda antara tampilan admin dan official --}}
    @if (Auth::user()->level == 'official')
        @if ($invoice->pembayaran == 0)
            <div class="mb-2 d-flex justify-content-end">
                <a href="{{ url('/official/atlet/create') }}" class="btn btn-sm btn-primary">Tambah Atlet<i
                        class="fa fa-plus ms-2"></i></a>
            </div>
        @endif
    @endif

    <div class="shadow p-2 border rounded">
        <div class="table-responsive">
            <table class="table table-sm table-striped table-hover">
                <thead class="text-center ">
                    <tr>
                        <th>No</th>
                        <th>Nama Atlet</th>
                        <th>JK</th>
                        <th>Golongan</th>
                        <th>Kelas Tanding</th>
                        <th>Seni</th>
                        <th>Foto</th>
                        @if (Auth::user()->level == 'official')
                            @if ($invoice->pembayaran == 0)
                                <th>Aksi</th>
                            @endif
                        @endif
                    </tr>
                </thead>

                <tbody>
                    <span class="text-white">
                        <?php $i = 1; ?>
                    </span>
                    @forelse ($atlet as $item)
                        <tr>
                            <td class="text-center">{{ $i }}</td>
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
                            @if (Auth::user()->level == 'official')
                                @if ($invoice->pembayaran == 0)
                                    <td class="text-center">
                                        <a href="{{ url('/official/atlet/' . $item->id) }}"
                                            class="btn btn-secondary"
                                            style="--bs-btn-padding-y:.25rem; --bs-btn-padding-x:.25rem;--bs-btn-font-size:.70rem;"><i
                                                class="fas fa-eye"></i></a>
                                        <a href="{{ url('/official/atlet/' . $item->id . '/edit') }}"
                                            class="btn btn-warning"
                                            style="--bs-btn-padding-y:.25rem; --bs-btn-padding-x:.25rem;--bs-btn-font-size:.70rem;"><i
                                                class="fas fa-edit"></i></a>
                                        <form action="{{ url('/official/atlet/' . $item->id) }}" method="POST"
                                            class="d-inline" onsubmit="return confirm('Anda yakin ingin hapus data?')">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger"
                                                style="--bs-btn-padding-y:.25rem; --bs-btn-padding-x:.25rem;--bs-btn-font-size:.70rem;"><i
                                                    class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                @endif
                            @endif
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
