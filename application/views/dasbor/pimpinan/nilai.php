<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>Rekap Nilai</title>

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
        <link rel="stylesheet" href="<?=base_url('assets/js/plugins/datatables/dataTables.bootstrap4.css');?>">

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
                            <a class="nav-main-link active" href="<?=base_url('dasbor/kelas')?>">
                            <i class="nav-main-link-icon fa fa-door-open"></i>
                                <span class="nav-main-link-name">Kelas</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="<?=base_url('panduan')?>">
                            <i class="nav-main-link-icon fa fa-book"></i>
                                <span class="nav-main-link-name">Panduan</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="<?=base_url('pengaturan')?>">
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
                <div class="content">
                    <!-- Jadwal -->
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title"><?php echo "Rekap Nilai ".$jadwal['kelas_nama']." Mata Pelajaran ".$jadwal['matpel_nama'];?></h3>
                            
                            <div class="block-options">

                                <a href="<?=base_url('dasbor/kelas/presensi/').$this->uri->segment(4);?>">
                                    <button type="button" class="btn btn-sm btn-secondary">
                                        Presensi
                                    </button>
                                </a>

                                <a href="<?=base_url('dasbor/kelas/')?>">
                                    <button type="button" class="btn btn-sm btn-light">
                                        Kembali
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-vcenter">
                                <thead>
                                    <tr>
                                        <th colspan="2" class="text-center">Rekap Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Kelas</td>
                                        <td>: <?=$jadwal["kelas_nama"];?></td>
                                    </tr>
                                    <tr>
                                        <td>Mata Pelajaran</td>
                                        <td>: <?=$jadwal["matpel_nama"];?></td>
                                    </tr>
                                    <tr>
                                        <td>Tutor</td>
                                        <td>: <?=$jadwal["tutor_nama"];?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                                <thead class="text-center">
                                    <tr>
                                        <th rowspan="2" style="vertical-align:middle;"><strong>NO</strong></th>
                                        <th rowspan="2" style="vertical-align:middle;"><strong>NAMA</strong></th>
                                        <th colspan="5"><strong>TOTAL</strong></th>
                                        <th colspan="5"><strong>NILAI</strong></th>
                                        <th rowspan="2" style="vertical-align:middle;"><strong>Total</strong></th>
                                        <th rowspan="2" style="vertical-align:middle;"><strong>Rata-Rata</strong></th>
                                        <th rowspan="2" style="vertical-align:middle;"><strong>Keterangan</strong></th>
                                    </tr>
                                    <tr>
                                        <th width="5%"><strong>Harian</strong></th>
                                        <th width="5%"><strong>Tugas</strong></th>
                                        <th width="5%"><strong>PTS</strong></th>
                                        <th width="5%"><strong>PAS</strong></th>
                                        <th width="5%"><strong>PAT</strong></th>
                                        <th width="5%"><strong>Harian</strong></th>
                                        <th width="5%"><strong>Tugas</strong></th>
                                        <th width="5%"><strong>PTS</strong></th>
                                        <th width="5%"><strong>PAS</strong></th>
                                        <th width="5%"><strong>PAT</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                            $sumTotal=0;
                                            $sumAverage=0;

                                            $avgOfTotal=0;
                                            $avgOfavg=0;

                                            $no=0;

                                            foreach($wargabelajars as $wargabelajar){

                                                $no++;

                                                $id = $wargabelajar["wargabelajar_id"];
                                                $idnilai = $model->getIDNIilai($this->uri->segment(4),$id);

                                                

                                                $nilai = $idnilai["nilai_id"];

                                                $CountPAT = $model->countPAT($nilai);
                                                $CountPAS = $model->countPAS($nilai);
                                                $CountPTS = $model->countPTS($nilai);
                                                $CountTugas = $model->countTugas($nilai);
                                                $CountHarian = $model->countHarian($nilai);

                                                $sumPAT = $model->sumPAT($nilai);
                                                $sumPAS = $model->sumPAS($nilai);
                                                $sumPTS = $model->sumPTS($nilai);
                                                $sumTugas = $model->sumTugas($nilai);
                                                $sumHarian = $model->sumHarian($nilai);

                                                $total = $sumPAT['pat']+$sumPTS['pts']+$sumPAS['pas']+$sumTugas['tugas']+$sumHarian['harian'];
                                                $average = ($total / 5);
                                                $status;

                                                if($average>=90 && $average<=100){
                                                    $status ="A";
                                                }elseif($average>=80 && $average<90){
                                                    $status = "B";
                                                }elseif($average>=70 && $average<80){
                                                    $status = "C";
                                                }elseif($average>=60 && $average<70){
                                                    $status = "D";
                                                }else{
                                                    $status = "E";
                                                }

                                                $sumTotal +=$total;
                                                $sumAverage += $average;




                                        ?>
                                    <tr>
                                            <td class="text-center"><?php echo $no;?></td>
                                            <td>
                                                <?php echo $wargabelajar["wargabelajar_nama"]."<br>".$wargabelajar["wargabelajar_nomor_induk"];?>
                                            </td>
                                            <td class="text-center" style="vertical-align:middle;"><?php echo $CountHarian['harian'];?></td>
                                            <td class="text-center" style="vertical-align:middle;"><?php echo $CountTugas['tugas'];?></td>
                                            <td class="text-center" style="vertical-align:middle;"><?php echo $CountPTS['pts'];?></td>
                                            <td class="text-center" style="vertical-align:middle;"><?php echo $CountPAS['pas'];?></td>
                                            <td class="text-center" style="vertical-align:middle;"><?php echo $CountPAT['pat'];?></td>
                                            <td class="text-center" style="vertical-align:middle;"><?php echo number_format($sumHarian['harian'],2);?></td>
                                            <td class="text-center" style="vertical-align:middle;"><?php echo number_format($sumTugas['tugas'],2);?></td>
                                            <td class="text-center" style="vertical-align:middle;"><?php echo number_format($sumPTS['pts'],2);?></td>
                                            <td class="text-center" style="vertical-align:middle;"><?php echo number_format($sumPAS['pas'],2);?></td>
                                            <td class="text-center" style="vertical-align:middle;"><?php echo number_format($sumPAT['pat'],2);?></td>
                                            <td class="text-center" style="vertical-align:middle;"><?php echo number_format($total,2);?></td>
                                            <td class="text-center" style="vertical-align:middle;"><?php echo number_format($average,2);?></td>
                                            <td class="text-center" style="vertical-align:middle;"><?php echo $status;?></td>
                                    </tr>
                                        <?php } 
                                            $avgOfTotal=$sumTotal/$no;
                                            $avgOfavg=$sumAverage/$no;
                                        ?>
                                    <tr>
                                            <th colspan="12">Total</th>
                                            <td class="text-center"><?php echo number_format($sumTotal,2);?></td>
                                            <td class="text-center"><?php echo number_format($sumAverage,2);?></td>
                                            <td class="text-center"></td>
                                    </tr>
                                    <tr>
                                            <th colspan="12">Rata-Rata</th>
                                            <td class="text-center"><?php echo number_format($avgOfTotal,2);?></td>
                                            <td class="text-center"><?php echo number_format($avgOfavg,2);?></td>
                                            <td class="text-center"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                            <a href="<?=base_url('dasbor');?>">
                                <button type="button" class="btn btn-light js-click-ripple-enabled" data-toggle="click-ripple" style="overflow: hidden; position: relative; z-index: 1;"><span class="click-ripple animate" style="height: 87.2656px; width: 87.2656px; top: -21.625px; left: 31.375px;"></span>Kembali Ke Halaman Dasbor</button>
                            </a>
                      
                        
                    </div>
                    <!-- End Jadwal -->
                   
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

        <!-- Page JS Plugins -->
        <script src="<?=base_url('assets/js/plugins/datatables/jquery.dataTables.min.js')?>"></script>
        <script src="<?=base_url('assets/js/plugins/datatables/dataTables.bootstrap4.min.js')?>"></script>
        <script src="<?=base_url('assets/js/plugins/select2/js/select2.full.min.js');?>"></script>

        <!-- Page JS Code -->
        <script src="<?=base_url('assets/js/pages/be_tables_datatables.min.js')?>"></script>
        
        

    </body>
</html>
