<?php  

class Matakuliah_model extends CI_Model{
	public function tampil_data($table)
	{
		return $this->db->get($table);
	}

	public function insert_data($data,$table)
	{
		$this->db->insert($table,$data);
	}

	public function ambil_kode_matakuliah($id)
	{
		$this->db->select('*');
		$this->db->from('matakuliah');
		$this->db->join('prodi', 'prodi.id_prodi=matakuliah.id_prodi');
		$this->db->where('kode_matakuliah', $id);
		$query = $this->db->get();
 		return $query->result();
	}

	public function update_data($id,$data,$table)
	{
		$this->db->where($id,'id');
		$this->db->update($table,$data);
	}

	public function hapus_data($id,$table)
	{
		$this->db->where($id, 'id');
		$this->db->delete($table);
	}

	public $table = 'matakuliah';
	public $id = 'kode_matakuliah';

	public function ambil_id($table, $id)
	{
		$this->db->where('kode_matakuliah', $id);
		return $this->db->get($table);
	}

	public function get_by_id($id)
	{
		$this->db->where($this->id,$id);
		return $this->db->get($this->table)->row();
	}


	public function countAllDosen()
	{
		return $this->db->get('matakuliah')->num_rows();
	}

	public function joinmk($nama_prodi)
	{
		$this->db->select('matakuliah.*,prodi.nama_prodi');
		$this->db->from('matakuliah');
		$this->db->join('prodi', 'prodi.id_prodi=matakuliah.id_prodi');
		$this->db->where('prodi.id_prodi',$nama_prodi);
		$query = $this->db->get();
		return $query->result();
	}

}