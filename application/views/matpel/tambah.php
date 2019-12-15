<?php $this->load->view('head')?>
<?php $this->load->view('matpel/nav_tambah')?>

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
        <div class="block-header">
            <h3 class="block-title">Data Mata Pelajaran</h3>
        </div>
        <div class="block-content block-content-full">
            <form action="<?=base_url('matpel/tambah');?>" method="POST" enctype="multipart/form-data">
                <div class="row push">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="matpel_nama">Nama Mata Pelajaran</label>
                            <input type="text" class="form-control" id="matpel_nama" name="matpel_nama" placeholder="Masukan Nama atau Kode Mata Pelajaran">
                            <small class="form-text text-danger"><?= form_error('matpel_nama'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="tutor_id">Jenis Pembelajaran</label>
                            <select class="custom-select" id="tipe_pembelajaran" name="tipe_pembelajaran">
                                        <option value="0">Silahkan Pilih Tutor</option>
                                        <option value="Tatap Muka">Tatap Muka</option>
                                        <option value="Mandiri">Mandiri</option>
                                        <option value="Tutorial">Tutorial</option>
                            </select>
                            <small class="form-text text-danger"><?= form_error('tipe_pembelajaran'); ?></small>
                        </div>   
                        <div class="form-group">
                            <label for="tutor_id">Nama Tutor</label>
                            <select class="custom-select" id="tutor_id" name="tutor_id">
                                        <option value="0">Silahkan Pilih Tutor</option>
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
        </div>
    </div>
    <!-- END Basic -->

</div>
<!-- END Page Content -->

</main>
<!-- END Main Container -->
<?php $this->load->view('foot')?>