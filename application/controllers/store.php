<?php


class Store extends MY_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->model('address_model');
        $this->load->helper('url_helper');
        $this->load->library('user_agent');
		
    }


    function index(){

        //Build query string from js selects
        // uri split to extracct category/brand/price and other filters

        //Detects Ajax call and returns Json encoded response
        if ($this->input->is_ajax_request()) {
            header('Content-Type: application/x-json; charset=utf-8');
            echo json_encode($this->item_model->
            get_item());
            die(); //stops execution nso it only echos json to request
        }

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

<<<<<<< HEAD
            $data["categories"] = $this->category_model->get_item();
			$data["brands"] = $this->brand_model->get_item();

=======
>>>>>>> 1e1377192bd0ef1c7ea78a9e9ba38b388417d22b
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
    function add_to_cart($id)
    {
        $item = $this->item_model->get_item($id);

        $data = array(
            'id'      => $item['id'],
            'qty'     => 1,
            'price'   => $item['item_price'],
            'name'    => $item['item_name'],
        );

        $this->cart->insert($data);
        redirect('item/view/' . $id);
    }

    // Removes all items in cart
    function empty_cart()
    {
        $this->cart->destroy();
        $this->session->set_flashdata('success', 'Cart Cleared');
        redirect('site');
    }


    function order(){
        //User needs to be logged in first
        if(!$this->session->userdata('is_logged_in')){
            //Save user agent data for page they are currently on
            redirect('login');
        }
        else{

            //Delivery information form
            //Get user delivery addresses

            $address1 = array(
                'id' => 0,
                'address1' => "Apt 2 patricks street",
                'address2' => "Cork City",
                'city' => 'Cork',
                'county' => 'Cork',
                'country' => 'Ireland',
                'isDefault' => 0
            );

            $address2 = array(
                'id' => 1,
                'address1' => "Apt 2 patricks street",
                'address2' => "Cork City",
                'city' => 'Cork',
                'county' => 'Cork',
                'country' => 'Ireland',
                'isDefault' => 1
            );

            $data['delivery_addresses'] = array(
                $address1,
                $address2
            );

            //get user from db to populate fields with user information in form

            $data['main_content'] = 'store/order';
            $this->load->view('includes/template', $data, $this->globals);
        }
        //Redirect to login if not logged in and save user agent location for redirect
        //Once logged in, display cart contents followed by form to input delivery data.
        //Button to "Pay Now" which goes to success page if all validates.
    }

    function confirm_order(){
        $addressID = $this->input->post('address');
        //Ger the address from the model

        //Get user input details from --> input
        $data = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'email' => $this->input->post('email'),
            'address' => $this->address_model->get($addressID)
        );

        $data['main_content'] = 'store/confirm';
        $this->load->view('includes/template', $data, $this->globals);

    }

    //Testing Ajax
    function foo(){

        if ($this->input->is_ajax_request()) {
            header('Content-Type: application/x-json; charset=utf-8');
            echo(json_encode($this->item_model->foo()));

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

        $this->session->set_flashdata('success', "Cat: " . $categoryID. " brand: " . $brandID . " price: " . $price);

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