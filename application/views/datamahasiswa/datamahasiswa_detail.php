<div class="container-fluid">
	
	<div class="alert alert-success" role="alert">
      <i class="fas fa-eye"></i> DETAIL MAHASISWA
  </div>

  <table class="table table-hover table-bordered table-striped ">
  	
  	<?php foreach($detail as $dt) : ?>
  	
  	<img class="mb-5"src="<?= base_url('assets/uploads/').$dt->photo ?>" style="width:20%">

  	<tr>
  		<td>NAMA</td>
  		<td><?= $dt->nama; ?></td>
  	</tr>

  	<tr>
  		<td>NIM</td>
  		<td><?= $dt->nim; ?></td>
  	</tr>

  	<tr>
  		<td>EMAIL</td>
  		<td><?= $dt->email; ?></td>
  	</tr>

  	<tr>
  		<td>NAMA PRODI</td>
  		<td><?= $dt->nama_prodi; ?></td>
  	</tr>

  	<tr>
  		<td>FAKULTAS</td>
  		<td><?= $dt->fakultas; ?></td>
  	</tr>

  	<tr>
  		<td>TANGGAL LAHIR</td>
  		<td><?= $dt->tgl_lahir; ?></td>
  	</tr>

  	<tr>
  		<td>TEMPAT LAHIR</td>
  		<td><?= $dt->tempat_lahir; ?></td>
  	</tr>

  	<tr>
  		<td>JENIS KELAMIN</td>
  		<td><?= $dt->jenis_kelamin; ?></td>
  	</tr>

  	<tr>
  		<td>AGAMA</td>
  		<td><?= $dt->agama; ?></td>
  	</tr>

  	<tr>
  		<td>ALAMAT</td>
  		<td><?= $dt->alamat; ?></td>
  	</tr>

  	<tr>
  		<td>TELEPON</td>
  		<td><?= $dt->telepon; ?></td>
  	</tr>
  	<?php endforeach; ?>
  </table>
  <?= anchor('datamahasiswa/index', '<div class="btn btn-sm btn-primary">Kembali</div>') ?><br><br><br><br>
 </div>