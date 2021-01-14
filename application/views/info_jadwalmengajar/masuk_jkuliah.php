<div class="container-fluid">
	
	<div class="alert alert-success">
		<i class="fas fa-university"></i> FORM MASUK HALAMAN INFO JADWAL MENGAJAR
	</div>

	
		<div class="form-group">
			<label>Program Studi</label>
			<select id="id_prodi" name="nama_prodi" class="form-control">
				<option value="">--Pilih Program Studi--</option>
				<?php foreach($prodi as $prd) : ?>
					<option value="<?= $prd->id_prodi  ?>"><?= $prd->nama_prodi; ?></option>
				<?php endforeach; ?>
			</select>
		</div>

		<button class="btn btn-primary masuk" onclick="masuk(id_prodi)">Masuk</button>
	
</div>

 <script >
 	function masuk(id_prodi){
 		var id_prodi = document.getElementById("id_prodi").value;
 		if(id_prodi == '' )
 		{
 			alert('Pilih Prodi Terlebih Dahulu');
 		}else{
 			window.location = "<?= site_url('dosen1/info_jadwalmengajar/masuk_jadwalmengajar'); ?>/"+id_prodi;
 		}
 		//alert(id_prodi); 
 		
 	}
</script>