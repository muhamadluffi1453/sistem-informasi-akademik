<div class="container-fluid">
	
	<div class="alert alert-success" role="alert">
      <i class="fas fa-eye"></i> DETAIL USER
  </div>

  <table class="table table-hover table-bordered table-striped ">
  	
  	<?php foreach($detail as $dt) : ?>
  	
  	<img class="mb-5"src="<?= base_url('assets/uploads/').$dt->foto ?>" style="width:20%">

  	<tr>
  		<td>NAME</td>
  		<td><?= $dt->name; ?></td>
  	</tr>

  	<tr>
  		<td>USERNAME</td>
  		<td><?= $dt->username; ?></td>
  	</tr>

    <tr>
      <td>PASSWORD</td>
      <td><?= $dt->password; ?></td>
    </tr>

    <tr>
      <td>EMAIL</td>
      <td><?= $dt->email; ?></td>
    </tr>

  	<tr>
  		<td>EMAIL</td>
  		<td><?= $dt->email; ?></td>
  	</tr>

    <tr>
      <td>LEVEL</td>
      <td><?= $dt->level; ?></td>
    </tr>

    <tr>
      <td>BLOKIR</td>
      <td><?= $dt->blokir; ?></td>
    </tr>

  	
  	<?php endforeach; ?>
  </table>
  <?= anchor('user_akademik/index', '<div class="btn btn-sm btn-primary">Kembali</div>') ?><br><br><br><br>
 </div>