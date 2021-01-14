<div class="container-fluid">

	<div class="alert alert-success" role="alert">
      <i class="fas fa-user-graduate"></i> FORM DATA RUANGAN
  </div>

<div class="container-fluid">
	<form method="post" action="<?= base_url('tatausaha/ruangan/tambah_ruangan_aksi')  ?>">
		<div class="form-group">
			<label>Kode Ruangan</label>
			<input type="text" name="kode_ruangan" placeholder="Masukan Kode Ruangan" class="form-control">
			<?= form_error('kode_ruangan', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Nama Ruangan</label>
			<input type="text" name="nama_ruangan" placeholder="Masukan Nama Ruangan" class="form-control">
			<?= form_error('nama_ruangan', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Fakultas</label>
			<input type="text" name="fakultas" placeholder="Masukan Nama Fakultas" class="form-control">
			<?= form_error('fakultas', '<div class="text-danger small" ml-3>') ?>
		</div>

		<button type="submit" class="btn btn-primary">Simpan</button>
	</form>
</div>