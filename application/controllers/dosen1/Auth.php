	<?php  

	class Auth extends CI_Controller{
		public function index()
	{
		$judul['title'] = 'Halaman Login';
		$this->load->view('templates_admin/auth_header', $judul);
		$this->load->view('auth/login');
		$this->load->view('templates_admin/auth_footer');
	}

	public function proses_login()
	{
		$this->form_validation->set_rules('username','username','required', ['required' => 'Username wajib diisi!']);
		$this->form_validation->set_rules('password','password','required', ['required' => 'Password wajib diisi!']);
		if ($this->form_validation->run() == FALSE ){
		$data['judul'] = 'Halaman Login';
		$this->load->view('templates_admin/auth_header', $data);
		$this->load->view('auth/login', $data);
		$this->load->view('templates_admin/auth_footer');
		}else{
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$user = $username;
			$pass = MD5($password);

			$cek = $this->login_model->cek_login($user, $pass);

			if ($cek->num_rows() >0) {
				foreach ($cek->result() as $ck) {
					$sess_data['username'] = $ck->username;
					$sess_data['email'] = $ck->email;
					$sess_data['level'] = $ck->level;
					
					$this->session->set_userdata($sess_data);
				}
				if($sess_data['level'] == 'dosen'){
					redirect('dashboard_dosen/index');
				}else{
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dimissible fade show" role="alert">Username atau Password Salah!<button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span></button></div>');
					redirect('auth/index');
				}
				
			}else{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dimissible fade show" role="alert">Username atau Password Salah!<button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span></button></div>');
					redirect('auth/index');
			}

		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}
}