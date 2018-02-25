<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('admin/M_inventory','inventory');
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

		$data['getRecieved'] = $this->inventory->getAllItem();
		$data['sitename'] = 'Admin Dashboard';
		$data['content'] = 'admin/pages/inventory/list';
		$this->parser->parse('admin/template/template',$data);
	}

	public function edit($id) {
		$data = $this->inventory->getData($id);

		$output = '<form method="post" action="'.base_url('inventory/update/'.$data['id']).'" enctype="multipart/form-data" id="submitForm">
					<div class="form-group">	
						<div class="form-row">
							<div class="col-md-3">'.
								form_dropdown("productName", productname(), (isset($data['id'])) ? $data['id'] : '',"class='form-control' readonly").'
							</div>
							<div class="col-md-2">'.
								form_dropdown("quantity", quantity(), (isset($data['quantity'])) ? $data['quantity'] : '', "class='form-control'").'
							</div>
							<div class="col-md-2">
								<input type="text" name="amount" id="price" value="'.$data['amount'].'" class="form-control">
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
		$data = array(
			'quantity' => $this->input->post('quantity'),
			'amount' => $this->input->post('amount')
		);
		
		if($this->inventory->updateInventory($id,$data)) {
			$this->session->set_flashdata('success', 'Successfully Update');

			redirect('inventory/wholesale');
		}
	}
}