<?php

class Jadwal_ujian extends CI_Controller{
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
		$data = [
			'nama_prodi' => set_value('nama_prodi'),
			'nama_ujian' => set_value('nama_ujian')
		];
		$data['p_ujian'] = $this->jadwalujian_model->tampil_data('p_ujian')->result();
		$data['prodi'] = $this->jadwalujian_model->tampil_data('prodi')->result();
		$judul['title'] = 'Masuk Halaman Jadwal Ujian';
		$this->load->view('templates_admin/templates_tu/auth_header', $judul);
		$this->load->view('templates_admin/templates_tu/sidebar');
		$this->load->view('templates_admin/templates_tu/topbar');
		$this->load->view('jadwal_ujian/masuk_j', $data);
		$this->load->view('templates_admin/templates_tu/auth_footer');
	}

	public function masuk_jadwalujian()
	{		
		if (isset($_POST['id_prodi'])) {
				$nama_prodi=$this->input->post('id_prodi');
				$nama_ujian=$this->input->post('id_ujian');
		}elseif (isset($_GET)) {
			$nama_prodi=$this->input->get('id_prodi');
			$nama_ujian=$this->input->get('id_ujian');
		}
		
		
		
		$data['join_ujian'] = $this->jadwalujian_model->jointable_ujian($nama_prodi,$nama_ujian);
		$data['nama_prodi'] = $nama_prodi;
		$data['nama_ujian'] = $nama_ujian;
		$judul['title'] = 'Masuk Halaman Jadwal Ujian';
		$this->load->view('templates_admin/templates_tu/auth_header', $judul);
		$this->load->view('templates_admin/templates_tu/sidebar');
		$this->load->view('templates_admin/templates_tu/topbar');
		$this->load->view('jadwal_ujian/data_jadwalujian',$data);
		$this->load->view('templates_admin/templates_tu/auth_footer');
	}

	public function tambah_jadwal_ujian($nama_prodi,$nama_ujian)
	{
		$judul['title'] = 'Halaman Tambah Jadwal';
		$data['matakuliah'] = $this->jadwalujian_model->joinmk($nama_prodi);
		// $data['matakuliah'] = $this->jadwalmengajar_model->tampil_data('matakuliah')->result();
		$data['dosen'] = $this->jadwalujian_model->tampil_data('dosen')->result();
		$data['ruangan'] = $this->jadwalujian_model->tampil_data('ruangan')->result();
		$data['nama_prodi'] = $nama_prodi;
		$data['nama_ujian'] = $nama_ujian;
		$this->load->view('templates_admin/templates_tu/auth_header', $judul);
		$this->load->view('templates_admin/templates_tu/sidebar');
		$this->load->view('templates_admin/templates_tu/topbar');
		$this->load->view('jadwal_ujian/jadwal_formujian', $data);
		$this->load->view('templates_admin/templates_tu/auth_footer');
	}

	public function tambah_jadwalujian_aksi($nama_prodi,$nama_ujian)
	{

		$ID=$nama_prodi;
		$UJ=$nama_ujian;
		$prodi=$this->input->post('id_ruangan');
		$hari=$this->input->post('hari');
		$jam=$this->input->post('jam');
		//echo "ruangan ".$prodi." hari ".$hari."jam ".$jam;
		$cekRuangan = $this->jadwalujian_model->cekRuangan($prodi,$hari,$jam);
		$this-> __rules();

		if($this->form_validation->run() == FALSE)
		{
			$this->tambah_jadwal_ujian($nama_prodi,$nama_ujian);
		}elseif ($cekRuangan) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dimissible fade show" role="alert"> Ruangan Sudah Ada Jadwal <button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span></button></div>');
			redirect('tatausaha/jadwal_ujian/tambah_jadwal_ujian/' .$ID.'/' .$UJ);
		} else{
			$kode_matakuliah = $this->input->post('kode_matakuliah');
			$id_dosen = $this->input->post('id_dosen');
			$id_ruangan = $this->input->post('id_ruangan');
			$hari = $this->input->post('hari');
			$jam = $this->input->post('jam');
			$nama_prodi = $this->input->post('id_prodi');
			$nama_ujian = $this->input->post('id_ujian');

			$data = [
					'kode_matakuliah'	=> $kode_matakuliah,
					'id_dosen' 			=> $id_dosen,
					'id_ruangan' 		=> $id_ruangan,
					'hari' 				=> $hari,
					'jam' 				=> $jam
			];

			$this->jadwalujian_model->insert($data, 'jadwal_ujian');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dimissible fade show" role="alert">Data Jadwal Ujian Berhasil Ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span></button></div>');
			redirect('tatausaha/jadwal_ujian/masuk_jadwalujian/?id_prodi='.$ID.'&id_ujian='.$UJ);
		}
	}

	public function __rules()
	{
		$this->form_validation->set_rules('kode_matakuliah', 'kode_matakuliah', 'required');
		$this->form_validation->set_rules('id_dosen', 'id_dosen', 'required');
		$this->form_validation->set_rules('id_ruangan', 'id_ruangan', 'required');
		$this->form_validation->set_rules('hari', 'hari', 'required');
		$this->form_validation->set_rules('jam', 'jam', 'required');
	}

	public function update($nama_prodi,$id,$nama_ujian)
	{
		// var_dump($_POST);die;
		$where = ['id_jdlujian' => $id];
		$data['jadwal_ujian'] = $this->jadwalujian_model->get_by_id('jadwal_ujian', $id)->result();
		// $data['matakuliah'] = $this->jadwalujian_model->tampil_data('matakuliah')->result();
		$data['matakuliah'] = $this->jadwalujian_model->joinmk($nama_prodi);
		$data['dosen'] = $this->jadwalujian_model->tampil_data('dosen')->result();
		$data['ruangan'] = $this->jadwalujian_model->tampil_data('ruangan')->result();
		$data['nama_prodi'] = $nama_prodi;
		$data['nama_ujian'] = $nama_ujian;
		$judul['title'] = 'Form Update Jadwal Ujian';

		$this->load->view('templates_admin/templates_tu/auth_header', $judul);
		$this->load->view('templates_admin/templates_tu/sidebar');
		$this->load->view('templates_admin/templates_tu/topbar');
		$this->load->view('jadwal_ujian/jadwal_update', $data);
		$this->load->view('templates_admin/templates_tu/auth_footer');
	}

	public function update_aksi()
	{
		
		$id = $this->input->post('id_jdlujian');
		$kode_matakuliah = $this->input->post('kode_matakuliah');
		$id_dosen = $this->input->post('id_dosen');
		$id_ruangan = $this->input->post('id_ruangan');
		$hari = $this->input->post('hari');
		$jam = $this->input->post('jam');
		$nama_prodi = $this->input->post('id_prodi');
		$nama_ujian = $this->input->post('id_ujian');
// var_dump($_POST);die;
		$data=[
			'kode_matakuliah' => $kode_matakuliah,
			'id_dosen' => $id_dosen,
			'id_ruangan' => $id_ruangan,
			'hari' => $hari,
			'jam' => $jam
		];

		$where = ['id_jdlujian' => $id];
		$this->jadwalujian_model->update($where,$data,'jadwal_ujian');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dimissible fade show" role="alert">Data Jadwal Berhasil Di Update!<button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span></button></div>');
		redirect('tatausaha/jadwal_ujian/masuk_jadwalujian/?id_prodi='.$nama_prodi.'&id_ujian='.$nama_ujian);
	}

	public function delete($nama_prodi,$id,$nama_ujian)
	{
		
		
		$where = ['id_jdlujian' => $id];
		$this->jadwalujian_model->hapus_data($where,'jadwal_ujian');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dimissible fade show" role="alert">Data Jadwal Berhasil Dihapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span></button></div>');
		redirect('tatausaha/jadwal_ujian/masuk_jadwalujian/?id_prodi='.$nama_prodi.'&id_ujian='.$nama_ujian);
	}

	public function print_ujian()
	{
		if (isset($_POST['id_prodi'])) {
				$nama_prodi=$this->input->post('id_prodi');
				$nama_ujian=$this->input->post('id_ujian');
		}elseif (isset($_GET)) {
			$nama_prodi=$this->input->get('id_prodi');
			$nama_ujian=$this->input->get('id_ujian');
		}
		
		$data['join_ujian'] = $this->jadwalujian_model->jointable_ujian($nama_prodi,$nama_ujian);
		$data['nama_prodi'] = $nama_prodi;
		$data['nama_ujian'] = $nama_ujian;
		$judul['title'] = 'Masuk Halaman Jadwal Ujian';
		$this->load->view('templates_admin/templates_tu/auth_header', $judul);
		$this->load->view('jadwal_ujian/print_ujian',$data);
		
	}
	
}