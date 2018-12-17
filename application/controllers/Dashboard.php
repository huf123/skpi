<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->role = $this->session->userdata('role');
		$this->uname = $this->session->userdata('uname');
		$this->mhs_id = $this->session->userdata('mhs_id');
		$this->fullname = $this->session->userdata('fullname');

		$this->load->model('skpi_model');
		if(!$this->uname)
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
		$data["bread"] = "Profil";
		$data["icon"] = "person";
		$data["title"] = "Profil Mahasiswa";

		$mhs = $this->uname;
		$role = $this->role;

		$this->load->view('head', $data);
		
		// Tampilan halaman profil (1. admin, 3. kemahasiswaan, 4. p.dekan)
		if($role==1 OR $role==3 OR $role==4) {
			$data["title"] = "Daftar Profil Mahasiswa";
			$data["profil"] = $this->skpi_model->profil_mhs('')->result();
			$this->load->view('profil_staff_view', $data);
		}
		
		// Tampilan halaman profil (2. mahasiswa)
		elseif ($role==2) {
			// $data["profil"] = $this->skpi_model->profil_mhs('WHERE nim = '.$mhs)->row();
			$data["profil"] = $this->db->get_where('tb_mahasiswa','nim='.$mhs)->row();
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
			'nim' => $this->uname,
			'name' => $this->input->post('mhs_name'),
			'handphone' => $this->input->post('mhs_phone'),
			'kota_lahir' => $this->input->post('mhs_birthplace'),
			'tgl_lahir' => date("d-m-Y",strtotime($this->input->post('mhs_birthdate'))),
			'alamat' => $this->input->post('mhs_address'));
		$this->db->insert('tb_mahasiswa', $data);
		$this->session->set_userdata('mhs_id',$this->uname);
		redirect(base_url('dashboard/profil'),'refresh');
	}
	// Mengupdate profil mahasiswa (setelah diedit)
	public function profil_update()
	{
		$data = array(
			'handphone' => $this->input->post('mhs_phone'),
			'kota_lahir' => $this->input->post('mhs_birthplace'),
			'tgl_lahir' => date_format(date_create($this->input->post('mhs_birthdate')),'Y-m-d'),
			'alamat' => $this->input->post('mhs_address'));
		$this->db->update('tb_mahasiswa', $data, array('nim' => $this->mhs_id));
		redirect(base_url('dashboard/profil'),'refresh');
	}

	// Halaman Kegiatan (Mahasiswa only)
	public function kegiatan()
	{
		$data["title"] = "Kegiatan";
		$data["bread"] = "Kegiatan";
		$data["icon"] = "work";
		$data["kegiatan"] = $this->skpi_model->laporan_kegiatan('','WHERE nim = '.$this->uname)->result();

		$this->load->view('head', $data);
		$this->load->view('kegiatan_mhs', $data);
		$this->load->view('foot');
	}
	public function kegiatan_bentuk()
	{
		$bentuk =  $this->skpi_model->keg_bentuk($this->input->post('id_bidang'));
		echo json_encode($bentuk);
	}
	public function kegiatan_peran()
	{
		$peran = $this->skpi_model->keg_peran($this->input->post('id_bentuk'));
		echo json_encode($peran);
	}
	public function kegiatan_add()
	{
		if (isset($this->mhs_id)){
			$data["title"] = "Tambah Kegiatan";
			$data["bread"] = "Kegiatan";
			$data["icon"] = "work";
			$data["subbread"] = "Tambah";
			$data["subicon"] = "add";

			$data["url"] = 'dashboard/kegiatan_save';
			$data["bidang"] = $this->db->get('tb_bidang')->result();
			$data["tingkatan"] = $this->db->get('tb_tingkatan')->result();

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

		$keg_finish = $this->input->post('keg_finish');
		if (strtotime($keg_finish)!=0) {
			$keg_finish = date('Y-m-d',strtotime($keg_finish));
		} else {
			$keg_finish = 0;
		}

		// TIME TO UPLOAD
		$this->load->library('upload',$config);
		if($this->upload->do_upload('keg_file')){
			$data = array(
				// nama kegiatan
				'nama_kg' => $this->input->post('keg_name'),
				// nama kegiatan (english)
				'nama_kg_eng' => $this->input->post('keg_name_eng'),
				// file lampiran sertifikat kegiatan
				'sertifikat' => $this->upload->data('file_name'),
				// deskripsi kegiatan
				// 'keg_desc' => $this->input->post('keg_desc'),
				// bidang kegiatan
				'id_bidang' => $this->input->post('keg_bidang'),
				// bentuk kegiatan
				'id_bentuk' => $this->input->post('keg_bentuk'),
				// status peran dalam kegiatan
				'id_peranan' => $this->input->post('keg_peran'),
				// tingkatan kegiatan
				'id_tingkatan' => $this->input->post('keg_tingkat'),
				// tanggal start & finish kegiatan
				'tgl_mulai' => date('Y-m-d',strtotime($this->input->post('keg_start'))),
				'tgl_selesai' => $keg_finish,
				// nama mahasiswa yang mengikuti kegiatan
				'nim' => $this->session->userdata('mhs_id'),
				// status
				'approval' => 0,'locked' => 0);
			$this->db->insert('tb_transaksi', $data);
			// die();
			redirect(base_url('dashboard/kegiatan'),'refresh');
		}
		else{
			$error = array('error' => $this->upload->display_errors());
			var_dump($error);
		}
	}
	public function kegiatan_delete($id)
	{
		$this->db->delete('tb_transaksi',array('id_transaksi' => $id));
		redirect(base_url('dashboard/kegiatan'),'refresh');
	}
	public function kegiatan_edit($id)
	{
		$data["title"] = "Edit Kegiatan";
		$data["bread"] = "Kegiatan";
		$data["icon"] = "work";
		$data["subbread"] = "Edit";
		$data["subicon"] = "edit";

		$data["bidang"] = $this->db->get('tb_bidang')->result();
		$data["tingkatan"] = $this->db->get('tb_tingkatan')->result();
		$data["kegiatan"] = $this->skpi_model->laporan_kegiatan('tb_transaksi.id_bidang as id_bidang,tb_transaksi.id_bentuk as id_bentuk,tb_transaksi.id_tingkatan as id_tingkatan,tb_transaksi.id_peranan as id_peranan,',
			'WHERE nim = '.$this->uname.' AND id_transaksi = '.$id.' LIMIT 1')->row();
		$data['url'] = 'dashboard/kegiatan_update';

		$this->load->view('head', $data);
		$this->load->view('kegiatan_add', $data);
		$this->load->view('foot');
	}
	public function kegiatan_update()
	{
		var_dump($_POST); die();
		$keg_finish = $this->input->post('keg_finish');
		if (strtotime($keg_finish)!=0) {
			$keg_finish = date('Y-m-d',strtotime($keg_finish));
		} else {
			$keg_finish = 0;
		}

		$data = array(
			// nama kegiatan
			'nama_kg' => $this->input->post('keg_name'),
			// nama kegiatan (english)
			'nama_kg_eng' => $this->input->post('keg_name_eng'),
			// deskripsi kegiatan
			// 'keg_desc' => $this->input->post('keg_desc'),
			// bidang kegiatan
			'id_bidang' => $this->input->post('keg_bidang'),
			// bentuk kegiatan
			'id_bentuk' => $this->input->post('keg_bentuk'),
			// status peran dalam kegiatan
			'id_peranan' => $this->input->post('keg_peran'),
			// tingkatan kegiatan
			'id_tingkatan' => $this->input->post('keg_tingkat'),
			// tanggal start & finish kegiatan
			'tgl_mulai' => date('Y-m-d',strtotime($this->input->post('keg_start'))),
			'tgl_selesai' => $keg_finish);

		if ($this->input->post('keg_file')) {	
			$config['upload_path'] = FCPATH.'assets/files/';
			$config['allowed_types'] = 'gif|jpg|png|pdf';

			$this->load->library('upload',$config);
			if ($this->upload->do_upload('keg_file')) {			
				// file lampiran sertifikat kegiatan
				$data['sertifikat'] = $this->upload->data('file_name');
			}
		}

		$this->db->update('tb_transaksi', $data, array('nim'=>$this->session->userdata('mhs_id')));
		redirect(base_url('dashboard/kegiatan'),'refresh');
	}
	public function kegiatan_approve()
	{
		$where = array();
		$id_transaksi = $this->input->post('id_transaksi');
		var_dump($_POST);die();
		array_push($where, $id_transaksi);
		$this->db->update('tb_transaksi', 'approval = 1');
		$this->db->where_in('id_transaksi', $where);
		redirect(base_url('dashboard/kegiatan'),'refresh');
	}

	// Halaman Transkrip
	public function transkrip()
	{
		$data["title"] = "Transkrip Mahasiswa";
		$data["bread"] = "Transkrip Mahasiswa";
		$data["icon"] = "assignment";

		$this->load->view('head',$data);
		$this->load->view('transkrip_view',$data);
		$this->load->view('foot');
	}

	public function generate()
	{
		$data['kegiatan'] = $this->skpi_model->laporan_kegiatan('','WHERE nim = '.$this->uname)->result();
		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "transkrip-mahasiswa.pdf";
		$this->pdf->loadHtml($this->load->view('transkrip_template',$data));
		$this->pdf->render();
	}

	// Halaman Laporan
	public function laporan()
	{
		$data["title"] = "Laporan";
		$data["bread"] = "Laporan";
		$data["icon"] = "description";

		$data["laporan"] = $this->skpi_model->laporan_kegiatan('nama,jurusan,','
            JOIN tb_mahasiswa ON tb_transaksi.nim = tb_mahasiswa.nim
            JOIN tb_jurusan ON tb_mahasiswa.id_jurusan = tb_jurusan.id_jurusan')->result();

		$this->load->view('head', $data);		
		$this->load->view('laporan_view', $data);
		$this->load->view('foot');
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

			$this->db->update('tb_user', $data, array('' => ''));
			redirect(base_url('dashboard/user'),'refresh');			
		}else{
			redirect(base_url('error/not_found'),'refresh');
		}
	}
	public function user_delete($id)
	{
		if ($this->role==1) {
			$this->db->delete('tb_user',array('uid' => $id));
			redirect(base_url('dashboard/user'),'refresh');
		}else{
			redirect(base_url('error/not_found'),'refresh');
		}
	}
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */