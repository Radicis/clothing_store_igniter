<?php



class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('user_agent');

    }

    function index()
    {
        $data['main_content'] =  'security/login_form';
        $this->session->set_userdata('redirect_back', $this->agent->referrer() );
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
                'is_logged_in' => true,
                'isAdmin' => $this->user_model->isAdmin()
            );

            if($this->user_model->isAdmin()){
                $this->session->set_flashdata('info', 'Admin Logged in');
            }



            $this->session->set_userdata($data);
            $this->session->set_flashdata('success', 'Login Successful');


            if( $this->session->userdata('redirect_back') ) {
                $redirect_url = $this->session->userdata('redirect_back');  // grab value and put into a temp variable so we unset the session value
                $this->session->unset_userdata('redirect_back');
                redirect( $redirect_url );
            }


            if($this->user_model->isAdmin()){
                redirect('admin');
            }



            redirect('site');
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