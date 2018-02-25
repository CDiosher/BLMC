<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('admin/M_user', 'user');
	}

	public function index() {

    	if($this->session->userdata('logged_in')) redirect('dashboard');
		// form validation
		$this->form_validation->set_rules("username", "Username", "trim|required|xss_clean");
		$this->form_validation->set_rules("password", "Password", "trim|required|xss_clean");
		
		if ($this->form_validation->run()) {

			// get form input
			$username = $this->input->post("username", TRUE);
        	$password = $this->input->post('password', TRUE);

			// check for user credentials
			$res = $this->user->check_credential($username, $password);
			if (count($res)) {

				if($res['activated'] != 0) {
					// set session
					$session = array(
						'first' => $res['first_name'],
						'last' => $res['last_name'],
						'username' => $res['username'],
						'userid' => $res['userid'],
						'email' => $res['email'],
						'role' => $res['role'],
						'logged_in' => TRUE
						);
					$this->session->set_userdata($session);
					if($this->session->userdata('role') == 1 || $this->session->userdata('role') == 2 ) {
						
						redirect('dashboard');

					} else {

						redirect('customer');

					}
				} else {

					$this->session->set_flashdata('error', '<div class="alert alert-danger text-center alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Your account is temporarily deactivated!</div>');
				}
			} else {
				$this->session->set_flashdata('error', '<div class="alert alert-danger text-center alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Wrong Username or Password!</div>');
				
			}
		}
		$this->load->view('admin/pages/login/login');
	}

    //logout function
    public function logout(){
		$sess = array('logged_in' => FALSE, 'username' => '', 'userid' => '', 'email' => '', 'role' => '');
		$this->session->unset_userdata($sess);
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
