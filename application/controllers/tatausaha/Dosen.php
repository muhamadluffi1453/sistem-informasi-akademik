<?php 
class Dosen extends CI_Controller{
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
		$judul['title'] = 'Halaman Data Dosen';	
		$data = [
			'nama_prodi' => set_value('nama_prodi')
		];
		$data['prodi'] = $this->matakuliah_model->tampil_data('prodi')->result();

		$this->load->view('templates_admin/templates_tu/auth_header', $judul);
		$this->load->view('templates_admin/templates_tu/sidebar');
		$this->load->view('dosen/masuk_dosen', $data);
		$this->load->view('templates_admin/templates_tu/auth_footer');
	}

	public function masuk_dosen()
	{
		if (isset($_POST['id_prodi'])) {
				$nama_prodi=$this->input->post('id_prodi');
				
		}elseif (isset($_GET)) {
				$nama_prodi=$this->input->get('id_prodi');
			
		}
		$judul['title'] = 'Halaman Data Dosen';
		$data['dosen'] = $this->dosen_model->joinmk($nama_prodi);
		$data['nama_prodi'] = $nama_prodi;
		$this->load->view('templates_admin/templates_tu/auth_header', $judul);
		$this->load->view('templates_admin/templates_tu/sidebar');
		$this->load->view('dosen/data_dosen', $data);
		$this->load->view('templates_admin/templates_tu/auth_footer');
	}

	public function tambah_dosen($nama_prodi)
	{
		
		$data['nama_prodi'] = $nama_prodi;
		$data['dosen'] = $this->dosen_model->joinmk($nama_prodi);
		$data['prodi'] = $this->dosen_model->tampil_data('prodi')->result();
		$judul['title'] = 'Form Input Dosen';
		$this->load->view('templates_admin/templates_tu/auth_header', $judul);
		$this->load->view('templates_admin/templates_tu/sidebar');
		$this->load->view('dosen/dosen_form', $data);
		$this->load->view('templates_admin/templates_tu/auth_footer');	
}

	public function tambah_dosen_aksi($nama_prodi)
	{
		$P = $nama_prodi;
		$this-> _rules();

		if($this->form_validation->run() == FALSE)
		{
			$this->tambah_dosen($P);
		}else{
			$nama_prodi 	= $this->input->post('id_prodi');
			$nidn 			= $this->input->post('nidn');
			$nama_dosen 	= $this->input->post('nama_dosen');
			$jenis_kelamin 	= $this->input->post('jenis_kelamin');
			$jabatan_fung 	= $this->input->post('jabatan_fung');
			$pend_tertinggi = $this->input->post('pend_tertinggi');
			$status_iker 	= $this->input->post('status_iker');

			$data = [
					'id_prodi'			=> $nama_prodi,
					'nidn' 				=> $nidn,
					'nama_dosen' 		=> $nama_dosen,
					'jenis_kelamin' 	=> $jenis_kelamin,
					'jabatan_fung' 		=> $jabatan_fung,
					'pend_tertinggi' 	=> $pend_tertinggi,
					'status_iker' 		=> $status_iker

			];

			$this->dosen_model->insert_data($data,'dosen');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dimissible fade show" role="alert">Data dosen Berhasil Ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span></button></div>');
			redirect('tatausaha/dosen/masuk_dosen/?id_prodi='.$P);
		}
	}

	public function _rules()
	{
		// $this->form_validation->set_rules('nama_prodi', 'Nama_prodi', 'required', ['required' => 'Nama Prodi wajib diisi!']);

		$this->form_validation->set_rules('nidn', 'NIDN', 'required', ['required' => 'NIDN wajib diisi!']);
		$this->form_validation->set_rules('nama_dosen', 'Nama_dosen', 'required',['required' => 'Nama Dosen wajib diisi!']);
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis_kelamin', 'required',['required' => 'jenis kelamin wajib diisi!']);
		$this->form_validation->set_rules('jabatan_fung', 'Jabatan_fung', 'required',['required' => 'Jabatan Fungsional wajib diisi!']);
		$this->form_validation->set_rules('pend_tertinggi', 'Pend_tertinggi', 'required',['required' => 'Pendidikan Tertinggi wajib diisi!']);
		$this->form_validation->set_rules('status_iker', 'Status_iker', 'required',['required' => 'Status Ikatan Kerja wajib diisi!']);
	}

	public function update($nama_prodi,$id)
	{
		$where = ['id_dosen' => $id];

		// $nama_prodi = $this->input->post('id_prodi');
		$data['dosen'] = $this->dosen_model->get_by_id('dosen', $id)->result();
		$data['dosenku'] = $this->dosen_model->joinmk($nama_prodi);
		$data['prodi'] = $this->dosen_model->tampil_data('prodi')->result();
		$judul['title'] = 'Form Update Dosen';
		$data['nama_prodi'] = $nama_prodi;
		$this->load->view('templates_admin/templates_tu/auth_header', $judul);
		$this->load->view('templates_admin/templates_tu/sidebar');
		$this->load->view('dosen/dosen_update', $data);
		$this->load->view('templates_admin/templates_tu/auth_footer');
	}

	public function update_dosen_aksi()
	{
		$id = $this->input->post('id_dosen');
		$nama_prodi = $this->input->post('id_prodi');
		$p=$id;
		$n=$nama_prodi;

		$this-> _rules();

		if($this->form_validation->run()== FALSE)
		{
			$this->update($n,$p);
		}else{
			$id 			= $this->input->post('id_dosen');
			$nama_prodi 	= $this->input->post('id_prodi');
			$nidn 			= $this->input->post('nidn');
			$nama_dosen 	= $this->input->post('nama_dosen');
			$jenis_kelamin 	= $this->input->post('jenis_kelamin');
			$jabatan_fung 	= $this->input->post('jabatan_fung');
			$pend_tertinggi = $this->input->post('pend_tertinggi');
			$status_iker 	= $this->input->post('status_iker');
		
		$data = [
					'id_prodi'		=> $nama_prodi,
					'nidn' 				=> $nidn,
					'nama_dosen' 		=> $nama_dosen,
					'jenis_kelamin' 	=> $jenis_kelamin,
					'jabatan_fung' 		=> $jabatan_fung,
					'pend_tertinggi' 	=> $pend_tertinggi,
					'status_iker' 		=> $status_iker,
			];
		$where = [
			'id_dosen' => $id
		];

		$this->dosen_model->update_data($where,$data,'dosen');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dimissible fade show" role="alert">Data Dosen Berhasil Di Update!<button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span></button></div>');
		redirect('tatausaha/dosen/masuk_dosen/?id_prodi='.$nama_prodi);
		}
			
	}

	public function delete($id_prodi,$id)
	{
		$where = ['id_dosen' => $id];
		
		// $id_prodi = $this->input->post('id_prodi');
		$this->dosen_model->hapus_data($where,'dosen');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dimissible fade show" role="alert">Data Dosen Berhasil Dihapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span></button></div>');
		redirect('tatausaha/dosen/masuk_dosen/?id_prodi='.$id_prodi);
	}

	public function detail($nama_prodi,$id)
	{
		$data['detail'] = $this->dosen_model->ambil_id_dosen($id);
		$judul['title'] = 'Detail Dosen';
		$this->load->view('templates_admin/templates_tu/auth_header', $judul);
		$this->load->view('templates_admin/templates_tu/sidebar');
		$this->load->view('dosen/dosen_detail', $data);
		$this->load->view('templates_admin/templates_tu/auth_footer');
	}

	public function dosen_pdf()
	{

		

		$pdf = new FPDF('l','mm','A3');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',20);
        // mencetak string 
        $pdf->Cell(190,7,'DATA DOSEN',0,1,'C');
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(190,7,'UNIVERSITAS MUHAMMADIYAH CIREBON',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(43,6,'PRODI',1,0,'C');
        $pdf->Cell(45,6,'NIDN',1,0,'C');
        $pdf->Cell(70,6,'NAMA',1,0,'C');
        $pdf->Cell(29,6,'JENIS KELAMIN',1,0,'C');
        $pdf->Cell(45,6,'JABATAN FUNGSIONAL',1,0,'C');
        $pdf->Cell(45,6,'PENDIDIKAN TERTINGGI',1,0,'C');
        $pdf->Cell(45,6,'STATUS IKATAN KERJA',1,1,'C');
        $pdf->SetFont('Arial','',10);
        $dosen = $this->db->get('dosen')->result();
        foreach ($dosen as $dsn){
            $pdf->Cell(43,6,$dsn->nama_prodi,1,0);
            $pdf->Cell(45,6,$dsn->nidn,1,0);
            $pdf->Cell(70,6,$dsn->nama_dosen,1,0);
            $pdf->Cell(29,6,$dsn->jenis_kelamin,1,0);
            $pdf->Cell(45,6,$dsn->jabatan_fung,1,0);
            $pdf->Cell(45,6,$dsn->pend_tertinggi,1,0);
            $pdf->Cell(45,6,$dsn->status_iker,1,1); 
        }
        $pdf->Output();
	}

	public function print()
	{
		// $nama_prodi = $this->input->post('id_prodi');
		$this->db->select('dosen.*,prodi.nama_prodi');
		$this->db->from('dosen');
		$this->db->join('prodi', 'prodi.id_prodi=dosen.id_prodi');
		$this->db->where('prodi.id_prodi=dosen.id_prodi');
		$query = $this->db->get()->result_array();
		
		
		$data['dosen'] = $query;
		$this->load->view('dosen/dosen_print', $data);
	}

	public function excel()
	{
		$data['dosen'] = $this->dosen_model->tampil_data('dosen')->result();

		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

		$object = new PHPExcel();

		$object->getProperties()->setCreator("Muhamad Luffi");
		$object->getProperties()->setLastModifiedBy("Muhamad Luffi");
		$object->getProperties()->setTitle("Data Dosen");

		$object->setActiveSheetIndex(0);

		$object->getActiveSheet()->setCellValue('A1', 'NO');
		$object->getActiveSheet()->setCellValue('B1', 'PRODI');
		$object->getActiveSheet()->setCellValue('C1', 'NIDN');
		$object->getActiveSheet()->setCellValue('D1', 'NAMA DOSEN');
		$object->getActiveSheet()->setCellValue('E1', 'JENIS KELAMIN');
		$object->getActiveSheet()->setCellValue('F1', 'JABATAN FUNGSIONAL');
		$object->getActiveSheet()->setCellValue('G1', 'PENDIDIKAN TERTNGGI');
		$object->getActiveSheet()->setCellValue('H1', 'STATUS IKATAN KERJA');

		$baris = 2;
		$no = 1;

		foreach($data['dosen'] as $dsn){
			$object->getActiveSheet()->setCellValue('A'.$baris, $no++);
			$object->getActiveSheet()->setCellValue('B'.$baris, $dsn->nama_prodi);
			$object->getActiveSheet()->setCellValue('C'.$baris, $dsn->nidn);
			$object->getActiveSheet()->setCellValue('D'.$baris, $dsn->nama_dosen);
			$object->getActiveSheet()->setCellValue('E'.$baris, $dsn->jenis_kelamin);
			$object->getActiveSheet()->setCellValue('F'.$baris, $dsn->jabatan_fung);
			$object->getActiveSheet()->setCellValue('G'.$baris, $dsn->pend_tertinggi);
			$object->getActiveSheet()->setCellValue('H'.$baris, $dsn->status_iker);

			$baris++;
		}

		$filename = "Data_Dosen".'.xlsx';

		$object->getActiveSheet()->setTitle("Data Dosen");

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');

		$writer=PHPExcel_IOFactory::createwriter($object, 'Excel2007');
		$writer->save('php://output');

		exit;
	}

	public function uploaddata()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'xlsx|xls';
		$config['file_name'] = 'doc'. time();
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('importexcel')){
			$file = $this->upload->data();
			$reader = ReaderEntityFactory::createXLSXReader();

			$reader->open('uploads/' . $file['file_name']);
			foreach($reader->getSheetIterator() as $sheet) {
				$numRow = 1;
				foreach($sheet->getRowIterator() as $row) {
					if($numRow > 1) {
						$dosen = [
							'nama_prodi' 			=> $row->getCellAtIndex(1),
							'nidn' 			=> $row->getCellAtIndex(2),
							'nama_dosen' 		=> $row->getCellAtIndex(3),
							'jenis_kelamin' 	=> $row->getCellAtIndex(4),
							'jabatan_fung' 		=> $row->getCellAtIndex(5),
							'pend_tertinggi' 	=> $row->getCellAtIndex(6),
							'status_iker' 	=> $row->getCellAtIndex(7),
						];
						$this->dosen_model->import_data($dosen);
					}
					$numRow++;
				}
				$reader->close();
				unlink('uploads/'. $file['file_name']);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dimissible fade show" role="alert">Import Data Berhasil Ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span></button></div>');
				redirect('tatausaha/dosen/index');
				
			}
		}else{
			echo "Error :". $this->upload->display_errors();
		};
	}
}