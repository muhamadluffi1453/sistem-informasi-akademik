<?php  

class Identitas extends CI_Controller{
	public function index()
	{
		$data['identitas'] = $this->identitas_model->tampil_data('identitas')->result();
		$this->load->view('templates_admin/auth_header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('identitas/index', $data);
		$this->load->view('templates_admin/auth_footer');
	}

	public function update($id)
	{
		$where = ['id_identitas' => $id];

		$data['identitas'] = $this->identitas_model->edit_data($where,'identitas')->result();
		$this->load->view('templates_admin/auth_header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('identitas/identitas_update', $data);
		$this->load->view('templates_admin/auth_footer');
	}

	public function update_aksi()
	{
		$id 	= $this->input->post('id_identitas');
		$judul_website 	= $this->input->post('judul_website');
		$alamat 	= $this->input->post('alamat');
		$email 	= $this->input->post('email');
		$telp 	= $this->input->post('telp');

		$data = [
			'judul_website' => $judul_website,
			'alamat' => $alamat,
			'email'    => $email,
			'telp'    => $telp,
		];

		$where = [
				'id_identitas' => $id
		];


		$this->identitas_model->update_data($where,$data,'identitas');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dimissible fade show" role="alert">Data Identitas Berhasil Di Update!<button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span></button></div>');
		redirect('identitas/index');
	}

	public function delete($id)
	{
		$where = ['id' => $id];
		$this->user_model->delete_data($where, 'user');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dimissible fade show" role="alert">Data User Berhasil Dihapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span></button></div>');
		redirect('user/index');
	}
}