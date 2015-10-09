<?php


class Store extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->model('category_model');
        $this->load->model('brand_model');
        $this->load->helper('url_helper');
    }

    function index(){

        $this->load->library('pagination');

        $config['base_url']=base_url().'index.php/store/index';

            $config["total_rows"] = $this->item_model->record_count();
            $config['per_page'] = 6;
            $config['num_links'] = 20;
            $config["uri_segment"] = 3;

            $this->pagination->initialize($config);

            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data["items"] = $this->item_model->
            get_items($config["per_page"], $page);
            $data["links"] = $this->pagination->create_links();

            $data['main_content'] = 'store/index';
            $this->load->view('includes/template', $data);
    }

    function category($categoryID){

        $this->load->library('pagination');

        $config['base_url']=base_url().'index.php/store/category/'. $categoryID;

        $config["total_rows"] = $this->item_model->record_count($categoryID);
        $config['per_page'] = 6;
        $config['num_links'] = 20;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["items"] = $this->item_model->
        get_category_items($config["per_page"], $page, $categoryID);
        $data["links"] = $this->pagination->create_links();

        $data['main_content'] = 'store/index';
        $this->load->view('includes/template', $data);
    }

    function view($id = NULL)
    {
        $data['item'] = $this->item_model->get_item($id);

        $categoryID = $data['item']['categoryID'];
        $brandID = $data['item']['brandID'];

        $data['category'] = $this->category_model->get_item($categoryID);
        $data['brand'] = $this->brand_model->get_item($brandID);

        if (empty($data['item']))
        {
            show_404();
        }

        $this->load->view('includes/header', $data);
        $this->load->view('store/view', $data);
        $this->load->view('includes/footer');
    }

    function create_item(){

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('item_name', 'Name', 'required');
        $this->form_validation->set_rules('item_description', 'Description', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $data['categories'] = $this->category_model->get_item();
            $data['brands'] = $this->brand_model->get_item();
            $this->load->view('includes/header');
            $this->load->view('admin/item_create', $data);
            $this->load->view('includes/footer');
        }
        else
        {
            $insert_id = $this->item_model->set_item();

            $this->view($insert_id);
        }
    }

    function add_rating($id = NULL)
    {
        $item = $this->item_model->get_item($id);
        $rating = $item['rating'];
        $value = 1;
        $this->item_model->add_rating($id, $rating, $value);
        redirect('store');
    }

    function remove_rating($id = NULL)
    {
        $item = $this->item_model->get_item($id);
        $rating = $item['rating'];
        $value = -1;
        $this->item_model->add_rating($id, $rating, $value);
        redirect('store');
    }


}