<?php 

class Jadwalkuliah_model extends CI_Model{
	public function tampil_data($table)
	{
		return $this->db->get($table);
	}

	public function jointable_kuliah($nama_prodi)
 	{
 		$this->db->select('jadwal_mengajar.jam,jadwal_mengajar.hari,matakuliah.*,prodi.nama_prodi,dosen.nama_dosen,ruangan.nama_ruangan,jadwal_mengajar.id_jdlmengajar');
 		$this->db->from('matakuliah');
 		$this->db->join('prodi', 'prodi.id_prodi=matakuliah.id_prodi');
 		$this->db->join('jadwal_mengajar', 'jadwal_mengajar.kode_matakuliah=matakuliah.kode_matakuliah', 'right');
 		$this->db->join('dosen', ' dosen.id_dosen=jadwal_mengajar.id_dosen', 'left');
 		$this->db->join('ruangan', ' ruangan.id_ruangan=jadwal_mengajar.id_ruangan', 'left');
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
}