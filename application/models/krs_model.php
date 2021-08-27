<?php 

 class Krs_model extends CI_Model{

 	public $table = 'krs';
 	public $id	= 'id_krs';
 	public function insert($data)
 	{
 		$this->db->insert($this->table, $data);
 	}

 	public function get_by_id($id)
	{
		$this->db->where($this->id,$id);
		return $this->db->get($this->table)->row();
	}
	public function thnakademik($nim,$tahunakad){
		$tahunakademik=$tahunakad-1;
		$tahunakademik.="/".$tahunakad;
		$query="SELECT 	 matakuliah.sks
							 ,krs.nilai
                             
						FROM 
							krs
						INNER JOIN matakuliah
						ON (krs.kode_matakuliah = matakuliah.kode_matakuliah)
                        RIGHT JOIN tahun_akademik ON(krs.id_thn_akad=tahun_akademik.id_thn_akad)
						WHERE krs.nim= $nim and tahun_akademik.tahun_akademik='$tahunakademik' ";
		return $this->db->query($query)->result();
	}
	public function totalSks($nim){
		$query="SELECT SUM(matakuliah.sks) as jumlahSks FROM krs INNER JOIN matakuliah ON (krs.kode_matakuliah = matakuliah.kode_matakuliah) WHERE krs.nim='$nim' ";
		return $this->db->query($query)->result_array();
	}
	public function thnSemester($nim,$smst){


		$query="SELECT 	 matakuliah.sks
							 ,krs.nilai
                             
						FROM 
							krs
						INNER JOIN matakuliah
						ON (krs.kode_matakuliah = matakuliah.kode_matakuliah)
                        RIGHT JOIN tahun_akademik ON(krs.id_thn_akad=tahun_akademik.id_thn_akad)
						WHERE krs.nim= $nim and tahun_akademik.semester='$smst'";
		return $this->db->query($query)->result();
	}
	public function jumlahSmstr($nim){
		$query="SELECT 	 matakuliah.semester
						FROM 
							krs
						INNER JOIN matakuliah
						ON (krs.kode_matakuliah = matakuliah.kode_matakuliah)
                        RIGHT JOIN tahun_akademik ON(krs.id_thn_akad=tahun_akademik.id_thn_akad)
						WHERE krs.nim=$nim GROUP BY matakuliah.semester";
		return $this->db->query($query)->result();
	}
	public function nilaiIPK($keys){
		$jumlahSks=0;
		$jumlahNilai=0;
		foreach ($keys as $key ) {
		$jumlahSks+=$key->sks;
		$jumlahNilai+=skorNilai($key->nilai,$key->sks);
		}
		return	number_format($jumlahNilai/$jumlahSks,2);
	}

	public function update($id, $data)
	{
		$this->db->where($this->id, $id);
		$this->db->update($this->table, $data);
	}

	public function hapus_data($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function getProdi($nim)
	{
		$this->db->select('nama_prodi');
		$this->db->from('mahasiswa');
		$this->db->where('nim',$nim);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getSmt($thn_akad)
	{
		$this->db->select('semester');
		$this->db->from('tahun_akademik');
		$this->db->where('id_thn_akad',$thn_akad);
		$query = $this->db->get();
		return $query->result_array();
	}

	


 }