<?php  

class Matakuliah extends CI_Controller{
	public function __construct()
	{
		parent:: __construct();
		$this->load->library('pdf');

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
		$data['prodi'] = $this->matakuliah_model->tampil_data('prodi')->result();
		$judul['title'] = 'Halaman Masuk Matakuliah';
		
		$this->load->view('templates_admin/templates_tu/auth_header', $judul);
		$this->load->view('templates_admin/templates_tu/sidebar');
		$this->load->view('templates_admin/templates_tu/topbar');
		$this->load->view('matakuliah/masuk_matkul', $data);
		$this->load->view('templates_admin/templates_tu/auth_footer');
	}

	public function masuk_matakuliah()
	{
		
		if (isset($_POST['id_prodi'])) {
				$nama_prodi=$this->input->post('id_prodi');
				
		}elseif (isset($_GET)) {
			$nama_prodi=$this->input->get('id_prodi');
			
		}

		$judul['title'] = 'Halaman Data Matakuliah';
		$data['matakuliah'] = $this->matakuliah_model->joinmk($nama_prodi);
		$data['nama_prodi'] = $nama_prodi;
		$this->load->view('templates_admin/templates_tu/auth_header', $judul);
		$this->load->view('templates_admin/templates_tu/sidebar');
		$this->load->view('templates_admin/templates_tu/topbar');
		$this->load->view('matakuliah/matkul', $data);
		$this->load->view('templates_admin/templates_tu/auth_footer');
	}

	public function tambah_matakuliah($nama_prodi)
	{
		$nama_prodi=$this->input->post('id_prodi');
		$data['matakuliah'] = $this->jadwalmengajar_model->joinmk($nama_prodi);
		$data['prodi'] = $this->matakuliah_model->tampil_data('prodi')->result();
		$data['nama_prodi'] = $nama_prodi;
		$judul['title'] = 'Form Input Matakuliah';
		$this->load->view('templates_admin/templates_tu/auth_header', $judul);
		$this->load->view('templates_admin/templates_tu/sidebar');
		$this->load->view('templates_admin/templates_tu/topbar');
		$this->load->view('matakuliah/matakuliah_form', $data);
		$this->load->view('templates_admin/templates_tu/auth_footer');
	}

	public function tambah_matakuliah_aksi()
	{
		$nama_prodi = $this->input->post('id_prodi');
		$P = $nama_prodi;
		

		$this->_rules();

		if($this->form_validation->run() == FAlSE){
			$this->tambah_matakuliah($P);
		}else{
			$kode_matakuliah 	= $this->input->post('kode_matakuliah');
			$nama_matakuliah 	= $this->input->post('nama_matakuliah');
			$sks 				= $this->input->post('sks');
			$semester 			= $this->input->post('semester');
			$nama_prodi 		= $this->input->post('id_prodi');

			$data = [
					'kode_matakuliah' 	=> $kode_matakuliah,
					'nama_matakuliah' 	=> $nama_matakuliah,
					'sks' 				=> $sks,
					'semester' 			=> $semester,
					'id_prodi'			=> $nama_prodi
					
						
			];

			$this->matakuliah_model->insert_data($data, 'matakuliah');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dimissible fade show" role="alert">Data Matakuliah Berhasil Ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span></button></div>');
			redirect('tatausaha/matakuliah/masuk_matakuliah/?id_prodi='.$P);
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('kode_matakuliah', 'kode_matakuliah', 'required', ['required' => 'Kode Matakuliah Wajib Diisi!']);
		$this->form_validation->set_rules('nama_matakuliah', 'nama_matakuliah', 'required', ['required' => 'Nama Matakuliah Wajib Diisi!']);
		$this->form_validation->set_rules('sks', 'sks', 'required', ['required' => 'sks Wajib Diisi!']);
		$this->form_validation->set_rules('semester', 'semester', 'required', ['required' => 'semester Wajib Diisi!']);
		
	}

	public function detail($id)
	{
		$data['detail'] = $this->matakuliah_model->ambil_kode_matakuliah($id);
		$judul['title'] = 'Halaman Detail Matakuliah';
		$this->load->view('templates_admin/templates_tu/auth_header', $judul);
		$this->load->view('templates_admin/templates_tu/sidebar');
		$this->load->view('templates_admin/templates_tu/topbar');
		$this->load->view('matakuliah/matakuliah_detail', $data);
		$this->load->view('templates_admin/templates_tu/auth_footer');
	}

	public function update($id)
	{
		$where = ['kode_matakuliah' => $id];

		$nama_prodi = $this->input->post('id_prodi');
		$data['matakuliah'] = $this->matakuliah_model->ambil_id('matakuliah', $id)->result();
		$data['matkul'] = $this->matakuliah_model->joinmk($nama_prodi);
		$data['prodi'] = $this->matakuliah_model->tampil_data('prodi')->result();
		$judul['title'] = 'Form Update Matakuliah';
		$this->load->view('templates_admin/templates_tu/auth_header', $judul);
		$this->load->view('templates_admin/templates_tu/sidebar');
		$this->load->view('templates_admin/templates_tu/topbar');
		$this->load->view('matakuliah/matakuliah_update', $data);
		$this->load->view('templates_admin/templates_tu/auth_footer');
	}

	public function update_aksi()
	{
		$id = $this->input->post('kode_matakuliah');
		$P = $id;

		$this-> _rules();

		if($this->form_validation->run()==FALSE){
			$this->update($P);
		}else{
		$id 				= $this->input->post('kode_matakuliah');
		$kode_matakuliah 	= $this->input->post('kode_matakuliah');
		$nama_matakuliah 	= $this->input->post('nama_matakuliah');
		$sks 				= $this->input->post('sks');
		$semester 			= $this->input->post('semester');
		$nama_prodi			= $this->input->post('id_prodi');

		$data = [
			'kode_matakuliah' 	=> $kode_matakuliah,
			'nama_matakuliah' 	=> $nama_matakuliah,
			'sks' 				=> $sks,
			'semester' 			=> $semester,
			'id_prodi' 			=> $nama_prodi,
		];
		$where = ['kode_matakuliah' => $id];
		$this->matakuliah_model->update_data($where,$data,'matakuliah');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dimissible fade show" role="alert">Data Matakuliah Berhasil Di Update!<button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span></button></div>');
		redirect('tatausaha/matakuliah/masuk_matakuliah/?id_prodi='.$nama_prodi);
		}
		
	}

	public function delete($id_prodi,$id)
	{
		// $nama_prodi = $this->input->post('id_prodi');
		$where = ['kode_matakuliah' => $id];
		$this->matakuliah_model->hapus_data($where, 'matakuliah');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dimissible fade show" role="alert">Data Mata Kuliah Berhasil Dihapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span></button></div>');
		redirect('tatausaha/matakuliah/masuk_matakuliah/?id_prodi='.$id_prodi);
	}
}