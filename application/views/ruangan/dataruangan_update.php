<div class="container-fluid">

	<div class="alert alert-success" role="alert">
      <i class="fas fa-university"></i> FORM UPDATE RUANGAN
  </div>
<?= $this->session->flashdata('pesan'); ?>
  	<?php foreach($ruangan as $ruang) : ?>
	<form method="post" action="<?= base_url('tatausaha/ruangan/update_aksi'); ?>">
		<div class="form-group">
			<label>Kode Ruangan</label>
			<input type="hidden" name="id_ruangan" value="<?= $ruang->id_ruangan; ?>">
			<input type="text" name="kode_ruangan" class="form-control" value="<?= $ruang->kode_ruangan; ?>">
			<?= form_error('kode_ruangan', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label for="nama_ruangan">Nama Ruangan</label>
			<input type="text" name="nama_ruangan" class="form-control" value="<?= $ruang->nama_ruangan; ?>">
			<?= form_error('nama_ruangan', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label for="fakultas">Fakultas</label>
			<input type="text" name="fakultas" class="form-control" value="<?= $ruang->fakultas; ?>">
			<?= form_error('fakultas', '<div class="text-danger small" ml-3>') ?>
		</div>


		<button type="submit" name="update" class="btn btn-primary">Update Data</button>
	</form>
	<?php endforeach; ?>
</div>
