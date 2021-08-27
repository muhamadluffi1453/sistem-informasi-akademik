<?php  

class Krs extends CI_Controller{
	public function __construct()
	{
		parent:: __construct();
		$this->load->library('pdf');

		if(!isset($this->session->userdata['username'])){
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dimissible fade show" role="alert">Anda Belum Login!<button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span></button></div>');
			redirect('auth/index');
		}
	}
	public function index()
	{
		$data = [
			'nim' => set_value('nim'),
			'id_thn_akad' => set_value('id_thn_akad'),
		];
		$judul['title'] = 'Masuk Halaman KRS';
		$this->load->view('templates_admin/templates_tu/auth_header', $judul);
		$this->load->view('templates_admin/templates_tu/sidebar');
		$this->load->view('templates_admin/templates_tu/topbar');
		$this->load->view('krs/masuk_krs', $data);
		$this->load->view('templates_admin/templates_tu/auth_footer');
	}

	public function krs_aksi()
	{
		$this->_rulesKrs();

		if ($this->form_validation->run() == FALSE) {
			$this->index();
		}else{
			$nim = $this->input->post('nim', TRUE);
			$thn_akad = $this->input->post('id_thn_akad', TRUE);
		}

		if($this->Mahasiswa_model->get_by_id($nim)==null)
		{
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dimissible fade show" role="alert">Data Mahasiswa yang Anda Input Belum Terdaftar<button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span></button></div>');
			redirect('tatausaha/krs/index');
		}

		$data = [
			'nim' => $nim,
			'id_thn_akad' => $thn_akad,
			'nama' => $this->Mahasiswa_model->get_by_id($nim)->nama
		];

		$dataKrs = [
			'krs_data' 	=> $this->baca_krs($nim,$thn_akad),
			'nim'	   => $nim,
			'id_thn_akad' => $thn_akad,
			'tahun_akademik' => $this->tahunakademik_model->get_by_id($thn_akad)->tahun_akademik,
			'semester' => $this->tahunakademik_model->get_by_id($thn_akad)->semester,
			'nama' => $this->Mahasiswa_model->get_by_id($nim)->nama,
			'prodi' => $this->Mahasiswa_model->get_by_id($nim)->nama_prodi,
		];
		$judul['title'] = 'Halaman KRS';
		$this->load->view('templates_admin/templates_tu/auth_header', $judul);
		$this->load->view('templates_admin/templates_tu/sidebar');
		$this->load->view('templates_admin/templates_tu/topbar');
		$this->load->view('krs/krs_list', $dataKrs);
		$this->load->view('templates_admin/templates_tu/auth_footer');
	}

	public function baca_krs($nim,$thn_akad)
	{
		$this->db->select('k.id_krs,k.kode_matakuliah,m.nama_matakuliah,m.sks');
		$this->db->from('krs as k');
		$this->db->where('k.nim', $nim);
		$this->db->where('k.id_thn_akad', $thn_akad);
		$this->db->join('matakuliah as m', 'm.kode_matakuliah = k.kode_matakuliah');
		$krs = $this->db->get()->result();
		return $krs;
	}

	public function _rulesKrs()
	{
		$this->form_validation->set_rules('nim','nim','required');
		$this->form_validation->set_rules('id_thn_akad','id_thn_akad','required');
	}

	public function tambah_krs($nim, $thn_akad)
	{
		$prodi = $this->krs_model->getProdi($nim);
		$data = [
			'id_krs'		=> set_value('id_krs'),
			'id_thn_akad' 	=> $thn_akad,
			'thn_akad_smt' 	=> $this->tahunakademik_model->get_by_id($thn_akad)->tahun_akademik,
			'semester' 		=> $this->tahunakademik_model->get_by_id($thn_akad)->semester%2>0?'Ganjil':'Genap',
			'nim'	   		=> $nim,
			'kode_matakuliah' => set_value('kode_matakuliah'),
			'prodi'			=>$prodi[0]['nama_prodi']

		];
		// $nama_prodi=$this->input->post('id_prodi');
		// $data['matakuliah'] = $this->krs_model->joinmk($nama_prodi);
		// $data['join_krs'] = $this->krs_model->join_krs();
		$judul['title'] = 'Halaman Tambah Data KRS';
		$this->load->view('templates_admin/templates_tu/auth_header', $judul);
		$this->load->view('templates_admin/templates_tu/sidebar');
		$this->load->view('templates_admin/templates_tu/topbar');
		$this->load->view('krs/krs_form', $data);
		$this->load->view('templates_admin/templates_tu/auth_footer');
	}

	public function tambah_krs_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE) {
			$this->tambah_krs($this->input->post('nim', TRUE),
			$this->input->post('id_thn_akad', TRUE) );
		}else{
			$nim  		  = $this->input->post('nim', TRUE);
			$id_thn_akad  = $this->input->post('id_thn_akad', TRUE);
			$kode_matakuliah  = $this->input->post('kode_matakuliah', TRUE);

			$data = [
				'id_thn_akad'		=> $id_thn_akad,
				'nim'				=> $nim,
				'kode_matakuliah'	=> $kode_matakuliah,
			];

			$this->krs_model->insert($data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dimissible fade show" role="alert">Data KRS Berhasil Ditambahkan!<button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span></button></div>');
			redirect('tatausaha/krs/index');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('id_thn_akad','id_thn_akad','required');
		$this->form_validation->set_rules('nim','nim','required');
		$this->form_validation->set_rules('kode_matakuliah','kode_matakuliah','required');
	}

	public function update($id)
	{
		$row = $this->krs_model->get_by_id($id);
		$th = $row->id_thn_akad;

		if($row) {
			$data = [
				'id_krs'	=> set_value('id_krs', $row->id_krs),
				'id_thn_akad' => set_value('id_thn_akad', $row->id_thn_akad),
				'nim'		=> set_value('nim', $row->nim),
				'kode_matakuliah' => set_value('kode_matakuliah', $row->kode_matakuliah),
				'thn_akad_smt'	=> $this->tahunakademik_model->get_by_id($th)->tahun_akademik,
				'semester'	=> $this->tahunakademik_model->get_by_id($th)->semester==1?'Ganjil':'Genap',
			];

			$this->load->view('templates_admin/templates_tu/auth_header');
			$this->load->view('templates_admin/templates_tu/sidebar');
			$this->load->view('templates_admin/templates_tu/topbar');
			$this->load->view('krs/krs_update', $data);
			$this->load->view('templates_admin/templates_tu/auth_footer');
		}else{
			echo "Data Tidak Ada";
		}
	}

	public function update_aksi()
	{
		$id_krs		= $this->input->post('id_krs', TRUE);
		$nim		= $this->input->post('nim', TRUE);
		$id_thn_akad		= $this->input->post('id_thn_akad', TRUE);
		$kode_matakuliah		= $this->input->post('kode_matakuliah', TRUE);

		$data = [
			'id_krs'		=> $id_krs,
			'id_thn_akad'		=> $id_thn_akad,
			'nim'		=> $nim,
			'kode_matakuliah'		=> $this->input->post('kode_matakuliah', TRUE)
		];

		$this->krs_model->update($id_krs, $data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dimissible fade show" role="alert">Data KRS Berhasil DiUpdate!<button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span></button></div>');
			redirect('tatausaha/krs/index');
	}

	public function delete($id)
	{
		$where = ['id_krs' => $id];
		$this->krs_model->hapus_data($where, 'krs');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dimissible fade show" role="alert">Data KRS Berhasil Dihapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span></button></div>');
		redirect('tatausaha/krs/index');
	}

	public function krs_print()
	{


		$pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'SEKOLAH MENENGAH KEJURUSAN NEEGRI 2 LANGSA',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,'DAFTAR SISWA KELAS IX JURUSAN REKAYASA PERANGKAT LUNAK',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(20,6,'NIM',1,0);
        $pdf->Cell(85,6,'NAMA MAHASISWA',1,0);
        $pdf->Cell(27,6,'NO HP',1,0);
        $pdf->Cell(25,6,'TANGGAL LHR',1,1);
        $pdf->SetFont('Arial','',10);

        $this->db->select('k.id_krs,k.kode_matakuliah,m.nama_matakuliah,m.sks');
		$this->db->from('krs as k');
		$this->db->where('k.nim');
		$this->db->where('k.id_thn_akad');
		$this->db->join('matakuliah as m', 'm.kode_matakuliah = k.kode_matakuliah');
		$krs = $this->db->get('')->result();
		return $krs;

		$krs = $this->db->get('krs')->result();
         foreach ($krs as $kr){
            $pdf->Cell(20,6,$kr->kode_matakuliah,1,0);
            $pdf->Cell(85,6,$kr->nama_matakuliah,1,0);
            
        }
        $pdf->Output();
	}

}