<?php 

$nilai = get_instance();
$nilai->load->model('krs_model');
$nilai->load->model('mahasiswa_model');
$nilai->load->model('matakuliah_model');
$nilai->load->model('tahunakademik_model');

$krs = $nilai->krs_model->get_by_id($id_krs[0]);
$kode_matakuliah = $krs->kode_matakuliah;
$id_thn_akad = $krs->id_thn_akad;
 ?>

 <div class="container-fluid">
 	<div class="alert alert-success">
 		<i class="fas fa-university"></i> DAFTAR NILAI MAHASISWA
 	</div>

 	<center>
 		<legend><strong>DAFTAR NILAI MAHASISWA</strong></legend>
 		<table>
 			<tr>
 				<td>Kode Matakuliah</td>
 				<td>: <?= $kode_matakuliah; ?></td>
 			</tr>

 			<tr>
 				<td>Nama Matakuliah</td>
 				<td>: <?= $nilai->matakuliah_model->get_by_id($kode_matakuliah)->nama_matakuliah; ?></td>
 			</tr>

 			<tr>
 				<td>SKS</td>
 				<td>: <?= $nilai->matakuliah_model->get_by_id($kode_matakuliah)->sks; ?></td>
 			</tr>

 			<?php 
 					$thn = $nilai->tahunakademik_model->get_by_id($id_thn_akad);
 					$semester = $thn->semester == 1;

 					if($semester){
 						$tampilSemester = "Ganjil";
 					}elseif($semester==2){
 						$tampilSemester = "Genap";
 					}elseif($semester==3){
 						$tampilSemester = "Ganjil";
 					}elseif($semester==4){
 						$tampilSemester = "Genap";
 					}elseif($semester==5){
 						$tampilSemester = "Ganjil";
 					}elseif($semester==6){
 						$tampilSemester = "Genap";
 					}elseif($semester==7){
 						$tampilSemester = "Ganjil";
 					}elseif($semester==8){
 						$tampilSemester = "Genap";
 					}else{
 						
 					}
 				 ?>

 			<tr>
 				<td>
 					Tahun Akademik (Semeseter)
 				</td>
 				<td>
 					: <?= $thn->tahun_akademik. "(" .$tampilSemester.")" ?>
 				</td>
 			</tr>
 		</table>
 	</center>

 	<table class="table table-hover table-bordered table-striped mt-3">
 		<tr>
 			<td>NO</td>
 			<td>NIM</td>
 			<td>NAMA LENGKAP</td>
 			<td>NILAI</td>
 		</tr>
 		<?php 
 		$no = 1;
 		for($i=0; $i<sizeof($id_krs); $i++)
 		{
 		 ?>

 		 <tr>
 		 	<td><?= $no++ ?></td>
 		 	<?php $nim = $nilai->krs_model->get_by_id($id_krs[$i])->nim; ?>
 		 	<td><?= $nim; ?></td>
 		 	<td><?= $nilai->mahasiswa_model->get_by_id($nim)->nama ?></td>
 		 	<td><?= $nilai->krs_model->get_by_id($id_krs[$i])->nilai ?></td>
 		 </tr>
 		<?php } ?>
 	</table>
 </div>