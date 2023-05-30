<?php 

class Contact extends Front_Controller {

    public function index() 
    {
        $data=array();
        $data["table"]="contact_page";
        $data["output_type"]="row";
        $data["where"]=array("contact_page_id"=>1);
        $content["contact_page_data"]= $this->general->get($data);

        $content['main_content']='contact';
        $this->load->view('front/inc/view',$content);
    }
}
