<?php


class Address extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('address_model');
        $this->load->helper('url_helper');
        $this->load->library('user_agent');
    }


    function create()
    {

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('address1', 'Name', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('county', 'County', 'required');
        $this->form_validation->set_rules('country', 'Country', 'required');


        if ($this->form_validation->run() === FALSE) {
            $data['main_content'] = 'user/add_address';
            $this->load->view('includes/template', $data, $this->globals);
        } else {
            $data = array(
                'userID' => $this->session->userdata('userID'),
                'address1' => $this->input->post('address1'),
                'address2' => $this->input->post('address2'),
                'city' => $this->input->post('city'),
                'county' => $this->input->post('county'),
                'country' => $this->input->post('country'),
            );
            $insert_id = $this->address_model->create($data);
            $this->session->set_flashdata('success', 'Address Added');
            redirect('user');

        }
    }

    function update($id = null)
    {

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Name', 'required');


        if ($this->form_validation->run() === FALSE) {
            $data['brand'] = $this->brand_model->get($id);

            $data['main_content'] = 'admin/brand_update';
            $this->load->view('includes/admin/template', $data, $this->globals);
        } else {
            $data = array(
                'name' => $this->input->post('name'),

            );

            $this->address_model->update($id, $data);
            $this->session->set_flashdata('success', 'Address Updated');

            if ($this->session->userdata('redirect_back')) {
                $redirect_url = $this->session->userdata('redirect_back');  // grab value and put into a temp variable so we unset the session value
                $this->session->unset_userdata('redirect_back');
                redirect($redirect_url);
            }

            redirect('admin/show/brands');

        }
    }

    function delete($id = null)
    {
        $this->brand_model->delete($id);
        $this->session->set_flashdata('success', 'Address Deleted');
        redirect($this->agent->referrer());

    }

    function makeDefault($id=null){
        //set address with given id to default
        $data = array(
            'isDefault' => 0,
        );

        $userID = $this->session->userdata('userID');

        $addresses = $this->address_model->get_by_userID($userID);

        foreach($addresses as $address){
            $this->address_model->update($address['id'], $data);
        }

        //set address with given id to default
        $data = array(
            'isDefault' => 1,
        );

        $this->address_model->update($id, $data);

        redirect($this->agent->referrer());

    }

}