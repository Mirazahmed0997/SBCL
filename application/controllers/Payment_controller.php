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
        // $this->serverDateTime = $date->format('Y-m-d H:i') . "\n";
        // // Check if user is logged in
        // $user = $this->session->userdata('login_user_info_all');
        // if (!$user) {
        //     $this->session->set_flashdata('login_failed', 'Please login first');
        //     redirect('admin');
        //     return;
        // }

        // // Check role
        // if (!in_array($user->role, ['admin', 'super_admin'])) {
        //     $this->session->set_flashdata('error', 'আপনার এই পৃষ্ঠাটি অ্যাক্সেস করার অনুমতি নেই। অনুগ্রহ করে আপনার অ্যাডমিন ক্রেডেনশিয়াল দিয়ে লগইন করুন।');
        //     redirect('admin');
        //     return;
        // }

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

        $post_data['success_url'] = base_url('payment_success/'.$order_id);
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

        
        // echo '<pre>';
        // print_r($tran_id);
        // exit;

        $this->db->where('id', $order_id);
        $this->db->update('orders_table', [
            'tran_id' => $tran_id,
            'payment_status' => 'paid'
        ]);


        $this->session->set_flashdata('success', 'Successfully paid');

        // redirect('applicant/payment_status/success');
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