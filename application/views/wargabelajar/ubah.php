<?php $this->load->view('head') ?>
<?php $this->load->view('wargabelajar/nav_tambah') ?>

<!-- Main Container -->
<main id="main-container">

    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item"><?= $actor; ?></li>
                        <li class="breadcrumb-item"><?= $title; ?></li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href=""><?= $wargabelajar->wargabelajar_nama ?></a>
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
                                    <a class="nav-link" href="#btabs-animated-slideright-profile">Orang Tua/Wali</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#ubah-password">Ubah Password</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#data-kelulusan">Data Kelulusan</a>
                                </li>
                            </ul>
                            <div class="block-content tab-content overflow-hidden">
                                <div class="tab-pane fade fade-right show active" id="btabs-animated-slideright-home" role="tabpanel">
                                <form action="<?php base_url("wargabelajar/ubah") ?>" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?= $wargabelajar->wargabelajar_id; ?>">
                                    <div class="form-group">
                                        <label for="wargabelajar_nomor_induk">Nomor Induk</label>
                                        <input type="text" class="form-control" id="wargabelajar_nomor_induk" name="wargabelajar_nomor_induk" value="<?= $wargabelajar->wargabelajar_nomor_induk; ?>">
                                        <small class="form-text text-danger"><?= form_error('wargabelajar_nomor_induk'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="wargabelajar_nisn">NISN</label>
                                        <input type="text" class="form-control" id="wargabelajar_nisn" name="wargabelajar_nisn" value="<?= $wargabelajar->wargabelajar_nisn; ?>">
                                        <small class="form-text text-danger"><?= form_error('wargabelajar_nisn'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="wargabelajar_nama">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="wargabelajar_nama" name="wargabelajar_nama" value="<?= $wargabelajar->wargabelajar_nama; ?>">
                                        <small class="form-text text-danger"><?= form_error('wargabelajar_nama'); ?></small>
                                    </div>
                                    <div class="form-grup">
                                        <label class="d-block">Jenis Kelamin</label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" class="custom-control-input" id="tutor_jenis_kelamin-1" name="wargabelajar_jenis_kelamin" value="Pria" <?php if ($wargabelajar->wargabelajar_jenis_kelamin == "Pria") echo "checked"; ?>>
                                                <label class="custom-control-label" for="wargabelajar_jenis_kelamin-1" value="Pria">Pria</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" class="custom-control-input" id="wargabelajar_jenis_kelamin-2" name="wargabelajar_jenis_kelamin" value="Wanita" <?php if ($wargabelajar->wargabelajar_jenis_kelamin == "Wanita") echo "checked"; ?>>
                                                <label class="custom-control-label" for="wargabelajar_jenis_kelamin-2" value="Wanita">Wanita</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="wargabelajar_tempat_lahir">Tempat Lahir</label>
                                        <input type="text" class="form-control" id="wargabelajar_tempat_lahir" name="wargabelajar_tempat_lahir" value="<?= $wargabelajar->wargabelajar_tempat_lahir; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="wargabelajar_tanggal_lahir">Tanggal Lahir</label>
                                        <input type="date" class="js-flatpickr form-control bg-white js-flatpickr-enabled flatpickr-input active" id="wargabelajar_tanggal_lahir" name="wargabelajar_tanggal_lahir" value="<?= $wargabelajar->wargabelajar_tanggal_lahir; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="wargabelajar_agama">Agama</label>
                                        <select class="custom-select" id="wargabelajar_agama" name="wargabelajar_agama">
                                            <option value="0">Please select</option>
                                            <option value="Islam" <?php if ($wargabelajar->wargabelajar_agama == "Islam") echo "selected"; ?>>Islam</option>
                                            <option value="Kristen Protestan" <?php if ($wargabelajar->wargabelajar_agama == "Kristen Protestan") echo "selected"; ?>>Kristen Protestan</option>
                                            <option value="Kristen Katolik" <?php if ($wargabelajar->wargabelajar_agama == "Kristen Katolik") echo "selected"; ?>>Kristen Katolik</option>
                                            <option value="Hindu" <?php if ($wargabelajar->wargabelajar_agama == "Hindu") echo "selected"; ?>>Hindu</option>
                                            <option value="Buddha" <?php if ($wargabelajar->wargabelajar_agama == "Buddha") echo "selected"; ?>>Buddha</option>
                                            <option value="Kong Hu Cu" <?php if ($wargabelajar->wargabelajar_agama == "Kong Hu Cu") echo "selected"; ?>>Kong Hu Cu</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="d-block">Kewarganegaraan</label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" id="wargabelajar_kewarganegaraan-1" name="wargabelajar_kewarganegaraan" value="WNA" <?php if ($wargabelajar->wargabelajar_kewarganegaraan == "WNA") echo "checked"; ?>>
                                            <label class="custom-control-label" for="wargabelajar_kewarganegaraan-1">WNA</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" id="wargabelajar_kewarganegaraan-2" name="wargabelajar_kewarganegaraan" value="WNI" <?php if ($wargabelajar->wargabelajar_kewarganegaraan == "WNI") echo "checked"; ?>>
                                            <label class="custom-control-label" for="wargabelajar_kewarganegaraan-2">WNI</label>
                                        </div>
                                    </div>
                                    <div class="form-grup">
                                        <label for="wargabelajar_alamat_jalan">Alamat</label>
                                        <input type="text" class="form-control" id="wargabelajar_alamat_jalan" name="wargabelajar_alamat_jalan" value="<?= $wargabelajar->wargabelajar_alamat_jalan; ?>">
                                    </div>
                                        <div class="form-grup">
                                        <label for="wargabelajar_alamat_rtrw">RT/RW</label>
                                        <input type="text" class="form-control" id="wargabelajar_alamat_rtrw" name="wargabelajar_alamat_rtrw" value="<?= $wargabelajar->wargabelajar_alamat_rtrw; ?>">
                                    </div>
                                    <div class="form-grup">
                                        <label for="wargabelajar_alamat_desa">Desa/Kelurahan</label>
                                        <input type="text" class="form-control" id="wargabelajar_alamat_desa" name="wargabelajar_alamat_desa" value="<?= $wargabelajar->wargabelajar_alamat_desa; ?>">
                                    </div>
                                    <div class="form-grup">
                                        <label for="wargabelajar_alamat_kecamatan">Kecamatan</label>
                                        <input type="text" class="form-control" id="wargabelajar_alamat_kecamatan" name="wargabelajar_alamat_kecamatan" value="<?= $wargabelajar->wargabelajar_alamat_kecamatan; ?>">
                                    </div>
                                    <div class="form-grup">
                                        <label for="wargabelajar_alamat_kabupaten">Kota/Kabupaten</label>
                                        <input type="text" class="form-control" id="wargabelajar_alamat_kabupaten" name="wargabelajar_alamat_kabupaten" value="<?= $wargabelajar->wargabelajar_alamat_kabupaten; ?>">
                                    </div>
                                    <div class="form-grup">
                                        <label for="wargabelajar_alamat_provinsi">Provinsi</label>
                                        <input type="text" class="form-control" id="wargabelajar_alamat_provinsi" name="wargabelajar_alamat_provinsi" value="<?= $wargabelajar->wargabelajar_alamat_provinsi; ?>">
                                    </div>
                                    <div class="form-grup">
                                        <label for="wargabelajar_alamat_kabupaten">KODE POS</label>
                                        <input type="text" class="form-control" id="wargabelajar_alamat_kodepos" name="wargabelajar_alamat_kodepos" value="<?= $wargabelajar->wargabelajar_alamat_kodepos; ?>">
                                    </div>
                                    <div class="form-grup">
                                        <label for="wargabelajar_alamat_jalan">Nama Sekolah/Kejar</label>
                                        <input type="text" class="form-control" id="wargabelajar_kejar" name="wargabelajar_kejar" value="<?=$wargabelajar->wargabelajar_kejar?>">
                                        <small class="form-text text-danger"><?= form_error('wargabelajar_kejar'); ?></small>
                                    </div>
                                    <div class="form-grup">
                                        <label for="wargabelajar_alamat_jalan">Alamat Sekolah Kejar</label>
                                        <input type="text" class="form-control" id="wargabelajar_kejar_alamat" name="wargabelajar_kejar_alamat" value="<?=$wargabelajar->wargabelajar_kejar_alamat?>">
                                        <small class="form-text text-danger"><?= form_error('wargabelajar_kejar_alamat'); ?></small>
                                    </div>
                                    <div class="form-grup">
                                        <label for="wargabelajar_sttb">Nomor dan Tahun STTB/STSB</label>
                                        <input type="text" class="form-control" id="wargabelajar_sttb" name="wargabelajar_sttb" value="<?=$wargabelajar->wargabelajar_sttb?>">
                                        <small class="form-text text-danger"><?= form_error('wargabelajar_sttb'); ?></small>
                                    </div>
                                    <div class="form-grup">
                                        <label for="wargabelajar_masuk">Tanggal Masuk</label>
                                        <input type="date" class="js-flatpickr form-control bg-white js-flatpickr-enabled flatpickr-input active" id="wargabelajar_masuk" name="wargabelajar_masuk" value="<?=$wargabelajar->wargabelajar_masuk?>">
                                    </div>
                                    <div class="form-grup">
                                        <label for="wargabelajar_alamat_kabupaten">Tahun Ajaran Masuk</label>
                                        <select class="custom-select" id="tahunajaran_id" name="tahunajaran_id">
                                            <option>Silahkan Pilih</option>
                                                <?php foreach ($tahunajaran_all as $tahunajaran) : ?>
                                                    <option value="<?= $tahunajaran->tahunajaran_id ?>" <?php if ($wargabelajar->tahunajaran_id == $tahunajaran->tahunajaran_id) echo 'selected' ?>><?= $tahunajaran->tahunajaran_nama ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Foto Warga Belajar</label>
                                        <div class="custom-file">
                                        <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                            <input type="file" class="custom-file-input js-custom-file-input-enabled" data-toggle="custom-file-input" id="wargabelajar_foto" name="wargabelajar_foto">
                                            <label class="custom-file-label" for="wargabelajar_foto">Silahkan masukan foto</label>
                                            <input type="hidden" name="old_image" value="<?= $wargabelajar->wargabelajar_foto ?>">
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
                                <div class="tab-pane fade fade-right" id="btabs-animated-slideright-profile" role="tabpanel">
                                <form action="<?php echo base_url("wargabelajar/ubah_orangtua") ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $wargabelajar->wargabelajar_id; ?>">
                                    <div class="form-group">
                                        <label for="orangtua_ayah_nama">Nama Lengkap Ayah</label>
                                        <input type="text" class="form-control" id="orangtua_ayah_nama" name="orangtua_ayah_nama" value="<?= $wargabelajar->orangtua_ayah_nama; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="orangtua_ibu_nama">Nama Lengkap Ibu</label>
                                        <input type="text" class="form-control" id="orangtua_ibu_nama" name="orangtua_ibu_nama" value="<?= $wargabelajar->orangtua_ibu_nama; ?>">
                                    </div>
                                    <div class="form-grup">
                                        <label for="orangtua_ayah_pekerjaan">Pekerjaan</label>
                                        <input type="text" class="form-control" id="orangtua_ayah_pekerjaan" name="orangtua_ayah_pekerjaan" value="<?= $wargabelajar->orangtua_ayah_pekerjaan; ?>">
                                    </div>
                                        <div class="form-grup">
                                            <label for="orangtua_ayah_alamat_jalan">Alamat</label>
                                            <input type="text" class="form-control" id="orangtua_ayah_alamat_jalan" name="orangtua_ayah_alamat_jalan" value="<?= $wargabelajar->orangtua_ayah_alamat_jalan; ?>">
                                        </div>
                                        <div class="form-grup">
                                            <label for="orangtua_ayah_alamat_rtrw">RT/RW</label>
                                            <input type="text" class="form-control" id="orangtua_ayah_alamat_rtrw" name="orangtua_ayah_alamat_rtrw" value="<?= $wargabelajar->orangtua_ayah_alamat_rtrw; ?>">
                                        </div>
                                        <div class="form-grup">
                                            <label for="orangtua_ayah_alamat_desa">Desa/Kelurahan</label>
                                            <input type="text" class="form-control" id="orangtua_ayah_alamat_desa" name="orangtua_ayah_alamat_desa" value="<?= $wargabelajar->orangtua_ayah_alamat_desa; ?>">
                                        </div>
                                        <div class="form-grup">
                                            <label for="orangtua_ayah_alamat_kecamatan">Kecamatan</label>
                                            <input type="text" class="form-control" id="orangtua_ayah_alamat_kecamatan" name="orangtua_ayah_alamat_kecamatan" value="<?= $wargabelajar->orangtua_ayah_alamat_kecamatan; ?>">
                                        </div>
                                        <div class="form-grup">
                                            <label for="orangtua_ayah_alamat_kabupaten">Kota/Kabupaten</label>
                                            <input type="text" class="form-control" id="orangtua_ayah_alamat_kabupaten" name="orangtua_ayah_alamat_kabupaten" value="<?= $wargabelajar->orangtua_ayah_alamat_kabupaten; ?>">
                                        </div>
                                        <div class="form-grup">
                                            <label for="orangtua_ayah_alamat_provinsi">Provinsi</label>
                                            <input type="text" class="form-control" id="orangtua_ayah_alamat_provinsi" name="orangtua_ayah_alamat_provinsi" value="<?= $wargabelajar->orangtua_ayah_alamat_provinsi; ?>">
                                        </div>
                                        <div class="form-grup">
                                            <label for="orangtua_ayah_alamat_kodepos">KODE POS</label>
                                            <input type="text" class="form-control" id="orangtua_ayah_alamat_kodepos" name="orangtua_ayah_alamat_kodepos" value="<?= $wargabelajar->orangtua_ayah_alamat_kodepos; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="orangtua_wali_nama">Nama Lengkap Wali</label>
                                            <input type="text" class="form-control" id="orangtua_wali_nama" name="orangtua_wali_nama" value="<?= $wargabelajar->orangtua_wali_nama; ?>">
                                        </div>
                                        <div class="form-grup">
                                            <label for="orangtua_wali_pekerjaan">Pekerjaan</label>
                                            <input type="text" class="form-control" id="orangtua_wali_pekerjaan" name="orangtua_wali_pekerjaan" value="<?= $wargabelajar->orangtua_wali_pekerjaan; ?>">
                                        </div>
                                        <div class="form-grup">
                                            <label for="orangtua_wali_alamat_jalan">Alamat</label>
                                            <input type="text" class="form-control" id="orangtua_wali_alamat_jalan" name="orangtua_wali_alamat_jalan" value="<?= $wargabelajar->orangtua_wali_alamat_jalan; ?>">
                                        </div>
                                        <div class="form-grup">
                                            <label for="orangtua_wali_alamat_rtrw">RT/RW</label>
                                            <input type="text" class="form-control" id="orangtua_wali_alamat_rtrw" name="orangtua_wali_alamat_rtrw" value="<?= $wargabelajar->orangtua_wali_alamat_rtrw; ?>">
                                        </div>
                                        <div class="form-grup">
                                            <label for="orangtua_wali_alamat_desa">Desa/Kelurahan</label>
                                            <input type="text" class="form-control" id="orangtua_wali_alamat_desa" name="orangtua_wali_alamat_desa" value="<?= $wargabelajar->orangtua_wali_alamat_desa; ?>">
                                        </div>
                                        <div class="form-grup">
                                            <label for="orangtua_wali_alamat_kecamatan">Kecamatan</label>
                                            <input type="text" class="form-control" id="orangtua_wali_alamat_kecamatan" name="orangtua_wali_alamat_kecamatan" value="<?= $wargabelajar->orangtua_wali_alamat_kecamatan; ?>">
                                        </div>
                                        <div class="form-grup">
                                            <label for="orangtua_wali_alamat_kabupaten">Kota/Kabupaten</label>
                                            <input type="text" class="form-control" id="orangtua_wali_alamat_kabupaten" name="orangtua_wali_alamat_kabupaten" value="<?= $wargabelajar->orangtua_wali_alamat_kabupaten; ?>">
                                        </div>
                                        <div class="form-grup">
                                            <label for="orangtua_wali_alamat_provinsi">Provinsi</label>
                                            <input type="text" class="form-control" id="orangtua_wali_alamat_provinsi" name="orangtua_wali_alamat_provinsi" value="<?= $wargabelajar->orangtua_wali_alamat_provinsi; ?>">
                                        </div>
                                        <div class="form-grup">
                                            <label for="orangtua_wali_alamat_kodepos">KODE POS</label>
                                            <input type="text" class="form-control" id="orangtua_wali_alamat_kodepos" name="orangtua_wali_alamat_kodepos" value="<?= $wargabelajar->orangtua_wali_alamat_kodepos; ?>">
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
                                <div class="tab-pane fade fade-right" id="ubah-password">
                                <form action="<?php echo base_url("wargabelajar/ubah_password") ?>" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?= $wargabelajar->wargabelajar_id; ?>">
                                        <div class="form-group">
                                            <label for="password">Password Baru</label>
                                            <input type="password" class="form-control" id="wargabelajar_password" name="wargabelajar_password" placeholder="Masukan Password Baru">
                                            <small class="form-text text-danger"><?= form_error('wargabelajar_password'); ?></small>
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
                                <div class="tab-pane fade fade-right" id="data-kelulusan">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi perspiciatis recusandae aspernatur facilis ipsa hic, temporibus labore voluptate aut reiciendis a voluptatibus expedita sit iusto fugiat alias! Eveniet, autem impedit.</p>
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
<?php $this->load->view('foot') ?>