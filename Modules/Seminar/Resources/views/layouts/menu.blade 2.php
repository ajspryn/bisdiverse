<!-- BEGIN: Main Menu-->
<div class="horizontal-menu-wrapper">
    <div class="header-navbar navbar-expand-sm navbar navbar-horizontal floating-nav navbar-light navbar-shadow menu-border container-xxl"
        role="navigation" data-menu="menu-wrapper" data-menu-type="floating-nav">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item me-auto"><a class="navbar-brand"
                        href="../../../html/ltr/horizontal-menu-template/index.html"><span class="brand-logo">
                            <svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" height="24">
                                <defs>
                                    <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%"
                                        y2="89.4879456%">
                                        <stop stop-color="#000000" offset="0%"></stop>
                                        <stop stop-color="#FFFFFF" offset="100%"></stop>
                                    </lineargradient>
                                    <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%"
                                        x2="37.373316%" y2="100%">
                                        <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                        <stop stop-color="#FFFFFF" offset="100%"></stop>
                                    </lineargradient>
                                </defs>
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                                        <g id="Group" transform="translate(400.000000, 178.000000)">
                                            <path class="text-primary" id="Path"
                                                d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z"
                                                style="fill:currentColor"></path>
                                            <path id="Path1"
                                                d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z"
                                                fill="url(#linearGradient-1)" opacity="0.2"></path>
                                            <polygon id="Path-2" fill="#000000" opacity="0.049999997"
                                                points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325">
                                            </polygon>
                                            <polygon id="Path-21" fill="#000000" opacity="0.099999994"
                                                points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338">
                                            </polygon>
                                            <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994"
                                                points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288">
                                            </polygon>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </span>
                        <h2 class="brand-text mb-0">Bisdiverse</h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i
                            class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i></a>
                </li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <!-- Horizontal menu content-->
        <div class="navbar-container main-menu-content" data-menu="menu-container">
            <!-- include ../../../includes/mixins-->
            <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="{{ Request::is('/', 'admin') ? 'active' : 'nav-item' }}"><a
                        class="toggle nav-link d-flex align-items-center" href="/"><i
                            data-feather="home"></i><span data-i18n="Dashboards">Dashboard</span></a>
                </li>
                @if (Module::collections()->has('PresensiUjian'))
                <li class="{{ Request::is('admin/rfid*') ? 'active' : 'nav-item' }}"><a
                        class="toggle nav-link d-flex align-items-center" href="/admin/rfid"><i
                            data-feather="credit-card"></i><span data-i18n="layers">RFID Mahasiswa</span></a>
                </li>
                <li class="dropdown nav-item" data-menu="dropdown"><a
                        class="dropdown-toggle nav-link d-flex align-items-center" href="#"
                        data-bs-toggle="dropdown"><i data-feather="file-text"></i><span
                            data-i18n="Pages">Absensi</span></a>
                    <ul class="dropdown-menu" data-bs-popper="none">
                        <li class="{{ Request::is('admin/lihat-presensi*') ? 'active' : 'nav-item' }}" data-menu=""><a
                                class="dropdown-item d-flex align-items-center" href="/admin/lihat-presensi" data-bs-toggle=""
                                data-i18n="Profile"><i data-feather="user"></i><span data-i18n="Profile">Lihat
                                    Absensi</span></a>
                        </li>
                        <li class="{{ Request::is('admin/rekap-presensi*') ? 'active' : 'nav-item' }}" data-menu=""><a
                                class="dropdown-item d-flex align-items-center" href="/admin/rekap-presensi"
                                data-bs-toggle="" data-i18n="FAQ"><i data-feather="book-open"></i><span
                                    data-i18n="FAQ">Rekap Absensi</span></a>
                        </li>
                    </ul>
                </li>
                @endif
                @if (Module::collections()->has('Magang'))
                <li class="dropdown nav-item" data-menu="dropdown"><a
                        class="dropdown-toggle nav-link d-flex align-items-center" href="#"
                        data-bs-toggle="dropdown"><i data-feather="layers"></i><span
                            data-i18n="Charts &amp; Maps">Magang</span></a>
                    <ul class="dropdown-menu" data-bs-popper="none">
                        <li class="{{ Request::is('magang/pembimbing*') ? 'active' : 'nav-item' }}"data-menu=""><a
                                class="dropdown-item d-flex align-items-center" href="/magang/pembimbing" data-bs-toggle=""
                                data-i18n="Leaflet Maps"><i data-feather="user"></i><span
                                    data-i18n="Leaflet Maps">Dosen Pembimbing Magang</span></a>
                        </li>
                        <li class="{{ Request::is('admin/mahasiswamagang*') ? 'active' : 'nav-item' }}"data-menu=""><a
                                class="dropdown-item d-flex align-items-center" href="/admin/mahasiswa" data-bs-toggle=""
                                data-i18n="Leaflet Maps"><i data-feather="file-text"></i><span
                                    data-i18n="Leaflet Maps">Pengajuan Magang</span></a>
                        </li>
                    </ul>
                </li>
                @endif
                @if (Module::collections()->has('Judulskripsi'))
                <li class="dropdown nav-item" data-menu="dropdown"><a
                        class="dropdown-toggle nav-link d-flex align-items-center" href="#"
                        data-bs-toggle="dropdown"><i data-feather="layers"></i><span
                            data-i18n="Charts &amp; Maps">Judul Skripsi</span></a>
                    <ul class="dropdown-menu" data-bs-popper="none">
                        <li class="{{ Request::is('admin/mahasiswamagang*') ? 'active' : 'nav-item' }}"data-menu=""><a
                                class="dropdown-item d-flex align-items-center" href="/admin/mahasiswa" data-bs-toggle=""
                                data-i18n="Leaflet Maps"><i data-feather="file-text"></i><span
                                    data-i18n="Leaflet Maps">Pengajuan Judul Skripsi</span></a>
                        </li>
                    </ul>
                </li>
                @endif
                @if (Module::collections()->has('Seminar'))
                <li class="dropdown nav-item" data-menu="dropdown"><a
                        class="dropdown-toggle nav-link d-flex align-items-center" href="#"
                        data-bs-toggle="dropdown"><i data-feather="layers"></i><span
                            data-i18n="Charts &amp; Maps">Seminar</span></a>
                    <ul class="dropdown-menu" data-bs-popper="none">
                        <li class="{{ Request::is('admin/mahasiswamagang*') ? 'active' : 'nav-item' }}"data-menu=""><a
                                class="dropdown-item d-flex align-items-center" href="/admin/mahasiswa" data-bs-toggle=""
                                data-i18n="Leaflet Maps"><i data-feather="file-text"></i><span
                                    data-i18n="Leaflet Maps">Pengajuan Seminar</span></a>
                        </li>
                    </ul>
                </li>
                @endif
                <li class="dropdown nav-item" data-menu="dropdown"><a
                        class="dropdown-toggle nav-link d-flex align-items-center" href="#"
                        data-bs-toggle="dropdown"><i data-feather="settings"></i><span
                            data-i18n="Charts &amp; Maps">Pengaturan</span></a>
                    <ul class="dropdown-menu" data-bs-popper="none">
                        <li class="{{ Request::is('admin/dosen*') ? 'active' : 'nav-item' }}"data-menu=""><a
                                class="dropdown-item d-flex align-items-center" href="/admin/dosen" data-bs-toggle=""
                                data-i18n="Leaflet Maps"><i data-feather="user"></i><span
                                    data-i18n="Leaflet Maps">Dosen</span></a>
                        </li>
                        <li class="{{ Request::is('admin/mahasiswa*') ? 'active' : 'nav-item' }}"data-menu=""><a
                                class="dropdown-item d-flex align-items-center" href="/admin/mahasiswa" data-bs-toggle=""
                                data-i18n="Leaflet Maps"><i data-feather="user"></i><span
                                    data-i18n="Leaflet Maps">Mahasiswa</span></a>
                        </li>
                        <li class="{{ Request::is('admin/kelas*') ? 'active' : 'nav-item' }}"data-menu=""><a
                                class="dropdown-item d-flex align-items-center" href="/admin/kelas" data-bs-toggle=""
                                data-i18n="Profile"><i data-feather="bookmark"></i><span
                                    data-i18n="Profile">Kelas</span></a>
                        </li>
                        <li class="{{ Request::is('admin/ruangan*') ? 'active' : 'nav-item' }}"data-menu=" data-menu="><a
                                class="dropdown-item d-flex align-items-center" href="/admin/ruangan" data-bs-toggle=""
                                data-i18n="FAQ"><i data-feather="box"></i><span data-i18n="FAQ">Ruangan</span></a>
                        </li>
                        <li class="{{ Request::is('admin/matkul*') ? 'active' : 'nav-item' }}"data-menu=" data-menu="><a
                                class="dropdown-item d-flex align-items-center" href="/admin/matkul" data-bs-toggle=""
                                data-i18n="Profile"><i data-feather="book"></i><span data-i18n="Profile">Mata
                                    Kuliah</span></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- END: Main Menu-->
