<?php 
require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Datamahasiswa extends CI_Controller{
	public function __construct()
	{
		parent:: __construct();
		$this->load->model('Mahasiswa_model');
		$this->load->library('pdf');


		if(!isset($this->session->userdata['username'])){
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dimissible fade show" role="alert">Anda Belum Login!<button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span></button></div>');
			redirect('auth/index');
		}
	}
	public function index()
	{
		$judul['title'] = 'Halaman Mahasiswa';
		//ambil data keyword
		if($this->input->post('submit')) {
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		} else {
			$data['keyword'] = $this->session->userdata('keyword');
		}

		//config
		$this->db->like('nama', $data['keyword']);
		$this->db->or_like('nim', $data['keyword']);
		$this->db->or_like('email', $data['keyword']);
		$this->db->or_like('nama_prodi', $data['keyword']);
		$this->db->or_like('fakultas', $data['keyword']);
		$this->db->or_like('tgl_lahir', $data['keyword']);
		$this->db->or_like('tempat_lahir', $data['keyword']);
		$this->db->or_like('jenis_kelamin', $data['keyword']);
		$this->db->or_like('agama', $data['keyword']);
		$this->db->or_like('alamat', $data['keyword']);
		$this->db->or_like('telepon', $data['keyword']);
		$this->db->from('mahasiswa');
		$config['base_url'] = 'http://localhost/akademik2/datamahasiswa/index';
		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];
		$config['per_page'] = 5;
		$config['num_links'] = 2;

		//styling
		$config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</ul></nav>';

		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		$config['attributes'] = array('class' => 'page-link');



		// initialize
		$this->pagination->initialize($config);

		$data['start'] = $this->uri->segment(3);
		$data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswa($config['per_page'], $data['start'], $data['keyword']);
		$this->load->view('templates_admin/auth_header', $judul);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('datamahasiswa/index', $data);
		$this->load->view('templates_admin/auth_footer');
	}

	public function input()
	{
		

		$data['prodi'] = $this->Mahasiswa_model->tampil_data('prodi')->result();
		$judul['title'] = 'Form Input Mahasiswa';
		$this->load->view('templates_admin/auth_header', $judul);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('datamahasiswa/datamahasiswa_form', $data);
		$this->load->view('templates_admin/auth_footer');	
}

	public function input_mahasiswa_aksi()
	{
		$this-> _rules();

		if($this->form_validation->run() == FALSE)
		{
			$this->input();
		}else{
			$nama = $this->input->post('nama');
			$nim = $this->input->post('nim');
			$email = $this->input->post('email');
			$nama_prodi = $this->input->post('nama_prodi');
			$fakultas = $this->input->post('fakultas');
			$tgl_lahir = $this->input->post('tgl_lahir');
			$tempat_lahir = $this->input->post('tempat_lahir');
			$jenis_kelamin = $this->input->post('jenis_kelamin');
			$agama = $this->input->post('agama');
			$alamat = $this->input->post('alamat');
			$telepon = $this->input->post('telepon');
			$photo = $_FILES['photo'];
			if ($photo= ''){}else{
				$config['upload_path'] = './assets/uploads';
				$config['allowed_types'] = 'jpg|png|gif|tiff';

				$this->load->library('upload', $config);
				if(!$this->upload->do_upload('photo')){
					echo "Gagal Upload"; die();
				}else{
					$photo=$this->upload->data('file_name');
				}
			}

			$nim = $this->input->post('nim');
			$sql = $this->db->query("SELECT nim FROM mahasiswa WHERE nim='$nim'");
			$cek_nim = $sql->num_rows();
			if ($cek_nim > 0){
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dimissible fade show" role="alert">Nim Yang Anda Masukan Sudah Terdaftar<button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span></button></div>');
				redirect('datamahasiswa/input');
			}

			$data = [
					'nama' 			=> $nama,
					'nim' 			=> $nim,
					'email' 		=> $email,
					'nama_prodi' 	=> $nama_prodi,
					'fakultas' 		=> $fakultas,
					'tgl_lahir' 	=> $tgl_lahir,
					'tempat_lahir' 	=> $tempat_lahir,
					'jenis_kelamin' => $jenis_kelamin,
					'agama' 		=> $agama,
					'alamat' 		=> $alamat,
					'telepon' 		=> $telepon,
					'photo' 		=> $photo

			];

			$this->Mahasiswa_model->insert_data($data,'mahasiswa');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dimissible fade show" role="alert">Data Mahasiswa Berhasil Ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span></button></div>');
			redirect('datamahasiswa/index');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama', 'nama', 'required', ['required' => 'Nama wajib diisi!']);
		$this->form_validation->set_rules('nim', 'nim', 'required',['required' => 'Nim wajib diisi!']);
		$this->form_validation->set_rules('email', 'email', 'required',['required' => 'Email wajib diisi!']);
		$this->form_validation->set_rules('nama_prodi', 'nama_prodi', 'required',['required' => 'Nama Prodi wajib diisi!']);
		$this->form_validation->set_rules('fakultas', 'fakultas', 'required',['required' => 'Nama Fakultas wajib diisi!']);
		$this->form_validation->set_rules('tgl_lahir', 'tgl_lahir', 'required',['required' => 'Tanggal Lahir wajib diisi!']);
		$this->form_validation->set_rules('tempat_lahir', 'tempat_lahir', 'required',['required' => 'Tempat Lahir wajib diisi!']);
		$this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required',['required' => 'Jenis Kelamin wajib diisi!']);
		$this->form_validation->set_rules('agama', 'agama', 'required',['required' => 'Agama Wajib diisi!']);
		$this->form_validation->set_rules('alamat', 'alamat', 'required',['required' => 'Alamat wajib diisi!']);
		$this->form_validation->set_rules('telepon', 'telepon', 'required',['required' => 'Telepon wajib diisi!']);
	}

	public function update($id)
	{
		$where = ['id_mhs' => $id];


		$data['mahasiswa'] = $this->db->query("SELECT * FROM mahasiswa mhs, prodi prd WHERE mhs.nama_prodi=prd.nama_prodi and mhs.id_mhs='$id'")->result();
		$data['prodi'] = $this->Mahasiswa_model->tampil_data('prodi')->result();
		$data['detail'] = $this->Mahasiswa_model->ambil_id_mahasiswa($id);
		$judul['title'] = 'Form Update Mahasiswa';
		$this->load->view('templates_admin/auth_header', $judul);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('datamahasiswa/datamahasiswa_update', $data);
		$this->load->view('templates_admin/auth_footer');
	}

	public function update_aksi()
	{
		$id = $this->input->post('id_mhs');
		$p = $id;
		$this->_rules();

		if($this->form_validation->run() == FALSE)
		{
			$this->update($p);
		}else{
		$id = $this->input->post('id_mhs');
		$nama = $this->input->post('nama');
		$nim = $this->input->post('nim');
		$email = $this->input->post('email');
		$nama_prodi = $this->input->post('nama_prodi');
		$fakultas = $this->input->post('fakultas');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$agama = $this->input->post('agama');
		$alamat = $this->input->post('alamat');
		$telepon = $this->input->post('telepon');
		$photo = $_FILES['userfile']['name'];

			if ($photo){
				$config['upload_path'] = './assets/uploads';
				$config['allowed_types'] = 'jpg|png|gif|tiff';

				$this->load->library('upload', $config);
				if($this->upload->do_upload('userfile')){
					$userfile = $this->upload->data('file_name');
					$this->db->set('photo', $userfile);
				}else{
					echo "Gagal Upload";
				}
			}

			$data = [
					'nama' => $nama,
					'nim' => $nim,
					'email' => $email,
					'nama_prodi' => $nama_prodi,
					'fakultas' => $fakultas,
					'tgl_lahir' => $tgl_lahir,
					'tempat_lahir' => $tempat_lahir,
					'jenis_kelamin' => $jenis_kelamin,
					'agama' => $agama,
					'alamat' => $alamat,
					'telepon' => $telepon,

			];
		$where = ['id_mhs' => $id];

		$this->Mahasiswa_model->update_data($where,$data,'mahasiswa');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dimissible fade show" role="alert">Data Mahasiswa Berhasil Di Update!<button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span></button></div>');
		redirect('datamahasiswa/index');

		}
		

		
	}

	public function delete($id)
	{
		$where = ['id_mhs' => $id];
		$this->Mahasiswa_model->hapus_data($where,'mahasiswa');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dimissible fade show" role="alert">Data Mahasiswa Berhasil Dihapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span></button></div>');
		redirect('datamahasiswa/index');
	}

	public function detail($id)
	{
		$data['detail'] = $this->Mahasiswa_model->ambil_id_mahasiswa($id);
		$judul['title'] = 'Halaman Detail Mahasiswa';
		$this->load->view('templates_admin/auth_header', $judul);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('datamahasiswa/datamahasiswa_detail', $data);
		$this->load->view('templates_admin/auth_footer');
	}

	public function mahasiswa_print()
	{
		$pdf = new FPDF('l','mm','A3');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'DATA MAHASISWA',0,1,'C');
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(190,7,'UNIVERSITAS MUHAMMADIYAH CIREBON',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(40,6,'NAMA',1,0,'C');
        $pdf->Cell(25,6,'NIM',1,0,'C');
        $pdf->Cell(47,6,'EMAIL',1,0,'C');
        $pdf->Cell(38,6,'NAMA PRODI',1,0,'C');
        $pdf->Cell(26,6,'FAKULTAS',1,0,'C');
        $pdf->Cell(31,6,'TANGGAL LAHIR',1,0,'C');
        $pdf->Cell(29,6,'TEMPAT LAHIR',1,0,'C');
        $pdf->Cell(29,6,'JENIS KELAMIN',1,0,'C');
        $pdf->Cell(29,6,'AGAMA',1,0,'C');
        $pdf->Cell(100,6,'ALAMAT',1,0,'C');
        $pdf->Cell(70,6,'Telepon',1,1,'C');
        $pdf->SetFont('Arial','',10);
        $mahasiswa = $this->db->get('mahasiswa')->result();
        foreach ($mahasiswa as $mhs){
            $pdf->Cell(40,6,$mhs->nama,1,0);
            $pdf->Cell(25,6,$mhs->nim,1,0);
            $pdf->Cell(47,6,$mhs->email,1,0);
            $pdf->Cell(38,6,$mhs->nama_prodi,1,0);
            $pdf->Cell(26,6,$mhs->fakultas,1,0);
            $pdf->Cell(31,6,$mhs->tgl_lahir,1,0);
            $pdf->Cell(29,6,$mhs->tempat_lahir,1,0);
            $pdf->Cell(29,6,$mhs->jenis_kelamin,1,0);
            $pdf->Cell(29,6,$mhs->agama,1,0);
            $pdf->Cell(100,6,$mhs->alamat,1,0);
            $pdf->Cell(70,6,$mhs->telepon,1,1);
           
            
        }
        $pdf->Output();
	}

	public function print()
	{
		$data['mahasiswa'] = $this->Mahasiswa_model->tampil_data('mahasiswa')->result();
		$this->load->view('datamahasiswa/mhs_print', $data);
	}

	public function excel()
	{
		$data['mahasiswa'] = $this->dosen_model->tampil_data('mahasiswa')->result();

		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

		$object = new PHPExcel();

		$object->getProperties()->setCreator("Muhamad Luffi");
		$object->getProperties()->setLastModifiedBy("Muhamad Luffi");
		$object->getProperties()->setTitle("Data Mahasiswa");

		$object->setActiveSheetIndex(0);

		$object->getActiveSheet()->setCellValue('A1', 'NO');
		$object->getActiveSheet()->setCellValue('B1', 'NAMA');
		$object->getActiveSheet()->setCellValue('C1', 'NIM');
		$object->getActiveSheet()->setCellValue('D1', 'EMAIL');
		$object->getActiveSheet()->setCellValue('E1', 'PRODI');
		$object->getActiveSheet()->setCellValue('F1', 'FAKULTAS');
		$object->getActiveSheet()->setCellValue('G1', 'TANGGAL LAHIR');
		$object->getActiveSheet()->setCellValue('H1', 'TEMPAT LAHIR');
		$object->getActiveSheet()->setCellValue('I1', 'JENIS KELAMIN');
		$object->getActiveSheet()->setCellValue('J1', 'AGAMA');
		$object->getActiveSheet()->setCellValue('K1', 'ALAMAT');
		$object->getActiveSheet()->setCellValue('L1', 'TELEPON');



		$baris = 2;
		$no = 1;

		foreach($data['mahasiswa'] as $mhs){
			$object->getActiveSheet()->setCellValue('A'.$baris, $no++);
			$object->getActiveSheet()->setCellValue('B'.$baris, $mhs->nama);
			$object->getActiveSheet()->setCellValue('C'.$baris, $mhs->nim);
			$object->getActiveSheet()->setCellValue('D'.$baris, $mhs->email);
			$object->getActiveSheet()->setCellValue('E'.$baris, $mhs->nama_prodi);
			$object->getActiveSheet()->setCellValue('F'.$baris, $mhs->fakultas);
			$object->getActiveSheet()->setCellValue('G'.$baris, $mhs->tgl_lahir);
			$object->getActiveSheet()->setCellValue('H'.$baris, $mhs->tempat_lahir);
			$object->getActiveSheet()->setCellValue('I'.$baris, $mhs->jenis_kelamin);
			$object->getActiveSheet()->setCellValue('J'.$baris, $mhs->agama);
			$object->getActiveSheet()->setCellValue('K'.$baris, $mhs->alamat);
			$object->getActiveSheet()->setCellValue('L'.$baris, $mhs->telepon);

			$baris++;
		}

		$filename = "Data_Mahasiswa".'.xlsx';

		$object->getActiveSheet()->setTitle("Data Mahasiswa");

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
						$mahasiswa = [
							'nama' 			=> $row->getCellAtIndex(1),
							'nim' 			=> $row->getCellAtIndex(2),
							'email' 		=> $row->getCellAtIndex(3),
							'nama_prodi' 	=> $row->getCellAtIndex(4),
							'fakultas' 		=> $row->getCellAtIndex(5),
							'tgl_lahir' 	=> $row->getCellAtIndex(6),
							'tempat_lahir' 	=> $row->getCellAtIndex(7),
							'jenis_kelamin' => $row->getCellAtIndex(8),
							'agama' 		=> $row->getCellAtIndex(9),
							'alamat' 		=> $row->getCellAtIndex(10),
							'telepon' 		=> $row->getCellAtIndex(11),
						];
						$this->Mahasiswa_model->import_data($mahasiswa);
					}
					$numRow++;
				}
				$reader->close();
				unlink('uploads/'. $file['file_name']);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dimissible fade show" role="alert">Import Data Berhasil Ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span></button></div>');
			redirect('datamahasiswa/index');
				
			}
		}else{
			echo "Error :". $this->upload->display_errors();
		};
	}
}