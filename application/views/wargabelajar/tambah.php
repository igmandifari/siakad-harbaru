<?php $this->load->view('head')?>
<?php $this->load->view('wargabelajar/nav_tambah')?>

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
    <form action="<?php base_url("wargabelajar/tambah")?>" method="post" enctype="multipart/form-data" id="form">
        <div class="row push">
        
            <div class="col-12">
                <div class="block">
                    <ul class="nav nav-tabs nav-tabs-block" data-toggle="tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#btabs-animated-slideright-home">Warga Belajar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#btabs-animated-slideright-profile">Orang Tua/Wali</a>
                        </li>
                    </ul>
                        <div class="block-content tab-content overflow-hidden">
                            <div class="tab-pane fade fade-right show active" id="btabs-animated-slideright-home" role="tabpanel">
                                <div class="form-group">
                                    <label for="wargabelajar_nis">Nomor Induk</label>
                                    <input type="text" class="form-control" id="wargabelajar_nomor_induk" name="wargabelajar_nomor_induk" placeholder="Masukan Nomor Induk">   
                                    <small class="form-text text-danger"><?= form_error('wargabelajar_nomor_induk'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="wargabelajar_nis">NISN</label>
                                    <input type="text" class="form-control" id="wargabelajar_nis" name="wargabelajar_nisn" placeholder="Masukan NISN">
                                    <small class="form-text text-danger"><?= form_error('wargabelajar_nisn'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="wargabelajar_nik">NIK</label>
                                    <input type="text" class="form-control" id="wargabelajar_nik" name="wargabelajar_nik" placeholder="Masukan NIK">
                                    <small class="form-text text-danger"><?= form_error('wargabelajar_nik'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="wargabelajar_nama">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="wargabelajar_nama" name="wargabelajar_nama" placeholder="Masukan Nama Lengkap">
                                    <small class="form-text text-danger"><?= form_error('wargabelajar_nama'); ?></small>
                                </div>
                                <div class="form-grup">
                                    <label class="d-block">Jenis Kelamin</label>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="wargabelajar_jenis_kelamin-1" value="Pria" name="wargabelajar_jenis_kelamin" required>
                                        <label class="custom-control-label" for="wargabelajar_jenis_kelamin-1">Pria</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="wargabelajar_jenis_kelamin-2"value="Wanita"name="wargabelajar_jenis_kelamin">
                                        <label class="custom-control-label" for="wargabelajar_jenis_kelamin-2">Wanita</label>
                                    </div>
                                        <small class="form-text text-danger"><?= form_error('wargabelajar_jenis_kelamin'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="wargabelajar_tempat_lahir">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="wargabelajar_tempat_lahir" name="wargabelajar_tempat_lahir" placeholder="Tempat Lahir">
                                    <small class="form-text text-danger"><?= form_error('wargabelajar_tempat_lahir'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="wargabelajar_tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" class="js-flatpickr form-control bg-white js-flatpickr-enabled flatpickr-input active" id="wargabelajar_tanggal_lahir" name="wargabelajar_tanggal_lahir">
                                </div>
                                <div class="form-group">
                                    <label for="wargabelajar_agama">Agama</label>
                                    <select class="custom-select" id="wargabelajar_agama" name="wargabelajar_agama">
                                        <option value="0">Silahkan Pilih</option>
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
                                        <input type="radio" class="custom-control-input" id="wargabelajar_kewarganegaraan-1" name="wargabelajar_kewarganegaraan">
                                        <label class="custom-control-label" for="wargabelajar_kewarganegaraan-1" value="WNA">WNA</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="wargabelajar_kewarganegaraan-2" name="wargabelajar_kewarganegaraan">
                                        <label class="custom-control-label" for="wargabelajar_kewarganegaraan-2" value="WNI">WNI</label>
                                    </div>
                                </div>
                                <div class="form-grup">
                                    <label for="wargabelajar_alamat_jalan">Alamat</label>
                                    <input type="text" class="form-control" id="wargabelajar_alamat_jalan" name="wargabelajar_alamat_jalan" placeholder="Jl. ">
                                    <small class="form-text text-danger"><?= form_error('wargabelajar_alamat_jalan'); ?></small>
                                </div>
                                <div class="form-grup">
                                    <label for="wargabelajar_alamat_rtrw">RT/RW</label>
                                    <input type="text" class="form-control" id="wargabelajar_alamat_rtrw" name="wargabelajar_alamat_rtrw" placeholder="RT/RW">
                                </div>
                                <div class="form-grup">
                                    <label for="wargabelajar_alamat_desa">Desa/Kelurahan</label>
                                    <input type="text" class="form-control" id="wargabelajar_alamat_desa" name="wargabelajar_alamat_desa" placeholder="Desa/Kelurahan">
                                </div>
                                <div class="form-grup">
                                    <label for="wargabelajar_alamat_kecamatan">Kecamatan</label>
                                    <input type="text" class="form-control" id="wargabelajar_alamat_kecamatan" name="wargabelajar_alamat_kecamatan" placeholder="Kecamatan">
                                </div>
                                <div class="form-grup">
                                    <label for="wargabelajar_alamat_kabupaten">Kota/Kabupaten</label>
                                    <input type="text" class="form-control" id="wargabelajar_alamat_kabupaten" name="wargabelajar_alamat_kabupaten" placeholder="Kota/Kabupaten">
                                </div>
                                <div class="form-grup">
                                    <label for="wargabelajar_alamat_provinsi">Provinsi</label>
                                    <input type="text" class="form-control" id="wargabelajar_alamat_provinsi" name="wargabelajar_alamat_provinsi" placeholder="Provinsi">
                                </div>
                                <div class="form-grup">
                                    <label for="wargabelajar_alamat_kabupaten">KODE POS</label>
                                    <input type="text" class="form-control" id="wargabelajar_alamat_kodepos" name="wargabelajar_alamat_kodepos" placeholder="KODE POS">
                                </div>
                                <div class="form-grup">
                                    <label for="wargabelajar_alamat_jalan">Nama Sekolah/Kejar</label>
                                    <input type="text" class="form-control" id="wargabelajar_kejar" name="wargabelajar_kejar" placeholder="SD/SMP ">
                                    <small class="form-text text-danger"><?= form_error('wargabelajar_kejar'); ?></small>
                                </div>
                                <div class="form-grup">
                                    <label for="wargabelajar_alamat_jalan">Alamat Sekolah Kejar</label>
                                    <input type="text" class="form-control" id="wargabelajar_kejar_alamat" name="wargabelajar_kejar_alamat" placeholder="Jl. ">
                                    <small class="form-text text-danger"><?= form_error('wargabelajar_kejar_alamat'); ?></small>
                                </div>
                                <div class="form-grup">
                                    <label for="wargabelajar_sttb">Nomor dan Tahun STTB/STSB</label>
                                    <input type="text" class="form-control" id="wargabelajar_sttb" name="wargabelajar_sttb" placeholder="DN-02 DI 0480369 / 28 Juni 2019 ">
                                    <small class="form-text text-danger"><?= form_error('wargabelajar_sttb'); ?></small>
                                </div>
                                <div class="form-grup">
                                    <label for="wargabelajar_masuk">Tanggal Masuk</label>
                                    <input type="date" class="js-flatpickr form-control bg-white js-flatpickr-enabled flatpickr-input active" id="wargabelajar_masuk" name="wargabelajar_masuk">
                                </div>
                                <div class="form-grup">
                                    <label for="wargabelajar_alamat_kabupaten">Tahun Ajaran Masuk</label>
                                    <select class="custom-select" id="tahunajaran_id" name="tahunajaran_id" required>
                                        <option>Silahkan Pilih</option>
                                        <?php foreach($tahunajaran_all as $tahunajaran) :?>
                                            <option value="<?=$tahunajaran->tahunajaran_id?>"><?=$tahunajaran->tahunajaran_nama?></option>
                                        <?php endforeach;?>
                                    </select>
                                    <small class="form-text text-danger"><?= form_error('tahunajaran_id'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label>Foto Warga Belajar</label>
                                    <div class="custom-file">
                                    <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                        <input type="file" class="custom-file-input js-custom-file-input-enabled" data-toggle="custom-file-input" id="wargabelajar_foto" name="wargabelajar_foto">
                                        <label class="custom-file-label" for="wargabelajar_foto">Silahkan masukan foto</label>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade fade-right" id="btabs-animated-slideright-profile" role="tabpanel">
                                <div class="form-group">
                                    <label for="orangtua_ayah_nama">Nama Ayah</label>
                                    <input type="text" class="form-control" id="orangtua_ayah_nama" name="orangtua_ayah_nama" placeholder="Masukan Nama Lengkap">
                                </div>
                                <div class="form-group">
                                    <label for="orangtua_ibu_nama">Nama Ibu</label>
                                    <input type="text" class="form-control" id="orangtua_ibu_nama" name="orangtua_ibu_nama" placeholder="Masukan Nama Lengkap">
                                </div>
                                <div class="form-grup">
                                    <label for="orangtua_ayah_pekerjaan">Pekerjaan</label>
                                    <input type="text" class="form-control" id="orangtua_ayah_pekerjaan" name="orangtua_ayah_pekerjaan" placeholder="Pekerjaan ">
                                </div>
                                <div class="form-grup">
                                    <label for="orangtua_ayah_alamat_jalan">Alamat</label>
                                    <input type="text" class="form-control" id="orangtua_ayah_alamat_jalan" name="orangtua_ayah_alamat_jalan" placeholder="Jl. ">
                                </div>
                                <div class="form-grup">
                                    <label for="orangtua_ayah_alamat_rtrw">RT/RW</label>
                                    <input type="text" class="form-control" id="orangtua_ayah_alamat_rtrw" name="orangtua_ayah_alamat_rtrw" placeholder="RT/RW">
                                </div>
                                <div class="form-grup">
                                    <label for="orangtua_ayah_alamat_desa">Desa/Kelurahan</label>
                                    <input type="text" class="form-control" id="orangtua_ayah_alamat_desa" name="orangtua_ayah_alamat_desa" placeholder="Desa/Kelurahan">
                                </div>
                                <div class="form-grup">
                                    <label for="orangtua_ayah_alamat_kecamatan">Kecamatan</label>
                                    <input type="text" class="form-control" id="orangtua_ayah_alamat_kecamatan" name="orangtua_ayah_alamat_kecamatan" placeholder="Kecamatan">
                                </div>
                                <div class="form-grup">
                                    <label for="orangtua_ayah_alamat_kabupaten">Kota/Kabupaten</label>
                                    <input type="text" class="form-control" id="orangtua_ayah_alamat_kabupaten" name="orangtua_ayah_alamat_kabupaten" placeholder="Kota/Kabupaten">
                                </div>
                                <div class="form-grup">
                                    <label for="orangtua_ayah_alamat_provinsi">Provinsi</label>
                                    <input type="text" class="form-control" id="orangtua_ayah_alamat_provinsi" name="orangtua_ayah_alamat_provinsi" placeholder="Provinsi">
                                </div>
                                <div class="form-grup">
                                    <label for="orangtua_ayah_alamat_kodepos">KODE POS</label>
                                    <input type="text" class="form-control" id="orangtua_ayah_alamat_kodepos" name="orangtua_ayah_alamat_kodepos" placeholder="KODE POS">
                                </div>
                                <div class="form-group">
                                    <label for="orangtua_wali_nama">Nama Lengkap Wali</label>
                                    <input type="text" class="form-control" id="orangtua_wali_nama" name="orangtua_wali_nama" placeholder="Masukan Nama Lengkap">
                                </div>
                                <div class="form-grup">
                                    <label for="orangtua_wali_pekerjaan">Pekerjaan</label>
                                    <input type="text" class="form-control" id="orangtua_wali_pekerjaan" name="orangtua_wali_pekerjaan" placeholder="Pekerjaan ">
                                </div>
                                <div class="form-grup">
                                    <label for="orangtua_wali_alamat_jalan">Alamat</label>
                                    <input type="text" class="form-control" id="orangtua_wali_alamat_jalan" name="orangtua_wali_alamat_jalan" placeholder="Jl. ">
                                </div>
                                <div class="form-grup">
                                    <label for="orangtua_wali_alamat_rtrw">RT/RW</label>
                                    <input type="text" class="form-control" id="orangtua_wali_alamat_rtrw" name="orangtua_wali_alamat_rtrw" placeholder="RT/RW">
                                </div>
                                <div class="form-grup">
                                    <label for="orangtua_wali_alamat_desa">Desa/Kelurahan</label>
                                    <input type="text" class="form-control" id="orangtua_wali_alamat_desa" name="orangtua_wali_alamat_desa" placeholder="Desa/Kelurahan">
                                </div>
                                <div class="form-grup">
                                    <label for="orangtua_wali_alamat_kecamatan">Kecamatan</label>
                                    <input type="text" class="form-control" id="orangtua_wali_alamat_kecamatan" name="orangtua_wali_alamat_kecamatan" placeholder="Kecamatan">
                                </div>
                                <div class="form-grup">
                                    <label for="orangtua_wali_alamat_kabupaten">Kota/Kabupaten</label>
                                    <input type="text" class="form-control" id="orangtua_wali_alamat_kabupaten" name="orangtua_wali_alamat_kabupaten" placeholder="Kota/Kabupaten">
                                </div>
                                <div class="form-grup">
                                    <label for="orangtua_wali_alamat_provinsi">Provinsi</label>
                                    <input type="text" class="form-control" id="orangtua_wali_alamat_provinsi" name="orangtua_wali_alamat_provinsi" placeholder="Provinsi">
                                </div>
                                <div class="form-grup">
                                    <label for="orangtua_wali_alamat_kodepos">KODE POS</label>
                                    <input type="text" class="form-control" id="orangtua_wali_alamat_kodepos" name="orangtua_wali_alamat_kodepos" placeholder="KODE POS">
                                </div>
                            </div>
                        </div>
                    
                
                </div>
            </div>
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
<!-- END Page Content -->


</main>
<!-- END Main Container -->
<?php $this->load->view('foot')?>
