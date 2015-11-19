<?php


class Category extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('category_model');
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
            $data['main_content'] = 'admin/category_create';
            $this->load->view('includes/admin/template', $data, $this->globals);
        } else {
            $data = array(
                'name' => $this->input->post('name'),
                'parentID' => $this->input->post('parentID')
            );
            $insert_id = $this->category_model->create($data);
            $this->session->set_flashdata('success', 'Category Added');
            redirect('admin/show/categories');

        }
    }

    function update($id = null)
    {

        $this->is_admin();

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Name', 'required');


        if ($this->form_validation->run() === FALSE) {
            $data['thisCategory'] = $this->category_model->get($id);
            $data['main_content'] = 'admin/category_update';
            $this->load->view('includes/admin/template', $data, $this->globals);
        } else {
            $data = array(
                'name' => $this->input->post('name'),
                'parentID' => $this->input->post('parentID')
            );

            $this->category_model->update($id, $data);
            $this->session->set_flashdata('success', 'Category Updated');

            if ($this->session->userdata('redirect_back')) {
                $redirect_url = $this->session->userdata('redirect_back');  // grab value and put into a temp variable so we unset the session value
                $this->session->unset_userdata('redirect_back');
                redirect($redirect_url);
            }

            redirect('admin/show/categories');

        }
    }

    function delete($id = null)
    {
        $this->is_admin();

        $this->category_model->delete($id);
        $this->session->set_flashdata('success', 'Category Deleted');
        redirect($this->agent->referrer());

    }

}