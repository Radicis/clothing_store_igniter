<?php


class Site extends MY_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('item_model');

    }


    function index(){

        $data['items'] = $this->item_model->get_item();

        //Gets first 3 items to display on homepage, change to 3 latest items in future
        $data['items'] = array($data['items'][0], $data['items'][1], $data['items'][2]);

        $data['main_content'] = 'homepage';
        $this->load->view('includes/homepage/template', $data, $this->globals);
    }

}