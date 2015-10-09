<?php

class Item_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();

    }

    public function record_count($category=FALSE) {
        if(!$category) {
            return $this->db->count_all("store_items");
        }
        else{
            $query =  $this->db->get_where('store_items', array('categoryID'=>$category));
            return $query->num_rows();
        }
    }

    public function get_item($id = FALSE)
    {
        if (!$id)
        {
            $query = $this->db->get('store_items');
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                return $data;
            }
            return false;

        }

        $query = $this->db->get_where('store_items', array('id' => $id));
        return $query->row_array();
    }

    //used for pagination
    public function get_items($limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get("store_items");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    //used for pagination
    public function get_category_items($limit, $start, $category= FALSE)
    {
        $this->db->limit($limit, $start);

        if(!$category){

            $query = $this->db->get("store_items");
        }

        else{

            $query = $this->db->get_where('store_items', array('categoryID' => $category));
        }

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
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

    function update($id)
    {
        $this->load->helper('url');

        $data = array(
            'item_name' => $this->input->post('item_name'),
            'item_price' => $this->input->post('item_price'),
            'item_description' => $this->input->post('item_description'),
            'categoryID' => $this->input->post('categoryID'),
            'brandID' => $this->input->post('brandID')
        );

        $this->db->where('id', $id);
        $this->db->update('store_items', $data);

    }
    function delete($id)
    {
        return $this->db->delete('store_items', array('id' => $id));
    }

}