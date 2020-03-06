<?php $this->load->view('head')?>
<?php $this->load->view('wargabelajar/nav_tambah')?>

<!-- Main Container -->
<main id="main-container">

<!-- Page Content -->
<div class="content">
    <!-- Basic -->
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title"><?=$title;?></h3>
            <div class="block-options">
                <a href="<?=base_url('wargabelajar');?>">
                    <button type="button" class="btn btn-sm btn-light">
                        Kembali
                    </button>
                </a>
            </div>
        </div>
        
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
    
                <div class="row push">
        
                    <div class="col-12">
                        <div class="block">
                            <form action="<?php base_url("wargabelajar/tambah")?>" method="post" enctype="multipart/form-data" id="form">
                                <div class="js-wizard-simple block block">
                                    <!-- Wizard Progress Bar -->
                                    <div class="progress rounded-0" data-wizard="progress" style="height: 8px;">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 30%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                    <!-- END Wizard Progress Bar -->

                                    <!-- Step Tabs -->
                                    <ul class="nav nav-tabs nav-tabs-alt nav-justified" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#wizard-personal" data-toggle="tab">1. Wargabelajar</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#wizard-parent" data-toggle="tab">2. Orangtua/Wali Wargabelajar</a>
                                        </li>
                                    </ul>
                                    <!-- END Step Tabs -->
                                    <div class="block-content block-content-full tab-content px-md-5" style="min-height: 314px;">
                                        <!-- Step 1 -->
                                        <div class="tab-pane active" id="wizard-personal" role="tabpanel">
                                            <div class="form-group">
                                                <label for="rec_nik">Rekomendasi NIK</label>
                                                <div class="col-sm-4">
                                                    <div class="custom-control-inline">
                                                    <input id="rec_nik" type="text" class="form-control" value="<?=$rec_nik;?>" disabled>

                                                    <button id="btn-rec-nik" class="btn btn-sm btn-secondary">Gunakan</button>
                                                </div>
                                                </div>
                                                
                                            </div>
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
                                                <select class="js-select2 form-control form-control-lg form-control-alt" id="wargabelajar_agama" name="wargabelajar_agama" data-placeholder="Silahkan Pilih Agama">
                                                    <option></option>
                                                    <option value="0">Silahkan Pilih</option>
                                                    <option value="Islam">Islam</option>
                                                    <option value="Kristen Protestan">Kristen Protestan</option>
                                                    <option value="Kristen Katolik">Kristen Katolik</option>
                                                    <option value="Hindu">Hindu</option>
                                                    <option value="Buddha">Buddha</option>
                                                    <option value="Kong Hu Cu">Kong Hu Cu</option>
                                                </select>
                                                <small class="form-text text-danger"><?= form_error('wargabelajar_agama'); ?></small>
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
                                                <select class="js-select2 form-control form-control-lg form-control-alt" id="tahunajaran_id" name="tahunajaran_id" data-placeholder="Silahkan Pilih Tahun Ajaran Masuk">
                                                    <option></option>
                                                        <?php foreach($tahunajaran_all as $tahunajaran) :?>
                                                            <option value="<?=$tahunajaran->tahunajaran_id?>"><?=$tahunajaran->tahunajaran_nama?>
                                                            </option>
                                                        <?php endforeach;?>
                                                </select>
                                                <small class="form-text text-danger"><?= form_error('tahunajaran_id'); ?></small>
                                            </div>
                                            <div class="form-group">
                                                <label>Foto Warga Belajar</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input js-custom-file-input-enabled" data-toggle="custom-file-input" id="wargabelajar_foto" name="wargabelajar_foto">
                                                    <label class="custom-file-label" for="wargabelajar_foto">Silahkan masukan foto</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="wizard-parent" role="tabpanel">
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
                                     <!-- Steps Navigation -->
                                    <div class="block-content block-content-sm block-content-full rounded-bottom">
                                        <div class="row">
                                            <div class="col-6">
                                                <button type="button" class="btn btn-secondary" data-wizard="prev">
                                                    <i class="fa fa-angle-left mr-1"></i> Sebelumnya
                                                </button>
                                            </div>
                                            <div class="col-6 text-right">
                                                <button type="button" class="btn btn-secondary" data-wizard="next">
                                                    Selanjutnya <i class="fa fa-angle-right ml-1"></i>
                                                </button>
                                                <button type="submit" name="submit" class="btn btn-primary" data-wizard="finish">
                                                    <i class="fa fa-check mr-1"></i> Simpan
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Steps Navigation -->
                                </div>
                            </form>
                            <div class="text-left">
                                <a href="<?=base_url('wargabelajar');?>">
                                    <button type="button" class="btn btn-light">Kembali</button>
                                </a>
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
