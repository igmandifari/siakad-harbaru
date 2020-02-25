<?php $this->load->view('head')?>
<?php $this->load->view('matpel/nav_tambah')?>

<!-- Main Container -->
<main id="main-container">

<!-- Page Content -->
<div class="content">
    <!-- Basic -->
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title"><?=$title;?></h3>
            <div class="block-options">
                <a href="<?=base_url('matpel/tambah');?>">
                <button type="button" class="btn btn-sm btn-primary">
                    Tambah
                </button>
                </a>
                <a href="<?=base_url('matpel');?>">
                    <button type="button" class="btn btn-sm btn-light">
                        Kembali
                    </button>
                </a>
            </div>
        </div>
        <div class="block-content block-content-full">
            <p class="font-size-sm text-muted">
                Silahkan isi semua kolom untuk mengubah mata pelajaran <?=$matpel["matpel_nama"];?>
            </p>
            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success d-flex align-items-center" role="alert">
                    <div class="flex-00-auto">
                        <i class="fa fa-fw fa-check"></i>
                    </div>
                    <div class="flex-fill ml-3">
                        <p class="mb-0"><?php echo $this->session->flashdata('success'); ?></p>
                    </div>
                </div>
            <?php endif;?>
            <form action="<?php base_url('matpel/ubah');?>" method="post" enctype="multipart/form-data">
                <div class="row push">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="hidden" name="matpel_id" value="<?=$matpel["matpel_id"];?>"">
                            <label for="matpel_nama">Nama Mata Pelajaran</label>
                            <input type="text" class="form-control" id="matpel_nama" name="matpel_nama" value="<?=$matpel["matpel_nama"];?>" autofocus>
                            <small class="form-text text-danger"><?= form_error('matpel_nama'); ?></small>
                        </div> 
                        <div class="form-group">
                            <label for="tutor_id">Nama Tutor</label>
                            <select class="js-select2 form-control form-control-lg form-control-alt" id="tutor_id" name="tutor_id" data-placeholder="Silahkan Pilih Tutor">
                                <option></option>
                                        <?php foreach($tutors as $tutor) :?>
                                            <option value="<?=$tutor->tutor_id?>"<?php if($tutor->tutor_id == $matpel["tutor_id"]) echo "selected"?>><?=$tutor->tutor_nama?></option>
                                        <?php endforeach;?>
                            </select>
                            <small class="form-text text-danger"><?= form_error('tutor_id'); ?></small>
                        </div>                         
                    </div>
                </div>
                <div class="row push">
                    <div class="col-lg-4">

                    </div>
                    <div class="col-lg-4">
                        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" name="reset" class="btn btn-secondary">Hapus</button>
                    </div>
                    <div class="col-lg-4">
                        
                    </div>
                </div>
            </form>
            <div class="row push text-center">
                <a href="<?=base_url('matpel');?>">
                    <button type="buttn" class="btn btn-light">Kembali</button>
                </a>
            </div>
        </div>
    </div>
    <!-- END Basic -->

</div>
<!-- END Page Content -->

</main>
<!-- END Main Container -->
<?php $this->load->view('foot')?>