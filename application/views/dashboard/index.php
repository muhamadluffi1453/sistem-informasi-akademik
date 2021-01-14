<div class="container-fluid">
  <div class="alert alert-success" role="alert">
    <i class="fas fa-tachometer-alt"></i>Dashboard
  </div>
  <div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Selamat Datang!</h4>
    <p>Selamat Datang <strong><?= $username ?></strong> di Sistem Informasi Akademik Universitas Muhammadiyah Cirebon, anda login sebagai <strong><?= $level ?></strong></p>
    <hr>
    <button type="button" id="cek" class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal">
  		<i class="fas fa-cogs"></i> Control Panel
	</button>
  </div>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-cogs"></i> Control Panel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">

        	<div class="col-md-3 text-info text-center">
        		<a href="<?= base_url('prodi/index'); ?>"><p class="nav-link small text-info">PRODI</p></a>
        		<i class="fas fa-3x fa-university"></i>
        	</div>

        	<div class="col-md-3 text-info text-center">
        		<a href="<?= base_url('tahun_akademik/index'); ?>"><p class="nav-link small text-info">TAHUN AKADEMIK</p></a>
        		<i class="fas fa-3x fa-calendar"></i>
        	</div>

          <div class="col-md-3 text-info text-center">
            <a href="<?= base_url('krs/index'); ?>"><p class="nav-link small text-info">KRS</p></a>
            <i class="fas fa-3x fa-edit"></i>
          </div>

          <div class="col-md-3 text-info text-center">
            <a href="<?= base_url('nilai/index'); ?>"><p class="nav-link small text-info">KHS</p></a>
            <i class="fas fa-3x fa-file"></i>
          </div>

          <div class="col-md-3 text-info text-center">
            <a href="<?= base_url('transkrip_nilai/index'); ?>"><p class="nav-link small text-info">CETAK TRANSKRIP</p></a>
            <i class="fas fa-3x fa-file"></i>
          </div>

          <div class="col-md-3 text-info text-center">
            <a href="<?= base_url('nilai/input_nilai'); ?>"><p class="nav-link small text-info">INPUT NILAI</p></a>
            <i class="fas fa-3x fa-file"></i>
          </div>

          <div class="col-md-3 text-info text-center">
            <a href="<?= base_url('datamahasiswa/index'); ?>"><p class="nav-link small text-info">MAHASISWA</p></a>
            <i class="fas fa-3x fa-university"></i>
          </div>

          <div class="col-md-3 text-info text-center">
            <a href="<?= base_url('user_akademik/index'); ?>"><p class="nav-link small text-info">USER_AKADEMIK</p></a>
            <i class="fas fa-3x fa-user"></i>
          </div>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
  
</div>