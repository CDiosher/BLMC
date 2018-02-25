<?php defined('BASEPATH') OR exit('No direct script access allowed');

class CustomerList extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('default/M_clist','clist');
		if(!$this->session->userdata('logged_in')) redirect(base_url());
	}

	public function index() {
		$data['cutomerList'] = $this->clist->getAllCustomer();
		$data['sitename'] = 'Cashier Dashboard';
		$data['content'] = 'admin/pages/customer/clist';
		$this->parser->parse('admin/template/template',$data);
	}
}
