<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends Admin_Controller {
    function __construct() {
        parent::__construct();

        $this->image_fields = array('settings_favicon','settings_logo', 'settings_footer_logo');        
    }  
    public function index(){    
        redirect('admin/settings/form/edit');  
    }
    public function form($form_choice = "",$id="")
    {
        if($_POST){
            if($this->user_role == 1){
                $content = array(
                    'settings_site_title' => $this->input->post('settings_site_title',TRUE),
                    'welcome_email_subject' => $this->input->post('welcome_email_subject',TRUE),
                    'welcome_email_body' => $this->input->post('welcome_email_body',TRUE),
                    'settings_email' => $this->input->post('settings_email',TRUE),
                    'settings_email_to' => $this->input->post('settings_email_to',TRUE),
                    'settings_email_from' => $this->input->post('settings_email_from',TRUE),
                    'settings_status' => 'enable',
                );
            }
            else{
                $content = array(
                    'settings_site_title' => $this->input->post('settings_site_title',TRUE),
                    'settings_email' => $this->input->post('settings_email',TRUE),
                    'settings_email_from' => $this->input->post('settings_email_from',TRUE),
                    'settings_email_to' => $this->input->post('settings_email_to',TRUE),
                    'settings_favicon' => $this->input->post('settings_favicon',TRUE),
                    'settings_address' => $this->input->post('settings_address',TRUE),
                    'settings_logo' => $this->input->post('settings_logo',TRUE),
                    'settings_footer_logo' => $this->input->post('settings_footer_logo',TRUE),
                    'settings_phone' => $this->input->post('settings_phone',TRUE),
                    'settings_sidebar_text' => $this->input->post('settings_sidebar_text',TRUE),
                    'settings_status' => 'enable',
                );                
            }

            foreach($this->image_fields as $image_feild){
                $from_gallery_name = 'from_gallery_'.$image_feild;
                if(!empty($this->input->post($from_gallery_name,TRUE))){
                    $image_path = explode('/',str_replace(base_url(),'', $this->input->post($from_gallery_name,TRUE)));


                    $image_path_raw = str_replace(base_url(),'', $this->input->post($from_gallery_name,TRUE));

                    if($this->uri->segment(2) == $image_path[1]){
                         $content[$image_feild] = end($image_path);
                    }
                    else{
                        copy('./'.$image_path_raw,'./uploads/'.$this->uri->segment(2).'/'.end($image_path));
                        $content[$image_feild] = end($image_path);
                    }
                }else{
                    if($_FILES[$image_feild]['size'] > 0) {
                        $_FILES[$image_feild]['name'] = $_FILES[$image_feild]['size'].'-'.$_FILES[$image_feild]['name'];
                        $image = single_image_upload($_FILES[$image_feild], './uploads/'.$this->uri->segment(2));
                        if(is_array($image)) {
                            $this->session->set_flashdata('error', $image);
                        } else{
                            $content[$image_feild] = $image;
                        }
                    }
                }
            }  

            if($form_choice == 'edit'){
                $data['table'] = $this->uri->segment(2); 

                if(!empty($this->general->get($data))){
                    $this->general->update($data,$content);        
                }
                else{
                    $data = array();
                    $data['table'] = $this->uri->segment(2); 
                    $this->general->insert($data,$content);    
                }
                $this->session->set_flashdata('success', 'Updated Successfully.');
            }

            redirect('admin/'.$this->uri->segment(2)); 
              
        }else{
            $content['record']  = array();
            $view = $this->uri->segment(2).'/form';
            if($form_choice == 'edit'){
                $data['table'] = $this->uri->segment(2); 
                $data['output_type'] = 'row';    
                $content['record']  = $this->general->get($data);
            }            
            $content['main_content'] = $view;           
            $this->load->view('admin/inc/view',$content); 
        } 
    }
}

