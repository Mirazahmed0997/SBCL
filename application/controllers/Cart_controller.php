<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_controller extends CI_Controller
{
    private $main_layout = 'site/master_layout';
	private $header = 'site/header';
	private $footer = 'site/footer';
	private $serverDateTime = '';
	public function __construct()
	{
		parent::__construct();
	}
    




    public function add($product_id)
    {
        $user = $this->session->userdata('login_user_info_all');
        $quantity = $this->input->post('quantity');
        if(!$quantity)
            {
                $quantity=1;
            }

        if (!$user) {
            $this->session->set_flashdata('error', 'Please login first');
            redirect('member_login');
            exit;
        }

        $user_id = $user->id;

        $product = $this->db->get_where('products', ['id' => $product_id])->row();

        if (!$product) {
            show_404();
        }

        // check existing cart item
        $item = $this->db->get_where('cart_items', [
            'user_id' => $user_id,
            'product_id' => $product_id
        ])->row();

        if ($item) {
            // increase quantity
            $this->db->set('quantity', 'quantity + ' . (int)$quantity, FALSE);
            $this->db->where('id', $item->id);
            $this->db->update('cart_items');
        } else {
            // insert new item
            $this->db->insert('cart_items', [
                'user_id'    => $user_id,
                'product_id' => $product_id,
                'quantity'   => $quantity,
                'price'      => $product->price
            ]);
        }

        $this->session->set_flashdata('success', 'Product added to cart');
        redirect('my_carts');
        // redirect($_SERVER['HTTP_REFERER']);
    }

   
    public function my_carts()
    {
        $user = $this->session->userdata('login_user_info_all');
        // $data = $this->engine->store_nav('site', 'Nothing', 'carts');

        if (!$user) {
            redirect('member_login');
        }

        $user_id = $user->id;

        $this->db->select('cart_items.*, products.title, products.price');
        $this->db->from('cart_items');
        $this->db->join('products', 'products.id = cart_items.product_id');
        $this->db->where('cart_items.user_id', $user_id);

        $data['items'] = $this->db->get()->result();

        // total calculation
        // $this->db->select_sum('price * quantity', 'total');
        $this->db->where('user_id', $user_id);
        $data['total'] = $this->db->get('cart_items')->row()->total ?? 0;

         $path=$this->load->view('site/pages/all_products/my_carts', $data);
        // $this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);
        
    }

  
    public function remove_cart_item($id)
    {
        $this->db->delete('cart_items', ['id' => $id]);

        $this->session->set_flashdata('success', 'Item removed');
        redirect('my_carts');
    }



    public function update_cart_quantity($id)
{
    $qty = $this->input->post('quantity');
    $qty = $qty ? (int)$qty : 1;

    $this->db->where('id', $id);
    $this->db->update('cart_items', [
        'quantity' => $qty
    ]);

    redirect('my_carts');
}

    public function clear_cart()
    {
        $user = $this->session->userdata('login_user_info_all');

        if ($user) {
            $this->db->delete('cart_items', ['user_id' => $user->id]);
        }

        redirect('my_carts');
    }
}