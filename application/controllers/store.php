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
        $this->form_validation->set_rules('item_price', 'Price', 'required');
        $this->form_validation->set_rules('categoryID', 'Category', 'required');
        $this->form_validation->set_rules('brandID', 'Brand', 'required');

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
                $this->session->set_flashdata('success', 'Item Added');
                $this->view($insert_id);

        }
    }

    function update_item($id=null){

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('item_name', 'Name', 'required');
        $this->form_validation->set_rules('item_price', 'Price', 'required');
        $this->form_validation->set_rules('categoryID', 'Category', 'required');
        $this->form_validation->set_rules('brandID', 'Brand', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $data['item'] = $this->item_model->get_item($id);

            $data['categories'] = $this->category_model->get_item();
            $data['brands'] = $this->brand_model->get_item();
            $this->load->view('includes/header');
            $this->load->view('admin/item_update', $data);
            $this->load->view('includes/footer');
        }
        else
        {
            $data = array(
                'item_name' => $this->input->post('item_name'),
                'item_price' => $this->input->post('item_price'),
                'item_description' => $this->input->post('item_description'),
                'categoryID' => $this->input->post('categoryID'),
                'brandID' => $this->input->post('brandID'),
            );


                $this->item_model->update($id, $data);
            $this->session->set_flashdata('success', 'Item Updated');

            if( $this->session->userdata('redirect_back') ) {
                $redirect_url = $this->session->userdata('redirect_back');  // grab value and put into a temp variable so we unset the session value
                $this->session->unset_userdata('redirect_back');
                redirect( $redirect_url );
            }

            $this->view($id);

        }
    }

    function delete_item($id = null) {
        $status = $this->item_model->delete($id);
        //header('Content-type: application/json');
        //echo json_encode(array("success" => $status));
        $this->session->set_flashdata('success', 'Item Deleted');
        redirect($this->agent->referrer());
        //redirect('admin/show/items');
    }

    function add_rating($id = NULL)
    {
        $item = $this->item_model->get_item($id);
        $rating = $item['rating'];
        $value = 1;
        $this->item_model->add_rating($id, $rating, $value);
        $this->session->set_flashdata('success', 'Rating Added');

        redirect($this->agent->referrer());
    }

    function remove_rating($id = NULL)
    {
        $item = $this->item_model->get_item($id);
        $rating = $item['rating'];
        $value = -1;
        $this->item_model->add_rating($id, $rating, $value);
        $this->session->set_flashdata('success', 'Rating Added');


        redirect($this->agent->referrer());
    }


}