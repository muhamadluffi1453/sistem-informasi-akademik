<!DOCTYPE html>
<html>
<head>
	<title>Data Dosen</title>
</head>
<body>
<h1 align="center">DATA DOSEN</h1>
<h3 align="center"> UNIVERSITAS MUHAMMADIYAH CIREBON</h3>



	<table border="1" cellpadding="10" cellspacing="0" align="center">
		<tr>
			<th>NO</th>
			<th>PRODI</th>
			<th>NIDN</th>
			<th>NAMA DOSEN</th>
			<th>JENIS KELAMIN</th>
			<th>JABATAN FUNGSIONAL</th>
			<th>PENDIDIKAN TERTINGGI</th>
			<th>STATUS IKATAN KERJA</th>
		</tr>

		<?php $i=1; ?>
		<?php foreach($dosen as $dsn): ?>

		<tr>
			<td><?= $i++ ?></td>
			<td><?= $dsn['nama_prodi']; ?></td>
			<td><?= $dsn['nidn']; ?></td>
			<td><?= $dsn['nama_dosen']; ?></td>
			<td><?= $dsn['jenis_kelamin']; ?></td>
			<td><?= $dsn['jabatan_fung']; ?></td>
			<td><?= $dsn['pend_tertinggi']; ?></td>
			<td><?= $dsn['status_iker']; ?></td>
		</tr>
	<?php endforeach; ?>
	<?php $i++ ?>
	</table>

	<script type="text/javascript">
		window.print();
	</script>

</body>
</html>