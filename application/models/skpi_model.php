<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skpi_model extends CI_Model {
	// Profil mahasiswa
	public function profil_mhs($other)
	{ 
		return $this->db->query("
			SELECT nim,nama,id_jns_kelamin,email,alamat,
				handphone,kota_lahir,tgl_lahir,jurusan
			FROM tb_mahasiswa 
			JOIN tb_jurusan ON tb_jurusan.id_jurusan = tb_mahasiswa.id_jurusan ".$other);
	}
	public function user($other)
	{
		return $this->db->query("
			SELECT uid,uname,fullname,role,mod_date,mod_status,mod_uid
			FROM tb_user ".$other);
	}
}

/* End of file skpi_model.php */
/* Location: ./application/models/skpi_model.php */