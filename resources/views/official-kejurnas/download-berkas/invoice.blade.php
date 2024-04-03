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
        <div class=" position-relative" style="font-size: 12px">

            {{-- logoo lunas --}}
            @if ($invoice->pembayaran == 1)
                <img src="{{ asset('storage/img-web/lunas.png') }}" alt=""
                    style="top:50%;left:50%;transform: translate(-50%, -50%);" class=" position-absolute m-auto">
            @endif
            {{-- /logoo lunas --}}

            {{-- kop --}}
            <div class="d-flex justify-content-between border-2 border-bottom border-black pb-1">
                {{-- logoo kop --}}
                <div class="d-flex align-items-center ">
                    <div class="me-2">
                        <img src="{{ asset('storage/img-web/rewako.png') }}" alt="" srcset="" width="90px">
                    </div>
                    <div class="d-flex flex-column fw-bold">
                        <span>PANITIA PELAKSANA</span>
                        <span>OPEN TURNAMEN NASIONAL</span>
                        <span>PENCAK SILAT TAPAK SUCI</span>
                        <span>REWAKO CUP I</span>
                    </div>
                </div>
                {{-- logo invoice --}}
                <div class="d-flex flex-column ">
                    <span style="font-size: 28px; line-height:1;" class="m-0 p-0 fw-bold">INVOICE</span>
                    <span style="line-height: 1" class="m-0 p-0 border-1 border-bottom">No.
                        {{ $invoice->id_username_official }}</span>
                </div>
            </div> {{-- /kop --}}

            {{-- data kontingen --}}
            <div style="font-size: 12px">
                <table class="table table-sm table-borderless">
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
            {{-- /data kontingen --}}

            {{-- rincian pembayaran --}}
            <div style="font-size: 11px">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            {{-- pra usia dini --}}
                            <tr>
                                <td colspan="5" class="text-bg-secondary p-1 fw-bold ">A. PRA USIA DINI</td>
                            </tr>
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
                                <td>Seni Tunggal (Tangan Kosong - Bersenjata)</td>
                                <td class="text-center">{{ $kategori['pud_tunggal'] }}</td>
                                <td class="text-end">Rp. 250.000,-</td>
                                <td class="text-end"></td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-end"><b>Jumlah :</b></td>
                                <td class="text-end"><b>Rp. {{ format_uang($biaya['jml_pud']) . ',-' }}</b></td>
                            </tr>
                            <tr>
                        </tbody>
                        {{-- usia dini --}}
                        <tr>
                            <td colspan="5" class="text-bg-secondary p-1 fw-bold ">B. USIA DINI</td>
                        </tr>
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
                                <td class="text-center">{{ $kategori['ud_tanding'] }}</td>
                                <td class="text-end">Rp. 250.000,-</td>
                                <td class="text-end">{{ $biaya['by_ud_tanding'] }}</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Seni Tunggal (Tangan Kosong - Bersenjata)</td>
                                <td class="text-center">{{ $kategori['ud_tunggal'] }}</td>
                                <td class="text-end">Rp. 250.000,-</td>
                                <td class="text-end">{{ $biaya['by_ud_tunggal'] }}</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-end"><b>Jumlah :</b></td>
                                <td class="text-end"><b>Rp. {{ format_uang($biaya['jml_ud']) . ',-' }}</b></td>
                            </tr>
                        </tbody>
                        {{-- pra remaja --}}
                        <tr>
                            <td colspan="5" class="text-bg-secondary p-1 fw-bold ">C. PRA REMAJA</td>
                        </tr>
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
                                <td class="text-center">{{ $kategori['pr_tanding'] }}</td>
                                <td class="text-end">Rp. 250.000,-</td>
                                <td class="text-end">{{ $biaya['by_pr_tanding'] }}</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Seni Tunggal (Tangan Kosong - Bersenjata)</td>
                                <td class="text-center">{{ $kategori['pr_tunggal'] }}</td>
                                <td class="text-end">Rp. 250.000,-</td>
                                <td class="text-end">{{ $biaya['by_pr_tunggal'] }}</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Seni Ganda (Tangan Kosong - Bersenjata)</td>
                                <td class="text-center">{{ $kategori['pr_ganda'] }}</td>
                                <td class="text-end">Rp. 450.000,-</td>
                                <td class="text-end">{{ $biaya['by_pr_ganda'] }}</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-end"><b>Jumlah :</b></td>
                                <td class="text-end"><b>Rp. {{ format_uang($biaya['jml_pr']) . ',-' }}</b></td>
                            </tr>
                        </tbody>
                        {{-- remaja --}}
                        <tr>
                            <td colspan="5" class="text-bg-secondary p-1 fw-bold ">D. REMAJA</td>
                        </tr>
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
                                <td class="text-center">{{ $kategori['r_tanding'] }}</td>
                                <td class="text-end">Rp. 250.000,-</td>
                                <td class="text-end">{{ $biaya['by_r_tanding'] }}</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Seni Tunggal (Tangan Kosong - Bersenjata)</td>
                                <td class="text-center">{{ $kategori['r_tunggal'] }}</td>
                                <td class="text-end">Rp. 250.000,-</td>
                                <td class="text-end">{{ $biaya['by_r_tunggal'] }}</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Seni Ganda (Tangan Kosong - Bersenjata)</td>
                                <td class="text-center">{{ $kategori['r_ganda'] }}</td>
                                <td class="text-end">Rp. 450.000,-</td>
                                <td class="text-end">{{ $biaya['by_r_ganda'] }}</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Seni Trio (Tangan Kosong - Bersenjata)</td>
                                <td class="text-center">{{ $kategori['r_trio'] }}</td>
                                <td class="text-end">Rp. 700.000,-</td>
                                <td class="text-end">{{ $biaya['by_r_trio'] }}</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-end"><b>Jumlah :</b></td>
                                <td class="text-end"><b>Rp. {{ format_uang($biaya['jml_r']) . ',-' }}</b></td>
                            </tr>
                        </tbody>
                        {{-- dewasa --}}
                        <tr>
                            <td colspan="5" class="text-bg-secondary p-1 fw-bold ">E. DEWASA</td>
                        </tr>
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
                                <td class="text-center">{{ $kategori['d_tanding'] }}</td>
                                <td class="text-end">Rp. 250.000,-</td>
                                <td class="text-end">{{ $biaya['by_d_tanding'] }}</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Seni Tunggal (Tangan Kosong - Bersenjata)</td>
                                <td class="text-center">{{ $kategori['d_tunggal'] }}</td>
                                <td class="text-end">Rp. 250.000,-</td>
                                <td class="text-end">{{ $biaya['by_d_tunggal'] }}</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Seni Ganda (Tangan Kosong - Bersenjata)</td>
                                <td class="text-center">{{ $kategori['d_ganda'] }}</td>
                                <td class="text-end">Rp. 450.000,-</td>
                                <td class="text-end">{{ $biaya['by_d_ganda'] }}</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Seni Trio (Tangan Kosong - Bersenjata)</td>
                                <td class="text-center">{{ $kategori['d_trio'] }}</td>
                                <td class="text-end">Rp. 700.000,-</td>
                                <td class="text-end">{{ $biaya['by_d_trio'] }}</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-end"><b>Jumlah :</b></td>
                                <td class="text-end"><b>Rp. {{ format_uang($biaya['jml_d']) . ',-' }}</b></td>
                            </tr>
                            {{-- total biaya --}}
                            <tr>
                                <td class="fw-bold text-end" colspan="4">Total Pembayaran :</td>
                                <td class="fw-bold text-end">Rp. {{ format_uang($totalBiaya) . ',-' }}</td>
                            </tr>
                            {{-- /total biaya --}}
                        </tbody>
                    </table> {{-- /table --}}
                </div>{{-- /end table responsive --}}
            </div> {{-- /rincian pembayaran --}}

            {{-- tanggal invoice --}}
            <div class="d-flex justify-content-between ">
                <div class="fw-bold border">
                    <table>
                        <tr>
                            <td>Bank</td>
                            <td>: Mandiri</td>
                        </tr>
                        <tr>
                            <td>Atas Nama</td>
                            <td>: Irma</td>
                        </tr>
                        <tr>
                            <td>No. Rekening</td>
                            <td>: 174-00-0304723-0</td>
                        </tr>
                    </table>
                </div>
                <div>
                    @php
                        $tgl = hariTanggalIndonesia(date('Y-m-d'));
                    @endphp
                    <span class="d-block">{{ $tgl }}</span>
                    <img src="{{ asset('storage/img-web/ttd-bendahara.png') }}" alt="qr" height="60px">
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
