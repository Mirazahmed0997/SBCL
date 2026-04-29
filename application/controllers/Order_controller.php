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




    // private function send_order_email($user, $order_id)
    // {
    //     $this->load->library('email');

    //     $this->db->select('order_items.*, products.title');
    //     $this->db->from('order_items');
    //     $this->db->join('products', 'products.id = order_items.product_id');
    //     $this->db->where('order_items.order_id', $order_id);
    //     $items = $this->db->get()->result();

    //     $message = "<h2>Order Confirmation</h2>";
    //     $message .= "<p>Order ID: #{$order_id}</p>";

    //     $message .= "<table border='1' cellpadding='8' cellspacing='0'>
    //     <tr>
    //         <th>Product</th>
    //         <th>Qty</th>
    //         <th>Price</th>
    //     </tr>";

    //     foreach ($items as $item) {
    //         $message .= "<tr>
    //         <td>{$item->title}</td>
    //         <td>{$item->qty}</td>
    //         <td>{$item->price}</td>
    //     </tr>";
    //     }

    //     $message .= "</table>";

    //     $this->email->from('ahmedmiraz87@gmail.com', 'My Shop');
    //     $this->email->to($user->email);
    //     $this->email->subject('Order Confirmation');
    //     $this->email->message($message);

    //     if (!$this->email->send()) {
    //         echo $this->email->print_debugger();
    //         exit;
    //     }
    // }


    private function send_order_email($user, $order_id)
    {
        $this->load->library('email');

        $this->db->where('id', $order_id);
        $order = $this->db->get('orders_table')->row();

        $this->db->select('order_items.*, products.title');
        $this->db->from('order_items');
        $this->db->join('products', 'products.id = order_items.product_id');
        $this->db->where('order_items.order_id', $order_id);
        $items = $this->db->get()->result();

        $data['orders'] = $order;
        $data['items'] = $items;

        $message = $this->load->view('site/pages/invoices/orderInvoices', $data, TRUE);

        $this->email->from('ahmedmiraz87@gmail.com', 'বাংলাদেশ জাতীয় সমবায় ইউনিয়ন');
        $this->email->to($user->email);
        $this->email->subject('Your Order Invoice #' . $order_id);
        $this->email->message($message);

        if (!$this->email->send()) {
            echo $this->email->print_debugger();
            exit;
        }
    }



    public function place_order()
    {
        $user = $this->session->userdata('login_user_info_all');

        if (!$user) {
            redirect('login');
        }

        $user_id = $user->id;
        $email = $user->email;



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

        $order_data = [
            'user_id' => $user_id,
            'total_amount' => $total,
            'name' => $name,
            'mobile_number' => $mobile_number,
            'address' => $address,
            'payment_method' => $payment_method,
            'email' => $email,
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

        $this->send_order_email($user, $order_id);

        $this->db->where('user_id', $user->id);
        $this->db->delete('cart_items');

        // echo '<pre>';
        // print_r($order_data);
        // exit;

        redirect('my_orders');
    }

}