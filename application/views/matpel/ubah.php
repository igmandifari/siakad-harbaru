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
        <div class="block-header">
            <h3 class="block-title">Data Mata Pelajaran</h3>
        </div>
        <div class="block-content block-content-full">
            <form action="<?php base_url('matpel/ubah');?>" method="post" enctype="multipart/form-data">
                <div class="row push">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="hidden" name="matpel_id" value="<?=$matpel["matpel_id"];?>"">
                            <label for="matpel_nama">Nama Kelas</label>
                            <input type="text" class="form-control" id="matpel_nama" name="matpel_nama" value="<?=$matpel["matpel_nama"];?>" autofocus>
                            <small class="form-text text-danger"><?= form_error('matpel_nama'); ?></small>
                        </div> 
                        <div class="form-group">
                            <label for="tutor_id">Nama Tutor</label>
                            <select class="custom-select" id="tutor_id" name="tutor_id">
                                        <option value="0">Silahkan Pilih Tutor</option>
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
        </div>
    </div>
    <!-- END Basic -->

</div>
<!-- END Page Content -->

</main>
<!-- END Main Container -->
<?php $this->load->view('foot')?>