<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Planning extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		check_not_login();
		
		$this->load->model('planning_m');
		$this->load->model('product_m');
		$this->load->model('process_m');
		$this->load->model('line_m');
	}

	public function index()
	{
		check_role();
		$data['plan'] = $this->planning_m->GetAll();
		$this->template->load('shared/template', 'planning/browse', $data);	
	}

	public function create()
	{
		check_role();
		$this->form_validation->set_message('required','%s tidak boleh kosong!');
		$this->form_validation->set_message('numeric','%s harus berupa angka!');
		$planning = $this->planning_m;
		$validation = $this->form_validation;
		$validation->set_rules($planning->rules());
		$data['line'] = $this->line_m->GetAll();
		$data['position'] = $this->process_m->GetPosition();
		$data['process'] = $this->process_m->GetAll();
		$data['product'] = $this->product_m->GetAll();

		if ($validation->run() == FALSE)
		{
			$this->template->load('shared/template', 'planning/create', $data);
		}
		else
		{
			$post = $this->input->post(null, TRUE);
			$planning->add($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Planning berhasil disimpan!');
				redirect('planning/create','refresh');
			}
		}
	}

	public function update($id = null)
	{
		check_role();
		if (!isset($id)) redirect('planning');
		
		$this->form_validation->set_message('required','%s tidak boleh kosong!');
		$this->form_validation->set_message('numeric','%s harus berupa angka!');
		$planning = $this->planning_m;
		$validation = $this->form_validation;
		$validation->set_rules($planning->rules());
		$data['line'] = $this->line_m->GetAll();
		$data['position'] = $this->process_m->GetPosition();
		$data['process'] = $this->process_m->GetAll();
		$data['product'] = $this->product_m->GetAll();

		if ($validation->run()) {
			$post = $this->input->post(null, TRUE);
			$planning->update($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Update data planning berhasil!');
				redirect('planning','refresh');
			}else{
				$this->session->set_flashdata('warning', 'Data planning tidak ada yang diupdate!');
				redirect('planning','refresh');
			}
		}
		$data['planning'] = $this->planning_m->GetAll();
		if (!$data['planning']) {
			$this->session->set_flashdata('error', 'Data planning tidak ditemukan!');
			redirect('planning','refresh');
		}
		$this->template->load('shared/template', 'planning/edit', $data);
	}

	public function getProcess()
	{
		$id=$this->input->post('id');
		$ps=$this->input->post('ps');
		$data=$this->planning_m->getProcessByPosition($id,$ps);
		echo json_encode($data);
	}

	public function getProduct()
	{
		$id=$this->input->post('id');
		$ps=$this->input->post('ps');
		$data=$this->planning_m->getProductByLine($id, $ps);
		echo json_encode($data);
	}

	public function getDetail()
	{
		$id=$this->input->post('rowid');
		if ($id==null) {
			$this->session->set_flashdata('warning', 'Data tidak ada ditemukan!');
				redirect('planning','refresh');
		}
		$query=$this->planning_m->GetById($id);
		$data['planning']=$query->row();	
		
		$this->load->view('planning/detail', $data);
	}
	public function delete($id)
	{
		check_role();

		$this->planning_m->delete($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Planning berhasil dihapus!');
			redirect('planning','refresh');
		}
	}
}

/* End of file Planning.php */
/* Location: ./application/controllers/Planning.php */