<div class="container-fluid">

	<div class="alert alert-success" role="alert">
      <i class="fas fa-user-graduate"></i> FORM DATA PRODI
  </div>

<div class="container-fluid">
	<form method="post" action="<?= base_url('prodi/input_aksi')  ?>">
		<div class="form-group">
			<label>Kode Prodi</label>
			<input type="text" name="kode_prodi" placeholder="Masukan Kode Prodi" class="form-control">
			<?= form_error('kode_prodi', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Nama Prodi</label>
			<input type="text" name="nama_prodi" placeholder="Masukan Nama Prodi" class="form-control">
			<?= form_error('nama_prodi', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Fakultas</label>
			<input type="text" name="fakultas" placeholder="Masukan Nama Fakultas" class="form-control">
			<?= form_error('fakultas', '<div class="text-danger small" ml-3>') ?>
		</div>

		<button type="submit" class="btn btn-primary">Simpan</button>
	</form>
</div>