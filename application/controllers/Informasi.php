<?php 

class Informasi extends CI_Controller{
	
	public function index()
	{
		
		$data['informasi'] = $this->informasi_model->tampil_data('informasi')->result();
		$this->load->view('templates_admin/auth_header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('informasi/index', $data);
		$this->load->view('templates_admin/auth_footer');
	}

	public function tambah_informasi()
	{

		$this->load->view('templates_admin/auth_header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('informasi/informasi_form');
		$this->load->view('templates_admin/auth_footer');	
}

	public function tambah_informasi_aksi()
	{
		$this-> _rules();

		if($this->form_validation->run() == FAlSE)
		{
			$this->tambah_informasi();
		}else{
			$id_informasi = $this->input->post('id_informasi');
			$icon = $this->input->post('icon');
			$judul_informasi = $this->input->post('judul_informasi');
			$isi_informasi = $this->input->post('isi_informasi');
			
			$data = [
					'icon' 					=> $icon,
					'judul_informasi' 		=> $judul_informasi,
					'isi_informasi'			=> $isi_informasi,
					
			];

			$this->informasi_model->insert_data($data,'informasi');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dimissible fade show" role="alert">Data Informasi Berhasil Ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span></button></div>');
			redirect('informasi/index');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('icon', 'Icon', 'required', ['required' => 'ICON wajib diisi!']);
		$this->form_validation->set_rules('judul_informasi', 'Judul Informasi', 'required',['required' => 'Judul Informasi wajib diisi!']);
		$this->form_validation->set_rules('isi_informasi', 'Isi Informasi', 'required',['required' => 'Isi Informasi wajib diisi!']);
	}

	public function update($id)
	{
		$where = ['id_informasi' => $id];
		$data['informasi'] = $this->informasi_model->edit_data($where,'informasi')->result();
		$this->load->view('templates_admin/auth_header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('informasi/informasi_update', $data);
		$this->load->view('templates_admin/auth_footer');
	}

	public function update_informasi_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE)
		{
			$this->update();
		}else{
			$id 			 = $this->input->post('id_informasi');
			$icon 			 = $this->input->post('icon');
			$judul_informasi = $this->input->post('judul_informasi');
			$isi_informasi 	 = $this->input->post('isi_informasi');
			}
		$data = [
					'icon' 					=> $icon,
					'judul_informasi' 		=> $judul_informasi,
					'isi_informasi'			=> $isi_informasi,
					
			];
		$where = [
			'id_informasi' => $id
		];

		$this->informasi_model->update_data($where,$data,'informasi');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dimissible fade show" role="alert">Data Informasi Berhasil Di Update!<button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span></button></div>');
		redirect('informasi/index');
	}

	public function delete($id)
	{
		$where = ['id_informasi' => $id];
		$this->informasi_model->hapus_data($where,'informasi');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dimissible fade show" role="alert">Data Informasi Berhasil Dihapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span></button></div>');
		redirect('informasi/index');
	}

	public function detail($id)
	{
		$data['detail'] = $this->dosen_model->ambil_id_dosen($id);
		$this->load->view('templates_admin/auth_header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('dosen/dosen_detail', $data);
		$this->load->view('templates_admin/auth_footer');
	}
}