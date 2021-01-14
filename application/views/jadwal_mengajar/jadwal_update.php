<div class="container-fluid">
	
	<div class="alert alert-success" role="alert">
      <i class="fas fa-edit"></i> FORM EDIT JADWAL
  	</div>

  	<?php foreach($jadwal_mengajar as $jdl) ?>
	  
  	<form method="post" action="<?= base_url('tatausaha/jadwal_mengajar/update_aksi');  ?>">
  		<div class="form-group">
			<label>Kode Matakuliah</label>
			<input type="hidden" name="id_jdlmengajar" class="form-control" value="<?= $jdl->id_jdlmengajar  ?>">
			<input type="hidden" name="id_prodi" class="form-control" value="<?= $id_prodi  ?>">
			<select id="kode_matakuliah" name="kode_matakuliah" class="form-control" >
				<?php foreach($matakuliah as $mtk) : ?>
					<option value="<?= $mtk->kode_matakuliah  ?>" <?= ($mtk->kode_matakuliah == $jdl->kode_matakuliah) ? "selected" : ""; ?>><?= $mtk->nama_matakuliah; ?></option>
				<?php endforeach; ?>
			</select>
		</div>

		<div class="form-group">
			<label>Nama Dosen</label>
			<select id="id_dosen" name="id_dosen" class="form-control">
				<?php foreach($dosen as $dsn): ?>
					<option value="<?= $dsn->id_dosen ?>" <?= ($dsn->id_dosen == $jdl->id_dosen) ? "selected" : ""; ?>><?= $dsn->nama_dosen; ?></option>
				<?php endforeach; ?>
			</select>
		</div>

		<div class="form-group">
			<label>Nama Ruangan</label>
			<select id="id_ruangan" name="id_ruangan" class="form-control">
				<?php foreach($ruangan as $rng): ?>
					<option value="<?= $rng->id_ruangan ?>" <?= ($rng->id_ruangan == $jdl->id_ruangan) ? "selected" : ""; ?>><?= $rng->nama_ruangan; ?></option>
				<?php endforeach; ?>
			</select>
		</div>

		<div class="form-group">
			<label>Hari</label>
			<select name="hari" id="hari" class="form-control">
				<option value=""><?= $jdl->hari; ?></option>
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
			<input type="time" name="jam" placeholder="Masukan Jam" class="form-control" value="<?= $jdl->jam; ?>">
		</div>

		<button type="submit" class="btn btn-primary">Update Data</button>  		
  	</form>

</div>