<div class="container-fluid">

	<div class="alert alert-success" role="alert">
      <i class="fas fa-user-graduate"></i> FORM INPUT MAHASISWA
  </div>
	<?= $this->session->flashdata('pesan'); ?>
  	<?= form_open_multipart('datamahasiswa/input_mahasiswa_aksi') ?>
		<div class="form-group">
			<label>Nama</label>
			<input type="text"  name="nama" placeholder="Masukan Nama" class="form-control">
			<?= form_error('nama', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Nim</label>
			<input type="text" name="nim" placeholder="Masukan Nim" class="form-control">
			<?= form_error('nim', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Nama Prodi</label>
			<select name="nama_prodi" id="nama_prodi" class="form-control">
				<option value="">--Pilih Prodi--</option>
				<?php foreach($prodi as $prd) :?>
					<option value="<?= $prd->nama_prodi ?>"><?= $prd->nama_prodi; ?></option>
				<?php endforeach; ?>
			</select>
		</div>

		<div class="form-group">
			<label>Email</label>
			<input type="text" name="email" placeholder="Masukan Email" class="form-control">
			<?= form_error('email', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Fakultas</label>
			<input type="text" name="fakultas" placeholder="Masukan Nama Fakultas" class="form-control">
			<?= form_error('fakultas', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Tanggal Lahir</label>
			<input type="date" name="tgl_lahir" placeholder="Masukan Tanggal Lahir" class="form-control">
			<?= form_error('tgl_lahir', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Tempat Lahir</label>
			<input type="text" name="tempat_lahir" placeholder="Masukan Tempat Lahir" class="form-control">
			<?= form_error('tempat_lahir', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div>
			<label>Jenis Kelamin</label>
			<input type="radio" name="jenis_kelamin"  value="pria"> pria
			<input type="radio" name="jenis_kelamin"  value="wanita"> wanita 
		</div>

		<div class="form-group">
			<label>Agama</label>
			<input type="text" name="agama" placeholder="Masukan Agama" class="form-control">
			<?= form_error('agama', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Alamat</label>
			<input type="text" name="alamat" placeholder="Masukan alamat" class="form-control">
			<?= form_error('alamat', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Telepon</label>
			<input type="text" name="telepon" placeholder="Masukan Telepon" class="form-control">
			<?= form_error('telepon', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Foto</label><br>
			<input type="file" name="photo">
		</div>

		<button type="submit" class="btn btn-primary">Simpan</button>
	<?= form_close(); ?>
</div>