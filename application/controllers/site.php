<?php


class Site extends CI_Controller{

    function __construct()
    {
        parent::__construct();
    }

    function admin_area()
    {
        $this->is_logged_in();
        $this->load->view('members_area');
    }

    function is_logged_in()
    {
        $is_logged_in = $this->session->userdata('is_logged_in');

        if(!isset($is_logged_in) || $is_logged_in != true)
        {
            echo "No permission to access the page";
            die();
        }
    }

    function index(){
        $data['main_content'] = 'homepage';
        $this->load->view('includes/template', $data);
    }

}