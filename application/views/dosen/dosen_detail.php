<div class="container-fluid">
	
	<div class="alert alert-success" role="alert">
      <i class="fas fa-eye"></i> DETAIL DOSEN
  </div>

  <table class="table table-hover table-bordered table-striped ">
  	
  	<?php foreach($detail as $dt) : ?>

    <tr>
      <td>PRODI</td>
      <td><?= $dt->nama_prodi; ?></td>
    </tr>

  	<tr>
  		<td>NIDN</td>
  		<td><?= $dt->nidn; ?></td>
  	</tr>

  	<tr>
  		<td>NAMA DOSEN</td>
  		<td><?= $dt->nama_dosen; ?></td>
  	</tr>

    <tr>
      <td>JENIS KELAMIN</td>
      <td><?= $dt->jenis_kelamin; ?></td>
    </tr>

  	<tr>
  		<td>JABATAN FUNGSIONAL</td>
  		<td><?= $dt->jabatan_fung; ?></td>
  	</tr>

    <tr>
      <td>PENDIDIKAN TERTINGGI</td>
      <td><?= $dt->pend_tertinggi; ?></td>
    </tr>

    <tr>
      <td>STATUS IKATAN KERJA</td>
      <td><?= $dt->status_iker; ?></td>
    </tr>
  	
  	<?php endforeach; ?>
  </table>
  <?= anchor('tatausaha/dosen/index', '<div class="btn btn-sm btn-primary">Kembali</div>') ?><br><br><br><br>
 </div>