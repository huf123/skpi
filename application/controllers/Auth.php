<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('cookie');
		$this->load->helper('string');
	}
	public function login()
	{
		if($this->session->userdata('fullname')){
			redirect(base_url('dashboard'),'refresh');
		}else{
			$data["title"] = "Login";
			$this->load->view('front/login',$data);
		}
	}
	public function logging()
	{
		// set_cookie
		$row = $this->db->query("
			SELECT tb_user.id_fak as id_fak,username,id_level,fakultas
			FROM tb_user
			JOIN tb_fakultas on tb_user.id_fak = tb_fakultas.id_fak
			WHERE username = '".$this->input->post('uname')."'
				AND password = '".$this->input->post('upwd')."'
			LIMIT 1")->row();

		if($row){
			if ($this->input->post('remember')) {
				set_cookie('survey',random_string('alnum', 64),3600*24*30);
			}
			// jika mahasiswa
			if ($row->id_level == 2) {
				$mhs = $this->db->query("
					SELECT nim,nama,jurusan
					FROM tb_mahasiswa
					JOIN tb_jurusan ON tb_mahasiswa.id_jurusan = tb_jurusan.id_jurusan
					WHERE nim = ".$row->username." LIMIT 1")->row();
				 // jika profil mahasiswa sudah ada, set session id mahasiswa (mhs_id)
				if (!empty($mhs)) {
					$this->session->set_userdata('jurusan',$mhs->jurusan);
					$this->session->set_userdata('mhs_id',$mhs->nim);
					$this->session->set_userdata('fullname',$mhs->nama);
				}
			}
			// $this->session->set_userdata('uid',$row->uid);
			$this->session->set_userdata('id_fak',$row->id_fak);
			$this->session->set_userdata('uname',$row->username);
			$this->session->set_userdata('role',$row->id_level);

			redirect(base_url('dashboard'),'refresh');
		}else{
			redirect(base_url('auth/login'),'refresh');
		}
	}
	public function logout()
	{
		session_destroy();
		redirect(base_url('auth/login'),'refresh');
	}	

}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */