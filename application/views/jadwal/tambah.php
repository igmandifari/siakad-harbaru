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
 
                        <div class="block">
                            <div class="block-header block-header-default">
                                <h3 class="block-title"><?=$title;?></h3>
                                <div class="block-options">
                                    <a href="<?=base_url('jadwal');?>">
                                        <button type="button" class="btn btn-sm btn-light">
                                            Kembali
                                        </button>
                                    </a>
                                </div>
                            </div>
                            <div class="block-content block-content-full">
                                <p class="font-size-sm text-muted">
                                    Silahkan isi semua kolom untuk <?=$title.' '.$tahun['tahunajaran_nama'];?>.
                                    Pilih antara tatap muka atau tutorial dan mandiri.
                                </p>
                                <?php if ($this->session->flashdata('failed')): ?>
                                    <div class="alert alert-danger d-flex align-items-center" role="alert">
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
                                        <form action="<?php echo base_url('jadwal/matpel_tambah/').$this->uri->segment(3);?>" method="post">
                                            <div class="form-group">
                                                <label for="jadwal_hari">Hari</label>
                                                <select class="js-select2 form-control form-control-lg form-control-alt" id="jadwal_hari" name="jadwal_hari" data-placeholder="Silahkan Pilih Hari">
                                                    <option></option>
                                                    <option value="Jum'at">Jum'at</option>
                                                    <option value="Sabtu">Sabtu</option>
                                                    <option value="Minggu">Minggu</option>
                                                </select>
                                                <small class="form-text text-danger"><?= form_error('jadwal_hari'); ?></small>
                                            </div> 
                                            <div class="form-group">
                                                <label for="jadwal_waktu">Waktu</label>
                                                <select class="js-select2 form-control form-control-lg form-control-alt" id="jadwal_waktu" name="jadwal_waktu" data-placeholder="Silahkan Pilih Waktu">
                                                    <option></option>
                                                    <option value="13:00-14:00">13:00-14:00</option>
                                                    <option value="14:00-15:00">14:00-15:00</option>
                                                    <option value="16:00-17:00">16:00-17:00</option>
                                                </select>
                                                <small class="form-text text-danger"><?= form_error('jadwal_waktu'); ?></small>
                                            </div> 
                                            <div class="form-group">
                                                <label for="matpel_id">Mata Pelajaran</label>
                                                <select class="js-select2 form-control form-control-lg form-control-alt" id="matpel_id" name="matpel_id" data-placeholder="Silahkan Pilih Mata Pelajaran">
                                                    <option></option>
                                                    <?php foreach($matpel_all as $matpel ):?>
                                                        <option value="<?=$matpel->matpel_id?>"><?=$matpel->matpel_nama?></option>
                                                    <?php endforeach;?>
                                                </select>
                                                <small class="form-text text-danger"><?= form_error('matpel_id'); ?></small>
                                            </div>
                                            <div class="form-group">
                                                <label for="tutor_id">Tutor</label>
                                                <select class="js-select2 form-control form-control-lg form-control-alt" id="tutor_id" name="tutor_id" data-placeholder="Silahkan Pilih Tutor">
                                                    <option></option>
                                                    <?php foreach($tutors as $tutor ):?>
                                                        <option value="<?=$tutor->tutor_id?>"><?=$tutor->tutor_nama?></option>
                                                    <?php endforeach;?>
                                                </select>
                                                <small class="form-text text-danger"><?= form_error('tutor_id'); ?></small>
                                            </div> 
                                            <div class="form-group">
                                                <label for="rombel_id">Kelas</label>
                                                <select class="js-select2 form-control form-control-lg form-control-alt" id="rombel_id" name="rombel_id" data-placeholder="Silahkan Pilih Kelas">
                                                    <option></option>
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
                                        <div class="text-left">
                                            <a href="<?=base_url('jadwal/matpel_lihat/').$this->uri->segment(3);?>">
                                                <button type="button" class="btn btn-light">Kembali</button>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade fade-right show" id="tutorial-mandiri" role="tabpanel">
                                        <form action="<?php echo base_url('jadwal/tambah_tutorial_mandiri/'.$this->uri->segment(3))?>" method="post">
                                            <div class="form-group">
                                                <label for="jadwal_tipe_pembelajaran">Tipe Pembelajaran</label>
                                                <select class="js-select2 form-control form-control-lg form-control-alt" id="jadwal_tipe_pembelajaran" name="jadwal_tipe_pembelajaran" data-placeholder="Silahkan Pilih Tipe Pembelajaran">
                                                    <option></option>
                                                    <option value="Tutorial">Tutorial</option>
                                                    <option value="Mandiri">Mandiri</option>
                                                </select>
                                                <small class="form-text text-danger"><?= form_error('jadwal_tipe_pembelajaran'); ?></small>
                                            </div>
                                            <div class="form-group">
                                                <label for="matpel_id_other">Mata Pelajaran</label>
                                                <select class="js-select2 form-control form-control-lg form-control-alt" id="matpel_id_other" name="matpel_id_other" data-placeholder="Silahkan Pilih Mata Pelajaran">
                                                    <option></option>
                                                    <?php foreach($matpel_all as $matpel ):?>
                                                        <option value="<?=$matpel->matpel_id?>"><?=$matpel->matpel_nama?></option>
                                                    <?php endforeach;?>
                                                </select>
                                                <small class="form-text text-danger"><?= form_error('matpel_id_other'); ?></small>
                                            </div>
                                            <div class="form-group">
                                                <label for="tutor_id_other">Tutor</label>
                                                <select class="js-select2 form-control form-control-lg form-control-alt" id="tutor_id_other" name="tutor_id_other" data-placeholder="Silahkan Pilih Tutor">
                                                    <option></option>
                                                    <?php foreach($tutors as $tutor ):?>
                                                        <option value="<?=$tutor->tutor_id?>"><?=$tutor->tutor_nama?></option>
                                                    <?php endforeach;?>
                                                </select>
                                                <small class="form-text text-danger"><?= form_error('tutor_id_other'); ?></small>
                                            </div>  
                                            <div class="form-group">
                                                <label for="rombel_id_other">Kelas</label>
                                                <select class="js-select2 form-control form-control-lg form-control-alt" id="rombel_id_other" name="rombel_id_other" data-placeholder="Silahkan Pilih Kelas">
                                                    <option></option>
                                                    <?php foreach($kelas_all as $kelas ):?>
                                                        <option value="<?=$kelas->rombel_id?>"><?=$kelas->kelas_nama?></option>
                                                    <?php endforeach;?>
                                                </select>
                                                <small class="form-text text-danger"><?= form_error('rombel_id_other'); ?></small>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                                                <button type="reset" name="reset" class="btn btn-secondary">Hapus</button>
                                            </div>
                                        </form>
                                        <div class="text-left">
                                            <a href="<?=base_url('jadwal/matpel_lihat/').$this->uri->segment(3);?>">
                                                <button type="buttn" class="btn btn-light">Kembali</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<!-- END Page Content -->

</main>
<!-- END Main Container -->
<?php $this->load->view('foot')?>