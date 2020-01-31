<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_m extends CI_Model {

	private $_table = "tschedule";

	
	public function getByRange($tgl1, $tgl2)
	{
		$this->db->from('tschedule');
		$this->db->where('Date >=', $tgl1);
		$this->db->where('Date <=', $tgl2);
		$this->db->join('ttransaksi', 'ttransaksi.IdSchedule = tschedule.IdSchedule');
		$this->db->join('tplan', 'tplan.Idplan = tschedule.Idplan');
		$this->db->join('tprocess', 'tprocess.IdProcess = tplan.IdProcess');
		$this->db->join('tproduk', 'tproduk.IdProduk = tplan.IdProduk');
		$this->db->join('tline', 'tline.IdLine = tproduk.IdLine');
		$this->db->order_by('Date','ASC');
		$query = $this->db->get();
		return $query->result();
	}

}

/* End of file report_m.php */
/* Location: ./application/models/report_m.php */