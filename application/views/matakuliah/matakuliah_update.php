<div class="container-fluid">
	
	<div class="alert alert-success" role="alert">
      <i class="fas fa-edit"></i> FORM UPDATE MATAKULIAH
  	</div>

  	<?php foreach($matakuliah as $mk) : ?>

  		<form method="post" action="<?= base_url('tatausaha/matakuliah/update_aksi'); ?>">
        
  			<div class="form-group">
  				<label>Nama Mata Kuliah</label>
  				<input type="hidden" name="kode_matakuliah" class="form-control" value="<?= $mk->kode_matakuliah  ?>">
  				<input type="text" name="nama_matakuliah" class="form-control" value="<?= $mk->nama_matakuliah  ?>">
          <?= form_error('nama_matakuliah', '<div class="text-danger small" ml-3>') ?>
  			</div>

  			<div class="form-group">
  				<label>SKS</label>
  				<select name="sks" class="form-control">
  					<option><?= $mk->sks ?></option>
  					<option>1</option>
  					<option>2</option>
  					<option>3</option>
  					<option>4</option>
  					<option>5</option>
  					<option>6</option>
  				</select>
  			</div>

  			<div class="form-group">
  				<label>Semester</label>
  				<select name="semester" class="form-control">
  					<option><?= $mk->semester ?></option>
  					<option>1</option>
  					<option>2</option>
  					<option>3</option>
  					<option>4</option>
  					<option>5</option>
  					<option>6</option>
  					<option>7</option>
  					<option>8</option>
  				</select>
  			</div>

  	<div class="form-group">
      <label>Nama Prodi</label>
      <select id="id_prodi" name="id_prodi" class="form-control">
        <?php foreach($prodi as $prd): ?>
          <option value="<?= $prd->id_prodi ?>" <?= ($prd->id_prodi == $mk->id_prodi) ? "selected" : ""; ?>><?= $prd->nama_prodi; ?></option>
        <?php endforeach; ?>
      </select>
    </div>

  			<button type="submit" class="btn btn-sm btn-primary">Simpan</button>
  		</form>
  	<?php endforeach; ?>

</div>