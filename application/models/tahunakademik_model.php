<?php 

class Tahunakademik_model extends CI_Model{
	public function tampil_data()
	{
		return $this->db->get('tahun_akademik');
	}

	public function insert_data($data,$table)
	{
		$this->db->insert($table, $data);
	}

	public function edit_data($where,$table)
	{
		return $this->db->get_where($table,$where);
	}

	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function hapus_data($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public $table = 'tahun_akademik';
	public $id = 'id_thn_akad';

	public function get_by_id($id)
	{
		$this->db->where($this->id,$id);
		return $this->db->get($this->table)->row();
	}

	public function get_keyword($keyword)
	{
		$this->db->select('*');
		$this->db->from('tahun_akademik');
		$this->db->like('semester', $keyword);
		$this->db->or_like('status', $keyword);
		return $this->db->get()->result();

	}

	public function getThAkademik($limit, $start, $keyword = null)
	{
		if ($keyword) {
			$this->db->like('tahun_akademik', $keyword);
			$this->db->or_like('semester', $keyword);
			$this->db->or_like('status', $keyword);
		}
		return $this->db->get('tahun_akademik', $limit, $start)->result_array();
	} 

	public function countAllDosen()
	{
		return $this->db->get('tahun_akademik')->num_rows();
	}

}