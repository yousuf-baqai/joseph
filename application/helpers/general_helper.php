<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('single_image_upload')){    
    function single_image_upload($image,$path,$type=""){         
        $_FILES['image']['name']= $image['name'];
        $_FILES['image']['type']= $image['type'];
        $_FILES['image']['tmp_name']= $image['tmp_name'];
        $_FILES['image']['error']= $image['error'];
        $_FILES['image']['size']= $image['size']; 
    if(!file_exists($path)){
      mkdir($path, 0777, true);
    }
    $ci =& get_instance();
    $config['upload_path'] = ''.$path.'';
    if(!empty($type)){
        $config['allowed_types'] = $type;
    }
    else{
        $config['allowed_types'] = '*';
    }
    $ci->load->library('upload', $config);
    $ci->upload->initialize($config);
    if(!$ci->upload->do_upload('image')){ 
      return array('error' => $ci->upload->display_errors());
    }else{
        $file_detail = $ci->upload->data();      

        $ci->load->library('Compress');   

        $compress0 = new Compress();

        $file0 = str_replace('./', base_url(), $path.'/').$file_detail['file_name']; // file that you wanna compress
        $new_name_image0 = $file_detail['raw_name']; // name of new file compressed
        $quality0 = 60; // Value that I chose
        $destination0 = str_replace('./', base_url(), $path);

        $compress0->file_url = $file0;
        $compress0->new_name_image = $new_name_image0;
        $compress0->quality = $quality0;
        $compress0->destination = $destination0;

        $compress0->compress_image();
        return  $file_detail['file_name'];          
    }
    return FALSE;
    }
}

if(!function_exists('multi_image_upload')){ 
    function multi_image_upload($image,$index,$path,$type=""){         
        $_FILES['image']['name']= $image['name'][$index];
        $_FILES['image']['type']= $image['type'][$index];
        $_FILES['image']['tmp_name']= $image['tmp_name'][$index];
        $_FILES['image']['error']= $image['error'][$index];
        $_FILES['image']['size']= $image['size'][$index];
        if(!file_exists($path)){
            mkdir($path, 0777, true);
        }
        $ci =& get_instance();
        $config['upload_path'] = ''.$path.'';
        if(!empty($type)){
            $config['allowed_types'] = $type;
        }
        else{
            $config['allowed_types'] = 'gif|jpg|png|svg';
        }
        $config['max_width'] = '400000';
        $config['max_height'] = '400000';
        $ci->load->library('upload', $config);
        $ci->upload->initialize($config);
        if(!$ci->upload->do_upload('image')){ 
            return array('error' => $ci->upload->display_errors());
        }else{
            $file_detail = $ci->upload->data();  
            $ci->load->library('Compress');   

            $compress0 = new Compress();

            $file0 = str_replace('./', base_url(), $path.'/').$file_detail['file_name']; // file that you wanna compress
            $new_name_image0 = $file_detail['raw_name']; // name of new file compressed
            $quality0 = 60; // Value that I chose
            $destination0 = str_replace('./', base_url(), $path);

            $compress0->file_url = $file0;
            $compress0->new_name_image = $new_name_image0;
            $compress0->quality = $quality0;
            $compress0->destination = $destination0;

            $compress0->compress_image();


            return  $file_detail['file_name'];          
        }
        return FALSE;
    }
}

if(!function_exists('send_email')){ 
    function send_email($email_to,$subject,$body){
        $ci =& get_instance();
        $config['protocol'] = 'sendmail';
        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = 'html';
        $config['starttls'] = true;
        $config['newline'] = '\r\n';
        $ci->email->initialize($config);     
        $ci->email->from('info@dummywebsite.com',$ci->site_title);
        $ci->email->to($email_to);   
        if(!empty($send_cc)){
           $ci->email->cc($send_cc);    
        }
        $ci->email->subject($subject);
        $ci->email->message($body);
        if($ci->email->send()){
            return TRUE;    
            }else{     
            return FALSE;
        }
        exit;
    }
    
}

if (!function_exists('limit_text'))
{
 function limit_text($count,$text)
 {
  $result = strlen($text)>$count?substr($text, 0, $count).'...':$text;
    return $result;
 } 
}

 
if (!function_exists('get_files_list'))
{
    function get_files_list($directory)
    {
        if ($handle = opendir($directory)) {
            $result = array();
            while (false !== ($entry = readdir($handle))) {
        
                if ($entry != "." && $entry != "..") {
        
                    array_push($result,$entry);
                }
            }
            
            closedir($handle);
            return $result;
        }
    }   
}


if (!function_exists('get_templates'))
{
    function get_templates()
    {
        $result = array();
        $list = get_files_list('application/views/front/template'); 
        foreach($list as $val){
            array_push($result,str_replace('.php','',$val));
        }
        
        return $result;
    }   
}

if (!function_exists('get_list'))
{
    function get_list($tabel="",$where="",$limit="",$order_col="",$order_by="",$like="",$group_by="")
    {       
        $ci =& get_instance();
        $records = $ci->general->get_list($tabel,$where,$limit,$order_col,$order_by,$like,$group_by);
        if($records){   
            return $records;
        }else{
            return  FALSE;
        }
            
    }
}


if (!function_exists('array_like'))
{
    function array_like($data,$input)
    {       
        
        $result = array_filter($data, function ($item) use ($input) {
            if (stripos($item, $input) !== false) {
                return true;
            }
            return false;
        });
        $match = $result;
        $result = array_diff($data,$match);
        return array_merge($match,$result);
        
    }
}


if (!function_exists('get_id_by_slug'))
{
    function get_id_by_slug($table,$slug)
    {                               
        $ci =& get_instance();
        $temp = $ci->general->get_list($table,array(''.$table.'_slug'=>$slug));
        if($temp){          
            foreach($temp as $tp){
                $id = $table.'_id';
                $result = $tp->$id;             
            }
            return $result;
        }else{
            return FALSE;
        } 
    }
}



if (!function_exists('form_item'))
{
    function form_item($feild_name="", $field_type= "",$required = "",$record="",$options="",$custom_label_text = "", $extra_atributes="")
    { 
        $required_field = ($required  == 'required')?'data-validation="required"':'';
        $required_text = ($required  == 'required')?'<small class="text-danger">( required )</small>':'';        

        $ci =& get_instance();
        $html = '';
        $value = '';
        $label = '';
        $image = '';
        $label = str_replace($ci->uri->segment(2), '', $feild_name);
        $label = str_replace('_', ' ', $label).' '.$required_text;

        if(!empty($custom_label_text)){
            $label = $custom_label_text;
        }

        if(!empty($record)){
            $value = $record->$feild_name;
        }


        if($field_type == 'text'){
            $html = '
                <div class="form-group">
                  <label>'.ucwords($label).'</label>
                  <input type="text" class="form-control" id="'.$feild_name.'" name="'.$feild_name.'" '.$required_field.' value="'.$value.'" '.$extra_atributes.'>
                  '.form_error($feild_name).'
                </div>';
        }    

        if($field_type == 'number'){
            $html = '
                <div class="form-group">
                  <label>'.ucwords($label).'</label>
                  <input type="number" class="form-control" id="'.$feild_name.'" name="'.$feild_name.'" '.$required_field.' value="'.$value.'" '.$extra_atributes.'>
                  '.form_error($feild_name).'
                </div>';
        }    

        if($field_type == 'email'){
            $html = '
                <div class="form-group">
                  <label>'.ucwords($label).'</label>
                  <input type="email" class="form-control" id="'.$feild_name.'" name="'.$feild_name.'" '.$required_field.' value="'.$value.'" '.$extra_atributes.'>
                  '.form_error($feild_name).'
                </div>';
        }               

        if($field_type == 'datepicker'){
            $html = '
                <div class="form-group">
                  <label>'.ucwords($label).'</label>
                  <input type="datepicker" class="form-control" id="'.$feild_name.'" name="'.$feild_name.'" '.$required_field.' value="'.$value.'" '.$extra_atributes.'>
                  '.form_error($feild_name).'
                </div>';
        } 

        if($field_type == 'textarea'){
            $html = '
                <div class="form-group">
                  <label>'.ucwords($label).'</label>
                  <textarea class="form-control" id="'.$feild_name.'" name="'.$feild_name.'" '.$required_field.' '.$extra_atributes.'>'.$value.'</textarea>
                  '.form_error($feild_name).'
                </div>';
        }    

        else if($field_type == 'textarea_editor'){
            $html = '
                <div class="form-group">
                  <label>'.ucwords($label).'</label>
                  <textarea class="form-control editor" id="'.$feild_name.'" name="'.$feild_name.'" '.$required_field.' '.$extra_atributes.'>'.$value.'</textarea>
                  '.form_error($feild_name).'
                </div>';
        }   

        else if($field_type == 'image'){
            $image = !empty($value)?base_url('uploads/').$ci->uri->segment(2).'/'.$value:base_url('assets/admin/img/placeholder.png');
            $html = '
                <div class="form-group">
                  <label>'.ucwords($label).'</label>
                  <div class="input-group-btn">
                    <div class="image-upload">
                      <img src="'.$image.'">
                      <div class="file-btn">
                        <input type="file" id="'.$feild_name.'" name="'.$feild_name.'" '.$extra_atributes.' accept=".jpg,.jpeg,.png,.svg">
                        <input type="text" id="'.$feild_name.'" name="'.$feild_name.'" value="'.$value.'" hidden>
                        <label class="btn btn-info"><i class="icon-folder-alt"></i> Upload</label>
                      </div>

                      <div class="gallery-btn" style="display: inline-block;margin-left: 5px;margin-top: 15px;">  <input type="text"  id="'.$feild_name.'" name="from_gallery_'.$feild_name.'" value="" hidden=""> <label class="btn btn-warning"  data-toggle="modal" data-target="#gallery"><i class="icon-picture"></i> Open Gallery</label> </div>
                    </div>
                  </div>
                  '.form_error($feild_name).'
                </div>';
        }   
        
        else if($field_type == 'multi_image'){
            
            if(!empty($value)){
                $images = json_decode($value);
            }
            
            $html = '
                <div class="form-group">
                    <label>'.ucwords($label).' 
                    </label>

                    <div class="">  
                        <div class="input-group-btn multi-image-upload-main"> ';
                    if(!empty($images)){
                        foreach($images as $img){
                            if(!empty($file_folder_path)){
                                $image = !empty($img)?$file_folder_path.$img:base_url('assets/admin/img/placeholder.png');
                            }
                            else{
                                $image = !empty($img)?base_url('uploads/').$ci->uri->segment(2).'/'.$feild_name.'/'.$img:base_url('assets/admin/img/placeholder.png');
                            }

                        $html .='
                            <div class="multi-image-upload">   
                                <i class="fa fa-times" aria-hidden="true"></i>                        
                                <img src="'.$image.'">
                                <div class="file-btn">
                                    <input type="text" id="'.$feild_name.'" name="'.$feild_name.'[]" value="'.$img.'" hidden '.$extra_atributes.'>
                                </div>
                            </div> ';
                        } 
                    }

                   $html .='
                            <div class="multi-image-upload">                      
                                <img src="'.base_url('assets/admin/img/placeholder.png').'">
                                <div class="file-btn">
                                    <input type="file" id="'.$feild_name.'" name="'.$feild_name.'[]" '.$extra_atributes.'>
                                    <label class="btn btn-info">Upload</label>
                                </div>
                            </div>
                        </div>   

                    </div>
                  '.form_error($feild_name).'
                </div>';
        }        

        else if($field_type == 'option'){
            $options_html = '<option value="">Select: '.ucwords($label).'</option>';
            foreach ($options as $option_key => $option_value) {

                if($value == $option_value){
                    $options_html .= '<option selected="selected" value="'.$option_value.'">'.$option_key.'</option>';
                }
                else{
                    $options_html .= '<option value="'.$option_value.'">'.$option_key.'</option>';                    
                }
            }

            $html = '
                <div class="form-group">
                  <label>'.ucwords($label).'</label>
                  <select class="form-control" id="'.$feild_name.'" name="'.$feild_name.'" '.$required_field.'>'.$options_html.'</select>
                  '.form_error($feild_name).'
                </div>';
        }

        return $html;  
         
    }
}





if (!function_exists('form_item2'))
{
    function form_item2($feild_name="", $field_type= "",$required = "",$record="",$options="")
    { 
        $required_field = ($required  == 'required')?'data-validation="required"':'';
        $required_text = ($required  == 'required')?'<small class="text-danger">( required )</small>':'';        

        $ci =& get_instance();
        $html = '';
        $value = '';
        $label = '';
        $image = '';
        $label = str_replace($ci->uri->segment(2), '', $feild_name);
        $label = str_replace('_', ' ', $label).' '.$required_text;

        if(!empty($record)){
            $value = $record->$feild_name;
        }


        if($field_type == 'text'){
            $html = '
                <div class="form-group">
                  <label>'.ucwords($label).'</label>
                  <input type="text" class="form-control" id="'.$feild_name.'" name="'.$feild_name.'" '.$required_field.' value="'.$value.'">
                  '.form_error($feild_name).'
                </div>';
        }    

        if($field_type == 'textarea'){
            $html = '
                <div class="form-group">
                  <label>'.ucwords($label).'</label>
                  <textarea class="form-control" id="'.$feild_name.'" name="'.$feild_name.'" '.$required_field.'>'.$value.'</textarea>
                  '.form_error($feild_name).'
                </div>';
        }    

        else if($field_type == 'textarea_editor'){
            $html = '
                <div class="form-group">
                  <label>'.ucwords($label).'</label>
                  <textarea class="form-control editor" id="'.$feild_name.'" name="'.$feild_name.'" '.$required_field.'>'.$value.'</textarea>
                  '.form_error($feild_name).'
                </div>';
        }   

        else if($field_type == 'image'){
            $image = !empty($value)?base_url('uploads/').$ci->uri->segment(2).'/'.$value:base_url('assets/admin/img/placeholder.png');
            $html = '
                <div class="form-group">
                  <label>'.ucwords($label).'</label>
                  <div class="input-group-btn">
                    <div class="image-upload">
                      <img src="'.$image.'">
                      <div class="file-btn">
                        <input type="file" id="'.$feild_name.'" name="'.$feild_name.'">
                        <input type="text" id="'.$feild_name.'" name="'.$feild_name.'" value="'.$value.'" hidden>
                        <label class="btn btn-info">Upload</label>
                      </div>
                    </div>
                  </div>
                  '.form_error($feild_name).'
                </div>';
        }   


        else if($field_type == 'multi_image'){
            
            if(!empty($value)){
                $images = json_decode($value);
            }
            
            $html = '
                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">'.ucwords($label).' 
                    </label>

                    <div class="col-md-6 col-sm-6 col-xs-12">  
                        <div class="input-group-btn multi-image-upload-main"> ';
                    if(!empty($images)){
                        foreach($images as $img){
                            if(!empty($file_folder_path)){
                                $image = !empty($img)?$file_folder_path.$img:base_url('assets/admin/img/placeholder.png');
                            }
                            else{
                                $image = !empty($img)?base_url('uploads/').$ci->uri->segment(1).'/'.$feild_name.'/'.$img:base_url('assets/admin/img/placeholder.png');
                            }

                        $html .='
                            <div class="multi-image-upload">   
                                <i class="fa fa-times" aria-hidden="true"></i>                        
                                <img src="'.$image.'">
                                <div class="file-btn">
                                    <input type="text" id="'.$feild_name.'" name="'.$feild_name.'[]" value="'.$img.'" hidden>
                                </div>
                            </div> ';
                        } 
                    }

                   $html .='
                            <div class="multi-image-upload">                      
                                <img src="'.base_url('assets/admin/img/placeholder.png').'">
                                <div class="file-btn">
                                    <input type="file" id="'.$feild_name.'" name="'.$feild_name.'[]" '.$accept_files.'>
                                    <label class="btn btn-info">Upload</label>
                                </div>
                            </div>
                        </div>   

                    </div>
                  '.form_error($feild_name).'
                </div>';
        }


        else if($field_type == 'option'){
            $options_html = '<option value="">Select: '.ucwords($label).'</option>';
            foreach ($options as $option_key => $option_value) {

                if($value == $option_value){
                    $options_html .= '<option selected="selected" value="'.$option_value.'">'.$option_key.'</option>';
                }
                else{
                    $options_html .= '<option value="'.$option_value.'">'.$option_key.'</option>';                    
                }
            }

            $html = '
                <div class="form-group">
                  <label>'.ucwords($label).'</label>
                  <select class="form-control" id="'.$feild_name.'" name="'.$feild_name.'" '.$required_field.'>'.$options_html.'</select>
                  '.form_error($feild_name).'
                </div>';
        }

        return $html;  
         
    }
}