<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_m extends CI_Model {

	private $_tabel = 'tusers';

	public function login($post)
	{
		$this->db->select('*');
		$this->db->from('tusers');
		$this->db->where('Username', $post['username']);
		$this->db->where('Password', md5($post['password']));
		$query = $this->db->get();
		return $query;
	}	

	public function GetAll()
	{
		return $this->db->get($this->_tabel)->result();

	}

	public function GetById($id)
	{
		$this->db->from($this->_tabel);
		$this->db->where('IdUser', $id);
		$query = $this->db->get();
		return $query;
	}

	public function add($post)
	{
		$params['Nik'] = $post['nik'];
		$params['Fullname'] = $post['fullname'];
		$params['Gender'] = $post['gender'];
		$params['Username'] = $post['username'];
		$params['Password'] = md5($post['password']);
		$params['Hp'] = $post['nohp'];
		$params['Email'] = $post['email'];
		$params['IdPosition'] = $post['position'];
		$params['IdRole'] = $post['level'];

		$this->db->insert($this->_tabel, $params);
	}

	public function delete($id)
	{
		$this->db->where('IdUser', $id);
		$this->db->delete($this->_tabel);
	}

	public function update($post)
	{
		$params['Nik'] = $post['nik'];
		$params['Fullname'] = $post['fullname'];
		$params['Gender'] = $post['gender'];
		$params['Username'] = $post['username'];
		if (!empty($post['password'])) {
			$params['Password'] = md5($post['password']);
		}
		$params['Hp'] = $post['nohp'];
		$params['Email'] = $post['email'];
		$params['IdPosition'] = $post['position'];
		$params['IdRole'] = $post['level'];
		$this->db->where('IdUser', $post['id']);
		$this->db->update($this->_tabel, $params);
	}
}

/* End of file users_m.php */
/* Location: ./application/models/users_m.php */