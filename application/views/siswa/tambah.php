<?php $this->load->view('head')?>
<?php $this->load->view('siswa/nav_tambah')?>

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
        <div class="block-header">
            <h3 class="block-title">Data siswa</h3>
        </div>
        <div class="block-content block-content-full">
            <form action="<?=base_url('siswa/tambah');?>" method="POST" enctype="multipart/form-data">
                <div class="row push">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="siswa_nis">NIS</label>
                            <input type="text" class="form-control" id="siswa_nis" name="siswa_nis" placeholder="Masukan NIS">   
                            <small class="form-text text-danger"><?= form_error('siswa_nis'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="siswa_nis">NISN</label>
                            <input type="text" class="form-control" id="siswa_nis" name="siswa_nisn" placeholder="Masukan NISN">
                            <small class="form-text text-danger"><?= form_error('siswa_nisn'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="siswa_nama">Nama Lengkap</label>
                            <input type="text" class="form-control" id="siswa_nama" name="siswa_nama" placeholder="Masukan Nama Lengkap">
                            <small class="form-text text-danger"><?= form_error('siswa_nama'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="siswa_nik">NIK</label>
                            <input type="text" class="form-control" id="siswa_nik" name="siswa_nik" placeholder="Masukan NIK">
                            <small class="form-text text-danger"><?= form_error('siswa_nik'); ?></small>
                        </div>
                        <div class="form-grup">
                        <label class="d-block">Jenis Kelamin</label>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="siswa_jenis_kelamin-1" value="Pria" name="siswa_jenis_kelamin" required>
                                <label class="custom-control-label" for="siswa_jenis_kelamin-1">Pria</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="siswa_jenis_kelamin-2"value="Wanita"name="siswa_jenis_kelamin">
                                <label class="custom-control-label" for="siswa_jenis_kelamin-2">Wanita</label>
                            </div>
                            <small class="form-text text-danger"><?= form_error('siswa_jenis_kelamin'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="siswa_tempat_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control" id="siswa_tempat_lahir" name="siswa_tempat_lahir" placeholder="Tempat Lahir">
                            <small class="form-text text-danger"><?= form_error('siswa_tempat_lahir'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="siswa_tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="js-flatpickr form-control bg-white js-flatpickr-enabled flatpickr-input active" id="siswa_tanggal_lahir" name="siswa_tanggal_lahir">
                            
                        </div>
                        <div class="form-group">
                            <label for="siswa_agama">Agama</label>
                            <select class="custom-select" id="siswa_agama" name="siswa_agama">
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
                                <input type="radio" class="custom-control-input" id="siswa_kewarganegaraan-1" name="siswa_kewarganegaraan">
                                <label class="custom-control-label" for="siswa_kewarganegaraan-1" value="WNA">WNA</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="siswa_kewarganegaraan-2" name="siswa_kewarganegaraan">
                                <label class="custom-control-label" for="siswa_kewarganegaraan-2" value="WNI">WNI</label>
                            </div>
                        </div>
                        <div class="form-grup">
                        <label for="siswa_alamat_jalan">Alamat</label>
                            <input type="text" class="form-control" id="siswa_alamat_jalan" name="siswa_alamat_jalan" placeholder="Jl. ">
                            <small class="form-text text-danger"><?= form_error('siswa_alamat_jalan'); ?></small>
                        </div>
                        <div class="form-grup">
                        <label for="siswa_alamat_rtrw">RT/RW</label>
                            <input type="text" class="form-control" id="siswa_alamat_rtrw" name="siswa_alamat_rtrw" placeholder="RT/RW">
                        </div>
                        <div class="form-grup">
                        <label for="siswa_alamat_desa">Desa/Kelurahan</label>
                            <input type="text" class="form-control" id="siswa_alamat_desa" name="siswa_alamat_desa" placeholder="Desa/Kelurahan">
                        </div>
                        <div class="form-grup">
                        <label for="siswa_alamat_kecamatan">Kecamatan</label>
                            <input type="text" class="form-control" id="siswa_alamat_kecamatan" name="siswa_alamat_kecamatan" placeholder="Kecamatan">
                        </div>
                        <div class="form-grup">
                        <label for="siswa_alamat_kabupaten">Kota/Kabupaten</label>
                            <input type="text" class="form-control" id="siswa_alamat_kabupaten" name="siswa_alamat_kabupaten" placeholder="Kota/Kabupaten">
                        </div>
                        <div class="form-grup">
                        <label for="siswa_alamat_provinsi">Provinsi</label>
                            <input type="text" class="form-control" id="siswa_alamat_provinsi" name="siswa_alamat_provinsi" placeholder="Provinsi">
                        </div>
                        <div class="form-grup">
                        <label for="siswa_alamat_kabupaten">KODE POS</label>
                            <input type="text" class="form-control" id="siswa_alamat_kodepos" name="siswa_alamat_kodepos" placeholder="KODE POS">
                        </div>
                        <div class="form-group">
                            <label>Foto Siswa</label>
                            <div class="custom-file">
                            <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                            <input type="file" class="custom-file-input js-custom-file-input-enabled" data-toggle="custom-file-input" id="siswa_foto" name="siswa_foto">
                            <label class="custom-file-label" for="siswa_foto">Silahkan masukan foto</label>
                            </div>
                        </div>
                        <div class="form-grup">
                            <label for="siswa_alamat_kabupaten">Kelas</label>
                            <select class="custom-select" id="kelas_id" name="kelas_id" required>
                                <option value="0">Silahkan Pilih</option>
                            <?php foreach($kelass as $kelas) :?>
                            <option value="<?=$kelas->kelas_id?>"><?=$kelas->kelas_nama?></option>
                            <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

        
    </div>
    <!-- END Basic -->
        <!-- Basic -->
        <div class="block">
        <div class="block-header">
            <h3 class="block-title">Data Ayah</h3>
        </div>
        <div class="block-content block-content-full">
                <div class="row push">
                    <div class="col-lg-12 col-xl-">
                        <div class="form-group">
                            <label for="orangtua_ayah_nama">Nama Lengkap</label>
                            <input type="text" class="form-control" id="orangtua_ayah_nama" name="orangtua_ayah_nama" placeholder="Masukan Nama Lengkap">
                        </div>
                        <div class="form-group">
                            <label for="orangtua_ayah_nik">NIK</label>
                            <input type="text" class="form-control" id="orangtua_ayah_nik" name="orangtua_ayah_nik" placeholder="Masukan NIK">
                        </div>
                        <div class="form-group">
                            <label for="orangtua_ayah_agama">Agama</label>
                            <select class="custom-select" id="orangtua_ayah_agama" name="orangtua_ayah_agama">
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
                                <input type="radio" class="custom-control-input" id="orangtua_ayah_kewarganegaraan-1" name="orangtua_ayah_kewarganegaraan">
                                <label class="custom-control-label" for="orangtua_ayah_kewarganegaraan-1" value="WNA">WNA</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="orangtua_ayah_kewarganegaraan-2" name="orangtua_ayah_kewarganegaraan">
                                <label class="custom-control-label" for="orangtua_ayah_kewarganegaraan-2" value="WNI">WNI</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="orangtua_ayah_pendidikan_terakhir">Pendidikan Terakhir</label>
                            <select class="custom-select" id="orangtua_ayah_pendidikan_terakhir" name="orangtua_ayah_pendidikan_terakhir">
                                <option value="0">Silahkan Pilih</option>
                                <option value="SLTA Sederajat">SLTA Sederajat</option>
                                <option value="D3">D3</option>
                                <option value="D4">D4</option>
                                <option value="S1">S1</option>
                                <option value="S2">S2</option>
                                <option value="S3">S3</option>
                            </select>
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
                    </div>
                </div>
        </div>

        
    </div>
    <!-- END Basic -->

            <!-- Basic -->
            <div class="block">
        <div class="block-header">
            <h3 class="block-title">Data ibu</h3>
        </div>
        <div class="block-content block-content-full">
                <div class="row push">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="orangtua_ibu_nama">Nama Lengkap</label>
                            <input type="text" class="form-control" id="orangtua_ibu_nama" name="orangtua_ibu_nama" placeholder="Masukan Nama Lengkap">
                        </div>
                        <div class="form-group">
                            <label for="orangtua_ibu_nik">NIK</label>
                            <input type="text" class="form-control" id="orangtua_ibu_nik" name="orangtua_ibu_nik" placeholder="Masukan NIK">
                        </div>
                        <div class="form-group">
                            <label for="orangtua_ibu_agama">Agama</label>
                            <select class="custom-select" id="orangtua_ibu_agama" name="orangtua_ibu_agama">
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
                                <input type="radio" class="custom-control-input" id="orangtua_ibu_kewarganegaraan-1" name="orangtua_ibu_kewarganegaraan">
                                <label class="custom-control-label" for="orangtua_ibu_kewarganegaraan-1" value="WNA">WNA</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="orangtua_ibu_kewarganegaraan-2" name="orangtua_ibu_kewarganegaraan">
                                <label class="custom-control-label" for="orangtua_ibu_kewarganegaraan-2" value="WNI">WNI</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="orangtua_ibu_pendidikan_terakhir">Pendidikan Terakhir</label>
                            <select class="custom-select" id="orangtua_ibu_pendidikan_terakhir" name="orangtua_ibu_pendidikan_terakhir">
                                <option value="0">Silahkan Pilih</option>
                                <option value="SLTA Sederajat">SLTA Sederajat</option>
                                <option value="D3">D3</option>
                                <option value="D4">D4</option>
                                <option value="S1">S1</option>
                                <option value="S2">S2</option>
                                <option value="S3">S3</option>
                            </select>
                        </div>
                        <div class="form-grup">
                        <label for="orangtua_ibu_pekerjaan">Pekerjaan</label>
                            <input type="text" class="form-control" id="orangtua_ibu_pekerjaan" name="orangtua_ibu_pekerjaan" placeholder="Pekerjaan ">
                        </div>
                        <div class="form-grup">
                        <label for="orangtua_ibu_alamat_jalan">Alamat</label>
                            <input type="text" class="form-control" id="orangtua_ibu_alamat_jalan" name="orangtua_ibu_alamat_jalan" placeholder="Jl. ">
                        </div>
                        <div class="form-grup">
                        <label for="orangtua_ibu_alamat_rtrw">RT/RW</label>
                            <input type="text" class="form-control" id="orangtua_ibu_alamat_rtrw" name="orangtua_ibu_alamat_rtrw" placeholder="RT/RW">
                        </div>
                        <div class="form-grup">
                        <label for="orangtua_ibu_alamat_desa">Desa/Kelurahan</label>
                            <input type="text" class="form-control" id="orangtua_ibu_alamat_desa" name="orangtua_ibu_alamat_desa" placeholder="Desa/Kelurahan">
                        </div>
                        <div class="form-grup">
                        <label for="orangtua_ibu_alamat_kecamatan">Kecamatan</label>
                            <input type="text" class="form-control" id="orangtua_ibu_alamat_kecamatan" name="orangtua_ibu_alamat_kecamatan" placeholder="Kecamatan">
                        </div>
                        <div class="form-grup">
                        <label for="orangtua_ibu_alamat_kabupaten">Kota/Kabupaten</label>
                            <input type="text" class="form-control" id="orangtua_ibu_alamat_kabupaten" name="orangtua_ibu_alamat_kabupaten" placeholder="Kota/Kabupaten">
                        </div>
                        <div class="form-grup">
                        <label for="orangtua_ibu_alamat_provinsi">Provinsi</label>
                            <input type="text" class="form-control" id="orangtua_ibu_alamat_provinsi" name="orangtua_ibu_alamat_provinsi" placeholder="Provinsi">
                        </div>
                        <div class="form-grup">
                        <label for="orangtua_ibu_alamat_kodepos">KODE POS</label>
                            <input type="text" class="form-control" id="orangtua_ibu_alamat_kodepos" name="orangtua_ibu_alamat_kodepos" placeholder="KODE POS">
                        </div>
                    </div>
                </div>
        </div>

        
    </div>
    <!-- END Basic -->
    
          <!-- Basic -->
          <div class="block">
        <div class="block-header">
            <h3 class="block-title">Data Wali</h3>
        </div>
        <div class="block-content block-content-full">
                <div class="row push">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="orangtua_wali_nama">Nama Lengkap</label>
                            <input type="text" class="form-control" id="orangtua_wali_nama" name="orangtua_wali_nama" placeholder="Masukan Nama Lengkap">
                        </div>
                        <div class="form-group">
                            <label for="orangtua_wali_nik">NIK</label>
                            <input type="text" class="form-control" id="orangtua_wali_nik" name="orangtua_wali_nik" placeholder="Masukan NIK">
                        </div>
                        <div class="form-group">
                            <label for="orangtua_wali_agama">Agama</label>
                            <select class="custom-select" id="orangtua_wali_agama" name="orangtua_wali_agama">
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
                                <input type="radio" class="custom-control-input" id="orangtua_wali_kewarganegaraan-1" name="orangtua_wali_kewarganegaraan">
                                <label class="custom-control-label" for="orangtua_wali_kewarganegaraan-1" value="WNA">WNA</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="orangtua_wali_kewarganegaraan-2" name="orangtua_wali_kewarganegaraan">
                                <label class="custom-control-label" for="orangtua_wali_kewarganegaraan-2" value="WNI">WNI</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="orangtua_wali_pendidikan_terakhir">Pendidikan Terakhir</label>
                            <select class="custom-select" id="orangtua_wali_pendidikan_terakhir" name="orangtua_wali_pendidikan_terakhir">
                                <option value="0">Silahkan Pilih</option>
                                <option value="SLTA Sederajat">SLTA Sederajat</option>
                                <option value="D3">D3</option>
                                <option value="D4">D4</option>
                                <option value="S1">S1</option>
                                <option value="S2">S2</option>
                                <option value="S3">S3</option>
                            </select>
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
