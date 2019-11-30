<?php $this->load->view('head')?>
<?php $this->load->view('jadwal/nav_tambah')?>

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
        <div class="block-header">
            <h3 class="block-title">Data Mata Pelajaran</h3>
        </div>
        <div class="block-content block-content-full">
            <form action="<?=base_url('jadwal/tambah');?>" method="POST" enctype="multipart/form-data">
                <div class="row push">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="kelas_id">Hari</label>
                            <select class="custom-select" id="jadwal_hari" name="jadwal_hari">
                                <option value="0">Silahkan Pilih</option>
                                <option value="Jum'at">Jum'at</option>
                                <option value="Sabtu">Sabtu</option>
                                <option value="Minggu">Minggu</option>
                            </select>
                        </div> 
                        <div class="form-group">
                            <label for="kelas_id">Jam Mulai</label>
                            <select class="custom-select" id="jadwal_jam_mulai" name="jadwal_jam_mulai">
                                <option value="0">Silahkan Pilih</option>
                                <option value="13:00">13:00</option>
                                <option value="14:00">14:00</option>
                                <option value="15:00">15:00</option>
                                <option value="16:00">16:00</option>
                                <option value="17:00">17:00</option>
                            </select>
                        </div> 
                        <div class="form-group">
                            <label for="kelas_id">Jam Selesai</label>
                            <select class="custom-select" id="jadwal_jam_berakhir" name="jadwal_jam_berakhir">
                                <option value="0">Silahkan Pilih</option>
                                <option value="14:00">14:00</option>
                                <option value="15:00">15:00</option>
                                <option value="16:00">16:00</option>
                            </select>
                        </div> 
                        <div class="form-group">
                            <label for="kelas_id">Mata Pelajaran</label>
                            <select class="custom-select" id="matpel_id" name="matpel_id">
                                <option value="0">Silahkan Pilih</option>
                                <?php foreach($matpels as $matpel ):?>
                                    <option value="<?=$matpel->matpel_id?>"><?=$matpel->matpel_nama?></option>
                                <?php endforeach;?>
                            </select>
                        </div> 
                        <div class="form-group">
                            <label for="kelas_id">Kelas</label>
                            <select class="custom-select" id="kelas_id" name="kelas_id">
                                <option value="0">Silahkan Pilih</option>
                                <?php foreach($kelass as $kelas ):?>
                                    <option value="<?=$kelas->kelas_id?>"><?=$kelas->kelas_nama?></option>
                                <?php endforeach;?>
                            </select>
                        </div> 
                        <div class="form-group">
                            <label for="kelas_id">Tutor</label>
                            <select class="custom-select" id="tutor_id" name="tutor_id">
                                <option value="0">Silahkan Pilih</option>
                                <?php foreach($tutors as $tutor ):?>
                                    <option value="<?=$tutor->tutor_id?>"><?=$tutor->tutor_nama?></option>
                                <?php endforeach;?>
                            </select>
                        </div>                        
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
    </div>
    <!-- END Basic -->

</div>
<!-- END Page Content -->

</main>
<!-- END Main Container -->
<?php $this->load->view('foot')?>