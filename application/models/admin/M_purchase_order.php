<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_purchase_order extends CI_Model {

	function __construct() { 

	// Call the Model constructor
	parent::__construct();

	}
	
    //insert history
	public function insert_product($data) {
        return $this->db->insert('purchase_order', $data);
    }

    public function updateProduct($data,$id) {
    	$this->db->where('id',$id);
    	return $this->db->update('purchase_order',$data);
    }

    /**
    * Get Item
    * @return True recieved NULL
    */
    public function getItem() {
        $this->db->select('p.*, i.*');
        $this->db->from('purchase_order p');
        $this->db->join('items i','i.id = p.product_id','LEFT');
    	$this->db->where('p.recieved IS NULL');
    	$res = $this->db->get();
    	return $res->result();
    }

    /**
    * Get Item
    * @return True
    */
    public function getRecievedItem() {
    	$this->db->select('p.*, i.productname, i.productcode');
        $this->db->from('purchase_order p');
        $this->db->join('items i','i.id = p.product_id','LEFT');
        $res = $this->db->get();
        return $res->result();
    }

    /**
    * Get Item
    * @param Int $id
    * @return True
    */
    public function fetchItem($id) {
        $data = array();
        $this->db->select('p.*, i.productname');
        $this->db->from('purchase_order p');
        $this->db->join('items i','i.id = p.product_id','LEFT');
        $this->db->where('p.id',$id);
        $res = $this->db->get();
        if ($res->num_rows() > 0) {
            $data = $res->row_array();
        }
        $res->free_result();
        return $data;
    }

    /**
    * Update Data Recieved
    * @return True
    */
    public function recieved($id) {
    	$data = array('recieved' => date('Y-m-d h:i:s'));
    	$this->db->where('id',$id);
    	return $this->db->update('purchase_order',$data);
    }

    /**
    * Remove Item in database
    * @return True
    */
    public function remove($id) {
        $this->db->where('id',$id);
        return $this->db->delete('purchase_order');
    }

    /**
    * Update Data Defectives
    * @return True
    */
    public function defective($id) {
    	$data = array('defective' => 1);
    	$this->db->where('id',$id);
    	return $this->db->update('purchase_order',$data);
    }

    /**
    * Update Data Publish in Market
    * @return True
    */
    public function active($id) {
        $data = array('inactive' => 1);
        $this->db->where('id',$id);
        return $this->db->update('purchase_order',$data);
    }

    /**
    * Update Data Publish in Market
    * @return True
    */
    public function notactive($id) {
        $data = array('inactive' => 0);
        $this->db->where('id',$id);
        return $this->db->update('purchase_order',$data);
    }
}