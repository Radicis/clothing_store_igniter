<?php


class Store extends MY_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->model('stock_model');
        $this->load->model('address_model');
        $this->load->model('orderItem_model');
        $this->load->model('order_model');
        $this->load->helper('url_helper');
        $this->load->library('user_agent');
    }

    function index(){

        $this->load->library('pagination');

        $config['base_url']= base_url().'index.php/store/index';

            $config["total_rows"] = $this->item_model->record_count();
            $config['per_page'] = 6;
            $config['num_links'] = 20;
            $config["uri_segment"] = 3;

            $this->pagination->initialize($config);

            $page = ($this->uri->segment($config["uri_segment"])) ? $this->uri->segment($config["uri_segment"]) : 0;
            $data["items"] = $this->item_model->
            get_items($config["per_page"], $page);
            $data["links"] = $this->pagination->create_links();

            $data['main_content'] = 'store/index';
            $this->load->view('includes/template', $data, $this->globals);
    }


    //Displays cart contents
    function view_cart()
    {
        $data['main_content'] = 'store/view_cart';
        $this->load->view('includes/template', $data, $this->globals);
    }

    // Add specified item ID to the cart
    function add_to_cart()
    {
        $id = $this->input->post('stock');
        $stock_item = $this->stock_model->get($id);
        $item = $this->item_model->get_item($stock_item['itemID']);

        $data = array(
            'id'      => $stock_item['id'],
            'qty'     => 1,
            'price'   => $item['item_price'],
            'name'    => $item['item_name'],
            'image' => $item['image_large'],
            'options' => array('Size' => $stock_item['size'], 'Color' => $stock_item['colour'])
        );

        $this->cart->insert($data);
         redirect('item/view/' . $item['id']);
    }

    function remove_from_cart($rowid){
        $data = array(
            'rowid'   => $rowid,
            'qty'     => 0
        );

        $this->cart->update($data);
        redirect($this->agent->referrer());
    }

    // Removes all items in cart
    function empty_cart()
    {
        $this->cart->destroy();
        $this->session->set_flashdata('success', 'Cart Cleared');
        redirect('site');
    }

    //Testing Ajax
    function prices(){
        if ($this->input->is_ajax_request()) {
            header('Content-Type: application/x-json; charset=utf-8');
            echo(json_encode($this->item_model->prices()));
        }
    }

    //Displays items of the specified categoryID
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

        $data['main_content'] = 'store/index';
        $this->load->view('includes/template', $data, $this->globals);
    }


    //testing multiple filters

    function filter(){

        $this->load->library('pagination');

        $config['base_url']=base_url().'index.php/store/filter/';

        $config["total_rows"] = $this->item_model->record_count();
        $config['per_page'] = 6;
        $config['num_links'] = 20;
        $config["uri_segment"] = 4;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment($config["uri_segment"])) ? $this->uri->segment($config["uri_segment"]) : 0;
        $brands = $this->input->post('brands');
        $categories = $this->input->post('categories');
        $search = $this->input->post('searchInput');

        $data['items'] = $this->item_model->filter($brands ,$categories, $search);
        $data["links"] = $this->pagination->create_links();


        $data['main_content'] = 'store/index';
        $this->load->view('includes/template', $data, $this->globals);


    }

    //Displays items of the specified price range
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


        $data['main_content'] = 'store/index';
        $this->load->view('includes/template', $data, $this->globals);
    }


    //Displays items of the specified brandID
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


        $data['main_content'] = 'store/index';
        $this->load->view('includes/template', $data, $this->globals);
    }

}