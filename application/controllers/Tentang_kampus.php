<?php  

class Tentang_kampus extends CI_Controller{
	public function index()
	{
		$data['tentang'] = $this->tentang_model->tampil_data('tentang_kampus')->result();
		$this->load->view('templates_admin/auth_header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('tentang_kampus/index', $data);
		$this->load->view('templates_admin/auth_footer');
	}

	public function update($id)
	{
		$where = ['id' => $id];

		$data['tentang'] = $this->tentang_model->edit_data($where,'tentang_kampus')->result();
		$this->load->view('templates_admin/auth_header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('tentang_kampus/tentang_update', $data);
		$this->load->view('templates_admin/auth_footer');
	}

	public function update_aksi()
	{
		$id 		= $this->input->post('id');
		$sejarah 	= $this->input->post('sejarah');
		$visi 		= $this->input->post('visi');
		$misi 		= $this->input->post('misi');

		$data = [
			'sejarah' => $sejarah,
			'visi' => $visi,
			'misi'    => $misi,
		];

		$where = [
				'id' => $id
		];


		$this->tentang_model->update_data($where,$data,'tentang_kampus');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dimissible fade show" role="alert">Data Tentang Kampus Berhasil Di Update!<button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span></button></div>');
		redirect('tentang_kampus/index');
	}

	public function delete($id)
	{
		$where = ['id' => $id];
		$this->user_model->delete_data($where, 'user');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dimissible fade show" role="alert">Data User Berhasil Dihapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span></button></div>');
		redirect('user/index');
	}
}