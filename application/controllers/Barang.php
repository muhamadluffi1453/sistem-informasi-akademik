<?php  

class Barang extends CI_Controller{
	public function index()
	{
		$judul['title'] = 'Halaman Dashboard';
		$data['barang'] = $this->barang_model->tampil_data('barang')->result();
		$this->load->view('templates_admin/auth_header',$judul);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('templates_admin/topbar');
		$this->load->view('barang/index',$data);
		$this->load->view('templates_admin/auth_footer');

	}

	public function input()
	{
		$data = ['id_barang' => set_value('id_barang'),
				'kode_barang' => set_value('id_barang'),
				'nama_barang' => set_value('id_barang'),
				'satuan' => set_value('id_barang'),
				'harga' => set_value('id_barang'),
				'merk' => set_value('id_barang'),
				'berat' => set_value('id_barang'),
			];
		$judul['title'] = 'Form Input Data Barang';
		$this->load->view('templates_admin/auth_header', $judul);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('barang/databarang_form', $data);
		$this->load->view('templates_admin/auth_footer');	
	}

	public function input_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FAlSE){
			$this->input();
		}else{
			$data = [
				'kode_barang' => $this->input->post('kode_barang', TRUE),
				'nama_barang' => $this->input->post('nama_barang', TRUE),
				'satuan' => $this->input->post('satuan', TRUE),
				'harga' => $this->input->post('harga', TRUE),
				'merk' => $this->input->post('merk', TRUE),
				'berat' => $this->input->post('berat', TRUE),
			];

			$this->barang_model->input_data($data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dimissible fade show" role="alert">Data Barang Berhasil Ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span></button></div>');
			redirect('barang/index');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('kode_barang', 'kode_barang', 'required', ['required' => 'Kode Prodi Wajib Diisi!']);
		$this->form_validation->set_rules('nama_barang', 'nama_barang', 'required', ['required' => 'Nama Prodi Wajib Diisi!']);
		$this->form_validation->set_rules('satuan', 'satuan', 'required', ['required' => 'Fakultas Wajib Diisi!']);
		$this->form_validation->set_rules('harga', 'harga', 'required', ['required' => 'Fakultas Wajib Diisi!']);
		$this->form_validation->set_rules('merk', 'merk', 'required', ['required' => 'Fakultas Wajib Diisi!']);
		$this->form_validation->set_rules('berat', 'berat', 'required', ['required' => 'Fakultas Wajib Diisi!']);
	}

	public function update($id)
	{
		$where = ['id_barang' => $id];
		$data['barang'] = $this->barang_model->edit_data($where, 'barang')->result();
		$judul['title'] = 'Form Update Prodi';
		$this->load->view('templates_admin/auth_header', $judul);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('barang/databarang_update', $data);
		$this->load->view('templates_admin/auth_footer');
	}

	public function update_aksi()
	{
		$id = $this->input->post('id_barang');
		$kode_barang = $this->input->post('kode_barang');
		$nama_barang = $this->input->post('nama_barang');
		$satuan = $this->input->post('satuan');
		$harga = $this->input->post('harga');
		$merk = $this->input->post('merk');
		$berat = $this->input->post('berat');

		$data = [
			'kode_barang' => $kode_barang,
			'nama_barang' => $nama_barang,
			'satuan' => $satuan,
			'harga' => $harga,
			'merk' => $merk,
			'berat' => $berat,
		];
		$where = ['id_barang' => $id];
		$this->barang_model->update_data($where,$data,'barang');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dimissible fade show" role="alert">Data Barang Berhasil Di Update!<button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span></button></div>');
		redirect('barang/index');
	}

	public function delete($id)
	{
		$where = ['id_barang' => $id];
		$this->barang_model->hapus_data($where, 'barang');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dimissible fade show" role="alert">Data Barang Berhasil Dihapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span></button></div>');
		redirect('barang/index');
	}

}