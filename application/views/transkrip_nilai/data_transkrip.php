<div class="container-fluid">
	
	<center>
		<legend><strong>TRANSKRIP NILAI</strong></legend>

		<table>
			<tr>
				<td>NIM</td>
				<td>: <?= $nim; ?></td>
			</tr>

			<tr>
				<td>Nama</td>
				<td>: <?= $nama; ?></td>
			</tr>
			
			<tr>		
				<td>Program Studi</td>
				<td>: <?= $prodi; ?></td>
			</tr>
		</table>
	</center>

	<a href="<?= base_url('transkrip_nilai/print_transkrip/').$nim ?>" target="_blank" class="btn btn-info"><i class="fas fa-print">Print</i></a>

	<table class="table table-striped table-hover table-bordered mt-3">
		<tr>
			<th>NO</th>
			<th>KODE MATA KULIAH</th>
			<th>NAMA MATA KULIAH</th>
			<th align="center">SKS</th>
			<th align="center">NILAI</th>
			<th align="center">ANGKA MUTU</th>
		</tr>

		<?php 
			$no=1;
			$JSks=0;
			$JSkor=0;

			foreach($transkrip as $tr) : ?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $tr->kode_matakuliah  ?></td>
					<td><?= $tr->nama_matakuliah  ?></td>
					<td align="center"><?= $tr->sks  ?></td>
					<td align="center"><?= konvert($tr->nilai)  ?></td>
					<td align="center"><?= skorNilai($tr->nilai,$tr->sks);  ?></td>

					<?php 
						$JSks+=$tr->sks;
						$JSkor+=skorNilai($tr->nilai,$tr->sks);
					 ?>
				</tr>
			<?php endforeach; ?>

			<tr>
				<td colspan="3">Jumlah</td>
				<td align="center"><?= $JSks ?></td>
				<td></td>
				<td align="center"><?= $JSkor ?></td>
			</tr>
		
	</table>

	<p class="text-center">Indeks Prestrasi Kumulatif : <?= number_format($JSkor/$JSks,2) ?></p>
</div>