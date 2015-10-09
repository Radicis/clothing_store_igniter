<?php

class Item_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();

    }

    public function get_item($id = FALSE)
    {
        if (!$id)
        {
            $query = $this->db->get('store_items');
            return $query->result_array();
        }

        $query = $this->db->get_where('store_items', array('id' => $id));
        return $query->row_array();
    }



    function set_item()
    {
        $this->load->helper('url');

        //Add rules

        $data = array(
            'item_name' => $this->input->post('item_name'),
            'item_price' => $this->input->post('item_price'),
            'item_description' => $this->input->post('item_description'),
            'categoryID' => $this->input->post('categoryID'),
            'brandID' => $this->input->post('brandID')
        );

        $this->db->insert('store_items', $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }


    function add_rating($id, $rating, $value)
    {
        //get current rating
        $query = $this->db->get_where('store_items', array('id' => $id));
        if($query)
        {
            // + or - it
            $rating += $value;
            // set new value
            $data = array(
                'rating'	=>	$rating
            );
            $this->db->where('id',$id);
            return $this->db->update('store_items',$data);
        }
        else
        {
            //404 or die
            return false;
        }

    }

    function update_item()
    {

    }

    function delete_item()
    {

    }

}