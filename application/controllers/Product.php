<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		check_not_login();
		check_role();
		$this->load->model('product_m');
		$this->load->model('process_m');
		$this->load->model('line_m');
	}

	public function index()
	{
		$data['product']=$this->product_m->GetAllJoinLine();
		$data['process'] = $this->product_m->GetProcessJoinPosition();
		$data['line'] = $this->line_m->GetAll();
		$this->template->load('shared/template', 'product/browse', $data);	
	}

	public function create()
	{
		$this->form_validation->set_message('required','%s tidak boleh kosong!');
		$this->form_validation->set_message('min_length','%s minimal 5 karakter!');
		$this->form_validation->set_message('min_length[10]','%s minimal 10 karakter!');
		$this->form_validation->set_message('is_unique','%s sudah ada!');
		$this->form_validation->set_message('matches','%s tidak sama!');
		$this->form_validation->set_message('numeric','%s harus berupa angka!');
		$product = $this->product_m;
		$validation = $this->form_validation;
		$validation->set_rules($product->rules());
		$data['line'] = $this->line_m->GetAll();
		$data['position'] = $this->process_m->GetPosition();
		$data['process'] = $this->process_m->GetAll();

		if ($validation->run() == FALSE)
		{
			$this->template->load('shared/template', 'product/create', $data);
		}
		else
		{
			$post = $this->input->post(null, TRUE);
			$product->add($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Produk berhasil disimpan!');
				redirect('product/create','refresh');
			}
		}
	}

	public function update($id = null)
	{
		if (!isset($id)) redirect('product');
		
		$product = $this->product_m;
		$validation = $this->form_validation;
		$validation->set_rules($product->rules());
		$this->form_validation->set_message('required','%s tidak boleh kosong!');
		$this->form_validation->set_message('min_length','%s minimal 5 karakter!');
		$this->form_validation->set_message('min_length[10]','%s minimal 10 karakter!');
		$this->form_validation->set_message('is_unique','%s sudah ada!');
		$this->form_validation->set_message('matches','%s tidak sama!');
		$this->form_validation->set_message('numeric','%s harus berupa angka!');

		if ($validation->run()) {
			$post = $this->input->post(null, TRUE);
			$product->update($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Update data product berhasil!');
				redirect('product','refresh');
			}else{
				$this->session->set_flashdata('warning', 'Data product tidak ada yang diupdate!');
				redirect('product','refresh');
			}
		}

		$data['product'] = $product->GetById($id);
		$data['position'] = $this->process_m->GetPosition();
		$data['line'] = $this->line_m->GetAll();

		if (!$data['product']) {
			$this->session->set_flashdata('error', 'Data produk tidak ditemukan!');
			redirect('product','refresh');
		}
		$this->template->load('shared/template', 'product/edit', $data);
	}
	
	public function delete($id)
	{

		$this->product_m->delete($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Product berhasil dihapus!');
			redirect('product','refresh');
		}
	}
	public function deleteLine($id)
	{

		$this->line_m->delete($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Line berhasil dihapus!');
			redirect('product','refresh');
		}
	}

	public function nopart_check()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM tproduk WHERE PartNumber = '$post[partnumber]' AND IdProduk != '$post[id]' ");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('nopart_check','%s sudah ada!');
			return FALSE;
		}else{
			return TRUE;
		}
	}
}

/* End of file Product.php */
/* Location: ./application/controllers/Product.php */