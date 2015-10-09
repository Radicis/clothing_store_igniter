<?php


class Admin extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->model('category_model');
        $this->load->model('brand_model');
        $this->load->model('user_model');
        $this->load->helper('url_helper');
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
        $is_logged_in = $this->session->userdata('isAdmin');

        if(!isset($is_logged_in) || $is_logged_in != true)
        {
            echo "No permission to access the page";
            die();
        }
    }

    function show($type=FALSE){
        $this->load->library('pagination');
        $this->load->library('table');

        $config['base_url']=base_url().'index.php/admin/' . $type;

        switch($type){
            case "items": $model = $this->item_model;break;
            case "categories": $model = $this->category_model;break;
            case "brands": $model = $this->brand_model;break;
            case "users": $model = $this->user_model;break;
        }

        $config["total_rows"] = $model->record_count();
        $config['per_page'] = 6;
        $config['num_links'] = 20;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["items"] = $model->get_items($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();


        $data['main_content'] = 'admin/' . $type;
        $this->load->view('includes/template', $data);
    }




}