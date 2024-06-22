@extends('tampilan.tema_utama')

{{-- title --}}
@section('title')
    Admin | Tarik Data
@endsection
{{-- /title --}}

{{-- konten --}}
@section('konten')
    <h3 class="border-bottom border-2 mb-3">Daftar Atlet Fix</h3>

    <div class="shadow p-2 border rounded">
        <div class="table-responsive">
            <table class="table table-sm table-striped table-hover" id="atlet">
                <thead class="text-center ">
                    <tr>
                        <th>#id</th>
                        <th>Nama Atlet</th>
                        <th>JK</th>
                        <th>Kelas Tanding</th>
                        <th>Kontingen</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($atlet_fix as $item)
                        <tr>
                            {{-- <td class="text-center">{{ $i }}</td> --}}
                            <td>{{ $item->pembayaran }}</td>
                            {{-- <td>{{ $item->user->id }}</td> --}}
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
