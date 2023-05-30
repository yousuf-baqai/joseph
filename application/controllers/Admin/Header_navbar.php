<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Header_navbar extends Admin_Controller {
    function __construct() {
        parent::__construct();
        $this->image_fields = array();        
    }  
    public function index(){    
        $content['show_fields'] = array('header_navbar_text','header_navbar_link');
        $content['image_fields'] = $this->image_fields;
        $data['table'] = $this->uri->segment(2); 
        $data['output_type'] = 'result';          
        $content['records']  = $this->general->get($data);
        $content['main_content'] = $this->uri->segment(2).'/list';           
        $this->load->view('admin/inc/view',$content);   
    }

    public function sort(){    
        if($_POST){
            if(!empty($this->input->post('list'))){
                $data = array();
                $i = 0;
                $data['table'] = 'header_navbar';
                foreach($this->input->post('list') as $header_navbar_id => $header_navbar_parent_id){
                    $data['where'] = array('header_navbar_id' => $header_navbar_id);
                    $content = array(
                        'header_navbar_parent_id' => $header_navbar_parent_id,
                        'header_navbar_order_id' => $i,
                    );    
                    $i++;
                    
                    $this->general->update($data,$content);  
                }
                echo "success";
            }
        }
        else{
            $data['table'] = $this->uri->segment(2);    
            $data['order_by_col'] = 'header_navbar_order_id';   
            $content['records']  = $this->general->get($data);
            $content['main_content'] = $this->uri->segment(2).'/sort';           
            $this->load->view('admin/inc/view',$content);
        }
    }


    public function form($form_choice = "",$id="")
    {
        if($_POST){
            $content = array(
                'header_navbar_text' => $this->input->post('header_navbar_text',TRUE),
                'header_navbar_link' => $this->input->post('header_navbar_link',TRUE),    
                'header_navbar_column_1' => $this->input->post('header_navbar_column_1',TRUE),  
                'header_navbar_column_2' => $this->input->post('header_navbar_column_2',TRUE),  
            );

            foreach($this->image_fields as $image_feild){
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
        $content['hidden_fields'] = array('header_navbar_order_id','header_navbar_parent_id');
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


}

