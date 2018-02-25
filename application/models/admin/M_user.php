<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_user extends CI_Model {

	function __construct() { 

	// Call the Model constructor
	parent::__construct();
	}

    /*insert new user*/
	public function insert_users($data) {
        return $this->db->insert('ci_users', $data);
    }

    /*update my account*/
    public function update_myaccount($data,$id) {
        $where = array('userid' => $id);
        $this->db->where($where);
        return $this->db->update('ci_users', $data);
    }

    /*get all user*/
    public function get_all_user() {
        $this->db->select('u.*, r.*');
        $this->db->from('ci_users u');
        $this->db->join('ci_user_role r', 'u.role = r.id', 'LEFT');
        $this->db->order_by('userid', 'DESC');
        $res = $this->db->get();
        return $res->result();
    }

    /*get role*/
	public function get_role() {
		$query = $this->db->get('ci_user_role');
		return $query->result();
	}

	//check if email availability
    public function checkEmail($email, $id = null) {
        $data = array();
        if ($id != null) {
            $q = $this->db->get_where('ci_users', array('email' => $email, 'id !=' => $id), 1);
        } else {
            $q = $this->db->get_where('ci_users', array('email' => $email), 1);
        }
        if ($q->num_rows() > 0) {
            $data = $q->row_array();
        }
        $q->free_result();
        return $data;
    }

    public function getId($id){         
        $data = array();
        $this->db->limit(1);
        $this->db->where('userid', $id);
        $q = $this->db->get('ci_users');
        if($q->num_rows() > 0){
            $data = $q->row_array();
        }
        $q->free_result();
        return $data;
    }

    //activate user
    public function userActivate($id) {
        
        $data = array('activated' => 1);
        $this->db->set($data);
        $this->db->where('userid',$id);
        return $this->db->update('ci_users');
    }

    //deactivate user
    public function userDeactivate($id) {
        
        $data = array('activated' => 0);
        $this->db->set($data);
        $this->db->where('userid',$id);
        return $this->db->update('ci_users');
    }

    public function check_credential($username, $password) {

        $key = $this->config->item('encryption_key');
        $salt3 = '!@#GH^%)-:HDF%';
        $salt1 = hash('sha512', $key . $password  . $salt3);
        $salt2 = hash('sha512', $password . $key . $salt3);
        $hashed_password = hash('sha512', $salt1 . $password . $salt2 . $salt3);
        $password = $hashed_password;

        $data = array();
        $detail = array('username' => $username, 'password' => $password, 'activated' => 1);
        $this->db->where($detail);
        $this->db->limit(1);
        $q = $this->db->get('ci_users');
  
        if($q->num_rows() > 0){
            $data = $q->row_array();
        }
        $q->free_result();
        return $data;
    }
}