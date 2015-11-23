<?php

class Payment_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function record_count() {
        return $this->db->count_all("payment");
    }

    public function get($id = FALSE)
    {
        if (!$id)
        {
            $query = $this->db->get('payment');
            return $query->result_array();
        }

        $query = $this->db->get_where('payment', array('id' => $id));
        return $query->row_array();
    }


    //used for pagination
    function get_items($limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get("payment");
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
        $this->db->insert('payment', $data);
        return $this->db->insert_id();
    }


    function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('payment', $data);
    }


    function delete($id)
    {
        return $this->db->delete('payment', array('id' => $id));
    }

}