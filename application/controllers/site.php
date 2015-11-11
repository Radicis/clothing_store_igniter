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

        //Gets last 3 items to display on homepage
        $data['items'] = array_slice($data['items'], -3, 3);

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
     }

    function thanks(){
        $data['main_content'] = 'thanks';
        $this->load->view('includes/template', $data, $this->globals);
    }

    function about(){
        $data['main_content'] = 'about';
        $this->load->view('includes/template', $data, $this->globals);
    }

    //Generates the XMl RSS feed
    function feed(){
        $this->load->helper('xml');
        $this->load->helper('text');
  
        $this->data['query'] = array_slice($this->item_model->get_item(), -5, 5);


        // set feed Name will display at title area and page top
        $this->data['feed_name'] = 'Clothes Igniter';
        // set page encoding
        $this->data['encoding'] = 'utf-8';
        // set feed url
        $this->data['feed_url'] = 'ClothesIgniter.com/rss/fashion.xml';
        // set page language
        $this->data['page_language'] = 'en';
        // set page Description
        $this->data['page_description'] = 'Fashion Updates';
        // set author email
        $this->data['creator_email'] = 'clothesigniter@gmail.com';
        // this line is very important, this will let browser to display XML format output
        header("Content-Type: application/rss+xml");
        $this->load->view('feed',$this->data);

    }

    function gallery(){
        $tag = 'primark';
        $client_id = "2e397553354a4401a860373659f794ce";

        $url = 'https://api.instagram.com/v1/tags/'.$tag.'/media/recent?client_id='.$client_id;

        $inst_stream = $this->get_instagram($url);
        $results = json_decode($inst_stream, true);


        $data['images'] = array();


        foreach($results['data'] as $item){

            array_push($data['images'], array(
                'low' => $item['images']['thumbnail']['url'],
                'high' => $item['images']['standard_resolution']['url']
            ));
        }

        $data['main_content'] = 'gallery';
        $this->load->view('includes/template', $data, $this->globals);
    }

    //Curls the instagram API
    function get_instagram($url){
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => 2
        ));

        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

}