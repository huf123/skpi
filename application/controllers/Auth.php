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
			"uname" => $this->input->post('uname'),
			"upwd" => md5($this->input->post('upwd')));
		$row = $this->db->get_where('mst_user',$data,1)->row();

		if($row){
			if ($this->input->post('remember')) {
				set_cookie('survey',random_string('alnum', 64),3600*24*30);
			}
			$this->session->set_userdata('fullname',$row->fullname);
			$this->session->set_userdata('uid',$row->uid);
			$this->session->set_userdata('role',$row->role);
			redirect($_SERVER['HTTP_REFERER'],'refresh');
			// var_dump($row);
		}else{
			redirect(base_url('auth/login'),'refresh');
			// var_dump($row);
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