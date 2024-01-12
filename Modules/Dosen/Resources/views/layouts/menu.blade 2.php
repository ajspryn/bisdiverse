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
            <!-- include ../../../includes/mixins-->
            <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="{{ Request::is('/', 'dosen') ? 'active' : 'nav-item' }}"><a class="toggle nav-link d-flex align-items-center" href="/"><i data-feather="home"></i><span data-i18n="Dashboards">Dashboard</span></a>
                </li>
                @if (Module::collections()->has('Magang'))
                    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="#" data-bs-toggle="dropdown"><i data-feather="layers"></i><span data-i18n="Charts &amp; Maps">Magang</span></a>
                        <ul class="dropdown-menu" data-bs-popper="none">
                            <li class="{{ Request::is('magang/bimbingan*') ? 'active' : 'nav-item' }}"data-menu="">
                                <a class="dropdown-item d-flex align-items-center" href="/magang/bimbingan" data-bs-toggle="" data-i18n="Leaflet Maps"><i data-feather="file-text"></i><span data-i18n="Leaflet Maps">Mahasiswa Bimbingan Magang</span></a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if (Module::collections()->has('Judulskripsi'))
                    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="#" data-bs-toggle="dropdown"><i data-feather="book"></i><span data-i18n="Charts &amp; Maps">Skripsi</span></a>
                        <ul class="dropdown-menu" data-bs-popper="none">
                            <li class="{{ Request::is('judulskripsi/bimbingan*') ? 'active' : 'nav-item' }}"data-menu=""><a class="dropdown-item d-flex align-items-center" href="/judulskripsi/bimbingan" data-bs-toggle="" data-i18n="Leaflet Maps"><i data-feather="user"></i><span data-i18n="Leaflet Maps">Mahasiswa Bimbingan Skripsi</span></a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
<!-- END: Main Menu-->
