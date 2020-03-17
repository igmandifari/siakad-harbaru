<?php $this->load->view('head')?>
<?php $this->load->view('jadwal/nav_list')?>

            <!-- Main Container -->
            <main id="main-container">
            <!-- Page Content -->
                <div class="content">
                    <!-- Jadwal -->
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title"><?php echo "Rekap Presensi ".$kelas['kelas_nama']." Mata Pelajaran ".$kelas['matpel_nama'];?></h3>
                            <div class="block-options">

                                <a href="<?=base_url('dasbor/kelas/nilai/').$this->uri->segment(4);?>">
                                    <button type="button" class="btn btn-sm btn-secondary">
                                        Nilai
                                    </button>
                                </a>

                                <a href="<?=base_url('jadwal/matpel_lihat/').$this->uri->segment(5)?>">
                                    <button type="button" class="btn btn-sm btn-light">
                                        Kembali
                                    </button>
                                </a>
                            </div>
                        </div>
                      
                        
                        <div class="block-content block-content-full">
                            <div class="table-responsive">
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
                                                <td>: <?=$kelas["tutor_nama"];?></td>
                                            </tr>
                                        </tbody>
                                    </thead>
                                    <!-- <tbody>
                                    </tbody> -->
                                </table>
                            </div>
                            <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-vcenter">
                                    <thead class="text-center">
                                        <tr>
                                            <th rowspan="2" style="vertical-align:middle;width:8%;">NO</th>
                                            <th rowspan="2" style="vertical-align:middle;">Nama</th>
                                            <?php 
                                                $n = 5;
                                                $tanggal =$model->getDate($this->uri->segment(4));
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
                                            $alpa = $model->getAlpa($this->uri->segment(4),$wargabelajar->id);
                                            $izin = $model->getizin($this->uri->segment(4),$wargabelajar->id);
                                            $sakit =$model->getSakit($this->uri->segment(4),$wargabelajar->id);
                                            $hadir =$model->getHadir($this->uri->segment(4),$wargabelajar->id);
                                            $total =$model->countTotal($this->uri->segment(4),$wargabelajar->id);
                                            $no++;
                                        ?>
                                        
                                        <tr>
                                            <td class="text-center"><?php echo $no;?></td>
                                            <td><?php echo $wargabelajar->wargabelajar_nama.'<br>'.$wargabelajar->wargabelajar_nomor_induk;?></td>
                                            <td class="text-center"><?php echo $total['total'];?></td>
                                            <td class="text-center"><?php echo $hadir['hadir'];?></td>
                                            <td class="text-center"><?php echo $izin['izin'];?></td>
                                            <td class="text-center"><?php echo $sakit['sakit'];?></td>
                                            <td class="text-center"><?php echo $alpa['alpa'];?></td>
                                            <?php
                                                foreach($tanggal as $dt){
                                                    $keteranganPresensei = $model->getDetailBanget($dt->id,$wargabelajar->id);

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

                            
                                   

                           
                            <div class="col-sm-12 text-center">
                                <a href="<?=base_url('jadwal/matpel_lihat/').$this->uri->segment(5)?>">
                                    <button type="button" class="btn btn-primary js-click-ripple-enabled" data-toggle="click-ripple" style="overflow: hidden; position: relative; z-index: 1;"><span class="click-ripple animate" style="height: 87.2656px; width: 87.2656px; top: -21.625px; left: 31.375px;"></span>Kembali</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End Jadwal -->
                   
                </div>
                <!-- END Page Content -->

            </main>
            <!-- END Main Container -->
<?php $this->load->view('foot')?>