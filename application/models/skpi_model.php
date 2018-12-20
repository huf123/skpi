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
	public function laporan_kegiatan($select,$other)
	{
		return $this->db->query("
			SELECT id_transaksi,tb_transaksi.nim as nim,nama_kg,tgl_mulai,tgl_selesai,info,
				".$select." nama_kg_eng,locked,bentuk,peranan,tingkatan,approval,sertifikat,
				(tb_bentuk_peranan.bobot*tb_tingkatan.bobot) as bobot
			FROM tb_transaksi
			JOIN tb_bidang ON tb_transaksi.id_bidang = tb_bidang.id_bidang
			JOIN tb_tingkatan ON tb_transaksi.id_tingkatan = tb_tingkatan.id_tingkatan
			JOIN tb_bentuk ON tb_transaksi.id_bentuk = tb_bentuk.id_bentuk
			JOIN tb_peranan ON tb_transaksi.id_peranan = tb_peranan.id_peranan
            JOIN tb_bentuk_peranan
            	ON tb_peranan.id_peranan = tb_bentuk_peranan.id_peranan
            	AND tb_bentuk.id_bentuk = tb_bentuk_peranan.id_bentuk ".$other);
	}
	public function keg_peran($id)
	{
		return $this->db->query("
			SELECT tb_peranan.id_peranan as id_peranan,peranan
			FROM tb_peranan
			JOIN tb_bentuk_peranan ON tb_peranan.id_peranan = tb_bentuk_peranan.id_peranan
			WHERE id_bentuk = '".$id."'")->result();
	}
	public function keg_bentuk($id)
	{
		return $this->db->get_where('tb_bentuk',array('id_bidang' => $id))->result();
	}
}

/* End of file skpi_model.php */
/* Location: ./application/models/skpi_model.php */