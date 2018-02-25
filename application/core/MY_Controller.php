<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Singapore');
        $this->load->helper('cs_dropdown');
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->config('validations');
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
        require(APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');
    }

    /**
    *
    * Custom validation
    * Call Config Validation Rules
    * @param  charater 
    */
    public function require_validation($rules = null) {

        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

        if (is_array($rules)) {

            $this->form_validation->set_rules($rules);
            
        }

        $this->_validate_fields = TRUE;
    }

    public function genCode() {

        $code = random_string('alnum', 200);

        return $code;
    }

    /*Pagination*/
	public function pagination($pagination_config) {
        /* PAGINATION SETTING */
        $config['base_url'] = $pagination_config['base_url'];
        $config['total_rows'] = $pagination_config['count'];
        $config['per_page'] = $pagination_config['perpage'];
        $config['uri_segment'] = 3;
        $config['num_links'] = 3;
        //first and last links
        $config['first_link'] = '&laquo; First';
        $config['last_link'] = 'Last &raquo;';
        //first link tags
        $config['first_tag_open'] = '<li class="page-link">';
        $config['first_tag_close'] = '</li>';
        //last link tags
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '<li>';
        //next link tags
        $config['next_link'] = 'Next &raquo;';
        $config['next_tag_open'] = '<li class="page-link">';
        $config['next_tag_close'] = '</li>';
        //previous link tags
        $config['prev_link'] = '&laquo; Previous';
        $config['prev_tag_open'] = '<li class="page-link">';
        $config['prev_tag_close'] = '</li>';
        //current link tags
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        //links tags
        $config['num_tag_open'] = '<li class="page-link">';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
    }

}