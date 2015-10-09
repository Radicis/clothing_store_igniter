<?php

class Category_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();

    }

    public function get_item($id = FALSE)
    {
        if (!$id)
        {
            $query = $this->db->get('category');
            return $query->result_array();
        }

        $query = $this->db->get_where('category', array('id' => $id));
        return $query->row_array();
    }


    function set_item()
    {
        $this->load->helper('url');

        $data = array(
            'name' => $this->input->post('category_name'),
            'parentID' => $this->input->post('parentID')
        );

        return $this->db->insert('category', $data);
    }



    function update_item()
    {

    }

    function delete_item()
    {

    }

}