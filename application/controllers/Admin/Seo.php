<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seo extends Admin_Controller {
    function __construct() {
        parent::__construct();
        $this->image_fields = array();        
    }  
    public function index(){    
        $content['show_fields'] = array('seo_page_name','seo_page_link','seo_meta_index');
        $content['image_fields'] = $this->image_fields;
        $data['table'] = $this->uri->segment(2);        
        $data['output_type'] = 'result';          
        $content['records']  = $this->general->get($data);
        $content['main_content'] = $this->uri->segment(2).'/list';           
        $this->load->view('admin/inc/view',$content);   
    }

    public function form($form_choice = "",$id="")
    {
        if($_POST){
            $content = array(
                'seo_page_name' => $this->input->post('seo_page_name',TRUE),
                'seo_page_link' => $this->input->post('seo_page_link',TRUE),
                'seo_page_title' => $this->input->post('seo_page_title',TRUE),
                'seo_meta_title' => $this->input->post('seo_meta_title',TRUE),
                'seo_meta_description' => $this->input->post('seo_meta_description',TRUE),
                'seo_meta_keyword' => $this->input->post('seo_meta_keyword',TRUE),
                'seo_meta_canonical' => $this->input->post('seo_meta_canonical',TRUE),
                'seo_meta_index' => $this->input->post('seo_meta_index',TRUE),
                'seo_head_script' => $this->input->post('seo_head_script'),
                'seo_footer_script' => $this->input->post('seo_footer_script'),
            );

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

