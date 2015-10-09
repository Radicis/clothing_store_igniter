<?php


class Site extends CI_Controller{

    function __construct()
    {
        parent::__construct();
    }



    function index(){
        $data['main_content'] = 'homepage';
        $this->load->view('includes/template', $data);
    }

}