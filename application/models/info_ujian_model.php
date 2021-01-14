<?php  

class Info_ujian_model extends CI_Model{
	public function tampil_data($table)
	{
		return $this->db->get($table);
	}

	public function join_ujian($nama_prodi, $nama_ujian)
 	{
 		$this->db->select('jadwal_ujian.jam,jadwal_ujian.hari,matakuliah.*,prodi.nama_prodi,dosen.nama_dosen,ruangan.nama_ruangan,jadwal_ujian.id_jdlujian');
 		$this->db->from('matakuliah');
 		$this->db->join('prodi', 'prodi.id_prodi=matakuliah.id_prodi');
 		$this->db->join('jadwal_ujian', 'jadwal_ujian.kode_matakuliah=matakuliah.kode_matakuliah', 'right');
 		$this->db->join('dosen', ' dosen.id_dosen=jadwal_ujian.id_dosen', 'left');
 		$this->db->join('ruangan', ' ruangan.id_ruangan=jadwal_ujian.id_ruangan', 'left');
 		$this->db->where('prodi.id_prodi',$nama_prodi);
 		$query = $this->db->get();
 		return $query->result();
 	}

 	public function nama_prodi($id)
	{
		$this->db->select('nama_prodi');
		$this->db->from('prodi');
		$this->db->where('id_prodi',$id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function nama_ujian($id)
	{
		$this->db->select('nama_ujian');
		$this->db->from('p_ujian');
		$this->db->where('id_ujian',$id);
		$query = $this->db->get();
		return $query->result_array();
	}
}