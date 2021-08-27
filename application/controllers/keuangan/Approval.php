<?php  

class Approval extends CI_Controller{

	public function index()
	{
		$judul['title'] = 'Halaman Approval';
		//ambil data keyword
		if($this->input->post('submit')){
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		}else{
			$data['keyword'] = $this->session->userdata('keyword');
		}
		//config
		$this->db->like('nama', $data['keyword']);
		$this->db->or_like('nim', $data['keyword']);
		$this->db->or_like('nama_prodi', $data['keyword']);
		$this->db->from('mahasiswa');
		$config['base_url'] = 'http://localhost/akademik2/keuangan/approval/index';
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

		$data['start'] = $this->uri->segment(4);
		$data['mahasiswa'] = $this->Approval_model->getApproval($config['per_page'], $data['start'], $data['keyword']);
		
		$this->load->view('templates_admin/templates_keu/auth_header',$judul);
		$this->load->view('templates_admin/templates_keu/sidebar');
		$this->load->view('templates_admin/templates_keu/topbar');
		$this->load->view('approval/index', $data);
		$this->load->view('templates_admin/templates_keu/auth_footer');
	}
	public function ubah_akses(){
		$akses=0;
		//print_r($_POST);
		$id=$this->input->post('id');
		if ($_POST['akses']=='on') {
			$akses=1;
		}
		$this->db->set('is_akses',$akses);
		$this->db->where('id_mhs', $id);
		$this->db->update('mahasiswa');
		redirect('keuangan/approval/index'); 
	}
}