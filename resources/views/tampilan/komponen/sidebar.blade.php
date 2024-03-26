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
                    <a class="nav-link {{ Request::is('official') ? 'active' : '' }}"
                        href="{{ url('official') }}">
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

                    <a class="nav-link {{ Request::is('/fitur') ? 'active' : '' }}" href="{{ url('/fitur') }}">
                        <div class="sb-nav-link-icon">
                            <i class=""></i>
                        </div>
                        Fitur
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
