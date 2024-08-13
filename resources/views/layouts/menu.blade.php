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
        <div class="navbar-container main-menu-content" data-menu="menu-container">
            <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="{{ Request::is('/', 'dashboard', 'home') ? 'active' : 'nav-item' }}"><a class="nav-link d-flex align-items-center" href="/"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Dashboards</span></a>
                </li>
                @if (Module::collections()->has('PresensiUjian'))
                    <li class="{{ Request::is('presensiujian*') ? 'active' : 'nav-item' }}"><a class="nav-link d-flex align-items-center" href="/presensiujian"><i data-feather="users"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Presensi Ujian</span></a>
                    </li>
                @endif
                <li class="{{ Request::is('edulink') ? 'active' : 'nav-item' }}"><a class="nav-link d-flex align-items-center" href="/edulink"><i data-feather="cpu"></i><span class="menu-title text-truncate" data-i18n="Dashboards">EduLink</span></a>
                </li>
                @if (Module::collections()->has('QnA'))
                    <li class="{{ Request::is('qna*') ? 'active' : 'nav-item' }}"><a class="nav-link d-flex align-items-center" href="/qna"><i data-feather="help-circle"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Faq and Q&A</span></a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
<!-- END: Main Menu-->
