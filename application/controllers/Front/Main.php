<?php 

class Main extends Front_Controller {

    public function index() 
    {
        $data=array();
        $data["table"]="home";
        $data["output_type"]="row";
        $data["where"]=array("home_id"=>1);
        $content["home_page"]= $this->general->get($data);


        $data=array();
        $data['table']='our_causes';
        $data['output_type']='result';
        $content['cause']=$this->general->get($data);

        $data = array();
        $data['table'] = 'recent_news';
        $data['output_type']='result';
        $content["recent_news"]= $this->general->get($data);

        $content['main_content']='index';
        $this->load->view('front/inc/view',$content);
    }
}
