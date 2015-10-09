<?php


class Store extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
    }

    function index(){

        $this->load->model('item_model');
        $data['items'] = $this->item_model->get_item();

        $data['main_content'] = 'store/index';
        $this->load->view('includes/template', $data);
    }

    public function view($id = NULL)
    {
        $this->load->model('item_model');
        $data['item'] = $this->item_model->get_item($id);

        if (empty($data['item']))
        {
            show_404();
        }

        $this->load->view('includes/header', $data);
        $this->load->view('store/view', $data);
        $this->load->view('includes/footer');
    }


}