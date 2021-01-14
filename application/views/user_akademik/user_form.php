<div class="container-fluid">
	
	<div class="alert alert-success" role="alert">
	    <i class="fas fa-university"></i> FORM TAMBAH USER
	</div>

	<?= form_open_multipart('user_akademik/tambah_user_aksi') ?>
		<div class="form-group">
			<label>Name</label>
			<input type="text" name="name" placeholder="Masukan name" class="form-control">
			<?= form_error('name', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Username</label>
			<input type="text" name="username" placeholder="Masukan Username" class="form-control">
			<?= form_error('username', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Password</label>
			<input type="text" name="password" placeholder="Masukan Password" class="form-control">
			<?= form_error('password', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Email</label>
			<input type="text" name="email" placeholder="Masukan Email" class="form-control">
			<?= form_error('email', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Level</label>
			<select name="level" class="form-control">
				<?php 
					if($level == 'akademik'){
				 ?>
				 <option value="akademik" selected>Akademik</option>
				 <option value="tatausaha">Tata Usaha</option>
				 <option value="keuangan">Keuangan</option>
				 <option value="dosen">Dosen</option>

				 <?php 
				 	} elseif($level == 'tu'){
				  ?>

				 <option value="akademik">Akademik</option>
				 <option value="tatausaha" selected>Tata Usaha</option>
				 <option value="keuangan">Keuangan</option>
				 <option value="dosen">Dosen</option>

				 <?php 
					} elseif($level == 'keuangan'){				 
				  ?>

				 <option value="akademik">Akademik</option>
				 <option value="tatausaha">Tata Usaha</option>
				 <option value="keuangan" selected>Keuangan</option>
				 <option value="dosen">Dosen</option>

				 <?php 
				 	} elseif($level == 'dosen'){
				  ?>

				 <option value="akademik">Akademik</option>
				 <option value="tatausaha">Tata Usaha</option>
				 <option value="keuangan">Keuangan</option>
				 <option value="dosen" selected>Dosen</option>

				 <?php 
				 	}else{
				  ?>

				 <option value="akademik">Akademik</option>
				 <option value="tatausaha">Tata Usaha</option>
				 <option value="keuangan">Keuangan</option>
				 <option value="dosen">Dosen</option>

				<?php } ?>

			</select>

			<?= form_error('level', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Blokir</label>
			<select name="blokir" class="form-control">
				<?php 
					if($blokir == 'Y'){
				 ?>
				 <option value="Y" selected>Ya</option>
				 <option value="N">Tidak</option>
				

				 <?php 
				 	} elseif($blokir == 'N'){
				  ?>

				 <option value="Y">Ya</option>
				 <option value="N" selected>Tidak</option>

				 <?php 
				 	}else{
				  ?>

				 <option value="Y">Ya</option>
				 <option value="N">Tidak</option>

				<?php } ?>

			</select>

			<?= form_error('blokir', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Foto</label><br>
			<input type="file" name="foto">
		</div>

		<button type="submit" class="btn btn-primary">Simpan</button>
	<?= form_close(); ?>

</div>