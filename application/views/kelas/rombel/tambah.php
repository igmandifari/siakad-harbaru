<?php $this->load->view('head')?>
<?php $this->load->view('kelas/rombel/nav_tambah')?>

<!-- Main Container -->
<main id="main-container">

<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
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
            <h3 class="block-title">Data Kelas</h3>
        </div>
        <div class="block-content block-content-full">
                <div class="row push">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="tahunajaran_id">Tahun Ajaran</label>
                            <select class="custom-select" name="tahunajaran_id" id="tahunajaran_id">
                                <option value="0">Silahkan Pilih</option>
                                <?php foreach($tahunAjaranAll as $tahunajaran):?>
                                    <option value="<?=$tahunajaran->tahunajaran_id?>"><?=$tahunajaran->tahunajaran_nama?></option>
                                <?php endforeach;?>
                            </select>
                            <small class="form-text text-danger"><?= form_error('tahunajaran_id'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="kelas_id">Kelas</label>
                            <select class="custom-select" name="tahunajaran_id" id="tahunajaran_id">
                                <option value="0">Silahkan Pilih</option>
                                <?php foreach($kelasAll as $kelas):?>
                                    <option value="<?=$kelas->kelas_id?>"><?=$kelas->kelas_nama?></option>
                                <?php endforeach;?>
                            </select>
                            <small class="form-text text-danger"><?= form_error('kelas_id'); ?></small>
                        </div>
                        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th style="width: 15%;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($wargabelajarAll as $wargabelajar):?>
                                    <?php
                                        $no = 0;
                                        $no++;
                                    ?>
                                    <tr>
                                            <td><?=$wargabelajar->wargabelajar_nama;?>
                                            <td class="text-center">
                                            <div class="btn-group" role="group" aria-label="Horizontal Outline Success">
                                                <form action="<?php echo base_url('kelas/rombel_tambah/'.$wargabelajar->wargabelajar_id)?>" method="post">
                                                <input type="hidden" name="wargabelajar_id" value="<?=$wargabelajar->wargabelajar_id?>">
                                                    <button type="submit" class="btn btn-outline-success">Masukan</button>
                                                </form>
                                            </div>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>                        
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
        </div>
    </div>
    <!-- END Basic -->

</div>
<!-- END Page Content -->

</main>
<!-- END Main Container -->
<?php $this->load->view('foot')?>