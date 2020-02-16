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
        <div class="block-header block-header-default">
            <h3 class="block-title"><?=$title;?></h3>
            <div class="block-options">
                <a href="<?=base_url('kelas/rombel_tambah/').$this->uri->segment(3);?>">
                <button type="button" class="btn btn-sm btn-primary">
                    Tambah
                </button>
                </a>
                <button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#modal-cetak">
                    Cetak
                </button>
                <a href="<?=base_url('kelas/rombel');?>">
                    <button type="button" class="btn btn-sm btn-light">
                        Kembali
                    </button>
                </a>
            </div>
        </div>
        <div class="block-content block-content-full">
            <p class="font-size-sm text-muted">
                Berikut ini adalah seluruh peserta rombel dari
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
        <div class='text-center'>
            <div class="block-content">
                <p>Kelas        : <?=$kelas["kelas_nama"]?></p>
                <p>Tahun Ajaran : <?=$kelas["tahunajaran_nama"]?></p>
            </div>
          </div>
            <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                  <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>No Induk</th>
                        <th>NISN</th>
                        <th style="width: 15%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=0;foreach($semua_wargabelajar as $wargabelajar):$no++;?>
                        <tr id="<?=$wargabelajar->rombel_details_id;?>">
                            <td class="text-center"><?=$no?></td>
                            <td><?=$wargabelajar->wargabelajar_nama;?>
                            <td><?=$wargabelajar->wargabelajar_nomor_induk;?>
                            <td><?=$wargabelajar->wargabelajar_nisn;?>
                            <td class="text-center">
                                
                                    <button id="<?=$no?>" type="submit" class="btn btn-sm btn-warning js-tooltip-enabled push mb-md-0 hapus-rombel-det" data-id="<?=$wargabelajar->rombel_details_id;?>">
                                        <i class="fa fa-fw fa-times"></i>
                                        Hapus
                                    </button>
  
                            </td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
        <div class="row push text-center">
                <a href="<?=base_url('kelas/rombel');?>">
                    <button type="buttn" class="btn btn-light">Kembali</button>
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
                            <button type="button" class="btn btn-rounded btn-success">
                                <i class="far fa-file-excel"></i> Spreadsheet
                            </button>
                            <a href="<?=base_url('kelas/rombel_cetak/').$this->uri->segment(3);?>" target="_blank">
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