<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_m extends CI_Model {

	private $_table = "tproduk";
	private $_tableline = "tline";

	public $IdProduk;
	public $PartNumber;
	public $PartName;
	public $IdPosition;

	public function rules()
	{
		return[
			['field' => 'partnumber',
			'label' => 'Part Number',
			'rules' => 'required|min_length[5]|callback_nopart_check'],

			['field' => 'partname',
			'label' => 'Part Name',
			'rules' => 'required|min_length[5]'],

			['field' => 'position',
			'label' => 'Position',
			'rules' => 'required'],
			
			['field' => 'lineproduct',
			'label' => 'Line',
			'rules' => 'required']
		];
	}

	public function GetAll()
	{
		return $this->db->get($this->_table)->result();
	}

	public function GetAllJoinLine()
	{
		$this->db->select('tproduk.*, tline.IdLine AS IdLine, tline.LineName');
		$this->db->join('tline', 'tproduk.IdLine = tline.IdLine');
		$this->db->from('tproduk');
		$query = $this->db->get();
		return $query->result();
	}

	public function GetProcessJoinPosition()
	{
		$this->db->select('*');
		$this->db->from('tprocess');
		$this->db->join('tline','tprocess.IdLine=tline.IdLine', 'left');
		$query = $this->db->get();
		return $query->result();
	}

	public function GetProcess()
	{
		return $this->db->get('tprocess')->result();
	}

	public function GetById($id)
	{
		return $this->db->get_where($this->_table,["IdProduk" => $id])->row();
	}

	public function add()
	{
		$post = $this->input->post();
		$this->IdProduk = $post['id'];
		$this->PartNumber = $post['partnumber'];
		$this->PartName = $post['partname'];
		$this->IdPosition = $post['position'];
		$this->IdLine = $post['lineproduct'];
		$this->db->insert($this->_table, $this);
	}

	public function update($post)
	{
		$post = $this->input->post();
		$this->IdProduk = $post['id'];
		$this->PartNumber = $post['partnumber'];
		$this->PartName = $post['partname'];
		$this->IdPosition = $post['position'];
		$this->IdLine = $post['lineproduct'];
		$this->db->update($this->_table, $this, array('IdProduk' => $post['id']));
	}

	public function delete($id)
	{
		return $this->db->delete($this->_table, array('IdProduk' => $id));
	}
}

/* End of file product_m.php */
/* Location: ./application/models/product_m.php */