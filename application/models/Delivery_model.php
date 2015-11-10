<?php

class Delivery_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function record_count() {
        return $this->db->count_all("delivery");
    }

    public function get($id = FALSE)
    {
        if (!$id)
        {
            $query = $this->db->get('delivery');
            return $query->result_array();
        }

        $query = $this->db->get_where('delivery', array('id' => $id));
        return $query->row_array();
    }

    public function get_by_userID($id = FALSE)
    {
        if (!$id)
        {
            $query = $this->db->get('delivery');
            return $query->result_array();
        }

        $this->db->where('userID', $id);
        $query = $this->db->get('delivery');
        return $query->row_array();
    }



    //used for pagination
    public function get_items($limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get("delivery");
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
        return $this->db->insert('delivery', $data);
    }
    

    function update($id, $data)
    {

        $this->db->where('id', $id);
        $this->db->update('delivery', $data);
    }

    function delete($id)
    {
        return $this->db->delete('delivery', array('id' => $id));
    }

}