<?php 

class Staff extends Front_Controller {

    public function index() 
    {
        $data=array();
        $data["table"]="staff_page";
        $data["output_type"]="row";
        $data["where"]=array("staff_page_id"=>1);
        $content["staff_page_data"]= $this->general->get($data);

        $data=array();
        $data["table"]="staff_members";
        $data["output_type"]="result";
        $content["staff_members"]= $this->general->get($data);

        $content['main_content']='staff';
        $this->load->view('front/inc/view',$content);
    }
}
