<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_product extends CI_Model {

	function __construct() { 

	// Call the Model constructor
	parent::__construct();

	}

	/**
	* Insert Data
	*/
	public function createProduct($data) {

		return $this->db->insert('items',$data);

	}

	/*
	* Fetch all Data
	*/
	public function getAllproducts() {

		$res = $this->db->get('items');

		return $res->result();
	}

	/**
	* Update Data
	* @param Int Id
	* @return True
	*/
	public function updateThis($data,$id) {

		$this->db->where('id',$id);
		return $this->db->update('items',$data);
	}

}