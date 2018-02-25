<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller {

	/**
	* Initialize Constructor
	* Call Constructor
	*/
	function __construct() {
		parent::__construct();
		$this->load->model('admin/M_product','product');
		if(!$this->session->userdata('logged_in')) redirect(base_url());
		if($this->session->userdata('role') == 1 || $this->session->userdata('role') == 2 ) {
		
		} else {

			redirect('customer');

		}
	}

	/**
	* Display Product List
	* @return True
	*/
	public function index() {

		$data['list'] = $this->product->getAllproducts();
		$data['sitename'] = 'Admin Dashboard';
		$data['content'] = 'admin/pages/product-list/list';
		$this->parser->parse('admin/template/template',$data);
	}

	/**
	* Insert data
	* @return True
	*/
	public function createProducts() {

		$config = $this->config->item('items');

		$this->require_validation($config);

		if ($this->form_validation->run()) {

			$data = array(
				'productname' => $this->input->post('productName'),
				'productcode' => $this->input->post('productCode'),
				'created_by' => $this->session->userdata('username'),
				'created_at' => date('Y-m-d H:i:s')
			);

			if($this->product->createProduct($data)) {

				redirect('product-list');
			}

		}

	}

	/**
	*
	* Edit Section
	* @param Int $id
	* @return True
	*/
	public function updateProducts($id) {

		$data = array(
			'productname' => $this->input->post('productName'),
			'productcode' => $this->input->post('productCode'),
			'update_by' => $this->session->userdata('username'),
			'update_at' => date('Y-m-d H:i:s')
		);
		if($this->product->updateThis($data,$id)) {

			redirect('product-list');
		}

	}

}

?>