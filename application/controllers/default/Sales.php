<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('default/M_sales','sales');
		if(!$this->session->userdata('logged_in')) redirect(base_url());
	}

	public function index() {
		
		$data['datenow'] = $this->sales->get_sales_datenow();
		$data['one'] = $this->sales->get_sales_one();
		$data['two'] = $this->sales->get_sales_two();
		$data['three'] = $this->sales->get_sales_three();
		$data['four'] = $this->sales->get_sales_four();
		$data['five'] = $this->sales->get_sales_five();
		$data['six'] = $this->sales->get_sales_six();
		$data['seven'] = $this->sales->get_sales_seven();
		$data['eight'] = $this->sales->get_sales_eight();
		$data['nine'] = $this->sales->get_sales_nine();
		$data['ten'] = $this->sales->get_sales_ten();
		$data['eleven'] = $this->sales->get_sales_eleven();
		$data['sitename'] = 'Cashier Dashboard';
		$data['content'] = 'admin/pages/sales/sales';
		$this->parser->parse('admin/template/template',$data);

	}
}
