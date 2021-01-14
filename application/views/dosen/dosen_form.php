<div class="container-fluid">

	<div class="alert alert-success" role="alert">
      <i class="fas fa-user-graduate"></i> FORM INPUT DOSEN
  </div>

  	<form method="post" action="<?= base_url('tatausaha/dosen/tambah_dosen_aksi/'.$nama_prodi); ?>">

  		
  		<input type="hidden" name="id_prodi"  class="form-control">
  		<div class="form-group">
			<label>Nama Prodi</label>
			<select name="id_prodi" id="id_prodi" class="form-control">
				<option value="">--Pilih Prodi--</option>
				<?php foreach($prodi as $prd) :?>
					<option value="<?= $prd->id_prodi ?>"><?= $prd->nama_prodi; ?></option>
					<?= form_error('nidn', '<div class="text-danger small" ml-3>') ?>
				<?php endforeach; ?>
			</select>
		</div>

  		<div class="form-group">
			<label>NIDN</label>
			<input type="text" name="nidn" placeholder="Masukan NIDN" class="form-control">
			<?= form_error('nidn', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Nama Dosen</label>
			<input type="text" name="nama_dosen" placeholder="Masukan Nama Dosen" class="form-control">
			<?= form_error('nama_dosen', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Jenis Kelamin</label>
			<select name="jenis_kelamin" class="form-control" value="<?= $dsn->jenis_kelamin ?>">
				<option>--Jenis Kelamin--</option>
				<option>Pria</option>
				<option>Wanita</option>
			</select>
			<?= form_error('jenis_kelamin', '<div class="text-danger small" ml-3>') ?>
		</div>


		<div class="form-group">
			<label>Jabatan Fungsional</label>
			<input type="text" name="jabatan_fung" placeholder="Masukan Jabatan Fungsional" class="form-control">
			<?= form_error('jabatan_fung', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Pendidikan Tertinggi</label>
			<input type="text" name="pend_tertinggi" placeholder="Masukan Pendidikan Tertinggi" class="form-control">
			<?= form_error('pend_tertinggi', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Status Ikatan Kerja</label>
			<input type="text" name="status_iker" placeholder="Masukan Status Ikatan Kerja" class="form-control">
			<?= form_error('status_iker', '<div class="text-danger small" ml-3>') ?>
		</div>

		<button type="submit" class="btn btn-primary">Simpan</button>
	</form>
</div>