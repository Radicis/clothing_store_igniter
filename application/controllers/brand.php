<?php


class Brand extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('brand_model');
        $this->load->helper('url_helper');
        $this->load->library('user_agent');
    }


    function create()
    {
        $this->is_admin();
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Name', 'required');


        if ($this->form_validation->run() === FALSE) {
            $data['main_content'] = 'admin/brand_create';
            $this->load->view('includes/admin/template', $data, $this->globals);
        } else {
            $insert_id = $this->brand_model->create();
            $this->session->set_flashdata('success', 'Brand Added');
            redirect('admin/show/brands');

        }
    }

    function update($id = null)
    {

        $this->is_admin();
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

            $this->brand_model->update($id, $data);
            $this->session->set_flashdata('success', 'Brand Updated');

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
        $this->is_admin();
        $this->brand_model->delete($id);
        $this->session->set_flashdata('success', 'Brand Deleted');
        redirect($this->agent->referrer());

    }

}