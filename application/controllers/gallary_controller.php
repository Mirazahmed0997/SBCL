<?php
defined('BASEPATH') or exit('No direct script access allowed');

class gallary_controller extends CI_Controller
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

    //  ---------------------------- function for file/image uploads------------------


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



    // ---------------------photo gallary method-----------------------




    public function upload_image()
    {

        $image = $this->upload_file('image', './assets/uploads/project/gallary_image/');

        $user = $this->session->userdata('login_user_info_all');
        $posted_by = $user->username;


        $data = array(

            'image' => $image,
            'status' => 0,
            'posted_by' => $posted_by,
            'created_at' => date('Y-m-d H:i:s')
        );

        $this->db->insert('image_gallery', $data);

        $this->session->set_flashdata('success', 'created successfully!');
        redirect("image_gallery_list");
    }




    public function image_gallery_list()
    {
        $data = $this->engine->store_nav('image_gallery_list', 'image_gallery_list', 'গ্যালারি');

        $where_data = array();

        $id = $this->input->get('id');
        $image = $this->input->get('image');
        $status = $this->input->get('status');
        $created_at = $this->input->get('created_at');
        $from_date = $this->input->get('from_date');
        $to_date = $this->input->get('to_date');
        $posted_by = $this->input->get('posted_by');



        if (!empty($id)) {
            $where_data['id'] = $id;
        }
        if (!empty($image)) {
            $where_data['image'] = $image;
        }



        if ($status !== '' && $status !== null) {
            $where_data['status'] = $status;
        }


        if (!empty($where_data)) {
            $this->db->where($where_data);
        }
        if (!empty($from_date)) {
            $this->db->where('created_at >=', $from_date);
        }

        if (!empty($to_date)) {
            $this->db->where('created_at <=', $to_date);
        }

        if (!empty($posted_by)) {
            $where_data['posted_by'] = $posted_by;
        }

        $data['image_gallery'] = $this->db->get('image_gallery')->result();

        $path = 'admin/image_gallery/image_gallery';

        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
    }



    public function update_image()
    {
        $id = $this->input->post('image_id');
        $image = $this->db->get_where('image_gallery', ['id' => $id])->row();



        // Handle file uploads


        function update_file($field_name, $upload_path, $old_file = '', $allowed_types = '*')
        {
            $CI =& get_instance();

            if (!empty($_FILES[$field_name]['name'])) {

                $config['upload_path'] = $upload_path;
                $config['allowed_types'] = $allowed_types;
                $config['file_name'] = time() . '_' . $_FILES[$field_name]['name'];

                $CI->load->library('upload');
                $CI->upload->initialize($config);

                if ($CI->upload->do_upload($field_name)) {

                    $uploadData = $CI->upload->data();
                    $new_file = $uploadData['file_name'];

                    // delete old file
                    if (!empty($old_file) && file_exists($upload_path . $old_file)) {
                        unlink($upload_path . $old_file);
                    }

                    return $new_file;
                }
            }

            return $old_file;
        }

        $update_data['image'] = update_file(
            'image',
            './assets/uploads/project/gallary_image/',
            $image->image,
            'jpg|jpeg|png'
        );



        $this->db->where('id', $id);
        $this->db->update('image_gallery', $update_data);

        redirect(base_url('image_gallery_list'));
    }




    public function all_images()
    {
        $this->load->view('site/pages/gallary/all_gallary_images');
    }




    public function image_active_status($id)
    {
        $news = $this->db->get_where('image_gallery', ['id' => $id])->row();

        $update_data = [

            'status' => $this->input->post('status'),
        ];


        $this->db->where('id', $id);
        $this->db->update('image_gallery', $update_data);

        redirect(base_url('image_gallery_list'));
    }



    public function delete_image($id)
    {
        $this->Common->delete_data('image_gallery', 'id', $id);
        redirect('image_gallery_list');

    }

}


?>