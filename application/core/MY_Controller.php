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
}