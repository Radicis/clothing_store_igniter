<?php

class MY_Controller extends CI_Controller
{

    public $globals;

    function __construct()
    {
        parent::__construct();
        $this->load->model('category_model');
        $this->load->model('brand_model');		
		
        $this->globals = array(
            'categories' => $this->category_model->get(),
            'brands' => $this->brand_model->get()
        );
    }

    //Checks if the user is currently logged in
    function is_logged_in()
    {
        $is_logged_in = $this->session->userdata('is_logged_in');

        if(!$is_logged_in)
        {
            redirect('login');
        }
    }


    //Checks if the user is currently logged in as admin
    function is_admin()
    {
        $is_admin = $this->session->userdata('isAdmin');

        if(!$is_admin)
        {
            redirect('login');
        }
    }

    function is_owner($object){
        try {
            if (!(($this->session->userdata('userID') == $object->userID) || $this->session->userdata('isAdmin'))) {
                redirect('login');
            }
        }
        catch(Exception $e){

        }
        try {
            if (!(($this->session->userdata('userID') == $object['userID']) || $this->session->userdata('isAdmin'))) {
                redirect('login');
            }
        }        catch(Exception $e){

        }
    }
}