<?php


class Stock extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->model('stock_model');
        $this->load->helper('url_helper');
        $this->load->library('user_agent');
    }


    function create()
    {

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('item_name', 'Name', 'required');
        $this->form_validation->set_rules('item_description', 'Description');
        $this->form_validation->set_rules('item_price', 'Price', 'trim|required|numeric');
        $this->form_validation->set_rules('categoryID', 'Category', 'required');
        $this->form_validation->set_rules('brandID', 'Brand', 'required');

        if ($this->form_validation->run() === FALSE) {

            $data['main_content'] = 'admin/stock_create';
            $this->load->view('includes/admin/template', $data, $this->globals);
        } else {
            $data = array(
                'item_name' => $this->input->post('item_name'),
                'item_price' => $this->input->post('item_price'),
                'image_large' => $this->input->post('image_large'),
                'item_description' => $this->input->post('item_description'),
                'categoryID' => $this->input->post('categoryID'),
                'brandID' => $this->input->post('brandID')
            );
            $insert_id = $this->stock_model->create($data);
            $this->session->set_flashdata('success', 'Item Added');
            $this->view($insert_id);

        }
    }

    function update($id = null)
    {

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('item_name', 'Name', 'required');
        $this->form_validation->set_rules('item_description', 'Description');
        $this->form_validation->set_rules('item_price', 'Price', 'trim|required|numeric');
        $this->form_validation->set_rules('categoryID', 'Category', 'required');
        $this->form_validation->set_rules('brandID', 'Brand', 'required');

        if ($this->form_validation->run() === FALSE) {
            $data['item'] = $this->stock_model->get_item($id);
            $data['main_content'] = 'admin/item_update';
            $this->load->view('includes/admin/template', $data, $this->globals);
        } else {
            $data = array(
                'item_name' => $this->input->post('item_name'),
                'item_price' => $this->input->post('item_price'),
                'image_large' => $this->input->post('image_large'),
                'item_description' => $this->input->post('item_description'),
                'categoryID' => $this->input->post('categoryID'),
                'brandID' => $this->input->post('brandID'),
            );


            $this->stock_model->update($id, $data);
            $this->session->set_flashdata('success', 'Item Updated');

            if ($this->session->userdata('redirect_back')) {
                $redirect_url = $this->session->userdata('redirect_back');  // grab value and put into a temp variable so we unset the session value
                $this->session->unset_userdata('redirect_back');
                redirect($redirect_url);
            }

            $this->view($id);

        }
    }

    function delete($id = null)
    {
        $this->stock_model->delete($id);
        $this->session->set_flashdata('success', 'Item Deleted');
        redirect($this->agent->referrer());

    }

}