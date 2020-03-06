<?php $this->load->view('head')?>
<?php $this->load->view('kelas/nav_rombel')?>

<!-- Main Container -->
<main id="main-container">

<!-- Page Content -->
<div class="content">
    <!-- Dynamic Table Full -->
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title"><?=$title;?></h3>
            <div class="block-options">
                <a href="<?=base_url('/kelas/rombel');?>">
                    <button type="button" class="btn btn-sm btn-light">
                        Kembali
                    </button>
                </a>
            </div>
        </div>
        <div class="block-content block-content-full">
            <p class="font-size-sm text-muted">
                Silahkan pilih warga belajar, untuk dimasukan ke peserta rombel
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
        <?php if ($this->session->flashdata('failed')): ?>
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <div class="flex-00-auto">
                <i class="fa fa-fw fa-check"></i>
            </div>
            <div class="flex-fill ml-3">
                <p class="mb-0"><?php echo $this->session->flashdata('failed'); ?></p>
            </div>
        </div>
        <?php endif;?>
        
          <div class='text-center'>
            <div class="block-content">
                <h3>Masukan Warga Belajar Kesini...</h3>
                <p>Kelas        : <?=$kelas["kelas_nama"]?></p>
                <p>Tahun Ajaran : <?=$kelas["tahunajaran_nama"]?></p>
            </div>
          </div>
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
                        <tr>
                            <td class="text-center"><?=$no?></td>
                            <td><?=$wargabelajar->wargabelajar_nama;?>
                            <td><?=$wargabelajar->wargabelajar_nomor_induk;?>
                            <td><?=$wargabelajar->wargabelajar_nisn;?>
                            <td class="text-center">
                                <form method="post" action="<?=base_url('kelas/rombel_simpan')?>">
                                    <input type="hidden" name="rombel_id" value="<?=$this->uri->segment('3')?>">
                                    <input type="hidden" name="wargabelajar_id" value="<?=$wargabelajar->wargabelajar_id?>">
                                    <button id="tambah<?=$no?>" type="submit" class="btn btn-outline-secondary btn-sm">Masukan</button>
                                </a>
                                </form>    
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
   

</div>
<!-- END Page Content -->

</main>
<!-- END Main Container -->
<?php $this->load->view('foot')?>