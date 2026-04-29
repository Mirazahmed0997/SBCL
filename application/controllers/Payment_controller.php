<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Payment_controller extends CI_Controller
{

    private $main_layout = 'admin/master_layout';
    private $side_menu = 'admin/side_menu';
    private $serverDateTime = '';
    public function __construct()
    {
        parent::__construct();
        $date = new DateTime();


    }


    private function send_order_email($user, $tran_id)
    {
        $this->load->library('email');


        $message = "<h2>You successfully paid</h2>";
        $message .= "<p>Transaction ID: #{$tran_id}</p>";



        $this->email->from('ahmedmiraz87@gmail.com', 'বাংলাদেশ জাতীয় সমবায় ইউনিয়ন');
        $this->email->to($user->email);
        $this->email->subject('Order Confirmation');
        $this->email->message($message);

        if (!$this->email->send()) {
            echo $this->email->print_debugger();
            exit;
        }
    }



    public function ssl_payment($order_id)
    {
        $order = $this->db->get_where('orders_table', ['id' => $order_id])->row();

        $post_data = array();
        $post_data['store_id'] = 'bjsu69f06c4cb926e';
        $post_data['store_passwd'] = 'bjsu69f06c4cb926e@ssl';

        $post_data['total_amount'] = $order->total_amount;
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = uniqid('TRX_');

        $post_data['success_url'] = base_url('payment_success/' . $order_id);
        $post_data['fail_url'] = base_url("Payment_controller/fail");
        $post_data['cancel_url'] = base_url("Payment_controller/cancel");

        $post_data['cus_name'] = $order->name;
        $post_data['cus_email'] = "customer@email.com";
        $post_data['cus_add1'] = $order->address;
        $post_data['cus_phone'] = $order->mobile_number;


        $url = "https://sandbox.sslcommerz.com/gwprocess/v4/api.php";

        $handle = curl_init();
        curl_setopt($handle, CURLOPT_URL, $url);
        curl_setopt($handle, CURLOPT_POST, 1);
        curl_setopt($handle, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($handle);
        curl_close($handle);

        $response = json_decode($response, true);

        if (isset($response['GatewayPageURL'])) {
            redirect($response['GatewayPageURL']);
        } else {
            echo "Payment initialization failed";
        }
    }



    public function success($order_id)
    {
        $tran_id = $this->input->post('tran_id');

        $this->db->where('id', $order_id);
        $this->db->update('orders_table', [
            'tran_id' => $tran_id,
            'payment_status' => 'paid'
        ]);


        $order = $this->db
            ->get_where('orders_table', ['id' => $order_id])
            ->row();

        $user_id=$order->user_id;
        $user = $this->db
            ->get_where('users', ['id' => $user_id])
            ->row();



        // echo '<pre>';
        // print_r($user);
        // exit;



        $this->session->set_flashdata('success', 'Successfully paid');
        $this->send_order_email($user, $tran_id);

        redirect('my_orders');


    }

    public function fail()
    {
        $this->session->set_flashdata('failed', 'Payment Failed');

        // redirect('applicant/payment_status/failed');
        redirect('my_orders');
    }

    public function cancel()
    {
        $this->session->set_flashdata('canceled', 'Payment Canceled');

        // redirect('applicant/payment_status/cancelled');
        redirect('my_orders');
    }





}