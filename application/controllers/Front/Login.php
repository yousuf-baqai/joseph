<?php 
class Login extends Front_Controller{

    public function index()

    {
        if($this->session->userdata('member_id')){
            redirect('');
        }else{
        $content['main_content'] = 'login';
        $this->load->view('front/inc/view', $content);
    }
    }
   public function verify(){
    if (!$this->session->userdata('member_id')){
        if (!empty($_POST)) {
            $email          = $this->input->post('member_email', TRUE);
            $password       = $this->input->post('member_password', TRUE);
            $users['where'] = array(
                'member_email' => $email
            );
            $users['table'] = 'member';
            $result= $this->general->get($users);
            if($result) {
                foreach ($result as $row) {
                    $pass  = $row['member_password'];
                    $email = $row['member_email'];
                    $name  = $row['member_name'];
                    $id=$row['member_id'];
              
                }
                if ($this->encryption->decrypt($pass) == $password) {
                    $session_data = array(
                        'member_email' => $email,
                        'member_name' => $name,
                        'member_id' => $id,
                       
                    );
                    $this->session->set_userdata($session_data);
                    $cookie_pass = array(
                        'name' => 'member_password',
                        'value' => $password,
                        'expire' => '1209600'
                    );
                    $this->input->set_cookie($cookie_pass);
                }
                $this->session->set_flashdata('success', 'Login Successfull.');
                redirect('dashboard');
            }else {
                $this->session->set_flashdata('error', 'Invalid Email Or Password.');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('error', 'Invalid Email Or Password.');
            redirect('');
        }
    } 
    else{
        redirect('login');
    }
    
}
 public function log(){
    $this->session->sess_destroy();
    redirect('login');
 }

}