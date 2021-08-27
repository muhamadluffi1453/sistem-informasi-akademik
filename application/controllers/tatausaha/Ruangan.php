<?php  

require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Ruangan extends CI_Controller{
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
		$judul['title'] = 'Halaman Ruangan';
		//ambil data keyword
		if($this->input->post('submit')) {
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		} else {
			$data['keyword'] = $this->session->userdata('keyword');
		}

		//config
		$this->db->like('kode_ruangan', $data['keyword']);
		$this->db->or_like('nama_ruangan', $data['keyword']);
		$this->db->or_like('fakultas', $data['keyword']);
		$this->db->from('ruangan');
		$config['base_url'] = 'http://localhost/akademik2/tatausaha/ruangan/index';
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

		$data['start'] = $this->uri->segment(4);
		$data['ruangan'] = $this->ruangan_model->getRuangan($config['per_page'], $data['start'], $data['keyword']);

		$this->load->view('templates_admin/templates_tu/auth_header', $judul);
		$this->load->view('templates_admin/templates_tu/sidebar');
		$this->load->view('templates_admin/templates_tu/topbar');
		$this->load->view('ruangan/index', $data);
		$this->load->view('templates_admin/templates_tu/auth_footer');
	}

	public function tambah_ruangan()
	{
		$data = [
				'id_ruangan' => set_value('id_ruangan'),
				'kode_ruangan' => set_value('id_ruangan'),
				'nama_ruangan' => set_value('id_ruangan'),
				'fakultas' => set_value('id_ruangan'),
		];
		$judul['title'] = 'Form Input Data Ruangan';
		$this->load->view('templates_admin/templates_tu/auth_header', $judul);
		$this->load->view('templates_admin/templates_tu/sidebar');
		$this->load->view('templates_admin/templates_tu/topbar');
		$this->load->view('ruangan/ruangan_form', $data);
		$this->load->view('templates_admin/templates_tu/auth_footer');
	}

	public function tambah_ruangan_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE){
			$this->tambah_ruangan();
		}else{
			$data = [
				'kode_ruangan' => $this->input->post('kode_ruangan', TRUE),
				'nama_ruangan' => $this->input->post('nama_ruangan', TRUE),
				'fakultas' => $this->input->post('fakultas', TRUE),
			];

			$this->ruangan_model->input_data($data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dimissible fade show" role="alert">Data Ruangan Berhasil Ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span></button></div>');
			redirect('tatausaha/ruangan/index');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('kode_ruangan', 'Kode_ruangan', 'required', ['required' => 'Kode Ruangan Wajib Diisi!']);
		$this->form_validation->set_rules('nama_ruangan', 'Nama_ruangan', 'required', ['required' => 'Nama Ruangan Wajib Diisi!']);
		$this->form_validation->set_rules('fakultas', 'Fakultas', 'required', ['required' => 'Fakultas Wajib Diisi!']);
	}

	public function update($id)
	{

		$where = ['id_ruangan' => $id];
		$data['ruangan'] = $this->ruangan_model->edit_data($where, 'ruangan')->result();
		$judul['title'] = 'Form Update Data Ruangan';
		$this->load->view('templates_admin/templates_tu/auth_header', $judul);
		$this->load->view('templates_admin/templates_tu/sidebar');
		$this->load->view('templates_admin/templates_tu/topbar');
		$this->load->view('ruangan/dataruangan_update', $data);
		$this->load->view('templates_admin/templates_tu/auth_footer');
	}

	public function update_aksi()
	{
		$id = $this->input->post('id_ruangan');
		$p=$id;

		$this-> _rules();

		if($this->form_validation->run() == FALSE)
		{
			$this->update($p);
		}else{
			$id = $this->input->post('id_ruangan');
		$kode_ruangan = $this->input->post('kode_ruangan');
		$nama_ruangan = $this->input->post('nama_ruangan');
		$fakultas = $this->input->post('fakultas');

		$data = [
				'kode_ruangan' => $kode_ruangan,
				'nama_ruangan' => $nama_ruangan,
				'fakultas' => $fakultas,
			];
			$where = ['id_ruangan' => $id];
		$this->ruangan_model->update_data($where,$data,'ruangan');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dimissible fade show" role="alert">Data Ruangan Berhasil Di Update!<button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span></button></div>');
		redirect('tatausaha/ruangan/index');
		}
		
			
		
	}

	public function delete($id)
	{
		$where = ['id_ruangan' => $id];
		$this->ruangan_model->hapus_data($where, 'ruangan');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dimissible fade show" role="alert">Data Ruangan Berhasil Dihapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span></button></div>');
		redirect('tatausaha/ruangan/index');
	}

	public function print()
	{
		$data['ruangan'] = $this->ruangan_model->tampil_data('ruangan')->result();
		$this->load->view('ruangan/ruangan_print', $data);
	}

	public function ruangan_pdf()
	{

		$pdf = new FPDF('p','mm','A3');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',20);
        // mencetak string 
        $pdf->Cell(190,7,'DATA RUANGAN',0,1,'C');
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(190,7,'UNIVERSITAS MUHAMMADIYAH CIREBON',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(43,6,'KODE RUANGAN',1,0,'C');
        $pdf->Cell(49,6,'NAMA RUANGAN',1,0,'C');
        $pdf->Cell(70,6,'FAKULTAS',1,1,'C');
        $pdf->SetFont('Arial','',10);
        $ruangan = $this->db->get('ruangan')->result();
        foreach ($ruangan as $rng){
            $pdf->Cell(43,6,$rng->kode_ruangan,1,0);
            $pdf->Cell(49,6,$rng->nama_ruangan,1,0);
            $pdf->Cell(70,6,$rng->fakultas,1,1);
          }
        $pdf->Output();
	}

	public function excel()
	{
		$data['ruangan'] = $this->dosen_model->tampil_data('ruangan')->result();

		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

		$object = new PHPExcel();

		$object->getProperties()->setCreator("Muhamad Luffi");
		$object->getProperties()->setLastModifiedBy("Muhamad Luffi");
		$object->getProperties()->setTitle("Data Dosen");

		$object->setActiveSheetIndex(0);

		$object->getActiveSheet()->setCellValue('A1', 'NO');
		$object->getActiveSheet()->setCellValue('B1', 'KODE RUANGAN');
		$object->getActiveSheet()->setCellValue('C1', 'NAMA RUANGAN');
		$object->getActiveSheet()->setCellValue('D1', 'FAKULTAS');

		$baris = 2;
		$no = 1;

		foreach($data['ruangan'] as $rng){
			$object->getActiveSheet()->setCellValue('A'.$baris, $no++);
			$object->getActiveSheet()->setCellValue('B'.$baris, $rng->kode_ruangan);
			$object->getActiveSheet()->setCellValue('C'.$baris, $rng->nama_ruangan);
			$object->getActiveSheet()->setCellValue('D'.$baris, $rng->fakultas);
			
			$baris++;
		}

		$filename = "Data_Ruangan".'.xlsx';

		$object->getActiveSheet()->setTitle("Data Ruangan");

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
						$ruangan = [
							'kode_ruangan' 	=> $row->getCellAtIndex(1),
							'nama_ruangan' 	=> $row->getCellAtIndex(2),
							'fakultas' 		=> $row->getCellAtIndex(3),
						];
						$this->ruangan_model->import_data($ruangan);
					}
					$numRow++;
				}
				$reader->close();
				unlink('uploads/'. $file['file_name']);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dimissible fade show" role="alert">Import Data Berhasil Ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span></button></div>');
				redirect('tatausaha/ruangan/index');
				
			}
		}else{
			echo "Error :". $this->upload->display_errors();
		};
	}
}