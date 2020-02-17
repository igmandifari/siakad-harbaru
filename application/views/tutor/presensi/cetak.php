<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title></title>

        <meta name="description" content="OneUI - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">

        <!-- Open Graph Meta -->
        <meta property="og:title" content="OneUI - Bootstrap 4 Admin Template &amp; UI Framework">
        <meta property="og:site_name" content="OneUI">
        <meta property="og:description" content="OneUI - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta property="og:type" content="website">
        <meta property="og:url" content="">
        <meta property="og:image" content="">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="<?php echo base_url('assets/media/favicons/favicon.png');?>">
        <link rel="icon" type="image/png" sizes="192x192" href="<?php echo base_url('assets/media/favicons/favicon-192x192.png');?>">
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('assets/media/favicons/apple-touch-icon-180x180.png');?>">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Fonts and OneUI framework -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
        <link rel="stylesheet" id="css-main" href="<?php echo base_url('assets/css/oneui.min.css');?>">

        <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/amethyst.min.css"> -->
        <!-- END Stylesheets -->

    </head>
    <body style="background-color: #FFFFFF!important;">
       
                <!-- Page Content -->
                <div style="width: 100%">
                    <!-- Invoice -->
                    <div class="block">
                        <div class="block-content">

                                <!-- Table -->
                                <div class="table-responsive push">
                                    <table class="table table-bordered table-striped table-vcenter">
                                        <thead>
                                            <tr>
                                                <th colspan="2" class="text-center">Rekap Presensi</th>
                                            </tr>
                                            <tbody>
                                                <tr>
                                                    <td>Kelas</td>
                                                    <td>: <?=$kelas["kelas_nama"];?></td>
                                                </tr>
                                                <tr>
                                                    <td>Mata Pelajaran</td>
                                                    <td>: <?=$kelas["matpel_nama"];?></td>
                                                </tr>
                                                <tr>
                                                    <td>Tipe Pembelajaran</td>
                                                    <td>: Tatap Muka</td>
                                                </tr>
                                                <tr>
                                                    <td>Tutor</td>
                                                    <td>: <?=$this->session->userdata('nama');?></td>
                                                </tr>
                                            </tbody>
                                        </thead>
                                        <!-- <tbody>
                                        </tbody> -->
                                    </table>
                                    <table class="table table-bordered">
                                        <thead class="text-center">
                                            <tr>
                                                <th rowspan="2" style="vertical-align:middle;width:8%;">NO</th>
                                                <th rowspan="2" style="vertical-align:middle;">Nama</th>
                                                <?php 
                                                    $n = 5;
                                                    $tanggal =$details->getDate($this->uri->segment(3));
                                                    if(!isset($tanggal)){
                                                        $n=5;
                                                    }
                                                    foreach($tanggal as $date){
                                                        $n++;
                                                    }

                                                ;?>
                                                <th colspan="<?php echo $n;?>" style="vertical-align:middle;">Keterangan</th>
                                            </tr>
                                            <tr>
                                                <th width="5%" style="vertical-align:middle;">Total</th>
                                                <th width="5%" style="vertical-align:middle;">H</th>
                                                <th width="5%" style="vertical-align:middle;">I</th>
                                                <th width="5%" style="vertical-align:middle;">S</th>
                                                <th width="5%" style="vertical-align:middle;">A</th>
                                                <?php
                                                    foreach($tanggal as $tgl){

                                                ?>
                                                <th width="5%" style="vertical-align:middle;"><small><?php echo date("d-m-y",strtotime($tgl->tanggal));?></small></th>
                                                <?php }?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no=0;foreach ($wargabelajars as $wargabelajar){
                                                $alpa = $details->getAlpa($this->uri->segment(3),$wargabelajar->id);
                                                $izin = $details->getizin($this->uri->segment(3),$wargabelajar->id);
                                                $sakit =$details->getSakit($this->uri->segment(3),$wargabelajar->id);
                                                $hadir =$details->getHadir($this->uri->segment(3),$wargabelajar->id);
                                                $total =$details->countTotal($this->uri->segment(3),$wargabelajar->id);
                                                $no++;
                                            ?>
                                            
                                            <tr>
                                                <td class="text-center"><?php echo $no;?></td>
                                                <td><?php echo $wargabelajar->wargabelajar_nama;?></td>
                                                <td class="text-center"><?php echo $total['total'];?></td>
                                                <td class="text-center"><?php echo $hadir['hadir'];?></td>
                                                <td class="text-center"><?php echo $izin['izin'];?></td>
                                                <td class="text-center"><?php echo $sakit['sakit'];?></td>
                                                <td class="text-center"><?php echo $alpa['alpa'];?></td>
                                                <?php
                                                    foreach($tanggal as $dt){
                                                        $keteranganPresensei = $details->getDetailBanget($dt->id,$wargabelajar->id);

                                                        if($keteranganPresensei['ket']=="A"){
                                                ?>
                                                            <td class="bg-danger"></td>
                                                         <?php } elseif ($keteranganPresensei['ket']=="S"){?>
                                                            <td class="bg-success"></td>
                                                        <?php } elseif ($keteranganPresensei['ket']=="I"){?>
                                                            <td class="bg-warning"></td>
                                                        <?php } elseif ($keteranganPresensei['ket']=="H"){?>
                                                            <td class="bg-info"></td>
                                                        <?php }
                                                    }?>
                                            </tr>
                                        <?php }?>
                                        </tbody>
                                    </table>
                                    <div class="col-sm-4">
                                        <table class="table table-bordered table-striped table-vcenter">
                                            <thead class="text-center">
                                                <tr>
                                                    <th colspan="2">Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td width="60%">Hadir</td>
                                                    <td class="bg-info"></td>
                                                </tr>
                                                <tr>
                                                    <td>Sakit</td>
                                                   <td class="bg-success"></td>
                                                </tr>
                                                <tr>
                                                    <td>Izin</td>
                                                    <td class="bg-warning"></td>
                                                </tr>
                                                <tr>
                                                    <td>Tanpa Keterangan</td>
                                                    <td class="bg-danger"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-sm-8">
                                    </div>
                                </div>
                                <!-- END Table -->

                                
                            </div>
                        </div>
                    </div>
                    <!-- END Invoice -->
                </div>
                <!-- END Page Content -->

           

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
        <script src="<?php echo base_url('assets/js/oneui.core.min.js');?>"></script>

        <!--
            OneUI JS

            Custom functionality including Blocks/Layout API as well as other vital and optional helpers
            webpack is putting everything together at assets/_es6/main/app.js
        -->
        <script src="<?php echo base_url('assets/js/oneui.app.min.js');?>"></script>
        <script>
            window.print();
        </script>
    </body>
</html>
