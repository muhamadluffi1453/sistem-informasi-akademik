<div class="container-fluid">
	
	<div class="alert alert-success" role="alert">
	    <i class="fas fa-university"></i> FORM UPDATE IDENTITAS
	</div>


		<?php foreach($identitas as $idn) : ?>
	<form method="post" action="<?= base_url('identitas/update_aksi')  ?>">

		<div class="form-group">
			<label>Judul Website</label>
			<input type="hidden" name="id_identitas" class="form-control" value="<?= $idn->id_identitas;  ?>">
			<input type="text" name="judul_website" class="form-control" value="<?= $idn->judul_website;  ?>">
		</div>

		<div class="form-group">
			<label>Alamat</label>
			<input type="text" name="alamat" class="form-control" value="<?= $idn->alamat;  ?>">
		</div>

		<div class="form-group">
			<label>Email</label>
			<input type="text" name="email" class="form-control" value="<?= $idn->email;  ?>">
		</div>

		<div class="form-group">
			<label>No. Telepon</label>
			<input type="text" name="telp" class="form-control" value="<?= $idn->telp;  ?>">
		</div>


		
		<button type="submit" class="btn btn-primary">Simpan</button>
	</form>
<?php endforeach; ?>
</div>