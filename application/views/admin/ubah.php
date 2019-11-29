<?php $this->load->view('head')?>
<?php $this->load->view('admin/nav_tambah')?>

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
                        <a class="link-fx" href=""><?=$admin["admin_nama"];?></a>
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
            <h3 class="block-title">Data admin</h3>
        </div>
        <div class="block-content block-content-full">
            <form action="<?=base_url('admin/ubah');?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" id="admin_id" name="admin_id" value="<?=$admin["admin_id"];?>">
                <div class="row push">
                    <div class="col-lg-12 col-xl-5">
                        <div class="form-group">
                            <label for="admin_nama">Nama Admin</label>
                            <input type="text" class="form-control" id="admin_nama" name="admin_nama" value="<?=$admin["admin_nama"];?>">
                            <small class="form-text text-danger"><?= form_error('admin_nama'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="admin_username" name="admin_username" value="<?=$admin["admin_username"];?>">
                            <small class="form-text text-danger"><?= form_error('username'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="admin_password" name="admin_password" placeholder="Masukan Password">
                            <small class="form-text text-danger"><?= form_error('password'); ?></small>
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
        </div>
    </div>
    <!-- END Basic -->

</div>
<!-- END Page Content -->

</main>
<!-- END Main Container -->
<?php $this->load->view('foot')?>