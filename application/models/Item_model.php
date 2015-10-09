<?php

class Item_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();

    }

    public function get_item($id = FALSE)
    {
        if (!$id)
        {
            $query = $this->db->get('store_items');
            return $query->result_array();
        }

        $query = $this->db->get_where('store_items', array('id' => $id));
        return $query->row_array();
    }

}