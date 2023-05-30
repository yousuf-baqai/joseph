<?php 

class Dashboard extends Front_Controller {

    public function index()
    { 

        if ($this->session->userdata('member_id')) {
            
            $data=array();
            $data["table"]="member";
            $data["output_type"]="row";
            $data["where"]= array('member_id'=>$this->session->userdata('member_id'));
            $content["member_data"]= $this->general->get($data);

            $content['main_content']='dashboard';
            $this->load->view('front/inc/view',$content);
        } else {
            redirect('login');
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

}