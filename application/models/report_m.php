<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_m extends CI_Model {

	private $_table = "tschedule";

	
	public function getByRange($tgl1, $tgl2)
	{
		$this->db->select('*');
		$this->db->from('ttransaksi');
		$this->db->join('tschedule', 'tschedule.IdPlan = ttransaksi.IdPlan');
		$this->db->where('tschedule.Date >=', $tgl1);
		$this->db->where('tschedule.Date <=', $tgl2);
		$this->db->join('tplan', 'tplan.Idplan = tschedule.Idplan');
		$this->db->join('tprocess', 'tprocess.IdProcess = tplan.IdProcess');
		$this->db->join('tproduk', 'tproduk.IdProduk = tplan.IdProduk');
		$this->db->join('tline', 'tline.IdLine = tproduk.IdLine');
		$this->db->join('tusers', 'tusers.Nik = ttransaksi.Nik');
		$this->db->order_by('tschedule.Date','ASC');
		$query = $this->db->get();
		return $query->result();
		
	}

	public function getStok()
	{

		$this->db->from('tplan');
		$this->db->join('tprocess', 'tprocess.IdProcess = tplan.IdProcess');
		$this->db->join('ttransaksi', 'ttransaksi.IdPlan = tplan.IdPlan');
		$this->db->join('tproduk', 'tproduk.IdProduk = tplan.IdProduk');
		$this->db->join('tline', 'tline.IdLine = tproduk.IdLine');
		$this->db->select('tplan.IdPlan,tproduk.PartName,tproduk.PartNumber,tplan.Qty,tprocess.ProcessName,tline.LineName, SUM(ttransaksi.ActualQty) as stok');
		$this->db->group_by('ttransaksi.IdPlan');



		$query = $this->db->get();
		return$query->result();
	}

}

/* End of file report_m.php */
/* Location: ./application/models/report_m.php */