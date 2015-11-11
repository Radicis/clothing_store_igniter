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

    //Returns stock items with stock >0 for given item id
    public function get_by_item_id($id = FALSE)
    {
        if (!$id)
        {
            $query = $this->db->get('stock');
            return $query->result_array();
        }

        //$this->db->where('stock > 0');
        $this->db->where('itemID', $id);
        $this->db->where('stock >0');
        $query = $this->db->get('stock');

        return $query->result_array();
    }

    //Returns ALL stock items for given item id
    public function get_by_item_id_all($id = FALSE)
    {
        if (!$id)
        {
            $query = $this->db->get('stock');
            return $query->result_array();
        }

        //$this->db->where('stock > 0');
        $this->db->where('itemID', $id);
        $this->db->where('stock >0');
        $query = $this->db->get('stock');

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


    function create($data)
    {
        $this->db->insert('stock', $data);
        return $this->db->insert_id();
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


    function delete_by_id($id){
        return $this->db->delete('stock', array('itemID' => $id));
    }

}