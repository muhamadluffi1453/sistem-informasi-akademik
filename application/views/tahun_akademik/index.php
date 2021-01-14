<div class="container-fluid">
	
	<div class="alert alert-success" role="alert">
      <i class="fas fa-calendar-alt"></i> TAHUN AKADEMIK
    </div>

    <?= $this->session->flashdata('pesan');  ?>

    <a href="<?= base_url('tahun_akademik/tambah_tahun_akademik') ?>" class="btn btn-primary">Tambah Tahun Akademik <i class="fas fa-plus fa-sm"></i></a>

<div class="row mt-3 ">
    <div class="col-md-4">
      <form action="<?= base_url('tahun_akademik') ?>" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Search.." name="keyword" autocomplete="off">
          <div class="input-group-append">
            <input class="btn btn-primary" type="submit" name="submit">
          </div>
        </div>
      </form>
    </div>
  </div>

    <table class="table table-hover table-bordered table-striped">
    	<tr>
    		<th>NO</th>
    		<th>TAHUN AKADEMIK</th>
    		<th>SEMESTER</th>
    		<th>STATUS</th>
    		<th colspan="2">AKSI</th>
    	</tr>

    	<?php $i = 1  ?>
    	<?php foreach($tahun_akademik as $ak) : ?>
    		<tr>
    			<td width="20px"><?=$i++; ?></td>
    			<td><?= $ak['tahun_akademik']; ?></td>
    			<td><?= $ak['semester']; ?></td>
    			<td><?= $ak['status']; ?></td>
    			<td width="20px"><?= anchor('tahun_akademik/update/' .$ak['id_thn_akad'], '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
				<td width="20px"><?= anchor('tahun_akademik/delete/' .$ak['id_thn_akad'], '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
    		</tr>
    	<?php endforeach; ?>
    	<?php $i++; ?>
    </table>

    <?= $this->pagination->create_links(); ?>
</div>