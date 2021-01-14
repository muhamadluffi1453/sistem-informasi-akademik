<div class="container-fluid">
	
	<div class="alert alert-success" role="alert">
	    <i class="fas fa-university"></i> FORM UPDATE TENTANG KAMPUS
	</div>


		<?php foreach($tentang as $ttg) : ?>
	<form method="post" action="<?= base_url('tentang_kampus/update_aksi')  ?>">

		<div class="form-group">
			<label>Sejarah</label>
			<input type="hidden" name="id" class="form-control" value="<?= $ttg->id;  ?>">
			<input type="text" name="sejarah" class="form-control" value="<?= $ttg->sejarah;  ?>">
		</div>

		<div class="form-group">
			<label>Visi</label>
			<input type="text" name="visi" class="form-control" value="<?= $ttg->visi;  ?>">
		</div>

		<div class="form-group">
			<label>Misi</label>
			<input type="text" name="misi" class="form-control" value="<?= $ttg->misi;  ?>">
		</div>


		
		<button type="submit" class="btn btn-primary">Simpan</button>
	</form>
<?php endforeach; ?>
</div>