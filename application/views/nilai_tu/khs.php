
<div class="container-fluid">
	
	<div class="alert alert-success" role="alert">
	    <i class="fas fa-university"></i> KARTU HASIL STUDI (KHS)
	</div>

	<center class="mb-3">
		<legend class="mt-3"><strong>KARTU HASIL STUDI</strong></legend>

		<table>
			<tr>
				<td><strong>NIM</strong></td>
				<td>&nbsp;:	<?= $mhs_nim ?></td>
			</tr>

			<tr>
				<td><strong>Nama Lengkap</strong></td>
				<td>&nbsp;:	<?= $mhs_nama ?></td>
			</tr>

			<tr>
				<td><strong>Program Studi</strong></td>
				<td>&nbsp;:	<?= $mhs_prodi ?></td>
			</tr>

			<!-- <tr>
				<td><strong>Tahun Akademik (Semester)</strong></td>
				<td>&nbsp;:	<?= $thn_akad ?></td>
			</tr> -->
		</table>
	</center>
	<hr>
		
		<?php foreach($mhs_data as $row) : ?>
		<tr>
			<h6 class="text-center">Tahun Akademik <?= $row->tahun_akademik;  ?> Semester <?php if($row->semester==1){
				echo "Ganjil";
			}elseif($row->semester==2){
				echo "Genap";
			}elseif($row->semester==3){
				echo "Ganjil";
			}elseif($row->semester==4){
				echo "Genap";
			}elseif($row->semester==5){
				echo "Ganjil";
			}elseif($row->semester==6){
				echo "Genap";
			}elseif($row->semester==7){
				echo "Ganjil";
			}elseif($row->semester==8){
				echo "Genap";
			}else{
				
			} ?></h6>
			
		
	<table class="table table-bordered table-hover table-striped">
		
		<tr>
			<th>NO</th>
			<th>KODE MATA KULIAH</th>
			<th>NAMA MATA KULIAH</th>
			<th>SKS</th>
			<th>NILAI</th>
			<th>ANGKA MUTU</th>
		</tr>

				<?php $i = 1 ?>
				<?php $jumlahSks = 0; ?>
				<?php $jumlahNilai = 0; $ipkkomulati=[];?>
				<?php $hasilNilai=$this->Mahasiswa_model->semuaNilai($mhs_nim,$row->semester);
				$jumlahsmstr=$this->Mahasiswa_model->semuaNilai($mhs_nim,$row->semester); ?>
				<?php foreach ($hasilNilai as $keys ):?>

			<tr>
				<td width="20px"><?= $i; ?></td>
				<td><?= $keys->kode_matakuliah;  ?></td>
				<td><?= $keys->nama_matakuliah; ?></td>
				<td align="center"><?= $keys->sks; ?></td>
				<td align="center"><?= konvert($keys->nilai); ?></td>

				<td align="center"><?= skorNilai($keys->nilai,$keys->sks) ?></td>
				<?php 
				$jumlahSks+=$keys->sks;
				$jumlahNilai+=skorNilai($keys->nilai,$keys->sks);
				 ?>

			</tr> 
			<!-- <tr>
				<td width="20px"><?= $i; ?></td>
				

			</tr> -->
				<?php $i++; ?>
		<?php endforeach ?>
			
		<tr>
			<td colspan="3">Jumlah</td>
			<td align="center"><?= $jumlahSks ?></td>
			<td></td>
			<td align="center"><?= $jumlahNilai ?></td>	
		</tr>
	</table>
	</tr>
	Index Prestasi Semester: <?= number_format($jumlahNilai/$jumlahSks,2); 
$ipk[]=$jumlahNilai; 
$totalSmtr2[]=$jumlahSks;
?>

		<?php endforeach; ?>

	<?php 
$ahir2 = (array_sum($ipk))/(array_sum($totalSmtr2));
?>
		
		<tr>
			<p class="text-center">Indeks Prestrasi Kumulatif : <?=number_format($ahir2,2); ?></p>
		</tr>
</div>