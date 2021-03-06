<div class="container-fluid">
	<div class="alert alert-success">
		<i class="fas fa-university"></i> HALAMAN DATA JADWAL UJIAN
	</div>

	<center class="mb-3">
		<legend class="mb-3"><strong>INFORMASI JADWAL UJIAN</strong></legend>
	<?php $prodi=$this->info_ujian_model->nama_prodi($nama_prodi);?>
	<?php $ujian=$this->info_ujian_model->nama_ujian($nama_ujian) ?>
		<table>
			<tr>
				<td><strong>Program Studi</strong></td>
				<td>&nbsp;: <?= $prodi[0]['nama_prodi'] ?></td>
			</tr>

			<tr>
				<td><strong>Ujian</strong></td>
				<td>&nbsp;: <?= $ujian[0]['nama_ujian'] ?></td>
			</tr>
		</table>
	</center>

	<table class="table table-bordered table-striped table-hover">
		<tr>
			<th>NO</th>
			<th>NAMA MATAKULIAH</th>
			<th>SKS</th>
			<th>SEMESTER</th>
			<th>PENGAWAS</th>
			<th>PRODI</th>
			<th>RUANGAN</th>
			<th>HARI</th>
			<th>JAM</th>
			
		</tr>
		<?php $i=1 ?>
		<?php foreach($join_ujian as $ujn) :?>
			<tr>
			<th><?= $i++;  ?></th>
			<td><?= $ujn->nama_matakuliah; ?></td>
			<td><?= $ujn->sks; ?></td>
			<td><?= $ujn->semester; ?></td>
			<td><?= $ujn->nama_dosen; ?></td>
			<td><?= $ujn->nama_prodi;  ?></td>
			<td><?= $ujn->nama_ruangan; ?></td>
			<td><?= $ujn->hari; ?></td>
			<td><?= $ujn->jam; ?></td>
     		</tr>
		<?php endforeach; ?>
		<?php $i++; ?>
	</table>
</div>