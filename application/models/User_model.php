<?php

class User_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    function validate()
    {
        $this->db->where('username', $this->input->post('username'));
        $this->db->where('password', md5($this->input->post('password')));
        $query = $this->db->get('user');

        if($query->num_rows()>0)
        {
            return true;
        }
    }

    function create_user()
    {
        $new_user_insert_data = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'email' => $this->input->post('email'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password'))
        );

        $insert = $this->db->insert('user', $new_user_insert_data);
        return $insert;
    }
}