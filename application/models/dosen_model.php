<?php  
class Dosen_model extends CI_Model{
	public function tampil_data($table)
	{
		return $this->db->get($table);
	}

	public function insert_data($data,$table)
	{
		$this->db->insert($table, $data);
	}
	
	public function update_data($where,$data,$table)
	{
			$this->db->where($where);
			$this->db->update($table, $data);
	}

	public function hapus_data($id,$table)
	{
		$this->db->where($id, 'id');
		$this->db->delete($table);
	}

	public function ambil_id_dosen($id)
	{
		$this->db->select('*');
		$this->db->from('dosen');
		$this->db->join('prodi', 'prodi.id_prodi=dosen.id_prodi');
		$this->db->where('id_dosen', $id);
		$query = $this->db->get();
 		return $query->result();
	}

	public $table = 'dosen';
	public $id = 'id_dosen';

	public function get_by_id($table, $id)
	{
		$this->db->where('id_dosen', $id);
		return $this->db->get($table);
	}

	// public function get_keyword($keyword)
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('dosen');
	// 	$this->db->like('nama_prodi', $keyword);
	// 	$this->db->or_like('nidn', $keyword);
	// 	$this->db->or_like('nama_dosen', $keyword);
	// 	$this->db->or_like('jenis_kelamin', $keyword);
	// 	$this->db->or_like('jabatan_fung', $keyword);
	// 	$this->db->or_like('pend_tertinggi', $keyword);
	// 	$this->db->or_like('status_iker', $keyword);
	// 	return $this->db->get()->result();

	// }

	// public function getDosen($limit, $start, $keyword = null)
	// {
	// 	if ($keyword) {
	// 		$this->db->like('nama_prodi', $keyword);
	// 		$this->db->or_like('nidn', $keyword);
	// 		$this->db->or_like('nama_dosen', $keyword);
	// 		$this->db->or_like('jenis_kelamin', $keyword);
	// 		$this->db->or_like('jabatan_fung', $keyword);
	// 		$this->db->or_like('pend_tertinggi', $keyword);
	// 		$this->db->or_like('status_iker', $keyword);
	// 	}
	// 	return $this->db->get('dosen', $limit, $start)->result_array();
	// } 

	public function countAllDosen()
	{
		return $this->db->get('dosen')->num_rows();
	}

	public function import_data($dosen)
	{
		$jumlah = count($dosen);
		if($jumlah > 0) {
			$this->db->replace('dosen', $dosen);
		}
	}

	public function joinmk($nama_prodi)
	{
		$this->db->select('dosen.*,prodi.nama_prodi');
		$this->db->from('dosen');
		$this->db->join('prodi', 'prodi.id_prodi=dosen.id_prodi');
		$this->db->where('prodi.id_prodi',$nama_prodi);
		$query = $this->db->get();
		return $query->result();
	}
	
}