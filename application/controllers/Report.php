<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('report_m');
	}

	public function periodik()
	{
		$this->template->load('shared/template', 'report/periodik');	
	}

	public function tampilPeriodik()
	{
		$tgl1 = $this->input->post('tglmulai');
		$tgl2 = $this->input->post('tglakhir');
		$data['schedule']=$this->report_m->getByRange($tgl1,$tgl2);
		$this->template->load('shared/template', 'report/periodik_v',$data);	
	}

	public function exportPeriodik()
	{
		
	}
}

/* End of file Report.php */
/* Location: ./application/controllers/Report.php */