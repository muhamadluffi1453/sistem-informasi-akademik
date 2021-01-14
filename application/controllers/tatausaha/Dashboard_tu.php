<?php  

class Dashboard_tu extends CI_Controller{
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
		$judul['title'] = 'Halaman Dashboard';
		$data = $this->user_model->ambil_data($this->session->userdata['username']);
		$data = ['username' => $data->username,
				'level' => $data->level];
		$this->load->view('templates_admin/templates_tu/auth_header',$judul);
		$this->load->view('templates_admin/templates_tu/sidebar');
		$this->load->view('templates_admin/templates_tu/topbar');
		$this->load->view('dashboard_tu/index',$data);
		$this->load->view('templates_admin/templates_tu/auth_footer');
	}
}