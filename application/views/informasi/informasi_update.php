<div class="container-fluid">

	<div class="alert alert-success" role="alert">
      <i class="fas fa-user-graduate"></i> FORM UPDATE INFORMASI
  </div>

  	<?php foreach($informasi as $info) : ?>
	<form method="post" action="<?= base_url('informasi/update_informasi_aksi') ?>">
		<div class="form-group">
			<label>ICON</label>
			<input type="hidden" name="id_informasi" class="form-control" value="<?= $info->id_informasi; ?>">
			<input type="text" name="icon" class="form-control" value="<?= $info->icon ?>">
			<?= form_error('icon', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>JUDUL INFORMASI</label>
			<input type="text" name="judul_informasi" class="form-control" value="<?= $info->judul_informasi; ?>">
			<?= form_error('judul_informasi', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>ISI INFORMASI</label>
			<input type="text" name="isi_informasi" class="form-control" value="<?= $info->isi_informasi; ?>">
		</div>


		<button type="submit" class="btn btn-primary">Update Data</button>
		</form>
<?php endforeach; ?>
</div>
