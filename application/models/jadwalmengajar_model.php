<?php 

 class Jadwalmengajar_model extends CI_Model{
 	public function jointable($nama_prodi)
 	{
 		// echo "nama_prodi".$nama_prodi; die;
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

 	
 	public function tampil_data($table)
	{
		return $this->db->get($table);
	}
 	public function insert($data, $table)
 	{
 		$this->db->insert($table, $data);
 	}

 	public function get_by_id($table, $id)
	{
		$this->db->where('id_jdlmengajar', $id);
		return $this->db->get($table);
	}

	public function update($id, $data, $table)
	{
		$this->db->where($id, 'id');
		$this->db->update($table, $data);
	}

	public function edit_data($where,$table)
	{
		return $this->db->get_where($table,$where);
	}

	public function hapus_data($id,$table)
	{
		$this->db->where($id, 'id');
		$this->db->delete($table);
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

	public function nama_prodi($id)
	{
		$this->db->select('nama_prodi');
		$this->db->from('prodi');
		$this->db->where('id_prodi',$id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function cekRuangan($ruangan,$hari,$jam)
	{
		$this->db->select('*');
		$this->db->from('jadwal_mengajar');
		$this->db->where('id_ruangan', $ruangan);
		$this->db->where('hari', $hari);
		$this->db->where('jam', $jam);
		return $this->db->get()->result();

	}

 }