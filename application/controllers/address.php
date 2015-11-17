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

        $this->form_validation->set_rules('address1', 'Name', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('county', 'County', 'required');
        $this->form_validation->set_rules('country', 'Country', 'required');


        if ($this->form_validation->run() === FALSE) {
            $data['address'] = $this->address_model->get($id);

            $data['main_content'] = 'user/update_address';
            $this->load->view('includes/template', $data, $this->globals);
        } else {
            $data = array(
                'userID' => $this->session->userdata('userID'),
                'address1' => $this->input->post('address1'),
                'address2' => $this->input->post('address2'),
                'city' => $this->input->post('city'),
                'county' => $this->input->post('county'),
                'country' => $this->input->post('country')
            );
            $this->address_model->update($id, $data);
            $this->session->set_flashdata('success', 'Address Updated');
            redirect('user');

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