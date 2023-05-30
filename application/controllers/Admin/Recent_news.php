<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recent_news extends Admin_Controller {
    function __construct() {
        parent::__construct();
        $this->image_fields = array('recent_news_image',); 
        $this->multi_image_fields = array();; 
        $this->orderable = true;  
        $this->show_fields = array('recent_news_slug','recent_news_image','recent_news_date','recent_news_heading','recent_news_author_name','recent_news_tag','recent_news_description','recent_news_button','recent_news_quote','recent_news_category',);
    }  
    public function index(){    
        $content['show_fields'] = $this->show_fields;
        $content['image_fields'] = $this->image_fields;
        $data['table'] = $this->uri->segment(2);

        if(isset($this->orderable) && $this->orderable == TRUE){
            $data['order_by'] = 'DESC';
            $data['order_by_col'] =  $this->uri->segment(2).'_sort_order';
        }

        $data['output_type'] = 'result';   
        $data['limit'] = 1;        
        $content['records']  = $this->general->get($data);

        $content['main_content'] = $this->uri->segment(2).'/list';           
        $this->load->view('admin/inc/view',$content);   
    }

    public function form($form_choice = "",$id="")
    {
        if($_POST){
            $content = array(
                'recent_news_slug' => $this->input->post('recent_news_slug',TRUE),
				'recent_news_image' => $this->input->post('recent_news_image',TRUE),
				'recent_news_date' => $this->input->post('recent_news_date',TRUE),
				'recent_news_heading' => $this->input->post('recent_news_heading',TRUE),
				'recent_news_author_name' => $this->input->post('recent_news_author_name',TRUE),
				'recent_news_tag' => $this->input->post('recent_news_tag',TRUE),
				'recent_news_description' => $this->input->post('recent_news_description',TRUE),
				'recent_news_button' => $this->input->post('recent_news_button',TRUE),
				'recent_news_quote' => $this->input->post('recent_news_quote',TRUE),
				'recent_news_category' => $this->input->post('recent_news_category',TRUE),

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

            //Multi images upload
            foreach($this->multi_image_fields as $multi_image_field){
                $images_array = array();
                $i = 0;
                $multi_image = $this->input->post($multi_image_field,TRUE);

                if(!empty($multi_image) && is_array($multi_image))
                {
                    for($i=0; $i < count($multi_image); $i++){
                        $images_array[] = $this->input->post($multi_image_field,TRUE)[$i]; 
                    }
                } 
                for($j=0; $j < count($_FILES[$multi_image_field]['tmp_name']); $j++)
                {
                    if($_FILES[$multi_image_field]['size'][$j] > 0){
                        $image = multi_image_upload($_FILES[$multi_image_field] ,$j, './uploads/'.$this->uri->segment(2).'/'.$multi_image_field);
                        if(is_array($image)){ 
                            $this->session->set_flashdata('error', $image);
                        }else{
                            $images_array[] = $image; 
                        }
                    }
                } 
                if(!empty($images_array)){
                    $content[$multi_image_field] = json_encode($images_array);
                }
                else{
                    $content[$multi_image_field] = '[]';
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
            $data = array();
            $data['table'] = 'recent_news_category';
            $data['output_type']='result';
            $content["recent_news_categories"]= $this->general->get($data);

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
        $content['hidden_fields'] = array();
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

    public function sort(){
        if($_POST){
            $where_id = $this->uri->segment(2).'_id';
            $sort_order = $this->uri->segment(2).'_sort_order';
            if(!empty($this->input->post('sort_array'))){
                $i = 1;
                foreach($this->input->post('sort_array') as $sort_array){
                    $data['table'] =  $this->uri->segment(2); 
                    $data['where'] = array($where_id => str_replace('sort_', '', $sort_array));
                    $content = array($sort_order => $i);
                    $this->general->update($data,$content);
                    $i++;
                }
                echo "true";
            }
        }
    }        

    public function list_ajax(){        
        $this->load->model('DT_Model');

        $data = $row = array();

        $column_order[] = null;

        foreach ($this->show_fields as $show_fields) {
            $column_order[] = $show_fields;
        }

        $column_order[] = null;

        $vars = array(
            'table' => $this->uri->segment(2),
            'column_order' => $column_order,
            'column_search' => $this->show_fields,
            'order' => array($this->uri->segment(2).'_sort_order' => 'desc'),
        );

        $records = $this->DT_Model->getRows($_POST,$vars);
        
        $id = $this->uri->segment(2).'_id';
        $status = $this->uri->segment(2).'_status';
        $updated_at = $this->uri->segment(2).'_updated_at';
        $created_at = $this->uri->segment(2).'_created_at';
        $sort_order = $this->uri->segment(2).'_sort_order';        

        $i = $_POST['start'];
        foreach($records as $record){
            $i++;

            $action = '
                <input type="checkbox" name="action[]" class="checkbox_select" value="'.$record->$id.'">
                <a href="'.base_url('admin/').$this->uri->segment(2).'/form/edit/'.$record->$id.'"><span class="edit_icon"><i class="icon-pencil" aria-hidden="true"></i></span></a>
                <a href="'.base_url('admin/').$this->uri->segment(2).'/view/'.$record->$id.'"><span class="view_icon"><i class="icon-eye" aria-hidden="true"></i></span></a>
                <a href="'.base_url('admin/').$this->uri->segment(2).'/form/duplicate/'.$record->$id.'"><span class="duplicate_icon"><i class="fa fa-clone" aria-hidden="true"></i></span></a>
                <a href="'.base_url('admin/').$this->uri->segment(2).'/delete/'.$record->$id.'"><span class="delete_icon"><i class="icon-trash" aria-hidden="true"></i></span></a>';

                $temp_data = array();
                $temp_data[] = $i;

                foreach ($record as $record_key => $record_val){
                    if(in_array($record_key, $this->show_fields)){
                        $td_val = '';
                        if(in_array($record_key, $this->image_fields)){
                            $img_url = !empty($record_val)?base_url('uploads/').$this->uri->segment(2).'/'.$record_val:base_url('assets/admin/img/placeholder.png');
                            $td_val = '<img height="40" src="'.$img_url.'">';
                        }
                        else{
                            if (strlen($record_val) > 150){
                             $td_val = substr($record_val, 0, 150) . '<a href="'.base_url('admin/').$this->uri->segment(2).'/view/'.$record->$id.'"> [read more...]</a>';
                            }
                            else{
                                $td_val = $record_val;
                            }
                        }
                        $temp_data[] = $td_val;
                    }
                }

            $temp_data[] = $action;

            $data[] = $temp_data;
        }
               

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->DT_Model->countAll($vars),
            "recordsFiltered" => $this->DT_Model->countFiltered($_POST,$vars),
            "data" => $data,
        );
        
        // Output to JSON format
        echo json_encode($output);

    }

    public function delete_all(){
        if($_POST){
            foreach($this->input->post('ids',TRUE) as $id){
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
            }

            echo "success";
        }
        else{
            $where_status = $this->uri->segment(2).'_status';
            $content = array(
                $where_status => 'disable',
            );    
            $data['table'] = $this->uri->segment(2); 
            $this->general->update($data,$content);        
            $this->session->set_flashdata('success', 'Deleted Successfully.');
            redirect('admin/'.$this->uri->segment(2));
        }
    }
}


