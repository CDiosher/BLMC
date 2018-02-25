<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('default/M_customer', 'customer');
		$this->load->model('admin/M_retail','retail');
		$this->load->model('admin/M_purchase_order','purchase_order');
		$this->load->model('admin/M_inventory','inventory');
		if(!$this->session->userdata('logged_in')) redirect(base_url());
	}

	public function index() {

		$data['sitename'] = 'Cashier Dashboard';
		$data['content'] = 'admin/pages/customer/customer';
		$this->load->model('admin/M_retail','retail');
		$this->parser->parse('admin/template/template',$data);
	}

	public function transaction(){

		if ($_POST) {
			$pquan = $this->input->post('pquan');
			$c_name = $this->input->post('c_name');
			$products = $this->input->post('p_name');
			$category = $this->input->post('category');
			$quantity = $this->input->post('price');
			$subtotal = $this->input->post('total');
			$tag_price = $this->input->post('tag_price');
			$payCheck = $this->input->post('payCheck');
			//die();
			$total = count($c_name);
			$push = array();
			for ($i=0; $i < $total; $i++) { 
				$batch = array(
					'c_name' => $c_name[$i],
					'products' => $products[$i],
					'category' => $category[$i],
					'quantity' => $quantity[$i],
					'subtotal' => $subtotal[$i],
					'price' => $tag_price[$i],
					'paycheck' => $payCheck[$i],
					'added_by' => $this->session->userdata('username'),
					'created_at' => date('Y-m-d h:i:s'),
					'date' =>date('Y-m-d'),
					'month' => date('Y-m'),
					'annual' => date('Y')
				);
				array_push($push,$batch);
			}
			if($this->customer->insert_transaction($push)) {
				foreach ($push as $key) {
					$product = $key['products'];
					$category = $key['category'];
					$quan = $key['quantity'];

					$this->updateInvetory($product,$category,$quan);
				}
				$this->session->set_flashdata('success', '<div <div class="alert alert-success alert-dismissable text-center" style="width:50%;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong id="notFound">Transaction Complete!</strong></div>');
				redirect('customer');
			}
		}
	}

	public function updateInvetory($product,$category,$quan) {
		if($category == 'wholesale') {
			$_q = $this->customer->getItemID($product);
			$_quan = $this->inventory->updateQuantity($_q['id']);
			$sum = $_quan['quantity'] - $quan;
			$_sum = abs($sum);
			$this->inventory->inventWholeSale($_q['id'],$_sum);
		} else {
			$_q = $this->customer->getItemID($product);
			$_quan = $this->customer->productRetailPrize($_q['id']);
			$sum = $_quan['quantity'] - $quan;
			$_sum = abs($sum);
			$this->inventory->inventRetail($_q['id'],$_sum);
		}
	}

	/**
	* Display Template List
	* @return True
	*/
	public function wholesale() {
		$data['getRecieved'] = $this->inventory->getAllItem();
		$data['sitename'] = 'Admin Dashboard';
		$data['content'] = 'admin/pages/customer/wholesale';
		$this->parser->parse('admin/template/template',$data);
	}

	public function retail() {
		$data['retail'] = $this->retail->getRetail();
		$data['sitename'] = 'Admin Dashboard';
		$data['content'] = 'admin/pages/customer/retail';
		$this->parser->parse('admin/template/template',$data);
	}

	public function form() {

		$output = '
			<div class="form-group">
					<div class="col-md-12">
						<div class="form-row">
							<div class="col-md-2">
								<input type="text" class="form-control" name="c_name" id="c_name" placeholder="Customer Name">
								<input hidden id="count_name" value="1">
							</div>
							<div class="col-md-2">
								<input type="text" class="form-control" name="p_name" id="p_name" placeholder="Product Name">
							</div>
							<div class="col-md-2">
								<input type="text" class="form-control" name="category" id="category" placeholder="Box, pcs, Bundle" readonly>
							</div>
							<div class="col-md-1" d="display-price">
								<input type="text" class="form-control" name="price" id="cprice" placeholder="Price" readonly>
								<div hidden id="dprice"></div>
							</div>
							
						</div>
						<br>
						<div class="form-row">
							<div class="col-md-1">
								<input type="text" class="form-control" name="quantity" id="quantity" placeholder="Quantity" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
							</div>
							<div class="col-md-1">
								<input type="text" class="form-control" id="discount" placeholder="0.05%" disabled="disabled">
							</div>
							<div class="col-md-2">
								<input type="text" class="form-control" name="subtotal" id="total" placeholder="Subtotal" readonly>
								<input type="hidden" id="countMe" value="0" readonly>
							</div>
							<div class="col-md-2">
								<button class="btn btn-success" id="add-to-cart" disabled="disabled">Add to Cart</button>
							</div>
						</div>
					</div>
				</div>
		';

		echo $output;
	}

	public function getProduct() {

		if(isset($_GET['term'])) {

			$p = $_GET['term'];

			$data = $this->customer->autoDisplay($p);

			$res = array();

			foreach ($data as $key) {
				$res[] = $key->productname;
			}
			echo json_encode($res);

		}
	}

	public function getWholePrize() {
			$pname = $this->input->post('pname');
			$id = $this->customer->getItemID($pname);
			$data = $this->customer->productWholePrize($id['id']);

			if(count($data) > 0) {
				echo $data['amount'];
			} else {
				echo '0';
			}
		
	}

	public function getRetailPrize() {
			$pname = $this->input->post('pname');
			$id = $this->customer->getItemID($pname);
			$data = $this->customer->productRetailPrize($id['id']);

			if(count($data) > 0) {
				echo $data['amount'];
			} else {
				echo '0';
			}
		
	}
}
