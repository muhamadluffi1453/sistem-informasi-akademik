<div class="container-fluid">

	<div class="alert alert-success" role="alert">
      <i class="fas fa-book"></i> MATAKULIAH
    </div>

    <?= $this->session->flashdata('pesan');  ?>

   
   <?= anchor('tatausaha/matakuliah/tambah_matakuliah/'.$nama_prodi, '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Matakuliah</button>') ?>


<div class="row mt-3 ">
    <div class="col-md-4">
      <form action="<?= base_url('matakuliah') ?>" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Search.." name="keyword" autocomplete="off">
          <div class="input-group-append">
            <input class="btn btn-primary" type="submit" name="submit">
          </div>
        </div>
      </form>
    </div>
  </div>

  <table class="table table-border table-striped table-hover">
  	<tr>
  		<th>No</th>
  		<th>KODE MATAKULIAH</th>
  		<th>NAMA MATAKULIAH</th>
      <th>SKS</th>
      <th>SEMESTER</th>
  		<th>PROGRAM STUDI</th>
  		<th colspan="3">AKSI</th>
  	</tr>

  	<?php $i = 1 ?>
  	<?php foreach($matakuliah as $mk) : ?>
  		<tr>
  			<th><?= $i++; ?></th>
  			<td><?= $mk->kode_matakuliah;?></td>
  			<td><?= $mk->nama_matakuliah; ?></td>
        <td><?= $mk->sks; ?></td>
        <td><?= $mk->semester; ?></td>
  			<td><?= $mk->nama_prodi; ?></td>
  			<!-- <td width="20px"><?= anchor('tatausaha/matakuliah/detail/' .$mk->kode_matakuliah, '<div class="btn btn-sm btn-warning"><i class="fa fa-eye"></i></div>') ?></td> -->
  			<td width="20px"><?= anchor('tatausaha/matakuliah/update/' .$mk->kode_matakuliah, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
    		<td width="20px"><?= anchor('tatausaha/matakuliah/delete/'.$nama_prodi.'/' .$mk->kode_matakuliah, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
  		</tr>
  	<?php endforeach; ?>
  	<?php $i++; ?>
  </table>

  <?= $this->pagination->create_links(); ?>
</div>