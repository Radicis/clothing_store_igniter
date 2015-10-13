<?php


class Store extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->model('category_model');
        $this->load->model('brand_model');
        $this->load->helper('url_helper');
        $this->load->library('user_agent');
    }

    function index(){

        /*
        if (!$this->input->is_ajax_request()) {
            header('Content-Type: application/x-json; charset=utf-8');
            echo(json_encode($this->item_model->get_item()));
            die();
        }*/

        $this->load->library('pagination');

        $config['base_url']=base_url().'index.php/store/index';

            $config["total_rows"] = $this->item_model->record_count();
            $config['per_page'] = 6;
            $config['num_links'] = 20;
            $config["uri_segment"] = 3;

            $this->pagination->initialize($config);

            $page = ($this->uri->segment($config["uri_segment"])) ? $this->uri->segment($config["uri_segment"]) : 0;
            $data["items"] = $this->item_model->
            get_items($config["per_page"], $page);
            $data["links"] = $this->pagination->create_links();

            $data["categories"] = $this->category_model->get_item();
        $data["brands"] = $this->brand_model->get_item();

            $data['main_content'] = 'store/index';
            $this->load->view('includes/template', $data);
    }


    function foo(){


        if ($this->input->is_ajax_request()) {
            header('Content-Type: application/x-json; charset=utf-8');
            echo(json_encode($this->item_model->foo()));
            die();
        }


    }

    function category($categoryID){

        $this->load->library('pagination');

        $config['base_url']=base_url().'index.php/store/category/'. $categoryID;

        $config["total_rows"] = $this->item_model->record_count($categoryID);
        $config['per_page'] = 6;
        $config['num_links'] = 20;
        $config["uri_segment"] = 4;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment($config["uri_segment"])) ? $this->uri->segment($config["uri_segment"]) : 0;
        $data["items"] = $this->item_model->
        get_category_items($config["per_page"], $page, $categoryID);
        $data["links"] = $this->pagination->create_links();

        $data["categories"] = $this->category_model->get_item();
        $data["brands"] = $this->brand_model->get_item();

        $data['main_content'] = 'store/index';
        $this->load->view('includes/template', $data);
    }


    //testing

    function filter($categoryID=False, $brandID=False, $price=False){


        $this->load->library('pagination');

        $config['base_url']=base_url().'index.php/store/filter/'. $price;

        $config["total_rows"] = $this->item_model->record_count_price($price);
        $config['per_page'] = 6;
        $config['num_links'] = 20;
        $config["uri_segment"] = 4;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment($config["uri_segment"])) ? $this->uri->segment($config["uri_segment"]) : 0;
        $data["items"] = $this->item_model->get_filter_items($categoryID, $brandID, $price);
        $data["links"] = $this->pagination->create_links();

        $data["categories"] = $this->category_model->get_item();
        $data["brands"] = $this->brand_model->get_item();

        $this->session->set_flashdata('success', "Cat: " . $categoryID. " brand: " . $brandID . " price: " . $price);

        $data['main_content'] = 'store/index';
        $this->load->view('includes/template', $data);
    }

    function price($price){

        $this->load->library('pagination');

        $config['base_url']=base_url().'index.php/store/price/'. $price;

        $config["total_rows"] = $this->item_model->record_count_price($price);
        $config['per_page'] = 6;
        $config['num_links'] = 20;
        $config["uri_segment"] = 4;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment($config["uri_segment"])) ? $this->uri->segment($config["uri_segment"]) : 0;
        $data["items"] = $this->item_model->
        get_by_price($config["per_page"], $page, $price);
        $data["links"] = $this->pagination->create_links();

        $data["categories"] = $this->category_model->get_item();
        $data["brands"] = $this->brand_model->get_item();

        $data['main_content'] = 'store/index';
        $this->load->view('includes/template', $data);
    }

    function brand($brand){

        $this->load->library('pagination');

        $config['base_url']=base_url().'index.php/store/brand/'. $brand;

        $config["total_rows"] = $this->item_model->record_count_brand($brand);
        $config['per_page'] = 6;
        $config['num_links'] = 20;
        $config["uri_segment"] = 4;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment($config["uri_segment"])) ? $this->uri->segment($config["uri_segment"]) : 0;
        $data["items"] = $this->item_model->
        get_by_brand($config["per_page"], $page, $brand);
        $data["links"] = $this->pagination->create_links();

        $data["categories"] = $this->category_model->get_item();
        $data["brands"] = $this->brand_model->get_item();

        $data['main_content'] = 'store/index';
        $this->load->view('includes/template', $data);
    }

}