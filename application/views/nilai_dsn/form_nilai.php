<?php 

$nilai = get_instance();
$nilai->load->model('matakuliah_model');
$nilai->load->model('tahunakademik_model');
 ?>

 <div class="container-fluid">
 	<?php 
 		if($list_nilai == null)
 		{
 			$thn = $nilai->tahunakademik_model->get_by_id($id_thn_akad);
 			$semester = $thn->semester == 1;

 			if($semester == 1)
 			{
 				$tampilsemester = "Ganjil";
 			}else{
 				$tampilsemester = "Genap";
 			}
 		
 	 ?>

 	 <div class="alert alert-danger">
 	 	Maaf, kode mata kuliah yang anda input  <strong>TIDAK TERSEDIA!</strong> di tahun ajaran <?= $thn->tahun_akademik . "(" .$tampilsemester.")"; ?>
 	 </div>

 	 <?= anchor('dosen1/nilai_dsn/input_nilai','<div class = "btn btn-sm btn-primary">Kembali</div>') ?>

 	 <?php 

 	}else{
 	  ?>
 	  <center>
 	  	<legend><strong>MASUKAN NILAI AKHIR</strong></legend>

 	  	<table>
 	  		<tr>
 	  			<td>Kode Mata Kuliah</td>
 	  			<td>: <?= $kode_matakuliah; ?></td>
 	  		</tr>

 	  		<tr>
 	  			<td>Nama Mata Kuliah</td>
 	  			<td>: <?= $nilai->matakuliah_model->get_by_id($kode_matakuliah)->nama_matakuliah; ?></td>
 	  		</tr>

 	  		<tr>
 	  			<td>SKS</td>
 	  			<td>: <?= $nilai->matakuliah_model->get_by_id($kode_matakuliah)->sks; ?></td>
 	  		</tr>
 	  		<?php 
 	  			$thn 	= $nilai->tahunakademik_model->get_by_id($id_thn_akad);
 	  			$semester = $thn->semester==1;

 	  			if($semester == 1)
	 			{
	 				$tampilsemester = "Ganjil";
	 			}else{
	 				$tampilsemester = "Genap";
	 			}
 	  		?>
 	  		<tr>
 	  			<td>
 	  				Tahun Akademik (Semester)
 	  				<td>: <?= $thn->tahun_akademik . "(".$tampilsemester.")" ?></td>
 	  			</td>
 	  		</tr>
 	  	</table>
 	  </center>

 	  <form method="post" action="<?= base_url('dosen1/nilai_dsn/simpan_nilai'); ?>">
 	  	<table class="table table-striped table-hover table-bordered mt-4">
 	  		<tr>
 	  			<td width="25px">NO</td>
 	  			<td>NIM</td>
 	  			<td>NAMA MAHASISWA</td>
 	  			<td>NILAI</td>
 	  		</tr>

 	  		<?php 
 	  		$no = 1;
 	  		foreach ($list_nilai as $row) :?>
 	  			<tr>
 	  				<td><?= $no++ ?></td>
 	  				<td><?= $row->nim; ?></td>
 	  				<td><?= $row->nama;  ?></td>
 	  				<input type="hidden" name="id_krs[]" value="<?= $row->id_krs; ?>">
 	  				<td width="100px"><input type="text" name="nilai[]" class="form-control" value="<?= $row->nilai; ?>"></td>
 	  			</tr>
 	  		<?php endforeach; ?>
 	  	</table>

 	  	<button type="submit" class="btn btn-primary">Simpan</button>
 	  </form>
 	<?php } ?>
 </div>