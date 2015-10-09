<?php


class Admin extends CI_Controller{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->is_logged_in();

        //Show overview panels
        //links to each type of model to viewedit

        $data['main_content'] = 'admin/index';
        $this->load->view('includes/template', $data);
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



}