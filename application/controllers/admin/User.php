<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('admin/M_user', 'user');
		if(!$this->session->userdata('logged_in')) redirect(base_url());
		if($this->session->userdata('role') == 1 || $this->session->userdata('role') == 2 ) {
		
		} else {

			redirect('customer');

		}
	}

	public function index() {
		$this->form_validation->set_rules('first', 'First Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('last', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|callback_checkEmail');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length[7]|matches[cpass]');
		$this->form_validation->set_rules('cpass', 'Confirm Password', 'trim|required|xss_clean|min_length[7]');
		$this->form_validation->set_rules('role', 'Role', 'trim|xss_clean|required');

		if($this->form_validation->run()) {

			$password = $this->input->post('password');
			$key = $this->config->item('encryption_key');
			$salt3 = '!@#GH^%)-:HDF%';
    		$salt1 = hash('sha512', $key . $password  . $salt3);
    		$salt2 = hash('sha512', $password . $key . $salt3);
    		$hashed_password = hash('sha512', $salt1 . $password . $salt2 . $salt3);

			$data['username'] = $this->input->post('username');
			$data['first_name'] = $this->input->post('first');
			$data['last_name'] = $this->input->post('last');
			$data['email'] = $this->input->post('email');
			$data['role'] = $this->input->post('role');
			$data['activated'] = 1;
			$data['password'] = $hashed_password;
			$data['created_at'] = date('Y-m-d H:i:s');

			//insert data
			if($this->user->insert_users($data)) {

	        	$this->session->set_flashdata('message','<div  id="error-msg" class="alert alert-success alert-dismissible fade in text-center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Successfully Created!.</div>');

	            redirect('user-list');
			}

		}
		$data['sitename'] = 'Admin Dashboard';
		$data['content'] = 'admin/pages/Dashboard/home';
		$this->parser->parse('admin/template/template',$data);
	}

	public function myProfile() {
		$uname = $this->session->userdata('username');
		$_uname = $this->uri->segment(2);

		if($uname != $_uname) {
			redirect('profile/'.$uname);
		} else {
			$data['sitename'] = 'Dashboard';
			$data['content'] = 'admin/pages/user/user';
			$this->parser->parse('admin/template/template',$data);
		}
	}

	public function edit() {
		$this->form_validation->set_rules('first', 'First Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('last', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length[7]|matches[cpass]');
		$this->form_validation->set_rules('cpass', 'Confirm Password', 'trim|required|xss_clean|min_length[7]');

		if($this->form_validation->run()) {

			$password = $this->input->post('password');
			$key = $this->config->item('encryption_key');
			$salt3 = '!@#GH^%)-:HDF%';
    		$salt1 = hash('sha512', $key . $password  . $salt3);
    		$salt2 = hash('sha512', $password . $key . $salt3);
    		$hashed_password = hash('sha512', $salt1 . $password . $salt2 . $salt3);

    		$id = $this->session->userdata('userid');
    		$data['first_name'] = $this->input->post('first');
			$data['last_name'] = $this->input->post('last');
			$data['username'] = $this->input->post('username');
			$data['email'] = $this->input->post('email');
			$data['reset_code'] = $this->generatePassword();
			$data['reset_date'] = date('Y-m-d H:i:s');
			$data['password'] = $hashed_password;
			$data['updated_at'] = date('Y-m-d H:i:s');

			$uname = $this->session->userdata('username');
			
			//insert data
			if($this->user->update_myaccount($data,$id)) {

	        	$this->session->set_flashdata('msg', '<div class="alert alert-success text-center alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Successfully Update</div>');
	        	
	        	redirect('profile/'.$uname);
			}

		}
		$data['sitename'] = 'Dashboard';
		$data['content'] = 'admin/pages/user/user';
		$this->parser->parse('admin/template/template',$data);
	}

	public function user_list() {
		$data['list'] = $this->user->get_all_user();
		$data['sitename'] = 'Admin Dashboard';
		$data['content'] = 'admin/pages/user/list';
		$this->parser->parse('admin/template/template',$data);
	}

	//check if email is exist
	public function checkEmail($email) {
        $result = $this->user->checkEmail($email, $this->input->post('id'));
        if (count($result)) {
            $this->form_validation->set_message('checkEmail', 'Username not available.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

	//Activate Account
	public function activate() {
		$id = $this->uri->segment(2);
		$user = $this->user->getId($id);
        if (count($user) > 0) {
            if ($this->user->userActivate($id)) {
                
                $this->session->set_flashdata('message', '<div  id="error-msg" class="alert alert-success text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>User are now active.</strong></div>');
                redirect('user-list');
            }
        }
	}
	//Deactivate Account
	public function deactivate() {
		$id = $this->uri->segment(2);
        $user = $this->user->getId($id);
        if (count($user) > 0) {
            if ($this->user->userDeactivate($id)) {
                
                $this->session->set_flashdata('message', '<div id="error-msg" class="alert alert-danger text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>User are now deactivate.</strong></div>');
                redirect('user-list');
            }
        }
    }

    public function generatePassword($length = 15) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}
}
