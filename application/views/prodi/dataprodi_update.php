<div class="container-fluid">

	<div class="alert alert-success" role="alert">
      <i class="fas fa-university"></i> FORM UPDATE PRODI
  </div>

  	<?php foreach($prodi as $prd) : ?>
	<form method="post" action="<?= base_url('prodi/update_aksi'); ?>">
		<div class="form-group">
			<label>Kode Prodi</label>
			<input type="hidden" name="id_prodi" value="<?= $prd->id_prodi; ?>">
			<input type="text" name="kode_prodi" class="form-control" value="<?= $prd->kode_prodi; ?>">
			<?= form_error('kode_prodi', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label for="nama_prodi">Nama Prodi</label>
			<input type="text" name="nama_prodi" class="form-control" value="<?= $prd->nama_prodi; ?>">
			<?= form_error('nama_prodi', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label for="fakultas">Fakultas</label>
			<input type="text" name="fakultas" class="form-control" value="<?= $prd->fakultas; ?>">
			<?= form_error('fakultas', '<div class="text-danger small" ml-3>') ?>
		</div>


		<button type="submit" name="update" class="btn btn-primary">Update Data</button>
	</form>
	<?php endforeach; ?>
</div>
