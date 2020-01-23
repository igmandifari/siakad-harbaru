<?php $this->load->view('head')?>
<?php $this->load->view('jadwal/nav_list')?>

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
    <!-- Dynamic Table Full -->
    <div class="block">
        <div class="block-header">
            <a href="<?=base_url('jadwal/matpel_tambah/').$this->uri->segment('3');?>">
                <button type="button" class="btn btn-success mr-1 mb-3">
                    <i class="fa fa-fw fa-plus mr-1"></i> Tambah Data
                </button>
            </a>
        </div>
        <div class="block-content block-content-full">
        <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success d-flex align-items-center" role="alert">
            <div class="flex-00-auto">
                <i class="fa fa-fw fa-check"></i>
            </div>
            <div class="flex-fill ml-3">
                <p class="mb-0"><?php echo $this->session->flashdata('success'); ?></p>
            </div>
        </div>
        <?php elseif ($this->session->flashdata('failed')): ?>
        <div class="alert alert-danger d-flex align-items-center justify-content-between" role="alert">
            <div class="flex-00-auto">
                <i class="fa fa-fw fa-check"></i>
            </div>
            <div class="flex-fill ml-3">
                <p class="mb-0"><?php echo $this->session->flashdata('failed'); ?></p>
            </div>
        </div>
        <?php endif;?>
            <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full table-responsive">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Tipe Pembelajaran</th>
                                        <th>Hari</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Kelas</th>
                                        <th>Tutor</th>
                                        <th>Waktu</th>
                                        <th style="width: 15%;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=0; foreach($jadwals as $jadwal):$no++?>
                                        <tr>
                                            <td><?=$no;?></td>
                                            <td><?=$jadwal->jadwal_tipe_pembelajaran?></td>
                                            <td><?=$jadwal->jadwal_hari;?>
                                            <td><?=$jadwal->matpel_nama;?>
                                            <td><?=$jadwal->kelas_nama;?>
                                            <td><?=$jadwal->tutor_nama;?>
                                            <td><?=$jadwal->jadwal_waktu;?></td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="<?=base_url('jadwal/ubah/').$jadwal->tahunajaran_id.'/'.$jadwal->jadwal_id;?>">
                                                        <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Ubah">
                                                            <i class="fa fa-fw fa-pencil-alt"></i>
                                                            Ubah
                                                        </button>
                                                    </a>
                                                    <a href="<?=base_url('jadwal/hapus/').$jadwal->jadwal_id;?>">
                                                        <button type="button" class="btn btn-sm btn-warning js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Hapus">
                                                            <i class="fa fa-fw fa-times"></i>
                                                            Hapus
                                                        </button>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                            <div class="row push text-center">
                <a href="<?=base_url('jadwal');?>">
                    <button type="buttn" class="btn btn-light">Kembali</button>
                </a>
            </div>
        </div>
    </div>
    <!-- END Dynamic Table Full -->

</div>
<!-- END Page Content -->

</main>
<!-- END Main Container -->
<?php $this->load->view('foot')?>