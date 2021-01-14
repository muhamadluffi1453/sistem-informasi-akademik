<div class="container-fluid">
  
  <div class="alert alert-success" role="alert">
      <i class="fas fa-user-graduate"></i> Dosen
  </div>


  <?= $this->session->flashdata('pesan');  ?>

  <a href="<?= base_url('tatausaha/dosen/tambah_dosen/'.$nama_prodi) ?>" class="btn btn-primary">Tambah Dosen<i class="fas fa-plus fa-sm"></i></a>

  <a href="<?= base_url('tatausaha/dosen/print') ?>" target="_blank" class="btn btn-info">Print<i class="fas fa-print fa-sm"></i></a>

  <table class="table table-bordered table-striped table-hover">
   <tr>
     <th>NO</th>
     <th>PRODI</th>
     <th>NIDN</th>
     <th>NAMA</th>
     <th>JENIS KELAMIN</th>
     <th colspan="3">AKSI</th>
   </tr>

  <?php $i = 1  ?>
  <?php foreach($dosen as $dsn) :?>
   <tr>
     <th width="20px"><?= $i++; ?></th>
     <td><?= $dsn->nama_prodi; ?></td>
     <td><?= $dsn->nidn;  ?></td>
     <td><?= $dsn->nama_dosen;  ?></td>
     <td><?= $dsn->jenis_kelamin;  ?></td>
     <td width="20px"><?= anchor('tatausaha/dosen/detail/'.$nama_prodi. '/'  .$dsn->id_dosen, '<div class="btn btn-sm btn-warning"><i class="fa fa-eye"></i></div>') ?></td>
     <td width="20px"><?= anchor('tatausaha/dosen/update/'.$nama_prodi. '/' .$dsn->id_dosen, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
     <td width="20px"><?= anchor('tatausaha/dosen/delete/'.$nama_prodi. '/'  .$dsn->id_dosen, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
   </tr>
 <?php endforeach; ?>
   <?php $i++; ?>
  </table>

  
</div>

  