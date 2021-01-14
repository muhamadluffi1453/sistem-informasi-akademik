<div class="container-fluid">
	
	<div class="alert alert-success" role="alert">
		<i class="fas fa-edit"></i> HALAMAN APPROVAL KRS
	</div>

	<table class="table table-hover table-bordered table-striped">
		<thead>
			<tr>
				<th scope="col">NO</th>
				<th scope="col">NAMA</th>
				<th scope="col">NIM</th>
				<th scope="col">PRODI</th>
				<th scope="col">AKSES</th>
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
					<form action="<?=base_url('keuangan/approval/ubah_akses') ?>" method="POST">
						<input type="hidden" name="id" value="<?= $mhs->id_mhs; ?>">
					<div class="form-check">
						<?php if ($mhs->is_akses!=1):?>
						<input class="form-check-input ml-5" name="akses" type="checkbox">
						<?php else: ?>
							<input class="form-check-input ml-5" name="akses" type="checkbox" checked>
						<?php endif; ?>
					</div>
					<button type="submit" class="btn btn-primary">ubah</button>
					</form>
				</td>
			</tr>
			</tbody>
		<?php endforeach; ?>
		<?php $i++; ?>
	</table>
</div>