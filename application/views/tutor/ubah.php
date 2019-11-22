<?php $this->load->view('head')?>
<?php $this->load->view('tutor/nav_tambah')?>

<!-- Main Container -->
<main id="main-container">

<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item"><?=$actor;?></li>
                    <li class="breadcrumb-item"><?=$title;?></li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href=""><?=$tutor["tutor_nama"];?></a>
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
            <h3 class="block-title">Data Tutor</h3>
        </div>
        <div class="block-content block-content-full">
            <form action="<?=base_url('tutor/ubah');?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?=$tutor["tutor_id"];?>">
                <div class="row push">
                    <div class="col-lg-12 col-xl-5">
                        <div class="form-group">
                            <label for="tutor_nip">NIP</label>
                            <input type="text" class="form-control" id="tutor_nip" name="tutor_nip" value="<?=$tutor["tutor_nip"];?>">
                        </div>
                        <div class="form-group">
                            <label for="tutor_nama">Nama Lengkap</label>
                            <input type="text" class="form-control" id="tutor_nama" name="tutor_nama" value="<?=$tutor["tutor_nama"];?>">
                        </div>
                        <div class="form-grup">
                        <label class="d-block">Jenis Kelamin</label>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="tutor_jenis_kelamin-1" name="tutor_jenis_kelamin" value="Pria" <?php if($tutor["tutor_jenis_kelamin"]=="Pria")echo "checked";?>>
                                <label class="custom-control-label" for="tutor_jenis_kelamin-1" value="Pria">Pria</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="tutor_jenis_kelamin-2" name="tutor_jenis_kelamin" value="Wanita"<?php if($tutor["tutor_jenis_kelamin"]=="Wanita")echo "checked";?>>
                                <label class="custom-control-label" for="tutor_jenis_kelamin-2" value="Wanita">Wanita</label>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="tutor_tempat_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tutor_tempat_lahir" name="tutor_tempat_lahir" value="<?=$tutor["tutor_tempat_lahir"];?>">
                        </div>
                        <div class="form-group">
                            <label for="tutor_agama">Agama</label>
                            <select class="custom-select" id="tutor_agama" name="tutor_agama">
                                <option value="0">Please select</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen Protestan">Kristen Protestan</option>
                                <option value="Kristen Katolik">Kristen Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Kong Hu Cu">Kong Hu Cu</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="d-block">Kewarganegaraan</label>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="tutor_kewarganegaraan-1" name="tutor_kewarganegaraan" <?php if($tutor["tutor_kewarganegaraan"]=="WNA")echo "checked";?>>
                                <label class="custom-control-label" for="tutor_kewarganegaraan-1" value="WNA">WNA</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="tutor_kewarganegaraan-2" name="tutor_kewarganegaraan" <?php if($tutor["tutor_kewarganegaraan"]=="WNI")echo "checked";?>>
                                <label class="custom-control-label" for="tutor_kewarganegaraan-2" value="WNI">WNI</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tutor_pendidikan_terakhir">Pendidikan Terakhir</label>
                            <select class="custom-select" id="tutor_pendidikan_terakhir" name="tutor_pendidikan_terakhir">
                                <option value="0">Please select</option>
                                <option value="SLTA Sederajat">SLTA Sederajat</option>
                                <option value="D3">D3</option>
                                <option value="D4">D4</option>
                                <option value="S1">S1</option>
                                <option value="S2">S2</option>
                                <option value="S3">S3</option>
                            </select>
                        </div>
                        <div class="form-grup">
                        <label for="tutor_alamat_jalan">Alamat</label>
                            <input type="text" class="form-control" id="tutor_alamat_jalan" name="tutor_alamat_jalan" value="<?=$tutor["tutor_alamat_jalan"];?>">
                        </div>
                        <div class="form-grup">
                        <label for="tutor_alamat_rtrw">RT/RW</label>
                            <input type="text" class="form-control" id="tutor_alamat_rtrw" name="tutor_alamat_rtrw" value="<?=$tutor["tutor_alamat_rtrw"];?>">
                        </div>
                        <div class="form-grup">
                        <label for="tutor_alamat_desa">Desa/Kelurahan</label>
                            <input type="text" class="form-control" id="tutor_alamat_desa" name="tutor_alamat_desa" value="<?=$tutor["tutor_alamat_desa"];?>">
                        </div>
                        <div class="form-grup">
                        <label for="tutor_alamat_kecamatan">Kecamatan</label>
                            <input type="text" class="form-control" id="tutor_alamat_kecamatan" name="tutor_alamat_kecamatan" value="<?=$tutor["tutor_alamat_kecamatan"];?>">
                        </div>
                        <div class="form-grup">
                        <label for="tutor_alamat_kabupaten">Kota/Kabupaten</label>
                            <input type="text" class="form-control" id="tutor_alamat_kabupaten" name="tutor_alamat_kabupaten" value="<?=$tutor["tutor_alamat_kabupaten"];?>">
                        </div>
                        <div class="form-grup">
                        <label for="tutor_alamat_provinsi">Provinsi</label>
                            <input type="text" class="form-control" id="tutor_alamat_provinsi" name="tutor_alamat_provinsi" value="<?=$tutor["tutor_alamat_provinsi"];?>">
                        </div>
                        <div class="form-grup">
                        <label for="tutor_alamat_kabupaten">KODE POS</label>
                            <input type="text" class="form-control" id="tutor_alamat_kodepos" name="tutor_alamat_kodepos" value="<?=$tutor["tutor_alamat_kodepos"];?>">
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