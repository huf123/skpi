<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->uid = $this->session->userdata('uid');
		$this->role = $this->session->userdata('role');
		$this->mhs_id = $this->session->userdata('mhs_id');

		$this->load->model('skpi_model');
		if(!$this->uid)
			redirect(base_url('auth/login'),'refresh');
	}

	public function index()
	{
		$data["title"] = "Dashboard";

		$this->load->view('head', $data);
		$this->load->view('index_view', $data);
		$this->load->view('foot');
	}

	// Halaman Profil
	public function profil() 
	{
		$data["title"] = "Daftar Profil Mahasiswa";
		$data["bread"] = "Profil";
		$data["icon"] = "person";

		$mhs = $this->uid;
		$role = $this->role;

		$this->load->view('head', $data);
		
		// Tampilan halaman profil (admin, p.dekan, kemahasiswaan)
		if($role==1 OR $role==2 OR $role==3) {
			$data["profil"] = $this->skpi_model->profil_mhs('')->result();
			$this->load->view('profil_staff_view', $data);
		}
		
		// Tampilan halaman profil (mahasiswa)
		elseif ($role==4) {
			$data["profil"] = $this->skpi_model->profil_mhs('WHERE mhs_uid = '.$mhs)->row();
			if (isset($data["profil"])) {
				$data["url"] = 'dashboard/profil_update';
			} else{
				$data["url"] = 'dashboard/profil_save'; 
				$data["mhs_name"] = $this->session->userdata('fullname');
			}
			$this->load->view('profil_mhs_view', $data);
		}

		$this->load->view('foot');
	}
	// Menyimpan profil mahasiswa
	public function profil_save()
	{
		$data = array(
			'mhs_uid' => $this->uid,
			'mhs_name' => $this->input->post('mhs_name'),
			'mhs_phone' => $this->input->post('mhs_phone'),
			'mhs_birthplace' => $this->input->post('mhs_birthplace'),
			'mhs_birthdate' => date("d-m-Y",strtotime($this->input->post('mhs_birthdate'))),
			'mhs_address' => $this->input->post('mhs_address'));
		$this->db->insert('mst_mahasiswa', $data);		
		$this->session->set_userdata('mhs_id',$this->db->insert_id());
		redirect(base_url('dashboard/profil'),'refresh');
	}
	// Mengupdate profil mahasiswa (setelah diedit)
	public function profil_update()
	{
		$data = array(
			'mhs_phone' => $this->input->post('mhs_phone'),
			'mhs_birthplace' => $this->input->post('mhs_birthplace'),
			'mhs_birthdate' => date_format(date_create($this->input->post('mhs_birthdate')),'Y-m-d'),
			'mhs_address' => $this->input->post('mhs_address'));
		$this->db->update('mst_mahasiswa', $data, array('mhs_uid' => $this->uid));
		redirect(base_url('dashboard/profil'),'refresh');
	}

	// Halaman Kegiatan (Mahasiswa only)
	public function kegiatan()
	{
		$data["title"] = "Kegiatan";
		$data["bread"] = "Kegiatan";
		$data["icon"] = "work";

		$data["kegiatan"] = $this->db->query("
			SELECT keg_id,keg_name,keg_name_eng,keg_desc,keg_kepesertaan,
				keg_bidang,keg_bentuk,keg_start,keg_finish,keg_file,keg_status
			FROM mst_kegiatan
			JOIN mst_mahasiswa ON keg_mahasiswa = mhs_id
			JOIN mst_user ON mhs_uid = uid
			WHERE mhs_uid = $this->uid")->result();

		$this->load->view('head', $data);
		$this->load->view('kegiatan_mhs', $data);
		$this->load->view('foot');
	}
	public function kegiatan_add()
	{
		if (isset($this->mhs_id)){
			$data["title"] = "Tambah Kegiatan";
			$data["bread"] = "Kegiatan";
			$data["icon"] = "work";
			$data["subbread"] = "Tambah";
			$data["subicon"] = "add";

			$this->load->view('head', $data);
			$this->load->view('kegiatan_add', $data);
			$this->load->view('foot');
		}
		else redirect(base_url('dashboard/profil'),'refresh');
	}
	public function kegiatan_save()
	{
		$config['upload_path'] = FCPATH.'assets/files/';
		$config['allowed_types'] = 'gif|jpg|png|pdf';

		// TIME TO UPLOAD
		$this->load->library('upload',$config);
		if($this->upload->do_upload('keg_file')){
			$data = array(
				// nama kegiatan
				'keg_name' => $this->input->post('keg_name'),
				// file lampiran sertifikat kegiatan
				'keg_file' => $this->upload->data('file_name'),
				// deskripsi kegiatan
				'keg_desc' => $this->input->post('keg_desc'),
				// bidang kegiatan : 1.Penelitian, 2.Minat bakat, 3.Pengabdian masyarakat
				// 4.Kegiatan Kesejahteraan mahasiswa
				'keg_bidang' => $this->input->post('keg_bidang'),
				// status kepesertaan kegiatan : 1.Peserta, 2.Panitia, 3.Anggota
				'keg_kepesertaan' => $this->input->post('keg_kepesertaan'),
				// bentuk level : 
				'keg_bentuk' => $this->input->post('keg_level'),
				// bentuk kegiatan : 
				'keg_bentuk' => $this->input->post('keg_bentuk'),
				// tanggal start & finish kegiatan
				'keg_start' => $this->input->post('keg_start'),
				'keg_finish' => $this->input->post('keg_finish'),
				// nama mahasiswa yang mengikuti kegiatan
				'keg_mahasiswa' => $this->session->userdata('mhs_id'));
			$this->db->insert('mst_kegiatan', $data);

			redirect(base_url('dashboard/kegiatan'),'refresh');
		}
		else{
			$error = array('error' => $this->upload->display_errors());
			var_dump($error);
		}
	}
	public function kegiatan_edit($id)
	{
		if (isset($this->mhs_id)){
			$data["title"] = "Edit Kegiatan";
			$data["bread"] = "Kegiatan";
			$data["icon"] = "work";
			$data["subbread"] = "Edit";
			$data["subicon"] = "edit";

			$data["kegiatan"] = $this->db->get_where('mst_kegiatan',array('keg_id' => $id))->row();

			$this->load->view('head', $data);
			$this->load->view('kegiatan_edit', $data);
			$this->load->view('foot');	
		}		
		else redirect(base_url('dashboard/profil'),'refresh');
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

	// Halaman Laporan
	public function laporan()
	{
		$data["title"] = "Daftar Laporan";

		$data["laporan"] = $this->db->query("
			SELECT mhs_name, mhs_nim, keg_name, keg_file, keg_status
			FROM mst_mahasiswa
			JOIN mst_kegiatan ON mhs_id = keg_mahasiswa")->result();

		// role 1 = admin, 2 = pembantu dekan, 3 = kemahasiswaan
		$role = $this->session->userdata('role');
		$uid = $this->session->userdata('uid');
		
		if (isset($mhs)) {
			$data["laporan"] = $this->db->get_where('mst_kegiatan',array('keg_mahasiswa' => $mhs))->result();
		}elseif (isset($pdekan) OR isset($kmhs)) {
			$data["laporan"] = $this->db->query('')->result();
		}

		$this->load->view('head', $data);
		if($role==1 OR $role==2) {
			$this->load->view('kegiatan_mhs', $data);
		}elseif ($role==3) {
			$this->load->view('kegiatan_list', $data);
		}
		$this->load->view('foot');
	}
	public function laporan_verifikasi()
	{
		$id = $this->input->post("keg_id");
		$data = array('keg_status' => $this->input->post("keg_status"));
		$this->db->update('mst_kegiatan', $data, array('keg_id' => $id));
	}

	// User & privilege management
	public function user()
	{
		if ($this->role==1) {
			$data["title"] = "User & Privilege";
			$data["bread"] = "User & Privilege";
			$data["icon"] = "supervisor_account";

			$data["user"] = $this->skpi_model->user('')->result();

			$this->load->view('head', $data);
			$this->load->view('user_view', $data);
			$this->load->view('foot');
		}else{
			redirect(base_url('error/not_found'),'refresh');
		}
	}
	public function user_save()
	{
		if ($this->role==1) {
			$data = array(
				'fullname' => $this->input->post('fullname'), 
				'uname' => $this->input->post('uname'),
				'upwd' => $this->input->post('upwd'),
				'role' => $this->input->post('role'),
				// mod status 1. added, 2. modified
				'mod_status' => 1,
				'mod_uid' => $this->uid);

			$this->db->insert('mst_user', $data);
			redirect(base_url('dashboard/user'),'refresh');
		}else{
			redirect(base_url('error/not_found'),'refresh');
		}
	}
	public function user_edit($id)
	{		
		if ($this->role==1) {
			$data["title"] = "User & Privilege";
			$data["bread"] = "User & Privilege";
			$data["icon"] = "supervisor_account";
			$data["subbread"] = "Edit";
			$data["subicon"] = "edit";
		}else{
			redirect(base_url('error/not_found'),'refresh');
		}
	}
	public function user_update()
	{
		if ($this->role==1) {
			$data = array(
				'fullname' => $this->input->post('fullname'), 
				'uname' => $this->input->post('uname'),
				'upwd' => $this->input->post('upwd'),
				'role' => $this->input->post('role'),
				// mod status 1. added, 2. modified
				'mod_status' => 2,
				'mod_uid' => $this->uid);

			$this->db->update('mst_user', $data);
			redirect(base_url('dashboard/user'),'refresh');			
		}else{
			redirect(base_url('error/not_found'),'refresh');
		}
	}
	public function user_delete($id)
	{
		if ($this->role==1) {
			$this->db->delete('mst_user',array('uid' => $id));
			redirect(base_url('dashboard/user'),'refresh');
		}else{
			redirect(base_url('error/not_found'),'refresh');
		}
	}
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */