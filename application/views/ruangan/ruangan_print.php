<!DOCTYPE html>
<html>
<head>
	<title>Data Ruangan</title>
</head>
<body>

	<center>
	<img width="100px" src="<?= base_url('assets/img/umc.png') ?>">
<h1 align="center">DATA RUANGAN</h1>
<h3 align="center"> UNIVERSITAS MUHAMMADIYAH CIREBON</h3>
</center>



	<table border="1" cellpadding="10" cellspacing="0" align="center">
		<tr>
			<th>NO</th>
			<th>KODE RUANGAN</th>
			<th>NAMA RUANGAN</th>
			<th>FAKULTAS</th>
		</tr>

		<?php 
		$no=1;
		foreach($ruangan as $rng): ?>

		<tr>
			<td><?= $no++ ?></td>
			<td><?= $rng->kode_ruangan ?></td>
			<td><?= $rng->nama_ruangan ?></td>
			<td><?= $rng->fakultas ?></td>
		</tr>
	<?php endforeach; ?>
	</table>

	<script type="text/javascript">
		window.print();
	</script>

</body>
</html>
