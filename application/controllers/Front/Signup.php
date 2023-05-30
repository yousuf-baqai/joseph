<?php
class Signup extends Front_controller
{
    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        $content['main_content'] = 'register';
        $this->load->view('front/inc/view', $content);
    }

    public function register()
    {

        if (!empty($_POST)) {
            $this->form_validation->set_rules('member_email', 'Email', 'required|valid_email|callback_password_check');
            $this->form_validation->set_rules('member_password', 'Password', 'trim|required|min_length[8]|max_length[25]');
            if ($this->form_validation->run() == true) {
                $content = array(
                    'member_name' => $this->input->post('member_name'),
                    'member_email' => $this->input->post('member_email'),
                    'member_password' => $this->encryption->encrypt($this->input->post('member_password')),

                );
                $data = array();
                $data['table'] = 'member';
                $id=$this->general->insert($data, $content);
                
              
            $session_data = array(
                'member_name' => $this->input->post('member_name'),
                'member_email' => $this->input->post('member_email'),
                'member_id' => $id,
            );
            $this->session->set_userdata($session_data);
            redirect('dashboard');
        }else {
            $errors = validation_errors('<div class="error">', '</div>');
            $this->session->set_flashdata('error', $errors);
            redirect('login');
        }
    }
    }

    public function password_check($str = "")
    {
        $data['table'] = 'member';
        $data['where'] = array('member_email' => $str);
        $record = $this->general->get($data);
        if (!empty($record)) {
            $this->form_validation->set_message('password_check', 'The {field} field alerady exsists in the database. Please choose another email. ');
            return false;
        } else {
            return true;
        }
    }
}
