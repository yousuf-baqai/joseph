<?php 

class News extends Front_Controller {

    public function index() 
    {
        $data=array();
        $data["table"]="news_page";
        $data["output_type"]="row";
        $data["where"]=array("news_page_id"=>1);
        $content["news_page"]= $this->general->get($data);

        $data=array();
        $data["table"]="newletters";
        $data["output_type"]="result";
        $content["news"]= $this->general->get($data);
        
        $content['main_content']='news';
        $this->load->view('front/inc/view',$content);
    }
    
}
