<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index()
	{
		$data["title"] = "Dashboard";
		$data["icon"] = "";
		$this->load->view('head', $data);
		$this->load->view('index_view', $data);
		$this->load->view('foot');
	}

	// Halaman Profil
	public function profil() 
	{
		// Halaman profil untuk Kemahasiswaan
		$data["title"] = "Profil";
		$data["icon"] = "person";

		$data["laporan"] = $this->db->query("
			SELECT mhs_id,mhs_name,mhs_nim,mhs_address,
				mhs_phone,mhs_sex,mhs_birthplace,mhs_birthdate,
				mhs_department,mhs_faculty
			FROM mst_mahasiswa
			")->result();

		$this->load->view('head', $data);
		// role 1 = admin, 2 = pembantu dekan, 3 = kemahasiswaan, 4 = mahasiswa
		$role = $this->session->userdata('role');
		if($role==1 AND $role==3) {
			$this->load->view('profil_view', $data);
		}elseif ($role==4) {
			$this->load->view('profil_detail', $data);
		}
		$this->load->view('foot');
	}

	// Halaman Kegiatan
	public function kegiatan()
	{
		$data["title"] = "Daftar Laporan";

		$data["laporan"] = $this->db->query("
			SELECT mhs_name, mhs_nim, keg_name, keg_file, keg_status
			FROM mst_mahasiswa
			JOIN mst_kegiatan ON mhs_id = keg_mahasiswa
			")->result();

		$this->load->view('head', $data);
		$this->load->view('kegiatan_view', $data);
		$this->load->view('foot');
	}
	public function kegiatan_add()
	{
		$data["title"] = "Tambah Kegiatan";
		$data["icon"] = "";
		$this->load->view('head', $data);
		$this->load->view('kegiatan_add', $data);
		$this->load->view('foot');	
	}
	public function kegiatan_save()
	{
		$config['upload_path'] = FCPATH.'assets/files/';
		$config['allowed_types'] = 'gif|jpg|png|pdf';

		// TIME TO UPLOAD
		$this->load->library('upload',$config);
		if ( ! $this->upload->do_upload('file')){
			$error = array('error' => $this->upload->display_errors());
			var_dump($error);
		}

		$data = array(
			// nama kegiatan
			'keg_name' => $this->db->input('keg_name'),
			// file lampiran sertifikat kegiatan
			'keg_file' => $this->upload->data('file_name'),
			// deskripsi kegiatan
			'keg_desc' => $this->db->input('keg_desc'),
			// bidang kegiatan : 1.Penelitian, 2.Minat bakat, 3.Pengabdian masyarakat
			// 4.Kegiatan Kesejahteraan mahasiswa
			'keg_bidang' => $this->db->input('keg_bidang'),
			// status kepesertaan kegiatan : 1.Peserta, 2.Panitia, 3.Anggota
			'keg_kepesertaan' => $this->db->input('keg_kepesertaan'),
			// file lampiran sertifikat kegiatan
			'keg_bentuk' => $this->db->input('keg_bentuk'),
			// file lampiran sertifikat kegiatan
			'keg_start' => $this->db->input('keg_start'),
			'keg_finish' => $this->db->input('keg_finish'));
		$this->db->insert('mst_kegiatan', $data);

		redirect(base_url('dashboard/kegiatan'),'refresh');
	}
	public function kegiatan_edit($id)
	{
		$this->load->view('head', $data);
		$this->load->view('kegiatan_edit', $data);
		$this->load->view('foot');
	}
	public function kegiatan_update()
	{
		$data = array('' => '');
		$this->db->update('mst_kegiatan', $data);
		redirect(base_url('dashboard/kegiatan'),'refresh');
	}

	// Halaman Transkrip
	public function transkrip()
	{
		$data["title"] = "Transkrip";

		$this->load->view('head', $data);
		$this->load->view('transkrip_view', $data);
		$this->load->view('foot');
	}
	public function transkrip_detail($id)
	{		
		$data["title"] = "Transkrip";

		$this->load->view('head', $data);
		$this->load->view('transkrip_view', $data);
		$this->load->view('foot');
	}
	public function transkrip_edit($id)
	{
		$data["title"] = "Transkrip";

		$this->load->view('head', $data);
		$this->load->view('transkrip_view', $data);
		$this->load->view('foot');
	}
	public function transkrip_delete($id)
	{
		$this->db->delete('mst_transkrip',array('trans_id'=>$id));
	}

	// Halaman Laporan
	public function laporan()
	{
		$data["title"] = "Daftar Laporan";

		$data["laporan"] = $this->db->query("
			SELECT mhs_name, mhs_nim, keg_name, keg_file, keg_status
			FROM mst_mahasiswa
			JOIN mst_kegiatan ON mhs_id = keg_mahasiswa
			")->result();

		$this->load->view('head', $data);
		$this->load->view('profil_view', $data);
		$this->load->view('foot');
	}
	public function laporan_verifikasi()
	{
		$id = $this->input->post("keg_id");
		$data = array('keg_status' => $this->input->post("keg_status"));
		$this->db->update('mst_kegiatan', $data, array('keg_id' => $id));
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */