<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Process_m extends CI_Model {

	private $_table = "tprocess";
	private $_tableline = "tline";

	public $ProcessName;
	public $IdLine;

	public function rules()
	{
		return[
			['field' => 'processname',
			'label' => 'Nama Proses',
			'rules' => 'required|is_unique[tprocess.ProcessName]'],

			['field' => 'positionpro',
			'label' => 'Position',
			'rules' => 'required'],
		];
	}
	public function rulesLine()
	{
		return[
			['field' => 'line',
			'label' => 'Nama Line',
			'rules' => 'required|is_unique[tline.LineName]']
		];
	}

	public function GetAll()
	{
		return $this->db->get($this->_table)->result();
	}
	public function GetPosition()
	{
		return $this->db->get('tposition')->result();
	}

	public function add()
	{
		$post = $this->input->post();
		$this->ProcessName = $post['processname'];
		$this->IdLine = $post['positionpro'];
		$this->db->insert($this->_table, $this);
	}

	public function addLine()
	{
		$post = $this->input->post();
		$params['LineName'] = $post['line'];
		$this->db->insert($this->_tableline, $params);
	}
	public function delete($id)
	{
		return $this->db->delete($this->_table, array('IdProcess' => $id));
	}
}

/* End of file process_m.php */
/* Location: ./application/models/process_m.php */