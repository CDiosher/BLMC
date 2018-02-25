<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Web_hooks {
    
    private $_ci = null;
    // This array contains folders that must not be regarded as page views.
    private $_blacklist = array ('assets');    
    
    public function __construct()
    {
        // We need an instance of CI as we will be using some CI classes    
        $this->_ci =& get_instance();
    }

    public function log_activity() 
    {
        $this->_ci->load->model('admin/M_get_session', 'get_session');
        $getSession_id = $this->_ci->get_session->get_session_id();
        $session_id = null;
        foreach ($getSession_id as $key) {
            $session_id = $key->id;
        }

        // Start off with the session stuff we know
        $data = array();        
        $data['page'] = current_url();
        $data['ip_address'] = $this->_ci->input->ip_address();
        $data['user_agent'] = $this->_ci->agent->agent_string();      
        $data['request_method'] = $this->_ci->input->server('REQUEST_METHOD');
        $data['request_params'] = serialize($this->_ci->input->get_post(NULL, TRUE));        
        $data['uri_string'] = $this->_ci->uri->uri_string();
        $data['date_time'] = date('Y-m-d h:i:s');
        $data['session_id'] = $session_id;

        if ($this->verify_activity($session_id)) 
        {        
            // And write it to the database        
            $this->_ci->db->insert('ci_web_hooks', $data);
        }
    }

    public function verify_activity($session_id)
    {
        $this->_ci->load->model('admin/M_get_session', 'get_session');
        $uri = $this->_ci->uri->uri_string();
        $getWeb_hooks = $this->_ci->get_session->get_web_hooks($session_id,$uri);
        if(count($getWeb_hooks) > 0) {
            return FALSE;
        } else {
            return TRUE;
        }

    }
}
