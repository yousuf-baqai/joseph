<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends Admin_Controller {
    function __construct() {
        parent::__construct();    
        $this->multi_image_fields = array('gallery_images');          
    }  
    
    public function form($form_choice = "",$id="")
    {
        if($_POST){
            $folder = $this->input->post('folder');
            $return_url = $this->input->post('return_url');
            
            
            //Multi images upload
            foreach($this->multi_image_fields as $multi_image_field){
                $images_array = array();
                
                for($j=0; $j < count($_FILES[$multi_image_field]['tmp_name']); $j++)
                {
                    if($_FILES[$multi_image_field]['size'][$j] > 0){
                        $_FILES[$multi_image_field]['name'][$j] = $_FILES[$multi_image_field]['size'][$j].'-'.$_FILES[$multi_image_field]['name'][$j];
                        $image = multi_image_upload($_FILES[$multi_image_field] ,$j, './uploads/'.$folder);
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
            redirect($return_url);   
        }
    }

    public function fetch(){
        $uploads = array();
        $input_folder_name = $this->input->post('folder_path',TRUE);
        if(!empty($input_folder_name)){
            $uploads[$input_folder_name] = $this->dirToArray('./uploads/'.$this->input->post('folder_path',TRUE));
        }
        else{
            $uploads = $this->dirToArray('./uploads');
        }

        $image_html = '';


        $i = 0;
        
        foreach($uploads as $folder_name => $images){
          if(!empty($images)){
            ksort($images);$images = array_reverse($images);
            foreach($images as $image_temp){
                foreach($image_temp as $image){
                    if(!empty($input_folder_name)){
                        $folder_id = $this->input->post('folder_id',TRUE);
                    }
                    else{
                        $folder_id = $i;
                    }

                    $image_html .='<div class="folder-image" data-folder-id="'.$folder_id.'"><img src="'.base_url('uploads/'.$folder_name.'/'.$image).'" class="img-responsive" >
                    <p data-toggle="tooltip" title="Click to copy" onclick="copyToClipboard(this)">'.base_url('uploads/'.$folder_name.'/'.$image).'</p>
                    </div>';
                    }
                }
            }  
          $i++;
        }    

        echo $image_html;

    }

    public function dirToArray($dir) {
  
       $result = array();

       $cdir = scandir($dir);
       $d = 1;
       foreach ($cdir as $key => $value)
       {
          if (!in_array($value,array(".","..")))
          {
             if (is_dir($dir . DIRECTORY_SEPARATOR . $value))
             {
                $result[$value] = $this->dirToArray($dir . DIRECTORY_SEPARATOR . $value);
             }
             else
             {
                $result[filemtime($dir . DIRECTORY_SEPARATOR . $value)][] = $value;
             }
          }
       }
      
       return $result;
    }


        
}

