<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Planning_m extends CI_Model {

	private $_table = "tplan";

	public $IdPlan;
	public $Date;
	public $IdPosition;
	public $IdLine;
	public $IdProcess;
	public $IdPart;
	public $Qty;
	public $CreateDate;


	public function rules()
	{
		return[
			['field' => 'dateplann',
			'label' => 'Tanggal Planning',
			'rules' => 'required'],

			['field' => 'position',
			'label' => 'Position',
			'rules' => 'required'],

			['field' => 'lineproduct',
			'label' => 'Line',
			'rules' => 'required'],

			['field' => 'processing',
			'label' => 'Processing',
			'rules' => 'required'],

			['field' => 'product',
			'label' => 'Product',
			'rules' => 'required'],

			['field' => 'qty',
			'label' => 'Quantity',
			'rules' => 'required|numeric']
		];
	}
	public function GetAll()
	{
		$this->db->select('*');
		$this->db->from('tplan');
		$this->db->join('tposition','tposition.IdPosition=tplan.IdPosition', 'left');
		$this->db->join('tline','tline.IdLine=tplan.IdLine', 'left');
		$this->db->join('tproduk','tproduk.IdProduk=tplan.IdPart', 'left');

		$query = $this->db->get();
		return $query->result();
	}

	public function GetAllJoin()
	{
		/*$this->db->select('tproduk.*, tline.IdLine AS IdLine, tline.LineName');
		$this->db->join('tline', 'tproduk.IdLine = tline.IdLine');
		$this->db->from('tproduk');
		$query = $this->db->get();
		return $query->result();*/
	}

	public function GetById($id)
	{
		return $this->db->get_where($this->_table,["IdPlan" => $id])->row();
	}

	public function add()
	{
		$post = $this->input->post();
		$this->IdPlan = $post['id'];
		$this->Date = $post['dateplann'];
		$this->IdPosition = $post['position'];
		$this->IdLine = $post['lineproduct'];
		$this->IdProcess = $post['processing'];
		$this->IdPart = $post['product'];
		$this->Qty = $post['qty'];
		$this->CreateDate = $post['datecreate'];
		$this->db->insert($this->_table, $this);
	}

	public function update($post)
	{
		$post = $this->input->post();
		$this->IdPlan = $post['id'];
		$this->Date = $post['dateplann'];
		$this->IdPosition = $post['position'];
		$this->IdLine = $post['lineproduct'];
		$this->IdProcess = $post['processing'];
		$this->IdPart = $post['product'];
		$this->Qty = $post['qty'];
		$this->CreateDate = $post['datecreate'];
		$this->db->update($this->_table, $this, array('IdPlan' => $post['id']));
	}

	public function delete($id)
	{
		return $this->db->delete($this->_table, array('IdPlan' => $id));
	}

	public function getProcessByPosition($id)
	{
		$hasil=$this->db->query("SELECT * FROM tprocess WHERE IdPosition='$id' ");
		return $hasil->result();
	}

	public function getProductByLine($id, $ps)
	{
		$hasil=$this->db->query("SELECT * FROM tproduk WHERE IdLine='$id' AND IdPosition='$ps' ");
		return $hasil->result();
	}
}

/* End of file planning_m.php */
/* Location: ./application/models/planning_m.php */