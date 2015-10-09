<?php

class Brand_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_item($id = FALSE)
    {
        if (!$id)
        {
            $query = $this->db->get('brand');
            return $query->result_array();
        }

        $query = $this->db->get_where('brand', array('id' => $id));
        return $query->row_array();
    }


    function set_item()
    {
        $this->load->helper('url');

        $data = array(
            'name' => $this->input->post('brand_name'),
        );

        return $this->db->insert('brand', $data);
    }



    function update_item()
    {

    }

    function delete_item()
    {

    }

}