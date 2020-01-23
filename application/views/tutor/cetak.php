<h1 align="center">Data Warga Belajar</h1>
<table>
	<thead>
		<tr>
			<th>NO</th>
			<th>Nomor Induk</th>
			<th>Nama</th>
			<th>Jenis Kelamin</th>
			<th>Tempat, Tanggal Lahir</th>
			<th>Agama</th>
			<th>Alamat</th>
			<th>Pendidikan Terakhir</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=0; foreach ($tutors as $tutor):$no++?>
			<tr>
				<td><?php echo $no;?></td>
				<td><?php echo $tutor->tutor_nomor_induk;?></td>
				<td><?php echo $tutor->tutor_nama;?></td>
				<td><?php echo $tutor->tutor_jenis_kelamin;?></td>
				<td><?php echo $tutor->tutor_tempat_lahir.", ".$tutor->tutor_tanggal_lahir;?></td>
				<td><?php echo $tutor->tutor_agama;?></td>
				<td><?php echo $tutor->tutor_alamat_jalan." ".$tutor->tutor_alamat_rtrw." ".$tutor->tutor_alamat_desa." ".$tutor->tutor_alamat_kecamatan.$tutor->tutor_alamat_kabupaten;?></td>
				<td><?php echo $tutor->tutor_pendidikan_terakhir;?></td>
			</tr>
		<?php endforeach;?>
	</tbody>
</table>