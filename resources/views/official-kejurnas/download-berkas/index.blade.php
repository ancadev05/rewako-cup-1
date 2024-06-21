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
    <div class="alert alert-info border-0 border-start border-5 border-info shadow" role="alert">
        <span>Berkas berikut didownload dan dicetak, kemudian diisi dan disetor saat registrasi ulang</span>
    </div>


    {{-- download berkas --}}
    <div class="shadow p-2 border rounded">
        <div class="table-responsive">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Berkas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Invoice</td>
                        <td><a href="{{ url('/official/download/invoice') }}" class="btn btn-sm btn-secondary m-auto"><i class="fas fa-eye"></i> Lihat</a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Surat Izin & Pernyataan Atlet</td>
                        <td><a href="{{ asset('storage/download-file/surat-pernyataan-atlet.pdf') }}" target="_blank" class="btn btn-sm btn-secondary m-auto"><i class="fas fa-eye"></i> Lihat</a>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Surat Izin (<i class="text-danger">bagi official atau atlet yang membutuhkan surat izin di instansi masing-masing</i>)</td>
                        <td><a href="{{ asset('storage/download-file/permohonan-perizinan.pdf') }}" target="_blank" class="btn btn-sm btn-secondary m-auto"><i class="fas fa-eye"></i> Lihat</a>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Proposal</td>
                        <td><a href="{{ asset('storage/download-file/proposal.pdf') }}" target="_blank" class="btn btn-sm btn-secondary m-auto"><i class="fas fa-eye"></i> Lihat</a>
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Peraturan Olahraga Tapak Suci</td>
                        <td><a href="{{ url('official/peraturan-olahraga') }}" target="_blank" class="btn btn-sm btn-secondary m-auto"><i class="fas fa-eye"></i> Lihat</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>{{-- /index download berkas --}}
@endsection
