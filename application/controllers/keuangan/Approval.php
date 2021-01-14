<?php  

class Approval extends CI_Controller{

	public function index()
	{
		$data['mahasiswa'] = $this->approval_model->tampil_data('mahasiswa')->result();
		$judul['title'] = 'Halaman Approval';
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