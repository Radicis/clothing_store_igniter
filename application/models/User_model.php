<?php

class User_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function record_count() {
        return $this->db->count_all("user");
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

    function isAdmin(){
        $this->db->where('username', $this->input->post('username'));
        $this->db->where('password', md5($this->input->post('password')));
        $query = $this->db->get('user');

        foreach ($query->result() as $row)
        {
            if($row->isAdmin==1) {
                return TRUE;
            }
            else{
                return FALSE;
            }
        }

    }

    function getUserID($username){
        $this->db->where('username', $username);
        $query = $this->db->get('user');

        foreach ($query->result() as $row)
        {
            return $row->id;
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

    public function get($id = NULL)
    {
        if (!$id)
        {
            $query = $this->db->get('user');
            return $query->result_array();
        }

        $query = $this->db->get_where('user', array('id' => $id));
        return $query->row_array();
    }


    //used for pagination
    public function get_items($limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get("user");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }


    function update($id, $data){
        $this->db->where('id', $id);
        $this->db->update('user', $data);
    }

    function delete($id){
        return $this->db->delete('user', array('id' => $id));
    }


}