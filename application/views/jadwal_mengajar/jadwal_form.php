<div class="container-fluid">
	<div class="alert alert-success">
		<i class="fas fa-university"></i> FORM TAMBAH JADWAL MENGAJAR
	</div>

	<form method="post" action="<?= base_url('tatausaha/jadwal_mengajar/tambah_jadwal_aksi/'.$nama_prodi); ?>">
		<input type="hidden" name="id_prodi"  class="form-control">
		<div class="form-group">
			<label>Nama Matakuliah</label>
			<select id="kode_matakuliah" name="kode_matakuliah" class="form-control" >
				<option value="">--Pilih Matakuliah--</option>
				<?php foreach($matakuliah as $mtk) : ?>
					<option value="<?= $mtk->kode_matakuliah  ?>"><?= $mtk->nama_matakuliah; ?></option>
				<?php endforeach; ?>
			</select>
		</div>

		<div class="form-group">
			<label>Nama Dosen</label>
			<select name="id_dosen" id="id_dosen" class="form-control">
				<option value="">--Pilih Dosen--</option>
				<?php foreach($dosen as $dsn) :?>
					<option value="<?= $dsn->id_dosen ?>"><?= $dsn->nama_dosen; ?></option>
				<?php endforeach; ?>
			</select>
		</div>

		<div class="form-group">
			<label>Ruangan</label>
			<select name="id_ruangan" id="id_ruangan" class="form-control">
				<option value="">--Pilih Ruangan--</option>
				<?php foreach($ruangan as $rng) :?>
					<option value="<?= $rng->id_ruangan ?>"><?= $rng->nama_ruangan; ?></option>
				<?php endforeach; ?>
			</select>
		</div>

		<div class="form-group">
			<label>Hari</label>
			<select name="hari" id="hari" class="form-control">
				<option value="">--Pilih Hari--</option>
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
			<input type="time" name="jam" placeholder="Masukan Jam" class="form-control">
		</div>

			<button type="submit" class="btn btn-primary">Simpan</button>
	</form>
</div>

