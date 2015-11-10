<?php

class Address_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();

    }

    public function record_count() {
        return $this->db->count_all("address");
    }

    public function get($id = FALSE)
    {
        if (!$id)
        {
            $query = $this->db->get('address');
            return $query->result_array();
        }

        $query = $this->db->get_where('address', array('id' => $id));
        return $query->row_array();
    }



    //used for pagination
    public function get_items($limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get("address");
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

    public function get_by_userID($id = FALSE)
    {
        if (!$id)
        {
            $query = $this->db->get('address');
            return $query->result_array();
        }

        $this->db->where('userID', $id);
        $query = $this->db->get('address');
        return $query->result_array();
    }



    function update($id, $data)
    {

        $this->db->where('id', $id);
        $this->db->update('address', $data);
    }

    function delete($id)
    {
        return $this->db->delete('address', array('id' => $id));
    }

}