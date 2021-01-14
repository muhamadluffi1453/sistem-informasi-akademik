	<?php  

	class Auth_mhs extends CI_Controller{
		public function index()
	{
		$judul['title'] = 'Halaman Login';
		$this->load->view('templates_admin/auth_header', $judul);
		$this->load->view('auth_mhs/login');
		$this->load->view('templates_admin/auth_footer');
	}

	public function proses_login()
	{
		$this->form_validation->set_rules('username','username','required', ['required' => 'Username wajib diisi!']);
		$this->form_validation->set_rules('password','password','required', ['required' => 'Password wajib diisi!']);
		if ($this->form_validation->run() == FALSE ){
		$data['judul'] = 'Halaman Login';
		$this->load->view('templates_admin/auth_header', $data);
		$this->load->view('auth_mhs/login', $data);
		$this->load->view('templates_admin/auth_footer');
		}else{
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$user = $username;
			$pass = MD5($password);
			$cek = $this->login_mhs_model->cek_login($user, $pass);

			if ($cek->num_rows() >0) {
				foreach ($cek->result() as $ck) {
					$id_user = $ck->id;
					$id = $this->login_mhs_model->get_gambar($id_user);
					$sess_mhs['id'] = $id[0]['foto'];
					$sess_mhs['username'] = $ck->username;
					$sess_mhs['email'] = $ck->email;
					$sess_mhs['level'] = $ck->level;
					
					$this->session->set_userdata($sess_mhs);
				}
				if($sess_mhs['level'] == 'mahasiswa'){
					redirect('dashboard_mhs/index');
				}else{
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dimissible fade show" role="alert">Username atau Password Salah!<button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span></button></div>');
					redirect('auth_mhs/index');
				}
				
			}else{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dimissible fade show" role="alert">Username atau Password Salah!<button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span></button></div>');
					redirect('auth_mhs/index');
			}

		}
	}

}