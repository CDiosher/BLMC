<?php

	$host = $_SERVER['SERVER_NAME'];
	if($host == 'localhost') {
		echo '<script src="'.base_url("Assets").'/js/function-local.js"></script>';
		if($this->uri->segment(1) == 'product-list'){
			
			$this->load->view('admin/modal/product-list');
		} elseif($this->uri->segment(1) == 'dashboard') {
			echo '<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script><script src="'.base_url("Assets/").'js/sales-local.js"></script>';
		} elseif($this->uri->segment(1) == 'purchase-order') {
			echo '<script src="'.base_url("Assets/").'js/purchase-order-local.js"></script>';
		} elseif($this->uri->segment(1) == 'purchase-list') {
			echo '<div id="dateScript"></div>
			<script src="'.base_url("Assets/").'js/purchase-list-local.js"></script>';
		} elseif($this->uri->segment(2) == 'retail') {
			echo '<script src="'.base_url("Assets/").'js/retail-local.js"></script>';
		} elseif($this->uri->segment(1) == 'customer') {
			echo '<script src="'.base_url("Assets/").'js/autocomplete-local.js"></script>';
			$this->load->view('admin/ajax/customer');
		}
	} else {
		echo '<script src="'.base_url("Assets").'/js/function.js"></script>';
		if($this->uri->segment(1) == 'product-list'){
			
			$this->load->view('admin/modal/product-list');
		} elseif($this->uri->segment(1) == 'dashboard') {
			echo '<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script><script src="'.base_url("Assets/").'js/sales.js"></script>';
		} elseif($this->uri->segment(1) == 'purchase-order') {
			echo '<script src="'.base_url("Assets/").'js/purchase-order.js"></script>';
		} elseif($this->uri->segment(1) == 'purchase-list') {
			echo '<div id="dateScript"></div>
			<script src="'.base_url("Assets/").'js/purchase-list.js"></script>';
		} elseif($this->uri->segment(2) == 'retail') {
			echo '<script src="'.base_url("Assets/").'js/retail.js"></script>';
		} elseif($this->uri->segment(1) == 'customer') {
			echo '<script src="'.base_url("Assets/").'js/autocomplete.js"></script>';
			$this->load->view('admin/ajax/customer');
		}
		
	}


?>