<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Admin_Controller {
    function __construct() {
        parent::__construct();
        $this->image_fields = array('user_image');        
    }  
    public function index(){    
        $content['show_fields'] = array('user_name','user_email','user_phone','user_image');
        $content['image_fields'] = $this->image_fields;
        $data['table'] = $this->uri->segment(2);
        if($this->user_role == 3){
            $data['where'] = array('user_role' => '4','tenant_id' => $this->tenant_id);
        }
        else if($this->user_role == 2){            
            $data['where'] = array('user_role !=' => '1','tenant_id' => $this->tenant_id);
        }
        else if($this->user_role == 1){              
            $data['where'] = array('user_role !=' => '1','tenant_id' => $this->tenant_id);
        }
        $data['output_type'] = 'result';          
        $content['records']  = $this->general->get($data);
        $content['main_content'] = $this->uri->segment(2).'/list';           
        $this->load->view('admin/inc/view',$content);   
    }

    public function form($form_choice = "",$id="")
    {
        if($_POST){
            $content = array(
                'user_name' => $this->input->post('user_name',TRUE),
                'user_email' => $this->input->post('user_email',TRUE),
                'user_phone' => $this->input->post('user_phone',TRUE),
                'user_password' => $this->input->post('user_password',TRUE),
                'user_role' => $this->input->post('user_role',TRUE),
            );

            if($this->user_role == 3){
                $content['user_role'] = 4;
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
                $where_id = $this->uri->segment(2).'_id';
                $data['where'] = array($where_id => $id); 
                $data['table'] = $this->uri->segment(2); 
                $this->general->update($data,$content);        
                $this->session->set_flashdata('success', 'Updated Successfully.');
                redirect('admin/'.$this->uri->segment(2)); 
            }
            else if($form_choice == 'add'|| $form_choice == 'duplicate'){
                $data['table'] = $this->uri->segment(2); 
                $this->general->insert($data,$content);        
                $this->session->set_flashdata('success', 'Added Successfully.');
                if($id == 'back-to-list'){
                    redirect('admin/'.$this->uri->segment(2));
                }
                else{
                    redirect('admin/'.$this->uri->segment(2).'/form/add');
                }
            }  
        }else{
            $content['record'] = array();
            $view = $this->uri->segment(2).'/form';
            if($form_choice == 'edit' || $form_choice == 'duplicate'){
                $where_id = $this->uri->segment(2).'_id';
                $data['where'] = array($where_id => $id); 
                $data['table'] = $this->uri->segment(2); 
                $data['output_type'] = 'row';    
                $content['record']  = $this->general->get($data);
            }            
            $content['main_content'] = $view;           
            $this->load->view('admin/inc/view',$content); 
        } 
    }

    public function view($id)
    {
        $content['image_fields'] = $this->image_fields;
        $content['hidden_fields'] = array('user_password','user_rest_token','user_updated_by');
        $where_id = $this->uri->segment(2).'_id';
        $data['where'] = array($where_id => $id); 
        $data['table'] = $this->uri->segment(2); 
        $data['output_type'] = 'row';    
        $content['record']  = $this->general->get($data);
        $content['main_content'] = $this->uri->segment(2).'/view';           
        $this->load->view('admin/inc/view',$content); 
    }
    
    public function delete($id)
    {
        $where_id = $this->uri->segment(2).'_id';
        $where_status = $this->uri->segment(2).'_status';
        $data['where'] = array($where_id => $id); 
        $data['table'] = $this->uri->segment(2); 
        $data['output_type'] = 'row';    
        $content['record']  = $this->general->get($data);

        $content = array(
            $where_status => 'disable',
        );    
        $data['where'] = array($where_id => $id); 
        $data['table'] = $this->uri->segment(2); 
        $this->general->update($data,$content);        
        $this->session->set_flashdata('success', 'Deleted Successfully.');
        redirect('admin/'.$this->uri->segment(2));
    } 


    public function send_password($user_id = "")
    {   
        if (!empty($user_id)){        
          $data['where'] = array('user_id' => $user_id);      
          $data['table'] = 'user'; 
          $data['output_type'] = 'row';
          $result = $this->general->get($data);
          if($result){   
            $today = date("Ymd");
            $rand = strtoupper(substr(uniqid(sha1(time())),0,120));
            $user_rest_token = $today . $rand;  
            $content['user_rest_token'] = $user_rest_token;
            $data['where'] = array('user_id' => $user_id);     
            $data['table'] = 'user';    
            $this->general->update($data,$content);        
            $section['subject'] = 'Password Reset Link';
            $section['body'] = '<strong>Reset Link :</strong> <a href="'.base_url('admin/reset-password/').$user_rest_token.'">Click Here And You Will Be Redirected To The Website.</a>';
            $body = $this->load->view('admin/email/template',$section, TRUE);
            send_email($result->user_email,$this->site_title.'Welcome | Please set your password',$body);
            $this->session->set_flashdata('success', 'Password change email has sent to user.');
            redirect('admin/user');                            
          }
          redirect('admin/user');    
        }
    }

    public function check_unique($str){
        if(!empty($str)){
            $data['table'] = 'user';
            $data['where'] = array('user_email'=>$str);
            $result = $this->general->get($data);

            if(!empty($result)){
                echo 'false';
            }
            else if(empty($result)){
                echo "true";
            }
        }
    }    
}

