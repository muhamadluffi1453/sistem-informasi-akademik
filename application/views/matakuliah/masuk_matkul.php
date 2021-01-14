<div class="container-fluid">
	<div class="alert alert-success">
		<i class="fas fa-university"></i> FORM MASUK HALAMAN MATAKULIAH
	</div>

	<form method="post" action="<?= base_url('tatausaha/matakuliah/masuk_matakuliah'); ?>">
		<div class="form-group">
			<label>Prodi</label> 
			<select id="id_prodi" name="id_prodi" class="form-control" required="">
				<option value="">--Pilih Prodi--</option>
				<?php foreach($prodi as $prd) : ?>
					<option value="<?= $prd->id_prodi  ?>"><?= $prd->nama_prodi; ?></option>
				<?php endforeach; ?>
			</select>
		</div>

		<button class="btn btn-primary">Masuk</button>
	</form>
</div>