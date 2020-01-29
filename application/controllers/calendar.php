<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		check_not_login();
	}

	public function index($year=NULL, $month=NULL)
	{
		
		$this->load->model('calendar_m');
		$data['calendar'] = $this->calendar_m->getcalendar($year , $month);
		$this->template->load('shared/template', 'calendar/index', $data);	
		// redirect('calendar/next','refresh');

	}
	public function next($year, $month)
	{
		$this->load->model('calendar_m');
		$data['calendar'] = $this->calendar_m->getcalendar($year , $month);
		$this->template->load('shared/template', 'calendar/index', $data);	

	}

}

/* End of file calendar.php */
/* Location: ./application/controllers/calendar.php */