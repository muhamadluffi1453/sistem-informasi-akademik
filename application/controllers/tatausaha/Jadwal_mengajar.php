<?php  

class Jadwal_mengajar extends CI_Controller{

	public function __construct()
	{
		parent:: __construct();

		if(!isset($this->session->userdata['username'])){
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dimissible fade show" role="alert">Anda Belum Login!<button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span></button></div>');
			redirect('auth/index');
		}
	}

	public function index()
	{
		$data = [
			'nama_prodi' => set_value('nama_prodi')
		];
		$data['prodi'] = $this->jadwalmengajar_model->tampil_data('prodi')->result();

		$judul['title'] = 'Masuk Halaman Jadwal Mengajar';
		$this->load->view('templates_admin/templates_tu/auth_header', $judul);
		$this->load->view('templates_admin/templates_tu/sidebar');
		$this->load->view('jadwal_mengajar/masuk_jadwal', $data);
		$this->load->view('templates_admin/templates_tu/auth_footer');

	}
	public function masuk_jadwalmengajar()
	{
		if (isset($_POST['id_prodi'])) {
				$nama_prodi=$this->input->post('id_prodi');
				
		}elseif (isset($_GET)) {
			$nama_prodi=$this->input->get('id_prodi');
			
		}
		
		$judul['title'] = 'Masuk Halaman Jadwal Mengajar';
		$data['join_jadwal'] = $this->jadwalmengajar_model->jointable($nama_prodi);
		$data['nama_prodi'] = $nama_prodi;
		$this->load->view('templates_admin/templates_tu/auth_header', $judul);
		$this->load->view('templates_admin/templates_tu/sidebar');
		$this->load->view('jadwal_mengajar/data_jadwalmengajar', $data);
		$this->load->view('templates_admin/templates_tu/auth_footer');

	}
	
	public function tambah_jadwal($nama_prodi)
	{
		$judul['title'] = 'Halaman Tambah Jadwal';
		$data['matakuliah'] = $this->jadwalmengajar_model->joinmk($nama_prodi);
		$data['dosen'] = $this->jadwalmengajar_model->tampil_data('dosen')->result();
		$data['ruangan'] = $this->jadwalmengajar_model->tampil_data('ruangan')->result();
		$data['nama_prodi'] = $nama_prodi;

		$this->load->view('templates_admin/templates_tu/auth_header', $judul);
		$this->load->view('templates_admin/templates_tu/sidebar');
		$this->load->view('jadwal_mengajar/jadwal_form', $data);
		$this->load->view('templates_admin/templates_tu/auth_footer');
	}

	public function tambah_jadwal_aksi($nama_prodi)
	{
		
		$P=$nama_prodi;
		
		$this->_rules();

		if($this->form_validation->run() == FALSE)
		{
			$this->tambah_jadwal();
		}else{
			$kode_matakuliah 	= $this->input->post('kode_matakuliah');
			$id_dosen 	= $this->input->post('id_dosen');
			$id_ruangan = $this->input->post('id_ruangan');
			$hari = $this->input->post('hari');
			$jam = $this->input->post('jam');
			$nama_prodi = $this->input->post('id_prodi');

			$data = [
					'kode_matakuliah'	=> $kode_matakuliah,
					'id_dosen' 			=> $id_dosen,
					'id_ruangan' 		=> $id_ruangan,
					'hari' 				=> $hari,
					'jam' 				=> $jam
			];

			$this->jadwalmengajar_model->insert($data, 'jadwal_mengajar');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dimissible fade show" role="alert">Data Jadwal Berhasil Ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span></button></div>');
			redirect('tatausaha/jadwal_mengajar/masuk_jadwalmengajar/?id_prodi='.$P);
		}

	}
	public function _rules()
	{
		$this->form_validation->set_rules('kode_matakuliah', 'kode_matakuliah', 'required');
		$this->form_validation->set_rules('id_dosen', 'id_dosen', 'required');
		$this->form_validation->set_rules('id_ruangan', 'id_ruangan', 'required');
		$this->form_validation->set_rules('hari', 'hari', 'required');
		$this->form_validation->set_rules('jam', 'jam', 'required');

	}

	public function update($nama_prodi, $id)
	{
		$where = ['id_jdlmengajar' => $id];
		$data['jadwal_mengajar'] = $this->jadwalmengajar_model->get_by_id('jadwal_mengajar', $id)->result();
		$data['matakuliah'] = $this->jadwalmengajar_model->joinmk($nama_prodi);
		$data['dosen'] = $this->jadwalmengajar_model->tampil_data('dosen')->result();
		$data['ruangan'] = $this->jadwalmengajar_model->tampil_data('ruangan')->result();
		$data['id_prodi'] = $nama_prodi;
		$judul['title'] = 'Form Update Jadwal Mengajar';

		$this->load->view('templates_admin/templates_tu/auth_header', $judul);
		$this->load->view('templates_admin/templates_tu/sidebar');
		$this->load->view('jadwal_mengajar/jadwal_update', $data);
		$this->load->view('templates_admin/templates_tu/auth_footer');

	}

	public function update_aksi()
	{
		$id = $this->input->post('id_jdlmengajar');
		$kode_matakuliah = $this->input->post('kode_matakuliah');
		$id_dosen = $this->input->post('id_dosen');
		$id_ruangan = $this->input->post('id_ruangan');
		$hari = $this->input->post('hari');
		$jam = $this->input->post('jam');
		$nama_prodi = $this->input->post('id_prodi');

		$data=[
			'kode_matakuliah' => $kode_matakuliah,
			'id_dosen' => $id_dosen,
			'id_ruangan' => $id_ruangan,
			'hari' => $hari,
			'jam' => $jam
		];

		$where = ['id_jdlmengajar' => $id];
		$this->jadwalmengajar_model->update($where,$data,'jadwal_mengajar');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dimissible fade show" role="alert">Data Jadwal Berhasil Di Update!<button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span></button></div>');
		redirect('tatausaha/jadwal_mengajar/masuk_jadwalmengajar/?id_prodi='.$nama_prodi);
	}

	public function delete($id_prodi, $id)
	{
		$where = ['id_jdlmengajar' => $id];
		$this->jadwalmengajar_model->hapus_data($where,'jadwal_mengajar');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dimissible fade show" role="alert">Data Jadwal Berhasil Dihapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span></button></div>');
		redirect('tatausaha/jadwal_mengajar/masuk_jadwalmengajar/?id_prodi='.$id_prodi);
	}
	
	
}