<?php

class Category_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();

    }

    public function record_count() {
        return $this->db->count_all("category");
    }

    public function get($id = FALSE)
    {
        if (!$id)
        {
            $query = $this->db->get('category');
            return $query->result_array();
        }

        $query = $this->db->get_where('category', array('id' => $id));
        return $query->row_array();
    }

    //used for pagination
    public function get_items($limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get("category");
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
        return $this->db->insert('category', $data);
    }


    function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('category', $data);
    }

    function delete($id)
    {
        return $this->db->delete('category', array('id' => $id));
    }

}