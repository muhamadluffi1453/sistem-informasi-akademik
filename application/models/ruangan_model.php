<?php  

class Ruangan_model extends CI_Model{
	public function tampil_data()
	{
		return $this->db->get('ruangan');
	}

	public function input_data($data)
	{
		$this->db->insert('ruangan', $data);
	}

	public function edit_data($where,$table)
	{
		return $this->db->get_where($table,$where);
	}

	public function update_data($id,$data,$table)
	{
		$this->db->where($id,'id');
		$this->db->update($table,$data);
	}

	public function hapus_data($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function import_data($ruangan)
	{
		$jumlah = count($ruangan);
		if($jumlah > 0) {
			$this->db->replace('ruangan', $ruangan);
		}
	}

	public function get_keyword($keyword)
	{
		$this->db->select('*');
		$this->db->from('ruangan');
		$this->db->like('kode_ruangan', $keyword);
		$this->db->or_like('nama_ruangan', $keyword);
		$this->db->or_like('fakultas', $keyword);
		return $this->db->get()->result();

	}

	public function getRuangan($limit, $start, $keyword = null)
	{
		if ($keyword) {
			$this->db->like('kode_ruangan', $keyword);
			$this->db->or_like('nama_ruangan', $keyword);
			$this->db->or_like('fakultas', $keyword);
			}
		return $this->db->get('ruangan', $limit, $start)->result_array();
	} 

	public function countAllRuangan()
	{
		return $this->db->get('ruangan')->num_rows();
	}	

	

	
}