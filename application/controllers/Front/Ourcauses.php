<?php 

class Ourcauses extends Front_Controller {

    public function index() 
    {
        $data=array();
        $data["table"]="our_causes_page";
        $data["output_type"]="row";
        $data["where"]=array("our_causes_page_id"=>1);
        $content["our_causes_data"]= $this->general->get($data);

        $data = array();
        $data['table'] = 'our_causes_category';
        $data['output_type']='result';
        $content["our_causes_categories"]= $this->general->get($data);

        $data = array();
        $data['table'] = 'our_causes';
        $data['output_type']='result';
        $content["our_causes"]= $this->general->get($data);

        $content['main_content']='our-causes';
        $this->load->view('front/inc/view',$content);
    }
    public function causes($our_causes_slug) 
    {

        $data = array();
        $data['table'] = 'our_causes';
        $data['output_type']='row';
        $data['where']= array('our_causes_slug' => $our_causes_slug);
        $content["our_causes"]= $this->general->get($data);

        $content['main_content']='desier-inn';
        $this->load->view('front/inc/view',$content);
    }
}
