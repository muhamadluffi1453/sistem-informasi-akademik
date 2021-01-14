<div class="container-fluid">
	<div class="alert alert-success">
		<i class="fas fa-university"></i> PROFILE USER
	</div>

	        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          

          <div class="card mb-3 col-lg-7">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="<?= base_url('assets/uploads/') . $mahasiswa['photo']; ?>" class="card-img">
              </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title"><?= $mahasiswa['nama']; ?></h5>
                    <p class="card-text"><?= $mahasiswa['nim']; ?></p>
                    <p class="card-text"><?= $mahasiswa['email']; ?></p>
                    <!-- <p class="card-text">Member since <?= date('d F Y', $user['date_created']); ?><small class="text-muted"></small></p> -->
                  </div>
                </div>
              </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

   
</div>