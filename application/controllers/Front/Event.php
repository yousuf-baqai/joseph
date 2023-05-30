<?php 

class Event extends Front_Controller {

    public function index() 
    {
        $data=array();
        $data["table"]="event_page";
        $data["output_type"]="row";
        $data["where"]=array("event_page_id"=>1);
        $content["event_page_data"]= $this->general->get($data);

        $content['main_content']='events';
        $this->load->view('front/inc/view',$content);
    }
}
