<?php $this->load->view('head')?>
<?php $this->load->view('jadwal/nav_tambah')?>

<!-- Main Container -->
<main id="main-container">

<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item"><?=$actor;?></li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href=""><?=$title;?></a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content">
    <!-- Basic -->
    <div class="block">
        <div class="row push">
            <div class="col-12">
                <div class="block">
                <?php if ($this->session->flashdata('failed')): ?>
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <div class="flex-00-auto">
                            <i class="fa fa-fw fa-check"></i>
                        </div>
                        <div class="flex-fill ml-3">
                            <p class="mb-0"><?php echo $this->session->flashdata('failed'); ?></p>
                        </div>
                    </div>
                <?php endif;?>
                    <ul class="nav nav-tabs nav-tabs-block" data-toggle="tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#tatap-muka">Tatap Muka</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tutorial-mandiri">Tutorial dan Mandiri</a>
                        </li>
                    </ul>

                    <div class="block-content tab-content overflow-hidden">
                        <div class="tab-pane fade fade-left show active" id="tatap-muka" role="tabpanel">
                            <form action="<?php base_url('jadwal/matpel_tambah')?>" method="post">
                                <div class="form-group">
                                    <label for="jadwal_hari">Hari</label>
                                    <select class="custom-select" id="jadwal_hari" name="jadwal_hari">
                                        <option value="0">Silahkan Pilih</option>
                                        <option value="Jum'at">Jum'at</option>
                                        <option value="Sabtu">Sabtu</option>
                                        <option value="Minggu">Minggu</option>
                                    </select>
                                    <small class="form-text text-danger"><?= form_error('jadwal_hari'); ?></small>
                                </div> 
                                <div class="form-group">
                                    <label for="jadwal_waktu">Waktu</label>
                                    <select class="custom-select" id="jadwal_waktu" name="jadwal_waktu">
                                        <option value="0">Silahkan Pilih</option>
                                        <option value="13:00-14:00">13:00-14:00</option>
                                        <option value="14:00-15:00">14:00-15:00</option>
                                        <option value="16:00-17:00">16:00-17:00</option>
                                    </select>
                                    <small class="form-text text-danger"><?= form_error('jadwal_waktu'); ?></small>
                                </div> 
                                <div class="form-group">
                                    <label for="matpel_id">Mata Pelajaran</label>
                                    <select class="custom-select" id="matpel_id" name="matpel_id">
                                        <option value="0">Silahkan Pilih</option>
                                        <?php foreach($matpel_all as $matpel ):?>
                                            <option value="<?=$matpel->matpel_id?>"><?=$matpel->matpel_nama?></option>
                                        <?php endforeach;?>
                                    </select>
                                    <small class="form-text text-danger"><?= form_error('matpel_id'); ?></small>
                                </div> 
                                <div class="form-group">
                                    <label for="kelas_id">Kelas</label>
                                    <select class="custom-select" id="rombel_id" name="rombel_id">
                                        <option value="0">Silahkan Pilih</option>
                                        <?php foreach($kelas_all as $kelas ):?>
                                            <option value="<?=$kelas->rombel_id?>"><?=$kelas->kelas_nama?></option>
                                        <?php endforeach;?>
                                    </select>
                                    <small class="form-text text-danger"><?= form_error('rombel_id'); ?></small>
                                </div>
                                

                                    <div class="text-center">
                                        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                                        <button type="reset" name="reset" class="btn btn-secondary">Hapus</button>
                                    </div>
                              
                                
                            </form>
                        </div>
                        <div class="tab-pane fade fade-right show" id="tutorial-mandiri" role="tabpanel">
                            <form action="<?php echo base_url('jadwal/tambah_tutorial_mandiri')?>" method="post">
                            <input type="hidden" name="tahunajaran_id" value="<?=$this->uri->segment('3')?>">
                                <div class="form-group">
                                    <label for="jadwal_tipe_pembelajaran">Tipe Pembelajaran</label>
                                    <select class="custom-select" id="jadwal_tipe_pembelajaran" name="jadwal_tipe_pembelajaran">
                                        <option value="0">Silahkan Pilih</option>
                                        <option value="Tutorial">Tutorial</option>
                                        <option value="Mandiri">Mandiri</option>
                                    </select>
                                    <small class="form-text text-danger"><?= form_error('jadwal_tipe_pembelajaran'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="matpel_id">Mata Pelajaran</label>
                                    <select class="custom-select" id="matpel_id" name="matpel_id">
                                        <option value="0">Silahkan Pilih</option>
                                        <?php foreach($matpel_all as $matpel ):?>
                                            <option value="<?=$matpel->matpel_id?>"><?=$matpel->matpel_nama?></option>
                                        <?php endforeach;?>
                                    </select>
                                    <small class="form-text text-danger"><?= form_error('matpel_id'); ?></small>
                                </div> 
                                <div class="form-group">
                                    <label for="kelas_id">Kelas</label>
                                    <select class="custom-select" id="rombel_id" name="rombel_id">
                                        <option value="0">Silahkan Pilih</option>
                                        <?php foreach($kelas_all as $kelas ):?>
                                            <option value="<?=$kelas->rombel_id?>"><?=$kelas->kelas_nama?></option>
                                        <?php endforeach;?>
                                    </select>
                                    <small class="form-text text-danger"><?= form_error('rombel_id'); ?></small>
                                </div>
                                
                                
                                    <div class="text-center">
                                        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                                        <button type="reset" name="reset" class="btn btn-secondary">Hapus</button>
                                    </div>
                              
                                
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Basic -->

</div>
<!-- END Page Content -->

</main>
<!-- END Main Container -->
<?php $this->load->view('foot')?>