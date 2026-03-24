<?php

class Admin_login extends CI_Controller
{


    private $main_layout = 'recruitment/master_layout';
    private $header = 'recruitment/header';
    private $footer = 'recruitment/footer';
    private $serverDateTime = '';
    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $data = $this->engine->store_nav('recruitment', 'Nothing', 'শিক্ষিত বেকার কেন্দ্রীয় সঞ্চয় ও ঋণদান সমবায় সমিতি');
        $data['homapage_info'] = $this->Common->get_data('job_homepage')->row();

        $path = 'login/login';
        $this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);
    }

    public function admin_registration()
	{
		$data = $this->engine->store_nav('Nothing', 'Nothing', 'শিক্ষিত বেকার কেন্দ্রীয় সঞ্চয় ও ঋণদান সমবায় সমিতি');

		$path = 'admin/registration/registration';
		$this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);
	}

	public function admin_registration_saved()
	{
			$username= $this->input->post('username');
			$mobile_number= $this->input->post('mobile_number');

			$this->db->where("username", $username);
			$this->db->where("mobile_number", $mobile_number);

			$isExist= $this->db->get("users")->row();
			if ($isExist) {
			$this->session->set_flashdata('error', 'Already registered');

			redirect('admin_registration');
			return;
		}


		$data = array(

			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),

			'username' => $this->input->post('username'),
			'mobile_number' => $this->input->post('mobile_number'),
			'designation' => $this->input->post('designation'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
		);

		$this->db->insert('users', $data);
		redirect("admin");


	}

    public function login_process()
    {

        $mobile_number = $this->input->post('mobile_number');
        $password = $this->input->post('password');

        $this->db->where('mobile_number', $mobile_number);
        $user = $this->db->get('users')->row();

        if ($user) {

            if (password_verify($password, $user->password))
            // if ($password == $user->password)
            {

                $this->session->set_userdata('current_type', 2);
                $this->session->set_userdata('login_user_info_all', $user);

                redirect('admin_dashboard');

            } else {

                $this->session->set_flashdata('error', 'ভুল পাসওয়ার্ড');
                redirect('admin');
            }

        } else {

            $this->session->set_flashdata('error', 'Mobile number not found Please Registration First');
            // redirect('login/login');
            redirect('admin_registration_form');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('admin');
    }
}

?>