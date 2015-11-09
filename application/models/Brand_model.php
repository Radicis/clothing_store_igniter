<?php

class Brand_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();

    }

    public function record_count() {
        return $this->db->count_all("brand");
    }

    public function get($id = FALSE)
    {
        if (!$id)
        {
            $query = $this->db->get('brand');
            return $query->result_array();
        }

        $query = $this->db->get_where('brand', array('id' => $id));
        return $query->row_array();
    }



    //used for pagination
    public function get_items($limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get("brand");
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
        $data = array(
            'name' => $this->input->post('name'),
        );
        return $this->db->insert('brand', $data);
    }



    function update($id, $data)
    {
        $data = array(
            'name' => $this->input->post('name')
        );

        $this->db->where('id', $id);
        $this->db->update('brand', $data);
    }

    function delete($id)
    {
        return $this->db->delete('brand', array('id' => $id));
    }

}