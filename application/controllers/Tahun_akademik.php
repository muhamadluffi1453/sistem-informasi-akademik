<?php  

class Tahun_akademik extends CI_Controller{
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
		$judul['title'] = 'Halaman Tahun Akademik';
		//ambil data keyword
		if($this->input->post('submit')) {
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		} else {
			$data['keyword'] = $this->session->userdata('keyword');
		}

		//config
		$this->db->like('tahun_akademik', $data['keyword']);
		$this->db->or_like('semester', $data['keyword']);
		$this->db->or_like('status', $data['keyword']);
		$this->db->from('tahun_akademik');
		$config['base_url'] = 'http://localhost/akademik/tahun_akademik/index';
		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];
		$config['per_page'] = 10;
		$config['num_links'] = 2;

		//styling
		$config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</ul></nav>';

		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		$config['attributes'] = array('class' => 'page-link');



		// initialize
		$this->pagination->initialize($config);

		$data['start'] = $this->uri->segment(3);
		$data['tahun_akademik'] = $this->tahunakademik_model->getThAkademik($config['per_page'], $data['start'], $data['keyword']);

		$this->load->view('templates_admin/auth_header', $judul);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('templates_admin/topbar');
		$this->load->view('tahun_akademik/index', $data);
		$this->load->view('templates_admin/auth_footer');
	}

	public function tambah_tahun_akademik()
	{
		$judul['title'] = 'Form Input Tahun Akademik';
		$this->load->view('templates_admin/auth_header', $judul);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('templates_admin/topbar');
		$this->load->view('tahun_akademik/tahun_akademik_form');
		$this->load->view('templates_admin/auth_footer');
	}

	public function tambah_tahun_akademik_aksi()
	{
		$this-> _rules();

		if($this->form_validation->run() == FAlSE)
		{
			$this->tambah_tahun_akademik();
		}else{
			$tahun_akademik 	= $this->input->post('tahun_akademik');
			$semester 			= $this->input->post('semester');
			$status 			= $this->input->post('status');

			$data = [
					'tahun_akademik' 	=> $tahun_akademik,
					'semester' 			=> $semester,
					'status' 			=> $status,
			];

			$this->tahunakademik_model->insert_data($data,'tahun_akademik');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dimissible fade show" role="alert">Data Tahun Akademik Berhasil Ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span></button></div>');
			redirect('tahun_akademik/index');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('tahun_akademik', 'Tahun_akademik', 'required', ['required' => 'Tahun akademik wajib diisi!']);
		$this->form_validation->set_rules('semester', 'Semester', 'required',['required' => 'Semester wajib diisi!']);
		$this->form_validation->set_rules('status', 'Status', 'required',['required' => 'Status wajib diisi!']);
	}

	public function update($id)
	{
		$where = ['id_thn_akad' => $id];
		$data['tahun_akademik'] = $this->prodi_model->edit_data($where, 'tahun_akademik')->result();
		$judul['title'] = 'Form Update Tahun Akademik';
		$this->load->view('templates_admin/auth_header', $judul);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('templates_admin/topbar');
		$this->load->view('tahun_akademik/tahun_akademik_update', $data);
		$this->load->view('templates_admin/auth_footer');
	}

	public function update_aksi()
	{
		$id = $this->input->post('id_thn_akad');
		$p = $id;
		$this->_rules();
		if($this->form_validation->run() == FALSE)
		{
			$this->update($p);
		}else{
		$id = $this->input->post('id_thn_akad');
		$tahun_akademik = $this->input->post('tahun_akademik');
		$semester = $this->input->post('semester');
		$status = $this->input->post('status');

		$data = [
			'tahun_akademik' => $tahun_akademik,
			'semester' => $semester,
			'status' => $status,
		];
		$where = ['id_thn_akad' => $id];
		$this->tahunakademik_model->update_data($where,$data,'tahun_akademik');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dimissible fade show" role="alert">Data Tahun Akademik Berhasil Di Update!<button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span></button></div>');
		redirect('tahun_akademik/index');
		}
		
	}

	public function delete($id)
	{
		$where = ['id_thn_akad' => $id];
		$this->tahunakademik_model->hapus_data($where, 'tahun_akademik');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dimissible fade show" role="alert">Data Tahun Akademik Berhasil Dihapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span></button></div>');
		redirect('tahun_akademik/index');
	}

}