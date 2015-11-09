<?php

class Stock_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function record_count() {
        return $this->db->count_all("stock");
    }

    public function get_by_item_id($id = FALSE)
    {
        if (!$id)
        {
            $query = $this->db->get('stock');
            return $query->result_array();
        }

        //$this->db->where('stock > 0');
        $query = $this->db->get_where('stock', array('itemID' => $id));

        return $query->result_array();
    }

    public function get($id = FALSE)
    {
        if (!$id)
        {
            $query = $this->db->get('stock');
            return $query->result_array();
        }

        //$this->db->where('stock > 0');
        $query = $this->db->get_where('stock', array('id' => $id));

        return $query->row_array();
    }

    public function get_item($id = FALSE)
    {
        if (!$id)
        {
            $query = $this->db->get('stock');
            return $query->result_array();
        }

        //$this->db->where('stock > 0');
        $query = $this->db->get_where('stock', array('id' => $id));

        return $query->result_array();
    }


    //used for pagination
    public function get_items($limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get("stock");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }


    function create()
    {

    }



    function update($id, $data)
    {

        $this->db->where('id', $id);
        $this->db->update('stock', $data);
    }

    function delete($id)
    {
        return $this->db->delete('stock', array('id' => $id));
    }

}