<div class="container-fluid">
	<div class="alert alert-success">
		<i class="fas fa-university"></i> FORM  HALAMAN UPDATE JADWAL UJIAN
	</div>

	<?php foreach($jadwal_ujian as $ujn) ?>
	  
  	<form method="post" action="<?= base_url('tatausaha/jadwal_ujian/update_aksi');  ?>">
  		<div class="form-group">
			<label>Nama Matakuliah</label>
			<input type="hidden" name="id_jdlujian" class="form-control" value="<?= $ujn->id_jdlujian  ?>">
			<input type="hidden" name="id_prodi" class="form-control" value="<?= $nama_prodi  ?>">
			<input type="hidden" name="id_ujian" class="form-control" value="<?= $nama_ujian  ?>">
			<select id="kode_matakuliah" name="kode_matakuliah" class="form-control" >
				<?php foreach($matakuliah as $mtk) : ?>
					<option value="<?= $mtk->kode_matakuliah  ?>" <?= ($mtk->kode_matakuliah == $ujn->kode_matakuliah) ? "selected" : ""; ?>><?= $mtk->nama_matakuliah; ?></option>
				<?php endforeach; ?>
			</select>
		</div>

		<div class="form-group">
			<label>Nama Pengawas</label>
			<select id="id_dosen" name="id_dosen" class="form-control">
				<?php foreach($dosen as $dsn): ?>
					<option value="<?= $dsn->id_dosen ?>" <?= ($dsn->id_dosen == $ujn->id_dosen) ? "selected" : ""; ?>><?= $dsn->nama_dosen; ?></option>
				<?php endforeach; ?>
			</select>
		</div>

		<div class="form-group">
			<label>Nama Ruangan</label>
			<select id="id_ruangan" name="id_ruangan" class="form-control">
				<?php foreach($ruangan as $rng): ?>
					<option value="<?= $rng->id_ruangan ?>" <?= ($rng->id_ruangan == $ujn->id_ruangan) ? "selected" : ""; ?>><?= $rng->nama_ruangan; ?></option>
				<?php endforeach; ?>
			</select>
		</div>

		<div class="form-group">
			<label>Hari</label>
			<select name="hari" id="hari" class="form-control">
				<option value=""><?= $ujn->hari; ?></option>
				<option>Senin</option>
				<option>Selasa</option>
				<option>Rabu</option>
				<option>Kamis</option>
				<option>Jum'at</option>
				<option>Sabtu</option>
				<option>Minggu</option>
			</select>
		</div>

		<div class="form-group">
			<label>Jam</label>
			<input type="time" name="jam" placeholder="Masukan Jam" class="form-control" value="<?= $ujn->jam; ?>">
		</div>

		<button type="submit" class="btn btn-primary">Update Data</button>  		
  	</form>
</div>