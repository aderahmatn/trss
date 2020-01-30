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
		$this->form_validation->set_message('required','%s tidak boleh kosong!');
		$this->form_validation->set_message('numeric','%s harus berupa angka!');
		$transaksi = $this->transaksi_m;
		$validation = $this->form_validation;
		$validation->set_rules($transaksi->rules());
		$data['planning'] = $this->planning_m->GetByIdOnly($id);
		$data['schedule'] = $this->schedule_m->GetByIdOnly($idsc);

		if ($validation->run() == FALSE)
		{
			$this->template->load('shared/template', 'transaksi/create', $data);
		}
		else
		{
			$post = $this->input->post(null, TRUE);
			$transaksi->add($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Produk berhasil disimpan!');
				redirect('schedule','refresh');
			}
		}
		$data['planning'] = $this->planning_m->GetByIdOnly($id);
		$data['schedule'] = $this->schedule_m->GetByIdOnly($idsc);
		$this->template->load('shared/template', 'transaksi/create', $data);
	}
}

/* End of file Transaksi.php */
/* Location: ./application/controllers/Transaksi.php */