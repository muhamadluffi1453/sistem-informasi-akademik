<?php  

class Transkrip_nilai extends CI_Controller{
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
			'nim' => set_value('nim')
		];
		$judul['title'] = 'Masuk Halaman Transkrip Nilai';
		$this->load->view('templates_admin/auth_header', $judul);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('templates_admin/topbar');
		$this->load->view('transkrip_nilai/masuk_transkrip', $data);
		$this->load->view('templates_admin/auth_footer');
	}

	public function buat_transkrip_aksi()
	{
		$this->_rulesTranskrip();

		if($this->form_validation->run() == FALSE)
		{
			$this->index();
		}else{
			$nim=$this->input->post('nim', TRUE);
		}
		if($this->Mahasiswa_model->get_by_id($nim)==null)
		{
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dimissible fade show" role="alert">Data Mahasiswa yang Anda Input Belum Terdaftar<button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span></button></div>');
			redirect('transkrip_nilai/index');
		}

			$this->db->select('*');
			$this->db->from('krs');
			$this->db->where('nim', $nim);
			$query=$this->db->get();

			foreach($query->result() as $value)
			{
				cekNilai($value->nim,$value->kode_matakuliah,$value->nilai);
			}

			$this->db->select('t.kode_matakuliah,m.nama_matakuliah,m.sks,t.nilai');
			$this->db->from('transkrip_nilai as t');
			$this->db->where('nim', $nim);
			$this->db->join('matakuliah as m', 'm.kode_matakuliah = t.kode_matakuliah');

			$transkrip = $this->db->get()->result();

			$mhs = $this->db->select('nama, nama_prodi')
							->from('mahasiswa')
							->where(['nim'=>$nim])
							->get()->row();

			$prodi = $this->db->select('nama_prodi')
							->from('prodi')
							->where(['nama_prodi'=>$mhs->nama_prodi])
							->get()->row()->nama_prodi;

			$data = [
					'transkrip' => $transkrip,
					'nim' 		=> $nim,
					'nama' 		=> $mhs->nama,
					'prodi' 	=> $prodi
			];
		$judul['title'] = 'Halaman Transkrip Nilai';
		$this->load->view('templates_admin/auth_header', $judul);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('templates_admin/topbar');
		$this->load->view('transkrip_nilai/data_transkrip', $data);
		$this->load->view('templates_admin/auth_footer');

		

	}

	public function _rulesTranskrip()
		{
			$this->form_validation->set_rules('nim', 'NIM', 'required', ['required' => 'NIM wajib diisi!']);
		}

	public function print_transkrip($nim)
	{
			$this->db->select('t.kode_matakuliah,m.nama_matakuliah,m.sks,t.nilai');
			$this->db->from('transkrip_nilai as t');
			$this->db->where('nim', $nim);
			$this->db->join('matakuliah as m', 'm.kode_matakuliah = t.kode_matakuliah');
			$transkrip = $this->db->get()->result_array();

			$mhs = $this->db->select('nama, nama_prodi')
							->from('mahasiswa')
							->where(['nim'=>$nim])
							->get()->row();

			$prodi = $this->db->select('nama_prodi')
							->from('prodi')
							->where(['nama_prodi'=>$mhs->nama_prodi])
							->get()->row()->nama_prodi;

			$data = [
					'transkrip' => $transkrip,
					'nim' 		=> $nim,
					'nama' 		=> $mhs->nama,
					'prodi' 	=> $prodi
			];
			// print_r($query);
			
			$this->load->view('transkrip_nilai/print_transkrip',$data);
	}	

	

}