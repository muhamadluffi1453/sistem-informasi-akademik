<?php 

class Batasnilai extends CI_Controller{
	public function index()
	{
		$judul['title'] = 'Halaman Batas Nilai';
		$this->load->view('templates_admin/auth_header',$judul);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('templates_admin/topbar');
		$this->load->view('batasnilai/index');
		$this->load->view('templates_admin/auth_footer');
	}
}


 ?>