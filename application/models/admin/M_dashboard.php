<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_dashboard extends CI_Model {

	function __construct() { 

	// Call the Model constructor
	parent::__construct();
	}

	public function sales_daily() {
		$this->db->select('date, SUM(subtotal) as sales');
		$this->db->distinct();
		$this->db->where('date > DATE_SUB(NOW(), INTERVAL 7 DAY )');
		$this->db->group_by('date');
		$res = $this->db->get('transaction');
    	return $res->result();
	}

	//get month
	public function get_month($year) {
		$this->db->select('month');
		$this->db->distinct();
		$this->db->where('annual', $year);
		$res = $this->db->get('ci_transaction');
		return $res->result();
	}

	//get year
	public function get_annual($year) {
		$data = array();
		$this->db->select('annual, SUM(subtotal) as sales');
		$this->db->distinct();
		$this->db->where('annual', $year);
		$res = $this->db->get('ci_transaction');
		if($res->num_rows() > 0){
            $data = $res->row_array();
        }
        $res->free_result();
        return $data;
	}

	//get the total sum price per month
	public function summary_sales_report($smonth) {
		$this->db->select_sum('subtotal');
		$this->db->where('month',$smonth);
		$res = $this->db->get('ci_transaction');
    	return $res->result();
	}
}