<?php  

function skorNilai($nilai,$sks)
{
	if($nilai>=85) $skor=4*$sks;
	else if ($nilai>=80 && $nilai<=84) $skor=3.7*$sks;
		else if ($nilai>=75 && $nilai<=79) $skor=3.3*$sks;
			else if ($nilai>=70 && $nilai<=74) $skor=3*$sks;
				else if ($nilai>=65 && $nilai<=69) $skor=2.7*$sks;
					else if($nilai>=60 && $nilai<=64) $skor=2.3*$sks;
						else if($nilai>=55 && $nilai<=59) $skor=2*$sks;
							else if($nilai>=50 && $nilai<=54) $skor=1.7*$sks;
								else if($nilai>=40 && $nilai<=49) $skor=1*$sks;
								else if($nilai<=40) $skor=0*$sks;							
				else $skor=0;
			return $skor;
}

function konvert($nilai)
{
	if($nilai>=85) $huruf='A';
	else if ($nilai>=80 && $nilai<=84) $huruf='A-';
		else if ($nilai>=75 && $nilai<=79) $huruf='B+';
			else if ($nilai>=70 && $nilai<=74) $huruf='B';
				else if ($nilai>=65 && $nilai<=69) $huruf='B-';
					else if($nilai>=60 && $nilai<=64) $huruf='C+';
						else if($nilai>=55 && $nilai<=59) $huruf='C';
							else if($nilai>=50 && $nilai<=54) $huruf='C-';
								else if($nilai>=40 && $nilai<=49) $huruf='D';
								else if($nilai<=40) $huruf='E';							
				else $huruf='Nilai Tidak Ada';
			return $huruf;
}

function cekNilai($nim, $kode, $nilKhs)
{
	$nilai = get_instance();
	$nilai->load->model('transkrip_model');

	$nilai->db->select('*');
	$nilai->db->from('transkrip_nilai');
	$nilai->db->where('nim', $nim);
	$nilai->db->where('kode_matakuliah',$kode);
	$query=$nilai->db->get()->row();

	if($query!=null)
	{
		if($nilKhs > $query->nilai)
		{
			$nilai->db->set('nilai', $nilKhs)
						->where('nim', $nim)
						->where('kode_matakuliah', $kode)
						->update('transkrip_nilai');
		}
	}else{
		$data = [
			'nim' => $nim,
			'nilai' =>$nilKhs,
			'kode_matakuliah' => $kode
		];

		$nilai->transkrip_model->insert($data);
	}
}