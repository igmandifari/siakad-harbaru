<?php $this->load->view('head')?>
<?php $this->load->view('jadwal/nav_list')?>
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
<?php $this->load->view('foot')?>