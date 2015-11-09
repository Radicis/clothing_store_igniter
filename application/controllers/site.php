<?php


class Site extends MY_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation'));

    }


    function index(){

        $data['items'] = $this->item_model->get_item();

        //Gets first 3 items to display on homepage, change to 3 latest items in future
        $data['items'] = array($data['items'][0], $data['items'][1], $data['items'][2]);

        $data['main_content'] = 'homepage';
        $this->load->view('includes/homepage/template', $data, $this->globals);
    }

    public function contact(){


        //set up the validation rules
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email Id', 'trim|required');
        $this->form_validation->set_rules('message', 'Message', 'trim|required');

        //run the validation inputted information

        if ($this->form_validation->run() == FALSE) {
            $data['main_content'] = 'contact';
            $this->load->view('includes/template', $data, $this->globals);
        } else {
            $name = $this->input->post('name');
            $from_email = $this->input->post('email');
            $subject = $this->input->post('subject');
            $message = $this->input->post('message');

            //the email that you want to receive the emails
            $to_email = 'user@gmail.com';

            //email configuration settings
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'ssl://smtp.gmail.com';
            $config['smtp_port'] = '465';
            $config['smtp_user'] = 'clothesigniter';
            $config['smtp_pass'] = 'HelloKitty123#';
            //$config['mailtype'] = 'html';
            //$config['charset'] = 'iso-8859-1';
            //$config['wordwrap'] = TRUE;
            //$config['newline'] = "\r\n";
            $this->load->library('email',$config);
            $this->email->initialize($config);

            //send an email
            $this->email->from($from_email, $name);
            $this->email->to($to_email);
            $this->email->subject($subject);
            $this->email->message($message);

            if ($this->email->send()) {
                $this->session->set_flashdata('success', 'Email sent');
                redirect('site/thanks');
            } else {
                //display an error
                $this->session->set_flashdata('success', 'Email sent');
                redirect('site/thanks');
            }
        }
        $data['main_content'] = 'contact';
        $this->load->view('includes/template', $data, $this->globals);
    }

    function thanks(){
        $data['main_content'] = 'thanks';
        $this->load->view('includes/template', $data, $this->globals);
    }

    function about(){
        $data['main_content'] = 'about';
        $this->load->view('includes/template', $data, $this->globals);
    }

}