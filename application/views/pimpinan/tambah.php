<?php $this->load->view('head')?>
<?php $this->load->view('pimpinan/nav_tambah')?>

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
            <h3 class="block-title">Data pimpinan</h3>
        </div>
        <div class="block-content block-content-full">
            <form action="<?=base_url('pimpinan/tambah');?>" method="POST" enctype="multipart/form-data">
                <div class="row push">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="pimpinan_nama">Nama Lengkap</label>
                            <input type="text" class="form-control" id="pimpinan_nama" name="pimpinan_nama" placeholder="Masukan Nama Lengkap">
                            <small class="form-text text-danger"><?= form_error('pimpinan_nama'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="pimpinan_nama">Nama Pengguna</label>
                            <input type="text" class="form-control" id="pimpinan_username" name="pimpinan_username" placeholder="Masukan Nama Pengguna">
                            <small class="form-text text-danger"><?= form_error('pimpinan_username'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="pimpinan_nama">Password</label>
                            <input type="password" class="form-control" id="pimpinan_password" name="pimpinan_password" placeholder="Masukan Nama Lengkap">
                            <small class="form-text text-danger"><?= form_error('pimpinan_password'); ?></small>
                        </div>

                        <div class="form-group">
                            <label>Foto</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input js-custom-file-input-enabled" data-toggle="custom-file-input" id="pimpinan_foto" name="pimpinan_foto">
                                <label class="custom-file-label" for="example-file-input-custom">Pilih foto:</label>
                            </div>
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