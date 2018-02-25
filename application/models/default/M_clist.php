<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_clist extends CI_Model {

	function __construct() { 

	// Call the Model constructor
	parent::__construct();
	}

	public function verifyName($c_name) {
		$where = array('full_name' => $c_name);
		$this->db->where($where);
		return $this->db->count_all_results('clist');
	}

	public function insertNewCustomer($data) {
		return $this->db->insert('clist',$data);
	}

	public function getAllCustomer() {
		$res = $this->db->get('clist');
		return $res->result();
	}
}