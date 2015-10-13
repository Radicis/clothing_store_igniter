<?php


class Site extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->model('category_model');
        $this->load->model('brand_model');
    }


    function index(){

        $data['items'] = $this->item_model->get_item();

        $data['items'] = array($data['items'][0], $data['items'][1], $data['items'][2]);

        $data['main_content'] = 'homepage';
        $this->load->view('includes/homepage/template', $data);
    }

}