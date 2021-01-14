<?php  

class Infojadwal_ujian extends CI_Controller{
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
			'nama_prodi' => set_value('nama_prodi'),
			'nama_ujian' => set_value('nama_ujian')
		];
		$data['prodi'] = $this->info_ujian_model->tampil_data('prodi')->result();
		$data['p_ujian'] = $this->info_ujian_model->tampil_data('p_ujian')->result();
		$judul['title'] = 'Masuk Halaman Jadwal Kuliah';
		$this->load->view('templates_admin/templates_mhs/auth_header', $judul);
		$this->load->view('templates_admin/templates_mhs/sidebar');
		$this->load->view('templates_admin/templates_mhs/topbar');
		$this->load->view('infojadwal_ujian/masuk_jujian', $data);
		$this->load->view('templates_admin/templates_mhs/auth_footer');
	}

	public function masuk_jadujian()
	{
		if(isset($_POST['id_prodi'])){
			$nama_prodi = $this->input->post('id_prodi');
			$nama_ujian = $this->input->post('id_ujian');
		}elseif(isset($_GET)){
			$nama_prodi = $this->input->get('id_prodi');
			$nama_ujian = $this->input->get('id_ujian');
		}

		$data['join_ujian'] = $this->info_ujian_model->join_ujian($nama_prodi,$nama_ujian);
		$data['nama_prodi'] = $nama_prodi;
		$data['nama_ujian'] = $nama_ujian;
		$judul['title'] = 'Halaman Informasi Jadwal Ujian';
		$this->load->view('templates_admin/templates_mhs/auth_header', $judul);
		$this->load->view('templates_admin/templates_mhs/sidebar');
		$this->load->view('infojadwal_ujian/dataj_ujian', $data);
		$this->load->view('templates_admin/templates_mhs/auth_footer');
}
}