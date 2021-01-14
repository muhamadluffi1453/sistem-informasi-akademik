<div class="container-fluid">
	
	<div class="alert alert-success" role="alert">
      <i class="fas fa-eye"></i> DETAIL MATA KULIAH
  </div>

  <table class="table table-hover table-bordered table-striped">
  	
  	<?php foreach($detail as $dt) : ?>

  	<tr>
  		<td>KODE MATAKULIAH</td>
  		<td><?= $dt->kode_matakuliah; ?></td>
  	</tr>

  	<tr>
  		<td>NAMA MATAKULIAH</td>
  		<td><?= $dt->nama_matakuliah; ?></td>
  	</tr>

  	<tr>
  		<td>SKS</td>
  		<td><?= $dt->sks; ?></td>
  	</tr>

  	<tr>
  		<td>SEMESTER</td>
  		<td><?= $dt->semester; ?></td>
  	</tr>

  	<tr>
  		<td>PROGRAM STUDI</td>
  		<td><?= $dt->nama_prodi; ?></td>
  	</tr>

  	<?php endforeach ; ?>
  </table>
   <?php  
  $nama_prodi = $this->input->post('id_prodi');
  //$P = $nama_prodi;
  ?> 
    
  <?= anchor('tatausaha/matakuliah/index', '<div class="btn btn-sm btn-primary">Kembali</div>') ?><br><br><br><br>
</div>