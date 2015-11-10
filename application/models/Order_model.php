<?php

class Order_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();

    }

    public function record_count() {
        return $this->db->count_all("orders");
    }

    public function get($id = FALSE)
    {
        if (!$id)
        {
            $query = $this->db->get('orders');
            return $query->result_array();
        }

        $query = $this->db->get_where('orders', array('id' => $id));
        return $query->row_array();
    }



    //used for pagination
    public function get_items($limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get("orders");
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
        $this->db->insert('orders', $data);
        return $this->db->insert_id();
    }


    function update($id, $data)
    {

        $this->db->where('id', $id);
        $this->db->update('orders', $data);
    }

    function delete($id)
    {
        return $this->db->delete('orders', array('id' => $id));
    }

}