<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skpi_model extends CI_Model {
	// Profil mahasiswa
	public function profil_mhs($other)
	{ 
		return $this->db->query("
			SELECT nim,nama,id_jns_kelamin,email,alamat,gelar_singkat,gelar_lengkap,
				handphone,kota_lahir,tgl_lahir,jurusan,fakultas
			FROM tb_mahasiswa
			JOIN tb_jurusan ON tb_jurusan.id_jurusan = tb_mahasiswa.id_jurusan
			JOIN tb_fakultas ON tb_fakultas.id_fak = tb_jurusan.id_fak ".$other);
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
				".$select."nama_kg_eng,locked,bentuk,peranan,tingkatan,approval,sertifikat,
				(tb_bentuk_peranan.bobot*tb_tingkatan.bobot*softskill1) as softskill1,
				(tb_bentuk_peranan.bobot*tb_tingkatan.bobot*softskill2) as softskill2,
				(tb_bentuk_peranan.bobot*tb_tingkatan.bobot*softskill3) as softskill3,
				(tb_bentuk_peranan.bobot*tb_tingkatan.bobot*softskill4) as softskill4,
				(tb_bentuk_peranan.bobot*tb_tingkatan.bobot*softskill5) as softskill5,
				(tb_bentuk_peranan.bobot*tb_tingkatan.bobot*softskill6) as softskill6,
				(tb_bentuk_peranan.bobot*tb_tingkatan.bobot*softskill7) as softskill7,
				(tb_bentuk_peranan.bobot*tb_tingkatan.bobot*softskill8) as softskill8,
				(tb_bentuk_peranan.bobot*tb_tingkatan.bobot*softskill9) as softskill9,
				(tb_bentuk_peranan.bobot*tb_tingkatan.bobot*softskill10) as softskill10,
				(tb_bentuk_peranan.bobot*tb_tingkatan.bobot*softskill11) as softskill11,
				(tb_bentuk_peranan.bobot*tb_tingkatan.bobot*softskill12) as softskill12
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
	public function softskill($id)
	{
		return $this->db->query("
			SELECT
				(SUM(tb_bentuk_peranan.bobot*tb_tingkatan.bobot)*softskill1) as softskill1,
				(SUM(tb_bentuk_peranan.bobot*tb_tingkatan.bobot)*softskill2) as softskill2,
				(SUM(tb_bentuk_peranan.bobot*tb_tingkatan.bobot)*softskill3) as softskill3,
				(SUM(tb_bentuk_peranan.bobot*tb_tingkatan.bobot)*softskill4) as softskill4,
				(SUM(tb_bentuk_peranan.bobot*tb_tingkatan.bobot)*softskill5) as softskill5,
				(SUM(tb_bentuk_peranan.bobot*tb_tingkatan.bobot)*softskill6) as softskill6,
				(SUM(tb_bentuk_peranan.bobot*tb_tingkatan.bobot)*softskill7) as softskill7,
				(SUM(tb_bentuk_peranan.bobot*tb_tingkatan.bobot)*softskill8) as softskill8,
				(SUM(tb_bentuk_peranan.bobot*tb_tingkatan.bobot)*softskill9) as softskill9,
				(SUM(tb_bentuk_peranan.bobot*tb_tingkatan.bobot)*softskill10) as softskill10,
				(SUM(tb_bentuk_peranan.bobot*tb_tingkatan.bobot)*softskill11) as softskill11,
				(SUM(tb_bentuk_peranan.bobot*tb_tingkatan.bobot)*softskill12) as softskill12
			FROM tb_transaksi
			JOIN tb_tingkatan
				ON tb_transaksi.id_tingkatan = tb_tingkatan.id_tingkatan
			JOIN tb_bentuk_peranan
				ON tb_transaksi.id_peranan = tb_bentuk_peranan.id_peranan
				AND tb_transaksi.id_bentuk = tb_bentuk_peranan.id_bentuk
			WHERE approval = 1 AND nim = $id")->row();
	}
	public function kegiatan_transkrip($id)
	{
		return $this->db->query('
			SELECT GROUP_CONCAT(kegiatan SEPARATOR ";") as kegiatan,CONCAT(B.info,",",B.info_eng) as bidang
			FROM 
            (SELECT CONCAT(nama_kg,",",nama_kg_eng) as kegiatan,nim,id_bidang
            FROM tb_transaksi) as A
			JOIN tb_bidang as B ON A.id_bidang = B.id_bidang
			WHERE A.nim = '.$id.'
			GROUP BY A.id_bidang')->result();
	}
}

/* End of file skpi_model.php */
/* Location: ./application/models/skpi_model.php */