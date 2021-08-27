<div class="container-fluid">
	
	<div class="alert alert-success" role="alert">
	    <i class="fas fa-university"></i> FORM MASUK HALAMAN KHS
	</div>

	<?= $this->session->flashdata('pesan');  ?>

	<form method="post" action="<?= base_url('nilai/nilai_aksi') ?>">
		
		<div class="form-group">
			<label>NIM Mahasiswa</label>
			<input type="text" name="nim" placeholder="Masukan Nim Mahasiswa" class="form-control">
			<?= form_error('nim', '<div class="text-danger small ml-2">','</div>') ?>
		</div>


		<button type="submit" class="btn btn-primary">Proses</button>
	</form>
</div>