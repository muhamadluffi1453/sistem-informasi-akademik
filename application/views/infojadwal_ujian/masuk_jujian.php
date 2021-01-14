<div class="container-fluid">
	<div class="alert alert-success">
		<i class="fas fa-university"></i> FORM MASUK HALAMAN INFORMASI JADWAL UJIAN
	</div>

	<form method="POST" action="<?= base_url('mahasiswa/infojadwal_ujian/masuk_jadujian')?>">
		<div class="form-group">
			<label>Prodi</label> 
			<select id="id_prodi" name="id_prodi" class="form-control" required="">
				<option value="">--Pilih Prodi--</option>
				<?php foreach($prodi as $prd) : ?>
					<option value="<?= $prd->id_prodi  ?>"><?= $prd->nama_prodi; ?></option>
				<?php endforeach; ?>
			</select>
		</div>

		<div class="form-group">
			<label>Ujian</label>
			<select id="id_ujian" name="id_ujian" class="form-control" required="">
				<option value="">--Pilih Ujian--</option>
				<?php foreach($p_ujian as $ujn) : ?>
					<option value="<?= $ujn->id_ujian  ?>"><?= $ujn->nama_ujian; ?></option>
				<?php endforeach; ?>
			</select>
		</div>

		<button class="btn btn-primary">Masuk</button>	
	</form>
</div>