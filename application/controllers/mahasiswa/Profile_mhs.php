<?php  

class Profile_mhs extends CI_Controller{
	public function index()
	{
		$id = $this->input->post('id');
		// print_r($_SESSION);
		$data['mahasiswa'] = $this->db->get_where('mahasiswa', ['nim' => $this->session->userdata('nim')])->row_array();
		$judul['title'] = 'Profile User';
		$this->load->view('templates_admin/templates_mhs/auth_header', $judul);
		$this->load->view('templates_admin/templates_mhs/sidebar');
		$this->load->view('templates_admin/templates_mhs/topbar');
		$this->load->view('profile_mhs/data_profile', $data);
		$this->load->view('templates_admin/templates_mhs/auth_footer');
	}

	public function edit()
	{
		// print_r($_SESSION);
		$data['title'] = 'Edit Profile';
		$data['mahasiswa'] = $this->db->get_where('mahasiswa', ['nim' => $this->session->userdata('nim')])->row_array();
		$this->form_validation->set_rules('nama', 'full Name', 'required|trim');

		if($this->form_validation->run() == false){
		$this->load->view('templates_admin/templates_mhs/auth_header', $data);
		$this->load->view('templates_admin/templates_mhs/sidebar');
		$this->load->view('templates_admin/templates_mhs/topbar');
		$this->load->view('profile_mhs/edit_data', $data);
		$this->load->view('templates_admin/templates_mhs/auth_footer');
		} else {
			$name = $this->input->post('nama');
			$email = $this->input->post('email');
			$nim = $_SESSION['nim'];
			$name = $this->input->post('nama');
			$id_mhs = $this->input->post('id_mhs');
			//cek jika ada gambar yang akan di upload
			$upload_foto = $_FILES['photo']['name'];

			if($upload_foto) {
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']     = '2048';
				$config['upload_path'] = './assets/uploads/';

				$this->load->library('upload', $config);

				if($this->upload->do_upload('photo')) {
					$new_foto = $this->upload->data('file_name');
					// echo "nama ".$new_foto;die;
					$this->db->set('photo', $new_foto);
					$this->db->where('id_mhs',$id_mhs);
					$this->db->update('mahasiswa');
				} else {
					echo $this->upload->display_errors();
				}
			}
			
			$tot = $this->editprofile_model->insert($id_mhs, $name);
			$this->db->set('nama', $name);
			$this->db->where('nim', $nim);
			$this->db->update('mahasiswa');


			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
		redirect('mahasiswa/profile_mhs/index');
		}
		
	}
}