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
        <?php if($jadwal["jadwal_tipe_pembelajaran"] != "Tatap Muka"){?>
                <form action="<?php echo site_url('jadwal/update_tutorial_mandiri');?>" method="post">
                <div class="row push">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="jadwal_tipe_pembelajaran">Tipe Pembelajaran</label>
                            <input type="hidden" name="id" value="<?=$jadwal["jadwal_id"]?>">
                            <select class="custom-select" id="jadwal_tipe_pembelajaran" name="jadwal_tipe_pembelajaran">
                                <option value="0">Silahkan Pilih</option>
                                <option value="Mandiri" <?php if($jadwal["jadwal_tipe_pembelajaran"]=="Mandiri") echo"selected"?>>Mandiri</option>
                                <option value="Tutorial"<?php if($jadwal["jadwal_tipe_pembelajaran"]=="Tutorial") echo"selected"?>>Tutorial</option>
                            </select>
                        </div> 
                        <div class="form-group">
                            <label for="matpel_id">Mata Pelajaran</label>
                            <select class="custom-select" id="matpel_id" name="matpel_id">
                                <option value="0">Silahkan Pilih</option>
                                <?php foreach($matpels as $matpel ):?>
                                    <option value="<?=$matpel->matpel_id?>"<?php if($jadwal["matpel_id"]==$matpel->matpel_id) echo 'selected'?>><?=$matpel->matpel_nama?></option>
                                <?php endforeach;?>
                            </select>
                        </div> 
                        <div class="form-group">
                            <label for="rombel_id">Kelas</label>
                            <select class="custom-select" id="rombel_id" name="rombel_id">
                                <option value="0">Silahkan Pilih</option>
                                <?php foreach($kelass as $kelas ):?>
                                    <option value="<?=$kelas->rombel_id?>"<?php if($jadwal["rombel_id"]==$kelas->rombel_id) echo 'selected'?>><?=$kelas->kelas_nama?></option>
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

            <?php } else{?>
                <form action="<?php base_url('jadwal/ubah');?>" method="post">
                <div class="row push">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?=$jadwal["jadwal_id"]?>">
                            <label for="jadwal_hari">Hari</label>
                            <select class="custom-select" id="jadwal_hari" name="jadwal_hari">
                                <option value="0">Silahkan Pilih</option>
                                <option value="Jum'at"<?php if($jadwal["jadwal_hari"] == "Jum'at") echo 'selected'?>>Jum'at</option>
                                <option value="Sabtu" <?php if($jadwal["jadwal_hari"] == "Sabtu") echo 'selected'?>>Sabtu</option>
                                <option value="Minggu" <?php if($jadwal["jadwal_hari"] == "Minggu") echo 'selected'?>>Minggu</option>
                            </select>
                        </div> 
                        <div class="form-group">
                            <label for="jadwal_waktu">Waktu</label>
                            <select class="custom-select" id="jadwal_waktu" name="jadwal_waktu">
                                <option value="0">Silahkan Pilih</option>
                                <option value="13:00-14:00" <?php if($jadwal["jadwal_waktu"] == "13:00-14:00") echo 'selected'?>>13:00-14:00</option>
                                <option value="14:00-15:00" <?php if($jadwal["jadwal_waktu"] == "14:00-15:00") echo 'selected'?>>14:00-15:00</option>
                                <option value="16:00-17:00" <?php if($jadwal["jadwal_waktu"] == "16:00-17:00") echo 'selected'?>>16:00-17:00</option>
                            </select>
                        </div>  
                        <div class="form-group">
                            <label for="matpel_id">Mata Pelajaran</label>
                            <select class="custom-select" id="matpel_id" name="matpel_id">
                                <option value="0">Silahkan Pilih</option>
                                <?php foreach($matpels as $matpel ):?>
                                    <option value="<?=$matpel->matpel_id?>"<?php if($jadwal["matpel_id"]==$matpel->matpel_id) echo 'selected'?>><?=$matpel->matpel_nama?></option>
                                <?php endforeach;?>
                            </select>
                        </div> 
                        <div class="form-group">
                            <label for="rombel_id">Kelas</label>
                            <select class="custom-select" id="rombel_id" name="rombel_id">
                                <option value="0">Silahkan Pilih</option>
                                <?php foreach($kelass as $kelas ):?>
                                    <option value="<?=$kelas->rombel_id?>"<?php if($jadwal["rombel_id"]==$kelas->rombel_id) echo 'selected'?>><?=$kelas->kelas_nama?></option>
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
            <?php }?>
            
        </div>
    </div>
    <!-- END Basic -->

</div>
<!-- END Page Content -->

</main>
<!-- END Main Container -->
<?php $this->load->view('foot')?>