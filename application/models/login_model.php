<?php 

class Login_model extends CI_Model{
	public function cek_login($username, $password)
	{
		$this->db->where("username",$username);
		$this->db->where("password",$password);
		return $this->db->get('user_akademik');
	}
	public function cek_login_mhs($username, $password)
	{
		$this->db->select('*');
		$this->db->from('user_mahasiswa');
		$this->db->where("username",$username);
		$this->db->where("password",$password);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getLoginData($user, $pass)
	{
		$u = $user;
		$p = MD5($pass);

		$query_cekLogin = $this->db->get_where('user_akademik', ['username' => $u, 'password' => $p]);

		if(count($query_cekLogin->result()) > 0) {
			foreach ($query_cekLogin->result() as $qck){
				foreach($query_cekLogin->result() as $ck){
					$sess_data ['logged_in'] = TRUE;
					$sess_data ['username'] = $ck->username;
					$sess_data ['password'] = $ck->password;
					$sess_data ['level'] = $ck->level;
					$this->session->set_userdata($sess_data);
				}
				redirect('dashboard/index');
			}
		}else{
			$this->session->set_flashdata('pesan', 'Username dan Password Anda Salah');
			redirect('auth/index');
		}
	}

	public function join_mhs($id)
	{
		$this->db->select('mahasiswa.*,user_mahasiswa.username');
		$this->db->from('mahasiswa');
		$this->db->join('user_mahasiswa', 'user_mahasiswa.id_mhs=mahasiswa.id_mhs');
		$this->db->where('mahasiswa.id_mhs',$id);
		$query = $this->db->get();
		return $query->result();
	}
}