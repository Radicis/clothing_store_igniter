<?php

class OrderItem_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();

    }

    public function record_count() {
        return $this->db->count_all("order_item");
    }

    public function get($id = FALSE)
    {
        if (!$id)
        {
            $query = $this->db->get('order_item');
            return $query->result_array();
        }

        $query = $this->db->get_where('order_item', array('id' => $id));
        return $query->row_array();
    }



    //used for pagination
    public function get_items($limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get("order_item");
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
        return $this->db->insert('order_item', $data);
    }
    

    function update($id, $data)
    {

        $this->db->where('id', $id);
        $this->db->update('order_item', $data);
    }

    function delete($id)
    {
        return $this->db->delete('order_item', array('id' => $id));
    }

}