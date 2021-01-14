<?php  

class Profile extends CI_Controller{
	public function index()
	{
		$id = $this->input->post('id');
		$data['user_akademik'] = $this->db->get_where('user_akademik', ['username' => $this->session->userdata('username')])->row_array();
		$judul['title'] = 'Profile User';
		$this->load->view('templates_admin/auth_header', $judul);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('templates_admin/topbar');
		$this->load->view('profile/data_profile', $data);
		$this->load->view('templates_admin/auth_footer');
	}

	public function edit()
	{
		$data['title'] = 'Edit Profile';
		$data['user_akademik'] = $this->db->get_where('user_akademik', ['username' => $this->session->userdata('username')])->row_array();
		$this->form_validation->set_rules('name', 'full Name', 'required|trim');

		if($this->form_validation->run() == false){
		$this->load->view('templates_admin/auth_header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('templates_admin/topbar');
		$this->load->view('profile/edit_data', $data);
		$this->load->view('templates_admin/auth_footer');
		} else {
			$name = $this->input->post('name');
			$email = $this->input->post('email');

			//cek jika ada gambar yang akan di upload
			$upload_foto = $_FILES['foto']['name'];
			// var_dump($upload_foto);
			// die;

			if($upload_foto) {
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']     = '2048';
				$config['upload_path'] = './assets/uploads/';

				$this->load->library('upload', $config);

				if($this->upload->do_upload('foto')) {
					$old_image = $data['user_akademik']['foto'];
					if($old_image != 'fruits.png') {
						unlink(FCPATH . 'assets/uploads' . $old_image);
					}

					$new_foto = $this->upload->data('file_name');
					$this->db->set('foto', $new_foto);
				} else {
					echo $this->upload->display_errors();
				}
			}

			$this->db->set('name', $name);
			$this->db->where('email', $email);
			$this->db->update('user_akademik');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
		redirect('profile/index');
		}
		
	}
}