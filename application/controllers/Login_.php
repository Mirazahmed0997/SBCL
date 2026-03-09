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
	
    
	public function authentication_process()
	{
		$userinformation = $this->set_login_information($this->secure_data());
		$res = $this->User->user_validation("users", $userinformation);
		$confirm = $this->set_confirmation_msg($res, "Login Success", "Email and Password not match");
		
		if ($confirm == 1) {
			
			$this->session->set_userdata('currentActiveId', $res->id);
			
			redirect('admin_dashboard', 'location');
		} else {
			$this->session->set_flashdata('success', 'Username or Password invalid!');
			redirect('admin', 'location');
		}
	}
    
	private function set_login_information($input_validation)
	{
		if ($input_validation) {
		} else {
			$this->set_confirmation_msg("", "", "Please The Valid Data");
			redirect('admin', 'location');
		}
		$userinformation = array(
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'status' => 1
		);
		return $userinformation;
	}

	private function secure_data()
	{
		if($this->session->userdata('login_status')) {
			return TRUE;
		} else {
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
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
	

}







// <?php
// defined('BASEPATH') OR exit('No direct script access allowed');

// class Admin extends CI_Controller {

//     private $main_layout = 'admin/master_layout';
//     private $side_menu = 'admin/side_menu';
// 	private $serverDateTime = '';
//     public function __construct()
//     {
//         parent::__construct();
// 		$date = new DateTime();
// 		$this->serverDateTime = $date->format('Y-m-d H:i') . "\n";
//         if ($this->session->userdata('currentActiveId') == 1) {
//         } else {
//             $this->session->set_flashdata('login_failed', 'Link is broken');
//             redirect('admin');
//         }
//     }

//     public function index()
//     {
//         $data = $this->engine->store_nav('admin', 'Nothing', 'Welcome to dashboard');
// 		$president = $this->Common->get_data('president')->result();
// 		$data['total_president'] = count($president);
// 		$secretary = $this->Common->get_data('secretary')->result();
// 		$data['total_secretary'] = count($secretary);
// 		$jointsecretary = $this->Common->get_data('jointsecretary')->result();
// 		$data['total_jointsecretary'] = count($jointsecretary);

//         $path = 'admin/dashboard';
//         $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
//     }
// 	public function president_list () {
//         $data = $this->engine->store_nav('homepage', 'president_list', 'সভাপতির তালিকা');
// 		$data['presidents'] = $this->Common->get_data('president')->result();
//         $path = 'admin/president/president_list';
//         $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);

// 	}
// 	public function president_list_create () {
//         $data = $this->engine->store_nav('homepage', 'president_list', 'সভাপতির তালিকা');

//         $path = 'admin/president/president_list_create';
//         $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);

// 	}
// 	public function president_list_store(){
		
// 		$this->load->library('form_validation');
// 		$this->form_validation->set_error_delimiters('', '');
// 		$this->form_validation->set_rules('name', 'name', 'trim|required');
// 		$this->form_validation->set_rules('time', 'time', 'trim|required');
// 		$this->form_validation->set_rules('commitee', 'commitee', 'trim|required');
// 		$this->form_validation->set_rules('type', 'type', 'trim|required');
		
// 		// $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[teachers.email]');

// 		if ($this->form_validation->run() == false) {
// 			$this->session->set_flashdata('success', 'Please insert valid information!');
// 			redirect("Admin/president_list_create", "location");
// 		} else {

// 			$file_path_user_image = 'assets/uploads/photos/';
// 			$preFileName = time();
// 			$president_image = $this->do_upload('filename', $preFileName, $file_path_user_image);
			
// 			$data = array(
// 				//'login_id' => $this->lib->randomPin(8),
// 				'title' => $this->input->post("name", true),
// 				'time' => $this->input->post("time", true),
// 				'commitee' => $this->input->post("commitee", true),
// 				'type' => $this->input->post("type", true),
			
// 				'image' => $president_image,
				
// 			);
// 			$new_id = $this->Common->set_data('president', $data);

// 			redirect("Admin/president_list/$new_id?sk=1", "location");
// 		}
// 	}
// 	public function president_list_detete() {
// 		$id = $this->input->post('id');
// 		$this->Common->delete_data('president','id', $id);
// 		redirect("Admin/president_list", "location");
// 	}
//     public function do_upload($file, $preFileName, $file_path)
// 	{
// 		//		return 'demo.jpg';
// 		$config['upload_path'] = $file_path;
// 		$config['allowed_types'] = 'pdf|gif|jpg|png';
// 		// $config['max_size'] = 1024000;
// 		// $config['max_width'] = 2500;
// 		// $config['max_height'] = 2500;
// 		$config['file_name'] = $preFileName . '_' . $file;
// 		$this->load->library('upload', $config);

// 		if (!$this->upload->do_upload($file)) {
// 			$error = array('error' => $this->upload->display_errors());
// 			$fileName = '';
// 			echo $error['error'];
// 		} else {
// 			$upload_data = $this->upload->data(); 
// 			$config['image_library'] = 'gd2';  
// 			$config['source_image'] = $file_path.'/'.$upload_data["file_name"];  
// 			$config['create_thumb'] = FALSE;  
// 			$config['maintain_ratio'] = FALSE;  
// 			$config['quality'] = '60%';  
// 			$config['width'] = 200;  
// 			$config['height'] = 200;  
// 			$config['new_image'] = $file_path.'/'.$upload_data["file_name"];  
// 			$this->load->library('image_lib', $config);  
// 			$this->image_lib->resize();  
// 			$fileName = $upload_data['file_name'];
// 		}
// 		return $fileName;
// 	}
	
// }