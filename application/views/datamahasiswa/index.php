<div class="container-fluid">
  
  <div class="alert alert-success" role="alert">
      <i class="fas fa-user-graduate"></i> MAHASISWA
  </div>

  <div class="container">
    <div class="row mt-2">
      <div class="col-12 mb-3">
        <div class="card">
          <div class="card-body">
           <?= form_open_multipart('datamahasiswa/uploaddata') ?>
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
  
  <a href="<?= base_url('datamahasiswa/input') ?>" class="btn btn-primary">Tambah Mahasiswa <i class="fas fa-plus fa-sm"></i></a>
   <a href="<?= base_url('datamahasiswa/print') ?>" target="_blank" class="btn btn-info">Print <i class="fas fa-print fa-sm"></i></a>

  <div class="btn-group">
  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fa fa-download"></i> Export
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="<?= base_url('datamahasiswa/mahasiswa_print') ?>"target="_blank">PDF</a>
    <a class="dropdown-item" href="<?= base_url('datamahasiswa/excel') ?>">EXCEL</a>
  </div>
</div>

<div class="row mt-3 ">
    <div class="col-md-4">
      <form action="<?= base_url('datamahasiswa') ?>" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Search.." name="keyword" autocomplete="off">
          <div class="input-group-append">
            <input class="btn btn-primary" type="submit" name="submit">
          </div>
        </div>
      </form>
    </div>
  </div>
  

  <table class="table table-bordered table-striped table-hover">
   <tr>
     <th>NO</th>
     <th>NAMA</th>
     <th>NIM</th>
     <th>EMAIL</th>
     <th>NAMA PRODI</th>
     <th colspan="3">AKSI</th>
   </tr>

  <?php $i = 1  ?>
  <?php foreach($mahasiswa as $mhs) :?>
   <tr>
     <th width="20px"><?= ++$start; ?></th>
     <td><?= $mhs['nama'];  ?></td>
     <td><?= $mhs['nim'];  ?></td>
     <td><?= $mhs['email'];  ?></td>
     <td><?= $mhs['nama_prodi']; ?></td>
     <td width="20px"><?= anchor('datamahasiswa/detail/' .$mhs['id_mhs'], '<div class="btn btn-sm btn-warning"><i class="fa fa-eye"></i></div>') ?></td>
     <td width="20px"><?= anchor('datamahasiswa/update/' .$mhs['id_mhs'], '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
     <td width="20px"><?= anchor('datamahasiswa/delete/' .$mhs['id_mhs'], '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
   </tr>
 <?php endforeach; ?>
   <?php $i++; ?>
  </table>

  <?= $this->pagination->create_links(); ?>
</div>

  