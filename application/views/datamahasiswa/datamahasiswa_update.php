<div class="container-fluid">

	<div class="alert alert-success" role="alert">
      <i class="fas fa-user-graduate"></i> FORM UPDATE MAHASISWA
  </div>

  	<?php foreach($mahasiswa as $mhs) : ?>
	<form method="post" action="<?= base_url('datamahasiswa/update_aksi'); ?>">
		<div class="form-group">
			<label></label>
			<input type="hidden" name="id_mhs" value="<?= $mhs->id_mhs; ?>">
		</div>

		<div class="form-group">
			<label for="nama">Nama</label>
			<input type="text" name="nama" class="form-control" value="<?= $mhs->nama ?>">
			<?= form_error('nama', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Nim</label>
			<input type="text" name="nim" class="form-control" value="<?= $mhs->nim ?>">
			<?= form_error('nim', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Nama Prodi</label>
			<select name="nama_prodi" id="nama_prodi" class="form-control">
				<option value="<?= $mhs->nama_prodi ?>"><?= $mhs->nama_prodi; ?></option>
				<?php foreach($prodi as $prd) :?>
				<option value="<?= $prd->nama_prodi ?>"><?= $prd->nama_prodi; ?></option>
				<?php endforeach; ?>
			</select>
		</div>

		<div class="form-group">
			<label>Email</label>
			<input type="text" name="email" class="form-control" value="<?= $mhs->email ?>">
			<?= form_error('email', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Fakultas</label>
			<input type="text" name="fakultas" class="form-control" value="<?= $mhs->fakultas ?>">
				<?= form_error('fakultas', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Tanggal Lahir</label>
			<input type="date" name="tgl_lahir" class="form-control" value="<?= $mhs->tgl_lahir ?>">
				<?= form_error('tgl_lahir', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Tempat Lahir</label>
			<input type="text" name="tempat_lahir" class="form-control" value="<?= $mhs->tempat_lahir ?>">
				<?= form_error('tempat_lahir', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div>
			<label>Jenis Kelamin</label>
			<input type="radio" name="jenis_kelamin"  value="pria"> pria
			<input type="radio" name="jenis_kelamin"  value="wanita"> wanita 
				<?= form_error('jenis_kelamin', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Agama</label>
			<input type="text" name="agama" class="form-control" value="<?= $mhs->agama ?>">
				<?= form_error('agama', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Alamat</label>
			<input type="text" name="alamat" class="form-control" value="<?= $mhs->alamat ?>">
				<?= form_error('alamat', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Telepon</label>
			<input type="text" name="telepon" class="form-control" value="<?= $mhs->telepon ?>">
				<?= form_error('telepon', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<?php foreach($detail as $dt) : ?>
				<img src="<?= base_url(). 'assets/uploads/' .$mhs->photo ?>">
			<?php endforeach; ?><br><br>
			<input type="file" name="userfile" value="<?= $mhs->photo ?>">
		</div>

		<button type="submit" name="update" class="btn btn-primary">Update Data</button>
	</form>
<?php endforeach; ?>
</div>
