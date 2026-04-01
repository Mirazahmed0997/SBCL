<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class View_content_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


  


    // -----------all active new--------

    public function get_active_news()
    {
        $data['news'] = $this->db->order_by('created_at', 'DESC')
            ->where('status', 1)
            ->get('news')
            ->result_array();

        return $data['news'];
    }

    // -------------------newa details------------
    public function news_details($id = null)
    {
        if (!$id) {
            show_404();
        }

        $data['news'] = $this->db->where('id', $id)
            ->where('status', 1) // only active news
            ->get('news')
            ->row_array();

        if (!$data['news']) {
            show_404();
        }

        $this->load->view('site/pages/news_details', $data);
    }


    public function details_description()
    {
        $this->load->view('site/pages/company_details/details_description');
    }



     // -----------all active slider--------

    public function get_active_slider()
    {
        $data['image_slider'] = $this->db->order_by('created_at', 'DESC')
            ->where('status', 1)
            ->get('image_slider')
            ->result_array();

        return $data['image_slider'];
    }


    
     // -----------all management Info--------

    public function get_management_info()
    {
        $data['managment_info'] = $this->db->order_by('created_at', 'DESC')
            ->get('managment_info')
            ->result_array();

        return $data['managment_info'];
    }






  








}


?>