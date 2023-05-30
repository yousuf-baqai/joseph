<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Robots extends Admin_Controller {

	function __construct() {
        parent::__construct();		
    }

    public function index(){
    	if($_POST){
    		$file = fopen(ROOT_DIR.'robots.txt', 'w');
    		fwrite($file, $this->input->post('content'));
    		fclose($file);
			redirect('admin/robots');
    	}
    	else{
    		$content['main_content'] = 'file/robots';           
            $this->load->view('admin/inc/view',$content); 
    	}
    }

    public function create(){
    	$file = fopen(ROOT_DIR.'robots.txt', 'w');
		fwrite($file, '');
		fclose($file);
		redirect('admin/robots');
    }

    public function delete(){
    	unlink(ROOT_DIR.'robots.txt');
		redirect('admin/robots');
    }    
}



