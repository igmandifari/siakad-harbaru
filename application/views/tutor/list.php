<?php $this->load->view('head')?>
<?php $this->load->view('tutor/nav_list')?>

<!-- Main Container -->
<main id="main-container">



<!-- Page Content -->
<div class="content">
    <!-- Dynamic Table Full -->
    <div class="block">
        
        <div class="block-header block-header-default">
            <h3 class="block-title"><?=$title;?></h3>
            <div class="block-options">
                <a href="<?=base_url('tutor/tambah');?>">
                <button type="button" class="btn btn-sm btn-primary">
                    Tambah
                </button>
                </a>
                <button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#modal-cetak">
                    Cetak
                </button>
                <a href="<?=base_url();?>">
                    <button type="button" class="btn btn-sm btn-light">
                        Kembali
                    </button>
                </a>
            </div>
        </div>
   
        <div class="block-content">
            <p class="font-size-sm text-muted">
                Berikut ini adalah seluruh <?=$title;?>
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
            <div class="table-responsive">
            <table id="table" class="table table-bordered table-striped table-vcenter js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th class="text-center">Nomor Induk</th>
                                        <th>Nama Lengkap</th>
                                        <th class="d-none d-sm-table-cell" style="width: 15%;">Jenis Kelamin</th>
                                        <th class="d-none d-sm-table-cell" style="width: 30%;">TTL</th>
                                        <th style="width: 15%;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=0;foreach($tutors as $tutor):$no++?>
                                        <tr id="<?=$tutor->tutor_id;?>">
                                            <td><?=$no;?></td>
                                            <td><?=$tutor->tutor_nomor_induk;?>
                                            <td><?=$tutor->tutor_nama;?>
                                            <td><?=$tutor->tutor_jenis_kelamin;?>
                                            <td><?=$tutor->tutor_tempat_lahir.", ".date("d F Y",strtotime($tutor->tutor_tanggal_lahir));?></td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="<?=base_url('tutor/ubah/').$tutor->tutor_id;?>">
                                                        <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Ubah">
                                                            <i class="fa fa-fw fa-pencil-alt"></i>
                                                            Ubah
                                                        </button>
                                                    </a>
                                                    
                                                        <button type="button" class="hapus btn btn-sm btn-warning js-tooltip-enabled push mb-md-0" data-toggle="tooltip" title="" data-original-title="Hapus" data-id="<?=$tutor->tutor_id;?>">
                                                            <i class="fa fa-fw fa-times"></i>
                                                            Hapus
                                                        </button>
                                                    
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                            <div class="row push text-center">
                <a href="<?=base_url('dasbor');?>">
                    <button type="buttn" class="btn btn-light">Kembali Ke Dasbor</button>
                </a>
            </div>
        </div>

    </div>
    <!-- END Dynamic Table Full -->
        <div class="modal fade" id="modal-cetak" tabindex="-1" role="dialog" aria-labelledby="modal-block-fadein" style="display: none;" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Cetak <?=$title;?></h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content block-content-full font-size-sm">
                            <p>Silahkan pilih tipe file cetak yang kamu inginkan!</p>
                            <div class="text-center">
                                <a href="<?=base_url('tutor/cetak/xlsx');?>"  title="Klik Berikut Untuk Download tipe .xlsx">
                                    <button type="button" class="btn btn-rounded btn-success">
                                        <i class="far fa-file-excel"></i> Spreadsheet
                                    </button>
                                </a>
                                <a href="<?=base_url('tutor/cetak/pdf');?>"  title="Klik Berikut Untuk Download tipe .pdf">
                                    <button type="button" class="btn btn-rounded btn-danger">
                                        <i class="far fa-file-pdf"></i> PDF
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="block-content block-content-full text-right border-top">
                            <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal"><i class="fa fa-check mr-1"></i>Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<!-- END Page Content -->

</main>
<!-- END Main Container -->
<?php $this->load->view('foot')?>