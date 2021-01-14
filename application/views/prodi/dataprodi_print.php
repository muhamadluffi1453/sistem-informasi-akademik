<!DOCTYPE html>
<html>
<head>
	<title>Data Prodi</title>
</head>
<body>
	
	<center>
	<img width="100px" src="<?= base_url('assets/img/umc.png') ?>">
	<h1 align="center">DATA PRODI UNIVERSITAS</h1>
	<h3 align="center"> UNIVERSITAS MUHAMMADIYAH CIREBON</h3>
	</center>

	<table border="1" cellpadding="10" cellspacing="0" align="center">
		<tr>
			<th>NO</th>
			<th>KODE PRODI</th>
			<th>NAMA PRODI</th>
			<th>FAKULTAS</th>
		</tr>

		<?php 
		$no=1;
		foreach($prodi as $prd): ?>

		<tr>
			<td><?= $no++ ?></td>
			<td><?= $prd->kode_prodi ?></td>
			<td><?= $prd->nama_prodi ?></td>
			<td><?= $prd->fakultas ?></td>
		</tr>
	<?php endforeach; ?>
	</table>

	<script type="text/javascript">
		window.print();
	</script>

</body>
</html>