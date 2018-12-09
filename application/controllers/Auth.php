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
		$data = array(
			"username" => $this->input->post('uname'),
			"password" => $this->input->post('upwd'));
		$row = $this->db->get_where('tb_user',$data,1)->row();

		if($row){
			if ($this->input->post('remember')) {
				set_cookie('survey',random_string('alnum', 64),3600*24*30);
			}
			// jika mahasiswa
			if ($row->id_level == 4) {
				$mhs = $this->db->get_where('tb_mahasiswa',array('nim' => $row->username),1)->row();
				 // jika profil mahasiswa sudah ada, set session id mahasiswa (mhs_id)
				if (!empty($mhs)) $this->session->set_userdata('mhs_id',$mhs->nim);
				$this->session->set_userdata('fullname',$mhs->nama);
			}
			// $this->session->set_userdata('uid',$row->uid);
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