<div class="container-fluid">
	<div class="alert alert-success" role="alert">
	    <i class="fas fa-university"></i> BARANG
	</div>

<?= $this->session->flashdata('pesan');  ?>
<a href="<?= base_url('barang/input') ?>" class="btn btn-primary">Tambah Barang <i class="fas fa-plus fa-sm"></i></a>
	<table class="table table-border table-striped table-hover">
		<tr>
			<th>NO</th>
			<th>KODE BARANG</th>
			<th>NAMA BARANG</th>
			<th>SATUAN</th>
			<th>HARGA</th>
			<th>MERK</th>
			<th>BERAT</th>
			<th colspan="2">AKSI</th>
		</tr>
		<?php $i=1 ?>
		<?php foreach($barang as $brg) : ?>
			<tr>
				<th><?= $i++ ?></th>
				<td><?= $brg->kode_barang; ?></td>
				<td><?= $brg->nama_barang; ?></td>
				<td><?= $brg->satuan ?></td>
				<td><?= $brg->harga ?></td>
				<td><?= $brg->merk ?></td>
				<td><?= $brg->berat ?></td>
				<td width="20px"><?= anchor('barang/update/' .$brg->id_barang, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
				<td width="20px"><?= anchor('barang/delete/' .$brg->id_barang, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
			</tr>
			<?php $i++ ?>
		<?php endforeach; ?>
</div>