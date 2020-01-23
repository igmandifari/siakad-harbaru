<h1 align="center">Data Warga Belajar</h1>
<table>
	<thead>
		<tr>
			<th>NO</th>
			<th>Nomor Induk</th>
			<th>NISN</th>
			<th>Nama</th>
			<th>Jenis Kelamin</th>
			<th>Tempat, Tanggal Lahir</th>
			<th>Agama</th>
			<th>Alamat</th>
			<th>Ayah</th>
			<th>Ibu</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=0; foreach ($wargabelajars as $wargabelajar):$no++?>
			<tr>
				<td><?php echo $no;?></td>
				<td><?php echo $wargabelajar->wargabelajar_nomor_induk;?></td>
				<td><?php echo $wargabelajar->wargabelajar_nisn;?></td>
				<td><?php echo $wargabelajar->wargabelajar_nama;?></td>
				<td><?php echo $wargabelajar->wargabelajar_jenis_kelamin;?></td>
				<td><?php echo $wargabelajar->wargabelajar_tempat_lahir.", ".$wargabelajar->wargabelajar_tanggal_lahir;?></td>
				<td><?php echo $wargabelajar->wargabelajar_agama;?></td>
				<td><?php echo $wargabelajar->wargabelajar_alamat_jalan." ".$wargabelajar->wargabelajar_alamat_rtrw." ".$wargabelajar->wargabelajar_alamat_desa." ".$wargabelajar->wargabelajar_alamat_kecamatan.$wargabelajar->wargabelajar_alamat_kabupaten;?></td>
				<td><?php echo $wargabelajar->orangtua_ayah_nama;?></td>
				<td><?php echo $wargabelajar->orangtua_ibu_nama;?></td>
			</tr>
		<?php endforeach;?>
	</tbody>
</table>