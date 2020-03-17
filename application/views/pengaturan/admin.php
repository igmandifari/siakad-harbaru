
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
        <!-- PageJS Plugins CSS -->
        <link rel="stylesheet" href="<?=base_url('assets/js/plugins/sweetalert2/sweetalert2.min.css');?>">
        <!-- Fonts and OneUI framework -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
        <link rel="stylesheet" id="css-main" href="<?=base_url('assets/css/oneui.min.css')?>">

    </head>
    <body>
     
        <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed">
            <!-- Side Overlay-->
            <aside id="side-overlay" class="font-size-sm">
                <!-- Side Header -->
                <div class="content-header border-bottom">
                    <!-- User Avatar -->
                    <a class="img-link mr-1" href="javascript:void(0)">
                        <img class="img-avatar img-avatar32" src="<?= base_url('upload/images/').$this->photo;?>" alt="">
                    </a>
                    <!-- END User Avatar -->

                    <!-- User Info -->
                    <div class="ml-2">
                        <a class="link-fx text-dark font-w600" href="javascript:void(0)"><?= $this->name;?></a>
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
                            <a class="nav-main-link" href="<?=base_url('dasbor')?>">
                                <i class="nav-main-link-icon si si-speedometer"></i>
                                <span class="nav-main-link-name">Dasbor</span>
                            </a>
                        </li>
                        <li class="nav-main-heading">Data Master</li>
                        <li class="nav-main-item">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                <i class="nav-main-link-icon fa fa-users"></i>
                                <span class="nav-main-link-name">Warga Belajar</span>
                            </a>
                            <ul class="nav-main-submenu">
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="<?=base_url('wargabelajar/');?>">
                                        <span class="nav-main-link-name">Daftar Warga Belajar</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="<?=base_url('wargabelajar/tambah');?>">
                                        <span class="nav-main-link-name">Tambah Warga Belajar</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                <i class="nav-main-link-icon fa fa-users"></i>
                                <span class="nav-main-link-name">Tutor</span>
                            </a>
                            <ul class="nav-main-submenu">
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="<?=base_url('tutor/');?>">
                                        <span class="nav-main-link-name">Daftar Tutor</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="<?=base_url('tutor/tambah');?>">
                                        <span class="nav-main-link-name">Tambah Tutor</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                <i class="nav-main-link-icon fa fa-door-open"></i>
                                <span class="nav-main-link-name">Kelas</span>
                            </a>
                            <ul class="nav-main-submenu">
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="<?=base_url('kelas/');?>">
                                        <span class="nav-main-link-name">Daftar Kelas</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="<?=base_url('kelas/tambah');?>">
                                        <span class="nav-main-link-name">Tambah Kelas</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="<?=base_url('kelas/rombel');?>">
                                        <span class="nav-main-link-name">Rombel</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                <i class="nav-main-link-icon fa fa-book"></i>
                                <span class="nav-main-link-name">Mata Pelajaran</span>
                            </a>
                            <ul class="nav-main-submenu">
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="<?=base_url('matpel/');?>">
                                        <span class="nav-main-link-name">Daftar Mata Pelajaran</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="<?=base_url('matpel/tambah');?>">
                                        <span class="nav-main-link-name">Tambah Mata Pelajaran</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="<?=base_url('jadwal');?>">
                                        <span class="nav-main-link-name">Jadwal Mata Pelajaran</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                <i class="nav-main-link-icon fa fa-users"></i>
                                <span class="nav-main-link-name">Admin</span>
                            </a>
                            <ul class="nav-main-submenu">
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="<?=base_url('admin/');?>">
                                        <span class="nav-main-link-name">Daftar Admin</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="<?=base_url('admin/tambah');?>">
                                        <span class="nav-main-link-name">Tambah Admin</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                <i class="nav-main-link-icon fa fa-users"></i>
                                <span class="nav-main-link-name">Pimpinan</span>
                            </a>
                            <ul class="nav-main-submenu">
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="<?=base_url('pimpinan/');?>">
                                        <span class="nav-main-link-name">Daftar Pimpinan</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="<?=base_url('pimpinan/tambah');?>">
                                        <span class="nav-main-link-name">Tambah Pimpinan</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                <i class="nav-main-link-icon fa fa-calendar-times"></i>
                                <span class="nav-main-link-name">Tahun Ajaran</span>
                            </a>
                            <ul class="nav-main-submenu">
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="<?=base_url('tahunajaran/');?>">
                                        <span class="nav-main-link-name">Daftar Tahun Ajaran</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="<?=base_url('tahunajaran/tambah');?>">
                                        <span class="nav-main-link-name">Tambah Tahun Ajaran</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="<?=base_url('masukan')?>">
                            <i class="nav-main-link-icon fab fa-rocketchat ml-1"></i>
                                <span class="nav-main-link-name">Data Masukan</span>
                            </a>
                        </li>
                        <li class="nav-main-heading">Options</li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="<?=base_url('panduan')?>">
                            <i class="nav-main-link-icon fa fa-book"></i>
                                <span class="nav-main-link-name">Panduan</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link active" href="<?=base_url('pengaturan')?>">
                            <i class="nav-main-link-icon si si-settings"></i>
                                <span class="nav-main-link-name">Pengaturan</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="<?=base_url('auth/logout')?>">
                            <i class="nav-main-link-icon si si-logout ml-1"></i>
                                <span class="nav-main-link-name">Keluar</span>
                            </a>
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
                                <img class="rounded" src="<?= base_url('upload/images/').$this->photo;?>" alt="Header Avatar" style="width: 18px;">
                                <span class="d-none d-sm-inline-block ml-1"><?= $this->name;?></span>
                                <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right p-0 border-0 font-size-sm" aria-labelledby="page-header-user-dropdown">
                                <div class="p-3 text-center bg-primary">
                                    <img class="img-avatar img-avatar48 img-avatar-thumb" src="<?=base_url('upload/images/').$this->photo;?>" alt="">
                                </div>
                                <div class="p-2">
                                    <h5 class="dropdown-header text-uppercase">Options</h5>
                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="<?=base_url('pengaturan')?>">
                                        <span>Pengaturan</span>
                                        <i class="si si-settings"></i>
                                    </a>
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
                <!-- Page Content -->
                <div class="content content-narrow">
                    <!-- Simple Wizards -->
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title"><?=$title;?></h3>
                            <div class="block-options">
                                <a href="#">
                                    <button type="button" class="btn btn-sm btn-light">
                                        Kembali
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                           
                            <div class="col-sm-12">
                                <!-- Simple Wizard 2 -->
                                <div class="js-wizard-simple block block">
                                    <!-- Step Tabs -->
                                    <ul class="nav nav-tabs nav-tabs-alt nav-justified" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#wizard-profile" data-toggle="tab"><i class="fa fa-user-edit"></i> Profil</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#wizard-password" data-toggle="tab"><i class="fa fa-user-cog"></i> Kata Sandi</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#wizard-system" data-toggle="tab"><i class="fa fa-archive"></i> Sistem</a>
                                        </li>
                                    </ul>
                                    <!-- END Step Tabs -->

                                    <!-- Form -->
                                   
                                        <!-- Steps Content -->
                                        <div class="block-content block-content-full tab-content px-md-5" style="min-height: 303px;">
                                            <!-- Step 1 -->
                                            <div class="tab-pane active" id="wizard-profile" role="tabpanel">
                                                <p class="font-size-md text-muted">
                                                    Pada bagian ini, kamu dapat mengubah profil kamu, silahkan ubah dibagian yang kamu mau.
                                                </p>
                                                <?php if ($this->session->flashdata('success')){ ?>
                                                    <div class="alert alert-success d-flex align-items-center" role="alert">
                                                        <div class="flex-00-auto">
                                                            <i class="fa fa-fw fa-check"></i>
                                                        </div>
                                                        <div class="flex-fill ml-3">
                                                            <p class="mb-0"><?php echo $this->session->flashdata('success'); ?></p>
                                                        </div>
                                                    </div>

                                                <?php header("Refresh: 3; url=auth/logout");}?>
                                                <form action="<?=base_url('pengaturan/update');?>" method="post" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <label for="admin_nama">Nama</label>
                                                        <input type="text" class="form-control" id="admin_nama" name="admin_nama" value="<?=$admin["admin_nama"];?>">
                                                        <small class="form-text text-danger"><?= form_error('admin_nama'); ?></small>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="username">Username</label>
                                                        <input type="text" class="form-control" id="admin_username" name="admin_username" value="<?=$admin["admin_username"];?>">
                                                        <small class="form-text text-danger"><?= form_error('admin_username'); ?></small>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Foto</label>
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input js-custom-file-input-enabled" data-toggle="custom-file-input" id="admin_foto" name="admin_foto">
                                                            <label class="custom-file-label" for="admin_foto">Pilih foto:</label>
                                                            <input type="hidden" name="old_image" value="<?php echo $admin["admin_foto"] ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group text-center">
                                                        <button type="submit" class="btn btn-primary submit-profile">
                                                            <i class="fa fa-check mr-1"></i> Perbarui
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                            
                                            <!-- END Step 1 -->

                                            <!-- Step 2 -->
                                            <div class="tab-pane" id="wizard-password" role="tabpanel">
                                                <p class="font-size-md text-muted">
                                                    Kamu dapat mengubah password atau kata sandi ketika kamu masuk ke halaman ini.
                                                </p>
                                                <form action="<?php echo base_url("admin/ubah_password/pengaturan") ?>" method="post" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <label for="password">Password Baru</label>
                                                        <input type="password" class="form-control form-control-alt" id="admin_password" name="admin_password" placeholder="Masukan Password Baru">
                                                        <small class="form-text text-danger"><?= form_error('admin_password'); ?></small>
                                                    </div>
                                                    <div class="form-group text-center">
                                                        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- END Step 2 -->

                                            <!-- Step 3 -->
                                            
                                            <div class="tab-pane" id="wizard-system" role="tabpanel">
                                                <p class="font-size-md text-muted">
                                                    Kamu dapat mengatur seperti membuka akses dapat melihat nilai oleh warga belajar, membackup data sistem ini dan mengimport data ke sistem ini.
                                                </p>
                                                <div class="table-responsive">
                                                    <label for="pengaturan-nilai">Tampilkan Nilai</label>
                                                    <table id="pengaturan-nilai" class="table table-bordered table-striped table-vcenter">
                                                        <thead>
                                                            <tr class="text-center">
                                                                <th class="text-center" style="width: 100px;">
                                                                    NO
                                                                </th>
                                                                <th>Tahun Ajaran</th>
                                                                <th style="width: 30%;">Nilai</th>
                                                                <th style="width: 30%;">Berjalan</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $no=0;foreach($tahunajarans as $tahunajaran):$no++?>
                                                                <tr>
                                                                    <td class="text-center"><?php echo $no;?></td>
                                                                    <td><?php echo $tahunajaran["tahunajaran_nama"];?></td>
                                                                    <td class="text-center">
                                                                        <div class="custom-control custom-switch mb-1">
                                                                            <input type="checkbox" class="switch custom-control-input switch-nilai" id="switch-<?php echo $no;?>" name="switch-<?php echo $no;?>" data-id="<?php echo $tahunajaran['tahunajaran_id'];?>" <?php if($tahunajaran['open_nilai']== 1) echo "checked";?>>
                                                                            <label class="custom-control-label" for="switch-<?php echo $no;?>"><?php if($tahunajaran['open_nilai']== 1){ echo "Tutup Nilai";}else{echo "Buka";}?></label>
                                                                        </div>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <div class="custom-control custom-switch mb-1">
                                                                            <input type="radio" class="switch custom-control-input switch-aktif" id="tahunajaran-aktif-<?php echo $no;?>" name="tahunajaran-aktif" data-id="<?php echo $tahunajaran['tahunajaran_id'];?>" <?php if($tahunajaran['is_active']== 1) echo "checked";?>>
                                                                            <label class="custom-control-label" for="tahunajaran-aktif-<?php echo $no;?>"><?php if($tahunajaran['is_active']== 1){ echo "Aktif";}else{echo "Tidak Aktif";}?></label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach;?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="form-group">
                                                    <label for="btn-data-backup">Backup Data</label>
                                                    <p class="font-size-sm text-muted">Data yang disimpan berupa file .sql. Jangan diberikan kepada orang yang tidak berhak!.</p>
                                                    <a href="<?=base_url('pengaturan/backup');?>">
                                                        <button type="button" id="btn-data-backup" class="btn btn-info mr-1 mb-3">
                                                            <i class="fa fa-fw fa-download mr-1"></i> Backup
                                                        </button>
                                                    </a>
                                                </div>
                                                <div class="form-group">
                                                    <label for="data-import">Import/Restore Data</label>
                                                    <p class="font-size-sm text-muted">Hanya dapat menerima file berekstensi .sql, selain itu belum bisa.</p>
                                                    <?php echo form_open_multipart(base_url('pengaturan/import'));?>
                                                    <div class="form-group col-sm-6">
                                                        <div class="custom-file">
                                                            <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                                            <input type="file" class="custom-file-input js-custom-file-input-enabled" data-toggle="custom-file-input" id="data-import" name="data-import">
                                                            <label class="custom-file-label" for="data-import">Silahkan pilih data yang diimport</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary mr-1 mb-3">
                                                        <i class="fa fa-fw fa-upload mr-1"></i> Import
                                                    </button>
                                                    </div>
                                                    <?php echo form_close();?>
                                                </div>
                                            </div>
                                            <!-- END Step 3 -->
                                        </div>
                                        <!-- END Steps Content -->

                                        <!-- Steps Navigation -->
                                        <div class="block-content block-content-sm block-content-full bg-body-light rounded-bottom">
                                            <div class="row">
                                                <div class="col-6">
                                                    <button type="button" class="btn btn-secondary" data-wizard="prev">
                                                        <i class="fa fa-angle-left mr-1"></i> Sebelumnya
                                                    </button>
                                                </div>
                                                <div class="col-6 text-right">
                                                    <button type="button" class="btn btn-secondary" data-wizard="next">
                                                        Selanjutnya <i class="fa fa-angle-right ml-1"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END Steps Navigation -->
                                    
                                    <!-- END Form -->
                                </div>
                                <!-- END Simple Wizard 2 -->
                            </div>
                        </div>
                    </div>
                    <!-- END Simple Wizards -->                   
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

        <!-- PageJS Plugins -->
        <script src="<?=base_url('assets/js/plugins/jquery-bootstrap-wizard/bs4/jquery.bootstrap.wizard.min.js');?>"></script>
        <script src="<?=base_url('assets/js/plugins/jquery-validation/jquery.validate.min.js');?>"></script>
         <script src="<?=base_url('assets/js/plugins/es6-promise/es6-promise.auto.min.js');?>"></script>
        <script src="<?=base_url('assets/js/plugins/sweetalert2/sweetalert2.min.js');?>"></script>
        <script src="<?=base_url('assets/js/plugins/bootstrap-notify/bootstrap-notify.min.js');?>"></script>
         <!-- Page JS Code -->
        <script src="<?=base_url('assets/js/pages/be_forms_wizard.min.js');?>"></script>
        <script type="text/javascript">
            jQuery(function(){

                jQuery('#pengaturan-nilai').on('click','.switch-aktif',function(){
                    var id = jQuery(this).data('id');

                    if($(this).prop("checked") == true){
                        jQuery.ajax({
                            type:'POST',
                            url:'<?php echo base_url('pengaturan/set_active');?>',
                            data:{id:id},
                            success:function(data){
                                status();
                            }

                        })
                    }
                });
                
                jQuery('#pengaturan-nilai').on('click','.switch-nilai',function(){
                    var id = jQuery(this).data('id');
                    if($(this).prop("checked") == true){
                        jQuery.ajax({
                            type:'POST',
                            url:'<?php echo base_url('pengaturan/set_permission');?>',
                            data:{id:id,val:1},
                            success:function(data){
                                status();
                            }

                        })
                    }else if($(this).prop("checked") == false){
                        jQuery.ajax({
                            type:'POST',
                            url:'<?php echo base_url('pengaturan/set_permission');?>',
                            data:{id:id,val:0},
                            success:function(data){
                                status();
                            }

                        })
                    }                
                });

                function status(){
                    jQuery.ajax({
                        type:'GET',
                        url:'<?php echo base_url('pengaturan/status_permission');?>',
                        dataType:'json',
                        success:function(data){
                            console.log(data.status);
                            if(data.status == 0){
                                One.helpers('notify', {align: 'center', type: 'warning', icon: 'fa fa-exclamation mr-1', message: 'Oops terjadi kesalahan....'});
                            }else if(data.status == 200){
                                One.helpers('notify', {align: 'center', type: 'success', icon: 'fa fa-check mr-1', message: 'Behasil diubah! :)'});
                            }else if(data.status == 430){
                                One.helpers('notify', {align: 'center', type: 'danger', icon: 'fa fa-times mr-1', message: 'Ooops terjadi kesalahan....Yuk, coba lagi!'});
                            }else if(data.status == 500){
                                One.helpers('notify', {align: 'center', type: 'warning', icon: 'fa fa-exclamation mr-1', message: 'Oops terjadi kesalahan....'});
                            }
                        },error:function(data){
                            console.log('cant get status');
                        }
                    });
                }
            });
        </script>
    </body>
</html>