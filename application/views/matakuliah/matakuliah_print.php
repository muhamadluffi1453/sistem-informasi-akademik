<!DOCTYPE html>
<html>
<head>
	<title>Data Matakuliah</title>
</head>
<body>
<h1 align="center">DATA MATAKULIAH</h1>


	<table border="1" cellpadding="10" cellspacing="0" align="center">
		<tr>
			<th>NO</th>
			<th>KODE MATAKULIAH</th>
			<th>NAMA MATAKULIAH</th>
			<th>SKS</th>
			<th>SEMESTER</th>
			<th>PROGRAM STUDI</th>
		</tr>

		<?php 
		$no=1;
		foreach($matakuliah as $mtk): ?>

		<tr>
			<td><?= $no++ ?></td>
			<td><?= $mtk->kode_matakuliah ?></td>
			<td><?= $mtk->nama_matakuliah ?></td>
			<td><?= $mtk->sks ?></td>
			<td><?= $mtk->semester ?></td>
			<td><?= $mtk->nama_prodi?></td>
		</tr>
	<?php endforeach; ?>
	</table>

	<script type="text/javascript">
		window.print();
	</script>

</body>
</html>