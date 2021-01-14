<div class="container-fluid">
	
	<div class="alert alert-success" role="alert">
		<i class="fas fa-edit"></i> HALAMAN APPROVAL KRS
	</div>

	<table class="table table-hover table-bordered table-striped">
		<thead>
			<tr>
				<th scope="col">no</th>
				<th scope="col">nama</th>
				<th scope="col">nim</th>
				<th scope="col">prodi</th>
				<th scope="col">Akses</th>
			</tr>
			</thead>
			<tbody>
			<?php $i=1 ?>
			<?php foreach($mahasiswa as $mhs): ?>
			<tr>
				<th><?= $i++; ?></th>
				<td><?=$mhs->nama; ?></td>
				<td><?=$mhs->nim; ?></td>
				<td><?=$mhs->nama_prodi; ?></td>
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
</div>