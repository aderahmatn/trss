<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		check_not_login();
		check_role();
		$this->load->model('users_m');
	}

	public function index()
	{
		$data['user'] = $this->users_m->GetAll();
		$this->template->load('shared/template', 'user/browse', $data);
	}

	public function create()
	{
		$this->form_validation->set_rules('nik', 'NIK', 'trim|required|min_length[5]|max_length[7]|numeric');
		$this->form_validation->set_rules('fullname', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('gender', 'Jenis Kelamin', 'trim|required');

		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|is_unique[tusers.Username]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('confpassword', 'Konfirmasi Password', 'trim|required|min_length[5]|matches[password]');
		$this->form_validation->set_rules('level', 'Level', 'trim|required');

		$this->form_validation->set_rules('nohp', 'No Handphone', 'trim|required|max_length[12]|numeric');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|valid_emails');
		$this->form_validation->set_rules('position', 'Position', 'trim|required');


		$this->form_validation->set_message('required','%s tidak boleh kosong!');
		$this->form_validation->set_message('min_length','%s minimal 5 karakter!');
		$this->form_validation->set_message('min_length[10]','%s minimal 10 karakter!');
		$this->form_validation->set_message('is_unique','%s sudah ada!');
		$this->form_validation->set_message('matches','%s tidak sama!');
		$this->form_validation->set_message('numeric','%s harus berupa angka!');
		$this->form_validation->set_message('valid_email','%s tidak valid!');

		if ($this->form_validation->run() == FALSE)
		{
			$this->template->load('shared/template', 'user/create');
		}
		else
		{
			$post = $this->input->post(null, TRUE);
			$this->users_m->add($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'User berhasil ditambahkan!');
				redirect('users/create','refresh');
			}
		}
	} 

	public function update($id)
	{
		$data['user'] = $this->users_m->GetById($id);
		$this->form_validation->set_rules('nik', 'NIK', 'trim|required|min_length[5]|max_length[7]|numeric');
		$this->form_validation->set_rules('fullname', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('gender', 'Jenis Kelamin', 'trim|required');

		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|callback_username_check');
		if ($this->input->post('password')) {

			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');
			$this->form_validation->set_rules('confpassword', 'Konfirmasi Password', 'trim|min_length[5]|matches[password]');
		}
		if ($this->input->post('confpassword')) {
			$this->form_validation->set_rules('confpassword', 'Konfirmasi Password', 'trim|min_length[5]|matches[password]');
		}
		$this->form_validation->set_rules('level', 'Level', 'trim|required');

		$this->form_validation->set_rules('nohp', 'No Handphone', 'trim|required|max_length[12]|numeric');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|valid_emails');
		$this->form_validation->set_rules('position', 'Position', 'trim|required');


		$this->form_validation->set_message('required','%s tidak boleh kosong!');
		$this->form_validation->set_message('min_length','%s minimal 5 karakter!');
		$this->form_validation->set_message('min_length[10]','%s minimal 10 karakter!');
		$this->form_validation->set_message('is_unique','%s sudah ada!');
		$this->form_validation->set_message('matches','%s tidak sama!');
		$this->form_validation->set_message('numeric','%s harus berupa angka!');
		$this->form_validation->set_message('valid_email','%s tidak valid!');

		if ($this->form_validation->run() == FALSE)
		{
			$query = $this->users_m->GetById($id); 
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$this->template->load('shared/template', 'user/edit', $data);
			}else{
				$this->session->set_flashdata('error', 'User tidak ditemukan!');
				redirect('users','refresh');
			}
		}
		else
		{
			$post = $this->input->post(null, TRUE);
			$this->users_m->update($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Update data berhasil!');
				redirect('users','refresh');
			}else{
				$this->session->set_flashdata('warning', 'Data tidak ada yang diupdate!');
				redirect('users','refresh');
			}
		}
	}

	public function username_check()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM tusers WHERE Username = '$post[username]' AND IdUser != '$post[id]' ");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('username_check','%s sudah ada!');
			return FALSE;
		}else{
			return TRUE;
		}
	}

	public function delete($id)
	{

		$this->users_m->delete($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'User berhasil dihapus!');
			redirect('users','refresh');
		}
	}
}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */