<div class="container-fluid">

	<div class="alert alert-success" role="alert">
      <i class="fas fa-university"></i> FORM UPDATE BARANG
  </div>

  	<?php foreach($barang as $brg) : ?>
	<form method="post" action="<?= base_url('barang/update_aksi'); ?>">
		<div class="form-group">
			<label>Kode Barang</label>
			<input type="hidden" name="id_barang" value="<?= $brg->id_barang; ?>">
			<input type="text" name="kode_barang" class="form-control" value="<?= $brg->kode_barang; ?>">
		</div>

		<div class="form-group">
			<label for="nama_barang">Nama Barang</label>
			<input type="text" name="nama_barang" class="form-control" value="<?= $brg->nama_barang; ?>">
		</div>

		<div class="form-group">
			<label for="satuan">Satuan</label>
			<input type="text" name="satuan" class="form-control" value="<?= $brg->satuan; ?>">
		</div>

		<div class="form-group">
			<label for="harga">Harga</label>
			<input type="text" name="harga" class="form-control" value="<?= $brg->harga; ?>">
		</div>

		<div class="form-group">
			<label for="merk">Merk</label>
			<input type="text" name="merk" class="form-control" value="<?= $brg->merk; ?>">
		</div>

		<div class="form-group">
			<label for="Berat">Berat</label>
			<input type="text" name="berat" class="form-control" value="<?= $brg->berat; ?>">
		</div>

		<button type="submit" name="update" class="btn btn-primary">Update Data</button>
	</form>
	<?php endforeach; ?>
</div>
