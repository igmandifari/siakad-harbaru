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
                <a href="<?=base_url('matpel');?>">
                    <button type="button" class="btn btn-sm btn-light">
                        Kembali
                    </button>
                </a>
            </div>
        </div>
        <div class="block-content block-content-full">
            <p class="font-size-sm text-muted">
                Silahkan isi semua kolom untuk menambahkan mata pelajaran
            </p>
            <form action="<?=base_url('matpel/tambah');?>" method="POST" enctype="multipart/form-data">
                <div class="row push">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="matpel_nama">Nama Mata Pelajaran</label>
                            <input type="text" class="form-control" id="matpel_nama" name="matpel_nama" placeholder="Masukan Nama atau Kode Mata Pelajaran">
                            <small class="form-text text-danger"><?= form_error('matpel_nama'); ?></small>
                        </div>  
                        <div class="form-group">
                            <label for="tutor_id">Nama Tutor</label>
                            <select class="js-select2 form-control form-control-lg form-control-alt" id="tutor_id" name="tutor_id" data-placeholder="Silahkan Pilih Tutor">
                                <option></option>
                                        <?php foreach($tutors as $tutor) :?>
                                            <option value="<?=$tutor->tutor_id?>"><?=$tutor->tutor_nama?></option>
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