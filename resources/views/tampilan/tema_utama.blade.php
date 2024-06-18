@php
    $username = 'off1';
@endphp
<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title')</title>
        
        {{-- Favicon --}}
        <link rel="shortcut icon" href="{{ asset('storage/img-web/ts.png') }}" type="image/x-icon">
        
        {{-- Bootstrap 5 --}}
        {{-- <link href="{{ asset('assets/bootstrap5/css/bootstrap.css') }}" rel="stylesheet" /> --}}
        {{-- Desain Template --}}
        <link href="{{ asset('assets/template-css/styles.css') }}" rel="stylesheet" />
        {{-- Font Awesome --}}
        <link href="{{ asset('assets/fontawesome/css/all.css') }}" rel="stylesheet" />
        {{-- Alert animasi --}}
        <link href="{{ asset('assets/costum-style/css-costum.css') }}" rel="stylesheet" />
        {{-- SweetAlert --}}
        <link rel="stylesheet" href="{{ asset('assets/sweetalert/sweetalert2.min.css') }}">
        {{-- datatables --}}
        <link rel="stylesheet" href="{{ asset('assets/datatables/datatables.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/datatables/Buttons-2.4.2/css/buttons.dataTables.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/datatables/Buttons-2.4.2/css/buttons.bootstrap5.css') }}">

        {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet"> --}}
    {{-- <link
        href="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.0.8/af-2.7.0/b-3.0.2/b-html5-3.0.2/b-print-3.0.2/datatables.min.css"
        rel="stylesheet" /> --}}

    </head>
    
<body class="sb-nav-fixed">

    @include('tampilan.komponen.top-navigasi')

    <div class="bg-white" id="layoutSidenav">

        {{-- Sidebar --}}
        @include('tampilan.komponen.sidebar')
        {{-- End Sidebar --}}

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid p-3">

                    {{-- Pesan sukses --}}
                    @include('tampilan.komponen.alert')

                    {{-- Content --}}
                    @yield('konten')
                    {{-- End Content --}}

                </div>
            </main>

            {{-- Footer --}}
            @include('tampilan.komponen.footer')
            {{-- End Footer --}}

        </div>
    </div>

    {{-- Jquery --}}
    <script src="{{ asset('assets/jquery/jquery-3.7.1.min.js') }}"></script>

    {{-- JS Costum --}}
    <script src="{{ asset('assets/template-js/scripts.js') }}"></script>

    {{-- Bootstrap 5 --}}
    {{-- <script src="{{ asset('assets/bootstrap5/js/bootstrap.js') }}"></script> --}}
    <script src="{{ asset('assets/bootstrap5/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap5/js/popper.min.js') }}"></script>

    {{-- SweetAlert --}}
    <script src="{{ asset('assets/sweetalert/sweetalert2.all.min.js') }}"></script>

    {{-- Script Costum --}}
    <script src="{{ asset('assets/template-js/script-costum.js') }}"></script>

    {{-- datatables --}}
    <script src="{{ asset('assets/datatables/datatables.js') }}"></script>
    <script src="{{ asset('assets/datatables/datatables-button.js') }}"></script>
    <script src="{{ asset('assets/datatables/Buttons-2.4.2/js/dataTables.buttons.js') }}"></script>
    <script src="{{ asset('assets/datatables/Buttons-2.4.2/js/buttons.dataTables.js') }}"></script>
    <script src="{{ asset('assets/datatables/Buttons-2.4.2/js/buttons.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/datatables/Buttons-2.4.2/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/datatables/Buttons-2.4.2/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/datatables/Buttons-2.4.2/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/datatables/JSZip-3.10.1/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/datatables/pdfmake-0.2.7/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/datatables/pdfmake-0.2.7/vfs_fonts.js') }}"></script>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script> --}}
{{-- <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.0.8/af-2.7.0/b-3.0.2/b-html5-3.0.2/b-print-3.0.2/datatables.min.js"></script> --}}

    @yield('datatables')
    @yield('sweetalert')
    @yield('script')


</body>

</html>
