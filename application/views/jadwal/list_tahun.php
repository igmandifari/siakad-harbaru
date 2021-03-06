<?php $this->load->view('head')?>
<?php $this->load->view('jadwal/nav_list')?>

<!-- Main Container -->
<main id="main-container">


<!-- Page Content -->
<div class="content">
    <!-- Dynamic Table Full -->
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title"><?=$title;?></h3>
            <div class="block-options">
                <a href="<?=base_url();?>">
                    <button type="button" class="btn btn-sm btn-light">
                        Kembali
                    </button>
                </a>
            </div>
        </div>
        <div class="block-content block-content-full">
            <p class="font-size-sm text-muted">
                Berikut ini adalah seluruh <?=$title;?> berdasarkan tahun ajaran
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
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                            <tr class="text-center">
                            <th>NO</th>
                            <th>Tahun Ajaran</th>
                            <th style="width: 15%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=0; foreach($tahuns as $tahun):$no++?>
                            <tr id="<?=$tahun->tahunajaran_id;?>">
                                <td><?=$no;?></td>
                                <td><?=$tahun->tahunajaran_nama?></td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Small Outline Primary">
                                        <a href="<?=base_url('jadwal/matpel_tambah/').$tahun->tahunajaran_id?>">
                                            <button type="button" class="btn btn-outline-secondary btn-sm">Masukan</button>
                                        </a>
                                        <a href="<?=base_url('jadwal/matpel_lihat/').$tahun->tahunajaran_id?>">
                                            <button type="button" class="btn btn-outline-info btn-sm">Lihat</button>
                                        </a>
                                        
                                            <button type="button" class="btn btn-outline-warning btn-sm hapus-jadwal">Hapus</button>
                                        
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            <div class="row push text-center">
                <a href="<?=base_url('dasbor').$this->uri->segment(3);?>">
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
                                <a href="<?=base_url('jadwal/cetak/xlsx');?>" title="Klik Berikut Untuk Download tipe .xlsx">
                                    <button type="button" class="btn btn-rounded btn-success">
                                        <i class="far fa-file-excel"></i> Spreadsheet
                                    </button>
                                </a>
                            <a href="<?=base_url('jadwal/cetak/pdf');?>" title="Klik Berikut Untuk Download tipe .pdf">
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