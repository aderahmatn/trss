<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule_m extends CI_Model {

	private $_table = "tschedule";

	public $IdSchedule;
	public $Date;
	public $IdPlan;

	public function rules()
	{
		return[
			['field' => 'date',
			'label' => 'Tanggal Schedule',
			'rules' => 'required'],

			['field' => 'idplanning[]',
			'label' => 'Planning',
			'rules' => 'required']
		];
	}

	public function add($data)
	{
		$this->db->insert($this->_table, $data);
	}

	public function GetById($id)
	{
		$this->db->from('tschedule');
		$this->db->where('IdSchedule', $id);
		$query = $this->db->get();
		return $query->result();
	}

	public function delete($id)
	{
		return $this->db->delete($this->_table, array('IdPlan' => $id,));
	}
}

/* End of file schedule_m.php */
/* Location: ./application/models/schedule_m.php */