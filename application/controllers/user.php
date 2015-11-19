<?php


class User extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->model('user_model');
        $this->load->model('order_model');
        $this->load->model('address_model');
        $this->load->helper('url_helper');
        $this->load->model('orderItem_model');
        $this->load->library('user_agent');
    }

    function index()
    {
        $this->is_logged_in();

        $data['user'] = $this->user_model->get($this->session->userdata('userID'));
        $data['addresses'] = $this->address_model->get_by_userID($this->session->userdata('userID'));
        $data['orders'] = $this->order_model->get_by_userID($this->session->userdata('userID'));

        $data['main_content'] = 'user/index';

        $this->load->view('includes/template', $data, $this->globals);
    }

    //Displays all of the users to the admin panel
    function show($type=FALSE){

        $this->is_logged_in();

        $this->load->library('pagination');
        $this->load->library('table');

        $config['base_url']=base_url().'index.php/admin/' . $type;

        switch($type){
            case "items": $model = $this->item_model;break;
            case "categories": $model = $this->category_model;break;
            case "brands": $model = $this->brand_model;break;
            case "users": $model = $this->user_model;break;
            case "orders": $model = $this->order_model;break;
        }

        $config["total_rows"] = $model->record_count();
        $config['per_page'] = 50;
        $config['num_links'] = 20;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["items"] = $model->get_items($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();


        $data['main_content'] = 'admin/' . $type;
        $this->load->view('includes/admin/template', $data, $this->globals);
    }

    function update($id=null){

        $this->is_logged_in();

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]');
        $this->form_validation->set_rules('password2', 'Password Confirm', 'trim|required|matches[password]');



        if ($this->form_validation->run() === FALSE) {
            $data['user'] = $this->user_model->get($id);
            $data['main_content'] = 'user/update_profile';
            $this->load->view('includes/template', $data, $this->globals);
        } else {
            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'password' => md5($this->input->post('password'))
            );

            $this->user_model->update($id, $data);
            $this->session->set_flashdata('success', 'Profile Updated');

            redirect('user');

        }
    }

    function delete($id){

        $this->is_logged_in();
        if($this->session->userdata('userID') == $id) {

            if ($this->user_model->delete($id)) {
                $addresses = $this->address_model->get_by_userID($id);
                //Delete all of the users Addresses
                foreach ($addresses as $address) {
                    $this->address_model->delete($address['id']);
                }
            }
            $this->session->sess_destroy();
            redirect('site');
        }
        else{
            redirect('login');
        }
    }

}