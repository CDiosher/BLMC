<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_download extends CI_Model {

	function __construct() { 

	// Call the Model constructor
	parent::__construct();
	}

	public function get_data($start,$end) {
		$where = array('date >=' => $start, 'date <=' => $end);
		$this->db->where($where);
		$res = $this->db->get('ci_transaction');
		return $res->result();
	}
}