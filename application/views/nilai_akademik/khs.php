<div class="container-fluid">
	
	<div class="alert alert-success" role="alert">
	    <i class="fas fa-university"></i> KARTU HASIL STUDI (KHS)
	</div>

	<center class="mb-3">
		<legend class="mt-3"><strong>KARTU HASIL STUDI</strong></legend>

		<table>
			<tr>
				<td><strong>NIM</strong></td>
				<td>&nbsp;:	<?= $mhs_nim ?></td>
			</tr>

			<tr>
				<td><strong>Nama Lengkap</strong></td>
				<td>&nbsp;:	<?= $mhs_nama ?></td>
			</tr>

			<tr>
				<td><strong>Program Studi</strong></td>
				<td>&nbsp;:	<?= $mhs_prodi ?></td>
			</tr>

			<tr>
				<td><strong>Tahun Akademik (Semester)</strong></td>
				<td>&nbsp;:	<?= $thn_akad ?></td>
			</tr>
		</table>
	</center>

	<table class="table table-bordered table-hover table-striped">
		<tr>
			<th>NO</th>
			<th>KODE MATA KULIAH</th>
			<th>NAMA MATA KULIAH</th>
			<th>SKS</th>
			<th>NILAI</th>
			<th>SKOR</th>
		</tr>

		<?php $i = 1 ?>
		<?php $jumlahSks = 0; ?>
		<?php $jumlahNilai = 0; ?>
		<?php foreach($mhs_data as $row) : ?>

			<tr>
				<td width="20px"><?= $i; ?></td>
				<td><?= $row->kode_matakuliah;  ?></td>
				<td><?= $row->nama_matakuliah; ?></td>
				<td align="center"><?= $row->sks; ?></td>
				<td align="center"><?= $row->nilai; ?></td>
				<td align="center"><?= skorNilai($row->nilai,$row->sks) ?></td>
				<?php 
				$jumlahSks+=$row->sks;
				$jumlahNilai+=skorNilai($row->nilai,$row->sks);
				 ?>

			</tr>

			<?php $i++; ?>
		<?php endforeach; ?>
		<tr>
			<td colspan="3">Jumlah</td>
			<td align="center"><?= $jumlahSks ?></td>
			<td></td>
			<td align="center"><?= $jumlahNilai ?></td>	
		</tr>

	</table>

	Index Prestasi: <?= number_format($jumlahNilai/$jumlahSks,2); ?>
</div>