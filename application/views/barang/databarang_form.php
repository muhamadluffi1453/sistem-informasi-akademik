<div class="container-fluid">

	<div class="alert alert-success" role="alert">
      <i class="fas fa-user-graduate"></i> FORM DATA BARANG
  </div>

<div class="container-fluid">
	<form method="post" action="<?= base_url('barang/input_aksi')  ?>">
		<div class="form-group">
			<label>Kode Barang</label>
			<input type="text" name="kode_barang" placeholder="Masukan Kode Barang" class="form-control">
			<?= form_error('kode_barang', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Nama Barang</label>
			<input type="text" name="nama_barang" placeholder="Masukan Nama Barang" class="form-control">
			<?= form_error('nama_barang', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Satuan</label>
			<input type="text" name="satuan" placeholder="Satuan" class="form-control">
			<?= form_error('satuan', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Harga</label>
			<input type="text" name="harga" placeholder="Harga" class="form-control">
			<?= form_error('harga', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Merk</label>
			<input type="text" name="merk" placeholder="merk" class="form-control">
			<?= form_error('merk', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Berat</label>
			<input type="text" name="berat" placeholder="berat" class="form-control">
			<?= form_error('berat', '<div class="text-danger small" ml-3>') ?>
		</div>

		<button type="submit" class="btn btn-primary">Simpan</button>
	</form>
</div>