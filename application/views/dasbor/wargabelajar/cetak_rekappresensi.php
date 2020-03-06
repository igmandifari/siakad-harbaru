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
                                	<p class="h3 text-center"><strong>Data Presensi</strong></p>
                                    
                                    <table>
                                        <tr>
                                            <td><strong>Nomor Induk</strong></td>
                                            <td><strong>: <?php echo $this->session->userdata('induk');?></strong></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nama</td>
                                            <td><strong>: <?php echo $this->session->userdata('nama');?></strong></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tahun Ajaran</strong></td>
                                            <td><strong>: <?php echo $this->session->userdata('tahunajaran_nama');?></strong></td>
                                        </tr>
                                    </table>

                                    <table class="table table-bordered table-striped table-vcenter">
                                        <thead class="text-center">
                                            <tr>
                                                <th style="vertical-align: middle;" rowspan="2">NO</th>
                                                <th style="vertical-align: middle;" rowspan="2">Mata Pelajaran</th>
                                                <th colspan="5">Keterangan</th>
                                            </tr>
                                            <tr>
                                                <th>H</th>
                                                <th>S</th>
                                                <th>I</th>
                                                <th>A</th>
                                                <th>Pertemuan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $no=0;
                                                $alpa=0;
                                                $hadir=0;
                                                $izin=0;
                                                $sakit=0;
                                                $pertemuan=0;

                                                $sumalpa=0;
                                                $sumhadir=0;
                                                $sumizin=0;
                                                $sumsakit=0;
                                                $sumpertemuan=0;

                                                foreach($jadwals as $jadwal){
                                                $no++;
                                               
                                                $presensi = $model->getPresensi($jadwal['jadwal_id']);
                                                    foreach($presensi as $prs){
                                                        
                                                       $Countalpa = $model->getAlpa($wb_id,$prs['presensi_id']);
                                                       $Counthadir = $model->getHadir($wb_id,$prs['presensi_id']);
                                                       $Countizin = $model->getIzin($wb_id,$prs['presensi_id']);
                                                       $Countsakit = $model->getSakit($wb_id,$prs['presensi_id']);
                                                       $Countpertemuan = $model->getPertemuan($jadwal['jadwal_id']);


                                                    $alpa+=$Countalpa['alpa'];
                                                    $hadir+=$Counthadir['hadir'];
                                                    $izin+=$Countizin['izin'];
                                                    $sakit+=$Countsakit['sakit'];
                                                    $pertemuan=+$Countpertemuan['pertemuan'];
                                                    
                                                    }
                                                   $sumalpa+=$alpa;
                                                   $sumhadir+=$hadir;
                                                   $sumizin+=$izin;
                                                   $sumsakit+=$sakit;
                                                   $sumpertemuan+=$pertemuan;
                                                   
                                                ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $no;?></td>
                                                    <td><?php echo $jadwal['matpel_nama'];?></td>
                                                    <td class="text-center"><?php echo $hadir;?></td>
                                                    <td class="text-center"><?php echo $sakit;?></td>
                                                    <td class="text-center"><?php echo $izin;?></td>
                                                    <td class="text-center"><?php echo $alpa;?></td>
                                                    <td class="text-center"><?php echo $pertemuan;?></td>
                                                </tr>
                                            <?php 
                                                $alpa=0;
                                                $hadir=0;
                                                $izin=0;
                                                $sakit=0;
                                                $pertemuan=0; };?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="2" class="text-center">Total</th>
                                                <th class="text-center"><?=$sumhadir;?></th>
                                                <th class="text-center"><?=$sumsakit;?></th>
                                                <th class="text-center"><?=$sumizin;?></th>
                                                <th class="text-center"><?=$sumalpa;?></th>
                                                <th class="text-center"><?=$sumpertemuan;?></th>
                                            </tr>
                                        </tfoot>
									</table>
								</div>
                                <!-- END Table -->

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