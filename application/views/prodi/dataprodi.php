<div class="container-fluid">
	<div class="alert alert-success" role="alert">
	    <i class="fas fa-university"></i> PRODI
	</div>


	<div class="container">
    <div class="row mt-2">
      <div class="col-12 mb-3">
        <div class="card">
          <div class="card-body">
           <?= form_open_multipart('prodi/uploaddata') ?>
              <div class="form-row">
                <div class="col-4">
                  <input type="file" class="form-control-file" id="importexcel" name="importexcel" accept=".xlsx,.xls">
                </div>
                <div class="col">
                  <button type="submit" class="btn btn-primary">Import</button>
                </div>
                <div class="col">
                  <?= $this->session->flashdata('pesan'); ?>
                </div>
              </div>
            <?= form_close(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>

	<?= $this->session->flashdata('pesan');  ?>

	<a href="<?= base_url('prodi/input') ?>" class="btn btn-primary">Tambah Prodi <i class="fas fa-plus fa-sm"></i></a>
	<a href="<?= base_url('prodi/print') ?>" target="_blank" class="btn btn-info">Print <i class="fas fa-print fa-sm"></i></a>

	<div class="btn-group">
	  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    <i class="fa fa-download"></i>Export
	  </button>
	  <div class="dropdown-menu">
	    <a class="dropdown-item" href="<?= base_url('prodi/prodi_pdf') ?>"target="_blank">PDF</a>
	    <a class="dropdown-item" href="<?= base_url('prodi/excel') ?>">EXCEL</a>
	  </div>
	</div>

<div class="row mt-3 ">
    <div class="col-md-4">
      <form action="<?= base_url('prodi') ?>" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Search.." name="keyword" autocomplete="off">
          <div class="input-group-append">
            <input class="btn btn-primary" type="submit" name="submit">
          </div>
        </div>
      </form>
    </div>
  </div>
	

	<table class="table table-border table-striped table-hover">
		<tr>
			<th>NO</th>
			<th>KODE PRODI</th>
			<th>NAMA PRODI</th>
			<th>FAKULTAS</th>
			<th colspan="2">AKSI</th>
		</tr>
		<?php $i=1 ?>
		<?php foreach ($prodi as $prd) :?>
			<tr>
				<th width="20px"><?= ++$start; ?></th>
				<td><?= $prd['kode_prodi']; ?></td>
				<td><?= $prd['nama_prodi']; ?></td>
				<td><?= $prd['fakultas']; ?></td>
				<td width="20px"><?= anchor('prodi/update/' .$prd['id_prodi'], '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
				<td width="20px"><?= anchor('prodi/delete/' .$prd['id_prodi'], '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
			</tr>

			<?php $i++; ?>
		<?php endforeach; ?>
	</table>

	<?= $this->pagination->create_links(); ?>
</div>