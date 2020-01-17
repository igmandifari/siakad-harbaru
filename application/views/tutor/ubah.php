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

            <?php if ($this->session->flashdata('success')) : ?>
                <div class="alert alert-success d-flex align-items-center" role="alert">
                    <div class="flex-00-auto">
                        <i class="fa fa-fw fa-check"></i>
                    </div>
                    <div class="flex-fill ml-3">
                        <p class="mb-0"><?php echo $this->session->flashdata('success'); ?></p>
                    </div>
                </div>
            <?php endif; ?>
                <div class="row push">

                    <div class="col-12">
                        <div class="block">
                            <ul class="nav nav-tabs nav-tabs-block" data-toggle="tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#btabs-animated-slideright-home">Warga Belajar</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#ubah-password">Ubah Password</a>
                                </li>
                            </ul>
                            <div class="block-content tab-content overflow-hidden">
                                <div class="tab-pane fade fade-right show active" id="btabs-animated-slideright-home" role="tabpanel">
                                <form action="<?php base_url("tutor/ubah") ?>" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?= $tutor["tutor_id"]; ?>">
                                    <div class="form-group">
                                        <label for="tutor_nomor_induk">Nomor Induk</label>
                                        <input type="text" class="form-control" id="tutor_nomor_induk" name="tutor_nomor_induk" value="<?=$tutor["tutor_nomor_induk"];?>">
                                        <small class="form-text text-danger"><?= form_error('tutor_nomor_induk'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="tutor_nama">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="tutor_nama" name="tutor_nama" value="<?=$tutor["tutor_nama"];?>">
                                        <small class="form-text text-danger"><?= form_error('tutor_nama'); ?></small>
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
                                    <div class="form-group">
                                        <label for="tutor_tanggal_lahir">Tanggal Lahir</label>
                                        <input type="date" class="js-flatpickr form-control bg-white js-flatpickr-enabled flatpickr-input active" id="tutor_tanggal_lahir" name="tutor_tanggal_lahir" value="<?=$tutor["tutor_tanggal_lahir"];?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="tutor_tempat_lahir">Tempat Lahir</label>
                                        <input type="text" class="form-control" id="tutor_tempat_lahir" name="tutor_tempat_lahir" value="<?=$tutor["tutor_tempat_lahir"];?>">
                                        <small class="form-text text-danger"><?= form_error('tutor_tempat_lahir'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="tutor_agama">Agama</label>
                                        <select class="custom-select" id="tutor_agama" name="tutor_agama">
                                            <option value="0">Please select</option>
                                            <option value="Islam" <?php if($tutor["tutor_agama"]=="Islam")echo "selected";?>>Islam</option>
                                            <option value="Kristen Protestan" <?php if($tutor["tutor_agama"]=="Kristen Protestan")echo "selected";?>>Kristen Protestan</option>
                                            <option value="Kristen Katolik" <?php if($tutor["tutor_agama"]=="Kristen Katolik")echo "selected";?>>Kristen Katolik</option>
                                            <option value="Hindu" <?php if($tutor["tutor_agama"]=="Hindu")echo "selected";?>>Hindu</option>
                                            <option value="Buddha" <?php if($tutor["tutor_agama"]=="Buddha")echo "selected";?>>Buddha</option>
                                            <option value="Kong Hu Cu" <?php if($tutor["tutor_agama"]=="Kong Hu Cu")echo "selected";?>>Kong Hu Cu</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="d-block">Kewarganegaraan</label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" id="tutor_kewarganegaraan-1" name="tutor_kewarganegaraan"  value="WNA" <?php if($tutor["tutor_kewarganegaraan"]=="WNA")echo "checked";?>>
                                            <label class="custom-control-label" for="tutor_kewarganegaraan-1">WNA</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" id="tutor_kewarganegaraan-2" name="tutor_kewarganegaraan" value="WNI" <?php if($tutor["tutor_kewarganegaraan"]=="WNI")echo "checked";?>>
                                            <label class="custom-control-label" for="tutor_kewarganegaraan-2">WNI</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tutor_pendidikan_terakhir">Pendidikan Terakhir</label>
                                        <select class="custom-select" id="tutor_pendidikan_terakhir" name="tutor_pendidikan_terakhir">
                                            <option value="0">Please select</option>
                                            <option value="SLTA Sederajat" <?php if($tutor["tutor_pendidikan_terakhir"]=="SLTA Sederajat")echo "selected";?>>SLTA Sederajat</option>
                                            <option value="D3" <?php if($tutor["tutor_pendidikan_terakhir"]=="D3")echo "selected";?>>D3</option>
                                            <option value="D4" <?php if($tutor["tutor_pendidikan_terakhir"]=="D4")echo "selected";?>>D4</option>
                                            <option value="S1" <?php if($tutor["tutor_pendidikan_terakhir"]=="S1")echo "selected";?>>S1</option>
                                            <option value="S2" <?php if($tutor["tutor_pendidikan_terakhir"]=="S2")echo "selected";?>>S2</option>
                                            <option value="S3" <?php if($tutor["tutor_pendidikan_terakhir"]=="S3")echo "selected";?>>S3</option>
                                        </select>
                                    </div>
                                    <div class="form-grup">
                                    <label for="tutor_alamat_jalan">Alamat</label>
                                        <input type="text" class="form-control" id="tutor_alamat_jalan" name="tutor_alamat_jalan" value="<?=$tutor["tutor_alamat_jalan"];?>">
                                        <small class="form-text text-danger"><?= form_error('tutor_alamat_jalan'); ?></small>
                                    </div>
                                    <div class="form-grup">
                                    <label for="tutor_alamat_rtrw">RT/RW</label>
                                        <input type="text" class="form-control" id="tutor_alamat_rtrw" name="tutor_alamat_rtrw" value="<?=$tutor["tutor_alamat_rtrw"];?>">
                                        <small class="form-text text-danger"><?= form_error('tutor_alamat_rtrw'); ?></small>
                                    </div>
                                    <div class="form-grup">
                                    <label for="tutor_alamat_desa">Desa/Kelurahan</label>
                                        <input type="text" class="form-control" id="tutor_alamat_desa" name="tutor_alamat_desa" value="<?=$tutor["tutor_alamat_desa"];?>">
                                        <small class="form-text text-danger"><?= form_error('tutor_alamat_desa'); ?></small>
                                    </div>
                                    <div class="form-grup">
                                    <label for="tutor_alamat_kecamatan">Kecamatan</label>
                                        <input type="text" class="form-control" id="tutor_alamat_kecamatan" name="tutor_alamat_kecamatan" value="<?=$tutor["tutor_alamat_kecamatan"];?>">
                                        <small class="form-text text-danger"><?= form_error('tutor_alamat_kecamatan'); ?></small>
                                    </div>
                                    <div class="form-grup">
                                    <label for="tutor_alamat_kabupaten">Kota/Kabupaten</label>
                                        <input type="text" class="form-control" id="tutor_alamat_kabupaten" name="tutor_alamat_kabupaten" value="<?=$tutor["tutor_alamat_kabupaten"];?>">
                                        <small class="form-text text-danger"><?= form_error('tutor_alamat_kabupaten'); ?></small>
                                    </div>
                                    <div class="form-grup">
                                    <label for="tutor_alamat_provinsi">Provinsi</label>
                                        <input type="text" class="form-control" id="tutor_alamat_provinsi" name="tutor_alamat_provinsi" value="<?=$tutor["tutor_alamat_provinsi"];?>">
                                        <small class="form-text text-danger"><?= form_error('tutor_alamat_provinsi'); ?></small>
                                    </div>
                                    <div class="form-grup">
                                    <label for="tutor_alamat_kabupaten">KODE POS</label>
                                        <input type="text" class="form-control" id="tutor_alamat_kodepos" name="tutor_alamat_kodepos" value="<?=$tutor["tutor_alamat_kodepos"];?>">
                                        <small class="form-text text-danger"><?= form_error('tutor_alamat_kodepos'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label>Foto</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input js-custom-file-input-enabled" data-toggle="custom-file-input" id="tutor_foto" name="tutor_foto">
                                            <label class="custom-file-label" for="example-file-input-custom">Pilih foto:</label>
                                        </div>
                                        <input type="hidden" name="old_image" value="<?=$tutor["tutor_foto"]?>">
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
                                <div class="row push text-center">
                <a href="<?=base_url('tutor');?>">
                    <button type="buttn" class="btn btn-light">Kembali</button>
                </a>
            </div>
                                </div>
                                <div class="tab-pane fade fade-right" id="ubah-password">
                                <form action="<?php echo base_url("tutor/ubah_password") ?>" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?= $tutor["tutor_id"]; ?>">
                                        <div class="form-group">
                                            <label for="password">Password Baru</label>
                                            <input type="password" class="form-control" id="tutor_password" name="tutor_password" placeholder="Masukan Password Baru">
                                            <small class="form-text text-danger"><?= form_error('tutor_password'); ?></small>
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
                                    <div class="row push text-center">
                <a href="<?=base_url('tutor');?>">
                    <button type="buttn" class="btn btn-light">Kembali</button>
                </a>
            </div>
                                </div>
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