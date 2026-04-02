<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class View_content_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


  


   

    // -------------------news details------------
    public function news_details($id = null)
    {
        if (!$id) {
            show_404();
        }

        $data['news'] = $this->db->where('id', $id)
            ->where('status', 1)
            ->get('news')
            ->row_array();

        if (!$data['news']) {
            show_404();
        }

        $this->load->view('site/pages/notice&current_projects/news_details', $data);
    }


    

     // -------------------news details------------
    public function notice_details($id = null)
    {
        if (!$id) {
            show_404();
        }

        $data['notices'] = $this->db->where('id', $id)
            ->where('status', 1)
            ->get('notices')
            ->row_array();

        if (!$data['notices']) {
            show_404();
        }

        $this->load->view('site/pages/notice&current_projects/notice_details', $data);
    }


    public function details_description()
    {
        $this->load->view('site/pages/company_details/details_description');
    }

   
    public function get_management_info()
    {
        $data['managment_info'] = $this->db->order_by('created_at', 'DESC')
            ->get('managment_info')
            ->result_array();

        return $data['managment_info'];
    }
      // -------------------mamagement_details---------------------


    public function mamagement_details($id = null)
    {
        if (!$id) {
            show_404();
        }

        $data['managment_info'] = $this->db->where('id', $id)
           
            ->get('managment_info')
            ->row_array();

        if (!$data['managment_info']) {
            show_404();
        }

        $this->load->view('site/pages/company_details/managment_details', $data);
    }






  








}


?>