<?php 

class Approval_model extends CI_Model{
	public function tampil_data($table)
	{
		return $this->db->get($table);
	}

	public function get_keyword($keyword)
	{
		$this->db->select('*');
		$this->db->from('mahasiswa');
		$this->db->like('nama', $keyword);
		$this->db->or_like('nim', $keyword);
		$this->db->or_like('nama_prodi', $keyword);
		return $this->db->get()->result();

	}

	public function getApproval($limit, $start, $keyword = null)
	{
		if ($keyword) {
			$this->db->like('nama', $keyword);
			$this->db->or_like('nim', $keyword);
			$this->db->or_like('nama_prodi', $keyword);
		}
		return $this->db->get('mahasiswa', $limit, $start)->result_array();
	} 
}