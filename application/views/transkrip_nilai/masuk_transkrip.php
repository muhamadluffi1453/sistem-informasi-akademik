<div class="container-fluid">
	<div class="alert alert-success">
		<i class="fas fa-university"></i> FORM MASUK HALAMAN TRANSKRIP NILAI
	</div>

	<?= $this->session->flashdata('pesan');  ?>

	<form method="post" action="<?= base_url('transkrip_nilai/buat_transkrip_aksi')  ?>">
		<div class="form-group">
			<label>NIM</label>
			<input type="text" name="nim" class="form-control" placeholder="Masukan NIM Mahasiswa">

			<?= form_error('nim', '<div class="text-danger small ml-2">', '</div>') ?>
		</div>

		<button type="submit" class="btn btn-primary">Proses</button>
	</form>
</div>