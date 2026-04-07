<?php

class Member_login extends CI_Controller
{


    private $main_layout = 'recruitment/master_layout';
    private $header = 'recruitment/header';
    private $footer = 'recruitment/footer';
    private $serverDateTime = '';
    public function __construct()
    {
        parent::__construct();

        $controller = $this->router->fetch_class();
        $method = $this->router->fetch_method();

        if (
            !$this->session->userdata('login_user_info_all')
            && !($controller == 'Member_login' && in_array($method, ['index', 'login_process']))
        ) {
            $this->session->set_flashdata('login_failed', 'Please login first');
            redirect('member_login');
        }
    }


    public function index()
    {
        $data = $this->engine->store_nav('recruitment', 'Nothing', 'শিক্ষিত বেকার কেন্দ্রীয় সঞ্চয় ও ঋণদান সমবায় সমিতি');

        $path = 'site/pages/login';
        $this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);
    }

    public function login_process()
    {

        $mobile_number = $this->input->post('mobile_number');
        $password = $this->input->post('password');

        $this->db->where('mobile_number', $mobile_number);
        $user = $this->db->get('members_n')->row();

        if ($user) {

            if (password_verify($password, $user->password))
            // if ($password == $user->password)
                 {

                $this->session->set_userdata('current_type', 2);
                $this->session->set_userdata('login_user_info_all', $user);

                redirect('members');

            } else {

                $this->session->set_flashdata('login_failed', 'Wrong Password');
                redirect('member_login');

            }

        } else {

            $this->session->set_flashdata('login_failed', 'Mobile number not found');
            redirect('member_login');
        }
    }



    public function change_password($id)
    {
        $id = $this->input->post('member_id');
        $password = $this->input->post('password');

        if (!empty($password)) {
            $update_data = [
                'password' => password_hash($password, PASSWORD_DEFAULT)
            ];

            $this->db->where('id', $id);
            $this->db->update('members_n', $update_data);
        }

        redirect(base_url('applicant/members_list/member_Details/' . $id));
    }




    public function logout()
    {
        $this->session->sess_destroy();
        redirect('member_login');
    }
}




?>