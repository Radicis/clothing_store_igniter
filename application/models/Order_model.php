<?php

class Order_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
        $this->load->model('orderItem_model');

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

    //Testing filter functions
    public function get_dates(){
        $this->db->select('date');
        $this->db->from('orders');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function get_by_userID($id = FALSE)
    {
        if (!$id)
        {
            $query = $this->db->get('orders');
            return $query->result_array();
        }

        $this->db->where('userID', $id);
        $query = $this->db->get('orders');
        return $query->result_array();
    }



    //used for pagination
    function get_items($limit, $start)
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

    function update_total($id, $total){
        $this->db->where('id', $id);
        $this->db->update('orders', $total);
    }

    function set_paid($id){
        $this->db->set('isPaid', true, FALSE);
        $this->db->where('id', $id);
        $this->db->update('orders');
    }

    function delete($id)
    {
        return $this->db->delete('orders', array('id' => $id));
    }

}