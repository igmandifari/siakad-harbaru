<?php $this->load->view('head')?>
<?php $this->load->view('kelas/nav_rombel')?>

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
            <a href="<?=base_url('kelas/tambah_rombel')?>">
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
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Tahun Ajaran</th>
                        <th>Kelas</th>
                        <th style="width: 15%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=0;foreach($SemuaRombel as $rombel):$no++;?>
                    <tr>
                        <td class="text-center"><?=$no?></td>
                        <td><?=$rombel->tahunajaran_nama;?>
                        <td><?=$rombel->kelas_nama;?>
                        <td class="text-center">
                            <div class="btn-group btn-group-sm" role="group" aria-label="Small Outline Primary">
                                <a href="<?=base_url('kelas/rombel_tambah/').$rombel->rombel_id;?>">
                                    <button type="button" class="btn btn-outline-secondary btn-sm">Masukan</button>
                                </a>
                                <a href="<?=base_url('kelas/rombel_lihat/').$rombel->rombel_id;?>">
                                    <button type="button" class="btn btn-outline-info btn-sm">Lihat</button>
                                </a>
                                <a href="<?=base_url('kelas/rombel_hapus/').$rombel->rombel_id;?>">
                                    <button type="button" class="btn btn-outline-warning btn-sm">Hapus</button>
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