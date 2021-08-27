<div class="container-fluid">

	<div class="alert alert-success" role="alert">
      <i class="fas fa-calendar-alt"></i> FORM UPDATE TAHUN AKADEMIK
  </div>

  	<?php foreach($tahun_akademik as $ak) : ?>
	<form method="post" action="<?= base_url('tahun_akademik/update_aksi'); ?>">
		<div class="form-group">
			<label>Tahun Akademik</label>
			<input type="hidden" name="id_thn_akad" value="<?= $ak->id_thn_akad; ?>">
			<input type="text" name="tahun_akademik" class="form-control" value="<?= $ak->tahun_akademik; ?>">
			<?= form_error('tahun_akademik', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label for="semester">Semester</label>
			<select name="semester" class="form-control">
				<option><?= $ak->semester ?></option>
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
				<option>6</option>
				<option>7</option>
				<option>8</option>
			</select>
		</div>

		<div class="form-group">
			<label for="status">Status</label>
			<select name="status" class="form-control">
				<option><?= $ak->status ?></option>
				<option>Aktif</option>
				<option>Tidak Aktif</option>
			</select>
		</div>

		<button type="submit" name="update" class="btn btn-primary">Update Data</button>
	</form>
	<?php endforeach; ?>
</div>