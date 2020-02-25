<?php $this->load->view('head')?>
<?php $this->load->view('admin/nav_tambah')?>

<!-- Main Container -->
<main id="main-container">

<!-- Page Content -->
<div class="content">
    <!-- Basic -->
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title"><?=$title;?></h3>
            <div class="block-options">
                <a href="<?=base_url('admin');?>">
                    <button type="button" class="btn btn-sm btn-light">
                        Kembali
                    </button>
                </a>
            </div>
        </div>
        <div class="block-content block-content-full">
            <p class="font-size-sm text-muted">
               Silahkan isi semua kolom untuk menambahkan data admin.
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
            <form action="<?php base_url("admin/tambah")?>" method="post" enctype="multipart/form-data">
                <div class="row push">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="admin_nama">Nama admin</label>
                            <input type="text" class="form-control" id="admin_nama" name="admin_nama" placeholder="Masukan Nama atau Kode admin">
                            <small class="form-text text-danger"><?= form_error('admin_nama'); ?></small>
                        </div> 
                        <div class="form-group">
                            <label for="admin_nama">Username</label>
                            <input type="text" class="form-control" id="admin_username" name="admin_username" placeholder="Masukan Nama Pengguna">
                            <small class="form-text text-danger"><?= form_error('admin_username'); ?></small>
                        </div> 
                        <div class="form-group">
                            <label for="admin_nama">Password</label>
                            <input type="password" class="form-control" id="admin_password" name="admin_password" placeholder="Masukan Password">
                            <small class="form-text text-danger"><?= form_error('admin_password'); ?></small>
                        </div> 
                        <div class="form-group">
                            <label>Foto</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input js-custom-file-input-enabled" data-toggle="custom-file-input" id="admin_foto" name="admin_foto">
                                <label class="custom-file-label" for="admin_foto">Pilih foto:</label>
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
            <div class="row push text-center">
                <a href="<?=base_url('admin');?>">
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