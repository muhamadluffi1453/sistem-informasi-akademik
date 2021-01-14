<?php  

class User_akademik extends CI_Controller{
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
		$judul['title'] = 'Halaman User';
		//ambil data keyword
		if($this->input->post('submit')) {
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		} else {
			$data['keyword'] = $this->session->userdata('keyword');
		}

		//config
		$this->db->like('name', $data['keyword']);
		$this->db->or_like('username', $data['keyword']);
		$this->db->or_like('email', $data['keyword']);
		$this->db->or_like('level', $data['keyword']);
		$this->db->from('user_akademik');
		$config['base_url'] = 'http://localhost/akademik2/user_akademik/index';
		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];
		$config['per_page'] = 5;
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
		$data['user_akademik'] = $this->user_model->getUser($config['per_page'], $data['start'], $data['keyword']);

		$this->load->view('templates_admin/auth_header', $judul);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('templates_admin/topbar', $data);
		$this->load->view('user_akademik/daftar_user', $data);
		$this->load->view('templates_admin/auth_footer');
	}

	public function tambah_user()
	{
		$data = [
			'name' => set_value('name'),
			'username' => set_value('username'),
			'password' => set_value('password'),
			'email'    => set_value('email'),
			'level'    => set_value('level'),
			'blokir'   => set_value('blokir'),
		];
		$judul['title'] = 'Form Tambah User';
		$this->load->view('templates_admin/auth_header', $judul);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('user_akademik/user_form', $data);
		$this->load->view('templates_admin/auth_footer');

	}

	public function tambah_user_aksi()
	{
		$this-> _rules();

		if($this->form_validation->run() == FALSE)

		{
			$this->tambah_user();
		}else{

				$name 		= $this->input->post('name');
				$username 	= $this->input->post('username');
				$password 	= md5($this->input->post('password'));
				$email 		= $this->input->post('email');
				$level 		= $this->input->post('level');
				$blokir 	= $this->input->post('blokir');
				$id_sessions= md5($this->input->post('id_sessions'));
				$foto = $_FILES['foto'];
				if ($foto= ''){}else{
				$config['upload_path'] = './assets/uploads';
				$config['allowed_types'] = 'jpg|png|gif|tiff';

				$this->load->library('upload', $config);
				if(!$this->upload->do_upload('foto')){
					echo "<h1><center>GAGAL MENAMBAHKAN DATA !!</center></h1>"; die();
				}else{
					$foto=$this->upload->data('file_name');
				}
			}

			$data = [
				'name' => $name,
				'username' => $username,
				'password' => $password,
				'email' => $email,
				'level' => $level,
				'blokir' => $blokir,
				'id_sessions' => $id_sessions,
				'foto' => $foto	

			];

		$this->user_model->insert_data($data,'user_akademik');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dimissible fade show" role="alert">Data User Berhasil Ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span></button></div>');
			redirect('user_akademik/index');
		}

	}

	public function _rules()
	{
		$this->form_validation->set_rules('name','Name','required', ['required' => 'Name Wajib Diisi']);
		$this->form_validation->set_rules('username','Username','required', ['required' => 'Username Wajib Diisi']);
		$this->form_validation->set_rules('password','Password','required', ['required' => 'Password Wajib Diisi']);
		$this->form_validation->set_rules('email','Email','required', ['required' => 'Email Wajib Diisi']);
		$this->form_validation->set_rules('level','Level','required', ['required' => 'Level Wajib Diisi']);
		$this->form_validation->set_rules('blokir','Blokir','required', ['required' => 'Blokir Wajib Diisi']);
	}

	public function update($id)
	{
		$where = ['id' => $id];
		
		$data['detail'] = $this->user_model->ambil_id_user($id);
		$data['user_akademik'] = $this->user_model->edit_data($where,'user_akademik')->result();
		$judul['title'] = 'Form Update User';
		$this->load->view('templates_admin/auth_header', $judul);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('user_akademik/user_update', $data);
		$this->load->view('templates_admin/auth_footer');
	}

	public function update_aksi()
	{
		$id = $this->input->post('id');
		$p=$id;
		$this-> _rules();

		if($this->form_validation->run() == FALSE)
		{
			$this->update($p);
		}else{
		$id 	= $this->input->post('id');
		$name 	= $this->input->post('name');
		$username 	= $this->input->post('username');
		$email 	= $this->input->post('email');
		$level 	= $this->input->post('level');
		$blokir 	= $this->input->post('blokir');
		$foto = $_FILES['userfile']['name'];

		if ($foto){
			$config['upload_path'] = './assets/uploads';
			$config['allowed_types'] = 'jpg|png|gif|tiff';

			$this->load->library('upload', $config);
			if($this->upload->do_upload('userfile')){
				$userfile = $this->upload->data('file_name');
				$this->db->set('foto', $userfile);
			}else{
				echo "Gagal Upload";
			}
		}

		$data = [
			'name' => $name,
			'username' => $username,
			'email'    => $email,
			'level' => $level,
			'blokir'   => $blokir,
			'foto' =>$foto
			
		];

		$where = ['id' => $id];
		$this->user_model->update_data($where,$data,'user_akademik');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dimissible fade show" role="alert">Data user Berhasil Di Update!<button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span></button></div>');
		redirect('user_akademik/index');
	}	

		
	}

	public function delete($id)
	{
		$where = ['id' => $id];
		$this->user_model->delete_data($where, 'user_akademik');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dimissible fade show" role="alert">Data User Berhasil Dihapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span></button></div>');
		redirect('user_akademik/index');
	}

	public function detail($id)
	{
		$data['detail'] = $this->user_model->ambil_id_user($id);
		$judul['title'] = 'Detail User';
		$this->load->view('templates_admin/auth_header', $judul);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('user_akademik/user_detail', $data);
		$this->load->view('templates_admin/auth_footer');
	}
}