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
			$level = $this->input->post('level');
			$user = $username;
			$pass = MD5($password);
			if ($level!="mahasiswa") {
				$cek = $this->login_model->cek_login($user, $pass);
				if ($cek->num_rows() >0) {
					foreach ($cek->result() as $ck) {
					$sess_data['username'] = $ck->username;
					$sess_data['email'] = $ck->email;
					$sess_data['level'] = $ck->level;
					$sess_data['id'] = $ck->foto;
					$this->session->set_userdata($sess_data);
					}
				if($sess_data['level'] == 'akademik'){
					redirect('dashboard/index');
				}elseif($sess_data['level'] == 'tatausaha'){
					redirect('tatausaha/dashboard_tu/index');
				}elseif($sess_data['level'] == 'keuangan'){
					redirect('keuangan/dashboard_keu/index');
				}elseif($sess_data['level'] == 'dosen'){
					redirect('dosen1/dashboard_dosen');
				}else{
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dimissible fade show" role="alert">Username atau Password Salah!<button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span></button></div>');
					redirect('auth/index');
				}
				}else{
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dimissible fade show" role="alert">Username atau Password Salah!<button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span></button></div>');
					redirect('auth/index');
				}
				
				
			}elseif($level=='mahasiswa'){
				$cek = $this->login_model->cek_login_mhs($user, $pass); 
				$mhs = count($cek);
				if ($mhs >0) {
					$id = $cek[0]['id_mhs'];
					$mahasiswa = $this->login_model->join_mhs($id);
					foreach ($mahasiswa as $ck) {
					$sess_data['username'] = $ck->username;
					$sess_data['nim'] = $ck->nim;
					$sess_data['email'] = $ck->email;
					$sess_data['id_mhs'] = $ck->photo;
					$this->session->set_userdata($sess_data);
					}
				redirect('mahasiswa/dashboard_mhs/index');
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

