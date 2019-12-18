<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title><?=$title;?> - SIAK HARBA</title>
        <!-- Icons -->
        <link rel="shortcut icon" href="<?= base_url('assets/media/favicons/favicon.png');?>">
        
        <!-- Stylesheets -->
        <!-- Page JS Plugins CSS -->
        <?php
            if($title=="Tambah Data"){
                echo '<link rel="stylesheet" href="'.base_url("assets/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css").'">';
                echo '<link rel="stylesheet" href="'.base_url("assets/js/plugins/flatpickr/flatpickr.min.css").'">';
            }
        ?>
        <link rel="stylesheet" id="css-main" href="<?=base_url('assets/js/plugins/datatables/dataTables.bootstrap4.css');?>">
        <link rel="stylesheet" id="css-main" href="<?=base_url('assets/js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css');?>">        
        <!-- Fonts and OneUI framework -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
        <link rel="stylesheet" id="css-main" href="<?=base_url('assets/css/oneui.min.css');?>">
    </head>
    <body>
        <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed">
            <!-- Side Overlay-->
            <aside id="side-overlay" class="font-size-sm">
                <!-- Side Header -->
                <div class="content-header border-bottom">
                    <!-- User Avatar -->
                    <a class="img-link mr-1" href="javascript:void(0)">
                        <img class="img-avatar img-avatar32" src="<?= base_url('assets/media/avatars/avatar10.jpg');?>" alt="">
                    </a>
                    <!-- END User Avatar -->

                    <!-- User Info -->
                    <div class="ml-2">
                        <a class="link-fx text-dark font-w600" href="javascript:void(0)">Adam McCoy</a>
                    </div>
                    <!-- END User Info -->
                </div>
                <!-- END Side Header -->
            </aside>
            <!-- END Side Overlay -->

            <!-- Sidebar -->
            <nav id="sidebar" aria-label="Main Navigation">
                <!-- Side Header -->
                <div class="content-header bg-white-5">
                    <!-- Logo -->
                    <a class="font-w600 text-dual" href="<?=base_url();?>">
                        <i class="fa fa-circle-notch text-primary"></i>
                        <span class="smini-hide">
                            <span class="font-w700 font-size-h5">iak</span> <span class="font-w400">Harba</span>
                        </span>
                    </a>
                    <!-- END Logo -->
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