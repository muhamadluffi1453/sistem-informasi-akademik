<?php  

class Nilai_dsn extends CI_Controller{
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
			'nim'	=> set_value('nim'),
			'id_thn_akad' => set_value('id_thn_akad'),
		];
		$judul['title'] = 'Masuk Halaman KHS';
		$this->load->view('templates_admin/templates_dosen/auth_header', $judul);
		$this->load->view('templates_admin/templates_dosen/sidebar');
		$this->load->view('nilai_dsn/masuk_khs', $data);
		$this->load->view('templates_admin/templates_dosen/auth_footer');
	}

	public function nilai_aksi()
	{
		$this-> _rulesKhs();

		if($this->form_validation->run() == FALSE){
			$this->index();
		}else{
			$nim = $this->input->post('nim', TRUE);
			$thn_akad = $this->input->post('id_thn_akad', TRUE);

			$query = "SELECT krs.id_thn_akad
							 ,krs.kode_matakuliah
							 ,matakuliah.nama_matakuliah
							 ,matakuliah.sks
							 ,krs.nilai
						FROM 
							krs
						INNER JOIN matakuliah
						ON (krs.kode_matakuliah = matakuliah.kode_matakuliah)
						WHERE krs.nim= $nim AND krs.id_thn_akad= $thn_akad";

			$sql = $this->db->query($query)->result();

			$smt = $this->db->select('tahun_akademik, semester')
							->from('tahun_akademik')
							->where(['id_thn_akad' =>$thn_akad])->get()->row();

			$query_str = "SELECT mahasiswa.nim
								 ,mahasiswa.nama 
								 ,prodi.nama_prodi
							FROM
								mahasiswa
								INNER JOIN prodi
								ON (mahasiswa.nama_prodi = prodi.nama_prodi);";
			$mhs = $this->db->query($query_str)->row();

			if($smt->semester == 1){
				$tampilsemester ="Ganjil";
			}else{
				$tampilsemester = "Genap";
			}
		}

		$data = [
				'mhs_data' => $sql,
				'mhs_nim' => $nim,
				'mhs_nama' => $this->Mahasiswa_model->get_by_id($nim)->nama,
				'mhs_prodi' => $this->Mahasiswa_model->get_by_id($nim)->nama_prodi,
				'thn_akad' => $smt->tahun_akademik."(".$tampilsemester.")"
		];
		$judul['title'] = 'Halaman Nilai KHS';
		$this->load->view('templates_admin/templates_dosen/auth_header', $judul);
		$this->load->view('templates_admin/templates_dosen/sidebar');
		$this->load->view('nilai_dsn/khs', $data);
		$this->load->view('templates_admin/templates_dosen/auth_footer');
	}

	public function _rulesKhs()
	{
		$this->form_validation->set_rules('nim', 'nim', 'required');
		$this->form_validation->set_rules('id_thn_akad', 'id_thn_akad', 'required');
	}

	public function input_nilai()
	{
		$data = [
			'kode_matakuliah'	=> set_value('kode_matakuliah'),
			'id_thn_akad'		=> set_value('id_thn_akad')
		];

		$judul['title'] = 'Halaman Input Nilai';
		$this->load->view('templates_admin/templates_dosen/auth_header', $judul);
		$this->load->view('templates_admin/templates_dosen/sidebar');
		$this->load->view('nilai_dsn/input_nilai_form', $data);
		$this->load->view('templates_admin/templates_dosen/auth_footer');
	}

	public function input_nilai_aksi()
	{
		$this-> _rulesInputNilai();

		if($this->form_validation->run() == FALSE){
			$this->input_nilai();
		}else{
			$kode_matakuliah = $this->input->post('kode_matakuliah', TRUE);
			$id_thn_akad	= $this->input->post('id_thn_akad', TRUE);

			$this->db->select('k.id_krs,k.nim,m.nama,k.nilai,d.nama_matakuliah');
			$this->db->from('krs as k');
			$this->db->join('mahasiswa as m', 'm.nim = k.nim');
			$this->db->join('matakuliah as d', 'k.kode_matakuliah = d.kode_matakuliah');
			$this->db->where('k.id_thn_akad', $id_thn_akad);
			$this->db->where('k.kode_matakuliah', $kode_matakuliah);
			$query = $this->db->get()->result();

			$data = [
				'list_nilai' => $query,
				'kode_matakuliah' => $kode_matakuliah,
				'id_thn_akad'	=> $id_thn_akad
			];
		$judul['title'] = 'Halaman Transkrip Nilai';
		$this->load->view('templates_admin/templates_dosen/auth_header', $judul);
		$this->load->view('templates_admin/templates_dosen/sidebar');
		$this->load->view('nilai_dsn/form_nilai', $data);
		$this->load->view('templates_admin/templates_dosen/auth_footer');
		}
	}

	public function _rulesInputNilai()
	{
		$this->form_validation->set_rules('kode_matakuliah', 'Kode Mata Kuliah', 'required');
		$this->form_validation->set_rules('id_thn_akad', 'Tahun Akademik', 'required');
	}

	public function simpan_nilai()
	{
		$query = [];
		$id_krs = $_POST['id_krs'];
		$nilai 	= $_POST['nilai'];

		for($i = 0; $i<sizeof($id_krs); $i++)
		{
			$this->db->set('nilai', $nilai[$i])->where('id_krs',$id_krs[$i])->update('krs');
		}

		$data = [
			'id_krs' => $id_krs
		];

		$this->load->view('templates_admin/templates_dosen/auth_header');
		$this->load->view('templates_admin/templates_dosen/sidebar');
		$this->load->view('nilai_dsn/daftar_nilai', $data);
		$this->load->view('templates_admin/templates_dosen/auth_footer');

	}

}