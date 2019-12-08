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
                    <li class="breadcrumb-item"><?=$title;?></li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href=""><?=$pimpinan["pimpinan_nama"];?></a>
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
                <div class="row push">
                    <div class="col-12">
                        <div class="block">
                            <ul class="nav nav-tabs nav-tabs-block" data-toggle="tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#btabs-animated-slideright-home">Data Pimpinan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#btabs-animated-slideright-profile">Ubah Password</a>
                                </li>
                            </ul>
                            <div class="block-content tab-content overflow-hidden">
                                <div class="tab-pane fade fade-right show active" id="btabs-animated-slideright-home" role="tabpanel">
                                    <form action="<?php base_url("pimpinan/ubah") ?>" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="pimpinan_id" value="<?= $pimpinan["pimpinan_id"]; ?>">
                                        <div class="form-group">
                                            <label for="pimpinan_nama">Nama Pimpinan</label>
                                            <input type="text" class="form-control" id="pimpinan_nama" name="pimpinan_nama" value="<?=$pimpinan["pimpinan_nama"];?>">
                                            <small class="form-text text-danger"><?= form_error('pimpinan_nama'); ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" id="pimpinan_username" name="pimpinan_username" value="<?=$pimpinan["pimpinan_username"];?>">
                                            <small class="form-text text-danger"><?= form_error('pimpinan_username'); ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label>Foto</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input js-custom-file-input-enabled" data-toggle="custom-file-input" id="pimpinan_foto" name="pimpinan_foto">
                                                <label class="custom-file-label" for="pimpinan_foto">Pilih foto:</label>
                                                <input type="hidden" name="old_image" value="<?php echo $pimpinan["pimpinan_foto"] ?>" />
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
                                    <div class="tab-pane fade fade-right" id="btabs-animated-slideright-profile" role="tabpanel">
                                    <form action="<?php echo base_url("pimpinan/ubah_password") ?>" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="pimpinan_id" value="<?= $pimpinan["pimpinan_id"]; ?>">
                                        <div class="form-group">
                                            <label for="password">Password Baru</label>
                                            <input type="password" class="form-control" id="pimpinan_password" name="pimpinan_password" placeholder="Masukan Password Baru">
                                            <small class="form-text text-danger"><?= form_error('pimpinan_password'); ?></small>
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
                            </div>
                        </div>
                        
                    </div>
    </div>
</div
<!-- END Page Content -->

</main>
<!-- END Main Container -->
<?php $this->load->view('foot')?>