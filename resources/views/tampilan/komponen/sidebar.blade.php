{{-- sidebar utama --}}
<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                {{-- admin kejurnas --}}
                @if ($username == 'admin')
                    <a class="nav-link {{ Request::is('official-kejurnas') ? 'active' : '' }}"
                        href="{{ url('official-kejurnas') }}">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-home"></i>
                        </div>
                        Beranda
                    </a>
                @endif
                {{-- /admin kejurnas --}}
                {{-- official --}}
                @if ($username == 'off1')
                    <a class="nav-link {{ Request::is('official-kejurnas') ? 'active' : '' }}"
                        href="{{ url('official-kejurnas') }}">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-home"></i>
                        </div>
                        Beranda
                    </a>
                    <a class="nav-link {{ Request::is('atlet') ? 'official-kejurnas/atlet' : '' }}"
                        href="{{ url('official-kejurnas/atlet') }}">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-running"></i>
                        </div>
                        Atlet
                    </a>

                    <a class="nav-link {{ Request::is('download/berkas') ? 'active' : '' }}"
                        href="{{ url('/download/berkas') }}">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-download"></i>
                        </div>
                        Download
                    </a>

                    <a class="nav-link {{ Request::is('/fitur') ? 'active' : '' }}" href="{{ url('/fitur') }}">
                        <div class="sb-nav-link-icon">
                            <i class=""></i>
                        </div>
                        Fitur
                    </a>
                @endif
                {{-- /official --}}
                <a class="nav-link" href="{{ url('/') }}">
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
