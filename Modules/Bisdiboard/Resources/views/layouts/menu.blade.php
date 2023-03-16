<!-- BEGIN: Main Menu-->
<div class="horizontal-menu-wrapper">
    <div class="header-navbar navbar-expand-sm navbar navbar-horizontal floating-nav navbar-light navbar-shadow menu-border container-xxl" role="navigation" data-menu="menu-wrapper" data-menu-type="floating-nav">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item me-auto"><a class="navbar-brand" href="/">
                        <span class="brand-logo">
                            <img src="../../../favicon.png" alt="">
                        </span>
                        <img src="../../../logo_tulisan.png" height="30"alt="">
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i></a>
                </li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <!-- Horizontal menu content-->
        <div class="navbar-container main-menu-content" data-menu="menu-container">
            <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="#" data-bs-toggle="dropdown"><i data-feather="home"></i><span data-i18n="Pages">Dashboard</span></a>
                    <ul class="dropdown-menu" data-bs-popper="none">
                        <li class="{{ Request::is('/', 'kaprodi') ? 'active' : 'nav-item' }}" data-menu=""><a class="dropdown-item d-flex align-items-center" href="/" data-bs-toggle="" data-i18n="bisdiverse"><i data-feather="home"></i><span data-i18n="bisdiverse">Bisdiverse</span></a>
                        </li>
                        <li class="{{ Request::is('bisdiboard*') ? 'active' : 'nav-item' }}" data-menu=""><a class="dropdown-item d-flex align-items-center" href="/bisdiboard" data-bs-toggle="" data-i18n="Bisdiboard"><i data-feather="clipboard"></i><span data-i18n="Bisdiboard">Bisdiboard</span></a>
                        </li>
                    </ul>
                </li>
                @if (Module::collections()->has('Magang'))
                    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="#" data-bs-toggle="dropdown"><i data-feather="layers"></i><span data-i18n="Charts &amp; Maps">Magang</span></a>
                        <ul class="dropdown-menu" data-bs-popper="none">
                            <li class="{{ Request::is('magang/pengajuan-magang*') ? 'active' : 'nav-item' }}"data-menu="">
                                <a class="dropdown-item d-flex align-items-center" href="/magang/pengajuan-magang" data-bs-toggle="" data-i18n="Leaflet Maps"><i data-feather="file-text"></i><span data-i18n="Leaflet Maps">Pengajuan Magang</span></a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if (Module::collections()->has('Seminar'))
                    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="#" data-bs-toggle="dropdown"><i data-feather="airplay"></i><span data-i18n="Charts &amp; Maps">Seminar</span></a>
                        <ul class="dropdown-menu" data-bs-popper="none">
                            <li class="{{ Request::is('seminar/pengajuan-seminar*') ? 'active' : 'nav-item' }}"data-menu="">
                                <a class="dropdown-item d-flex align-items-center" href="/seminar/pengajuan-seminar" data-bs-toggle="" data-i18n="Leaflet Maps"><i data-feather="file-text"></i><span data-i18n="Leaflet Maps">Pengajuan Seminar</span></a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if (Module::collections()->has('Judulskripsi'))
                    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="#" data-bs-toggle="dropdown"><i data-feather="book"></i><span data-i18n="Charts &amp; Maps">Judul Skripsi</span></a>
                        <ul class="dropdown-menu" data-bs-popper="none">
                            <li class="{{ Request::is('judulskripsi/pengajuan-judul*') ? 'active' : 'nav-item' }}"data-menu="">
                                <a class="dropdown-item d-flex align-items-center" href="/judulskripsi/pengajuan-judul" data-bs-toggle="" data-i18n="Leaflet Maps"><i data-feather="file-text"></i><span data-i18n="Leaflet Maps">Pengajuan Judul Skripsi</span></a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
<!-- END: Main Menu-->
