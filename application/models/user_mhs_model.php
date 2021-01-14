<?php 

class User_mhs_model extends CI_Model{

	public $table = 'user_mhs';
	public $id = 'id';

	public function ambil_data($id)
	{
		$this->db->where('username', $id);
		return $this->db->get('user_mahasiswa')->row();
	}

	public function tampil_data($table)
	{
		return $this->db->get($table);
	}

	public function insert_data($data,$table)
	{
		$this->db->insert($table,$data);
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

	public function delete_data($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
	public function ambil_id_user($id)
	{
		$hasil = $this->db->where('id',$id)->get('user_akademik');
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}else{
			return false;
		}
	}

	public function getUser($limit, $start, $keyword = null)
	{
		if ($keyword) {
			$this->db->like('name', $keyword);
			$this->db->or_like('username', $keyword);
			$this->db->or_like('email', $keyword);
			$this->db->or_like('level', $keyword);
			}
		return $this->db->get('user_akademik', $limit, $start)->result_array();
	} 

	public function countAllUser()
	{
		return $this->db->get('user_akademik')->num_rows();
	}	

}