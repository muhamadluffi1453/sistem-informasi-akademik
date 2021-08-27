 
<div class="container-fluid">
	
	<div class="alert alert-success">
		<i class="fas fa-university"></i> FORM  HALAMAN JADWAL MENGAJAR
	</div>

	<center class="mb-3">
		<legend class="mt-3"><strong>JADWAL MENGAJAR</strong></legend>
	<?php $prodi=$this->jadwalmengajar_model->nama_prodi($nama_prodi); ?>
		<table>
			
			<tr>
				<td><strong>Program Studi</strong></td>
				<td>&nbsp;:	<?= $prodi[0]['nama_prodi'] ?></td>
			
			</tr>

		
		</table>
	</center>

	<?= $this->session->flashdata('pesan'); ?>
	
	<?= anchor('tatausaha/jadwal_mengajar/tambah_jadwal/'.$nama_prodi, '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Jadwal Mengajar</button>') ?>

	<a href="<?= base_url('tatausaha/jadwal_ujian/print_mengajar/').$nama_prodi?>" target="_blank" class="btn btn-info"><i class="fas fa-print">Print</i></a>

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
			<th colspan="2">AKSI</th>
		</tr>
		<?php $i=1 ?>
		<?php foreach($join_jadwal as $jdl) :?>
			<tr>
			<th><?= $i++;  ?></th>
			<td><?= $jdl->nama_matakuliah; ?></td>
			<td><?= $jdl->sks; ?></td>
			<td><?= $jdl->semester; ?></td>
			<td><?= $jdl->nama_dosen; ?></td>
			<td><?= $jdl->nama_prodi;  ?></td>
			<td><?= $jdl->nama_ruangan; ?></td>
			<td><?= $jdl->hari; ?></td>
			<td><?= $jdl->jam; ?></td>

			<td width="20px"><?= anchor('tatausaha/jadwal_mengajar/update/'.$nama_prodi.'/'.$jdl->id_jdlmengajar, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
     		<td width="20px"><?= anchor('tatausaha/jadwal_mengajar/delete/'.$nama_prodi.'/'.$jdl->id_jdlmengajar, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
     		</tr>
		<?php endforeach; ?>
		<?php $i++; ?>
	</table>
</div>