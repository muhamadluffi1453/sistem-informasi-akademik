<!DOCTYPE html>
<html>
<head>
	<title>Data Mahasiswa</title>
</head>
<body>

<center>
	<img width="100px" src="<?= base_url('assets/img/umc.png') ?>">
	<h1 align="center">DATA MAHASISWA</h1>
	<h3 align="center">UNIVERITAS MUHAMMADIYAH CIREBON</h3>
</center>

	<table border="1" cellpadding="10" cellspacing="0">
		<tr>
			<th>NO</th>
			<th>NAMA</th>
			<th>NIM</th>
			<th>EMAIL</th>
			<th>PRODI</th>
			<th>FAKULTAS</th>
			<th>TANGGAL LAHIR</th>
			<th>TEMPAT LAHIR</th>
			<th>JENIS KELAMIN</th>
			<th>AGAMA</th>
			<th>ALAMAT</th>
			<th>TELEPON</th>
		</tr>

		<?php
		$no=1;
		foreach($mahasiswa as $mhs): ?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $mhs->nama ?></td>
				<td><?= $mhs->nim ?></td>
				<td><?= $mhs->email ?></td>
				<td><?= $mhs->nama_prodi ?></td>
				<td><?= $mhs->fakultas ?></td>
				<td><?= $mhs->tgl_lahir ?></td>
				<td><?= $mhs->tempat_lahir ?></td>
				<td><?= $mhs->jenis_kelamin ?></td>
				<td><?= $mhs->agama ?></td>
				<td><?= $mhs->alamat ?></td>
				<td><?= $mhs->telepon ?></td>
			</tr>
		<?php endforeach; ?>
	</table>

	<script type="text/javascript">
		window.print();
	</script>

</body>
</html>