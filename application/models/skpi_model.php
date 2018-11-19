<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skpi_model extends CI_Model {
	// Profil mahasiswa
	public function profil_mhs($other)
	{ 
		return $this->db->query("
			SELECT mhs_id,mhs_name,mhs_nim,mhs_address,mhs_phone,
				mhs_sex,mhs_birthplace,mhs_birthdate,mhs_department
			FROM mst_mahasiswa ".$other);
	}
}

/* End of file skpi_model.php */
/* Location: ./application/models/skpi_model.php */