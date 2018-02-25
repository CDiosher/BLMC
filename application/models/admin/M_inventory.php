<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_inventory extends CI_Model {

	function __construct() { 

	// Call the Model constructor
	parent::__construct();
	}

	public function insertInventory($data) {
		return $this->db->insert('inventory',$data);
	}

	public function itemCount($id) {
		$data = array();
		$this->db->where('product_id',$id);
		$res = $this->db->get('inventory');
		if($res->num_rows() > 0){
			$data = $res->row_array();
		}
		$res->free_result();
		return $data;
	}

	public function updateInventory($id,$data) {
		$this->db->where('product_id',$id);
		return $this->db->update('inventory',$data);
	}

	public function inventWholeSale($id,$_sum) {
		$data = array('quantity' => $_sum);
		$this->db->where('product_id',$id);
		return $this->db->update('inventory',$data);
	}

	public function inventRetail($id,$_sum) {
		$data = array('quantity' => $_sum);
		$this->db->where('product_id',$id);
		return $this->db->update('retail',$data);
	}

	 /**
    * Get Item
    * @return True
    */
    public function getAllItem() {
    	$this->db->select('t.*, i.productname');
        $this->db->from('inventory t');
        $this->db->join('items i','i.id = t.product_id','LEFT');
        $res = $this->db->get();
        return $res->result();
    }

	public function updateQuantity($id) {
		$data = array();
		$this->db->where('product_id',$id);
		$res = $this->db->get('inventory');
		if($res->num_rows() > 0){
			$data = $res->row_array();
		}
		$res->free_result();
		return $data;
	}

	public function getData($id) {
		$data = array();
		$this->db->where('id',$id);
		$res = $this->db->get('inventory');
		if($res->num_rows() > 0){
			$data = $res->row_array();
		}
		$res->free_result();
		return $data;
	}
}