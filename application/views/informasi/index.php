<div class="container-fluid">
  
  <div class="alert alert-success" role="alert">
      <i class="fas fa-user-graduate"></i> INFORMASI
  </div>

  <?= $this->session->flashdata('pesan');  ?>
  <?= anchor('informasi/tambah_informasi', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Informasi</button>') ?>
  

  <table class="table table-bordered table-striped table-hover">
   <tr>
     <th>NO</th>
     <th>ICON</th>
     <th>JUDUL INFORMASI</th>
     <th>ISI INFORMASI</th>
     <th colspan="2">AKSI</th>
   </tr>

  <?php $i = 1  ?>
  <?php foreach($informasi as $info) :?>
   <tr>
     <th width="20px"><?= $i++; ?></th>
     <td><?= $info->icon;  ?></td>
     <td><?= $info->judul_informasi;  ?></td>
     <td><?= $info->isi_informasi;  ?></td>
     <td width="20px"><?= anchor('informasi/update/' .$info->id_informasi, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
     <td width="20px"><?= anchor('informasi/delete/' .$info->id_informasi, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
   </tr>
 <?php endforeach; ?>
   <?php $i++; ?>
  </table>
</div>

  