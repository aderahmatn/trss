<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Process extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('process_m');
		$this->load->model('line_m');

	}
	
	public function create()
	{
		$this->form_validation->set_message('is_unique','%s sudah ada!');
		$this->form_validation->set_message('required','%s tidak boleh kosong!');
		$process = $this->process_m;
		$validation = $this->form_validation;
		$validation->set_rules($process->rules());
		$data['line'] = $this->line_m->GetAll();
		$data['process'] = $this->process_m->GetAll();
		$data['position'] = $this->process_m->GetPosition();


		if ($validation->run() == FALSE)
		{
			$this->template->load('shared/template', 'product/create', $data);
		}
		else
		{
			$post = $this->input->post(null, TRUE);
			$process->add($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Process berhasil ditambahkan!');
				redirect('product/create','refresh');
			}
		}
	}

	public function createLine()
	{
		$this->form_validation->set_message('is_unique','%s sudah ada!');
		$this->form_validation->set_message('required','%s tidak boleh kosong!');
		$process = $this->process_m;
		$validation = $this->form_validation;
		$validation->set_rules($process->rulesLine());
		$data['line'] = $this->line_m->GetAll();
		$data['process'] = $this->process_m->GetAll();
		$data['position'] = $this->process_m->GetPosition();


		if ($validation->run() == FALSE)
		{
			$this->template->load('shared/template', 'product/create', $data);
		}
		else
		{
			$post = $this->input->post(null, TRUE);
			$process->addLine($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Line berhasil ditambahkan!');
				redirect('product/create','refresh');
			}
		}
	}

	public function delete($id)
	{

		$this->process_m->delete($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Process berhasil dihapus!');
			redirect('product','refresh');
		}
	}

}

/* End of file Process.php */
/* Location: ./application/controllers/Process.php */