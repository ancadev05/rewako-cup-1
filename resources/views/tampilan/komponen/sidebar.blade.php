{{-- sidebar utama --}}
<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                {{-- admin kejurnas --}}
                @if (Auth::user()->level == 'admin-kejurnas')
                    <a class="nav-link {{ Request::is('admin-kejurnas') ? 'active' : '' }}"
                        href="{{ url('admin-kejurnas') }}">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-home"></i>
                        </div>
                        Beranda
                    </a>
                    <a class="nav-link {{ Request::is('admin-kejurnas/detail-peserta') ? 'active' : '' }}"
                        href="{{ url('admin-kejurnas/detail-peserta') }}">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        Detail Peserta
                    </a>
                    <a class="nav-link {{ Request::is('admin-kejurnas/user') ? 'active' : '' }}"
                        href="{{ url('admin-kejurnas/user') }}">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        User
                    </a>
                    <a class="nav-link {{ Request::is('admin-kejurnas/kontingen') ? 'active' : '' }}"
                        href="{{ url('admin-kejurnas/kontingen') }}">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-user-friends"></i>
                        </div>
                        Kontingen
                    </a>
                    <a class="nav-link {{ Request::is('admin-kejurnas/atlet') ? 'active' : '' }}"
                        href="{{ url('admin-kejurnas/atlet') }}">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-running"></i>
                        </div>
                        Atlet
                    </a>
                    <a class="nav-link {{ Request::is('admin-kejurnas/pembayaran') ? 'active' : '' }}"
                        href="{{ url('admin-kejurnas/pembayaran') }}">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        Pembayaran
                    </a>
                    <a class="nav-link {{ Request::is('admin-kejurnas/pserta-suda-bayar') ? 'active' : '' }}"
                        href="{{ url('admin-kejurnas/pserta-suda-bayar') }}">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        Suda Bayar
                    </a>
                    <a class="nav-link {{ Request::is('admin-kejurnas/verifikasi-berkas') ? 'active' : '' }}"
                        href="{{ url('admin-kejurnas/verifikasi-berkas') }}">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-user-check"></i>
                        </div>
                        Verifikasi Berkas
                    </a>
                    {{-- <a class="nav-link {{ Request::is('admin-kejurnas/verifikasi-atlet') ? 'active' : '' }}"
                        href="{{ url('admin-kejurnas/verifikasi-atlet') }}">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-user-check"></i>
                        </div>
                        Id Card
                    </a> --}}
                    <hr>
                    <span>Data Fix</span>
                    <a class="nav-link {{ Request::is('admin-kejurnas/tarik-data') ? 'active' : '' }}"
                        href="{{ url('admin-kejurnas/tarik-data') }}">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-user-check"></i>
                        </div>
                        Tarik Data Atlet
                    </a>
                @endif
                {{-- /admin kejurnas --}}

                {{-- official --}}
                @if (Auth::user()->level == 'official')
                    <a class="nav-link {{ Request::is('official') ? 'active' : '' }}" href="{{ url('official') }}">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-home"></i>
                        </div>
                        Beranda
                    </a>
                    <a class="nav-link {{ Request::is('official/atlet') ? 'active' : '' }}"
                        href="{{ url('official/atlet') }}">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-running"></i>
                        </div>
                        Atlet
                    </a>

                    <a class="nav-link {{ Request::is('official/download') ? 'active' : '' }}"
                        href="{{ url('official/download') }}">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-download"></i>
                        </div>
                        Download
                    </a>

                @endif
                {{-- /official --}}

                <a class="nav-link" href="{{ url('/logout') }}">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-sign-out-alt"></i>
                    </div>
                    Logout
                </a>
            </div>
        </div>
    </nav>
</div>
{{-- /sidebar utama --}}
