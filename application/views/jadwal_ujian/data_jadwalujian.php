<div class="container-fluid">
	<div class="alert alert-success">
		<i class="fas fa-university"></i> HALAMAN DATA JADWAL UJIAN
	</div>

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

	<?= anchor('tatausaha/jadwal_ujian/tambah_jadwal_ujian/'.$nama_prodi.'/'.$nama_ujian, '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Jadwal Ujian</button>')
	 ?>

	<a href="<?= base_url('tatausaha/jadwal_ujian/print_ujian/').$nama_prodi.'/'.$nama_ujian ?>" target="_blank" class="btn btn-info"><i class="fas fa-print">Print</i></a>


	
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
			<th colspan="2">AKSI</th>
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

			<td width="20px"><?= anchor('tatausaha/jadwal_ujian/update/'.$nama_prodi.'/'.$ujn->id_jdlujian.'/'.$nama_ujian, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
     		<td width="20px"><?= anchor('tatausaha/jadwal_ujian/delete/'.$nama_prodi.'/'.$ujn->id_jdlujian.'/'.$nama_ujian, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
     		</tr>
		<?php endforeach; ?>
		<?php $i++; ?>
	</table>
</div>