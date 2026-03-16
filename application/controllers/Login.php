<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	private $main_layout = 'site/master_layout';
	private $header = 'site/header';
	private $footer = 'site/footer';
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User');
	}

	public function index()
	{
		$data = $this->engine->store_nav('site', 'Nothing', 'শিক্ষিত বেকার কেন্দ্রীয় সঞ্চয় ও ঋণদান সমবায় সমিতি');

		$data['ftchBrakingNws'] = $this->Common->get_data('tbl_breking_news')->result();
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
			
	}









	public function authentication_process()
	{
		$userinformation = $this->set_login_information($this->secure_data());
		$res = $this->User->user_validation("authority", $userinformation);
		$confirm = $this->set_confirmation_msg($res, "Login Success", "Email and Password not match");

		if ($confirm == 1) {
			// $browser = $this->agent->browser();
			// $browserVersion = $this->agent->version();
			// $platform = $this->agent->platform();
			// $data_insert_access_log_table = array(
			// 	'access_ip' => $this->input->ip_address(),
			// 	'access_a_user_id' => $res->a_id,
			// 	'access_event' => '1step',
			// 	'access_activity' => "User logged in by valid pin code!",
			// 	'access_device' => $browser.' '. $browserVersion.' '.$platform
			// );
			// $table = 'access_log';
			// $this->Common->set_data($table, $data_insert_access_log_table);

			if ($res->a_type == 1) {
				$this->session->set_userdata('currentActiveId', $res->a_id);
				$this->session->set_userdata('current_credential', $res->a_credential);
				$this->session->set_userdata('current_type', $res->a_type);
				$authorityId = $this->session->userdata('currentActiveId');

				redirect('admin_dashboard', 'location');

			} elseif ($res->a_type == 2) {
				$this->session->set_userdata('currentActiveId', $res->a_id);
				$this->session->set_userdata('current_credential', $res->a_credential);
				$this->session->set_userdata('current_type', $res->a_type);
				$authorityId = $this->session->userdata('currentActiveId');
				$login_user_id = array(
					'r_a_id' => $authorityId,
					'r_status' => 1,
				);

				$data['login_user_info_all'] = $this->Common->get_data_multi_conditional('register', $login_user_id)->row();
				$this->session->set_userdata('login_user_info_all', $data['login_user_info_all']);

				if ($this->input->post('login_value') == 1) {
					redirect('applicant_dashboard', 'location');
				} elseif ($this->input->post('login_value') == 2) {
					$this->session->set_userdata('rec_id', $this->input->post('rec_id'));
					redirect('Recruitment/apply', 'location');
				} else {
					redirect('applicant_cv', 'location');
				}
			}
		} else {
			$this->session->set_flashdata('login_failed', 'Credential Not match');
			$user_type = $this->input->post('userType');
			if ($user_type == 1) {
				redirect('admin', 'location');
			}
			if ($user_type == 2) {
				redirect('applicant_login', 'location');
			}
		}
	}

	private function set_login_information($input_validation)
	{
		if ($input_validation) {
		} else {
			$this->set_confirmation_msg("", "", "Please The Valid Data");
			redirect('Welcome', 'location');
		}
		if ($this->session->userdata('login_status')) {
			$login_data = $this->session->userdata('login_status');
			$userinformation = array(
				'a_credential' => $login_data['number'],
				'a_key' => md5($login_data['password']),
				'a_type' => $login_data['user_type'],
				'a_status' => 1
			);
		} else {
			$userinformation = array(
				'a_credential' => $this->input->post('number'),
				'a_key' => md5($this->input->post('password')),
				'a_type' => $this->input->post('userType'),
				'a_status' => 1
			);
		}
		return $userinformation;
	}

	private function secure_data()
	{
		if ($this->session->userdata('login_status')) {
			return TRUE;
		} else {
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('number', 'Number', 'trim|required');
			if ($this->form_validation->run() === FALSE) {
				return 0;
			} else {
				return TRUE;
			}
		}
	}

	private function set_confirmation_msg($data, $true_msg, $false_msg)
	{
		$confirm = 0;
		if ($data == FALSE) {
			$this->session->set_flashdata('error', $false_msg);
		} else {
			// $this->session->set_flashdata('success', $true_msg);
			$confirm = 1;
		}
		return $confirm;
	}

	public function authority()
	{
		$user_data = $this->session->all_userdata();
		foreach ($user_data as $key => $value) {
			if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
				$this->session->unset_userdata($key);
			}
		}
		$this->session->sess_destroy();
		redirect('admin');
	}

	public function applicant_logout()
	{
		$user_data = $this->session->all_userdata();
		foreach ($user_data as $key => $value) {
			if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
				$this->session->unset_userdata($key);
			}
		}
		$this->session->sess_destroy();
		redirect('applicant_login');
	}
	public function forgot_password()
	{
		$email = $this->input->post('email');
		$where_data['r_email'] = $email;
		$user_info = $this->Common->get_data_multi_conditional('register', $where_data)->row();
		if (!empty($user_info)) {
			$num = str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT);
			$current_date = get_current_time();
			$expiry = date('Y-m-d H:i', strtotime($current_date . '+10 minutes'));
			$data = array(
				'a_reset_code' => $num,
				'a_reset_expiry' => $expiry,
			);
			$message = "<p>Hi $user_info->r_first_name,<br>Your password recovery code is $num. This code will be expire afer 10 minutes <br><br>If you did not initiate this request, please contact us immediatly.<br><br><br>Thank You<br>SBCL Team";
			$subject = "SBCL - Password Recovery Code";
			$to = $user_info->r_email;
			$sent_mail = $this->sendMail($to, $subject, $message);
			if ($sent_mail == 1) {
				$this->Common->update_data('authority', 'a_id', $user_info->r_a_id, $data);
				$this->session->set_flashdata('success', 'Password recovery code successfully sent to your email.');
				redirect('Recruitment/reset_password');

			} else {
				$this->session->set_flashdata('success', 'Email Sending Error..');
				redirect('Recruitment/forgot_password');
			}
		} else {
			$this->session->set_flashdata('success', 'Account not found!!');
			redirect('Recruitment/forgot_password');
		}
	}
	function code_check()
	{
		$code = $this->input->post('code');
		$where_data['a_reset_code'] = $code;
		$get_data = $this->Common->get_data_multi_conditional('authority', $where_data)->row();
		if (!empty($get_data)) {
			$current_date = get_current_time();
			if ($current_date < $get_data->a_reset_expiry) {
				$this->session->set_userdata('mobile_number', $get_data->a_credential);
				redirect('Recruitment/new_password');

			} else {
				$this->session->set_flashdata('success', 'Sorry! Password reset code time is expired!');
				redirect('Recruitment/forgot_password');
			}
		} else {
			$this->session->set_flashdata('success', 'Invalid Code!');
			redirect('Recruitment/reset_password');
		}

	}
	function update_new_password()
	{
		$password = $this->input->post('password');
		$mobile = $this->session->userdata('mobile_number');
		$authenticationData = array(
			'a_key' => md5($password),
			'a_reset_code' => NULL,
			'a_reset_expiry' => NULL,
		);
		$this->Common->update_data('authority', 'a_credential', $mobile, $authenticationData);
		$this->session->unset_userdata('mobile_number');
		redirect('applicant_login');
	}
	function sendMail($to, $sub, $message)
	{
		$config = array(
			'protocol' => 'smtp',
			'smtp_crypto' => 'ssl',
			'smtp_host' => 'mail.sbcl.coop',
			'smtp_port' => 465,
			'smtp_user' => 'dcar@sbcl.coop',
			'smtp_pass' => '123456789',
			'mailtype' => 'html',
			// 'charset' => 'iso-8859-1',
			'wordwrap' => TRUE
		);

		$message = $message;
		$this->load->library('email', $config);
		// $this->email->set_newline("\r\n");
		$this->email->from('dcar@sbcl.coop', 'SBCL');
		$this->email->to($to);
		$this->email->subject($sub);
		$this->email->message($message);
		if ($this->email->send()) {
			return 1;
		} else {
			show_error($this->email->print_debugger());
		}

	}

}