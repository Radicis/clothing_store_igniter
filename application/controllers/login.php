<?php



class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

    }

    function index()
    {
        $data['main_content'] =  'security/login_form';
        $this->load->view('includes/template', $data);
    }

    function validate_credentials()
    {

        $this->load->model('user_model');
        $query = $this->user_model->validate();

        if($query)
        {
            $data = array(
                'username' => $this->input->post('username'),
                'is_logged_in' => true
            );
            $this->session->set_userdata($data);

            redirect('site/admin_area');
        }

        else
        {
            $this->index();
        }
    }

    function signup()
    {
        $data['main_content'] = 'security/signup_form';
        $this->load->view('includes/template', $data);

    }

    function logout()
    {
        $user_data = $this->session->all_userdata();
        foreach ($user_data as $key => $value) {
            if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
                $this->session->unset_userdata($key);
            }
        }
        $this->session->sess_destroy();
        redirect('site');
    }

    function create_member()
    {
        $this->load->library('form_validation');
        // field name, error message, validation rules

        $this->form_validation->set_rules('first_name', 'Name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]');
        $this->form_validation->set_rules('password2', 'Password Confirm', 'trim|required|matches[password]');

        if($this->form_validation->run() == FALSE)
        {
            $this->signup();
        }
        else
        {
            $this->load->model('user_model');
            if($query = $this->user_model->create_user())
            {
                $data['main_content'] = 'security/signup_successful';
                $this->load->view('includes/template', $data);
            }
            else
            {
                $this->load->view('security/signup_form');
            }
        }

    }
}