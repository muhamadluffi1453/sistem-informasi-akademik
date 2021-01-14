<div class="container-fluid">

	<div class="alert alert-success" role="alert">
      <i class="fas fa-user-graduate"></i> FORM UPDATE DOSEN
  </div>

  	<?php foreach($dosen as $dsn) : ?>
  		<form method="post" action="<?= base_url('tatausaha/dosen/update_dosen_aksi'); ?>">
  	<input type="hidden" name="id_dosen" class="form-control" value="<?= $dsn->id_dosen  ?>">
	<input type="hidden" name="id_prodi" class="form-control" value="<?= $dsn->id_prodi  ?>">
  	<div class="form-group">
      <label>Nama Prodi</label>
      <select id="id_prodi" name="id_prodi" class="form-control">
        <?php foreach($prodi as $prd): ?>
          <option value="<?= $prd->id_prodi ?>" <?= ($prd->id_prodi == $dsn->id_prodi) ? "selected" : ""; ?>><?= $prd->nama_prodi; ?></option>
        <?php endforeach; ?>
      </select>
    </div>


		<div class="form-group">
			<label>NIDN</label>
			<input type="hidden" name="id_dosen" class="form-control" value="<?= $dsn->id_dosen; ?>">
			<input type="text" name="nidn" class="form-control" value="<?= $dsn->nidn ?>">
			<?= form_error('nidn', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Nama Dosen</label>
			<input type="text" name="nama_dosen" class="form-control" value="<?= $dsn->nama_dosen; ?>">
			<?= form_error('nama_dosen', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Jenis Kelamin</label>
			<select name="jenis_kelamin" class="form-control">
				<option><?= $dsn->jenis_kelamin ?></option>
				<option>Pria</option>
				<option>Wanita</option>
				<?= form_error('jenis_kelamin', '<div class="text-danger small" ml-3>') ?>
			</select>
		</div>


		<div class="form-group">
			<label>Jabatan Fungsional</label>
			<input type="text" name="jabatan_fung" class="form-control" value="<?= $dsn->jabatan_fung; ?>">
			<?= form_error('jabatan_fung', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Pendidikan Tertinggi</label>
			<input type="text" name="pend_tertinggi" class="form-control" value="<?= $dsn->pend_tertinggi; ?>">
			<?= form_error('pend_tertinggi', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Status Ikatan Kerja</label>
			<input type="text" name="status_iker" class="form-control" value="<?= $dsn->status_iker; ?>">
			<?= form_error('status_iker', '<div class="text-danger small" ml-3>') ?>
		</div>

		<button type="submit" class="btn btn-primary">Update Data</button>
	</form>
<?php endforeach; ?>
</div>
