<?php
defined('BASEPATH') or exit('No direct script access allowed');

class home_Page_managment_controller extends CI_Controller
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



// ---------------------achievements method----------------------




    public function create_achievement()
    {
        $title = $this->input->post('title');
        $details = $this->input->post('details');

        $image = $this->upload_file('image', './assets/uploads/project/achievement_image/');

        $user = $this->session->userdata('login_user_info_all');
        $posted_by = $user->username;


        $data = array(
            'title' => $title,
            'details' => $details,
            'posted_by' => $posted_by,
            'image' => $image,
            'status' => 0,
            'created_at' => date('Y-m-d H:i:s')
        );

        $this->db->insert('achievements', $data);

        $this->session->set_flashdata('success', 'created successfully!');
        redirect("achievements_list");
    }


    // -----------------------all achievements---------------


    public function achievements_list()
    {
        $data = $this->engine->store_nav('achievements', 'achievements', 'সাফল্য');

        $where_data = array();

        $id = $this->input->get('id');
        $title = $this->input->get('title');
        $details = $this->input->get('details');
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

        if (!empty($title)) {
            $where_data['title'] = $title;
        }

        if (!empty($details)) {
            $where_data['details'] = $details;
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

        $data['achievements'] = $this->db->get('achievements')->result();

        $path = 'admin/achievements/achievements_table';

        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
    }


    // -----------------------update achievement--------------

    public function update_achievements()
    {
        $id = $this->input->post('achievement_id');
        $achievement = $this->db->get_where('achievements', ['id' => $id])->row();

        $update_data = [
            'title' => $this->input->post('title'),
            'details' => $this->input->post('details'),
        ];

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
            './assets/uploads/project/achievement_image/',
            $achievement->image,
            'jpg|jpeg|png'
        );



        $this->db->where('id', $id);
        $this->db->update('achievements', $update_data);

        redirect(base_url('achievements_list'));
    }

    // ------------single achievement----------



    public function single_achievement($id = null)
    {
        // Redirect if no ID
        if (empty($id)) {
            redirect(base_url('achievements_list'));
        }

        $data = $this->engine->store_nav('achievements', 'achievements', 'সাফল্য');

        // Fetch the specific news
        $data['single_achievement'] = $this->Common->get_data_single_conditional('achievements', 'id', $id)->row();

        // Check if news exists
        if (!$data['single_achievement']) {
            show_404();
        }

        $path = 'admin/achievements/achievements_table';
        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
    }



    // --------------------change active status-------------------

    public function achievement_active_status($id)
    {
        $news = $this->db->get_where('achievements', ['id' => $id])->row();

        $update_data = [

            'status' => $this->input->post('status'),
        ];


        $this->db->where('id', $id);
        $this->db->update('achievements', $update_data);

        redirect(base_url('achievements_list'));
    }


    // ---------------------delete achievement-----------------

    public function delete_achievement($id)
    {
        $this->Common->delete_data('achievements', 'id', $id);
        redirect('achievements_list');
    }


// --------------------------------#########################---------------------------------


    // -------------------create_slider------------
    public function create_slider()
    {
        $user = $this->session->userdata('login_user_info_all');
        $posted_by = $user->username;

        $image = $this->upload_file('image', './assets/uploads/project/slider_image/');


        $data = array(

            'title' => $this->input->post('title'),
            'posted_by' => $posted_by,
            'image' => $image,
        );

        $this->db->insert('image_slider', $data);
        $this->session->set_flashdata('success', 'Post created successfully!');
        redirect('slider_list');
    }

    // -----------------------all slider_list---------------


    public function slider_list()
    {
        $data = $this->engine->store_nav('news', 'news', 'সংবাদ');

        $where_data = array();

        $id = $this->input->get('id');
        $title = $this->input->get('title');
        $image = $this->input->get('image');
        $created_at = $this->input->get('created_at');
        $posted_by = $this->input->get('posted_by');
        $status = $this->input->get('status');



        if (!empty($id)) {
            $where_data['id'] = $id;
        }
        if ($status !== '' && $status !== null) {
            $where_data['status'] = $status;
        }

        if (!empty($title)) {
            $where_data['title'] = $title;
        }

        if (!empty($posted_by)) {
            $where_data['posted_by'] = $posted_by;
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

        $data['image_slider'] = $this->db->get('image_slider')->result();

        $path = 'admin/slider_table/slider_table';

        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
    }


    // ------------single slide----------
    public function single_slider($id = null)
    {
        // Redirect if no ID
        if (empty($id)) {
            redirect(base_url('slider_list'));
        }

        $data = $this->engine->store_nav('image_slider', 'image_slider', 'স্লাইডার ');

        // Fetch the specific news
        $data['single_slider'] = $this->Common->get_data_single_conditional('image_slider', 'id', $id)->row();

        // Check if news exists
        if (!$data['single_slider']) {
            show_404();
        }

        $path = 'admin/slider_table/slider_table';
        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
    }


    public function slider_active_status($id)
    {
        $image_slider = $this->db->get_where('image_slider', ['id' => $id])->row();

        $update_data = [

            'status' => $this->input->post('status'),
        ];


        $this->db->where('id', $id);
        $this->db->update('image_slider', $update_data);

        redirect(base_url('slider_list'));
    }


    public function update_slider()
    {
        $id = $this->input->post('slider_id');
        $slider = $this->db->get_where('image_slider', ['id' => $id])->row();

        $update_data = [
            'title' => $this->input->post('title'),
        ];

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
            './assets/uploads/project/slider_image/',
            $slider->image,
            'jpg|jpeg|png'
        );



        $this->db->where('id', $id);
        $this->db->update('image_slider', $update_data);

        redirect(base_url('slider_list'));
    }


    public function delete_slider($id)
    {
        $this->Common->delete_data('image_slider', 'id', $id);
        redirect('slider_list');
    }





    // ----------------------management info----------------------------------


    public function managment_list()
    {
        $data = $this->engine->store_nav('managment_info', 'managment_info', 'ব্যবস্থাপনা');

        $where_data = array();

        $id = $this->input->get('id');
        $name = $this->input->get('name');
        $image = $this->input->get('image');
        $designation = $this->input->get('designation');
        $posted_by = $this->input->get('posted_by');
        $details = $this->input->get('details');


        if (!empty($id)) {
            $where_data['id'] = $id;
        }
        // if ($status !== '' && $status !== null) {
        //     $where_data['status'] = $status;
        // }

        if (!empty($name)) {
            $where_data['name'] = $name;
        }

        if (!empty($posted_by)) {
            $where_data['posted_by'] = $posted_by;
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

        if (!empty($designation)) {
            $where_data['designation'] = $designation;
        }

        $data['managment_info'] = $this->db->get('managment_info')->result();

        $path = 'admin/management_info/management_info_table';

        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
    }


    public function create_info()
    {
        $user = $this->session->userdata('login_user_info_all');
        $posted_by = $user->username;

        $image = $this->upload_file('image', './assets/uploads/project/management_img/');


        $data = array(

            'name' => $this->input->post('name'),
            'details' => $this->input->post('details'),
            'designation' => $this->input->post('designation'),
            'posted_by' => $posted_by,
            'image' => $image,
        );

        $this->db->insert('managment_info', $data);
        $this->session->set_flashdata('success', 'Post created successfully!');
        redirect('managment_list');
    }

    public function single_info($id = null)
    {
        // Redirect if no ID
        if (empty($id)) {
            redirect(base_url('managment_list'));
        }

        $data = $this->engine->store_nav('managment_info', 'managment_info', 'ব্যবস্থাপনা');

        // Fetch the specific info
        $data['single_info'] = $this->Common->get_data_single_conditional('managment_info', 'id', $id)->row();

        // Check if info exists
        if (!$data['single_info']) {
            show_404();
        }

        $path = 'admin/management_info/management_info_table';
        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
    }


     public function update_info()
    {
        $id = $this->input->post('info_id');
        $managment_info = $this->db->get_where('managment_info', ['id' => $id])->row();

        $update_data = [
            'name' => $this->input->post('name'),
            'designation' => $this->input->post('designation'),
            'details' => $this->input->post('details'),
        ];

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
            './assets/uploads/project/management_img/',
            $managment_info->image,
            'jpg|jpeg|png'
        );



        $this->db->where('id', $id);
        $this->db->update('managment_info', $update_data);

        redirect(base_url('managment_list'));
    }


      public function delete_info($id)
    {
        $this->Common->delete_data('managment_info', 'id', $id);
        redirect('managment_list');
    }




//   ----------------------------banner image--------------------------


 public function banner_list()
    {
        $data = $this->engine->store_nav('banner_image', 'banner_image', 'ব্যানার');

        $where_data = array();

        $id = $this->input->get('id');
        $image = $this->input->get('image');
        $created_at = $this->input->get('created_at');
        $posted_by = $this->input->get('posted_by');



        if (!empty($id)) {
            $where_data['id'] = $id;
        }
       

       
        if (!empty($posted_by)) {
            $where_data['posted_by'] = $posted_by;
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

       

        $data['banner_image'] = $this->db->get('banner_image')->result();

        $path = 'admin/banner_table/banner_table';

        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
    }


     public function single_banner($id = null)
    {
        // Redirect if no ID
        if (empty($id)) {
            redirect(base_url('banner_list'));
        }

        $data = $this->engine->store_nav('banner_image', 'banner_image', 'স্লাইডার ');

        // Fetch the specific news
        $data['single_banner'] = $this->Common->get_data_single_conditional('banner_image', 'id', $id)->row();

        if (!$data['single_banner']) {
            show_404();
        }

        
        $path = 'admin/banner_table/banner_table';
        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
    }


 public function update_banner()
    {
        $id = $this->input->post('banner_id');
        $banner_image = $this->db->get_where('banner_image', ['id' => $id])->row();

       
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
            './assets/uploads/project/banner_image/',
            $banner_image->image,
            'jpg|jpeg|png'
        );



        $this->db->where('id', $id);
        $this->db->update('banner_image', $update_data);

        redirect(base_url('banner_list'));
    }


    public function delete_banner($id)
    {
        $this->Common->delete_data('banner_image', 'id', $id);
        redirect('banner_list');
    }



     // ---------------------news current_projects----------------------
    public function create_projects()
    {
        $title = $this->input->post('title');
        $details = $this->input->post('details');

        $user = $this->session->userdata('login_user_info_all');
        $posted_by = $user->username;


        $data = array(
            'title' => $title,
            'details' => $details,
            'posted_by' => $posted_by,
            'status' => 0,
            'created_at' => date('Y-m-d H:i:s')
        );

        $this->db->insert('current_projects', $data);

        $this->session->set_flashdata('success', 'successfully created!');
        redirect("projects_list");
    }


    // -----------------------all project---------------


    public function projects_list()
    {
        $data = $this->engine->store_nav('current_projects', 'current_projects', 'প্রজেক্টস');

        $where_data = array();

        $id = $this->input->get('id');
        $title = $this->input->get('title');
        $details = $this->input->get('details');
        $status = $this->input->get('status');
        $created_at = $this->input->get('created_at');
        $from_date = $this->input->get('from_date');
        $to_date = $this->input->get('to_date');
        $posted_by = $this->input->get('posted_by');



        if (!empty($id)) {
            $where_data['id'] = $id;
        }

        if (!empty($headline)) {
            $where_data['headline'] = $headline;
        }

        if (!empty($details)) {
            $where_data['details'] = $details;
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

        $data['current_projects'] = $this->db->get('current_projects')->result();

        $path = 'admin/current_projects/current_projects_table';

        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
    }


    // -----------------------update project--------------

    public function update_projects()
    {
        $id = $this->input->post('projects_id');

        $update_data = [

            'title' => $this->input->post('title'),
            'details' => $this->input->post('details'),
        ];


        $this->db->where('id', $id);
        $this->db->update('current_projects', $update_data);

        redirect(base_url('projects_list'));
    }

    // ------------single project----------
    public function single_projects($id = null)
    {
        // Redirect if no ID
        if (empty($id)) {
            redirect(base_url('projects_list'));
        }

        $data = $this->engine->store_nav('current_projects', 'current_projects', 'প্রজেক্টস');

        // Fetch the specific data
        $data['single_project'] = $this->Common->get_data_single_conditional('current_projects', 'id', $id)->row();

        // Check if data exists
        if (!$data['single_project']) {
            show_404();
        }

        $path = 'admin/projects_table/projects_table';
        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
    }



    // --------------------change active status-------------------

    public function projects_active_status($id)
    {
        $news = $this->db->get_where('current_projects', ['id' => $id])->row();

        $update_data = [

            'status' => $this->input->post('status'),
        ];


        $this->db->where('id', $id);
        $this->db->update('current_projects', $update_data);

        redirect(base_url('projects_list'));
    }


    // ---------------------delete project-----------------

    public function delete_project($id)
    {
        $this->Common->delete_data('current_projects', 'id', $id);
        redirect('projects_list');
    }


 


}