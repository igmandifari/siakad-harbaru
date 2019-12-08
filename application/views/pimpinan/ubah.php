<?php $this->load->view('head')?>
<?php $this->load->view('tutor/nav_tambah')?>

<!-- Main Container -->
<main id="main-container">

<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item"><?=$actor;?></li>
                    <li class="breadcrumb-item"><?=$title;?></li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href=""><?=$tutor["tutor_nama"];?></a>
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
            <h3 class="block-title">Data Tutor</h3>
        </div>
        <div class="block-content block-content-full">
        <form action="<?php base_url("tutor/ubah")?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?=$tutor["tutor_id"];?>">
                <div class="row push">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="tutor_nama">Nama Lengkap</label>
                            <input type="text" class="form-control" id="tutor_nama" name="tutor_nama" value="<?=$tutor["tutor_nama"];?>">
                            <small class="form-text text-danger"><?= form_error('tutor_nama'); ?></small>
                        </div>
                        <div class="form-group">
                            <label>Foto</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input js-custom-file-input-enabled" data-toggle="custom-file-input" id="tutor_foto" name="tutor_foto">
                                <label class="custom-file-label" for="example-file-input-custom">Pilih foto:</label>
                            </div>
                            <input type="hidden" name="old_image" value="<?=$tutor["tutor_foto"]?>">
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