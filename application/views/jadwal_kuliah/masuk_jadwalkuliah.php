<div class="container-fluid">
	<div class="alert alert-success">
		<i class="fas fa-university"></i> FORM  HALAMAN JADWAL KULIAH
	</div>

	<center class="mb-3">
		<legend class="mt-3"><strong>JADWAL KULIAH</strong></legend>
		<?php $prodi=$this->jadwalkuliah_model->nama_prodi($nama_prodi);?>
		<table>
			
			<tr>
				<td><strong>Program Studi</strong></td>
				<td>&nbsp;:	<?= $prodi[0]['nama_prodi'] ?></td>

				
			
			</tr>

		
		</table>
		
	</center>

	
	<table class="table table-bordered table-striped table-hover">
		<tr>
			<th>NO</th>
			<th>NAMA MATAKULIAH</th>
			<th>SKS</th>
			<th>SEMESTER</th>
			<th>DOSEN</th>
			<th>PRODI</th>
			<th>RUANGAN</th>
			<th>HARI</th>
			<th>JAM</th>
		</tr>
		<?php $i=1 ?>
		<?php foreach($join_kuliah as $klh) :?>
			<tr>
			<th><?= $i++;  ?></th>
			<td><?= $klh->nama_matakuliah; ?></td>
			<td><?= $klh->sks; ?></td>
			<td><?= $klh->semester; ?></td>
			<td><?= $klh->nama_dosen; ?></td>
			<td><?= $klh->nama_prodi;  ?></td>
			<td><?= $klh->nama_ruangan; ?></td>
			<td><?= $klh->hari; ?></td>
			<td><?= $klh->jam; ?></td>
			
		<?php endforeach; ?>
		<?php $i++; ?>
	</table>
</div>

