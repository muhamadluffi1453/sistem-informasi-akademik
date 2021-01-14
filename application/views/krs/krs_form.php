<div class="container-fluid">

	<div class="alert alert-success" role="alert">
	    <i class="fas fa-plus"></i> FORM TAMBAH DATA KRS
	</div>

	<form method="post" action="<?= base_url('tatausaha/krs/tambah_krs_aksi') ?>">
		
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

		<div class="form-group">
			<label>Mata Kuliah</label>
			<?php 
				$query = $this->db->query('SELECT kode_matakuliah,nama_matakuliah FROM matakuliah');

				$dropdowns = $query->result();
				foreach($dropdowns as $dropdown) {
					$dropDownList[$dropdown->kode_matakuliah] = $dropdown->nama_matakuliah;
				}

				echo form_dropdown('kode_matakuliah', $dropDownList, $kode_matakuliah, 'class="form-control" id="kode_matakuliah"');
			 ?>
		</div>

		<button type="sumbit" class="btn btn-primary">Simpan</button>
		<?= anchor('tatausaha/krs/krs_aksi', '<div class="btn btn-danger"> Cancel </div>') ?>
	</form>

</div>