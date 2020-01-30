<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('planning_m');
		$this->load->model('schedule_m');
		$this->load->model('transaksi_m');
	}

	public function create($id,$idsc)
	{
		$data['planning'] = $this->planning_m->GetByIdOnly($id);
		$data['schedule'] = $this->schedule_m->GetByIdOnly($idsc);
		$this->template->load('shared/template', 'transaksi/create', $data);
	}

	public function save()
	{
		$post = $this->input->post(null, TRUE);
			$this->transaksi_m->add($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Transaksi berhasil disimpan!');
				redirect('schedule','refresh');
			}
	}

}

/* End of file Transaksi.php */
/* Location: ./application/controllers/Transaksi.php */