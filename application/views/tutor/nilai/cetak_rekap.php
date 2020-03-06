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
                                                <th colspan="2" class="text-center"><strong>Rekap Nilai</strong></th>
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
                                                $idnilai = $model->getIDNIilai($this->uri->segment(3),$id,$this->uri->segment(4));

                                                

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
                                                    <a href="<?php echo base_url('nilai/matpel/').$this->uri->segment(3).'/'.$wargabelajar["wargabelajar_id"];?>" target="_blank" title="Masukan Nilai">
                                                        <?php echo $wargabelajar["wargabelajar_nama"]."<br>".$wargabelajar["wargabelajar_nomor_induk"];?>
                                                    </a>
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
