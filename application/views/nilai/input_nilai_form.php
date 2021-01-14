<div class="container-fluid">
	
	<div class="alert alert-success" role="alert">
		<i class="fas fa-edit"></i> FORM MASUK HALAMAN INPUT NILAI
	</div>

	<form method="post" action="<?= base_url('nilai/input_nilai_aksi') ?>">

		<div class="form-group">
			<label>Tahun Akademik (Semester)</label>
			<?php 

			$query = $this->db->query('SELECT id_thn_akad, semester, CONCAT(tahun_akademik, "/") AS ta_semester FROM tahun_akademik');

			$dropdowns = $query->result();

			foreach($dropdowns as $dropdown)
			{
				if($dropdown->semester == 1)
				{
					$tampilsemester = "Ganjil";
				}else{
					$tampilsemester = "Genap";
				}

				$dropDownList[$dropdown->id_thn_akad] = $dropdown->ta_semester ."".$tampilsemester;
			}

			echo form_dropdown('id_thn_akad', $dropDownList,'','class="form-control"');

			 ?>
		</div>

		<div class="form-group">
			<label>Kode Mata Kuliah</label>
			<input type="text" name="kode_matakuliah" class="form-control" placeholder="Masukan Kode Mata Kuliah">
		</div>

		<button type="submit" class="btn btn-primary">Proses</button>
		
	</form>
</div>