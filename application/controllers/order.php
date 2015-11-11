<?php


class Order extends MY_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->model('stock_model');
        $this->load->model('address_model');
        $this->load->model('delivery_model');
        $this->load->model('orderItem_model');
        $this->load->model('order_model');
        $this->load->helper('url_helper');
        $this->load->library('user_agent');
    }

    function index(){

    }

    //Views all of the orders on the admin page
    function view($id = NULL)
    {
        $data['order'] = $this->order_model->get($id);
        $data['delivery'] = $this->delivery_model->get($data['order']['deliveryType']);

        $data['address'] = $this->address_model->get($data['order']['address']);

        $data['order_items'] = $this->orderItem_model->get_by_orderID($id);

        if (empty($data['order']))
        {
            show_404();
        }
        $data['main_content'] = 'admin/order_view';
        $this->load->view('includes/admin/template', $data, $this->globals);
    }


    function order(){
        //Displays error if not items in cart
        if($this->cart->total_items()<1){
            $this->session->set_flashdata('error', 'No Items in Cart');
            redirect('store/view_cart');
        }

        //User needs to be logged in first
        if(!$this->session->userdata('is_logged_in')){
            //Save user agent data for page they are currently on
            redirect('login');
        }
        else{

            $userID =  $this->session->userdata('userID');

            $data['delivery_addresses'] = $this->address_model->get_by_userID($userID);

            $data['main_content'] = 'store/order';
            $this->load->view('includes/template', $data, $this->globals);
        }
    }

    function confirm_order(){

        $this->load->library('form_validation');

        $this->form_validation->set_rules('first_name', 'Name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if($this->form_validation->run() == FALSE)
        {
            $this->order();
        }
        else
        {
            $addressID = $this->input->post('address');

            $delivery = $this->delivery_model->get($this->input->post('deliveryID'));


            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'address' => $this->address_model->get($addressID),
                'total_cost' => $this->input->post('total_cost'),
                'delivery_cost' => $delivery['cost']
            );

            $data['main_content'] = 'store/confirm';
            $this->load->view('includes/template', $data, $this->globals);

        }
    }

    //Writes the order to the DB
    function create_order(){
        $addressID = $this->input->post('address');

        $data = array(
            'userID' =>  $this->session->userdata('userID'),
            'address' => $addressID,
            'first_name' => $this->input->post('first_name'),
            'last_name' =>$this->input->post('last_name'),
            'email' =>$this->input->post('email'),
            'total' =>$this->input->post('total_cost'),
            'deliveryType' =>$this->input->post('deliveryID')
        );

        //Return last insert
        $orderID = $this->order_model->create($data);

        $data['total'] = 0;

        foreach($this->cart->contents() as $item){
            $item_data = array(
                'qty' => $item['qty'],
                'name' => $item['name'],
                'subtotal' => $item['subtotal'],
                'price' => $item['price'],
                'orderID' => $orderID,
                'stockID' => $item['id']
            );
            $this->orderItem_model->create($item_data);

            //Reduce stock on stock item
            $this->stock_model->reduce_stock($item['id'], $item['qty']);

        }

        //Clear cart
        $this->cart->destroy();

        $data['main_content'] = 'store/order_success';
        $this->load->view('includes/template', $data, $this->globals);
    }

    function delete($id = null)
    {
        if($this->order_model->delete($id)){
            echo "foo";
            $this->orderItem_model->delete_by_order($id);
        };
        $this->session->set_flashdata('success', 'Order Deleted');
        redirect($this->agent->referrer());
    }

    //Sets the payment status of the order to true
    function pay($id = NULL){
        $this->order_model->set_paid($id);
        redirect($this->agent->referrer());
    }
}