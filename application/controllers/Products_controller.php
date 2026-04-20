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
        redirect('create_category_form');
    }



     public function category_list()
    {
        $path = 'admin/products/categories/category_list';

        $data = $this->engine->store_nav('categories', 'categories', 'categories'); 
        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
    }
    
}