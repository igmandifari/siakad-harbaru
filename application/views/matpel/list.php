<?php $this->load->view('head')?>
<?php $this->load->view('matpel/nav_list')?>

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
            <a href="<?=base_url('matpel/tambah');?>">
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
        <?php endif;?>
            <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama Mata Pelajaran</th>
                        <th>Nama Tutor</th>
                        <th style="width: 15%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no=0; foreach($matpels as $matpel):$no++?>
                    <tr>
                        <td><?=$no;?></td>
                        <td><?=$matpel->matpel_nama;?>
                        <td><?=$matpel->tutor_nama;?>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="<?=base_url('matpel/ubah/').$matpel->matpel_id;?>">
                                    <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Ubah">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                        Ubah
                                    </button>
                                </a>
                                <a href="<?=base_url('matpel/hapus/').$matpel->matpel_id;?>">
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
                <a href="<?=base_url('dasbor');?>">
                    <button type="buttn" class="btn btn-light">Kembali Ke Dasbor</button>
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