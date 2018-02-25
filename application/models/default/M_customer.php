<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_customer extends CI_Model {

	function __construct() { 

	// Call the Model constructor
	parent::__construct();
	}

	public function insert_transaction($push) {
		return $this->db->insert_batch('ci_transaction', $push);
	}

	public function autoDisplay($p) {
		$this->db->like('productname',$p);
		$res = $this->db->get('items');
		return $res->result();
	}

	public function productWholePrize($id) {
		$data = array();
		$this->db->where('product_id',$id);
		$res = $this->db->get('purchase_order');
		if($res->num_rows() > 0){
			$data = $res->row_array();
		}
		$res->free_result();
		return $data;
	}

	public function getItemID($pname) {
		$data = array();
		$this->db->where('productname',$pname);
		$res = $this->db->get('items');
		if($res->num_rows() > 0){
			$data = $res->row_array();
		}
		$res->free_result();
		return $data;
	}

	public function productRetailPrize($id) {
		$data = array();
		$where = array('product_id' => $id);
		$this->db->where($where);
		$res = $this->db->get('retail');
		if($res->num_rows() > 0){
			$data = $res->row_array();
		}
		$res->free_result();
		return $data;
	}
}