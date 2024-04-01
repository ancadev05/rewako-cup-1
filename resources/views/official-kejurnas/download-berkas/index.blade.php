@extends('tampilan.tema_utama')

{{-- title --}}
@section('title')
    Download Berkas
@endsection
{{-- /title --}}

{{-- konten --}}
@section('konten')
    <h3 class="border-bottom border-2 mb-3">Download Berkas</h3>

    {{-- pemberitahuan --}}
    <div class="alert alert-warning border-0 border-start border-5 border-warning shadow" role="alert">
        <span>Berkas yang dapat di download setelah melakukan pembayaran</span>
        <a href="#">Konfirmasi pembayaran</a>
    </div>


    {{-- download berkas --}}
    <div class="shadow p-2 border rounded">
        <div class="table-responsive">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Berkas</th>
                        <th>Ket.</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Invoice</td>
                        <td><i class="fas fa-check-circle text-success"></i></td>
                        <td><a href="{{ url('/official/download/invoice') }}" class="btn btn-sm btn-secondary m-auto"><i class="fas fa-eye"></i> Lihat</a>
                        </td>
                    </tr>
                    @if ($invoice->pembayaran == 1)
                        <tr>
                            <td>2</td>
                            <td>Kwitansi Pembayaran</td>
                            <td><i class="fas fa-check-circle text-success"></i></td>
                            <td><a href="{{ url('official/download/kwitansi') }}" class="btn btn-sm btn-secondary m-auto"><i
                                        class="fas fa-eye"></i> Lihat</a></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Id Card</td>
                            <td><i class="fas fa-check-circle text-success"></i></td>
                            <td><a href="{{ url('official/download/idcard') }}" class="btn btn-sm btn-secondary m-auto"><i
                                        class="fas fa-eye"></i> Lihat</a></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Form A-1</td>
                            <td><i class="fas fa-check-circle text-success"></i></td>
                            <td><a href="{{ url('official/download/a-1') }}" class="btn btn-sm btn-secondary m-auto"><i
                                        class="fas fa-eye"></i> Lihat</a></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Form B</td>
                            <td><i class="fas fa-check-circle text-success"></i></td>
                            <td><a href="#" class="btn btn-sm btn-secondary m-auto"><i class="fas fa-eye"></i>
                                    Lihat</a></td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Form B</td>
                            <td><i class="fas fa-check-circle text-success"></i></td>
                            <td><a href="#" class="btn btn-sm btn-secondary m-auto"><i class="fas fa-eye"></i>
                                    Lihat</a></td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>{{-- /index download berkas --}}
@endsection
