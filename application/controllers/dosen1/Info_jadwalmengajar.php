<?php  

class Info_jadwalmengajar extends CI_Controller{
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
		$data=[
			'nama_prodi' => set_value('nama_prodi')
		];
		$data['prodi'] = $this->jadwalkuliah_model->tampil_data('prodi')->result();
		$judul['title'] = 'Masuk Halaman Info Jadwal Mengajar';
		$this->load->view('templates_admin/templates_dosen/auth_header', $judul);
		$this->load->view('templates_admin/templates_dosen/sidebar');
		$this->load->view('info_jadwalmengajar/masuk_jkuliah', $data);
		$this->load->view('templates_admin/templates_dosen/auth_footer');
	}

	public function masuk_jadwalmengajar($nama_prodi)
	{
		$judul['title'] = 'Masuk Halaman Info Jadwal Mengajar';
		$data['join_kuliah'] = $this->jadwalkuliah_model->jointable_kuliah($nama_prodi);
		$data['nama_prodi'] = $nama_prodi;
		$this->load->view('templates_admin/templates_dosen/auth_header', $judul);
		$this->load->view('templates_admin/templates_dosen/sidebar');
		$this->load->view('info_jadwalmengajar/masuk_jadwalmengajar', $data);
		$this->load->view('templates_admin/templates_dosen/auth_footer');
	}
}