<div class="container-fluid">

	<div class="alert alert-success" role="alert">
      <i class="fas fa-calendar-alt"></i> FORM INPUT TAHUN AKADEMIK
  </div>

<div class="container-fluid">
	<form method="post" action="<?= base_url('tahun_akademik/tambah_tahun_akademik_aksi')  ?>">

		<div class="form-group">
			<label>Tahun Akademik</label>
			<input type="text" name="tahun_akademik" placeholder="Masukan Tahun Akademik" class="form-control">
			<?= form_error('tahun_akademik', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Semester</label>
			<select name="semester" class="form-control">
				<option value="">-- Pilih Semester --</option>
				<option>1</option>
				<option>2</option>
			</select>
			<?= form_error('semester', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Status</label>
			<select name="status" class="form-control">
				<option value="">-- Pilih Status --</option>
				<option>Aktif</option>
				<option>Tidak Aktif</option>
			</select>
			<?= form_error('status', '<div class="text-danger small" ml-3>') ?>
		</div>

		<button type="submit" class="btn btn-primary">Simpan</button>
	</form>
</div>