<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('schedule_m');
		$this->load->model('planning_m');
	}

	public function index()
	{

		$this->form_validation->set_message('required','%s tidak boleh kosong!');
		$schedule = $this->schedule_m;
		$validation = $this->form_validation;
		$validation->set_rules($schedule->rules());
		$data['plan'] = $this->planning_m->GetAll();

		if ($validation->run() == FALSE)
		{
			$this->template->load('shared/template', 'schedule/create', $data);
		}
		else
		{
			$idplan = $this->input->post('idplanning');
			$idschedule = $this->input->post('idschedule');
			$date = $this->input->post('date');
			foreach ($idplan as $key) {
				$this->schedule_m->add(array(
					'Date' => $date,
					'IdSchedule' => $idschedule,
					'IdPlan' => $key
				));
			}
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Schedule berhasil disimpan!');
				redirect('schedule','refresh');
			}
		}		
	}

}

/* End of file Schedule.php */
/* Location: ./application/controllers/Schedule.php */