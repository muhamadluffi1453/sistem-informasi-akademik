<div class="container-fluid">
	
	<div class="alert alert-success" role="alert">
	    <i class="fas fa-university"></i> FORM MASUK HALAMAN KRS
	</div>

	<?= $this->session->flashdata('pesan');  ?>

	<form method="post" action="<?= base_url('tatausaha/krs/krs_aksi') ?>">
		
		<div class="form-group">
			<label>NIM Mahasiswa</label>
			<input type="text" name="nim" placeholder="Masukan Nim Mahasiswa" class="form-control">
			<?= form_error('nim', '<div class="text-danger small ml-2">','</div>') ?>
		</div>

		<div class="form-group">
			<label>Tahun Akademik / Semester</label>
			<?php 
				$query = $this->db->query('SELECT id_thn_akad, semester,CONCAT(tahun_akademik, "/") AS thn_semester FROM tahun_akademik');

				$dropdowns = $query->result();

				foreach($dropdowns as $dropdown){

					if($dropdown->semester == 1){
						$tampilsemester = "Ganjil";
					}else{
						$tampilsemester = "Genap";
					}

					$dropDownList[$dropdown->id_thn_akad] = $dropdown->thn_semester . " " . $tampilsemester;
				}

				echo form_dropdown('id_thn_akad', $dropDownList,'', 'class="form-control" id="id_thn_akad"');
			 ?>
		</div>

		<button type="submit" class="btn btn-primary">Proses</button>
	</form>
</div>