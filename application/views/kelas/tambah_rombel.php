<?php $this->load->view('head')?>
<?php $this->load->view('kelas/nav_tambah')?>

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
            <h3 class="block-title">Data Kelas</h3>
        </div>
        <div class="block-content block-content-full">
            <form action="<?=base_url('kelas/tambah_rombel');?>" method="post">
                <div class="row push">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <select class="js-select2 form-control" id="tahunajaran_id" name="tahunajaran_id" style="width: 100%;" data-placeholder="Silahkan pilih tahun ajaran">
                                <option value=""></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                    <?php foreach($getTahun as $tahunajaran):?>
                                        <option value="<?=$tahunajaran->tahunajaran_id?>"><?=$tahunajaran->tahunajaran_nama?></option>
                                    <?php endforeach;?>
                            </select>
                            <small class="form-text text-danger"><?= form_error('tahunajaran_id'); ?></small>
                        </div>
                        <div class="form-group">
                            <select class="js-select2 form-control" id="kelas_id" name="kelas_id" style="width: 100%;" data-placeholder="Silahkan pilih tahun kelas">
                                <option value=""></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                    <?php foreach($getKelas as $kelas):?>
                                        <option value="<?=$kelas->kelas_id?>"><?=$kelas->kelas_nama?></option>
                                    <?php endforeach;?>
                            </select>
                            <small class="form-text text-danger"><?= form_error('kelas_id'); ?></small>
                        </div>                    
                    </div>
                </div>
                <div class="form-group text-center">
                    <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                    <button type="reset" name="reset" class="btn btn-secondary">Hapus</button>
                </div>
            </form>
            <div class="row push text-center">
                <a href="<?=base_url('kelas/rombel');?>">
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