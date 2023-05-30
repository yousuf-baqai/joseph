<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editfile extends Admin_Controller {

	function __construct() {
        parent::__construct();		
    }
	
	public function edit($page='')
	{     
		if($_POST){
			$str = $this->input->post('filecontent');
	        $fname = $this->input->post('filename');
	        $pagename = $this->input->post('pagename');
	        $out = fopen($fname, "w");
	        if(fwrite($out, $str)){          
	          fclose($out);                    
	          $this->session->set_flashdata('success', 'Updated Successfully.');  
	          redirect('admin/editfile/edit/'.$page);    
	       }
		}
		else{
			$content['page'] = $page;
			$content['title'] = 'Edit file';  
	        $content['main_content'] = 'editfile/edit';          
	        $this->load->view('admin/inc/view',$content);
	    }
	            			
	}
}



