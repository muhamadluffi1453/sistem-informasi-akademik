<div class="container-fluid">

	<div class="alert alert-success" role="alert">
	    <i class="fas fa-plus"></i> FORM TAMBAH DATA KRS
	</div>

	<form method="post" action="<?= base_url('mahasiswa/krs/tambah_krs_aksi') ?>">
		
		<div class="form-group">
			<label>Tahun Akademik</label>
			<input type="hidden" name="id_thn_akad" class="form-control" value="<?= $id_thn_akad; ?>">
			<input type="hidden" name="id_krs" class="form-control" value="<?= $id_krs; ?>">
			<input type="text" name="thn_akad_smt" class="form-control" value="<?= $thn_akad_smt. '/' .$semester; ?>" readonly>
		</div>

		<div class="form-group">
			<label>NIM Mahasiswa</label>
			<input type="text" name="nim" class="form-control" value="<?= $nim; ?>" readonly>
		</div>

		<table class="table table-hover table-bordered table-striped">
		<thead>
			<tr>
				<th scope="col">NO</th>
				<th scope="col">KODE MATAKULIAH</th>
				<th scope="col">MATAKULIAH</th>
				<th scope="col">SEMESTER</th>
				<th scope="col">AKSES</th>
			</tr>
			</thead>
			<tbody>
			<?php $i=1 ?>
			<?php foreach($matakuliah as $mk): ?>
			<tr>
				<th><?= $i++; ?></th>
				<td><?=$mk->kode_matakuliah; ?></td>
				<td><?=$mk->nama_matakuliah; ?></td>
				<td><?=$mk->semester; ?></td>
				<td>
					<div class="form-check">
						<input class="form-check-input" type="checkbox">
					</div>
				</td>
			</tr>
			</tbody>
		<?php endforeach; ?>
		<?php $i++; ?>
	</table>
				
		

		<button type="sumbit" class="btn btn-primary">Simpan</button>
		<?= anchor('krs/krs_aksi', '<div class="btn btn-danger"> Cancel </div>') ?>
	</form>

</div>