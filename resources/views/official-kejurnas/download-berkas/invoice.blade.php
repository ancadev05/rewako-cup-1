@extends('tampilan.tema_utama')

{{-- title --}}
@section('title')
    Official | Invoice
@endsection
{{-- /title --}}

{{-- konten --}}
@section('konten')
    <div class="kertas border shadow mb-3" id="print">
        {{-- invoice --}}
        <div class="" style="font-size: 12px">

            {{-- kop --}}
            <div class="d-flex align-items-center border-2 border-bottom border-black mb-3">
                <div>
                    <img src="{{ asset('storage/img-web/rewako.png') }}" alt="" srcset="" width="90px">
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
                    <tr class="fw-bold">
                        <td width="200px">Alamat Kontingen</td>
                        <td>: {{ $data[4]['namaKontingen'] }}</td>
                    </tr>
                </table>
            </div> {{-- /data kontingen --}}

            {{-- rincian pembayaran --}}
            <div>
                <div class="table-responsive">
                    <div class="text-bg-secondary p-1 fw-bold ">A. PRA USIA DINI</div>
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kategori</th>
                                    <th class="text-center">Jumlah Atlet</th>
                                    <th class="text-end">SWP</th>
                                    <th class="text-end">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Seni Tunggal</td>
                                    <td class="text-center">{{ $data[0]['aTunggal'] }}</td>
                                    <td class="text-end">Rp. 250.000,-</td>
                                    <td class="text-end">{{ $data[2]['tunggal'] }}</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-end"><b>Jumlah :</b></td>
                                    <td class="text-end"><b>Rp{{ $data[3]['jumlah'] }}</b></td>
                                </tr>
                            </tbody>
                        </table>
                </div>
                <div class="table-responsive">
                    <div class="text-bg-secondary p-1 fw-bold">B. USIA DINI</div>
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kategori</th>
                                    <th class="text-center">Jumlah Atlet</th>
                                    <th class="text-end">SWP</th>
                                    <th class="text-end">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Tanding</td>
                                    <td class="text-center">{{ $data[0]['aTanding'] }}</td>
                                    <td class="text-end">Rp. 250.000,-</td>
                                    <td class="text-end">{{ $data[2]['tanding'] }}</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Seni Tunggal</td>
                                    <td class="text-center">{{ $data[0]['aTunggal'] }}</td>
                                    <td class="text-end">Rp. 250.000,-</td>
                                    <td class="text-end">{{ $data[2]['tunggal'] }}</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-end"><b>Jumlah :</b></td>
                                    <td class="text-end"><b>Rp{{ $data[3]['jumlah'] }}</b></td>
                                </tr>
                            </tbody>
                        </table>
                </div>
                <div class="table-responsive">
                    <div class="text-bg-secondary p-1 fw-bold">C. PRA REMAJA</div>
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kategori</th>
                                    <th class="text-center">Jumlah Atlet</th>
                                    <th class="text-end">SWP</th>
                                    <th class="text-end">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Tanding</td>
                                    <td class="text-center">{{ $data[0]['aTanding'] }}</td>
                                    <td class="text-end">Rp. 250.000,-</td>
                                    <td class="text-end">{{ $data[2]['tanding'] }}</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Seni Tunggal</td>
                                    <td class="text-center">{{ $data[0]['aTunggal'] }}</td>
                                    <td class="text-end">Rp. 250.000,-</td>
                                    <td class="text-end">{{ $data[2]['tunggal'] }}</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Seni Ganda</td>
                                    <td class="text-center">{{ $data[0]['aGanda'] }}</td>
                                    <td class="text-end">Rp. 450.000,-</td>
                                    <td class="text-end">{{ $data[2]['ganda'] }}</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-end"><b>Jumlah :</b></td>
                                    <td class="text-end"><b>Rp{{ $data[3]['jumlah'] }}</b></td>
                                </tr>
                            </tbody>
                        </table>
                </div>
                <div class="table-responsive">
                    <div class="text-bg-secondary p-1 fw-bold">D. REMAJA</div>
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kategori</th>
                                    <th class="text-center">Jumlah Atlet</th>
                                    <th class="text-end">SWP</th>
                                    <th class="text-end">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Tanding</td>
                                    <td class="text-center">{{ $data[0]['aTanding'] }}</td>
                                    <td class="text-end">Rp. 250.000,-</td>
                                    <td class="text-end">{{ $data[2]['tanding'] }}</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Seni Tunggal</td>
                                    <td class="text-center">{{ $data[0]['aTunggal'] }}</td>
                                    <td class="text-end">Rp. 250.000,-</td>
                                    <td class="text-end">{{ $data[2]['tunggal'] }}</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Seni Ganda</td>
                                    <td class="text-center">{{ $data[0]['aGanda'] }}</td>
                                    <td class="text-end">Rp. 450.000,-</td>
                                    <td class="text-end">{{ $data[2]['ganda'] }}</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Seni Trio</td>
                                    <td class="text-center">{{ $data[0]['aTrio'] }}</td>
                                    <td class="text-end">Rp. 700.000,-</td>
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
                    <div class="text-bg-secondary p-1 fw-bold">E. DEWASA</div>
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kategori</th>
                                    <th class="text-center">Jumlah Atlet</th>
                                    <th class="text-end">SWP</th>
                                    <th class="text-end">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Tanding</td>
                                    <td class="text-center">{{ $data[0]['aTanding'] }}</td>
                                    <td class="text-end">Rp. 250.000,-</td>
                                    <td class="text-end">{{ $data[2]['tanding'] }}</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Seni Tunggal</td>
                                    <td class="text-center">{{ $data[0]['aTunggal'] }}</td>
                                    <td class="text-end">Rp. 250.000,-</td>
                                    <td class="text-end">{{ $data[2]['tunggal'] }}</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Seni Ganda</td>
                                    <td class="text-center">{{ $data[0]['aGanda'] }}</td>
                                    <td class="text-end">Rp. 450.000,-</td>
                                    <td class="text-end">{{ $data[2]['ganda'] }}</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Seni Trio</td>
                                    <td class="text-center">{{ $data[0]['aTrio'] }}</td>
                                    <td class="text-end">Rp. 700.000,-</td>
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

            {{-- tanggal invoice --}}
            <div class="d-flex justify-content-between ">
                <span class="fw-bold text-bg-warning p-2 d-inline-block ">
                    <table>
                        <tr>
                            <td>Bank</td>
                            <td>: Mandiri</td>
                        </tr>
                        <tr>
                            <td>Atas Nama</td>
                            <td>: Mandiri</td>
                        </tr>
                        <tr>
                            <td>No. Rekening</td>
                            <td>: 8998990</td>
                        </tr>
                    </table>
                </span>
                <div>
                    @php
                        $tgl = tanggalIndonesia(date('Y-m-d'));
                    @endphp
                    <span class="d-block">{{ $tgl }}</span>
                    <img src="{{ asset('storage/img-web/ttd-bendahara.png') }}" alt="qr" height="90px">
                    {{-- nama bendahara --}}
                    <div class="d-flex flex-column fw-bold">
                        <span class="border-bottom border-2 border-dark">Irma, S.Pd., K.Ka.</span>
                        <span>Bendahara Panitia </span>
                    </div> {{-- /nama bendahara --}}
                </div>
            </div>
        </div> {{-- /invoice --}}
    </div> {{-- /batas kertas --}}

    <button href="#" class="btn btn-sm btn-success d-block m-auto"
        onclick="return printArea(print)">Download</button>
@endsection
