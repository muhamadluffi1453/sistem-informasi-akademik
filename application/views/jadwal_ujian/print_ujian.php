<div class="container-fluid">
	
	<center class="mb-3">
		<legend class="mt-3"><strong>JADWAL UJIAN</strong></legend>
<?php $prodi=$this->jadwalujian_model->nama_prodi($nama_prodi); 
?>
<?php $ujian=$this->jadwalujian_model->nama_ujian($nama_ujian) ?>
		<table>
			
			<tr>
				<td><strong>Program Studi</strong></td>
				<td>&nbsp;:	<?=$prodi[0]['nama_prodi']?></td>
			</tr>

			<tr>
				<td><strong>Ujian</strong></td>
				<td>&nbsp;:	<?= $ujian[0]['nama_ujian'] ?></td>
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

	<script type="text/javascript">
		window.print();
	</script>
</div>