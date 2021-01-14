		<!-- <?php print_r($mahasiswa); ?> -->
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <div class="row">
          	<div class="col-lg-8">
          		<?= form_open_multipart('mahasiswa/profile_mhs/edit');?>
					<div class="form-group row">
						<input type="hidden" name="id_mhs" value="<?= $mahasiswa['id_mhs']; ?>">
						<label for="email" class="col-sm-2 col-form-label">Email</label>
						<div class="col-sm-10">
							<input type="text" name="email" class="form-control" id="email" value="<?= $mahasiswa['email']; ?>" readonly>
						</div>
					</div>

					<div class="form-group row">
						<label for="name" class="col-sm-2 col-form-label">Full Name</label>
						<div class="col-sm-10">
							<input type="text" name="nama" class="form-control" id="nama" value="<?= $mahasiswa['nama']; ?>">
							<?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-sm-2">Picture</div>
						<div class="col-sm-10">
							<div class="row">
								<div class="col-sm-3">
									<img src="<?= base_url('assets/uploads') . $mahasiswa['photo']; ?>" class="img-thumbnail">
								</div>
								<div class="col-sm-9">
									<div class="custom-file">
										<input type="file" class="custom-file-input" id="photo" name="photo">
										<label class="custom-file-label" for="image">Choose file</label>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group row justify-content-end">
						<div class="col-sm-10">
							<button type="submit" class="btn btn-primary">Edit</button>
						</div>
					</div>          			
          		</form>
          	</div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

   