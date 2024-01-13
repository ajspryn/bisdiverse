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
                @if (Auth::user()->role->jabatan_id == 4)
                    <li class="{{ Request::is('bisdiboard*') ? 'active' : 'nav-item' }}"><a class="nav-link d-flex align-items-center" href="/bisdiboard"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Dashboards</span></a>
                    </li>
                    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="#" data-bs-toggle="dropdown"><i data-feather="file-text"></i><span data-i18n="Pages">Absensi</span></a>
                        <ul class="dropdown-menu" data-bs-popper="none">
                            <li class="{{ Request::is('admin/lihat-presensi*') ? 'active' : 'nav-item' }}" data-menu=""><a class="dropdown-item d-flex align-items-center" href="/admin/lihat-presensi" data-bs-toggle="" data-i18n="Profile"><i data-feather="user"></i><span data-i18n="Profile">Lihat
                                        Absensi</span></a>
                            </li>
                            <li class="{{ Request::is('admin/rekap-presensi*') ? 'active' : 'nav-item' }}" data-menu=""><a class="dropdown-item d-flex align-items-center" href="/admin/rekap-presensi" data-bs-toggle="" data-i18n="FAQ"><i data-feather="book-open"></i><span data-i18n="FAQ">Rekap Absensi</span></a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="#" data-bs-toggle="dropdown"><i data-feather="home"></i><span data-i18n="Pages">Dashboard</span></a>
                        <ul class="dropdown-menu" data-bs-popper="none">
                            <li class="{{ Request::is('/') ? 'active' : 'nav-item' }}" data-menu=""><a class="dropdown-item d-flex align-items-center" href="/" data-bs-toggle="" data-i18n="bisdiverse"><i data-feather="home"></i><span data-i18n="bisdiverse">Bisdiverse</span></a>
                            </li>
                            <li class="{{ Request::is('bisdiboard*') ? 'active' : 'nav-item' }}" data-menu=""><a class="dropdown-item d-flex align-items-center" href="/bisdiboard" data-bs-toggle="" data-i18n="Bisdiboard"><i data-feather="clipboard"></i><span data-i18n="Bisdiboard">Bisdiboard</span></a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
<!-- END: Main Menu-->
