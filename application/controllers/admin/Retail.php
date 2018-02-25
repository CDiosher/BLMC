<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Retail extends MY_Controller {

	/**
	* Initialize Constructor
	* Call Constructor
	*/
	function __construct() {
		parent::__construct();
		$this->load->model('admin/M_retail','retail');
		if(!$this->session->userdata('logged_in')) redirect(base_url());
		if($this->session->userdata('role') == 1 || $this->session->userdata('role') == 2 ) {
		
		} else {

			redirect('customer');

		}
	}

	public function index() {
		$data['retail'] = $this->retail->getRetail();
		$data['sitename'] = 'Admin Dashboard';
		$data['content'] = 'admin/pages/retail/list';
		$this->parser->parse('admin/template/template',$data);
	}

	public function add() {
		$output = '<form method="post" action="'.base_url('retail/add').'" enctype="multipart/form-data">
					<div class="form-group">
						<div class="form-row">
							<div class="col-md-3">'.
								form_dropdown("productName", productname(), set_value('productName'), "class='form-control'").'
							</div>
							<div class="col-md-2">'.
								form_dropdown("quantity", quantity(), set_value('quantity'), "class='form-control'").'
							</div>
							<div class="col-md-2">'.
								form_dropdown("unitDescription", unitDescription(), set_value('unitDescription'), "class='form-control'").'
							</div>
							<div class="col-md-2">
								<input type="text" name="amount" class="form-control" placeholder="Amount" id="price">
							</div>
							<div class="col-md-2">
								<button class="btn btn-success">Add</button>
							</div>
						</div>
					</div>
				</form>';

			echo $output;
	}

	public function edit($id) {
		$getData = $this->retail->getRetailById($id);
		$output = '<form method="post" action="'.base_url('retail/update/'.$id).'" enctype="multipart/form-data">
					<div class="form-group">
						<div class="form-row">
							<div class="col-md-3">'.
								form_dropdown("productName", productname(), (isset($getData['product_id'])) ? $getData['product_id'] : '',"class='form-control' readonly").'
							</div>
							<div class="col-md-2">'.
								form_dropdown("quantity", quantity(), (isset($getData['quantity'])) ? $getData['quantity'] : '', "class='form-control'").'
							</div>
							<div class="col-md-2">'.
								form_dropdown("unitDescription", unitDescription(), (isset($getData['unit_description'])) ? $getData['unit_description'] : '', "class='form-control'").'
							</div>
							<div class="col-md-2">
								<input type="text" name="amount" class="form-control" placeholder="Amount" id="price" value="'.$getData['amount'].'">
							</div>
							<div class="col-md-2">
								<button class="btn btn-success">Update</button>
							</div>
						</div>
					</div>
				</form>';

			echo $output;
	}

	public function update($id) {

		$user = $this->session->userdata('username');

		$config = $this->config->item('retail');

		$this->require_validation($config);

		if ($this->form_validation->run()) {

			$data['product_id'] = $this->input->post('productName');
			$data['quantity'] = $this->input->post('quantity');
			$data['amount'] = $this->input->post('amount');
			$data['unit_description'] = $this->input->post('unitDescription');
			$data['update_by'] = $user;
			$data['update_at'] = date('Y-m-d h:i:s');

			if($this->retail->updateRetail($data,$id)) {
					
					redirect('inventory/retail');

			} else {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissable text-center"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Out of Stocks</strong></div>');
				redirect('purchase-list');
			}
		}
	}

	public function create() {

		$user = $this->session->userdata('username');

		$config = $this->config->item('retail');

		$this->require_validation($config);

		if ($this->form_validation->run()) {

			$data['product_id'] = $this->input->post('productName');
			$data['quantity'] = $this->input->post('quantity');
			$data['amount'] = $this->input->post('amount');
			$data['unit_description'] = $this->input->post('unitDescription');
			$data['created_by'] = $user;
			$data['created_at'] = date('Y-m-d h:i:s');
			$data['date'] = date('Y-m-d');
			$data['month'] = date('Y-m');
			$data['annual'] = date('Y');

			$count = $this->retail->countItem($data['product_id']);

			if($count > 0) {
				if($this->retail->create($data)) {
					redirect('inventory/retail');
				}
			} else {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissable text-center"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Out of Stocks</strong></div>');
				redirect('purchase-list');
			}
		}
	}

	/**
	* Remove Item in Database
	* @param Int $id
	* @return True
	*/
	public function removeItem($id) {

		if($id != null) {
			if($this->retail->remove($id)) {

				redirect('inventory/retail');
			}
		} else {
			show_error('Invalid or no ID specified');
		}
	}

}

?>