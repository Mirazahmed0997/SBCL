<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_controller extends CI_Controller
{
    private $main_layout = 'site/master_layout';
    private $header = 'site/header';
    private $footer = 'site/footer';
    private $serverDateTime = '';
    public function __construct()
    {
        parent::__construct();
    }



    public function place_order()
    {
        $user = $this->session->userdata('login_user_info_all');

        if (!$user) {
            redirect('login');
        }

        $user_id=$user->id;

        //  echo '<pre>';
        // print_r($user->id);
        // exit;

        $name = $this->input->post('name');
        $mobile_number = $this->input->post('mobile_number');
        $address = $this->input->post('address');
        $delivery_area = $this->input->post('delivery_area');
        $payment_method = $this->input->post('payment_method');




        $this->db->select('cart_items.*, products.price');
        $this->db->from('cart_items');
        $this->db->join('products', 'products.id = cart_items.product_id');
        $this->db->where('cart_items.user_id', $user->id);

        $cart_items = $this->db->get()->result();


        if (empty($cart_items)) {
            redirect('my_carts');
        }

        $total = 0;
        foreach ($cart_items as $item) {
            $total += $item->price * $item->quantity;
        }


        if ($delivery_area == 'inside') {
            $total += 60;
        } else {
            $total += 120;
        }







        // $this->db->trans_start();

        $order_data = [
            'user_id' => $user_id,
            'total_amount' => $total,
            'name' => $name,
            'mobile_number' => $mobile_number,
            'address' => $address,
            'payment_method' => $payment_method,
        ];



        $this->db->insert('orders_table', $order_data);
        $order_id = $this->db->insert_id();

        

        foreach ($cart_items as $item) {
            $item_data = [
                'order_id' => $order_id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->price
            ];

            $this->db->insert('order_items', $item_data);
        }

        $this->db->where('user_id', $user->id);
        $this->db->delete('cart_items');

        // echo '<pre>';
        // print_r($order_data);
        // exit;

        // $this->db->trans_complete();
        redirect('my_orders');
    }


    public function success()
    {
        $this->load->view('order_success');
    }


   


   

}