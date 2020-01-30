<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_m extends CI_Model {

	private $_table = "ttransaksi";

	public $IdTransaksi;
	public $Nik;
	public $IdPlan;
	public $IdSchedule;
	public $ActualQty;
	public $Note;

	public function rules()
	{
		return[
			
			['field' => 'actualqty',
			'label' => 'Quantity',
			'rules' => 'required|numeric']
		];
	}
	public function add()
	{
		$post = $this->input->post();
		$this->IdTransaksi = $post['idtransaksi'];
		$this->Nik = $post['iduser'];
		$this->IdPlan = $post['idplan'];
		$this->IdSchedule = $post['idschedule'];
		$this->ActualQty = $post['actualqty'];
		$this->Note = $post['note'];
		$this->db->insert($this->_table, $this);
	}
}

/* End of file transaksi.php */
/* Location: ./application/models/transaksi.php */