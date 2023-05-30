<?php 

class Recentnews extends Front_Controller {

    public function index() 
    {
        $data=array();
        $data["table"]="recent_news_page";
        $data["output_type"]="row";
        $data["where"]=array("recent_news_page_id"=>1);
        $content["recent_news_page"]= $this->general->get($data);

        $data = array();
        $data['table'] = 'recent_news_category';
        $data['output_type']='result';
        $content["recent_news_categories"]= $this->general->get($data);

        $data = array();
        $data['table'] = 'recent_news';
        $data['output_type']='result';
        $content["recent_news"]= $this->general->get($data);

        $content['main_content']='resent';
        $this->load->view('front/inc/view',$content);
    }
    public function news($recent_news_slug)
    {

        $data = array();
        $data['table'] = 'recent_news';
        $data['output_type']='row';
        $data['where']= array('recent_news_slug' => $recent_news_slug);
        $content["recent_news"]= $this->general->get($data);

        $content['main_content']='recent-news';
        $this->load->view('front/inc/view',$content);
    }
}
