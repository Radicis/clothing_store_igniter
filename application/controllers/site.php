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
            $to_email = 'adam.lloyd@mycit.ie';

            //email configuration settings
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'ssl://smtp.gmail.com';
            $config['smtp_port'] = '465';
            $config['smtp_user'] = 'clothesigniter';
            $config['smtp_pass'] = 'HelloKitty123#';
            $config['mailtype'] = 'html';
            $config['charset'] = 'iso-8859-1';
            //$config['wordwrap'] = TRUE;
            //$config['newline'] = "\r\n";
            $this->load->library('email',$config);
            $this->email->set_newline("\r\n");
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
        $tag = 'clothing';
        $client_id = "2e397553354a4401a860373659f794ce";

        $url = 'https://api.instagram.com/v1/tags/'.$tag.'/media/recent?client_id='.$client_id;

        $inst_stream = $this->get_instagram($url);
        $results = json_decode($inst_stream, true);


        $data['images'] = array();

        try {
            foreach ($results['data'] as $item) {

                array_push($data['images'], array(
                    'low' => $item['images']['thumbnail']['url'],
                    'high' => $item['images']['standard_resolution']['url']
                ));
            }
        }catch(Exception $e){

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


    function getRSS(){
        header('Content-Type: application/x-json; charset=utf-8');

        //(file_get_contents('http://www.elle.com/rss/fashion.xml'));
        $doc = new DOMDocument();
        $doc->load( 'http://www.elle.com/rss/fashion.xml' );//xml file loading here

        $items = $doc->getElementsByTagName( "item" );
        $i = 0;

        $rssString = "";

        foreach ($items as $item) {
            $titles = $item->getElementsByTagName("title");
            $links = $item->getElementsByTagName("link");
            $link = $links->item(0)->nodeValue;
            $dates = $item->getElementsByTagName("pubDate");
            $date = $dates->item(0)->nodeValue;
            $title = $titles->item(0)->nodeValue;
            $rssString .= "<p><a href='" . $link . "'>" . $title ."</a><br><span class='text-muted small'>" . $date .  "</span></p>";
            $i += 1;
            if($i>3)break;
        }

        echo(json_encode($rssString));
    }

}