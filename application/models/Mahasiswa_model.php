<?php  
class Mahasiswa_model extends CI_Model{
	public function tampil_data($table)
	{
		return $this->db->get($table);
	}

	public function insert_data($data,$table)
	{
		$this->db->insert($table, $data);
		$id=$this->Mahasiswa_model->tambah_user();

	}
	public function cek_akses($nim){
		$this->db->select('is_akses');
		$this->db->from('mahasiswa');
		$this->db->where("nim",$nim);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function tambah_user(){
		$id=$this->Mahasiswa_model->cari_id();
		$username=$id[0]['nama'];
		$password1=$id[0]['nim'];
		$password=md5($password1);
		$id_mhs=$id[0]['id_mhs'];
		$tgl_dibuat=date('Y-m-d H:m:s');
		$data = [
			'username' => $username,
			'password' => $password,
			'id_mhs' => $id_mhs,
			'tgl_dibuat' => $tgl_dibuat

		];
		$this->db->insert('user_mahasiswa', $data);
	}

	public function cari_id(){
		$this->db->select('*');
		$this->db->from('mahasiswa');
		$this->db->order_by('id_mhs', 'DESC');
		$this->db->limit(1);
		$query=$this->db->get();
		return $query->result_array();
	}
	public function update_data($where,$data,$table)
	{
			$this->db->where($where);
			$this->db->update($table, $data);
	}

	public function hapus_data($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function ambil_id_mahasiswa($id)
	{
		$hasil = $this->db->where('id_mhs',$id)->get('mahasiswa');
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}else{
			return false;
		}
	}

	public $table = 'mahasiswa';
	public $id = 'nim';

	public function get_by_id($id)
	{
		$this->db->where($this->id,$id);
		return $this->db->get($this->table)->row();
	}

	public function get_keyword($keyword)
	{
		$this->db->select('*');
		$this->db->from('mahasiswa');
		$this->db->like('nama', $keyword);
		$this->db->or_like('nim', $keyword);
		$this->db->or_like('email', $keyword);
		$this->db->or_like('nama_prodi', $keyword);
		$this->db->or_like('fakultas', $keyword);
		$this->db->or_like('tgl_lahir', $keyword);
		$this->db->or_like('tempat_lahir', $keyword);
		$this->db->or_like('jenis_kelamin', $keyword);
		$this->db->or_like('agama', $keyword);
		$this->db->or_like('alamat', $keyword);
		$this->db->or_like('telepon', $keyword);
		return $this->db->get()->result();

	}

	public function getMahasiswa($limit, $start, $keyword = null)
	{
		if ($keyword) {
			$this->db->like('nama', $keyword);
			$this->db->or_like('nim', $keyword);
			$this->db->or_like('email', $keyword);
			$this->db->or_like('nama_prodi', $keyword);
			$this->db->or_like('fakultas', $keyword);
			$this->db->or_like('tgl_lahir', $keyword);
			$this->db->or_like('tempat_lahir', $keyword);
			$this->db->or_like('jenis_kelamin', $keyword);
			$this->db->or_like('agama', $keyword);
			$this->db->or_like('alamat', $keyword);
			$this->db->or_like('telepon', $keyword);
			$this->db->or_like('is_akses', $keyword);
		}
		return $this->db->get('mahasiswa', $limit, $start)->result_array();
	} 

	public function countAllDosen()
	{
		return $this->db->get('mahasiswa')->num_rows();
	}

	public function import_data($mahasiswa)
	{
		$jumlah = count($mahasiswa);
		if($jumlah > 0) {
			$this->db->replace('mahasiswa', $mahasiswa);
		}
	}
}