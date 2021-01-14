<div class="container-fluid">
	
	<div class="alert alert-success" role="alert">
	    <i class="fas fa-university"></i> DAFTAR USER AKADEMIK
	</div>

	<?= $this->session->flashdata('pesan');  ?>

	<?= anchor('user_akademik/tambah_user', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i>Tambah User</button>') ?>


<div class="row mt-3 ">
    <div class="col-md-4">
      <form action="<?= base_url('user_akademik') ?>" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Search.." name="keyword" autocomplete="off">
          <div class="input-group-append">
            <input class="btn btn-primary" type="submit" name="submit">
          </div>
        </div>
      </form>
    </div>
  </div>


	<table class="table table-bordered table-hover table-striped">
		<tr>
			<th>NO</th>
			<th>NAME</th>
			<th>USERNAME</th>
			<th>EMAIL</th>
			<th>LEVEL</th>
			<th>BLOKIR</th>
			<th colspan="3">AKSI</th>
		</tr>

		<?php 
		$no=1;

		foreach($user_akademik as $us) :?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $us['name']  ?></td>
				<td><?= $us['username'] ?></td>
				<td><?= $us['email'] ?></td>
				<td><?= $us['level'] ?></td>
				<td><?= $us['blokir'] ?></td>
				<td width="20px"><?= anchor('user_akademik/detail/' .$us['id'], '<div class="btn btn-sm btn-warning"><i class="fa fa-eye"></i></div>') ?></td>
				<td width="20px"><?= anchor('user_akademik/update/' .$us['id'], '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
				<td width="20px"><?= anchor('user_akademik/delete/' .$us['id'], '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
			</tr>
		<?php endforeach; ?>
	</table>

	<?= $this->pagination->create_links(); ?>
</div>