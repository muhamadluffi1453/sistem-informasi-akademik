<?php  

class Prodi_model extends CI_Model{
	public function tampil_data()
	{
		return $this->db->get('prodi');
	}

	public function input_data($data)
	{
		$this->db->insert('prodi', $data);
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

	public function get_keyword($keyword)
	{
		$this->db->select('*');
		$this->db->from('prodi');
		$this->db->like('kode_prodi', $keyword);
		$this->db->or_like('nama_prodi', $keyword);
		$this->db->or_like('fakultas', $keyword);
		return $this->db->get()->result();

	}

	public function getProdi($limit, $start, $keyword = null)
	{
		if ($keyword) {
			$this->db->like('kode_prodi', $keyword);
			$this->db->or_like('nama_prodi', $keyword);
			$this->db->or_like('fakultas', $keyword);
		}
		return $this->db->get('prodi', $limit, $start)->result_array();
	} 

	public function countAllDosen()
	{
		return $this->db->get('prodi')->num_rows();
	}

	public function import_data($prodi)
	{
		$jumlah = count($prodi);
		if($jumlah > 0) {
			$this->db->replace('prodi', $prodi);
		}
	}
}