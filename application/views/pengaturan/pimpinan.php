
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
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="<?=base_url('dasbor/wargabelajar')?>">
                            <i class="nav-main-link-icon fa fa-users"></i>
                                <span class="nav-main-link-name">Wargabelajar</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="<?=base_url('dasbor/tutor')?>">
                            <i class="nav-main-link-icon fa fa-users"></i>
                                <span class="nav-main-link-name">Tutor</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="<?=base_url('dasbor/kelas')?>">
                            <i class="nav-main-link-icon fa fa-door-open"></i>
                                <span class="nav-main-link-name">Kelas</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="<?=base_url('masukan')?>">
                            <i class="nav-main-link-icon fab fa-rocketchat ml-1"></i>
                                <span class="nav-main-link-name">Data Masukan</span>
                            </a>
                        </li>
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
                                <img class="rounded" src="<?= base_url ('upload/images/'.$this->session->userdata('foto'));?>" alt="Header Avatar" style="width: 18px;">
                                <span class="d-none d-sm-inline-block ml-1"><?= $this->session->userdata('nama');?></span>
                                <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right p-0 border-0 font-size-sm" aria-labelledby="page-header-user-dropdown">
                                <div class="p-3 text-center bg-primary">
                                    <img class="img-avatar img-avatar48 img-avatar-thumb" src="<?= base_url ('upload/images/'.$this->session->userdata('foto'));?>" alt="">
                                </div>
                                <div class="p-2">
                                    <h5 class="dropdown-header text-uppercase">Pilihan</h5>
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
                                            <a class="nav-link" href="#wizard-profile-personal" data-toggle="tab"><i class="fa fa-user"></i> Profil Personal</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#wizard-password" data-toggle="tab"><i class="fa fa-user-cog"></i> Ubah Kata Sandi</a>
                                        </li>
                                    </ul>
                                    <!-- END Step Tabs -->

                                    <!-- Form -->
                                   
                                        <!-- Steps Content -->
                                        <div class="block-content block-content-full tab-content px-md-5" style="min-height: 303px;">
                                            <!-- Step 1 -->
                                            <div class="tab-pane active" id="wizard-profile-personal" role="tabpanel">
                                                <p class="font-size-md text-muted">
                                                    Halo <?php echo $this->name;?>! Kamu bisa lihat data-data kamu dibawah ini! Apabila tidak sesuai atau ada perubahan silahkan hubungi pihak operator ya!
                                                </p>
                                                <div class="form-group">
                                                    <label for="pimpinan_nama">Nama</label>
                                                    <input type="text" id="pimpinan_nama" name="pimpinan_nama" class="form-control form-control-alt" value="<?php echo $pimpinan['pimpinan_nama'] ;?>" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="pimpinan_username">Username</label>
                                                    <input type="text" id="pimpinan_username" name="pimpinan_username" class="form-control form-control-alt" value="<?php echo $pimpinan['pimpinan_username'] ;?>" disabled>
                                                </div>
                                                
                                            </div>
                                            
                                            <!-- END Step 1 -->

                                            <!-- Step 2 -->
                                            <div class="tab-pane" id="wizard-password" role="tabpanel">
                                                <p class="font-size-md text-muted">
                                                    Halo <?php echo $this->name;?>! Kamu bisa mengubah kata sandi atau password yang digunakan saat autentikasi!.
                                                </p>
                                                
                                                    <div class="form-group">
                                                        <label for="old-password">Password Lama</label>
                                                        <input type="password" class="form-control form-control-alt" id="old-password" name="old-password" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="new-password">Password Baru</label>
                                                        <input type="password" class="form-control form-control-alt" id="new-password" name="new-password" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="confirm-password">Konfirmasi Password Baru</label>
                                                        <input type="password" class="form-control form-control-alt" id="confirm-password" name="confirm-password" required>
                                                    </div>
                                                    <div class="form-group text-center">
                                                        <button type="submit" name="submit" class="btn btn-primary" id="btn-change-password">Ya, ubah password!</button>
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
        <script src="<?=base_url('assets/js/plugins/select2/js/select2.full.min.js');?>"></script>
        <script src="<?=base_url('assets/js/plugins/jquery-validation/jquery.validate.min.js');?>"></script>
         <script src="<?=base_url('assets/js/plugins/es6-promise/es6-promise.auto.min.js');?>"></script>
        <script src="<?=base_url('assets/js/plugins/sweetalert2/sweetalert2.min.js');?>"></script>
        <script src="<?=base_url('assets/js/plugins/bootstrap-notify/bootstrap-notify.min.js');?>"></script>
         <!-- Page JS Code -->
        <script src="<?=base_url('assets/js/pages/be_forms_wizard.min.js');?>"></script>
        <script>


        jQuery("#tahunajaran").change(function(){
                var id=this.value;
                $.ajax({
                    type:'POST',
                    url:'<?php echo base_url('dasbor/setTahunajaran');?>',
                    data:{tahunajaran_id:id},
                    success:function(data){
                        location.reload();
                    }

                });
            });
        jQuery(function(){

            jQuery("#btn-change-password").on('click',function(){
                var old_password = jQuery("#old-password").val();
                var new_password = jQuery("#new-password").val();
                var confirm_password = jQuery("#confirm-password").val();
                $.ajax({
                    url:'<?php echo base_url('pengaturan/update_password');?>',
                    type:'post',
                    data:{old_password:old_password,new_password:new_password,confirm_password:confirm_password},
                    success:function(data){
                        status();
                    },error:function(data){
                        One.helpers('notify', {align: 'center', type: 'danger', icon: 'fa fa-times mr-1', message: 'Ooops terjadi kesalahan....Yuk, coba lagi!'});
                    }
                });
            });
            One.helpers(['select2']);

            function status(){
                $.ajax({
                    url:'<?php echo base_url('pengaturan/status');?>',
                    type:'get',
                    dataType:'json',
                    success:function(data){
                        if(data.status==="wrong"){
                            One.helpers('notify', {align: 'center', type: 'warning', icon: 'fa fa-exclamation mr-1', message: 'Password lamanya salah! :('});
                        }else if(data.status==="minus"){
                            One.helpers('notify', {align: 'center', type: 'warning', icon: 'fa fa-exclamation mr-1', message: 'Yaa maap passwordnya tidak boleh kurang dari 7 karakter :('});
                        }else if(data.status==="ignore"){
                            One.helpers('notify', {align: 'center', type: 'warning', icon: 'fa fa-exclamation mr-1', message: 'Password yang kamu inginkan tidak sesuai! :('});
                        }else if(data.status==="error"){
                            One.helpers('notify', {align: 'center', type: 'danger', icon: 'fa fa-times mr-1', message: 'Ooops terjadi kesalahan....Yuk, coba lagi!'});
                        }else if(data.status==="success"){
                            One.helpers('notify', {align: 'center', type: 'success', icon: 'fa fa-check mr-1', message: 'Ya, mengubah password berhasil! :)'});
                            window.location.replace("<?php echo base_url('auth/logout');?>");
                        }
                    },error:function(data){
                        console.log('tidak bisa mengambil status');
                    }
                });
             }
        });

        

        
      
</script>
    </body>
</html>
