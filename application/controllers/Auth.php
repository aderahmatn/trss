<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_m');
	}

	public function login()
	{
		check_already_login();
		$this->load->view('auth/login');
	}

	public function logout()
	{
		$params = array('nik','role', 'status', 'uname');
		$this->session->unset_userdata($params);
		redirect('auth/login','refresh');
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($post['login'])) {
			$query = $this->users_m->login($post);
			if ($query->num_rows() > 0) {
				$row = $query->row();
				$params = array(
					'nik' => $row->Nik,
					'role' =>$row->IdRole,
					'uname' =>$row->Username,
					'status' =>'login'
				);
				$this->session->set_userdata($params);
				redirect('dashboard','refresh');
			}else{
				$this->session->set_flashdata('error', 'username / password salah!');
				redirect('auth/login','refresh');
			}
		}
	}
}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */