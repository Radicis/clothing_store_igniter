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

    public function record_count_price($price=FALSE) {
        if(!$price) {
            return $this->db->count_all("store_items");
        }
        else{

            //may need to modify query 
            $query =  $this->db->get_where('store_items', array('item_price'>=$price));
            return $query->num_rows();
        }
    }

    public function record_count_brand($brand=FALSE) {
        if(!$brand) {
            return $this->db->count_all("store_items");
        }
        else{
            $query =  $this->db->get_where('store_items', array('brandID' =>$brand));
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

    //Testing filter functions
    public function foo(){
        $this->db->select('item_price');
        $this->db->from('store_items');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    //testing multiple filters
    public function get_filter_items($categoryID='%', $brandID='%', $price=0)
    {

        $this->db->select('*');
        $this->db->from('store_items');

                if($categoryID!=False) {
                    $this->db->where('categoryID like '.  $categoryID);
                }
                if($brandID!=False) {
                    $this->db->where('brandID like '.  $brandID);
                }
                if($price!=False) {
                   $this->db->where('item_price > ', (float)$price);
                }

        //$this->db->limit($limit, $start);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;

    }

    //limit and start ued for pagination
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

    function get_by_price($limit, $start, $price=FALSE){
        $this->db->limit($limit, $start);

        if(!$price){

            $query = $this->db->get("store_items");
        }

        else{
            $this->db->select('*');
            $this->db->from('store_items');
            $this->db->where('item_price <', (float)$price);
            $query=$this->db->get();
        }

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function get_by_brand($limit, $start, $brand= FALSE)
    {
        $this->db->limit($limit, $start);

        if(!$brand){

            $query = $this->db->get("store_items");
        }

        else{

            $query = $this->db->get_where('store_items', array('brandID' => $brand));
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
            'image_large' => $this->input->post('image_large'),
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

    function update($id, $data)
    {
        $this->load->helper('url');

        $this->db->where('id', $id);
        $this->db->update('store_items', $data);

    }
    function delete($id)
    {
        return $this->db->delete('store_items', array('id' => $id));
    }



}