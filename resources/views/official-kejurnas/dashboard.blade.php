@extends('tampilan.tema_utama')

{{-- title --}}
@section('title')
    Dashboard
@endsection
{{-- /title --}}

{{-- konten --}}
@section('konten')
    <h3 class="mb-3">Data Atlet</h3>

    {{-- <div class="card shadow p-1 mb-4">
        <div class="card-header">Kontingen : {{ $data[4]['namaKontingen'] }}</div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th class="text-center">Jumlah Atlet</th>
                        <th class="text-end">SWO</th>
                        <th class="text-end">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Kategori Tanding</td>
                        <td class="text-center">{{ $data[0]['aTanding'] }}</td>
                        <td class="text-end">{{ $data[1]['kTanding'] }}</td>
                        <td class="text-end">{{ $data[2]['tanding'] }}</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Kategori Tunggal</td>
                        <td class="text-center">{{ $data[0]['aTunggal'] }}</td>
                        <td class="text-end">{{ $data[1]['kTunggal'] }}</td>
                        <td class="text-end">{{ $data[2]['tunggal'] }}</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Kategori Ganda</td>
                        <td class="text-center">{{ $data[0]['aGanda'] }}</td>
                        <td class="text-end">{{ $data[1]['kGanda'] }}</td>
                        <td class="text-end">{{ $data[2]['ganda'] }}</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Kategori Trio</td>
                        <td class="text-center">{{ $data[0]['aTrio'] }}</td>
                        <td class="text-end">{{ $data[1]['kTrio'] }}</td>
                        <td class="text-end">{{ $data[2]['trio'] }}</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-end"><b>Jumlah :</b></td>
                        <td class="text-end"><b>Rp{{ $data[3]['jumlah'] }}</b></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div> --}}

    {{-- invoice --}}
    <div class="shadow p-3 mb-4 bg-white rounded border ">
        
        {{-- kop --}}
        <div class="d-flex align-items-center border-2 border-bottom border-black mb-3">
            <div>
                <img src="{{ asset('storage/img-web/rewako.png') }}" alt="" srcset="" width="100px">
            </div>
            <div class="d-flex flex-column fw-bold">
                <span>PANITIA PELAKSANA</span>
                <span>PEN TURNAMEN NASIONAL</span>
                <span>PENCAK SILAT TAPAK SUCI</span>
                <span>REWAKO CUP I</span>
            </div>
        </div> {{-- /kop --}}

        {{-- data kontingen --}}
        <div class="border-2 border-bottom border-black mb-3">
            <table>
                <tr class="fw-bold">
                    <td width="200px">Nama Kontingen</td>
                    <td>: {{ $data[4]['namaKontingen'] }}</td>
                </tr>
            </table>
        </div>  {{-- /data kontingen --}}

        {{-- rincian pembayaran --}}
        <div>
            <div class="table-responsive">
                <h6 class="text-bg-secondary p-2">A. PRA USIA DINI</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kategori</th>
                                <th class="text-center">Jumlah Atlet</th>
                                <th class="text-end">SWO</th>
                                <th class="text-end">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Kategori Tanding</td>
                                <td class="text-center">{{ $data[0]['aTanding'] }}</td>
                                <td class="text-end">{{ $data[1]['kTanding'] }}</td>
                                <td class="text-end">{{ $data[2]['tanding'] }}</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Kategori Tunggal</td>
                                <td class="text-center">{{ $data[0]['aTunggal'] }}</td>
                                <td class="text-end">{{ $data[1]['kTunggal'] }}</td>
                                <td class="text-end">{{ $data[2]['tunggal'] }}</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Kategori Ganda</td>
                                <td class="text-center">{{ $data[0]['aGanda'] }}</td>
                                <td class="text-end">{{ $data[1]['kGanda'] }}</td>
                                <td class="text-end">{{ $data[2]['ganda'] }}</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Kategori Trio</td>
                                <td class="text-center">{{ $data[0]['aTrio'] }}</td>
                                <td class="text-end">{{ $data[1]['kTrio'] }}</td>
                                <td class="text-end">{{ $data[2]['trio'] }}</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-end"><b>Jumlah :</b></td>
                                <td class="text-end"><b>Rp{{ $data[3]['jumlah'] }}</b></td>
                            </tr>
                        </tbody>
                    </table>
            </div>
            <div class="table-responsive">
                <h6 class="text-bg-secondary p-2">B. USIA DINI</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kategori</th>
                                <th class="text-center">Jumlah Atlet</th>
                                <th class="text-end">SWO</th>
                                <th class="text-end">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Kategori Tanding</td>
                                <td class="text-center">{{ $data[0]['aTanding'] }}</td>
                                <td class="text-end">{{ $data[1]['kTanding'] }}</td>
                                <td class="text-end">{{ $data[2]['tanding'] }}</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Kategori Tunggal</td>
                                <td class="text-center">{{ $data[0]['aTunggal'] }}</td>
                                <td class="text-end">{{ $data[1]['kTunggal'] }}</td>
                                <td class="text-end">{{ $data[2]['tunggal'] }}</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Kategori Ganda</td>
                                <td class="text-center">{{ $data[0]['aGanda'] }}</td>
                                <td class="text-end">{{ $data[1]['kGanda'] }}</td>
                                <td class="text-end">{{ $data[2]['ganda'] }}</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Kategori Trio</td>
                                <td class="text-center">{{ $data[0]['aTrio'] }}</td>
                                <td class="text-end">{{ $data[1]['kTrio'] }}</td>
                                <td class="text-end">{{ $data[2]['trio'] }}</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-end"><b>Jumlah :</b></td>
                                <td class="text-end"><b>Rp{{ $data[3]['jumlah'] }}</b></td>
                            </tr>
                        </tbody>
                    </table>
            </div>
            <div class="table-responsive">
                <h6 class="text-bg-secondary p-2">C. PRA REMAJA</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kategori</th>
                                <th class="text-center">Jumlah Atlet</th>
                                <th class="text-end">SWO</th>
                                <th class="text-end">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Kategori Tanding</td>
                                <td class="text-center">{{ $data[0]['aTanding'] }}</td>
                                <td class="text-end">{{ $data[1]['kTanding'] }}</td>
                                <td class="text-end">{{ $data[2]['tanding'] }}</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Kategori Tunggal</td>
                                <td class="text-center">{{ $data[0]['aTunggal'] }}</td>
                                <td class="text-end">{{ $data[1]['kTunggal'] }}</td>
                                <td class="text-end">{{ $data[2]['tunggal'] }}</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Kategori Ganda</td>
                                <td class="text-center">{{ $data[0]['aGanda'] }}</td>
                                <td class="text-end">{{ $data[1]['kGanda'] }}</td>
                                <td class="text-end">{{ $data[2]['ganda'] }}</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Kategori Trio</td>
                                <td class="text-center">{{ $data[0]['aTrio'] }}</td>
                                <td class="text-end">{{ $data[1]['kTrio'] }}</td>
                                <td class="text-end">{{ $data[2]['trio'] }}</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-end"><b>Jumlah :</b></td>
                                <td class="text-end"><b>Rp{{ $data[3]['jumlah'] }}</b></td>
                            </tr>
                        </tbody>
                    </table>
            </div>
            <div class="table-responsive">
                <h6 class="text-bg-secondary p-2">D. REMAJA</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kategori</th>
                                <th class="text-center">Jumlah Atlet</th>
                                <th class="text-end">SWO</th>
                                <th class="text-end">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Kategori Tanding</td>
                                <td class="text-center">{{ $data[0]['aTanding'] }}</td>
                                <td class="text-end">{{ $data[1]['kTanding'] }}</td>
                                <td class="text-end">{{ $data[2]['tanding'] }}</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Kategori Tunggal</td>
                                <td class="text-center">{{ $data[0]['aTunggal'] }}</td>
                                <td class="text-end">{{ $data[1]['kTunggal'] }}</td>
                                <td class="text-end">{{ $data[2]['tunggal'] }}</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Kategori Ganda</td>
                                <td class="text-center">{{ $data[0]['aGanda'] }}</td>
                                <td class="text-end">{{ $data[1]['kGanda'] }}</td>
                                <td class="text-end">{{ $data[2]['ganda'] }}</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Kategori Trio</td>
                                <td class="text-center">{{ $data[0]['aTrio'] }}</td>
                                <td class="text-end">{{ $data[1]['kTrio'] }}</td>
                                <td class="text-end">{{ $data[2]['trio'] }}</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-end"><b>Jumlah :</b></td>
                                <td class="text-end"><b>Rp{{ $data[3]['jumlah'] }}</b></td>
                            </tr>
                        </tbody>
                    </table>
            </div>
            <div class="table-responsive">
                <h6 class="text-bg-secondary p-2">E. DEWASA</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kategori</th>
                                <th class="text-center">Jumlah Atlet</th>
                                <th class="text-end">SWO</th>
                                <th class="text-end">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Kategori Tanding</td>
                                <td class="text-center">{{ $data[0]['aTanding'] }}</td>
                                <td class="text-end">{{ $data[1]['kTanding'] }}</td>
                                <td class="text-end">{{ $data[2]['tanding'] }}</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Kategori Tunggal</td>
                                <td class="text-center">{{ $data[0]['aTunggal'] }}</td>
                                <td class="text-end">{{ $data[1]['kTunggal'] }}</td>
                                <td class="text-end">{{ $data[2]['tunggal'] }}</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Kategori Ganda</td>
                                <td class="text-center">{{ $data[0]['aGanda'] }}</td>
                                <td class="text-end">{{ $data[1]['kGanda'] }}</td>
                                <td class="text-end">{{ $data[2]['ganda'] }}</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Kategori Trio</td>
                                <td class="text-center">{{ $data[0]['aTrio'] }}</td>
                                <td class="text-end">{{ $data[1]['kTrio'] }}</td>
                                <td class="text-end">{{ $data[2]['trio'] }}</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-end"><b>Jumlah :</b></td>
                                <td class="text-end"><b>Rp{{ $data[3]['jumlah'] }}</b></td>
                            </tr>
                        </tbody>
                    </table>
            </div>
        </div> {{-- /rincian pembayaran --}}
    </div> {{-- /invoice --}}
    

    {{-- status pembayaran --}}
    @if ($data[5]['statusBayar'] == 1)
        <div class="p-2 alert alert-success">
            <div class="d-flex bg-danger-subtle justify-content-around align-items-center">
                <div>
                    <h1>Status Pembayaran : LUNAS</h1>
                </div>
                <div>
                    <h1><i class="fas fa-check-circle text-success"></i></h1>
                </div>
            </div>
        </div>
    @else
        <div class="p-2 alert alert-danger">
            <div class="d-flex bg-danger-subtle justify-content-around align-items-center">
                <div>
                    <h1>Total Pembayaran : Rp{{ $data[3]['jumlah'] }}</h1>
                    <a href="https://wa.me/6281255242365" class="btn btn-sm btn-success" target="_blank"><i
                            class="fab fa-whatsapp"></i>
                        Konfirmasi Pembayaran</a>
                </div>
                <div>
                    <h1><i class="fas fa-times-circle text-danger"></i></h1>
                </div>
            </div>
        </div>
    @endif
@endsection
{{-- /konten --}}
