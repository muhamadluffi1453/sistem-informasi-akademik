
<!DOCTYPE html>
<html>
<head>
	<title>Transkrip Nilai</title>
</head>

<body>

	<center>
	<img width="100px" src="<?= base_url('assets/img/umc.png') ?>">
	
	<h3 align="center"> UNIVERSITAS MUHAMMADIYAH CIREBON</h3>
	</center>

	<center>
		<legend><strong>TRANSKRIP NILAI</strong></legend>

		<table>
			<tr>
				<td>NIM</td>
				<td>: <?= $nim; ?></td>
			</tr>

			<tr>
				<td>Nama</td>
				<td>: <?= $nama; ?></td>
			</tr>
			
			<tr>		
				<td>Program Studi</td>
				<td>: <?= $prodi; ?></td>
			</tr>
		</table>
	</center>

	<table border="1" cellpadding="10" cellspacing="0" align="center">
		<tr>
			<th>NO</th>
			<th>KODE MATAKULIAH</th>
			<th>NAMA MATAKULIAH</th>
			<th>SKS</th>
			<th>NILAI</th>
			<th>MUTU NILAI</th>
		</tr>

		<?php

		$no=1;
			$JSks=0;
			$JSkor=0;
		foreach($transkrip as $mhs): ?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $mhs['kode_matakuliah'] ?></td>
				<td><?= $mhs['nama_matakuliah'] ?></td>
				<td><?= $mhs['sks'] ?></td>
				<td><?= konvert($mhs['nilai']); ?></td>
				<td text-align="center"><?= skorNilai($mhs['nilai'],$mhs['sks']);?></td>

				<?php 
						$JSks+=$mhs['sks'];
						$JSkor+=skorNilai($mhs['nilai'],$mhs['sks']);
					 ?>
				
			</tr>
		<?php endforeach; ?>
		<tr>
				<td colspan="3">Jumlah</td>
				<td align="center"><?= $JSks ?></td>
				<td></td>
				<td align="center"><?= $JSkor ?></td>
			</tr>
	</table>
	

	<p class="text-center">Indeks Prestrasi Kumulatif : <?= number_format($JSkor/$JSks,2) ?></p>

	<script type="text/javascript">
		window.print();
	</script>

</body>
</html>