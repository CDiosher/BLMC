<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase_order extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('admin/M_purchase_order','purchase_order');
		$this->load->model('admin/M_inventory','inventory');
		if(!$this->session->userdata('logged_in')) redirect(base_url());
		if($this->session->userdata('role') == 1 || $this->session->userdata('role') == 2 ) {
		
		} else {

			redirect('customer');

		}
	}

	public function index() {
		$data['sitename'] = 'Admin Dashboard';
		$data['content'] = 'admin/pages/purchase-order/purchase-order';
		$this->parser->parse('admin/template/template',$data);
	}

	/**
	* Insert Data
	* @return True
	*/
	public function create() {

		$user = $this->session->userdata('username');

		$config = $this->config->item('purchase_order');

		$this->require_validation($config);

		if ($this->form_validation->run()) {

			$dp = $this->input->post('date_payment');
			$dd = $this->input->post('date_delivered');

			$data['product_id'] = $this->input->post('productName');
			$data['quantity'] = $this->input->post('quantity');
			$data['amount'] = $this->input->post('amount');
			$data['supplier'] = $this->input->post('supplier');
			$data['vendor_address'] = $this->input->post('supp_address');
			$data['date_payment'] = date('Y-m-d',strtotime($dp));
			$data['date_delivered'] = date('Y-m-d',strtotime($dd));
			$data['created_by'] = $user;
			$data['defective'] = 0;
			$data['inactive'] = 0;
			$data['created_at'] = date('Y-m-d h:i:s');
			$data['date'] = date('Y-m-d');
			$data['month'] = date('Y-m');
			$data['annual'] = date('Y');

			$this->purchase_order->insert_product($data);
			
		}
	}

	/**
	* Javascript Script
	*/
	public function datepicker() {
		$output = '
			<script type="text/javascript">
				$m( function() {
					$m( "#payment" ).datepicker();
				});

				$m("#payment").on("changeDate", function(){
				    $m(this).datepicker("hide");
				});

				$m( function() {
					$m( "#delivered" ).datepicker();
				});

				$m("#delivered").on("changeDate", function(){
				    $m(this).datepicker("hide");
				});
			</script>
		';
		echo $output;
	}

	public function edit($id) {
		$products = $this->purchase_order->fetchItem($id);

		$output = '<form method="post" action="'.base_url('purchase-list/update/'.$products['id']).'" enctype="multipart/form-data" id="submitForm">
					<div class="form-group">	
						<div class="form-row">
							<div class="col-md-3">'.
								form_dropdown("productName", productname(), (isset($products['id'])) ? $products['id'] : '',"class='form-control'").'
							</div>
							<div class="col-md-2">'.
								form_dropdown("quantity", quantity(), (isset($products['quantity'])) ? $products['quantity'] : '', "class='form-control'").'
							</div>
							<div class="col-md-2">
								<input type="text" name="amount" id="price" value="'.$products['amount'].'" class="form-control">
							</div>
							<div class="col-md-2">
								<input type="text" name="supplier" id="supplier" value="'.$products['supplier'].'" class="form-control">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="form-row">
							
							<div class="col-md-3">
								<input type="text" name="supp_address" id="supp_address" value="'.$products['vendor_address'].'" class="form-control">
							</div>
							
							<div class="col-md-2">
								<input type="text" name="date_payment" id="payment" value="'.date('m/d/Y',strtotime($products['date_payment'])).'" class="form-control" placeholder="Date of Payment">
							</div>
							<div class="col-md-2">
								<input type="text" name="date_delivered" id="delivered" value="'.date('m/d/Y',strtotime($products['date_delivered'])).'" class="form-control" placeholder="Date of Delivered">
							</div>
							<div class="col-md-2">
								<button class="btn btn-success">Update</button>
							</div>
						</div>
					</div>
				</form>';

			echo $output;

	}

	/**
	* Update Data
	* @return True
	*/
	public function update($id) {
		
		$config = $this->config->item('purchase_order');

		$this->require_validation($config);

		if ($this->form_validation->run()) {

			$dp = $this->input->post('date_payment');
			$dd = $this->input->post('date_delivered');

			$data['product_id'] = $this->input->post('productName');
			$data['quantity'] = $this->input->post('quantity');
			$data['amount'] = $this->input->post('amount');
			$data['supplier'] = $this->input->post('supplier');
			$data['vendor_address'] = $this->input->post('supp_address');
			$data['date_payment'] = date('Y-m-d',strtotime($dp));
			$data['date_delivered'] = date('Y-m-d',strtotime($dd));
			$data['update_by'] = $user;
			$data['update_at'] = date('Y-m-d h:i:s');

			if($this->purchase_order->updateProduct($data,$id)) {

				$this->session->set_flashdata('success', 'Successfully Update');

				redirect('purchase-list');
			}
		}
	}

	/**
	* Display List
	* @return True
	*/
	public function displayList() {

		$lists = $this->purchase_order->getItem();
		$output = '';

		foreach ($lists as $list) {
			$action = "";
			$output .= '
				<tr>
					<td>'.$list->productname.'</td>
					<td>'.$list->quantity.'</td>
					<td>'.$list->amount.'</td>
					<td>'.$list->supplier.'</td>
					<td>'.$list->vendor_address.'</td>
					<td>'.date('M d, Y',strtotime($list->date_delivered)).'</td>
					<td>'.date('M d, Y',strtotime($list->date_payment)).'</td>
					<td>'.date('M d, Y | H:i:s',strtotime($list->created_at)).'</td>
					<td>'.$list->created_by.'</td>
				</tr>
			';
		}

		echo $output;

	}

	/**
	* Display Template List
	* @return True
	*/
	public function list() {
		$data['getRecieved'] = $this->purchase_order->getRecievedItem();
		$data['sitename'] = 'Admin Dashboard';
		$data['content'] = 'admin/pages/purchase-order/list';
		$this->parser->parse('admin/template/template',$data);
	}

	/**
	* Remove Item in Database
	* @param Int $id
	* @return True
	*/
	public function removeItem($id) {

		if($id != null) {
			if($this->purchase_order->remove($id)) {

				redirect('purchase-list');
			}
		} else {
			show_error('Invalid or no ID specified');
		}
	}

	/**
	* Recieving Function
	* @param Int $id
	* @return True and False
	*/
	public function recievedItem($id) {

		if($id != null) {
			if($this->purchase_order->recieved($id)) {

				redirect('purchase-list');
			}
		} else {
			show_error('Invalid or no ID specified');
		}
	}

	/**
	* Recieving Function
	* @param Int $id
	* @return True and False
	*/
	public function defectiveItem($id) {

		if($id != null) {
			if($this->purchase_order->defective($id)) {

				redirect('purchase-list');
			}
		} else {
			show_error('Invalid or no ID specified');
		}
	}

	/**
	*
	* Publish Item
	* @param Int $id
	* @return True
	*/
	public function sell($id) {

		if($id != null) {
			if($this->purchase_order->active($id)) {
				$item = $this->purchase_order->fetchItem($id);
				
				$int = $this->inventory->itemCount($item['product_id']);
				if(count($int) > 0) {
					$sum = $item['quantity'] + $int['quantity'];
					$data = array(
						'quantity' => $sum,
						'amount' => $item['amount'],
						'update_by' => $this->session->userdata('username'),
						'update_at' => date('Y-m-d H:i:s')
					);
					$this->inventory->updateInventory($item['product_id'],$data);

					redirect('purchase-list');
				} else {
					$data = array(
						'product_id' => $item['product_id'],
						'quantity' => $item['quantity'],
						'amount' => $item['amount'],
						'supplier' => $item['supplier'],
						'vendor_address' => $item['vendor_address'],
						'created_by' => $this->session->userdata('username'),
						'created_at' => date('Y-m-d H:i:s'),
						'date' => date('Y-m-d'),
						'annual' => date('Y'),
						'month' => date('Y-m')
					);
					$this->inventory->insertInventory($data);
					redirect('purchase-list');
				}
			}
		} else {
			show_error('Invalid or no ID specified');
		}
	}

	/**
	*
	* Not Publish Item
	* @param Int $id
	* @return True
	*/
	public function notsell($id) {

		if($id != null) {
			if($this->purchase_order->notactive($id)) {

				redirect('purchase-list');
			}
		} else {
			show_error('Invalid or no ID specified');
		}
	}
}
