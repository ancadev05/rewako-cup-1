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
        <div class="alert alert-info border-0 border-start border-5 border-info shadow" role="alert">
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
            <table class="table table-sm table-striped table-hover" id="atlet">
                <thead class="text-center ">
                    <tr>
                        <th>No</th>
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
                            <td class="text-center">
                                <a href="{{ url('/official/atlet/' . $item->id) }}" class="btn btn-secondary"
                                    style="--bs-btn-padding-y:.25rem; --bs-btn-padding-x:.25rem;--bs-btn-font-size:.70rem;"><i
                                        class="fas fa-eye"></i></a>
                                @if (Auth::user()->level == 'admin-kejurnas')
                                    <a href="{{ url('/official/atlet/' . $item->id . '/edit') }}" class="btn btn-warning"
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
                                @endif
                                {{-- aksi untuk official sebelum membayar --}}
                                @if (Auth::user()->level == 'official')
                                    @if ($invoice->pembayaran == 0)
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
                                    @endif
                                @endif
                            </td>{{-- /aksi untuk official sebelum membayar --}}
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
        //     $('#atlet').DataTable();
        // });

        // $('#atlet').DataTable({
        //     select: true
        //     buttons: [{
        //             extend: 'pdf',
        //             oriented: 'landscape',
        //             pageSize: 'A4',
        //             title: 'data-atlet',
        //             download: 'open'
        //         },
        //         'csv', 'excel'
        //     ]
        // });
        // })

        // (function(f) {
        //     "function" === typeof define && define.amd ? define(["jquery", "datatables.net", "datatables.net-buttons"],
        //         function(e) {
        //             return f(e, window, document)
        //         }) : "object" === typeof exports ? module.exports = function(e, c) {
        //         e || (e = window);
        //         if (!c || !c.fn.dataTable) c = require("datatables.net")(e, c).$;
        //         c.fn.dataTable.Buttons || require("datatables.net-buttons")(e, c);
        //         return f(c, e, e.document)
        //     } : f(jQuery, window, document)
        // })(function(f, e, c) {
        //     var i = f.fn.dataTable,
        //         h = c.createElement("a");
        //     i.ext.buttons.print = {
        //         className: "buttons-print",
        //         text: function(b) {
        //             return b.i18n("buttons.print", "Print")
        //         },
        //         action: function(b, c, i, d) {
        //             var a = c.buttons.exportData(d.exportOptions),
        //                 k = function(b, a) {
        //                     for (var c = "<tr>", d = 0, e = b.length; d < e; d++) c += "<" + a + ">" + b[d] +
        //                         "</" + a + ">";
        //                     return c + "</tr>"
        //                 },
        //                 b = '<table class="' + c.table().node().className + '">';
        //             d.header && (b += "<thead>" + k(a.header, "th") + "</thead>");
        //             for (var b = b + "<tbody>", l = 0, m = a.body.length; l < m; l++) b += k(a.body[l], "td");
        //             b += "</tbody>";
        //             d.footer && a.footer && (b += "<tfoot>" + k(a.footer, "th") + "</tfoot>");
        //             var g = e.open("", ""),
        //                 a = d.title;
        //             "function" === typeof a && (a = a()); - 1 !== a.indexOf("*") && (a = a.replace("*", f(
        //                 "title").text()));
        //             g.document.close();
        //             var j = "<title>" + a + "</title>";
        //             f("style, link").each(function() {
        //                 var c = j,
        //                     b = f(this).clone()[0],
        //                     a;
        //                 "link" === b.nodeName.toLowerCase() && (h.href = b.href, a = h.host, -1 === a
        //                     .indexOf("/") && 0 !== h.pathname.indexOf("/") && (a += "/"), b.href = h
        //                     .protocol + "//" + a + h.pathname + h.search);
        //                 j = c + b.outerHTML
        //             });
        //             try {
        //                 g.document.head.innerHTML = j
        //             } catch (n) {
        //                 f(g.document.head).html(j)
        //             }
        //             g.document.body.innerHTML = "<h1>" + a + "</h1><div>" +
        //                 ("function" === typeof d.message ? d.message(c, i, d) : d.message) + "</div>" + b;
        //             d.customize && d.customize(g);
        //             setTimeout(function() {
        //                 d.autoPrint && (g.print(), g.close())
        //             }, 250)
        //         },
        //         title: "*",
        //         message: "",
        //         exportOptions: {},
        //         header: !0,
        //         footer: !1,
        //         autoPrint: !0,
        //         customize: null
        //     };
        //     return i.Buttons
        // });

        new DataTable('#atlet', {
            layout: {
                topStart: {
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
                }
            }
        });
    </script>
@endsection
