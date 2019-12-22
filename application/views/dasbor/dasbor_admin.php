
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title><?=$title?></title>

        <meta name="robots" content="noindex, nofollow">


        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="<?=base_url('assets/media/favicons/favicon.png')?>">
        <link rel="icon" type="image/png" sizes="192x192" href="<?=base_url('assets/media/favicons/favicon-192x192.png')?>">
        <link rel="apple-touch-icon" sizes="180x180" href="<?=base_url('assets/media/favicons/apple-touch-icon-180x180.png')?>">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Fonts and OneUI framework -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
        <link rel="stylesheet" id="css-main" href="<?=base_url('assets/css/oneui.min.css')?>">

        <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/amethyst.min.css"> -->
        <!-- END Stylesheets -->
    </head>
    <body>
        <!-- Page Container -->
        <!--
            Available classes for #page-container:

        GENERIC

            'enable-cookies'                            Remembers active color theme between pages (when set through color theme helper Template._uiHandleTheme())

        SIDEBAR & SIDE OVERLAY

            'sidebar-r'                                 Right Sidebar and left Side Overlay (default is left Sidebar and right Side Overlay)
            'sidebar-mini'                              Mini hoverable Sidebar (screen width > 991px)
            'sidebar-o'                                 Visible Sidebar by default (screen width > 991px)
            'sidebar-o-xs'                              Visible Sidebar by default (screen width < 992px)
            'sidebar-dark'                              Dark themed sidebar

            'side-overlay-hover'                        Hoverable Side Overlay (screen width > 991px)
            'side-overlay-o'                            Visible Side Overlay by default

            'enable-page-overlay'                       Enables a visible clickable Page Overlay (closes Side Overlay on click) when Side Overlay opens

            'side-scroll'                               Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (screen width > 991px)

        HEADER

            ''                                          Static Header if no class is added
            'page-header-fixed'                         Fixed Header

        HEADER STYLE

            ''                                          Light themed Header
            'page-header-dark'                          Dark themed Header

        MAIN CONTENT LAYOUT

            ''                                          Full width Main Content if no class is added
            'main-content-boxed'                        Full width Main Content with a specific maximum width (screen width > 1200px)
            'main-content-narrow'                       Full width Main Content with a percentage width (screen width > 1200px)
        -->
        <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed">
            <!-- Side Overlay-->
            <aside id="side-overlay" class="font-size-sm">
                <!-- Side Header -->
                <div class="content-header border-bottom">
                    <!-- User Avatar -->
                    <a class="img-link mr-1" href="javascript:void(0)">
                        <img class="img-avatar img-avatar32" src="<?= base_url ('upload/images/'.$this->session->userdata('foto'));?>" alt="">
                    </a>
                    <!-- END User Avatar -->

                    <!-- User Info -->
                    <div class="ml-2">
                        <a class="link-fx text-dark font-w600" href="javascript:void(0)"><?= $this->session->userdata('nama');?></a>
                    </div>
                    <!-- END User Info -->

                    <!-- Close Side Overlay -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <a class="ml-auto btn btn-sm btn-dual" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_close">
                        <i class="fa fa-fw fa-times text-danger"></i>
                    </a>
                    <!-- END Close Side Overlay -->
                </div>
                <!-- END Side Header -->

            </aside>
            <!-- END Side Overlay -->

            <!-- Sidebar -->
            <!--
                Sidebar Mini Mode - Display Helper classes

                Adding 'smini-hide' class to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
                Adding 'smini-show' class to an element will make it visible (opacity: 1) when the sidebar is in mini mode
                    If you would like to disable the transition animation, make sure to also add the 'no-transition' class to your element

                Adding 'smini-hidden' to an element will hide it when the sidebar is in mini mode
                Adding 'smini-visible' to an element will show it (display: inline-block) only when the sidebar is in mini mode
                Adding 'smini-visible-block' to an element will show it (display: block) only when the sidebar is in mini mode
            -->
            <nav id="sidebar" aria-label="Main Navigation">
                <!-- Side Header -->
                <div class="content-header bg-white-5">
                    <!-- Logo -->
                    <a class="font-w600 text-dual" href="index.html">
                        <i class="fa fa-circle-notch text-primary"></i>
                        <span class="smini-hide">
                            <span class="font-w700 font-size-h5">iak</span> <span class="font-w400">Harba</span>
                        </span>
                    </a>
                    <!-- END Logo -->

                    <!-- Options -->
                    <div>
                        <!-- Color Variations -->
                        <div class="dropdown d-inline-block ml-3">
                            <a class="text-dual font-size-sm" id="sidebar-themes-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
                                <i class="si si-drop"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right font-size-sm smini-hide border-0" aria-labelledby="sidebar-themes-dropdown">
                                <!-- Color Themes -->
                                <!-- Layout API, functionality initialized in Template._uiHandleTheme() -->
                                <a class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="theme" data-theme="default" href="#">
                                    <span>Default</span>
                                    <i class="fa fa-circle text-default"></i>
                                </a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="theme" data-theme="assets/css/themes/amethyst.min.css" href="#">
                                    <span>Amethyst</span>
                                    <i class="fa fa-circle text-amethyst"></i>
                                </a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="theme" data-theme="assets/css/themes/city.min.css" href="#">
                                    <span>City</span>
                                    <i class="fa fa-circle text-city"></i>
                                </a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="theme" data-theme="assets/css/themes/flat.min.css" href="#">
                                    <span>Flat</span>
                                    <i class="fa fa-circle text-flat"></i>
                                </a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="theme" data-theme="assets/css/themes/modern.min.css" href="#">
                                    <span>Modern</span>
                                    <i class="fa fa-circle text-modern"></i>
                                </a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="theme" data-theme="assets/css/themes/smooth.min.css" href="#">
                                    <span>Smooth</span>
                                    <i class="fa fa-circle text-smooth"></i>
                                </a>
                                <!-- END Color Themes -->

                                <div class="dropdown-divider"></div>

                                <!-- Sidebar Styles -->
                                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                <a class="dropdown-item" data-toggle="layout" data-action="sidebar_style_light" href="#">
                                    <span>Sidebar Light</span>
                                </a>
                                <a class="dropdown-item" data-toggle="layout" data-action="sidebar_style_dark" href="#">
                                    <span>Sidebar Dark</span>
                                </a>
                                <!-- Sidebar Styles -->

                                <div class="dropdown-divider"></div>

                                <!-- Header Styles -->
                                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                <a class="dropdown-item" data-toggle="layout" data-action="header_style_light" href="#">
                                    <span>Header Light</span>
                                </a>
                                <a class="dropdown-item" data-toggle="layout" data-action="header_style_dark" href="#">
                                    <span>Header Dark</span>
                                </a>
                                <!-- Header Styles -->
                            </div>
                        </div>
                        <!-- END Themes -->

                        <!-- Close Sidebar, Visible only on mobile screens -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <a class="d-lg-none text-dual ml-3" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                            <i class="fa fa-times"></i>
                        </a>
                        <!-- END Close Sidebar -->
                    </div>
                    <!-- END Options -->
                </div>
                <!-- END Side Header -->

                <!-- Side Navigation -->
                <div class="content-side content-side-full">
                    <ul class="nav-main">
                        <li class="nav-main-item">
                            <a class="nav-main-link active" href="<?=base_url('dasbor')?>">
                                <i class="nav-main-link-icon si si-speedometer"></i>
                                <span class="nav-main-link-name">Dasbor</span>
                            </a>
                        </li>
                        <li class="nav-main-heading">Data Master</li>
                        <li class="nav-main-item">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                <i class="nav-main-link-icon si si-energy"></i>
                                <span class="nav-main-link-name">Warga Belajar</span>
                            </a>
                            <ul class="nav-main-submenu">
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="<?=base_url('wargabelajar')?>">
                                        <span class="nav-main-link-name">Daftar Warga Belajar</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="<?=base_url('wargabelajar/tambah')?>">
                                        <span class="nav-main-link-name">Tambah Warga Belajar</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                <i class="nav-main-link-icon si si-energy"></i>
                                <span class="nav-main-link-name">Tutor</span>
                            </a>
                            <ul class="nav-main-submenu">
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="<?=base_url('tutor')?>">
                                        <span class="nav-main-link-name">Daftar Tutor</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="<?=base_url('tutor/tambah')?>">
                                        <span class="nav-main-link-name">Tambah Tutor</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                <i class="nav-main-link-icon si si-energy"></i>
                                <span class="nav-main-link-name">Kelas</span>
                            </a>
                            <ul class="nav-main-submenu">
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="<?=base_url('kelas')?>">
                                        <span class="nav-main-link-name">Daftar Kelas</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="<?=base_url('kelas/tambah')?>">
                                        <span class="nav-main-link-name">Tambah Kelas</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="<?=base_url('kelas/rombel')?>">
                                        <span class="nav-main-link-name">Tambah Rombel</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                <i class="nav-main-link-icon si si-energy"></i>
                                <span class="nav-main-link-name">Mata Pelajaran</span>
                            </a>
                            <ul class="nav-main-submenu">
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="<?=base_url('matpel')?>">
                                        <span class="nav-main-link-name">Daftar Mata Pelajaran</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="<?=base_url('matpel/tambah')?>">
                                        <span class="nav-main-link-name">Tambah Mata Pelajaran</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="<?=base_url('jadwal')?>">
                                        <span class="nav-main-link-name">Jadwal Mata Pelajaran</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                <i class="nav-main-link-icon si si-energy"></i>
                                <span class="nav-main-link-name">Admin</span>
                            </a>
                            <ul class="nav-main-submenu">
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="<?=base_url('admin')?>">
                                        <span class="nav-main-link-name">Daftar Admin</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="<?=base_url('admin/tambah')?>">
                                        <span class="nav-main-link-name">Tambah Admin</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                <i class="nav-main-link-icon si si-energy"></i>
                                <span class="nav-main-link-name">Pimpinan</span>
                            </a>
                            <ul class="nav-main-submenu">
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="<?=base_url('pimpinan')?>">
                                        <span class="nav-main-link-name">Daftar Pimpinan</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="<?=base_url('pimpinan/tambah')?>">
                                        <span class="nav-main-link-name">Tambah Pimpinan</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                <i class="nav-main-link-icon si si-energy"></i>
                                <span class="nav-main-link-name">Tahun Ajaran</span>
                            </a>
                            <ul class="nav-main-submenu">
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="<?=base_url('tahunajaran')?>">
                                        <span class="nav-main-link-name">Daftar Tahun Ajaran</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="<?=base_url('tahunajaran/tambah')?>">
                                        <span class="nav-main-link-name">Tambah Tahun Ajaran</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- END Side Navigation -->
            </nav>
            <!-- END Sidebar -->

            <!-- Header -->
            <header id="page-header">
                <!-- Header Content -->
                <div class="content-header">
                    <!-- Left Section -->
                    <div class="d-flex align-items-center">
                        <!-- Toggle Sidebar -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
                        <button type="button" class="btn btn-sm btn-dual mr-2 d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>
                        <!-- END Toggle Sidebar -->

                        <!-- Toggle Mini Sidebar -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
                        <button type="button" class="btn btn-sm btn-dual mr-2 d-none d-lg-inline-block" data-toggle="layout" data-action="sidebar_mini_toggle">
                            <i class="fa fa-fw fa-ellipsis-v"></i>
                        </button>
                        <!-- END Toggle Mini Sidebar -->

                        <!-- END Apps Modal -->

                        
                    </div>
                    <!-- END Left Section -->

                    <!-- Right Section -->
                    <div class="d-flex align-items-center">
                        <!-- User Dropdown -->
                        <div class="dropdown d-inline-block ml-2">
                            <button type="button" class="btn btn-sm btn-dual" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded" src="<?= base_url ('upload/images/'.$this->session->userdata('foto'));?>" alt="Header Avatar" style="width: 18px;">
                                <span class="d-none d-sm-inline-block ml-1"><?= $this->session->userdata('nama');?></span>
                                <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right p-0 border-0 font-size-sm" aria-labelledby="page-header-user-dropdown">
                                <div class="p-3 text-center bg-primary">
                                    <img class="img-avatar img-avatar48 img-avatar-thumb" src="<?= base_url ('upload/images/'.$this->session->userdata('foto'));?>" alt="">
                                </div>
                                <div class="p-2">
                                    <h5 class="dropdown-header text-uppercase">User Options</h5>
                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="<?=base_url('profil')?>">
                                        <span>Profil</span>
                                            <i class="si si-user ml-1"></i>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="<?=base_url('pengaturan')?>">
                                        <span>Pengaturan</span>
                                        <i class="si si-settings"></i>
                                    </a>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <h5 class="dropdown-header text-uppercase">Aksi</h5>
                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="<?=base_url('auth/logout')?>">
                                        <span>Log Out</span>
                                        <i class="si si-logout ml-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- END User Dropdown -->


                    </div>
                    <!-- END Right Section -->
                </div>
                <!-- END Header Content -->

            </header>
            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">

                <!-- Hero -->
                <div class="bg-image overflow-hidden" style="background-image: url('assets/media/photos/photo3@2x.jpg');">
                    <div class="bg-primary-dark-op">
                        <div class="content content-narrow content-full">
                            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center mt-5 mb-2 text-center text-sm-left">
                                <div class="flex-sm-fill">
                                    <h1 class="font-w600 text-white mb-0 invisible" data-toggle="appear"><?=$title?></h1>
                                    <h2 class="h4 font-w400 text-white-75 mb-0 invisible" data-toggle="appear" data-timeout="250">Selamat Datang <?= $this->session->userdata('nama');?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Hero -->

                <!-- Page Content -->
                <div class="content content-narrow">
                    <!-- Stats -->
                    <div class="row">
                        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                            <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Warga Belajar</div>
                                    <div class="font-size-h2 font-w400 text-dark"><?=$countWargaBelajar["jumlah"]?> Orang</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                            <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Tutor</div>
                                    <div class="font-size-h2 font-w400 text-dark"><?=$countTutor["jumlah"]?> Orang</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                            <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Pimpinan</div>
                                    <div class="font-size-h2 font-w400 text-dark"><?=$countPimpinan["jumlah"]?> Orang</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                            <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Admin</div>
                                    <div class="font-size-h2 font-w400 text-dark"><?=$countAdmin["jumlah"]?> Orang</div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- END Stats -->

                    <!-- Dashboard Charts -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="block block-rounded block-mode-loading-oneui">
                                <div class="block-header">
                                    <h3 class="block-title">Earnings in $</h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                            <i class="si si-refresh"></i>
                                        </button>
                                        <button type="button" class="btn-block-option">
                                            <i class="si si-settings"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="block-content p-0 bg-body-light text-center">
                                    <!-- Chart.js is initialized in js/pages/be_pages_dashboard.min.js which was auto compiled from _es6/pages/be_pages_dashboard.js) -->
                                    <!-- For more info and examples you can check out http://www.chartjs.org/docs/ -->
                                    <div class="pt-3" style="height: 360px;"><canvas class="js-chartjs-dashboard-earnings"></canvas></div>
                                </div>
                                <div class="block-content">
                                    <div class="row items-push text-center py-3">
                                        <div class="col-6 col-xl-3">
                                            <i class="fa fa-wallet fa-2x text-muted"></i>
                                            <div class="text-muted mt-3">$148,000</div>
                                        </div>
                                        <div class="col-6 col-xl-3">
                                            <i class="fa fa-angle-double-up fa-2x text-muted"></i>
                                            <div class="text-muted mt-3">+9% Earnings</div>
                                        </div>
                                        <div class="col-6 col-xl-3">
                                            <i class="fa fa-ticket-alt fa-2x text-muted"></i>
                                            <div class="text-muted mt-3">+20% Tickets</div>
                                        </div>
                                        <div class="col-6 col-xl-3">
                                            <i class="fa fa-users fa-2x text-muted"></i>
                                            <div class="text-muted mt-3">+46% Clients</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="block block-rounded block-mode-loading-oneui">
                                <div class="block-header">
                                    <h3 class="block-title">Sales</h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                            <i class="si si-refresh"></i>
                                        </button>
                                        <button type="button" class="btn-block-option">
                                            <i class="si si-settings"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="block-content p-0 bg-body-light text-center">
                                    <!-- Chart.js is initialized in js/pages/be_pages_dashboard.min.js which was auto compiled from _es6/pages/be_pages_dashboard.js) -->
                                    <!-- For more info and examples you can check out http://www.chartjs.org/docs/ -->
                                    <div class="pt-3" style="height: 360px;"><canvas class="js-chartjs-dashboard-sales"></canvas></div>
                                </div>
                                <div class="block-content">
                                    <div class="row items-push text-center py-3">
                                        <div class="col-6 col-xl-3">
                                            <i class="fab fa-wordpress fa-2x text-muted"></i>
                                            <div class="text-muted mt-3">+20% Themes</div>
                                        </div>
                                        <div class="col-6 col-xl-3">
                                            <i class="fa fa-font fa-2x text-muted"></i>
                                            <div class="text-muted mt-3">+25% Fonts</div>
                                        </div>
                                        <div class="col-6 col-xl-3">
                                            <i class="fa fa-archive fa-2x text-muted"></i>
                                            <div class="text-muted mt-3">-10% Icons</div>
                                        </div>
                                        <div class="col-6 col-xl-3">
                                            <i class="fa fa-paint-brush fa-2x text-muted"></i>
                                            <div class="text-muted mt-3">+8% Graphics</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Dashboard Charts -->

                    <!-- Customers and Latest Orders -->
                    <div class="row row-deck">
                        <!-- Latest Customers -->
                        <div class="col-lg-6">
                            <div class="block block-mode-loading-oneui">
                                <div class="block-header border-bottom">
                                    <h3 class="block-title">Latest Customers</h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                            <i class="si si-refresh"></i>
                                        </button>
                                        <button type="button" class="btn-block-option">
                                            <i class="si si-settings"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="block-content block-content-full">
                                    <table class="table table-striped table-hover table-borderless table-vcenter font-size-sm mb-0">
                                        <thead class="thead-dark">
                                            <tr class="text-uppercase">
                                                <th class="font-w700" style="width: 80px;">ID</th>
                                                <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 100px;">Photo</th>
                                                <th class="font-w700">Name</th>
                                                <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 80px;">Orders</th>
                                                <th class="font-w700 text-center" style="width: 60px;"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <span class="font-w600">#01368</span>
                                                </td>
                                                <td class="d-none d-sm-table-cell text-center">
                                                    <img class="img-avatar img-avatar32" src="<?= base_url ('upload/images/'.$this->session->userdata('foto'));?>.jpg" alt="">
                                                </td>
                                                <td class="font-w600">
                                                    Jesse Fisher                                </td>
                                                <td class="d-none d-sm-table-cell text-center">
                                                    <a class="link-fx font-w600" href="javascript:void(0)">5</a>
                                                </td>
                                                <td class="text-center">
                                                    <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Edit">
                                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="font-w600">#01368</span>
                                                </td>
                                                <td class="d-none d-sm-table-cell text-center">
                                                    <img class="img-avatar img-avatar32" src="assets/media/avatars/avatar7.jpg" alt="">
                                                </td>
                                                <td class="font-w600">
                                                    Amber Harvey                                </td>
                                                <td class="d-none d-sm-table-cell text-center">
                                                    <a class="link-fx font-w600" href="javascript:void(0)">14</a>
                                                </td>
                                                <td class="text-center">
                                                    <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Edit">
                                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="font-w600">#01368</span>
                                                </td>
                                                <td class="d-none d-sm-table-cell text-center">
                                                    <img class="img-avatar img-avatar32" src="assets/media/avatars/avatar10.jpg" alt="">
                                                </td>
                                                <td class="font-w600">
                                                    Henry Harrison                                </td>
                                                <td class="d-none d-sm-table-cell text-center">
                                                    <a class="link-fx font-w600" href="javascript:void(0)">15</a>
                                                </td>
                                                <td class="text-center">
                                                    <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Edit">
                                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="font-w600">#01368</span>
                                                </td>
                                                <td class="d-none d-sm-table-cell text-center">
                                                    <img class="img-avatar img-avatar32" src="assets/media/avatars/avatar1.jpg" alt="">
                                                </td>
                                                <td class="font-w600">
                                                    Carol Ray                                </td>
                                                <td class="d-none d-sm-table-cell text-center">
                                                    <a class="link-fx font-w600" href="javascript:void(0)">36</a>
                                                </td>
                                                <td class="text-center">
                                                    <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Edit">
                                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="font-w600">#01368</span>
                                                </td>
                                                <td class="d-none d-sm-table-cell text-center">
                                                    <img class="img-avatar img-avatar32" src="assets/media/avatars/avatar10.jpg" alt="">
                                                </td>
                                                <td class="font-w600">
                                                    Jose Wagner                                </td>
                                                <td class="d-none d-sm-table-cell text-center">
                                                    <a class="link-fx font-w600" href="javascript:void(0)">3</a>
                                                </td>
                                                <td class="text-center">
                                                    <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Edit">
                                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="font-w600">#01368</span>
                                                </td>
                                                <td class="d-none d-sm-table-cell text-center">
                                                    <img class="img-avatar img-avatar32" src="assets/media/avatars/avatar1.jpg" alt="">
                                                </td>
                                                <td class="font-w600">
                                                    Lori Grant                                </td>
                                                <td class="d-none d-sm-table-cell text-center">
                                                    <a class="link-fx font-w600" href="javascript:void(0)">1</a>
                                                </td>
                                                <td class="text-center">
                                                    <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Edit">
                                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="font-w600">#01368</span>
                                                </td>
                                                <td class="d-none d-sm-table-cell text-center">
                                                    <img class="img-avatar img-avatar32" src="assets/media/avatars/avatar12.jpg" alt="">
                                                </td>
                                                <td class="font-w600">
                                                    Justin Hunt                                </td>
                                                <td class="d-none d-sm-table-cell text-center">
                                                    <a class="link-fx font-w600" href="javascript:void(0)">12</a>
                                                </td>
                                                <td class="text-center">
                                                    <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Edit">
                                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- END Latest Customers -->

                        <!-- Latest Orders -->
                        <div class="col-lg-6">
                            <div class="block block-mode-loading-oneui">
                                <div class="block-header border-bottom">
                                    <h3 class="block-title">Latest Orders</h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                            <i class="si si-refresh"></i>
                                        </button>
                                        <button type="button" class="btn-block-option">
                                            <i class="si si-settings"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="block-content block-content-full">
                                    <table class="table table-striped table-hover table-borderless table-vcenter font-size-sm mb-0">
                                        <thead class="thead-dark">
                                            <tr class="text-uppercase">
                                                <th class="font-w700">ID</th>
                                                <th class="d-none d-sm-table-cell font-w700">Date</th>
                                                <th class="font-w700">State</th>
                                                <th class="d-none d-sm-table-cell font-w700 text-right" style="width: 120px;">Price</th>
                                                <th class="font-w700 text-center" style="width: 60px;"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <span class="font-w600">#07835</span>
                                                </td>
                                                <td class="d-none d-sm-table-cell">
                                                    <span class="font-size-sm text-muted">today</span>
                                                </td>
                                                <td>
                                                    <span class="font-w600 text-warning">Pending..</span>
                                                </td>
                                                <td class="d-none d-sm-table-cell text-right">
                                                    $999,99
                                                </td>
                                                <td class="text-center">
                                                    <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Manage">
                                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="font-w600">#07834</span>
                                                </td>
                                                <td class="d-none d-sm-table-cell">
                                                    <span class="font-size-sm text-muted">today</span>
                                                </td>
                                                <td>
                                                    <span class="font-w600 text-warning">Pending..</span>
                                                </td>
                                                <td class="d-none d-sm-table-cell text-right">
                                                    $2.299,00
                                                </td>
                                                <td class="text-center">
                                                    <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Manage">
                                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="font-w600">#07833</span>
                                                </td>
                                                <td class="d-none d-sm-table-cell">
                                                    <span class="font-size-sm text-muted">today</span>
                                                </td>
                                                <td>
                                                    <span class="font-w600 text-success">Completed</span>
                                                </td>
                                                <td class="d-none d-sm-table-cell text-right">
                                                    $1200,00
                                                </td>
                                                <td class="text-center">
                                                    <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Manage">
                                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="font-w600">#07832</span>
                                                </td>
                                                <td class="d-none d-sm-table-cell">
                                                    <span class="font-size-sm text-muted">today</span>
                                                </td>
                                                <td>
                                                    <span class="font-w600 text-danger">Cancelled</span>
                                                </td>
                                                <td class="d-none d-sm-table-cell text-right">
                                                    $399,00
                                                </td>
                                                <td class="text-center">
                                                    <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Manage">
                                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="font-w600">#07831</span>
                                                </td>
                                                <td class="d-none d-sm-table-cell">
                                                    <span class="font-size-sm text-muted">yesterday</span>
                                                </td>
                                                <td>
                                                    <span class="font-w600 text-success">Completed</span>
                                                </td>
                                                <td class="d-none d-sm-table-cell text-right">
                                                    $349,00
                                                </td>
                                                <td class="text-center">
                                                    <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Manage">
                                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="font-w600">#07830</span>
                                                </td>
                                                <td class="d-none d-sm-table-cell">
                                                    <span class="font-size-sm text-muted">yesterday</span>
                                                </td>
                                                <td>
                                                    <span class="font-w600 text-success">Completed</span>
                                                </td>
                                                <td class="d-none d-sm-table-cell text-right">
                                                    $999,00
                                                </td>
                                                <td class="text-center">
                                                    <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Manage">
                                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="font-w600">#07829</span>
                                                </td>
                                                <td class="d-none d-sm-table-cell">
                                                    <span class="font-size-sm text-muted">yesterday</span>
                                                </td>
                                                <td>
                                                    <span class="font-w600 text-success">Completed</span>
                                                </td>
                                                <td class="d-none d-sm-table-cell text-right">
                                                    $39,99
                                                </td>
                                                <td class="text-center">
                                                    <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Manage">
                                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="font-w600">#07828</span>
                                                </td>
                                                <td class="d-none d-sm-table-cell">
                                                    <span class="font-size-sm text-muted">yesterday</span>
                                                </td>
                                                <td>
                                                    <span class="font-w600 text-success">Completed</span>
                                                </td>
                                                <td class="d-none d-sm-table-cell text-right">
                                                    $499,00
                                                </td>
                                                <td class="text-center">
                                                    <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Manage">
                                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="font-w600">#07827</span>
                                                </td>
                                                <td class="d-none d-sm-table-cell">
                                                    <span class="font-size-sm text-muted">yesterday</span>
                                                </td>
                                                <td>
                                                    <span class="font-w600 text-success">Completed</span>
                                                </td>
                                                <td class="d-none d-sm-table-cell text-right">
                                                    $325,00
                                                </td>
                                                <td class="text-center">
                                                    <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Manage">
                                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- END Latest Orders -->
                    </div>
                    <!-- END Customers and Latest Orders -->
                </div>
                <!-- END Page Content -->

            </main>
            <!-- END Main Container -->

            <!-- Footer -->
            <footer id="page-footer" class="bg-body-light">
                <div class="content py-3">
                    <div class="row font-size-sm">
                        <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-right">
                            Crafted with <i class="fa fa-heart text-danger"></i> by <a class="font-w600" href="https://1.envato.market/ydb" target="_blank">pixelcave</a>
                        </div>
                        <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-left">
                            <a class="font-w600" href="https://1.envato.market/xWy" target="_blank">OneUI 4.3</a> &copy; <span data-toggle="year-copy"></span>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- END Footer -->

            <!-- Apps Modal -->
            <!-- Opens from the modal toggle button in the header -->
            <div class="modal fade" id="one-modal-apps" tabindex="-1" role="dialog" aria-labelledby="one-modal-apps" aria-hidden="true">
                <div class="modal-dialog modal-dialog-top modal-sm" role="document">
                    <div class="modal-content">
                        <div class="block block-themed block-transparent mb-0">
                            <div class="block-header bg-primary-dark">
                                <h3 class="block-title">Apps</h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                        <i class="si si-close"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="block-content block-content-full">
                                <div class="row gutters-tiny">
                                    <div class="col-6">
                                        <!-- CRM -->
                                        <a class="block block-rounded block-themed bg-default" href="javascript:void(0)">
                                            <div class="block-content text-center">
                                                <i class="si si-speedometer fa-2x text-white-75"></i>
                                                <p class="font-w600 font-size-sm text-white mt-2 mb-3">
                                                    CRM
                                                </p>
                                            </div>
                                        </a>
                                        <!-- END CRM -->
                                    </div>
                                    <div class="col-6">
                                        <!-- Products -->
                                        <a class="block block-rounded block-themed bg-danger" href="javascript:void(0)">
                                            <div class="block-content text-center">
                                                <i class="si si-rocket fa-2x text-white-75"></i>
                                                <p class="font-w600 font-size-sm text-white mt-2 mb-3">
                                                    Products
                                                </p>
                                            </div>
                                        </a>
                                        <!-- END Products -->
                                    </div>
                                    <div class="col-6">
                                        <!-- Sales -->
                                        <a class="block block-rounded block-themed bg-success mb-0" href="javascript:void(0)">
                                            <div class="block-content text-center">
                                                <i class="si si-plane fa-2x text-white-75"></i>
                                                <p class="font-w600 font-size-sm text-white mt-2 mb-3">
                                                    Sales
                                                </p>
                                            </div>
                                        </a>
                                        <!-- END Sales -->
                                    </div>
                                    <div class="col-6">
                                        <!-- Payments -->
                                        <a class="block block-rounded block-themed bg-warning mb-0" href="javascript:void(0)">
                                            <div class="block-content text-center">
                                                <i class="si si-wallet fa-2x text-white-75"></i>
                                                <p class="font-w600 font-size-sm text-white mt-2 mb-3">
                                                    Payments
                                                </p>
                                            </div>
                                        </a>
                                        <!-- END Payments -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Apps Modal -->
        </div>
        <!-- END Page Container -->

        <!--
            OneUI JS Core

            Vital libraries and plugins used in all pages. You can choose to not include this file if you would like
            to handle those dependencies through webpack. Please check out assets/_es6/main/bootstrap.js for more info.

            If you like, you could also include them separately directly from the assets/js/core folder in the following
            order. That can come in handy if you would like to include a few of them (eg jQuery) from a CDN.

            assets/js/core/jquery.min.js
            assets/js/core/bootstrap.bundle.min.js
            assets/js/core/simplebar.min.js
            assets/js/core/jquery-scrollLock.min.js
            assets/js/core/jquery.appear.min.js
            assets/js/core/js.cookie.min.js
        -->
        <script src="<?=base_url('assets/js/oneui.core.min.js')?>"></script>

        <!--
            OneUI JS

            Custom functionality including Blocks/Layout API as well as other vital and optional helpers
            webpack is putting everything together at assets/_es6/main/app.js
        -->
        <script src="<?=base_url('assets/js/oneui.app.min.js')?>"></script>

        <!-- Page JS Plugins -->
        <script src="<?=base_url('assets/js/plugins/chart.js/Chart.bundle.min.js')?>"></script>

        <!-- Page JS Code -->
        <script src="<?=base_url('assets/js/pages/be_pages_dashboard.min.js')?>"></script>
    </body>
</html>