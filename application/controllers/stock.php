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


    function create($id = NULL)
    {
        $this->is_admin();

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('size', 'size', 'required');
        $this->form_validation->set_rules('colour', 'Colour', 'required');
        $this->form_validation->set_rules('stock', 'Stock', 'trim|required|numeric');


        if ($this->form_validation->run() === FALSE) {
            $data['itemID'] = $id;
            $data['main_content'] = 'admin/stock_create';
            $this->load->view('includes/admin/template', $data, $this->globals);
        } else {
            $data = array(
                'size' => $this->input->post('size'),
                'colour' => $this->input->post('colour'),
                'stock' => $this->input->post('stock'),
                'itemID' => $this->input->post('itemID'),
            );
            $insert_id = $this->stock_model->create($data);
            $this->session->set_flashdata('success', 'Stock Added');
            redirect('item/stock/' . $this->input->post('itemID'));

        }
    }

    function update($id = null)
    {

        $this->is_admin();

        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['item'] = $this->stock_model->get($id);
        $itemID = $data['item']['itemID'];

        $this->form_validation->set_rules('size', 'Size', 'required');
        $this->form_validation->set_rules('colour', 'Colour');
        $this->form_validation->set_rules('stock', 'Stock', 'trim|required|numeric');

        if ($this->form_validation->run() === FALSE) {
            $data['itemID'] = $data['item']['itemID'];
            $data['main_content'] = 'admin/stock_update';
            $this->load->view('includes/admin/template', $data, $this->globals);
        } else {
            $data = array(
                'colour' => $this->input->post('colour'),
                'size' => $this->input->post('size'),
                'stock' => $this->input->post('stock'),
            );
            $this->stock_model->update($id, $data);
            $this->session->set_flashdata('success', 'Stock Updated');
            redirect('item/stock/' . $itemID);
        }
    }

    function delete($id = null)
    {
        $this->is_admin();

        $this->stock_model->delete($id);
        $this->session->set_flashdata('success', 'Item Deleted');
        redirect($this->agent->referrer());

    }

    function set_stock($id=NULL){
        //same as update, just sets stock level
    }

}