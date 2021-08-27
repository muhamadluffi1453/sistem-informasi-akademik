<?php  

require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Prodi extends CI_Controller{
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
		$judul['title'] = 'Halaman Prodi';
		//ambil data keyword
		if($this->input->post('submit')) {
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		} else {
			$data['keyword'] = $this->session->userdata('keyword');
		}

		//config
		$this->db->like('kode_prodi', $data['keyword']);
		$this->db->or_like('nama_prodi', $data['keyword']);
		$this->db->or_like('fakultas', $data['keyword']);
		$this->db->from('prodi');
		$config['base_url'] = 'http://localhost/akademik2/prodi/index';
		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];
		$config['per_page'] = 10;
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
		$data['prodi'] = $this->prodi_model->getProdi($config['per_page'], $data['start'], $data['keyword']);
		$this->load->view('templates_admin/auth_header', $judul);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('templates_admin/topbar');
		$this->load->view('prodi/dataprodi', $data);
		$this->load->view('templates_admin/auth_footer');
	}

	public function input()
	{
		$data = ['id_prodi' => set_value('id_prodi'),
				'kode_prodi' => set_value('id_prodi'),
				'nama_prodi' => set_value('id_prodi'),
				'fakultas' => set_value('id_prodi'),
			];
		$judul['title'] = 'Form Input Data Prodi';
		$this->load->view('templates_admin/auth_header', $judul);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('templates_admin/topbar');
		$this->load->view('prodi/dataprodi_form', $data);
		$this->load->view('templates_admin/auth_footer');	
	}

	public function input_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FAlSE){
			$this->input();
		}else{
			$data = [
				'kode_prodi' => $this->input->post('kode_prodi', TRUE),
				'nama_prodi' => $this->input->post('nama_prodi', TRUE),
				'fakultas' => $this->input->post('fakultas', TRUE),
			];

			$this->prodi_model->input_data($data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dimissible fade show" role="alert">Data Prodi Berhasil Ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span></button></div>');
			redirect('prodi/index');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('kode_prodi', 'kode_prodi', 'required', ['required' => 'Kode Prodi Wajib Diisi!']);
		$this->form_validation->set_rules('nama_prodi', 'nama_prodi', 'required', ['required' => 'Nama Prodi Wajib Diisi!']);
		$this->form_validation->set_rules('fakultas', 'fakultas', 'required', ['required' => 'Fakultas Wajib Diisi!']);
	}

	public function update($id)
	{
		$where = ['id_prodi' => $id];
		$data['prodi'] = $this->prodi_model->edit_data($where, 'prodi')->result();
		$judul['title'] = 'Form Update Prodi';
		$this->load->view('templates_admin/auth_header', $judul);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('templates_admin/topbar');
		$this->load->view('prodi/dataprodi_update', $data);
		$this->load->view('templates_admin/auth_footer');
	}

	public function update_aksi()
	{
		$id = $this->input->post('id_prodi');
		$p=$id;
		$this-> _rules();

		if($this->form_validation->run()== FALSE)
		{
			$this->update($p);
		}else{
		$id = $this->input->post('id_prodi');
		$kode_prodi = $this->input->post('kode_prodi');
		$nama_prodi = $this->input->post('nama_prodi');
		$fakultas = $this->input->post('fakultas');

		$data = [
			'kode_prodi' => $kode_prodi,
			'nama_prodi' => $nama_prodi,
			'fakultas' => $fakultas,
		];
		$where = ['id_prodi' => $id];
		$this->prodi_model->update_data($where,$data,'prodi');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dimissible fade show" role="alert">Data Prodi Berhasil Di Update!<button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span></button></div>');
		redirect('prodi/index');
		}
		
	}

	public function delete($id)
	{
		$where = ['id_prodi' => $id];
		$this->prodi_model->hapus_data($where, 'prodi');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dimissible fade show" role="alert">Data Prodi Berhasil Dihapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span></button></div>');
		redirect('prodi/index');
	}

	public function prodi_pdf()
	{

		

		$pdf = new FPDF('p','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'DATA PRODI',0,1,'C');
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(190,7,'UNIVERSITAS MUHAMMADIYAH CIREBON',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(25,6,'KODE PRODI',1,0,'C');
        $pdf->Cell(45,6,'NAMA PRODI',1,0,'C');
        $pdf->Cell(45,6,'FAKULTAS',1,1,'C');
        $pdf->SetFont('Arial','',10);
        $prodi = $this->db->get('prodi')->result();
        foreach ($prodi as $prd){
            $pdf->Cell(25,6,$prd->kode_prodi,1,0);
            $pdf->Cell(45,6,$prd->nama_prodi,1,0);
            $pdf->Cell(45,6,$prd->fakultas,1,1);
        }
        $pdf->Output();
	}

	public function excel()
	{
		$data['prodi'] = $this->prodi_model->tampil_data('prodi')->result();

		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

		$object = new PHPExcel();

		$object->getProperties()->setCreator("Muhamad Luffi");
		$object->getProperties()->setLastModifiedBy("Muhamad Luffi");
		$object->getProperties()->setTitle("Data Prodi");

		$object->setActiveSheetIndex(0);

		$object->getActiveSheet()->setCellValue('A1', 'NO');
		$object->getActiveSheet()->setCellValue('B1', 'KODE PRODI');
		$object->getActiveSheet()->setCellValue('C1', 'NAMA PRODI');
		$object->getActiveSheet()->setCellValue('D1', 'FAKULTAS');

		$baris = 2;
		$no = 1;

		foreach($data['prodi'] as $prd){
			$object->getActiveSheet()->setCellValue('A'.$baris, $no++);
			$object->getActiveSheet()->setCellValue('B'.$baris, $prd->kode_prodi);
			$object->getActiveSheet()->setCellValue('C'.$baris, $prd->nama_prodi);
			$object->getActiveSheet()->setCellValue('D'.$baris, $prd->fakultas);
			
			$baris++;
		}

		$filename = "Data_Prodi".'.xlsx';

		$object->getActiveSheet()->setTitle("Data Prodi");

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');

		$writer=PHPExcel_IOFactory::createwriter($object, 'Excel2007');
		$writer->save('php://output');

		exit;
	}

	public function print()
	{
		$data['prodi'] = $this->prodi_model->tampil_data('prodi')->result();
		$this->load->view('prodi/dataprodi_print', $data);
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
						$prodi = [
							'kode_prodi' 			=> $row->getCellAtIndex(1),
							'nama_prodi' 			=> $row->getCellAtIndex(2),
							'fakultas' 		=> $row->getCellAtIndex(3),
						];
						$this->prodi_model->import_data($prodi);
					}
					$numRow++;
				}
				$reader->close();
				unlink('uploads/'. $file['file_name']);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dimissible fade show" role="alert">Import Data Berhasil Ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span></button></div>');
				redirect('prodi/index');
				
			}
		}else{
			echo "Error :". $this->upload->display_errors();
		};
	}
}