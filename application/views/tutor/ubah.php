<?php
    var_dump($tutor);
?>
<form action="<?=base_url('tutor/ubah')?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="tutor_id" value="<?=$tutor["tutor_id"];?>"/>
    <label for="tutor_nip">NIP</label><br>
    <input type="text" name="tutor_nip" id="tutor_nip" value="<?=$tutor["tutor_nip"];?>"/><br>
    <label for="tutor_nama">Nama</label><br>
    <input type="text" name="tutor_nama" id="tutor_nama" value="<?=$tutor["tutor_nama"];?>"/><br>
    <label for="tutor_agama">Agama</label><br>
    <select name="tutor_agama" id="tutor_agama">
        <option value="" selected>Silahkan Pilih</option>
        <option value="Islam">Islam</option>
        <option value="Kristen Protestan">Kristen Protestan</option>
        <option value="Katolik">Katolik</option>
        <option value="Hindu">Hindu</option>
        <option value="Buddha">Buddha</option>
        <option value="Kong Hu Cu">Kong Hu Cu</option>
    </select><br>
    <label for="tutor_kewarganegaraan">Kewarganegaraan</label><br>
    <select name="tutor_kewarganegaraan" id="tutor_kewarganegaraan">
        <option value="" selected>Silahkan Pilih</option>
        <option value="WNA">WNA</option>
        <option value="WNI">WNI</option>
    </select><br>
    <label for="tutor_pendidikan_terakhir">Pendidikan Terakhir</label><br>
    <select name="tutor_pendidikan_terakhir" id="tutor_pendidikan_terakhir">
        <option value="" selected>Silahkan Pilih</option>
        <option value="SLTA">SLTA</option>
        <option value="D3">D3</option>
        <option value="D4">D4</option>
        <option value="S1">S1</option>
        <option value="S2">S2</option>
        <option value="S3">S3</option>
    </select><br>
    <label for="tutor_alamat_jalan">Alamat Jalan</label><br>
    <textarea name="tutor_alamat_jalan" id="tutor_alamat_jalan" cols="20" rows="5">
    </textarea><br>
    <label for="tutor_alamat_rtrw">RT/RW</label><br>
    <input type="text" name="tutor_alamat_rtrw" id="tutor_alamat_rtrw"><br>
    <label for="tutor_alamat_desa">Desa/Kelurahan</label><br>
    <input type="text" name="tutor_alamat_desa" id="tutor_alamat_desa"><br>
    <label for="tutor_alamat_kecamatan">Kecamatan</label><br>
    <input type="text" name="tutor_alamat_kecamatan" id="tutor_alamat_kecamatan"><br>
    <label for="tutor_alamat_kabupaten">Kabupaten/Kota</label><br>
    <input type="text" name="tutor_alamat_kabupaten" id="tutor_alamat_kabupaten"><br>
    <label for="tutor_alamat_provinsi">Provinsi</label><br>
    <input type="text" name="tutor_alamat_provinsi" id="tutor_alamat_provinsi"><br>
    <label for="tutor_alamat_kodepos">Kode POS</label><br>
    <input type="text" name="tutor_alamat_kodepos" id="tutor_alamat_kodepos"><br>
    <label for="tutor_foto">Foto</label><br>
    <input type="file" name="tutor_foto" id="tutor_foto"><br><br>
    <button type="submit" name="submit">Simpan</button> <button type="reset">Hapus</button>


</form>