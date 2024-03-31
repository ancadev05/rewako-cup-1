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
                    <a class="nav-link {{ Request::is('admin-kejurnas/user') ? 'active' : '' }}"
                        href="{{ url('admin-kejurnas/user') }}">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        User
                    </a>
                    <a class="nav-link {{ Request::is('admin-kejurnas/atlet') ? 'active' : '' }}"
                        href="{{ url('admin-kejurnas/atlet') }}">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-running"></i>
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
                    <a class="nav-link {{ Request::is('admin-kejurnas/atlet') ? 'active' : '' }}"
                        href="{{ url('admin-kejurnas/atlet') }}">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-running"></i>
                        </div>
                        Invoice
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
