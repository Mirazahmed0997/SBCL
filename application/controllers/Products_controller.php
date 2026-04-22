<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Products_controller extends CI_Controller
{

    private $main_layout = 'admin/master_layout';
    private $side_menu = 'admin/side_menu';
    private $serverDateTime = '';
    public function __construct()
    {
        parent::__construct();
        $date = new DateTime();
        $this->serverDateTime = $date->format('Y-m-d H:i') . "\n";
        // Check if user is logged in
        $user = $this->session->userdata('login_user_info_all');
        if (!$user) {
            $this->session->set_flashdata('login_failed', 'Please login first');
            redirect('admin');
            return;
        }

        // Check role
        if (!in_array($user->role, ['admin', 'super_admin'])) {
            $this->session->set_flashdata('error', 'আপনার এই পৃষ্ঠাটি অ্যাক্সেস করার অনুমতি নেই। অনুগ্রহ করে আপনার অ্যাডমিন ক্রেডেনশিয়াল দিয়ে লগইন করুন।');
            redirect('admin');
            return;
        }

    }



    //   ---------------------------- function for file/image uploads------------------


    private function upload_file($field_name, $file_path)
    {
        $config['upload_path'] = $file_path;
        $config['allowed_types'] = 'jpg|jpeg|png|pdf';
        $config['max_size'] = 2048;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload($field_name)) {
            $data = $this->upload->data();
            return $data['file_name'];
        } else {
            return '';
        }
    }


    public function create_category_form()
    {
        $path = 'admin/products/categories/category_create_form';

        $data = $this->engine->store_nav('categories', 'categories', 'categories'); 
        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
    }



    public function create_category()
    {
        $name = $this->input->post('name');


			$this->db->where("name", $name);
			
			$isExist= $this->db->get("categories")->row();
			if ($isExist) {
			$this->session->set_flashdata('error', 'Already have this category');
            redirect('create_category_form');
			return;
            }



        $slug = url_title($name, '-', TRUE);

        $data = [
            'name' => $name,
            'slug' => $slug
        ];

        $this->db->insert('categories', $data);

        $this->session->set_flashdata('success', 'Category added successfully');
        redirect('category_list');
    }



     public function category_list()
    {
        $path = 'admin/products/categories/category_list';

        $data = $this->engine->store_nav('categories', 'categories', 'categories'); 
        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
    }

       public function delete_category($id)
    {
        $this->Common->delete_data('categories', 'id', $id);
        redirect('category_list');
    }



    public function create_product_form()
{
    $data = $this->engine->store_nav('categories', 'categories', 'categories');
    // $data['categories'] = $this->db->get('categories')->result();

    $path = 'admin/products/products/product_create_form';
    $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
}


public function create_product()
{
    $data = [
        'title' => $this->input->post('title'),
        'description' => $this->input->post('description'),
        'price' => $this->input->post('price'),
        'discount_price' => $this->input->post('discount_price'),
        'category_id' => $this->input->post('category_id'),
    ];

    $this->db->insert('products', $data);
    $product_id = $this->db->insert_id();

    // Upload multiple images
    if (!empty($_FILES['images']['name'][0])) {

        $files = $_FILES;
        $count = count($_FILES['images']['name']);

        for ($i = 0; $i < $count; $i++) {

            $_FILES['image']['name'] = $files['images']['name'][$i];
            $_FILES['image']['type'] = $files['images']['type'][$i];
            $_FILES['image']['tmp_name'] = $files['images']['tmp_name'][$i];
            $_FILES['image']['error'] = $files['images']['error'][$i];
            $_FILES['image']['size'] = $files['images']['size'][$i];

            $config['upload_path'] = './assets/uploads/products/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('image')) {

                $upload_data = $this->upload->data();

                $this->db->insert('product_images', [
                    'product_id' => $product_id,
                    'image' => $upload_data['file_name']
                ]);
            }
        }
    }

    $this->session->set_flashdata('success', 'Product created successfully');
    redirect('product_list');
}

public function product_list()
{
    $data = $this->engine->store_nav('products', 'products', 'Products');

    $this->db->select('products.*, categories.name as category_name');
    $this->db->from('products');
    $this->db->join('categories', 'categories.id = products.category_id', 'left');
    $this->db->order_by('products.id', 'DESC');

    // initialize filter array
    $where_data = [];

    $id = $this->input->get('id');
    $title = $this->input->get('title');
    $status = $this->input->get('status');
    $from_date = $this->input->get('from_date');
    $to_date = $this->input->get('to_date');

    if (!empty($id)) {
        $where_data['products.id'] = $id;
    }

    if (!empty($title)) {
        $where_data['products.title'] = $title;
    }

    if ($status !== '' && $status !== null) {
        $where_data['products.status'] = $status;
    }

    if (!empty($where_data)) {
        $this->db->where($where_data);
    }

    if (!empty($from_date)) {
        $this->db->where('products.created_at >=', $from_date);
    }

    if (!empty($to_date)) {
        $this->db->where('products.created_at <=', $to_date);
    }

    $data['products'] = $this->db->get()->result();

    $path = 'admin/products/products/products_list';
    $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
}

 public function product_active_status($id)
    {
        $news = $this->db->get_where('products', ['id' => $id])->row();

        $update_data = [

            'status' => $this->input->post('status'),
        ];
         $this->db->where('id', $id);
        $this->db->update('products', $update_data);

        redirect(base_url('product_list'));
}

public function edit_product($id)
{
    $data = $this->engine->store_nav('products', 'products', 'Edit Product');

    $data['product'] = $this->db->get_where('products', ['id' => $id])->row();

    if (!$data['product']) {
        show_404();
    }

    $data['categories'] = $this->db->get('categories')->result();

    $data['images'] = $this->db->get_where('product_images', ['product_id' => $id])->result();

    $path = 'admin/products/products/product_edit_form';
    $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
}


public function update_product()
{
    $id = $this->input->post('product_id');

    // 1. Update product info
    $data = [
        'category_id'     => $this->input->post('category_id'),
        'title'           => $this->input->post('title'),
        'description'     => $this->input->post('description'),
        'price'           => $this->input->post('price'),
        'discount_price'  => $this->input->post('discount_price')
    ];

    $this->db->where('id', $id);
    $this->db->update('products', $data);

    // 2. Check if new images uploaded
    if (!empty($_FILES['images']['name'][0])) {

        $files = $_FILES['images'];
        $count = count($files['name']);

        $uploaded = [];

        for ($i = 0; $i < $count; $i++) {

            $_FILES['file']['name']     = $files['name'][$i];
            $_FILES['file']['type']     = $files['type'][$i];
            $_FILES['file']['tmp_name'] = $files['tmp_name'][$i];
            $_FILES['file']['error']    = $files['error'][$i];
            $_FILES['file']['size']     = $files['size'][$i];

            $config['upload_path']   = './assets/uploads/products/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['encrypt_name']  = TRUE;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('file')) {

                $fileData = $this->upload->data();

                $uploaded[] = [
                    'product_id' => $id,
                    'image'      => $fileData['file_name']
                ];
            }
        }

        // 3. Only delete old images IF new uploads exist
        if (!empty($uploaded)) {

            // delete old files
            $old_images = $this->db->get_where('product_images', [
                'product_id' => $id
            ])->result();

            foreach ($old_images as $img) {
                $path = './assets/uploads/products/' . $img->image;

                if (file_exists($path)) {
                    unlink($path);
                }
            }

            // delete old DB records
            $this->db->where('product_id', $id);
            $this->db->delete('product_images');

            // insert new images
            $this->db->insert_batch('product_images', $uploaded);
        }
    }

    $this->session->set_flashdata('success', 'Product updated successfully');
    redirect('product_list');
}

public function delete_product($id)
    {
        $this->Common->delete_data('products', 'id', $id);
        redirect('product_list');
}


//  public function update_product_images($id)
//     {
        
//         $product_images = $this->db->get_where('product_images', ['id' => $id])->row();


//         function update_file($field_name, $upload_path, $old_file = '', $allowed_types = '*')
//         {
//             $CI =& get_instance();

//             if (!empty($_FILES[$field_name]['name'])) {

//                 $config['upload_path'] = $upload_path;
//                 $config['allowed_types'] = $allowed_types;
//                 $config['file_name'] = time() . '_' . $_FILES[$field_name]['name'];

//                 $CI->load->library('upload');
//                 $CI->upload->initialize($config);

//                 if ($CI->upload->do_upload($field_name)) {

//                     $uploadData = $CI->upload->data();
//                     $new_file = $uploadData['file_name'];

//                     // delete old file
//                     if (!empty($old_file) && file_exists($upload_path . $old_file)) {
//                         unlink($upload_path . $old_file);
//                     }

//                     return $new_file;
//                 }
//             }

//             return $old_file;
//         }

//         $update_data['image'] = update_file(
//             'image',
//             './assets/uploads/products/',
//             $product_images->image,
//             'jpg|jpeg|png'
//         );



//         $this->db->where('id', $id);
//         $this->db->update('product_images', $update_data);

//         redirect(base_url('product_list'));
//     }


    
}