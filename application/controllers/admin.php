<?php


class Admin extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->model('user_model');
        $this->load->model('order_model');
        $this->load->model('address_model');
        $this->load->helper('url_helper');
        $this->load->model('orderItem_model');
    }

    function index()
    {
        $this->is_admin();

        $data['main_content'] = 'admin/index';

        $this->load->view('includes/admin/template', $data, $this->globals);
    }



    //Displays all of the users to the admin panel
    function show($type=FALSE){

        $this->is_logged_in();

        $this->load->library('pagination');
        $this->load->library('table');

        $config['base_url']=base_url().'index.php/admin/' . $type;

        switch($type){
            case "items": $model = $this->item_model;break;
            case "categories": $model = $this->category_model;break;
            case "brands": $model = $this->brand_model;break;
            case "users": $model = $this->user_model;break;
            case "orders": $model = $this->order_model;break;
        }

        $config["total_rows"] = $model->record_count();
        $config['per_page'] = 50;
        $config['num_links'] = 20;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["items"] = $model->get_items($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();


        $data['main_content'] = 'admin/' . $type;
        $this->load->view('includes/admin/template', $data, $this->globals);
    }

}