<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front_Controller extends CI_Controller {
	function __construct() {
		if(STEPS == 0){
			header('Location: setup/step_1.php');
			exit;
		}

		parent::__construct();	 
		

		$data = array();
		$data['table'] = 'settings';
		$data['output_type'] = 'row';
		$data['where'] = array('settings_id' => 1);
		$website_settings = $this->general->get($data);
		
		$this->header_logo = $website_settings->settings_logo;
		$this->footer_logo = $website_settings->settings_footer_logo;
		$this->favicon = $website_settings->settings_favicon;		
		$this->site_title = $website_settings->settings_site_title;	
		$this->settings_email_to = $website_settings->settings_email_to;	
		
		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

		$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$data['table'] = 'seo';
		$data['where'] = array('seo_page_link' => $actual_link); 
		$this->seo = $content['records']  = $this->general->get($data);

		$data = array();
		$data['table'] = 'header_navbar';
        $data['order_by_col'] = 'header_navbar_order_id';
		$this->header_navbar = $this->general->get($data);			
		$this->load->library('form_validation');
		$this->load->library('encryption');

	


	}

}
