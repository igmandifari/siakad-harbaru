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
                                                <th colspan="2" class="text-center">Rekap Nilai</th>
                                            </tr>
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
                                                    <td>Semester</td>
                                                    <td>: <?=ucfirst($this->uri->segment(4))?></td>
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
                                </div>
                           
                                <div class="table-responsive push">
                                      <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                                        <thead class="text-center">
                                            <tr>
                                                <th rowspan="2" style="vertical-align:middle;">NO</th>
                                                <th rowspan="2" style="vertical-align:middle;">Nama</th>
                                                <th colspan="4">Total</th>
                                                <th colspan="4">Nilai</th>
                                                <th rowspan="2" style="vertical-align:middle;">Total</th>
                                                <th rowspan="2" style="vertical-align:middle;">Rata-Rata</th>
                                                <th rowspan="2" style="vertical-align:middle;">Keterangan</th>
                                            </tr>
                                            <tr>
                                                <th width="5%">Harian</th>
                                                <th width="5%">Tugas</th>
                                                <th width="5%">UTS</th>
                                                <th width="5%">UAS</th>
                                                <th width="5%">Harian</th>
                                                <th width="5%">Tugas</th>
                                                <th width="5%">UTS</th>
                                                <th width="5%">UAS</th>
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
                                                    $idnilai = $model->getIDNIilai($this->uri->segment(3),$id,$this->uri->segment(4));

                                                    

                                                    $nilai = $idnilai["nilai_id"];

                                                    $CountUTS = $model->countUts($nilai);
                                                    $CountUAS = $model->countUas($nilai);
                                                    $CountTugas = $model->countTugas($nilai);
                                                    $CountHarian = $model->countHarian($nilai);

                                                    $sumUTS = $model->sumUts($nilai);
                                                    $sumUAS = $model->sumUas($nilai);
                                                    $sumTugas = $model->sumTugas($nilai);
                                                    $sumHarian = $model->sumHarian($nilai);

                                                    $total = $sumUTS['uts']+$sumUAS['uas']+$sumTugas['tugas']+$sumHarian['harian'];
                                                    $average = ($total / 4);
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
                                                    <td class="text-center" style="vertical-align:middle;"><?php echo $CountUTS['uts'];?></td>
                                                    <td class="text-center" style="vertical-align:middle;"><?php echo $CountUAS['uas'];?></td>
                                                    <td class="text-center" style="vertical-align:middle;"><?php echo number_format($sumHarian['harian'],2);?></td>
                                                    <td class="text-center" style="vertical-align:middle;"><?php echo number_format($sumTugas['tugas'],2);?></td>
                                                    <td class="text-center" style="vertical-align:middle;"><?php echo number_format($sumUTS['uts'],2);?></td>
                                                    <td class="text-center" style="vertical-align:middle;"><?php echo number_format($sumUAS['uas'],2);?></td>
                                                    <td class="text-center" style="vertical-align:middle;"><?php echo number_format($total,2);?></td>
                                                    <td class="text-center" style="vertical-align:middle;"><?php echo number_format($average,2);?></td>
                                                    <td class="text-center" style="vertical-align:middle;"><?php echo $status;?></td>
                                                </tr>
                                            <?php } 
                                                $avgOfTotal=$sumTotal/$no;
                                                $avgOfavg=$sumAverage/$no;
                                            ?>
                                            <tr>
                                                <th colspan="10">Total</th>
                                                <td class="text-center"><?php echo number_format($sumTotal,2);?></td>
                                                <td class="text-center"><?php echo number_format($sumAverage,2);?></td>
                                                <td class="text-center"></td>
                                            </tr>
                                            <tr>
                                                <th colspan="10">Rata-Rata</th>
                                                <td class="text-center"><?php echo number_format($avgOfTotal,2);?></td>
                                                <td class="text-center"><?php echo number_format($avgOfavg,2);?></td>
                                                <td class="text-center"></td>
                                            </tr>
                                            
                                        </tbody>
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
