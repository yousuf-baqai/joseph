<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends Admin_Controller {
	function __construct() {
		parent::__construct();		
	}  

	public function index(){   
    $user_id = $this->session->userdata('user_id');
    if($_POST){
      $this->form_validation->set_rules('user_name', 'Full Name', 'trim|required|alpha_numeric_spaces|min_length[3]|max_length[25]');
      $this->form_validation->set_rules('user_email', 'Email address', 'trim|required|valid_email');
      $this->form_validation->set_rules('user_phone', 'Phone Number', 'trim|required|exact_length[14]');
      $this->form_validation->set_rules('user_address', 'Address', 'trim|min_length[5]|max_length[300]');
      $this->form_validation->set_rules('new_password', 'New Password', 'trim|min_length[8]|max_length[25]');
      $this->form_validation->set_rules('cnf_password', 'Confirm Password', 'trim|matches[new_password]');
      if (!$this->form_validation->run() == FALSE){
        $content = array(
          'user_name' => $this->input->post('user_name',TRUE),
          'user_email' => $this->input->post('user_email',TRUE),
          'user_phone' => $this->input->post('user_phone',TRUE),
          'user_address' => $this->input->post('user_address',TRUE),
          'user_image' => $this->input->post('user_image',TRUE),
          'user_status' => 'enable',
          'user_updated_by' => '1'
        );  
        if($this->input->post('cnf_password',TRUE)){
           $content['user_password'] = $this->encryption->encrypt($this->input->post('cnf_password'));
        }  
        if($_FILES['user_image']['size'] > 0){
          $image = single_image_upload($_FILES['user_image'],'./uploads/user');
          if(is_array($image)){            
            $this->session->set_flashdata('error', $image);
          }else{
            $content['user_image'] = $image;
          }
        }  
        $data['where'] = array('user_id' => $user_id);		
        $data['table'] = 'user';	
        $this->general->update($data,$content);        
        $this->session->set_flashdata('success', 'Updated Successfully.');
        redirect('admin/profile/index');
      }
      else{
        $data['where'] = array('user_id' => $user_id);		
        $data['table'] = 'user';	
        $data['output_type'] = 'row';	
        $content['title'] = 'Admin Profile';	
        $content['record']  = $this->general->get($data);
        $content['main_content'] = 'profile/edit';			
        $this->load->view('admin/inc/view',$content);   
     }
    }
    else{        
        $data['where'] = array('user_id' => $user_id);		
        $data['table'] = 'user';	
        $data['output_type'] = 'row';	
        $content['title'] = 'Admin Profile';	
        $content['record']  = $this->general->get($data);
        $content['main_content'] = 'profile/edit';			
        $this->load->view('admin/inc/view',$content);   
    }
  }
	
}
