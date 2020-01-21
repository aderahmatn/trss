<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Line_m extends CI_Model {

	private $_table = "tline";
	private $_tableproduct = "tproduk";

	public $IdLine;
	public $LineName;

	public function rules()
	{
		return[
			['field' => 'processname',
			'label' => 'Nama Proses',
			'rules' => 'required'],

			['field' => 'position',
			'label' => 'Position',
			'rules' => 'required'],
		];
	}
	public function GetAll()
	{
		return $this->db->get($this->_table)->result();
	}
	public function delete($id)
	{
		$this->db->query("DELETE FROM tproduk WHERE IdLine = '$id'");
		return $this->db->delete($this->_table, array('IdLine' => $id));
	}
}

/* End of file line_m.php */
/* Location: ./application/models/line_m.php */