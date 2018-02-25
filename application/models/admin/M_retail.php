<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_retail extends CI_Model {

	function __construct() { 

	// Call the Model constructor
	parent::__construct();

	}

	/**
	* Insert Data
	*/
	public function create($data) {

		return $this->db->insert('retail',$data);

	}

	/**
	*  Update Data
	* @param Boolean $id
	* @return True
	*/
	public function updateRetail($data,$id) {
		$this->db->where('id',$id);
		return $this->db->update('retail',$data);
	}

	/**
	*
	* Get All Data
	*/
	public function getRetail() {
		$this->db->select('r.*, i.*');
		$this->db->from('retail r');
		$this->db->join('items i','i.id = r.product_id','LEFT');
		$res = $this->db->get();
		return $res->result();
	}

	public function countItem($product_id) {
		$this->db->where('product_id',$product_id);
		return $this->db->count_all_results('purchase_order');
	}

	/**
    * Remove Item in database
    * @return True
    */
    public function remove($id) {
        $this->db->where('id',$id);
        return $this->db->delete('retail');
    }

    /**
    * Get data based on 
    * @param boolean numeric $id
    * @return true
    */
    public function getRetailById($id) {
    	$data = array();
    	$this->db->select('r.product_id, r.quantity, r.amount, r.unit_description');
    	$this->db->from('retail r');
    	$this->db->join('items s','s.id = r.product_id','LEFT');
    	$this->db->where('r.id',$id);
    	$res = $this->db->get();
    	if ($res->num_rows() > 0) {
    		$data = $res->row_array();
    	}
    	$res->free_result();
    	return $data;
    }

}