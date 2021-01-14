<div class="container-fluid">
	<div class="alert alert-success" role="alert">
	    <i class="fas fa-university"></i> Ruangan
	</div>

<div class="container">
    <div class="row mt-2">
      <div class="col-12 mb-3">
        <div class="card">
          <div class="card-body">
           <?= form_open_multipart('tatausaha/ruangan/uploaddata') ?>
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

	<a href="<?= base_url('tatausaha/ruangan/tambah_ruangan') ?>" class="btn btn-primary">Tambah Ruangan <i class="fas fa-plus fa-sm"></i></a>

	<a href="<?= base_url('tatausaha/ruangan/print') ?>"target="_blank" class="btn btn-info">Print <i class="fas fa-print fa-sm"></i></a>

<div class="btn-group">
  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fa fa-download"></i> Export
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="<?= base_url('tatausaha/ruangan/ruangan_pdf') ?>"target="_blank">PDF</a>
    <a class="dropdown-item" href="<?= base_url('tatausaha/ruangan/excel') ?>">EXCEL</a>
  </div>
</div>
	

<div class="row mt-3 ">
    <div class="col-md-4">
      <form action="<?= base_url('tatausaha/ruangan') ?>" method="post">
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
			<th>KODE RUANGAN</th>
			<th>NAMA RUANGAN</th>
			<th>FAKULTAS</th>
			<th colspan="2">AKSI</th>
		</tr>
		<?php $start=1 ?>
		<?php foreach ($ruangan as $ruang) :?>
			<tr>
				<th width="20px"><?= $start++; ?></th>
				<td><?= $ruang['kode_ruangan']; ?></td>
				<td><?= $ruang['nama_ruangan']; ?></td>
				<td><?= $ruang['fakultas']; ?></td>
				<td width="20px"><?= anchor('tatausaha/ruangan/update/' .$ruang['id_ruangan'], '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
				<td width="20px"><?= anchor('tatausaha/ruangan/delete/' .$ruang['id_ruangan'], '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
			</tr>
      
		<?php endforeach; ?>
    
    
	</table>

	<?= $this->pagination->create_links(); ?>
</div>