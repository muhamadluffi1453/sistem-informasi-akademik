<?php  

class editprofile_model extends CI_Model{
	public function insert($nim, $name)
	{
		$this->db->set('username', $name);
		$this->db->where('id_mhs', $nim);
		$this->db->update('user_mahasiswa');
	}
}