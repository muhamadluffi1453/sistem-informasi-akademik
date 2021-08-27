<div class="container-fluid">
	
	<div class="alert alert-success" role="alert">
	    <i class="fas fa-university"></i> FORM MASUK HALAMAN KRS
	</div>
	<?php $nim=$_SESSION['nim'];
		$iscek=$this->Mahasiswa_model->cek_akses($nim);
		// print_r($iscek);
		if ($iscek[0]['is_akses']==0):?>
			<!-- <h5>anda belumregistrasi</h5> -->
			<div class="alert alert-danger">
				<i class="fas fa-university"></i> ANDA BELUM REGISTRASI, SILAHKAN KE BAGIAN KEUANGAN !!!
			</div>
			<?php else: ?>
				<?= $this->session->flashdata('pesan');  ?>

	<form method="post" action="<?= base_url('mahasiswa/krs/krs_aksi') ?>">
		
		<!-- <div class="form-group">
			<label>NIM Mahasiswa</label>
			<input type="text" name="nim" placeholder="Masukan Nim Mahasiswa" class="form-control">
			<?= form_error('nim', '<div class="text-danger small ml-2">','</div>') ?>
		</div> -->

		<div class="form-group">
			<label>Tahun Akademik / Semester</label>
			<?php 
				$query = $this->db->query('SELECT id_thn_akad, semester,CONCAT(tahun_akademik, "/") AS thn_semester FROM tahun_akademik');

				$dropdowns = $query->result();

				foreach($dropdowns as $dropdown){

					if($dropdown->semester == 1){
						$tampilsemester = "Ganjil";
					}elseif($dropdown->semester == 2){
						$tampilsemester = "Genap";
					}elseif($dropdown->semester == 3){
						$tampilsemester = "Ganjil";
					}elseif($dropdown->semester == 4){
						$tampilsemester = "Genap";
					}elseif($dropdown->semester == 5){
						$tampilsemester = "Ganjil";
					}elseif($dropdown->semester == 6){
						$tampilsemester = "Genap";
					}elseif($dropdown->semester == 7){
						$tampilsemester = "Ganjil";
					}elseif($dropdown->semester == 8){
						$tampilsemester = "Genap";
					}else{
						
					}


					$dropDownList[$dropdown->id_thn_akad] = $dropdown->thn_semester . " " . $tampilsemester;
				}

				echo form_dropdown('id_thn_akad', $dropDownList,'', 'class="form-control" id="id_thn_akad"');
			 ?>
		</div>

		<button type="submit" class="btn btn-primary">Proses</button>
	</form>
			<?php endif; ?>

	
</div>