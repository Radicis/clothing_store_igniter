<?php


class Item extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->model('stock_model');
        $this->load->helper('url_helper');
        $this->load->library('user_agent');
    }

    function view($id = NULL)
    {
        $data['item'] = $this->item_model->get_item($id);
		
		$recent_items = $this->item_model->get_item();
		
		$data['recent_items'] = array(
			$recent_items[0],
			$recent_items[1],
			$recent_items[2]
		);

        $data['stock'] = $this->stock_model->get_by_item_id($id);

        $categoryID = $data['item']['categoryID'];
        $brandID = $data['item']['brandID'];

        $data["categories"] = $this->category_model->get($categoryID);
        $data["brands"] = $this->brand_model->get($brandID);

        if (empty($data['item']))
        {
            show_404();
        }
        $data['main_content'] = 'store/view';
        $this->load->view('includes/template', $data, $this->globals);
    }

    //Views all of the related stock items to the given item ID - Admin
    function stock($id = NULL){
        if($id){
            $data['itemID'] = $id;
            $data['stock'] = $this->stock_model->get_by_item_id_all($id);
            $data['main_content'] = 'admin/stock';
            $this->load->view('includes/admin/template', $data, $this->globals);
        }
        else{
            show_404();
        }
    }

    function create_item()
    {

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('item_name', 'Name', 'required');
        $this->form_validation->set_rules('item_description', 'Description');
        $this->form_validation->set_rules('item_price', 'Price', 'trim|required|numeric');
        $this->form_validation->set_rules('categoryID', 'Category', 'required');
        $this->form_validation->set_rules('brandID', 'Brand', 'required');

        if ($this->form_validation->run() === FALSE) {

            $data['main_content'] = 'admin/item_create';
            $this->load->view('includes/admin/template', $data, $this->globals);
        } else {
            $data = array(
                'item_name' => $this->input->post('item_name'),
                'item_price' => $this->input->post('item_price'),
                'image_large' => $this->input->post('image_large'),
                'item_description' => $this->input->post('item_description'),
                'categoryID' => $this->input->post('categoryID'),
                'brandID' => $this->input->post('brandID')
            );
            $insert_id = $this->item_model->set_item($data);
            $this->session->set_flashdata('success', 'Item Added');
            $this->view($insert_id);

        }
    }

    function update_item($id = null)
    {

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('item_name', 'Name', 'required');
        $this->form_validation->set_rules('item_description', 'Description');
        $this->form_validation->set_rules('item_price', 'Price', 'trim|required|numeric');
        $this->form_validation->set_rules('categoryID', 'Category', 'required');
        $this->form_validation->set_rules('brandID', 'Brand', 'required');

        if ($this->form_validation->run() === FALSE) {
            $data['item'] = $this->item_model->get_item($id);
            $data['main_content'] = 'admin/item_update';
            $this->load->view('includes/admin/template', $data, $this->globals);
        } else {
            $data = array(
                'item_name' => $this->input->post('item_name'),
                'item_price' => $this->input->post('item_price'),
                'image_large' => $this->input->post('image_large'),
                'item_description' => $this->input->post('item_description'),
                'categoryID' => $this->input->post('categoryID'),
                'brandID' => $this->input->post('brandID'),
            );


            $this->item_model->update($id, $data);
            $this->session->set_flashdata('success', 'Item Updated');

            if ($this->session->userdata('redirect_back')) {
                $redirect_url = $this->session->userdata('redirect_back');  // grab value and put into a temp variable so we unset the session value
                $this->session->unset_userdata('redirect_back');
                redirect($redirect_url);
            }

            $this->view($id);

        }
    }

    function delete_item($id = null)
    {
        if($this->item_model->delete($id)){
            $this->stock_model->delete_by_id($id);
        }
        $this->session->set_flashdata('success', 'Item Deleted');
        redirect($this->agent->referrer());

    }

    function add_rating($id = NULL)
    {
        $item = $this->item_model->get_item($id);
        $rating = $item['rating'];
        $value = 1;
        $this->item_model->add_rating($id, $rating, $value);
        $this->session->set_flashdata('success', 'Rating Added');

        redirect($this->agent->referrer());
    }

    function remove_rating($id = NULL)
    {
        $item = $this->item_model->get_item($id);
        $rating = $item['rating'];
        $value = -1;
        $this->item_model->add_rating($id, $rating, $value);
        $this->session->set_flashdata('success', 'Rating Added');


        redirect($this->agent->referrer());
    }
}