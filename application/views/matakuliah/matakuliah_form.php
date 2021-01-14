<div class="container-fluid">

	<div class="alert alert-success" role="alert">
      <i class="fas fa-university"></i> FORM INPUT MATAKULIAH
  </div>
	
	<form method="post" action="<?= base_url('tatausaha/matakuliah/tambah_matakuliah_aksi/'.$nama_prodi);  ?>">

		<input type="hidden" name="id_prodi"  class="form-control">
		<div class="form-group">
			<label>Kode Matakuliah</label>
			<input type="text" name="kode_matakuliah" placeholder="Masukan Kode Matakuliah" class="form-control">
			<?= form_error('kode_matakuliah', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Nama Matakuliah</label>
			<input type="text" name="nama_matakuliah" placeholder="Masukan Nama Matakuliah" class="form-control">
			<?= form_error('nama_matakuliah', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>SKS</label>
			<select name="sks" class="form-control">
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
				<option>6</option>				
			</select>
		</div>

		<div class="form-group">
			<label>Semester</label>
			<select name="semester" class="form-control">
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
			<label>Program Studi</label>
			<select name="id_prodi" id="id_prodi" class="form-control">
				<option value="">--Pilih Program Studi--</option>
				<?php foreach($prodi as $prd) : ?>
					<option value="<?= $prd->id_prodi  ?>"><?= $prd->nama_prodi; ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<button type="submit" class="btn btn-primary mb-5">Simpan</button>
	</form>
</div>