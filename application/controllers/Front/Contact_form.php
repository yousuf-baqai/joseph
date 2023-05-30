<?php 

class Contact_form extends Front_Controller {

    public function index()
    {
        $content= array(
            'contact_form_first_name' => $this->input->post('contact_form_first_name',TRUE),    
            'contact_form_last_name' => $this->input->post('contact_form_last_name',TRUE),
            'contact_form_email' => $this->input->post('contact_form_email',TRUE),
            'contact_form_phone' => $this->input->post('contact_form_phone',TRUE),
            'contact_form_message' => $this->input->post('contact_form_message',TRUE),
            );
            $data          = array();
            $data['table'] = 'contact_form';
            $content        = $this->general->insert($data, $content);
            echo print_r($content);
    }

}