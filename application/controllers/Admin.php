<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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


	public function index()
	{
		$data = $this->engine->store_nav('Nothing', 'Nothing', 'শিক্ষিত বেকার কেন্দ্রীয় সঞ্চয় ও ঋণদান সমবায় সমিতি');

		// Get member count
		$data['member_count'] = $this->db->count_all('members_n');

		$path = 'admin/dashboard';

		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}

	// ---------------------middle ware--------------------
	private function require_super_admin()
	{
		$user = $this->session->userdata('login_user_info_all');

		if ($user->role !== 'super_admin') {
			$this->session->set_flashdata('error', 'Only Super Admin have access to Update & Delete  user.');
			redirect('admin/users_list/users_list');
			exit;
		}
	}


	// --------------single member details------------

	public function view_member($id = null)
	{
		//  Redirect if no ID
		if (empty($id)) {
			redirect(base_url('Admin/members_list'));
		}

		//  Set dashboard navigation & page title
		$data = $this->engine->store_nav('members_list', 'members_list', 'সদস্য বিস্তারিত');

		// Fetch the specific member
		$data['member'] = $this->Common->get_data_single_conditional('members_n', 'id', $id)->row();

		//  Check if member exists
		if (!$data['member']) {
			show_404(); // member not found
		}

		$path = 'admin/members_list/member_Details';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}



	// -------------------Form View---------------------

	public function form_view($id = null)
	{
		//  Redirect if no ID
		if (empty($id)) {
			redirect(base_url('Admin/members_list'));
		}

		//  Set dashboard navigation & page title
		$data = $this->engine->store_nav('members_list', 'members_list', 'সদস্য বিস্তারিত');

		// Fetch the specific member
		$data['member'] = $this->Common->get_data_single_conditional('members_n', 'id', $id)->row();

		//  Check if member exists
		if (!$data['member']) {
			show_404(); // member not found
		}

		//  Render the member details inside dashboard layout
		// $path = 'admin/members_list/IdentityForm';
		$path = 'admin/members_list/form_view';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}


	public function IdentityForm_view($id = null)
	{
		//  Redirect if no ID
		if (empty($id)) {
			redirect(base_url('Admin/members_list'));
		}

		//  Set dashboard navigation & page title
		$data = $this->engine->store_nav('members_list', 'members_list', 'সদস্য বিস্তারিত');

		// Fetch the specific member
		$data['member'] = $this->Common->get_data_single_conditional('members_n', 'id', $id)->row();

		//  Check if member exists
		if (!$data['member']) {
			show_404(); // member not found
		}

		//  Render the member details inside dashboard layout
		$path = 'admin/members_list/IdentityForm';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}

	// ---------------------get all members-----------------


	public function members_list()
	{
		$data = $this->engine->store_nav('members_list', 'members_list', 'সদস্য তালিকা');

		$where_data = array();

		$id = $this->input->get('id');
		$branch_registration_no = $this->input->get('branch_registration_no');
		$mobile_number = $this->input->get('mobile_number');
		$branch_name = $this->input->get('branch_name');
		$from_date = $this->input->get('from_date');
		$to_date = $this->input->get('to_date');



		if (!empty($id)) {
			$where_data['id'] = $id;
		}

		if (!empty($branch_registration_no)) {
			$where_data['branch_registration_no'] = $branch_registration_no;
		}

		if (!empty($mobile_number)) {
			$where_data['mobile_number'] = $mobile_number;
		}

		if (!empty($branch_name)) {
			$where_data['branch_name'] = $branch_name;
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

		$data['members'] = $this->db->get('members_n')->result();

		$path = 'admin/members_list/members_list';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}

	// ---------------------delete member-----------------

	public function delete_member($id)
	{
		$this->Common->delete_data('members_n', 'id', $id);
		redirect('members');
	}




	public function edit_member($id)
	{
		$data['member'] = $this->db->get_where('members_n', ['id' => $id])->row();
		$this->load->view('site/members_list/updateForm', $data);
	}






	public function save_charge()
	{
		$id = $this->input->post('member_id');

		$data = [
			'subscription_fee' => $this->input->post('subscription_fee'),
		];

		$this->db->where('id', $id);
		$this->db->update('members_n', $data);

		echo "success"; 
	}


	public function approval_update()
	{
		$id = $this->input->post('member_id');

		$user = $this->session->userdata('login_user_info_all');


		$approved_by = $user->username;

		$data = [
			'active_status' => 1,
			'approved_by' => $approved_by,
			'approved_date' => date('Y-m-d H:i:s')
		];

		$this->db->where('id', $id);
		$this->db->update('members_n', $data);

		echo "success";
	}



	// -------------------member account details---------------------

	public function members_account($id = null)
	{
		$data = $this->engine->store_nav('members_list', 'members_list', 'সদস্য বিস্তারিত');

		// OPTIONAL: comment this for now
		// if (empty($id)) {
		//     redirect(base_url('Applicant/members_list'));
		// }

		// OPTIONAL: disable DB check for now
		// $data['member'] = ...
		// if (!$data['member']) {
		//     show_404();
		// }

		$path = 'admin/members_list/members_accounts_details';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}










	// ----------------------------users list--------------------



	public function users_list()
	{
		$data = $this->engine->store_nav('users_list', 'users_list', 'সদস্য তালিকা');

		$where_data = array();

		$id = $this->input->get('id');
		$username = $this->input->get('username');
		$mobile_number = $this->input->get('mobile_number');
		$role = $this->input->get('role');




		if (!empty($id)) {
			$where_data['id'] = $id;
		}

		if (!empty($username)) {
			$where_data['username'] = $username;
		}

		if (!empty($mobile_number)) {
			$where_data['mobile_number'] = $mobile_number;
		}

		if (!empty($role)) {
			$where_data['role'] = $role;
		}

		if (!empty($where_data)) {
			$this->db->where($where_data);
		}



		$data['users'] = $this->db->get('users')->result();

		$path = 'admin/users_list/users_list';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}

	// -----------------------update users role--------------

	public function update_users_role($id)
	{
		$this->require_super_admin();
		$users = $this->db->get_where('users', ['id' => $id])->row();

		$update_data = [

			'role' => $this->input->post('role'),
		];


		$this->db->where('id', $id);
		$this->db->update('users', $update_data);

		redirect(base_url('admin/users_list/users_list'));
	}



	// ---------------single user detail-----------------------


	public function view_user($id = null)
	{
		//  Redirect if no ID
		if (empty($id)) {
			redirect(base_url('Admin/users_list'));
		}

		//  Set dashboard navigation & page title
		$data = $this->engine->store_nav('users_list', 'users_list', 'সদস্য বিস্তারিত');

		// Fetch the specific member
		$data['user'] = $this->Common->get_data_single_conditional('users', 'id', $id)->row();

		//  Check if member exists
		if (!$data['user']) {
			show_404();
		}

		//  Render the member details inside dashboard layout
		$path = 'admin/users_list/users_details';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}


	// -------------------Upadate USer-----------------
	public function update_users_details($id)
	{
		$users = $this->db->get_where('users', ['id' => $id])->row();

		$update_data = [

			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),

			'username' => $this->input->post('username'),
			'mobile_number' => $this->input->post('mobile_number'),
			'designation' => $this->input->post('designation'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
		];


		$this->db->where('id', $id);
		$this->db->update('users', $update_data);

		redirect(base_url('admin/users_list/users_details'));
	}



	// ---------------------delete user-----------------

	public function delete_user($id)
	{
		$this->require_super_admin();
		$this->Common->delete_data('users', 'id', $id);
		redirect('admin/users_list/users_details');
	}





	 public function admin_orders_table()
    {
        $data = $this->engine->store_nav('my_orders', 'my_orders', 'তালিকা');


        $where_data = array();

        $id = $this->input->get('id');
        $name = $this->input->get('name');
        $mobile_number = $this->input->get('mobile_number');
        $address = $this->input->get('address');
        $status = $this->input->get('status');
        $payment_method = $this->input->get('payment_method');
        $total_amount = $this->input->get('total_amount');
        $from_date = $this->input->get('from_date');
        $to_date = $this->input->get('to_date');



        if (!empty($id)) {
            $where_data['id'] = $id;
        }

        if (!empty($name)) {
            $where_data['name'] = $name;
        }

        if (!empty($mobile_number)) {
            $where_data['mobile_number'] = $mobile_number;
        }

        if (!empty($address)) {
            $where_data['address'] = $address;
        }


        if (!empty($status)) {
            $where_data['status'] = $status;
        }

        if (!empty($total_amount)) {
            $where_data['total_amount'] = $total_amount;
        }
        if (!empty($payment_method)) {
            $where_data['payment_method'] = $payment_method;
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

        $data['orders'] = $this->db->get('orders_table')->result();

        $path = 'admin/orders_table/orders_table';
        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);


    }

    public function order_details($order_id)
    {
        $this->db->where('id', $order_id);
        $data = $this->engine->store_nav('my_orders', 'my_orders', 'তালিকা');
        $data['orders'] = $this->db->get_where('orders_table', [
            'id' => $order_id
        ])->row();

        $this->db->select('order_items.*, products.title');
        $this->db->from('order_items');
        $this->db->join('products', 'products.id = order_items.product_id');
        $this->db->where('order_items.order_id', $order_id);



        $data['items'] = $this->db->get()->result();

        // $this->load->view('order_details', $data);
        $path = 'admin/orders_table/orders_details';
        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
    }

	 public function order_status($id)
    {
		
        $status = $this->db->get_where('orders_table', ['id' => $id])->row();
		
       

        $update_data = [

            'status' => $this->input->post('status'),
			
        ];
		 


        $this->db->where('id', $id);
        $this->db->update('orders_table', $update_data);
		
        redirect(base_url('admin_orders_table'));
    }


































	// {
	// 	$data = $this->engine->store_nav('admin', 'Nothing', 'Welcome to dashboard');
	// 	$president = $this->Common->get_data('president')->result();
	// 	$data['total_president'] = count($president);
	// 	$secretary = $this->Common->get_data('secretary')->result();
	// 	$data['total_secretary'] = count($secretary);
	// 	$jointsecretary = $this->Common->get_data('jointsecretary')->result();
	// 	$data['total_jointsecretary'] = count($jointsecretary);

	// 	$path = 'admin/dashboard';
	// 	$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	// }
	public function president_list()
	{
		$data = $this->engine->store_nav('homepage', 'president_list', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');
		$presidents = $this->Common->get_data_desc('president', 'id');
		$links = array('next' => 'Next', 'prev' => 'Previous', 'first' => 'First', 'last' => 'Last');
		$this->pagination_bootstrap->set_links($links);

		$this->pagination_bootstrap->offset(10);
		$url = "Admin/president_list";
		$data['presidents'] = $this->pagination_bootstrap->config($url, $presidents);

		$path = 'admin/president/president_list';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function president_list_create()
	{
		$data = $this->engine->store_nav('homepage', 'president_list', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');

		$path = 'admin/president/president_list_create';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function president_list_store()
	{

		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('time', 'time', 'trim|required');
		$this->form_validation->set_rules('commitee', 'commitee', 'trim|required');
		$this->form_validation->set_rules('type', 'type', 'trim|required');

		// $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[teachers.email]');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('success', 'Please insert valid information!');
			redirect("Admin/president_list_create", "location");
		} else {

			$file_path_user_image = 'assets/uploads/photos/';
			$preFileName = time();
			$president_image = $this->do_upload('filename', $preFileName, $file_path_user_image);

			$data = array(
				//'login_id' => $this->lib->randomPin(8),
				'title' => $this->input->post("name", true),
				'time' => $this->input->post("time", true),
				'commitee' => $this->input->post("commitee", true),
				'type' => $this->input->post("type", true),
				'image' => $president_image,
				'description' => $this->input->post("pageditor"),


			);
			$new_id = $this->Common->set_data('president', $data);

			redirect("Admin/president_list/$new_id?sk=1", "location");
		}
	}

	public function president_list_edit()
	{
		$data = $this->engine->store_nav('homepage', 'president_list', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');

		$id = $this->input->post('id');
		$where_data['id'] = $id;
		$data['president_list'] = $this->Common->get_data_multi_conditional('president', $where_data)->row();

		$path = 'admin/president/president_list_edit';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}

	public function president_list_update()
	{

		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('time', 'time', 'trim|required');
		$this->form_validation->set_rules('commitee', 'commitee', 'trim|required');
		$this->form_validation->set_rules('type', 'type', 'trim|required');

		// $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[teachers.email]');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('success', 'Please insert valid information!');
			redirect("Admin/president_list", "location");
		} else {

			$id = $this->input->post('id');
			if (!empty($_FILES['filename']['name'])) {
				$file_path_user_image = 'assets/uploads/photos/';
				$preFileName = time();
				$president_image = $this->do_upload('filename', $preFileName, $file_path_user_image);

				$where_data_edit['id'] = $this->input->post('id');
				$image_data = $this->Common->get_data_multi_conditional('president', $where_data_edit)->row();
				if (file_exists($file_path_user_image . $image_data->image)) {
					unlink($file_path_user_image . $image_data->image);
				}
			} else {
				$president_image = $this->input->post('president_img');
			}

			$data = array(
				//'login_id' => $this->lib->randomPin(8),
				'title' => $this->input->post("name", true),
				'time' => $this->input->post("time", true),
				'commitee' => $this->input->post("commitee", true),
				'type' => $this->input->post("type", true),

				'image' => $president_image,
				'description' => $this->input->post("pageditor"),

			);
			$new_id = $this->Common->update_data('president', 'id', $id, $data);

			redirect("Admin/president_list/$new_id?sk=1", "location");
		}
	}

	public function ceo_list()
	{
		$data = $this->engine->store_nav('homepage', 'ceo_list', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');
		$ceos = $this->Common->get_data_desc('ceo', 'id');
		$links = array('next' => 'Next', 'prev' => 'Previous', 'first' => 'First', 'last' => 'Last');
		$this->pagination_bootstrap->set_links($links);

		$this->pagination_bootstrap->offset(10);
		$url = "Admin/ceo_list";
		$data['ceos'] = $this->pagination_bootstrap->config($url, $ceos);

		$path = 'admin/ceo/ceo_list';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function ceo_list_create()
	{
		$data = $this->engine->store_nav('homepage', 'ceo_list', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');

		$path = 'admin/ceo/ceo_list_create';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function ceo_list_store()
	{

		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('time', 'time', 'trim|required');
		$this->form_validation->set_rules('commitee', 'commitee', 'trim|required');
		$this->form_validation->set_rules('type', 'type', 'trim|required');

		// $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[teachers.email]');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('success', 'Please insert valid information!');
			redirect("Admin/ceo_list_create", "location");
		} else {

			$file_path_user_image = 'assets/uploads/photos/';
			$preFileName = time();
			$ceo_image = $this->do_upload('filename', $preFileName, $file_path_user_image);

			$data = array(
				'title' => $this->input->post("name", true),
				'time' => $this->input->post("time", true),
				'commitee' => $this->input->post("commitee", true),
				'type' => $this->input->post("type", true),
				'image' => $ceo_image,
				'description' => $this->input->post("pageditor"),
			);
			$new_id = $this->Common->set_data('ceo', $data);

			redirect("Admin/ceo_list/$new_id?sk=1", "location");
		}
	}

	public function ceo_list_edit()
	{
		$data = $this->engine->store_nav('homepage', 'ceo_list', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');

		$id = $this->input->post('id');
		$where_data['id'] = $id;
		$data['ceo_list'] = $this->Common->get_data_multi_conditional('ceo', $where_data)->row();

		$path = 'admin/ceo/ceo_list_edit';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}

	public function ceo_list_update()
	{

		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('time', 'time', 'trim|required');
		$this->form_validation->set_rules('commitee', 'commitee', 'trim|required');
		$this->form_validation->set_rules('type', 'type', 'trim|required');

		// $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[teachers.email]');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('success', 'Please insert valid information!');
			redirect("Admin/ceo_list", "location");
		} else {

			$id = $this->input->post('id');
			if (!empty($_FILES['filename']['name'])) {
				$file_path_user_image = 'assets/uploads/photos/';
				$preFileName = time();
				$ceo_image = $this->do_upload('filename', $preFileName, $file_path_user_image);

				$where_data_edit['id'] = $this->input->post('id');
				$image_data = $this->Common->get_data_multi_conditional('ceo', $where_data_edit)->row();
				if (file_exists($file_path_user_image . $image_data->image)) {
					unlink($file_path_user_image . $image_data->image);
				}
			} else {
				$ceo_image = $this->input->post('ceo_img');
			}

			$data = array(
				//'login_id' => $this->lib->randomPin(8),
				'title' => $this->input->post("name", true),
				'time' => $this->input->post("time", true),
				'commitee' => $this->input->post("commitee", true),
				'type' => $this->input->post("type", true),

				'image' => $ceo_image,
				'description' => $this->input->post("pageditor"),

			);
			$new_id = $this->Common->update_data('ceo', 'id', $id, $data);

			redirect("Admin/ceo_list/$new_id?sk=1", "location");
		}
	}

	public function ceo_list_detete()
	{
		$id = $this->input->post('id');
		$file_path_user_image = 'assets/uploads/photos/';
		$where_data_edit['id'] = $id;
		$image_data = $this->Common->get_data_multi_conditional('ceo', $where_data_edit)->row();
		if (file_exists($file_path_user_image . $image_data->image)) {
			unlink($file_path_user_image . $image_data->image);
		}
		$this->Common->delete_data('ceo', 'id', $id);
		redirect("Admin/ceo_list", "location");
	}
	public function about_president()
	{
		$data = $this->engine->store_nav('site', 'about_president', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');

		$data['about_president'] = $this->Common->get_data('about_mayor')->row();
		// x_debug($data['about_president']);
		$path = 'admin/president/about_president';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}

	public function about_president_update()
	{

		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('title', 'title', 'trim|required');
		$this->form_validation->set_rules('pageditor', 'pageditor', 'trim|required');

		// $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[teachers.email]');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('success', 'Please insert valid information!');
			redirect("Admin/about_president", "location");
		} else {
			if (!empty($_FILES['filename']['name'])) {
				$file_path_user_image = 'assets/uploads/photos/';
				$preFileName = time();
				$president_image = $this->do_upload('filename', $preFileName, $file_path_user_image);

				$where_data_edit['id'] = $this->input->post('id');
				$image_data = $this->Common->get_data_multi_conditional('about_mayor', $where_data_edit)->row();
				if (file_exists($file_path_user_image . $image_data->image)) {
					unlink($file_path_user_image . $image_data->image);
				}
			} else {
				$president_image = $this->input->post('president_img');
			}

			$data = array(
				'name' => $this->input->post("title", true),
				'about' => $this->input->post("pageditor"),
				'fileName' => $president_image,

			);
			$id = $this->input->post('id');
			$new_id = $this->Common->update_data('about_mayor', 'id', $id, $data);

			redirect("Admin/about_president/$new_id?sk=1", "location");
		}
	}
	public function president_list_detete()
	{
		$id = $this->input->post('id');
		$file_path_user_image = 'assets/uploads/photos/';
		$where_data_edit['id'] = $id;
		$image_data = $this->Common->get_data_multi_conditional('president', $where_data_edit)->row();
		if (file_exists($file_path_user_image . $image_data->image)) {
			unlink($file_path_user_image . $image_data->image);
		}
		$this->Common->delete_data('president', 'id', $id);
		redirect("Admin/president_list", "location");
	}
	public function secretary_list()
	{
		$data = $this->engine->store_nav('homepage', 'secretary_list', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');
		$secretarys = $this->Common->get_data_desc('secretary', 'id');
		$links = array('next' => 'Next', 'prev' => 'Previous', 'first' => 'First', 'last' => 'Last');
		$this->pagination_bootstrap->set_links($links);

		$this->pagination_bootstrap->offset(10);
		$url = "Admin/secretary_list";
		$data['secretarys'] = $this->pagination_bootstrap->config($url, $secretarys);

		$path = 'admin/secretary/secretary_list';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function secretary_list_create()
	{
		$data = $this->engine->store_nav('homepage', 'secretary_list', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');

		$path = 'admin/secretary/secretary_list_create';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function secretary_list_store()
	{

		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('time', 'time', 'trim|required');
		$this->form_validation->set_rules('commitee', 'commitee', 'trim|required');
		$this->form_validation->set_rules('type', 'type', 'trim|required');

		// $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[teachers.email]');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('success', 'Please insert valid information!');
			redirect("Admin/secretary_list_create", "location");
		} else {

			$file_path_user_image = 'assets/uploads/photos/';
			$preFileName = time();
			$secretary_image = $this->do_upload('filename', $preFileName, $file_path_user_image);

			$data = array(
				//'login_id' => $this->lib->randomPin(8),
				'title' => $this->input->post("name", true),
				'time' => $this->input->post("time", true),
				'commitee' => $this->input->post("commitee", true),
				'type' => $this->input->post("type", true),

				'image' => $secretary_image,

			);
			$new_id = $this->Common->set_data('secretary', $data);

			redirect("Admin/secretary_list/$new_id?sk=1", "location");
		}
	}

	public function secretary_list_edit()
	{
		$data = $this->engine->store_nav('homepage', 'secretary_list', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');

		$id = $this->input->post('id');
		$where_data['id'] = $id;
		$data['secretary_list'] = $this->Common->get_data_multi_conditional('secretary', $where_data)->row();

		$path = 'admin/secretary/secretary_list_edit';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}

	public function secretary_list_update()
	{

		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('time', 'time', 'trim|required');
		$this->form_validation->set_rules('commitee', 'commitee', 'trim|required');
		$this->form_validation->set_rules('type', 'type', 'trim|required');

		// $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[teachers.email]');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('success', 'Please insert valid information!');
			redirect("Admin/secretary_list", "location");
		} else {
			if (!empty($_FILES['filename']['name'])) {
				$file_path_user_image = 'assets/uploads/photos/';
				$preFileName = time();
				$secretary_image = $this->do_upload('filename', $preFileName, $file_path_user_image);
				$where_data_edit['id'] = $this->input->post('id');
				$image_data = $this->Common->get_data_multi_conditional('secretary', $where_data_edit)->row();
				if (file_exists($file_path_user_image . $image_data->image)) {
					unlink($file_path_user_image . $image_data->image);
				}
			} else {
				$secretary_image = $this->input->post('secretary_img');
			}
			$data = array(
				//'login_id' => $this->lib->randomPin(8),
				'title' => $this->input->post("name", true),
				'time' => $this->input->post("time", true),
				'commitee' => $this->input->post("commitee", true),
				'type' => $this->input->post("type", true),

				'image' => $secretary_image,

			);
			$id = $this->input->post('id');
			$new_id = $this->Common->update_data('secretary', 'id', $id, $data);

			redirect("Admin/secretary_list/$new_id?sk=1", "location");
		}
	}

	public function about_ceo()
	{
		$data = $this->engine->store_nav('site', 'about_ceo', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');

		$data['about_ceo'] = $this->Common->get_data('about_ceo')->row();
		// x_debug($data['about_ceo']);
		$path = 'admin/president/about_ceo';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}

	public function about_ceo_update()
	{

		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('title', 'title', 'trim|required');
		$this->form_validation->set_rules('pageditor', 'pageditor', 'trim|required');

		// $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[teachers.email]');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('success', 'Please insert valid information!');
			redirect("Admin/about_ceo", "location");
		} else {
			if (!empty($_FILES['filename']['name'])) {
				$file_path_user_image = 'assets/uploads/photos/';
				$preFileName = time();
				$president_image = $this->do_upload('filename', $preFileName, $file_path_user_image);
				$where_data_edit['id'] = $this->input->post('id');
				$image_data = $this->Common->get_data_multi_conditional('about_ceo', $where_data_edit)->row();
				if (file_exists($file_path_user_image . $image_data->image)) {
					unlink($file_path_user_image . $image_data->image);
				}
			} else {
				$president_image = $this->input->post('president_img');
			}

			$data = array(
				'name' => $this->input->post("title", true),
				'about' => $this->input->post("pageditor"),
				'fileName' => $president_image,

			);
			$id = $this->input->post('id');
			$new_id = $this->Common->update_data('about_ceo', 'id', $id, $data);

			redirect("Admin/about_ceo/$new_id?sk=1", "location");
		}
	}
	public function secretary_list_detete()
	{
		$id = $this->input->post('id');
		$file_path_user_image = 'assets/uploads/photos/';
		$where_data_edit['id'] = $id;
		$image_data = $this->Common->get_data_multi_conditional('secretary', $where_data_edit)->row();
		if (file_exists($file_path_user_image . $image_data->image)) {
			unlink($file_path_user_image . $image_data->image);
		}
		$this->Common->delete_data('secretary', 'id', $id);
		redirect("Admin/secretary_list", "location");
	}

	public function about_secretary()
	{
		$data = $this->engine->store_nav('site', 'about_secretary', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');

		$data['about_secretary'] = $this->Common->get_data('about_secr')->row();
		// x_debug($data['about_secretary']);
		$path = 'admin/secretary/about_secretary';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}

	public function about_secretary_update()
	{

		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('title', 'title', 'trim|required');
		$this->form_validation->set_rules('pageditor', 'pageditor', 'trim|required');

		// $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[teachers.email]');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('success', 'Please insert valid information!');
			redirect("Admin/about_secretary", "location");
		} else {
			if (!empty($_FILES['filename']['name'])) {
				$file_path_user_image = 'assets/uploads/photos/';
				$preFileName = time();
				$secretary_image = $this->do_upload('filename', $preFileName, $file_path_user_image);
				$where_data_edit['id'] = $this->input->post('id');
				$image_data = $this->Common->get_data_multi_conditional('about_secr', $where_data_edit)->row();
				if (file_exists($file_path_user_image . $image_data->image)) {
					unlink($file_path_user_image . $image_data->image);
				}
			} else {
				$secretary_image = $this->input->post('secretary_img');
			}

			$data = array(
				'name' => $this->input->post("title", true),
				'about' => $this->input->post("pageditor"),
				'fileName' => $secretary_image,

			);
			$id = $this->input->post('id');
			$new_id = $this->Common->update_data('about_secr', 'id', $id, $data);

			redirect("Admin/about_secretary/$new_id?sk=1", "location");
		}
	}
	public function jointsecretary_list()
	{
		$data = $this->engine->store_nav('homepage', 'jointsecretary_list', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');
		$jointsecretarys = $this->Common->get_data_desc('jointsecretary', 'id');
		$links = array('next' => 'Next', 'prev' => 'Previous', 'first' => 'First', 'last' => 'Last');
		$this->pagination_bootstrap->set_links($links);

		$this->pagination_bootstrap->offset(10);
		$url = "Admin/jointsecretary_list";
		$data['jointsecretarys'] = $this->pagination_bootstrap->config($url, $jointsecretarys);

		$path = 'admin/jointsecretary/jointsecretary_list';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function jointsecretary_list_create()
	{
		$data = $this->engine->store_nav('homepage', 'jointsecretary_list', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');

		$path = 'admin/jointsecretary/jointsecretary_list_create';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function jointsecretary_list_store()
	{

		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('time', 'time', 'trim|required');
		$this->form_validation->set_rules('commitee', 'commitee', 'trim|required');
		$this->form_validation->set_rules('type', 'type', 'trim|required');

		// $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[teachers.email]');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('success', 'Please insert valid information!');
			redirect("Admin/jointsecretary_list_create", "location");
		} else {

			$file_path_user_image = 'assets/uploads/photos/';
			$preFileName = time();
			$jointsecretary_image = $this->do_upload('filename', $preFileName, $file_path_user_image);

			$data = array(
				//'login_id' => $this->lib->randomPin(8),
				'title' => $this->input->post("name", true),
				'time' => $this->input->post("time", true),
				'commitee' => $this->input->post("commitee", true),
				'type' => $this->input->post("type", true),
				'image' => $jointsecretary_image,
				'description' => $this->input->post("pageditor"),

			);
			$new_id = $this->Common->set_data('jointsecretary', $data);

			redirect("Admin/jointsecretary_list/$new_id?sk=1", "location");
		}
	}

	public function jointsecretary_list_edit()
	{
		$data = $this->engine->store_nav('homepage', 'jointsecretary_list', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');

		$id = $this->input->post('id');
		$where_data['id'] = $id;
		$data['jointsecretary_list'] = $this->Common->get_data_multi_conditional('jointsecretary', $where_data)->row();

		$path = 'admin/jointsecretary/jointsecretary_list_edit';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}

	public function jointsecretary_list_update()
	{

		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('time', 'time', 'trim|required');
		$this->form_validation->set_rules('commitee', 'commitee', 'trim|required');
		$this->form_validation->set_rules('type', 'type', 'trim|required');

		// $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[teachers.email]');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('success', 'Please insert valid information!');
			redirect("Admin/jointsecretary_list", "location");
		} else {
			if (!empty($_FILES['filename']['name'])) {
				$file_path_user_image = 'assets/uploads/photos/';
				$preFileName = time();
				$jointsecretary_image = $this->do_upload('filename', $preFileName, $file_path_user_image);
				$where_data_edit['id'] = $this->input->post('id');
				$image_data = $this->Common->get_data_multi_conditional('jointsecretary', $where_data_edit)->row();
				if (file_exists($file_path_user_image . $image_data->image)) {
					unlink($file_path_user_image . $image_data->image);
				}
			} else {
				$jointsecretary_image = $this->input->post('jointsecretary_img');
			}
			$data = array(
				//'login_id' => $this->lib->randomPin(8),
				'title' => $this->input->post("name", true),
				'time' => $this->input->post("time", true),
				'commitee' => $this->input->post("commitee", true),
				'type' => $this->input->post("type", true),

				'image' => $jointsecretary_image,
				'description' => $this->input->post("pageditor"),

			);
			$id = $this->input->post('id');
			$new_id = $this->Common->update_data('jointsecretary', 'id', $id, $data);

			redirect("Admin/jointsecretary_list/$new_id?sk=1", "location");
		}
	}
	public function jointsecretary_list_detete()
	{
		$id = $this->input->post('id');
		$file_path_user_image = 'assets/uploads/photos/';
		$where_data_edit['id'] = $id;
		$image_data = $this->Common->get_data_multi_conditional('jointsecretary', $where_data_edit)->row();
		if (file_exists($file_path_user_image . $image_data->image)) {
			unlink($file_path_user_image . $image_data->image);
		}
		$this->Common->delete_data('jointsecretary', 'id', $id);
		redirect("Admin/jointsecretary_list", "location");
	}

	public function prize()
	{
		$data = $this->engine->store_nav('homepage', 'prize', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');
		$data['prizes'] = $this->Common->get_data('prize')->result();
		$path = 'admin/prize/prize';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function prize_create()
	{
		$data = $this->engine->store_nav('homepage', 'prize', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');

		$path = 'admin/prize/prize_create';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function prize_store()
	{

		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('name', 'name', 'trim|required');

		// $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[teachers.email]');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('success', 'Please insert valid information!');
			redirect("Admin/prize_create", "location");
		} else {

			$file_path_user_image = 'assets/uploads/prize/';
			$preFileName = time();
			$prize_image = $this->do_upload('filename', $preFileName, $file_path_user_image);

			$data = array(
				//'login_id' => $this->lib->randomPin(8),
				'title' => $this->input->post("name", true),
				'image' => $prize_image,

			);
			$new_id = $this->Common->set_data('prize', $data);

			redirect("Admin/prize/$new_id?sk=1", "location");
		}
	}

	public function prize_edit()
	{
		$data = $this->engine->store_nav('homepage', 'prize', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');

		$id = $this->input->post('id');
		$where_data['id'] = $id;
		$data['prize'] = $this->Common->get_data_multi_conditional('prize', $where_data)->row();

		$path = 'admin/prize/prize_edit';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}

	public function prize_update()
	{

		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('name', 'name', 'trim|required');

		// $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[teachers.email]');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('success', 'Please insert valid information!');
			redirect("Admin/prize", "location");
		} else {
			if (!empty($_FILES['filename']['name'])) {
				$file_path_user_image = 'assets/uploads/prize/';
				$preFileName = time();
				$prize_image = $this->do_upload('filename', $preFileName, $file_path_user_image);
				$where_data_edit['id'] = $this->input->post('id');
				$image_data = $this->Common->get_data_multi_conditional('prize', $where_data_edit)->row();
				if (file_exists($file_path_user_image . $image_data->image)) {
					unlink($file_path_user_image . $image_data->image);
				}
			} else {
				$prize_image = $this->input->post('prize_img');
			}
			$data = array(
				//'login_id' => $this->lib->randomPin(8),
				'title' => $this->input->post("name", true),
				'image' => $prize_image,

			);
			$id = $this->input->post('id');
			$new_id = $this->Common->update_data('prize', 'id', $id, $data);

			redirect("Admin/prize/$new_id?sk=1", "location");
		}
	}
	public function prize_detete()
	{
		$id = $this->input->post('id');
		$file_path_user_image = 'assets/uploads/prize/';
		$where_data_edit['id'] = $id;
		$image_data = $this->Common->get_data_multi_conditional('prize', $where_data_edit)->row();
		if (file_exists($file_path_user_image . $image_data->image)) {
			unlink($file_path_user_image . $image_data->image);
		}
		$this->Common->delete_data('prize', 'id', $id);
		redirect("Admin/prize", "location");
	}
	public function presidentpic()
	{
		$data = $this->engine->store_nav('homepage', 'presidentpic', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');
		$data['presidentpics'] = $this->Common->get_data('presidentpic')->result();
		// x_debug($data['presidentpics']);
		$path = 'admin/president/presidentpic';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function presidentpic_create()
	{
		$data = $this->engine->store_nav('homepage', 'presidentpic', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');

		$path = 'admin/president/presidentpic_create';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function presidentpic_store()
	{

		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('time', 'time', 'trim|required');

		// $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[teachers.email]');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('success', 'Please insert valid information!');
			redirect("Admin/presidentpic_create", "location");
		} else {

			$file_path_user_image = 'assets/uploads/photos/';
			$preFileName = time();
			$presidentpic_image = $this->do_upload('filename', $preFileName, $file_path_user_image);

			$data = array(
				'title' => $this->input->post("name", true),
				'time' => $this->input->post("time", true),
				'image' => $presidentpic_image,

			);
			$new_id = $this->Common->set_data('presidentpic', $data);

			redirect("Admin/presidentpic/$new_id?sk=1", "location");
		}
	}

	public function presidentpic_edit()
	{
		$data = $this->engine->store_nav('homepage', 'presidentpic', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');

		$id = $this->input->post('id');
		$where_data['id'] = $id;
		$data['presidentpic'] = $this->Common->get_data_multi_conditional('presidentpic', $where_data)->row();

		$path = 'admin/president/presidentpic_edit';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}

	public function presidentpic_update()
	{

		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('time', 'time', 'trim|required');

		// $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[teachers.email]');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('success', 'Please insert valid information!');
			redirect("Admin/presidentpic", "location");
		} else {
			if (!empty($_FILES['filename']['name'])) {
				$file_path_user_image = 'assets/uploads/photos/';
				$preFileName = time();
				$presidentpic_image = $this->do_upload('filename', $preFileName, $file_path_user_image);
				$where_data_edit['id'] = $this->input->post('id');
				$image_data = $this->Common->get_data_multi_conditional('presidentpic', $where_data_edit)->row();
				if (file_exists($file_path_user_image . $image_data->image)) {
					unlink($file_path_user_image . $image_data->image);
				}
			} else {
				$presidentpic_image = $this->input->post('presidentpic_img');
			}
			$data = array(
				//'login_id' => $this->lib->randomPin(8),
				'title' => $this->input->post("name", true),
				'time' => $this->input->post("time", true),
				'image' => $presidentpic_image,

			);
			$id = $this->input->post('id');
			$new_id = $this->Common->update_data('presidentpic', 'id', $id, $data);

			redirect("Admin/presidentpic/$new_id?sk=1", "location");
		}
	}
	public function presidentpic_detete()
	{
		$id = $this->input->post('id');
		$file_path_user_image = 'assets/uploads/photos/';
		$where_data_edit['id'] = $id;
		$image_data = $this->Common->get_data_multi_conditional('presidentpic', $where_data_edit)->row();
		if (file_exists($file_path_user_image . $image_data->image)) {
			unlink($file_path_user_image . $image_data->image);
		}
		$this->Common->delete_data('presidentpic', 'id', $id);
		redirect("Admin/presidentpic", "location");
	}

	public function joinsecretarypic()
	{
		$data = $this->engine->store_nav('homepage', 'joinsecretarypic', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');
		$data['joinsecretarypics'] = $this->Common->get_data('vpresidentpic')->result();
		// x_debug($data['joinsecretarypics']);
		$path = 'admin/jointsecretary/jointsecretarypic';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function joinsecretarypic_create()
	{
		$data = $this->engine->store_nav('homepage', 'joinsecretarypic', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');

		$path = 'admin/jointsecretary/jointsecretarypic_create';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function joinsecretarypic_store()
	{

		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('time', 'time', 'trim|required');

		// $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[teachers.email]');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('success', 'Please insert valid information!');
			redirect("Admin/joinsecretarypic_create", "location");
		} else {

			$file_path_user_image = 'assets/uploads/photos/';
			$preFileName = time();
			$joinsecretarypic_image = $this->do_upload('filename', $preFileName, $file_path_user_image);

			$data = array(
				'title' => $this->input->post("name", true),
				'time' => $this->input->post("time", true),
				'image' => $joinsecretarypic_image,

			);
			$new_id = $this->Common->set_data('vpresidentpic', $data);

			redirect("Admin/joinsecretarypic/$new_id?sk=1", "location");
		}
	}

	public function joinsecretarypic_edit()
	{
		$data = $this->engine->store_nav('homepage', 'joinsecretarypic', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');

		$id = $this->input->post('id');
		$where_data['id'] = $id;
		$data['joinsecretarypic'] = $this->Common->get_data_multi_conditional('vpresidentpic', $where_data)->row();

		$path = 'admin/jointsecretary/jointsecretarypic_edit';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}

	public function joinsecretarypic_update()
	{

		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('time', 'time', 'trim|required');

		// $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[teachers.email]');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('success', 'Please insert valid information!');
			redirect("Admin/joinsecretarypic", "location");
		} else {
			if (!empty($_FILES['filename']['name'])) {
				$file_path_user_image = 'assets/uploads/photos/';
				$preFileName = time();
				$joinsecretarypic_image = $this->do_upload('filename', $preFileName, $file_path_user_image);
				$where_data_edit['id'] = $this->input->post('id');
				$image_data = $this->Common->get_data_multi_conditional('vpresidentpic', $where_data_edit)->row();
				if (file_exists($file_path_user_image . $image_data->image)) {
					unlink($file_path_user_image . $image_data->image);
				}
			} else {
				$joinsecretarypic_image = $this->input->post('joinsecretarypic_img');
			}
			$data = array(
				//'login_id' => $this->lib->randomPin(8),
				'title' => $this->input->post("name", true),
				'time' => $this->input->post("time", true),
				'image' => $joinsecretarypic_image,
				'description' => $this->input->post("pageditor"),

			);
			$id = $this->input->post('id');
			$new_id = $this->Common->update_data('vpresidentpic', 'id', $id, $data);

			redirect("Admin/joinsecretarypic/$new_id?sk=1", "location");
		}
	}
	public function joinsecretarypic_detete()
	{
		$id = $this->input->post('id');

		$file_path_user_image = 'assets/uploads/photos/';
		$where_data_edit['id'] = $id;
		$image_data = $this->Common->get_data_multi_conditional('vpresidentpic', $where_data_edit)->row();
		if (file_exists($file_path_user_image . $image_data->image)) {
			unlink($file_path_user_image . $image_data->image);
		}
		$this->Common->delete_data('vpresidentpic', 'id', $id);
		redirect("Admin/joinsecretarypic", "location");
	}
	public function secretarypic()
	{
		$data = $this->engine->store_nav('homepage', 'secretarypic', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');
		$data['secretarypics'] = $this->Common->get_data('secretarypic')->result();
		// x_debug($data['secretarypics']);
		$path = 'admin/secretary/secretarypic';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function secretarypic_create()
	{
		$data = $this->engine->store_nav('homepage', 'secretarypic', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');

		$path = 'admin/secretary/secretarypic_create';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function secretarypic_store()
	{

		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('time', 'time', 'trim|required');

		// $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[teachers.email]');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('success', 'Please insert valid information!');
			redirect("Admin/secretarypic_create", "location");
		} else {

			$file_path_user_image = 'assets/uploads/photos/';
			$preFileName = time();
			$secretarypic_image = $this->do_upload('filename', $preFileName, $file_path_user_image);

			$data = array(
				'title' => $this->input->post("name", true),
				'time' => $this->input->post("time", true),
				'image' => $secretarypic_image,

			);
			$new_id = $this->Common->set_data('secretarypic', $data);

			redirect("Admin/secretarypic/$new_id?sk=1", "location");
		}
	}

	public function secretarypic_edit()
	{
		$data = $this->engine->store_nav('homepage', 'secretarypic', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');

		$id = $this->input->post('id');
		$where_data['id'] = $id;
		$data['secretarypic'] = $this->Common->get_data_multi_conditional('secretarypic', $where_data)->row();

		$path = 'admin/secretary/secretarypic_edit';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}

	public function secretarypic_update()
	{

		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('time', 'time', 'trim|required');

		// $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[teachers.email]');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('success', 'Please insert valid information!');
			redirect("Admin/secretarypic", "location");
		} else {
			if (!empty($_FILES['filename']['name'])) {
				$file_path_user_image = 'assets/uploads/photos/';
				$preFileName = time();
				$secretarypic_image = $this->do_upload('filename', $preFileName, $file_path_user_image);
				$where_data_edit['id'] = $this->input->post('id');
				$image_data = $this->Common->get_data_multi_conditional('secretarypic', $where_data_edit)->row();
				if (file_exists($file_path_user_image . $image_data->image)) {
					unlink($file_path_user_image . $image_data->image);
				}
			} else {
				$secretarypic_image = $this->input->post('secretarypic_img');
			}
			$data = array(
				//'login_id' => $this->lib->randomPin(8),
				'title' => $this->input->post("name", true),
				'time' => $this->input->post("time", true),
				'image' => $secretarypic_image,

			);
			$id = $this->input->post('id');
			$new_id = $this->Common->update_data('secretarypic', 'id', $id, $data);

			redirect("Admin/secretarypic/$new_id?sk=1", "location");
		}
	}
	public function secretarypic_detete()
	{
		$id = $this->input->post('id');
		$file_path_user_image = 'assets/uploads/photos/';
		$where_data_edit['id'] = $id;
		$image_data = $this->Common->get_data_multi_conditional('secretarypic', $where_data_edit)->row();
		if (file_exists($file_path_user_image . $image_data->image)) {
			unlink($file_path_user_image . $image_data->image);
		}
		$this->Common->delete_data('secretarypic', 'id', $id);
		redirect("Admin/secretarypic", "location");
	}

	public function video()
	{
		$data = $this->engine->store_nav('homepage', 'video', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');
		$videos = $this->Common->get_data_desc('video', 'id');
		$links = array('next' => 'Next', 'prev' => 'Previous', 'first' => 'First', 'last' => 'Last');
		$this->pagination_bootstrap->set_links($links);

		$this->pagination_bootstrap->offset(10);
		$url = "Admin/video";
		$data['videos'] = $this->pagination_bootstrap->config($url, $videos);

		// x_debug($data['videos']);
		$path = 'admin/video/video';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}

	public function video_create()
	{
		$data = $this->engine->store_nav('homepage', 'video', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');

		$path = 'admin/video/video_create';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function video_store()
	{

		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('video_type', 'video_type', 'trim|required');

		// $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[teachers.email]');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('success', 'Please insert valid information!');
			redirect("Admin/video_create", "location");
		} else {
			$video_type = $this->input->post("video_type");
			if ($video_type == 1) {
				$upload_name = $this->videoc_upload('filename');
				$data = array(
					'type' => $video_type,
					'title' => $upload_name,
					'status' => 1,
				);
			} elseif ($video_type == 2) {
				$data = array(
					'type' => $video_type,
					'title' => $this->input->post("name"),
					'status' => 1,
				);
			}
			$new_id = $this->Common->set_data('video', $data);

			redirect("Admin/video/$new_id?sk=1", "location");
		}
	}

	public function video_edit()
	{
		$data = $this->engine->store_nav('homepage', 'video', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');

		$id = $this->input->post('id');
		$where_data['id'] = $id;
		$data['video'] = $this->Common->get_data_multi_conditional('video', $where_data)->row();

		$path = 'admin/video/video_edit';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}

	public function video_update()
	{

		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('video_type', 'video_type', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('success', 'Please insert valid information!');
			redirect("Admin/video", "location");
		} else {
			$video_type = $this->input->post("video_type");
			if ($video_type == 1) {
				$upload_name = $this->videoc_upload('filename');
				$upload_path = 'assets/uploads/videos/';
				$where_data_edit['id'] = $this->input->post('id');
				$video_data = $this->Common->get_data_multi_conditional('video', $where_data_edit)->row();
				if (file_exists($upload_path . $video_data->title)) {
					unlink($upload_path . $video_data->title);
				}
				$data = array(
					'type' => $video_type,
					'title' => $upload_name,
					'status' => 1,
				);
			} elseif ($video_type == 2) {
				$data = array(
					'type' => $video_type,
					'title' => $this->input->post("name"),
					'status' => 1,
				);
			}
			$id = $this->input->post('id');
			$new_id = $this->Common->update_data('video', 'id', $id, $data);

			redirect("Admin/video/$new_id?sk=1", "location");
		}
	}

	public function video_delete()
	{
		$upload_path = 'assets/uploads/videos/';
		$where_data_edit['id'] = $this->input->post('id');
		$video_data = $this->Common->get_data_multi_conditional('video', $where_data_edit)->row();
		if (file_exists($upload_path . $video_data->title)) {
			unlink($upload_path . $video_data->title);
		}
		$id = $this->input->post('id');
		$this->Common->delete_data('video', 'id', $id);
		redirect("Admin/video", "location");
	}
	public function media()
	{
		$data = $this->engine->store_nav('homepage', 'media', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');
		$data['medias'] = $this->Common->get_data('media')->result();
		// x_debug($data['medias']);
		$path = 'admin/media/media';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}

	public function media_edit()
	{
		$data = $this->engine->store_nav('homepage', 'media', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');

		$id = $this->input->post('id');
		$where_data['id'] = $id;
		$data['media'] = $this->Common->get_data_multi_conditional('media', $where_data)->row();

		$path = 'admin/media/media_edit';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}

	public function media_update()
	{

		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('title', 'title', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('success', 'Please insert valid information!');
			redirect("Admin/media", "location");
		} else {
			$data = array(
				//'login_id' => $this->lib->randomPin(8),
				'title' => $this->input->post("title", true),
				'youtube' => $this->input->post("youtube", true),
				'twitter' => $this->input->post("twitter", true),
				'linkend' => $this->input->post("linkend", true),

			);
			$id = $this->input->post('id');
			$new_id = $this->Common->update_data('media', 'id', $id, $data);

			redirect("Admin/media/$new_id?sk=1", "location");
		}
	}
	public function logo()
	{
		$data = $this->engine->store_nav('homepage', 'logo', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');
		$data['logos'] = $this->Common->get_data('logo')->result();
		// x_debug($data['logos']);
		$path = 'admin/logo/logo';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}

	public function logo_edit()
	{
		$data = $this->engine->store_nav('homepage', 'logo', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');

		$id = $this->input->post('id');
		$where_data['id'] = $id;
		$data['logo'] = $this->Common->get_data_multi_conditional('logo', $where_data)->row();

		$path = 'admin/logo/logo_edit';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}

	public function logo_update()
	{

		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('title', 'title', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('success', 'Please insert valid information!');
			redirect("Admin/logo", "location");
		} else {
			if (!empty($_FILES['filename']['name'])) {
				$file_path_user_image = 'assets/uploads/';
				$preFileName = time();
				$logo_image = $this->do_upload('filename', $preFileName, $file_path_user_image);
				$where_data_edit['id'] = $this->input->post('id');
				$image_data = $this->Common->get_data_multi_conditional('logo', $where_data_edit)->row();
				if (file_exists($file_path_user_image . $image_data->image)) {
					unlink($file_path_user_image . $image_data->image);
				}
			} else {
				$logo_image = $this->input->post('logo_img');
			}
			$data = array(
				'title' => $this->input->post("title", true),
				'image' => $logo_image,

			);
			$id = $this->input->post('id');
			$new_id = $this->Common->update_data('logo', 'id', $id, $data);

			redirect("Admin/logo/$new_id?sk=1", "location");
		}
	}

	public function weblogo()
	{
		$data = $this->engine->store_nav('site', 'weblogo', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');

		$path = 'admin/weblogo/weblogo';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}

	public function weblogo_update()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('brandname', 'brandname', 'trim|required');
		// $this->form_validation->set_rules('tagline', 'tagline', 'trim|required');
		$this->form_validation->set_rules('website', 'website', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('header');
			$this->load->view('weblogo');
			$this->load->view('footer');
		} else {
			$brandname = $this->input->post("brandname", true);
			// $tagline = $this->input->post("tagline", true);
			$website = $this->input->post("website", true);
			//$photo = $this->photo_uploader('');
			$school_code = $this->input->post("school_code", true);

			$this->db->query("UPDATE weblogo SET value='$brandname' WHERE title='brandname'");
			// $this->db->query("UPDATE weblogo SET value='$tagline' WHERE title='tagline'");
			$this->db->query("UPDATE weblogo SET value='$website' WHERE title='website'");
			//$this->db->query("UPDATE weblogo SET value='$photo' WHERE title='logo'");
			$this->db->query("UPDATE weblogo SET value='$school_code' WHERE title='school_code'");

			redirect("Admin/weblogo/?sk=3", "location");
		}
	}
	public function slider()
	{
		$data = $this->engine->store_nav('site', 'slider', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');
		$sliders = $this->Common->get_data_desc('slider', 'id');
		$links = array('next' => 'Next', 'prev' => 'Previous', 'first' => 'First', 'last' => 'Last');
		$this->pagination_bootstrap->set_links($links);

		$this->pagination_bootstrap->offset(10);
		$url = "Admin/slider";
		$data['sliders'] = $this->pagination_bootstrap->config($url, $sliders);

		$path = 'admin/slider/slider';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function slider_create()
	{
		$data = $this->engine->store_nav('site', 'slider', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');

		$path = 'admin/slider/slider_create';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function slider_store()
	{

		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('title_en', 'title_en', 'trim|required');
		$this->form_validation->set_rules('title_bn', 'title_bn', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('success', 'Please insert valid information!');
			redirect("Admin/slider_create", "location");
		} else {

			$file_path_user_image = 'assets/uploads/slider_img/';
			$preFileName = time();
			$slider_image = $this->do_upload('filename', $preFileName, $file_path_user_image);

			$data = array(
				'title_en' => $this->input->post("title_en", true),
				'title_bn' => $this->input->post("title_bn", true),
				'photo' => $slider_image,
				'status' => 1,

			);
			$new_id = $this->Common->set_data('slider', $data);

			redirect("Admin/slider/$new_id?sk=1", "location");
		}
	}

	public function slider_edit()
	{
		$data = $this->engine->store_nav('site', 'slider', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');

		$id = $this->input->post('id');
		$where_data['id'] = $id;
		$data['slider'] = $this->Common->get_data_multi_conditional('slider', $where_data)->row();

		$path = 'admin/slider/slider_edit';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}

	public function slider_update()
	{

		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('title_en', 'title_en', 'trim|required');
		$this->form_validation->set_rules('title_bn', 'title_bn', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('success', 'Please insert valid information!');
			redirect("Admin/slider", "location");
		} else {
			if (!empty($_FILES['filename']['name'])) {
				$file_path_user_image = 'assets/uploads/slider_img/';
				$preFileName = time();
				$slider_image = $this->do_upload('filename', $preFileName, $file_path_user_image);
				$where_data_edit['id'] = $this->input->post('id');
				$image_data = $this->Common->get_data_multi_conditional('slider', $where_data_edit)->row();
				if (file_exists($file_path_user_image . $image_data->photo)) {
					unlink($file_path_user_image . $image_data->photo);
				}
			} else {
				$slider_image = $this->input->post('slider_img');
			}

			$data = array(
				'title_en' => $this->input->post("title_en", true),
				'title_bn' => $this->input->post("title_bn", true),
				'photo' => $slider_image,
				'status' => 1,

			);
			$id = $this->input->post('id');
			$new_id = $this->Common->update_data('slider', 'id', $id, $data);

			redirect("Admin/slider/$new_id?sk=1", "location");
		}
	}
	public function slider_detete()
	{
		$id = $this->input->post('id');
		$file_path_user_image = 'assets/uploads/slider_img/';
		$where_data_edit['id'] = $id;
		$image_data = $this->Common->get_data_multi_conditional('slider', $where_data_edit)->row();
		if (file_exists($file_path_user_image . $image_data->photo)) {
			unlink($file_path_user_image . $image_data->photo);
		}
		$this->Common->delete_data('slider', 'id', $id);
		redirect("Admin/slider", "location");
	}
	public function webpages()
	{
		$data = $this->engine->store_nav('site', 'webpages', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');
		$webpagess = $this->Common->get_data('website');
		$links = array('next' => 'Next', 'prev' => 'Previous', 'first' => 'First', 'last' => 'Last');
		$this->pagination_bootstrap->set_links($links);

		$this->pagination_bootstrap->offset(10);
		$url = "Admin/webpages";
		$data['webpagess'] = $this->pagination_bootstrap->config($url, $webpagess);

		$path = 'admin/pages/webpages';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function webpages_create()
	{
		$data = $this->engine->store_nav('site', 'webpages', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');

		$path = 'admin/pages/webpages_create';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function webpages_store()
	{

		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('title', 'title', 'trim|required');
		//$this->form_validation->set_rules('uri', 'uri', 'trim|required');
		//$this->form_validation->set_rules('type', 'type', 'trim|required');
		$this->form_validation->set_rules('pageditor', 'pageditor', 'trim|required');
		$this->form_validation->set_rules('keyword', 'keyword', 'trim|required');
		$this->form_validation->set_rules('metadesc', 'metadesc', 'trim|required');

		if ($this->form_validation->run() == false) {

			$this->session->set_flashdata('success', 'Please insert valid information!');
			redirect("Admin/webpages_create", "location");
		} else {
			$data = array(
				'title' => $this->input->post("title", true),
				'uri' => rand('10000', '99999'),
				'type' => 'custom',
				'parent' => $this->input->post("parent", true),
				'content' => $this->input->post("pageditor"),
				'keyword' => $this->input->post("keyword", true),
				'metadesc' => $this->input->post("metadesc", true),
			);
			$new_id = $this->Common->set_data('website', $data);

			redirect("Admin/webpages/$new_id?sk=1", "location");
		}
	}

	public function webpages_edit()
	{
		$data = $this->engine->store_nav('site', 'webpages', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');

		$id = $this->input->post('id');
		$where_data['id'] = $id;
		$data['webpages'] = $this->Common->get_data_multi_conditional('website', $where_data)->row();

		$path = 'admin/pages/webpages_edit';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}

	public function webpages_update()
	{

		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('title', 'title', 'trim|required');
		//$this->form_validation->set_rules('uri', 'uri', 'trim|required');
		//$this->form_validation->set_rules('type', 'type', 'trim|required');
		$this->form_validation->set_rules('pageditor', 'pageditor', 'trim|required');
		$this->form_validation->set_rules('keyword', 'keyword', 'trim|required');
		$this->form_validation->set_rules('metadesc', 'metadesc', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('success', 'Please insert valid information!');
			redirect("Admin/webpages", "location");
		} else {
			$data = array(
				'title' => $this->input->post("title", true),
				'uri' => $this->input->post("uri", true),
				'type' => 'custom',
				'parent' => $this->input->post("parent", true),
				'content' => $this->input->post("pageditor"),
				'keyword' => $this->input->post("keyword", true),
				'metadesc' => $this->input->post("metadesc", true),
			);
			$id = $this->input->post('id');
			$new_id = $this->Common->update_data('website', 'id', $id, $data);

			redirect("Admin/webpages/$new_id?sk=1", "location");
		}
	}
	public function webpages_detete()
	{
		$id = $this->input->post('id');
		$this->Common->delete_data('website', 'id', $id);
		redirect("Admin/webpages", "location");
	}

	public function notice_board()
	{
		$data = $this->engine->store_nav('site', 'notice_board', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');
		$notice_boards = $this->Common->get_data_desc('notice_board', 'id');
		$links = array('next' => 'Next', 'prev' => 'Previous', 'first' => 'First', 'last' => 'Last');
		$this->pagination_bootstrap->set_links($links);

		$this->pagination_bootstrap->offset(10);
		$url = "Admin/notice_board";
		$data['notice_boards'] = $this->pagination_bootstrap->config($url, $notice_boards);

		$path = 'admin/notice_board/notice_board';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function notice_board_create()
	{
		$data = $this->engine->store_nav('site', 'notice_board', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');

		$path = 'admin/notice_board/notice_board_create';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function notice_board_store()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('title', 'title', 'trim|required');
		$this->form_validation->set_rules('pageditor', 'pageditor', 'trim|required');
		$this->form_validation->set_rules('filename', 'filename', '');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('success', 'Please insert valid information!');
			redirect("Admin/notice_board_create", "location");
		} else {
			/*-------- FILE UPLOAD ----------*/
			$config['upload_path'] = 'assets/uploads/notice/';
			$config['allowed_types'] = 'pdf|jpg|jpeg|png';
			// $config['max_size']    = '2000';
			if (!empty($_FILES['filename']['name'])) {
				$filename = time() . '_filename';
				$config['file_name'] = $filename;

				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('filename')) {
					$error = array('error' => $this->upload->display_errors());
					var_dump($error);

					redirect(current_url());
				} else {
					$upload_data = $this->upload->data();
					$fileName = $upload_data['file_name'];
				}
			} else {
				$fileName = '';
			}
			/*-------- FILE UPLOAD ----------*/
			$date = $this->input->post('publish_date');
			if (!empty($date)) {
				$publish_date = $date;
			} else {
				$publish_date = current_date();
			}
			$data = array(
				'title' => $this->input->post("title", true),
				'description' => $this->input->post("pageditor"),
				'filename' => $fileName,
				'status' => 1,
				'publish_date' => $publish_date,
			);

			$new_id = $this->Common->set_data('notice_board', $data);

			redirect("Admin/notice_board/$new_id?sk=1", "location");
		}
	}

	public function notice_board_edit()
	{
		$data = $this->engine->store_nav('site', 'notice_board', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');

		$id = $this->input->post('id');
		$where_data['id'] = $id;
		$data['notice_board'] = $this->Common->get_data_multi_conditional('notice_board', $where_data)->row();

		$path = 'admin/notice_board/notice_board_edit';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}

	public function notice_board_update()
	{

		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('title', 'title', 'trim|required');
		$this->form_validation->set_rules('pageditor', 'pageditor', 'trim|required');
		$old_file = $this->input->post("old_file", true);
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('success', 'Please insert valid information!');
			redirect("Admin/notice_board", "location");
		} else {
			/*-------- FILE UPLOAD ----------*/
			if (!empty($_FILES['filename']['name'])) {
				$file_path_user_image = 'assets/uploads/notice/';
				$config['upload_path'] = $file_path_user_image;
				$config['allowed_types'] = 'pdf|jpg|jpeg|png';
				// $config['max_size']    = '2000';
				$filename = time() . '_filename';
				$config['file_name'] = $filename;

				$this->load->library('upload', $config);
				// $this->upload->do_upload("filename");
				if (!$this->upload->do_upload('filename')) {
					$error = array('error' => $this->upload->display_errors());
					var_dump($error);
				} else {
					$upload_data = $this->upload->data();
					$fileName = $upload_data['file_name'];
				}

				$where_data_edit['id'] = $this->input->post('id');
				$image_data = $this->Common->get_data_multi_conditional('notice_board', $where_data_edit)->row();
				// x_debug($file_path_user_image.$image_data->filename);
				if (file_exists($file_path_user_image . $image_data->filename)) {
					unlink($file_path_user_image . $image_data->filename);
				}
			} else {
				$fileName = $old_file;
			}
			/*-------- FILE UPLOAD ----------*/
			$date = $this->input->post('publish_date');
			if (!empty($date)) {
				$publish_date = $date;
			} else {
				$publish_date = current_date();
			}
			$data = array(
				'title' => $this->input->post("title", true),
				'description' => $this->input->post("pageditor"),
				'filename' => $fileName,
				'status' => 1,
				'publish_date' => $publish_date,
			);

			$id = $this->input->post('id');
			$new_id = $this->Common->update_data('notice_board', 'id', $id, $data);

			redirect("Admin/notice_board/$new_id?sk=1", "location");
		}
	}
	public function notice_board_detete()
	{
		$id = $this->input->post('id');
		$where_data_edit['id'] = $id;
		$image_data = $this->Common->get_data_multi_conditional('notice_board', $where_data_edit)->row();
		$file_path_user_image = 'assets/uploads/notice/';
		// x_debug($file_path_user_image.$image_data->filename);
		if (!empty($image_data->filename)) {
			if (file_exists($file_path_user_image . $image_data->filename)) {
				unlink($file_path_user_image . $image_data->filename);
			}
		}
		$this->Common->delete_data('notice_board', 'id', $id);
		redirect("Admin/notice_board", "location");
	}

	public function notice_inactive_active()
	{

		$id = $this->input->post('id');

		$updateData = array(
			'status' => $this->input->post('status'),
		);
		$this->Common->update_data('notice_board', 'id', $id, $updateData);

		$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h5><i class="icon fas fa-check"></i> Alert!</h5>
		Success. Data has been submitted successfully.
	  	</div>');

		redirect('Admin/notice_board');
	}
	public function gallery()
	{
		$data = $this->engine->store_nav('site', 'gallery', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');
		$data['gallerys'] = $this->Common->get_data('gallery_album')->result();

		$path = 'admin/gallery/gallery';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function album_create()
	{
		$data = $this->engine->store_nav('site', 'gallery', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');

		$path = 'admin/gallery/album_create';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}

	public function album_store()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('gallery_album_title', 'gallery_album_title', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('success', 'Please insert valid information!');
			redirect("Admin/gallery_create", "location");
		} else {

			$file_path_user_image = 'assets/uploads/gallery/';
			$preFileName = time();
			$album_image = $this->do_upload('filename', $preFileName, $file_path_user_image);

			$data = array(
				'gallery_album_title' => $this->input->post("gallery_album_title", true),
				'gallery_album_photo' => $album_image,
			);

			$new_id = $this->Common->set_data('gallery_album', $data);

			redirect("Admin/gallery/$new_id?sk=1", "location");
		}
	}
	public function album_edit($id)
	{
		$data = $this->engine->store_nav('site', 'gallery', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');

		$where_data['gallery_album_id'] = $id;
		$data['result'] = $this->Common->get_data_multi_conditional('gallery_album', $where_data)->row();
		$path = 'admin/gallery/album_edit';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function album_update()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('gallery_album_title', 'gallery_album_title', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('success', 'Please insert valid information!');
			redirect("Admin/gallery", "location");
		} else {

			if (!empty($_FILES['filename']['name'])) {
				$file_path_user_image = 'assets/uploads/gallery/';
				$preFileName = time();
				$album_image = $this->do_upload('filename', $preFileName, $file_path_user_image);

				$where_data_edit['gallery_album_id'] = $this->input->post('album_id');
				$image_data = $this->Common->get_data_multi_conditional('gallery_album', $where_data_edit)->row();
				if (file_exists($file_path_user_image . $image_data->gallery_album_photo)) {
					unlink($file_path_user_image . $image_data->gallery_album_photo);
				}
			} else {
				$album_image = $this->input->post("g_album_photo", true);
			}
			$data = array(
				'gallery_album_title' => $this->input->post("gallery_album_title", true),
				'gallery_album_photo' => $album_image,
			);
			$id = $this->input->post('album_id');
			$new_id = $this->Common->update_data('gallery_album', 'gallery_album_id', $id, $data);

			redirect("Admin/gallery/$new_id?sk=1", "location");
		}
	}

	public function album_delete($id)
	{
		$id = $id;

		$where_data_edit['gallery_album_id'] = $id;
		$file_path_user_image = 'assets/uploads/gallery/';
		$image_data = $this->Common->get_data_multi_conditional('gallery_album', $where_data_edit)->row();
		if (file_exists($file_path_user_image . $image_data->gallery_album_photo)) {
			unlink($file_path_user_image . $image_data->gallery_album_photo);
		}
		$this->Common->delete_data('gallery_album', 'gallery_album_id', $id);
		$where_data['gallery_album_id'] = $id;
		$gallery_photo = $this->Common->get_data_multi_conditional('gallery_photo', $where_data)->result();

		if (!empty($gallery_photo)) {
			$this->Common->delete_data('gallery_photo', 'gallery_album_id', $id);
			foreach ($gallery_photo as $g_photo) {
				if (file_exists($file_path_user_image . $g_photo->photo)) {
					unlink($file_path_user_image . $g_photo->photo);
				}
			}
		}
		redirect("Admin/gallery", "location");
	}
	public function gallery_create()
	{
		$data = $this->engine->store_nav('site', 'gallery', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');

		$path = 'admin/gallery/gallery_create';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function gallery_store()
	{

		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('gallery_album_id', 'gallery_album_id', 'trim|required');
		$this->form_validation->set_rules('title', 'title', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('success', 'Please insert valid information!');
			redirect("Admin/gallery_create", "location");
		} else {
			$total_img = count($_FILES['filename']['name']);
			$asd_datas = array();
			$i = 0;
			for ($i = 0; $i < $total_img; $i++) {

				$_FILES['file']['name'] = $_FILES['filename']['name'][$i];
				$_FILES['file']['type'] = $_FILES['filename']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['filename']['tmp_name'][$i];
				$_FILES['file']['error'] = $_FILES['filename']['error'][$i];
				$_FILES['file']['size'] = $_FILES['filename']['size'][$i];


				$file_path_user_image = 'assets/uploads/gallery/';
				$preFileName = time();
				$gallery_image = $this->do_upload('file', $preFileName, $file_path_user_image);

				$asd_data = array(
					'gallery_album_id' => $this->input->post("gallery_album_id", true),
					'title' => $this->input->post("title", true),
					'photo' => $gallery_image,
					'status' => 1,
				);
				$asd_datas[] = $asd_data;
			}
			$this->Common->set_data_batch('gallery_photo', $asd_datas);

			// $file_path_user_image = 'assets/uploads/gallery/';
			// $preFileName = time();
			// $gallery_image = $this->do_upload('filename', $preFileName, $file_path_user_image);
			// $data = array(
			// 	'gallery_album_id' => $this->input->post("gallery_album_id", true),
			// 	'title' => $this->input->post("title", true),
			// 	'photo' => $gallery_image,
			// );
			// $new_id = $this->Common->set_data('gallery_photo', $data);
			$album_id = $this->input->post("gallery_album_id");
			redirect("Admin/gallery_photo/$album_id", "location");
		}
	}

	public function gallery_photo($gallery_album_id)
	{
		$data = $this->engine->store_nav('site', 'gallery', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');

		$where_data['gallery_album_id'] = $gallery_album_id;
		// $where_data['status'] = 1;
		$data['result'] = $this->Common->get_data_multi_conditional('gallery_photo', $where_data)->result();

		$path = 'admin/gallery/gallery_photo';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function gallery_edit()
	{
		$data = $this->engine->store_nav('site', 'gallery', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');
		$id = $this->input->post('photo_id');
		$where_data['id'] = $id;
		$data['gallery'] = $this->Common->get_data_multi_conditional('gallery_photo', $where_data)->row();

		$path = 'admin/gallery/gallery_edit';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}

	public function gallery_update()
	{

		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('gallery_album_id', 'gallery_album_id', 'trim|required');
		$this->form_validation->set_rules('title', 'title', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('success', 'Please insert valid information!');
			redirect("Admin/gallery", "location");
		} else {
			if (!empty($_FILES['filename']['name'])) {
				$file_path_user_image = 'assets/uploads/gallery/';
				$preFileName = time();
				$gallery_image = $this->do_upload('filename', $preFileName, $file_path_user_image);

				$where_data_edit['id'] = $this->input->post('id');
				$image_data = $this->Common->get_data_multi_conditional('gallery_photo', $where_data_edit)->row();
				if (file_exists($file_path_user_image . $image_data->photo)) {
					unlink($file_path_user_image . $image_data->photo);
				}
			} else {
				$gallery_image = $this->input->post("gallery_image", true);
			}
			$data = array(
				'gallery_album_id' => $this->input->post("gallery_album_id", true),
				'title' => $this->input->post("title", true),
				'photo' => $gallery_image,
				'status' => 1,
			);
			$id = $this->input->post('id');
			$album_id = $this->input->post('album_id');
			$new_id = $this->Common->update_data('gallery_photo', 'id', $id, $data);

			redirect("Admin/gallery_photo/$album_id", "location");
		}
	}
	public function gallery_delete()
	{
		$id = $this->input->post('photo_id');
		$file_path_user_image = 'assets/uploads/gallery/';
		$where_data_edit['id'] = $id;
		$image_data = $this->Common->get_data_multi_conditional('gallery_photo', $where_data_edit)->row();
		if (file_exists($file_path_user_image . $image_data->photo)) {
			unlink($file_path_user_image . $image_data->photo);
		}
		$this->Common->delete_data('gallery_photo', 'id', $id);
		$album_id = $this->input->post('album_id');
		redirect("Admin/gallery_photo/$album_id", "location");
	}

	public function breaking_news()
	{
		$data = $this->engine->store_nav('site', 'breaking_news', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');
		$data['breaking_newss'] = $this->Common->get_data_desc('tbl_breking_news', 'id')->result();
		$path = 'admin/breaking_news/breaking_news';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function breaking_news_create()
	{
		$data = $this->engine->store_nav('site', 'breaking_news', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');

		$path = 'admin/breaking_news/breaking_news_create';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function breaking_news_store()
	{

		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('news', 'news', 'trim|required');

		if ($this->form_validation->run() == false) {

			$this->session->set_flashdata('success', 'Please insert valid information!');
			redirect("Admin/breaking_news_create", "location");
		} else {
			$data = array(
				'news' => $this->input->post("news", true),
				'description' => $this->input->post("pageditor"),
				'status' => 1,
			);
			$new_id = $this->Common->set_data('tbl_breking_news', $data);

			redirect("Admin/breaking_news/$new_id?sk=1", "location");
		}
	}

	public function breaking_news_edit()
	{
		$data = $this->engine->store_nav('site', 'breaking_news', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');

		$id = $this->input->post('id');
		$where_data['id'] = $id;
		$data['breaking_news'] = $this->Common->get_data_multi_conditional('tbl_breking_news', $where_data)->row();

		$path = 'admin/breaking_news/breaking_news_edit';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}

	public function breaking_news_update()
	{

		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('news', 'news', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('success', 'Please insert valid information!');
			redirect("Admin/breaking_news", "location");
		} else {
			$data = array(
				'news' => $this->input->post("news", true),
				'description' => $this->input->post("pageditor"),
				'status' => 1,
			);
			$id = $this->input->post('id');
			$new_id = $this->Common->update_data('tbl_breking_news', 'id', $id, $data);

			redirect("Admin/breaking_news/$new_id?sk=1", "location");
		}
	}
	public function breaking_news_detete()
	{
		$id = $this->input->post('id');
		$this->Common->delete_data('tbl_breking_news', 'id', $id);
		redirect("Admin/breaking_news", "location");
	}

	public function breaking_inactive_active()
	{

		$id = $this->input->post('id');

		$updateData = array(
			'status' => $this->input->post('status'),
		);
		$recr_id = $this->Common->update_data('tbl_breking_news', 'id', $id, $updateData);

		$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h5><i class="icon fas fa-check"></i> Alert!</h5>
		Success. Data has been submitted successfully.
	  	</div>');

		redirect('Admin/breaking_news');
	}
	public function page1()
	{
		$data = $this->engine->store_nav('manage_page', 'page1', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');

		$data['page1'] = $this->Common->get_data('page1')->result();

		$path = 'admin/page1/page1';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function page1_create()
	{
		$data = $this->engine->store_nav('manage_page', 'page1', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');

		$path = 'admin/page1/page1_create';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function page1_store()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('success', 'Please insert valid information!');
			redirect("Admin/page1_create", "location");
		} else {
			$data = array(
				'title' => $this->input->post("name", true),
				'url' => $this->input->post("url", true),
			);
			$new_id = $this->Common->set_data('page1', $data);
			redirect("Admin/page1/$new_id?sk=1", "location");
		}
	}
	public function page1_edit()
	{
		$data = $this->engine->store_nav('manage_page', 'page1', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');
		$where_data['id'] = $this->input->post('id');
		$data['page1'] = $this->Common->get_data_multi_conditional('page1', $where_data)->row();
		$path = 'admin/page1/page1_edit';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function page1_update()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('success', 'Please insert valid information!');
			redirect("Admin/page1_create", "location");
		} else {
			$data = array(
				'title' => $this->input->post("name", true),
				'url' => $this->input->post("url", true),
			);
			$id = $this->input->post('id');
			$new_id = $this->Common->update_data('page1', 'id', $id, $data);

			redirect("Admin/page1/$new_id?sk=1", "location");
		}
	}

	public function page1_delete()
	{
		$id = $this->input->post('id');
		$this->Common->delete_data('page1', 'id', $id);
		redirect("Admin/page1", "location");
	}

	public function page2()
	{
		$data = $this->engine->store_nav('manage_page', 'page2', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');

		$data['page2'] = $this->Common->get_data('page2')->result();

		$path = 'admin/page2/page2';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function page2_create()
	{
		$data = $this->engine->store_nav('manage_page', 'page2', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');

		$path = 'admin/page2/page2_create';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function page2_store()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('success', 'Please insert valid information!');
			redirect("Admin/page2_create", "location");
		} else {
			$data = array(
				'title' => $this->input->post("name", true),
				'url' => $this->input->post("url", true),
			);
			$new_id = $this->Common->set_data('page2', $data);
			redirect("Admin/page2/$new_id?sk=2", "location");
		}
	}
	public function page2_edit()
	{
		$data = $this->engine->store_nav('manage_page', 'page2', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');
		$where_data['id'] = $this->input->post('id');
		$data['page2'] = $this->Common->get_data_multi_conditional('page2', $where_data)->row();
		$path = 'admin/page2/page2_edit';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function page2_update()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('success', 'Please insert valid information!');
			redirect("Admin/page2_create", "location");
		} else {
			$data = array(
				'title' => $this->input->post("name", true),
				'url' => $this->input->post("url", true),
			);
			$id = $this->input->post('id');
			$new_id = $this->Common->update_data('page2', 'id', $id, $data);

			redirect("Admin/page2/$new_id?sk=2", "location");
		}
	}

	public function page2_delete()
	{
		$id = $this->input->post('id');
		$this->Common->delete_data('page2', 'id', $id);
		redirect("Admin/page2", "location");
	}

	public function page3()
	{
		$data = $this->engine->store_nav('manage_page', 'page3', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');

		$data['page3'] = $this->Common->get_data('page3')->result();

		$path = 'admin/page3/page3';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function page3_create()
	{
		$data = $this->engine->store_nav('manage_page', 'page3', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');

		$path = 'admin/page3/page3_create';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function page3_store()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('success', 'Please insert valid information!');
			redirect("Admin/page3_create", "location");
		} else {
			$data = array(
				'title' => $this->input->post("name", true),
				'url' => $this->input->post("url", true),
			);
			$new_id = $this->Common->set_data('page3', $data);
			redirect("Admin/page3/$new_id?sk=3", "location");
		}
	}
	public function page3_edit()
	{
		$data = $this->engine->store_nav('manage_page', 'page3', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');
		$where_data['id'] = $this->input->post('id');
		$data['page3'] = $this->Common->get_data_multi_conditional('page3', $where_data)->row();
		$path = 'admin/page3/page3_edit';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function page3_update()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('success', 'Please insert valid information!');
			redirect("Admin/page3_create", "location");
		} else {
			$data = array(
				'title' => $this->input->post("name", true),
				'url' => $this->input->post("url", true),
			);
			$id = $this->input->post('id');
			$new_id = $this->Common->update_data('page3', 'id', $id, $data);

			redirect("Admin/page3/$new_id?sk=3", "location");
		}
	}

	public function page3_delete()
	{
		$id = $this->input->post('id');
		$this->Common->delete_data('page3', 'id', $id);
		redirect("Admin/page3", "location");
	}
	public function page4()
	{
		$data = $this->engine->store_nav('manage_page', 'page4', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');

		$data['page4'] = $this->Common->get_data('page4')->result();

		$path = 'admin/page4/page4';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function page4_create()
	{
		$data = $this->engine->store_nav('manage_page', 'page4', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');

		$path = 'admin/page4/page4_create';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function page4_store()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('success', 'Please insert valid information!');
			redirect("Admin/page4_create", "location");
		} else {
			$data = array(
				'title' => $this->input->post("name", true),
				'url' => $this->input->post("url", true),
			);
			$new_id = $this->Common->set_data('page4', $data);
			redirect("Admin/page4/$new_id?sk=4", "location");
		}
	}
	public function page4_edit()
	{
		$data = $this->engine->store_nav('manage_page', 'page4', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');
		$where_data['id'] = $this->input->post('id');
		$data['page4'] = $this->Common->get_data_multi_conditional('page4', $where_data)->row();
		$path = 'admin/page4/page4_edit';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function page4_update()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('success', 'Please insert valid information!');
			redirect("Admin/page4_create", "location");
		} else {
			$data = array(
				'title' => $this->input->post("name", true),
				'url' => $this->input->post("url", true),
			);
			$id = $this->input->post('id');
			$new_id = $this->Common->update_data('page4', 'id', $id, $data);

			redirect("Admin/page4/$new_id?sk=4", "location");
		}
	}

	public function page4_delete()
	{
		$id = $this->input->post('id');
		$this->Common->delete_data('page4', 'id', $id);
		redirect("Admin/page4", "location");
	}

	public function page5()
	{
		$data = $this->engine->store_nav('manage_page', 'page5', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');

		$data['page5'] = $this->Common->get_data('page5')->result();

		$path = 'admin/page5/page5';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function page5_create()
	{
		$data = $this->engine->store_nav('manage_page', 'page5', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');

		$path = 'admin/page5/page5_create';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function page5_store()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('success', 'Please insert valid information!');
			redirect("Admin/page5_create", "location");
		} else {
			$data = array(
				'title' => $this->input->post("name", true),
				'url' => $this->input->post("url", true),
			);
			$new_id = $this->Common->set_data('page5', $data);
			redirect("Admin/page5/$new_id?sk=5", "location");
		}
	}
	public function page5_edit()
	{
		$data = $this->engine->store_nav('manage_page', 'page5', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');
		$where_data['id'] = $this->input->post('id');
		$data['page5'] = $this->Common->get_data_multi_conditional('page5', $where_data)->row();
		$path = 'admin/page5/page5_edit';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function page5_update()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('success', 'Please insert valid information!');
			redirect("Admin/page5_create", "location");
		} else {
			$data = array(
				'title' => $this->input->post("name", true),
				'url' => $this->input->post("url", true),
			);
			$id = $this->input->post('id');
			$new_id = $this->Common->update_data('page5', 'id', $id, $data);

			redirect("Admin/page5/$new_id?sk=5", "location");
		}
	}

	public function page5_delete()
	{
		$id = $this->input->post('id');
		$this->Common->delete_data('page5', 'id', $id);
		redirect("Admin/page5", "location");
	}
	public function page6()
	{
		$data = $this->engine->store_nav('manage_page', 'page6', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');

		$data['page6'] = $this->Common->get_data('page6')->result();

		$path = 'admin/page6/page6';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function page6_create()
	{
		$data = $this->engine->store_nav('manage_page', 'page6', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');

		$path = 'admin/page6/page6_create';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function page6_store()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('success', 'Please insert valid information!');
			redirect("Admin/page6_create", "location");
		} else {
			$data = array(
				'title' => $this->input->post("name", true),
				'url' => $this->input->post("url", true),
			);
			$new_id = $this->Common->set_data('page6', $data);
			redirect("Admin/page6/$new_id?sk=6", "location");
		}
	}
	public function page6_edit()
	{
		$data = $this->engine->store_nav('manage_page', 'page6', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');
		$where_data['id'] = $this->input->post('id');
		$data['page6'] = $this->Common->get_data_multi_conditional('page6', $where_data)->row();
		$path = 'admin/page6/page6_edit';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function page6_update()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('success', 'Please insert valid information!');
			redirect("Admin/page6_create", "location");
		} else {
			$data = array(
				'title' => $this->input->post("name", true),
				'url' => $this->input->post("url", true),
			);
			$id = $this->input->post('id');
			$new_id = $this->Common->update_data('page6', 'id', $id, $data);

			redirect("Admin/page6/$new_id?sk=6", "location");
		}
	}

	public function page6_delete()
	{
		$id = $this->input->post('id');
		$this->Common->delete_data('page6', 'id', $id);
		redirect("Admin/page6", "location");
	}

	public function page7()
	{
		$data = $this->engine->store_nav('manage_page', 'page7', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');

		$data['page7'] = $this->Common->get_data('page7')->result();

		$path = 'admin/page7/page7';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function page7_create()
	{
		$data = $this->engine->store_nav('manage_page', 'page7', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');

		$path = 'admin/page7/page7_create';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function page7_store()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('success', 'Please insert valid information!');
			redirect("Admin/page7_create", "location");
		} else {
			$data = array(
				'title' => $this->input->post("name"),
			);
			$new_id = $this->Common->set_data('page7', $data);

			redirect("Admin/page7/$new_id?sk=1", "location");
		}
	}
	public function page7_edit()
	{
		$data = $this->engine->store_nav('manage_page', 'page7', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');
		$where_data['id'] = $this->input->post('id');
		$data['page7'] = $this->Common->get_data_multi_conditional('page7', $where_data)->row();
		$path = 'admin/page7/page7_edit';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function page7_update()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('success', 'Please insert valid information!');
			redirect("Admin/page7_create", "location");
		} else {
			$data = array(
				'title' => $this->input->post("name"),
			);
			$id = $this->input->post('id');
			$new_id = $this->Common->update_data('page7', 'id', $id, $data);

			redirect("Admin/page7/$new_id?sk=1", "location");
		}
	}

	public function page7_delete()
	{
		$id = $this->input->post('id');
		$this->Common->delete_data('page7', 'id', $id);
		redirect("Admin/page7", "location");
	}

	public function general_setting()
	{
		$data = $this->engine->store_nav('setting', 'general_setting', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');

		$path = 'admin/general_setting';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function password_setting()
	{
		$data = $this->engine->store_nav('setting', 'password_setting', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');

		$path = 'admin/password_setting';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}

	public function recruitment_committee_create()
	{
		$data = $this->engine->store_nav('recruitment_committee', 'recruitment_committee_create', 'নিয়োগ কমিটি তৈরি');

		$path = 'admin/recruitment_committee/recruitment_committee_create';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}

	public function recruitment_committee_store()
	{

		$title = $this->input->post('title');

		$details = $this->input->post("details");

		$insertData = array(
			'rc_title' => $title,
			'rc_details' => $details,
			'rc_status' => 1,
			'rc_created_at' => get_current_time(),
			'rc_created_by' => $this->session->userdata('currentActiveId'),
			'rc_updated_at' => get_current_time(),
			'rc_updated_by' => $this->session->userdata('currentActiveId'),
		);
		$rc_id = $this->Common->set_data('recruitment_committee', $insertData);
		if ($rc_id) {
			$name = $this->input->post('name');
			$designation = $this->input->post('designation');
			$mobile = $this->input->post('mobile');
			$data = array();
			$i = 0;
			foreach ($name as $key => $value) {
				$detail = array(
					'rcd_rc_id' => $rc_id,
					'rcd_name' => $name[$i],
					'rcd_designation' => $designation[$i],
					'rcd_mobile' => $mobile[$i],
					'rcd_status' => 1,
					'rcd_created_at' => get_current_time(),
					'rcd_created_by' => $this->session->userdata('currentActiveId'),
					'rcd_updated_at' => get_current_time(),
					'rcd_updated_by' => $this->session->userdata('currentActiveId'),
				);
				$data[] = $detail;
				$i++;
			}
			$this->Common->set_data_batch('recruitment_committee_details', $data);
		}
		$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h5><i class="icon fas fa-check"></i> Alert!</h5>
		Success. Data has been submitted successfully.
	  	</div>');
		redirect('Admin/recruitment_committee_create');
	}

	public function recruitment_committee_list()
	{
		$data = $this->engine->store_nav('recruitment_committee', 'recruitment_committee_list', 'নিয়োগ কমিটি তালিকা ');
		$links = array('next' => 'Next', 'prev' => 'Previous', 'first' => 'First', 'last' => 'Last');
		$this->pagination_bootstrap->set_links($links);

		$where_data['rc_status>='] = 1;
		$where_data['rc_status<='] = 2;
		$rc_list = $this->Common->get_data_multi_conditional('recruitment_committee', $where_data);
		$this->pagination_bootstrap->offset(10);
		$url = "Admin/recruitment_committee_list";
		$data['rc_list'] = $this->pagination_bootstrap->config($url, $rc_list);

		$path = 'admin/recruitment_committee/recruitment_committee_list';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function recruitment_committee_details()
	{
		$data = $this->engine->store_nav('recruitment_committee', 'recruitment_committee_list', 'বিস্তারিত নিয়োগ কমিটি ');
		$where_data['rcd_rc_id'] = $this->input->post('rcd_rc_id');
		$where_data['rcd_status'] = 1;
		$data['rcd_list'] = $this->Common->get_data_multi_conditional('recruitment_committee_details', $where_data)->result();
		$where_data_rc['rc_id'] = $this->input->post('rcd_rc_id');
		$where_data_rc['rc_status'] = 1;
		$data['recruitment_committee'] = $this->Common->get_data_multi_conditional('recruitment_committee', $where_data_rc)->row();

		$path = 'admin/recruitment_committee/recruitment_committee_details';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function recruitment_committee_edit()
	{
		$data = $this->engine->store_nav('recruitment_committee', 'recruitment_committee_list', 'বিস্তারিত নিয়োগ কমিটি ');

		$where_data['rcd_rc_id'] = $this->input->post('rcd_rc_id');
		$where_data['rcd_status'] = 1;
		$data['rcd_list'] = $this->Common->get_data_multi_conditional('recruitment_committee_details', $where_data)->result();

		$where_data_rc['rc_id'] = $this->input->post('rcd_rc_id');
		$where_data_rc['rc_status'] = 1;
		$data['recruitment_committee'] = $this->Common->get_data_multi_conditional('recruitment_committee', $where_data_rc)->row();


		$path = 'admin/recruitment_committee/recruitment_committee_edit';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}

	public function recruitment_committee_update()
	{
		$pre_rcd_id = $this->input->post('rcd_id');

		$delete_arr = array();
		if (!empty($pre_rcd_id)) {
			foreach ($pre_rcd_id as $pkey => $pvalue) {
				$delete_arr[] = array('id' => $pvalue, );
			}
			$this->Common->delete_batch('recruitment_committee_details', 'rcd_id', $delete_arr);
		}
		$rc_id = $this->input->post('rc_id');
		$title = $this->input->post('title');
		$details = $this->input->post("details");

		$updateData = array(
			'rc_title' => $title,
			'rc_details' => $details,
			'rc_updated_at' => get_current_time(),
			'rc_updated_by' => $this->session->userdata('currentActiveId'),
		);
		$this->Common->update_data('recruitment_committee', 'rc_id', $rc_id, $updateData);
		if ($rc_id) {
			$name = $this->input->post('name');
			$designation = $this->input->post('designation');
			$mobile = $this->input->post('mobile');
			$data = array();
			if (!empty($name)) {
				$i = 0;
				foreach ($name as $key => $value) {
					$detail = array(
						'rcd_rc_id' => $rc_id,
						'rcd_name' => $name[$i],
						'rcd_designation' => $designation[$i],
						'rcd_mobile' => $mobile[$i],
						'rcd_status' => 1,
						'rcd_created_at' => get_current_time(),
						'rcd_created_by' => $this->session->userdata('currentActiveId'),
						'rcd_updated_at' => get_current_time(),
						'rcd_updated_by' => $this->session->userdata('currentActiveId'),
					);
					$data[] = $detail;
					$i++;
				}
				$this->Common->set_data_batch('recruitment_committee_details', $data);
			}
		}
		$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h5><i class="icon fas fa-check"></i> Alert!</h5>
		Success. Data has been submitted successfully.
	  	</div>');
		redirect('Admin/recruitment_committee_list');
	}
	public function recruitment_committee_inactive_active()
	{

		$rc_id = $this->input->post('rcd_rc_id');

		$updateData = array(
			'rc_status' => $this->input->post('rc_status'),
			'rc_updated_at' => get_current_time(),
			'rc_updated_by' => $this->session->userdata('currentActiveId'),
		);
		$rc_id = $this->Common->update_data('recruitment_committee', 'rc_id', $rc_id, $updateData);

		$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h5><i class="icon fas fa-check"></i> Alert!</h5>
		Success. Data has been submitted successfully.
	  	</div>');

		redirect('Admin/recruitment_committee_list');
	}
	public function recruitment_committee_delete()
	{

		$rc_id = $this->input->post('rcd_rc_id');

		$rc_id = $this->Common->delete_data('recruitment_committee', 'rc_id', $rc_id);

		$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h5><i class="icon fas fa-check"></i> Alert!</h5>
		Success. Data has been deleted successfully.
	  	</div>');

		redirect('Admin/recruitment_committee_list');
	}

	public function interview_committee_create()
	{
		$data = $this->engine->store_nav('interview_committee', 'interview_committee_create', 'সাক্ষাৎকার কমিটি তৈরি');

		$path = 'admin/interview_committee/interview_committee_create';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}

	public function interview_committee_store()
	{

		$title = $this->input->post('title');

		$details = $this->input->post("details");

		$insertData = array(
			'ic_title' => $title,
			'ic_details' => $details,
			'ic_status' => 1,
			'ic_created_at' => get_current_time(),
			'ic_created_by' => $this->session->userdata('currentActiveId'),
			'ic_updated_at' => get_current_time(),
			'ic_updated_by' => $this->session->userdata('currentActiveId'),
		);
		$ic_id = $this->Common->set_data('interview_committee', $insertData);
		if ($ic_id) {
			$name = $this->input->post('name');
			$designation = $this->input->post('designation');
			$mobile = $this->input->post('mobile');
			$data = array();
			$i = 0;
			foreach ($name as $key => $value) {
				$detail = array(
					'icd_ic_id' => $ic_id,
					'icd_name' => $name[$i],
					'icd_designation' => $designation[$i],
					'icd_mobile' => $mobile[$i],
					'icd_status' => 1,
					'icd_created_at' => get_current_time(),
					'icd_created_by' => $this->session->userdata('currentActiveId'),
					'icd_updated_at' => get_current_time(),
					'icd_updated_by' => $this->session->userdata('currentActiveId'),
				);
				$data[] = $detail;
				$i++;
			}
			$this->Common->set_data_batch('interview_committee_details', $data);
		}
		$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h5><i class="icon fas fa-check"></i> Alert!</h5>
		Success. Data has been submitted successfully.
	  	</div>');
		redirect('Admin/interview_committee_create');
	}

	public function interview_committee_list()
	{
		$data = $this->engine->store_nav('interview_committee', 'interview_committee_list', 'সাক্ষাৎকার কমিটি তালিকা ');
		$where_data['ic_status>='] = 1;
		$where_data['ic_status<='] = 2;
		$ic_list = $this->Common->get_data_multi_conditional('interview_committee', $where_data);

		$links = array('next' => 'Next', 'prev' => 'Previous', 'first' => 'First', 'last' => 'Last');
		$this->pagination_bootstrap->set_links($links);
		$this->pagination_bootstrap->offset(10);
		$url = "Admin/interview_committee_list";
		$data['ic_list'] = $this->pagination_bootstrap->config($url, $ic_list);

		$path = 'admin/interview_committee/interview_committee_list';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function interview_committee_details()
	{
		$data = $this->engine->store_nav('interview_committee', 'interview_committee_list', 'বিস্তারিত সাক্ষাৎকার কমিটি ');
		$where_data['icd_ic_id'] = $this->input->post('icd_ic_id');
		$where_data['icd_status'] = 1;
		$data['icd_list'] = $this->Common->get_data_multi_conditional('interview_committee_details', $where_data)->result();
		$where_data_ic['ic_id'] = $this->input->post('icd_ic_id');
		$where_data_ic['ic_status'] = 1;
		$data['interview_committee'] = $this->Common->get_data_multi_conditional('interview_committee', $where_data_ic)->row();

		$path = 'admin/interview_committee/interview_committee_details';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function interview_committee_edit()
	{
		$data = $this->engine->store_nav('interview_committee', 'interview_committee_list', 'বিস্তারিত সাক্ষাৎকার কমিটি ');

		$where_data['icd_ic_id'] = $this->input->post('icd_ic_id');
		$where_data['icd_status'] = 1;
		$data['icd_list'] = $this->Common->get_data_multi_conditional('interview_committee_details', $where_data)->result();

		$where_data_ic['ic_id'] = $this->input->post('icd_ic_id');
		$where_data_ic['ic_status'] = 1;
		$data['interview_committee'] = $this->Common->get_data_multi_conditional('interview_committee', $where_data_ic)->row();


		$path = 'admin/interview_committee/interview_committee_edit';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}

	public function interview_committee_update()
	{
		$pre_icd_id = $this->input->post('icd_id');

		if (!empty($pre_icd_id)) {
			$delete_arr = array();
			foreach ($pre_icd_id as $pkey => $pvalue) {
				$delete_arr[] = array('id' => $pvalue, );
			}
			$this->Common->delete_batch('interview_committee_details', 'icd_id', $delete_arr);
		}
		$ic_id = $this->input->post('ic_id');
		$title = $this->input->post('title');
		$details = $this->input->post("details");

		$updateData = array(
			'ic_title' => $title,
			'ic_details' => $details,
			'ic_updated_at' => get_current_time(),
			'ic_updated_by' => $this->session->userdata('currentActiveId'),
		);
		$this->Common->update_data('interview_committee', 'ic_id', $ic_id, $updateData);
		if ($ic_id) {
			$name = $this->input->post('name');
			$designation = $this->input->post('designation');
			$mobile = $this->input->post('mobile');
			$data = array();
			$i = 0;
			foreach ($name as $key => $value) {
				$detail = array(
					'icd_ic_id' => $ic_id,
					'icd_name' => $name[$i],
					'icd_designation' => $designation[$i],
					'icd_mobile' => $mobile[$i],
					'icd_status' => 1,
					'icd_created_at' => get_current_time(),
					'icd_created_by' => $this->session->userdata('currentActiveId'),
					'icd_updated_at' => get_current_time(),
					'icd_updated_by' => $this->session->userdata('currentActiveId'),
				);
				$data[] = $detail;
				$i++;
			}
			$this->Common->set_data_batch('interview_committee_details', $data);
		}
		$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h5><i class="icon fas fa-check"></i> Alert!</h5>
		Success. Data has been submitted successfully.
	  	</div>');
		redirect('Admin/interview_committee_list');
	}
	public function interview_committee_inactive_active()
	{

		$ic_id = $this->input->post('icd_ic_id');

		$updateData = array(
			'ic_status' => $this->input->post('ic_status'),
			'ic_updated_at' => get_current_time(),
			'ic_updated_by' => $this->session->userdata('currentActiveId'),
		);
		$ic_id = $this->Common->update_data('interview_committee', 'ic_id', $ic_id, $updateData);

		$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h5><i class="icon fas fa-check"></i> Alert!</h5>
		Success. Data has been submitted successfully.
	  	</div>');

		redirect('Admin/interview_committee_list');
	}

	public function interview_committee_delete()
	{

		$ic_id = $this->input->post('icd_ic_id');

		$ic_id = $this->Common->delete_data('interview_committee', 'ic_id', $ic_id);

		$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h5><i class="icon fas fa-check"></i> Alert!</h5>
		Success. Data has been deleted successfully.
	  	</div>');

		redirect('Admin/interview_committee_list');
	}

	public function recruitment_create()
	{
		$data = $this->engine->store_nav('recruitment', 'recruitment_create', 'নিয়োগ বিজ্ঞপ্তি তৈরি');

		$where_data['d_status'] = 1;
		$data['d_list'] = $this->Common->get_data_multi_conditional('designation', $where_data)->result();
		$where_data_rec['rc_status'] = 1;
		$data['rc_list'] = $this->Common->get_data_multi_conditional('recruitment_committee', $where_data_rec)->result();

		$path = 'admin/recruitment/recruitment_create';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}

	public function recruitment_store()
	{

		$job_title = $this->input->post('job_title');
		$job_location = $this->input->post("job_location");
		$publish_date = $this->input->post("publish_date");
		$last_date = $this->input->post("last_date");
		$designation = $this->input->post("designation");
		$rc_id = $this->input->post("rc_id");
		$job_description = $this->input->post("job_description");

		$insertData = array(
			'rec_job_title' => $job_title,
			'rec_job_location' => $job_location,
			'rec_publish_date' => $publish_date,
			'rec_last_date' => $last_date,
			'rec_designation' => $designation,
			'rec_rc_id' => $rc_id,
			'rec_job_description' => $job_description,
			'rec_status' => 1,
			'rec_created_at' => get_current_time(),
			'rec_created_by' => $this->session->userdata('currentActiveId'),
			'rec_updated_at' => get_current_time(),
			'rec_updated_by' => $this->session->userdata('currentActiveId'),
		);
		$rec_id = $this->Common->set_data('recruitment', $insertData);

		$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h5><i class="icon fas fa-check"></i> Alert!</h5>
		Success. Data has been submitted successfully.
	  	</div>');
		redirect('Admin/recruitment_create');
	}

	public function recruitment_list()
	{
		$data = $this->engine->store_nav('recruitment', 'recruitment_list', 'নিয়োগ বিজ্ঞপ্তি তালিকা ');

		$links = array('next' => 'Next', 'prev' => 'Previous', 'first' => 'First', 'last' => 'Last');
		$this->pagination_bootstrap->set_links($links);

		$where_data['rec_status<='] = 2;
		$where_data['rec_status>='] = 1;
		$rec_list = $this->Common->get_data_multi_conditional('recruitment', $where_data);
		$this->pagination_bootstrap->offset(10);
		$url = "Admin/recruitment_list";
		$data['rec_list'] = $this->pagination_bootstrap->config($url, $rec_list);


		$path = 'admin/recruitment/recruitment_list';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function recruitment_details()
	{
		$data = $this->engine->store_nav('recruitment', 'recruitment_list', 'বিস্তারিত নিয়োগ বিজ্ঞপ্তি ');

		$where_data['rec_id'] = $this->input->post('rec_id');
		$where_data['rec_status'] = 1;
		$data['recruitment'] = $this->Common->get_data_multi_conditional('recruitment', $where_data)->row();

		$path = 'admin/recruitment/recruitment_details';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function recruitment_edit()
	{
		$data = $this->engine->store_nav('recruitment', 'recruitment_list', 'বিস্তারিত নিয়োগ বিজ্ঞপ্তি ');

		$where_data['rec_id'] = $this->input->post('rec_id');
		$where_data['rec_status'] = 1;
		$data['recruitment'] = $this->Common->get_data_multi_conditional('recruitment', $where_data)->row();

		$where_data_des['d_status'] = 1;
		$data['d_list'] = $this->Common->get_data_multi_conditional('designation', $where_data_des)->result();
		$where_data_rec['rc_status'] = 1;
		$data['rc_list'] = $this->Common->get_data_multi_conditional('recruitment_committee', $where_data_rec)->result();
		$path = 'admin/recruitment/recruitment_edit';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}

	public function recruitment_update()
	{
		$rec_id = $this->input->post('rec_id');

		$job_title = $this->input->post('job_title');
		$job_location = $this->input->post("job_location");
		$publish_date = $this->input->post("publish_date");
		$last_date = $this->input->post("last_date");
		$designation = $this->input->post("designation");
		$rc_id = $this->input->post("rc_id");
		$job_description = $this->input->post("job_description");

		$updateData = array(
			'rec_job_title' => $job_title,
			'rec_job_location' => $job_location,
			'rec_publish_date' => $publish_date,
			'rec_last_date' => $last_date,
			'rec_designation' => $designation,
			'rec_job_description' => $job_description,
			'rec_rc_id' => $rc_id,
			'rec_updated_at' => get_current_time(),
			'rec_updated_by' => $this->session->userdata('currentActiveId'),
		);
		$recr_id = $this->Common->update_data('recruitment', 'rec_id', $rec_id, $updateData);

		$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h5><i class="icon fas fa-check"></i> Alert!</h5>
		Success. Data has been Updated successfully.
	  	</div>');
		redirect('Admin/recruitment_list');
	}
	public function recruitment_inactive_active()
	{

		$rec_id = $this->input->post('rec_id');

		$updateData = array(
			'rec_status' => $this->input->post('rec_status'),
			'rec_updated_at' => get_current_time(),
			'rec_updated_by' => $this->session->userdata('currentActiveId'),
		);
		$recr_id = $this->Common->update_data('recruitment', 'rec_id', $rec_id, $updateData);

		$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h5><i class="icon fas fa-check"></i> Alert!</h5>
		Success. Data has been submitted successfully.
	  	</div>');

		redirect('Admin/recruitment_list');
	}

	public function recruitment_delete()
	{

		$rec_id = $this->input->post('rec_id');

		$recr_id = $this->Common->delete_data('recruitment', 'rec_id', $rec_id);

		$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h5><i class="icon fas fa-check"></i> Alert!</h5>
		Success. Data has been deleted successfully.
	  	</div>');

		redirect('Admin/recruitment_list');
	}

	public function designation()
	{
		$data = $this->engine->store_nav('recruitment', 'designation', 'পদবী ');
		$where_data['d_status'] = 1;
		$data['d_list'] = $this->Common->get_data_multi_conditional('designation', $where_data)->result();

		$path = 'admin/recruitment/designation';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function designation_store()
	{

		$designation = $this->input->post('designation');

		$insertData = array(
			'd_name' => $designation,
			'd_status' => 1,
			'd_created_at' => get_current_time(),
			'd_created_by' => $this->session->userdata('currentActiveId'),
			'd_updated_at' => get_current_time(),
			'd_updated_by' => $this->session->userdata('currentActiveId'),
		);

		$d_id = $this->Common->set_data('designation', $insertData);
		$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h5><i class="icon fas fa-check"></i> Alert!</h5>
		Success. Data has been submitted successfully.
	  	</div>');
		redirect('Admin/designation');
	}
	public function designation_delete()
	{
		$d_id = $this->input->post('d_id');
		$this->Common->delete_data('designation', 'd_id', $d_id);

		$this->session->set_flashdata('success', '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h5><i class="icon fas fa-check"></i> Alert!</h5>
		Success. Data has been deleted successfully.
	  	</div>');
		redirect('Admin/designation');
	}

	public function applicant_pending_list()
	{
		$data = $this->engine->store_nav('applicant', 'applicant_pending_list', 'আবেদনকারী তালিকা ');
		$r_candidate_id = $this->input->post('r_candidate_id');
		$r_nid = $this->input->post('r_nid');
		$r_primary_mobile = $this->input->post('r_primary_mobile');
		$r_post = $this->input->post('r_post');
		$r_upazila = $this->input->post('r_upazila');
		$r_district = $this->input->post('r_district');
		$r_division = $this->input->post('r_division');
		if (!empty($r_candidate_id)) {
			$where_data['register.r_candidate_id'] = $r_candidate_id;
		}
		if (!empty($r_nid)) {
			$where_data['register.r_nid'] = $r_nid;
		}
		if (!empty($r_primary_mobile)) {
			$where_data['register.r_primary_mobile'] = $r_primary_mobile;
		}
		if (!empty($r_post)) {
			$where_data['register.r_post'] = $r_post;
		}
		if (!empty($r_upazila)) {
			$where_data['register.r_upazila'] = $r_upazila;
		}
		if (!empty($r_district)) {
			$where_data['register.r_district'] = $r_district;
		}
		if (!empty($r_division)) {
			$where_data['register.r_division'] = $r_division;
		}
		$where_data['applicant.ap_status'] = -1;
		$applicant_list = $this->Common->get_data_applicant_list($where_data);

		$links = array('next' => 'Next', 'prev' => 'Previous', 'first' => 'First', 'last' => 'Last');
		$this->pagination_bootstrap->set_links($links);

		$this->pagination_bootstrap->offset(10);
		$url = "Admin/applicant_pending_list";
		$data['applicant_list'] = $this->pagination_bootstrap->config($url, $applicant_list);

		$path = 'admin/applicant/applicant_pending_list';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function applicant_details()
	{
		$data = $this->engine->store_nav('applicant', 'applicant_list', 'আবেদনকারী তালিকা ');
		$ap_id = $this->input->post('ap_id');
		$ap_status = $this->input->post('ap_status');

		$where_data['applicant.ap_status'] = $ap_status;
		$where_data['applicant.ap_id'] = $ap_id;
		$data['applicant_info'] = $this->Common->get_data_applicant_list($where_data)->row();

		$path = 'admin/applicant/applicant_details';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function applicant_inactive_active()
	{

		$ap_id = $this->input->post('ap_id');

		$updateData = array(
			'ap_status' => $this->input->post('ap_status'),
			'ap_updated_at' => get_current_time(),
			'ap_updated_by' => $this->session->userdata('currentActiveId'),
		);
		$ap_id = $this->Common->update_data('applicant', 'ap_id', $ap_id, $updateData);

		$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h5><i class="icon fas fa-check"></i> Alert!</h5>
		Success. Data has been approved successfully.
	  	</div>');

		redirect('Admin/applicant_pending_list');
	}

	public function applicant_list()
	{
		$data = $this->engine->store_nav('applicant', 'applicant_list', 'আবেদনকারী তালিকা ');
		$r_candidate_id = $this->input->post('r_candidate_id');
		$r_nid = $this->input->post('r_nid');
		$r_primary_mobile = $this->input->post('r_primary_mobile');
		$r_post = $this->input->post('r_post');
		$r_upazila = $this->input->post('r_upazila');
		$r_district = $this->input->post('r_district');
		$r_division = $this->input->post('r_division');
		if (!empty($r_candidate_id)) {
			$where_data['register.r_candidate_id'] = $r_candidate_id;
		}
		if (!empty($r_nid)) {
			$where_data['register.r_nid'] = $r_nid;
		}
		if (!empty($r_primary_mobile)) {
			$where_data['register.r_primary_mobile'] = $r_primary_mobile;
		}
		if (!empty($r_post)) {
			$where_data['register.r_post'] = $r_post;
		}
		if (!empty($r_upazila)) {
			$where_data['register.r_upazila'] = $r_upazila;
		}
		if (!empty($r_district)) {
			$where_data['register.r_district'] = $r_district;
		}
		if (!empty($r_division)) {
			$where_data['register.r_division'] = $r_division;
		}
		$where_data['applicant.ap_status'] = 1;
		$where_data['applicant.ap_interview_complete!='] = 1;
		$applicant_list = $this->Common->get_data_applicant_list($where_data);

		$links = array('next' => 'Next', 'prev' => 'Previous', 'first' => 'First', 'last' => 'Last');
		$this->pagination_bootstrap->set_links($links);
		$this->pagination_bootstrap->offset(10);
		$url = "Admin/applicant_list";
		$data['applicant_list'] = $this->pagination_bootstrap->config($url, $applicant_list);

		$path = 'admin/applicant/applicant_list';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function reject_applicant_list()
	{
		$data = $this->engine->store_nav('applicant', 'reject_applicant_list', 'বাতিলকৃত আবেদনকারী তালিকা ');
		$r_candidate_id = $this->input->post('r_candidate_id');
		$r_nid = $this->input->post('r_nid');
		$r_primary_mobile = $this->input->post('r_primary_mobile');
		$r_post = $this->input->post('r_post');
		$r_upazila = $this->input->post('r_upazila');
		$r_district = $this->input->post('r_district');
		$r_division = $this->input->post('r_division');
		if (!empty($r_candidate_id)) {
			$where_data['register.r_candidate_id'] = $r_candidate_id;
		}
		if (!empty($r_nid)) {
			$where_data['register.r_nid'] = $r_nid;
		}
		if (!empty($r_primary_mobile)) {
			$where_data['register.r_primary_mobile'] = $r_primary_mobile;
		}
		if (!empty($r_post)) {
			$where_data['register.r_post'] = $r_post;
		}
		if (!empty($r_upazila)) {
			$where_data['register.r_upazila'] = $r_upazila;
		}
		if (!empty($r_district)) {
			$where_data['register.r_district'] = $r_district;
		}
		if (!empty($r_division)) {
			$where_data['register.r_division'] = $r_division;
		}
		$where_data['applicant.ap_status'] = 2;
		$applicant_list = $this->Common->get_data_applicant_list($where_data);

		$links = array('next' => 'Next', 'prev' => 'Previous', 'first' => 'First', 'last' => 'Last');
		$this->pagination_bootstrap->set_links($links);

		$this->pagination_bootstrap->offset(10);
		$url = "Admin/reject_applicant_list";
		$data['applicant_list'] = $this->pagination_bootstrap->config($url, $applicant_list);

		$path = 'admin/applicant/reject_applicant_list';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function interview_schedule_create()
	{
		$data = $this->engine->store_nav('interview', 'interview_schedule_create', 'সাক্ষাৎকার সময়সূচী তৈরি');

		$where_data_ic['ic_status'] = 1;
		$data['ic_list'] = $this->Common->get_data_multi_conditional('interview_committee', $where_data_ic)->result();

		$where_data['rec_status'] = 1;
		$data['rec_list'] = $this->Common->get_data_multi_conditional('recruitment', $where_data)->result();
		$path = 'admin/interview/interview_schedule_create';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function interview_store()
	{
		$job_id = $this->input->post('job_id');
		$ic_id = $this->input->post('ic_id');
		$interview_date = $this->input->post('interview_date');
		$interview_start_time = $this->input->post('interview_start_time');
		$interview_end_time = $this->input->post('interview_end_time');
		$applicant = $this->input->post('applicant');
		$data = array();
		$i = 0;
		foreach ($job_id as $key => $value) {

			$where_data['ap_rec_id'] = $job_id[$i];
			$where_data['ap_status'] = 1;
			$where_data['ap_sent_email!='] = 1;
			$applicant_list = $this->Common->get_data_multi_conditional('applicant', $where_data)->result();
			$j = 0;
			foreach ($applicant_list as $a_list) {

				if ($a_list->ap_sent_email != 1) {
					$j++;

					$where_data_reg['r_candidate_id'] = $a_list->ap_r_candidate_id;
					$where_data_reg['r_status'] = 1;
					$applicant_email = $this->Common->get_data_multi_conditional('register', $where_data_reg)->row();

					$to = $applicant_email->r_email;
					$sub = 'সাক্ষাৎকার সময়';
					$message = "আপনার সাক্ষাৎকার তারিখ " . $interview_date[$i] . " সময় " . $interview_start_time[$i];
					$sent_email = $this->sendMail($to, $sub, $message);
					if ($sent_email == 1) {
						$updateData = array(
							'ap_interview_date' => $interview_date[$i],
							'ap_interview_start_time' => $interview_start_time[$i],
							'ap_sent_email' => 1,
						);
						$ap_id = $this->Common->update_data('applicant', 'ap_id', $a_list->ap_id, $updateData);
					}
					if ($j == $applicant[$i]) {
						break;
					}
				}
			}
			$detail = array(
				'is_job_id' => $job_id[$i],
				'is_ic_id' => $ic_id[$i],
				'is_interview_date' => $interview_date[$i],
				'is_interview_start_time' => $interview_start_time[$i],
				'is_interview_end_time' => $interview_end_time[$i],
				'is_applicant_limit' => $applicant[$i],
				'is_status' => 1,
				'is_created_at' => get_current_time(),
				'is_created_by' => $this->session->userdata('currentActiveId'),
				'is_updated_at' => get_current_time(),
				'is_updated_by' => $this->session->userdata('currentActiveId'),
			);
			$data[] = $detail;
			$i++;
		}
		$this->Common->set_data_batch('interview_schedule', $data);
		$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h5><i class="icon fas fa-check"></i> Alert!</h5>
		Success. Data has been submitted successfully.
	  	</div>');

		redirect('Admin/interview_schedule_create');
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
	public function interview_schedule_list()
	{
		$data = $this->engine->store_nav('interview', 'interview_schedule_list', 'সাক্ষাৎকার সময়সূচী তালিকা ');
		$date_1 = $this->input->post('date_1');
		if (!empty($date_1)) {
			$where_data['is_interview_date'] = $date_1;
		}
		$where_data['is_status'] = 1;

		$schedule_list = $this->Common->get_data_multi_conditional('interview_schedule', $where_data);

		$links = array('next' => 'Next', 'prev' => 'Previous', 'first' => 'First', 'last' => 'Last');
		$this->pagination_bootstrap->set_links($links);

		$this->pagination_bootstrap->offset(10);
		$url = "Admin/interview_schedule_list";
		$data['schedule_list'] = $this->pagination_bootstrap->config($url, $schedule_list);

		$path = 'admin/interview/interview_schedule_list';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function interview_details()
	{
		$data = $this->engine->store_nav('interview', 'interview_schedule_list', 'সাক্ষাৎকার সময়সূচী তালিকা ');
		$job_id = $this->input->post('job_id');
		$is_interview_date = $this->input->post('is_interview_date');
		$is_interview_start_time = $this->input->post('is_interview_start_time');

		$candidate_id = $this->input->post('candidate_id');
		if (!empty($candidate_id)) {
			$where_data['applicant.ap_r_candidate_id'] = $candidate_id;
		}

		$where_data['applicant.ap_rec_id'] = $job_id;
		$where_data['applicant.ap_interview_date'] = $is_interview_date;
		$where_data['applicant.ap_interview_start_time'] = $is_interview_start_time;
		$where_data['applicant.ap_interview_complete!='] = 1;
		$where_data['applicant.ap_status'] = 1;

		$applicant_list = $this->Common->get_data_applicant_list($where_data);

		$links = array('next' => 'Next', 'prev' => 'Previous', 'first' => 'First', 'last' => 'Last');
		$this->pagination_bootstrap->set_links($links);

		$this->pagination_bootstrap->offset(10);
		$url = "Admin/interview_details";
		$data['applicant_list'] = $this->pagination_bootstrap->config($url, $applicant_list);

		$data['job_id'] = $job_id;
		$data['is_interview_date'] = $is_interview_date;
		$data['is_interview_start_time'] = $is_interview_start_time;

		$path = 'admin/interview/interview_details';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function evaluation()
	{
		$data = $this->engine->store_nav('interview', 'interview_schedule_list', 'মূল্যায়ন');

		$ap_id = $this->input->post('ap_id');
		$ap_status = $this->input->post('ap_status');
		$r_candidate_id = $this->input->post('r_candidate_id');

		$where_data['applicant.ap_status'] = $ap_status;
		$where_data['applicant.ap_id'] = $ap_id;
		$where_data['register.r_candidate_id'] = $r_candidate_id;
		$data['applicant_details'] = $this->Common->get_data_applicant_list($where_data)->row();

		$path = 'admin/interview/evaluation';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function evaluation_store()
	{

		$ap_id = $this->input->post('ap_id');
		$r_candidate_id = $this->input->post('r_candidate_id');
		$des_id = $this->input->post('des_id');
		$rec_id = $this->input->post('rec_id');
		$mark1 = $this->input->post('mark1');
		$mark2 = $this->input->post('mark2');
		$mark3 = $this->input->post('mark3');
		$mark4 = $this->input->post('mark4');
		$rcv_mark1 = $this->input->post('rcv_mark1');
		$rcv_mark2 = $this->input->post('rcv_mark2');
		$rcv_mark3 = $this->input->post('rcv_mark3');
		$rcv_mark4 = $this->input->post('rcv_mark4');
		$hand_writting_mark = $this->input->post('hand_writting_mark');
		$hand_writting_rcv_mark = $this->input->post('hand_writting_rcv_mark');
		$age_mark = $this->input->post('age_mark');
		$age_rcv_mark = $this->input->post('age_rcv_mark');
		$location_mark = $this->input->post('location_mark');
		$location_rcv_mark = $this->input->post('location_rcv_mark');
		$sarbik_mark = $this->input->post('sarbik_mark');
		$sarbik_rcv_mark = $this->input->post('sarbik_rcv_mark');
		$total_marks = $this->input->post('total_marks');
		$total_rcv_marks = $this->input->post('total_rcv_marks');

		$insertData = array(
			'aev_r_candidate_id' => $r_candidate_id,
			'aev_rec_id' => $rec_id,
			'aev_designation' => $des_id,
			'aev_ssc_mark' => $mark1,
			'aev_ssc_rcv_mark' => $rcv_mark1,
			'aev_hsc_mark' => $mark2,
			'aev_hsc_rcv_mark' => $rcv_mark2,
			'aev_honours_mark' => $mark3,
			'aev_honours_rcv_mark' => $rcv_mark3,
			'aev_masters_mark' => $mark4,
			'aev_masters_rcv_mark' => $rcv_mark4,
			'aev_hand_writting_mark' => $hand_writting_mark,
			'aev_hand_writting_rcv_mark' => $hand_writting_rcv_mark,
			'aev_age_mark' => $age_mark,
			'aev_age_rcv_mark' => $age_rcv_mark,
			'aev_location_mark' => $location_mark,
			'aev_location_rcv_mark' => $location_rcv_mark,
			'aev_sarbik_mark' => $sarbik_mark,
			'aev_sarbik_rcv_mark' => $sarbik_rcv_mark,
			'aev_total_marks' => $total_marks,
			'aev_total_rcv_marks' => $total_rcv_marks,
			'aev_status' => 1,
			'aev_created_at' => get_current_time(),
			'aev_created_by' => $this->session->userdata('currentActiveId'),
			'aev_updated_at' => get_current_time(),
			'aev_updated_by' => $this->session->userdata('currentActiveId'),
		);

		$d_id = $this->Common->set_data('applicant_evaluation', $insertData);

		$updateData = array(
			'ap_interview_complete' => 1,
		);
		$ap_id = $this->Common->update_data('applicant', 'ap_id', $ap_id, $updateData);
		$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h5><i class="icon fas fa-check"></i> Alert!</h5>
		Success. Data has been submitted successfully.
	  	</div>');
		redirect('Admin/interview_schedule_list');
	}
	public function result_list()
	{

		$data = $this->engine->store_nav('result', 'result_list', 'মূল্যায়ন');

		$where_data['aev_status'] = 1;
		$evaluation_list = $this->Common->get_data_multi_conditional('applicant_evaluation', $where_data);
		$links = array('next' => 'Next', 'prev' => 'Previous', 'first' => 'First', 'last' => 'Last');
		$this->pagination_bootstrap->set_links($links);

		$this->pagination_bootstrap->offset(10);
		$url = "Admin/result_list";
		$data['evaluation_list'] = $this->pagination_bootstrap->config($url, $evaluation_list);


		$path = 'admin/result/result_list';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}

	public function evaluation_approve_reject()
	{

		$aev_id = $this->input->post('aev_id');

		$updateData = array(
			'aev_status' => $this->input->post('aev_status'),
			'aev_updated_at' => get_current_time(),
			'aev_updated_by' => $this->session->userdata('currentActiveId'),
		);
		$aev_id = $this->Common->update_data('applicant_evaluation', 'aev_id', $aev_id, $updateData);

		$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h5><i class="icon fas fa-check"></i> Alert!</h5>
		Success. Data has been approved successfully.
	  	</div>');

		redirect('Admin/result_list');
	}

	public function final_result_list()
	{

		$data = $this->engine->store_nav('result', 'final_result_list', 'মূল্যায়ন');

		$where_data['aev_status'] = 2;
		$evaluation_list = $this->Common->get_data_multi_conditional('applicant_evaluation', $where_data);
		$links = array('next' => 'Next', 'prev' => 'Previous', 'first' => 'First', 'last' => 'Last');
		$this->pagination_bootstrap->set_links($links);

		$this->pagination_bootstrap->offset(10);
		$url = "Admin/final_result_list";
		$data['evaluation_list'] = $this->pagination_bootstrap->config($url, $evaluation_list);


		$path = 'admin/result/final_result_list';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function reject_result_list()
	{

		$data = $this->engine->store_nav('result', 'reject_result_list', 'মূল্যায়ন');

		$where_data['aev_status'] = 3;
		$evaluation_list = $this->Common->get_data_multi_conditional('applicant_evaluation', $where_data);
		$links = array('next' => 'Next', 'prev' => 'Previous', 'first' => 'First', 'last' => 'Last');
		$this->pagination_bootstrap->set_links($links);

		$this->pagination_bootstrap->offset(10);
		$url = "Admin/reject_result_list";
		$data['evaluation_list'] = $this->pagination_bootstrap->config($url, $evaluation_list);

		$path = 'admin/result/reject_result_list';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}

	public function joining_letter_create()
	{

		$data = $this->engine->store_nav('result', 'fina_relsult_list', 'নিয়োগপত্র');
		$candidate_id = $this->input->post('candidate_id');
		$aev_designation = $this->input->post('aev_designation');
		$data['rec_id'] = $this->input->post('aev_rec_id');
		$data['aev_id'] = $this->input->post('aev_id');

		$where_data_name['r_candidate_id'] = $candidate_id;
		$data['applicant'] = $this->Common->get_data_multi_conditional('register', $where_data_name)->row();

		$where_data_des['d_id'] = $aev_designation;
		$data['designation'] = $this->Common->get_data_multi_conditional('designation', $where_data_des)->row();

		$path = 'admin/result/joining_letter_create';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}

	public function joining_letter_store()
	{

		$candidate_id = $this->input->post('candidate_id');
		$rec_id = $this->input->post('rec_id');
		$join_letter_date = $this->input->post('join_letter_date');
		$join_date = $this->input->post('join_date');
		$start_time = $this->input->post('start_time');
		$end_time = $this->input->post('end_time');
		$name = $this->input->post('name');
		$designation = $this->input->post('designation');
		$organization = $this->input->post('organization');

		$insertData = array(
			'ajl_r_candidate_id' => $candidate_id,
			'ajl_rec_id' => $rec_id,
			'ajl_join_letter_date' => $join_letter_date,
			'ajl_join_date' => $join_date,
			'ajl_start_time' => $start_time,
			'ajl_end_time' => $end_time,
			'ajl_name' => $name,
			'ajl_designation' => $designation,
			'ajl_organization' => $organization,
			'ajl_status' => 1,
			'ajl_created_at' => get_current_time(),
			'ajl_created_by' => $this->session->userdata('currentActiveId'),
			'ajl_updated_at' => get_current_time(),
			'ajl_updated_by' => $this->session->userdata('currentActiveId'),
		);

		$ajl_id = $this->Common->set_data('applicant_join_letter', $insertData);

		$aev_id = $this->input->post('aev_id');

		$updateData = array(
			'aev_status' => 5,
			'aev_updated_at' => get_current_time(),
			'aev_updated_by' => $this->session->userdata('currentActiveId'),
		);
		$aev_id = $this->Common->update_data('applicant_evaluation', 'aev_id', $aev_id, $updateData);

		$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h5><i class="icon fas fa-check"></i> Alert!</h5>
		Success. Data has been submitted successfully.
	  	</div>');
		redirect('Admin/final_result_list');
	}

	public function joining_letter_list()
	{

		$data = $this->engine->store_nav('result', 'joining_letter_list', 'জয়েনিং লেটার তালিকা');

		$where_data['aev_status'] = 5;
		$evaluation_list = $this->Common->get_data_multi_conditional('applicant_evaluation', $where_data);
		$links = array('next' => 'Next', 'prev' => 'Previous', 'first' => 'First', 'last' => 'Last');
		$this->pagination_bootstrap->set_links($links);

		$this->pagination_bootstrap->offset(10);
		$url = "Admin/joining_letter_list";
		$data['evaluation_list'] = $this->pagination_bootstrap->config($url, $evaluation_list);

		$path = 'admin/result/joining_letter_list';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}

	public function joining_letter()
	{

		$data = $this->engine->store_nav('result', 'joining_letter_list', 'নিয়োগপত্র');
		$candidate_id = $this->input->post('candidate_id');
		$aev_designation = $this->input->post('aev_designation');
		$data['rec_id'] = $this->input->post('aev_rec_id');
		$data['aev_id'] = $this->input->post('aev_id');

		$where_data_name['r_candidate_id'] = $candidate_id;
		$data['applicant'] = $this->Common->get_data_multi_conditional('register', $where_data_name)->row();

		$where_data_join['ajl_r_candidate_id'] = $candidate_id;
		$data['applicant_join'] = $this->Common->get_data_multi_conditional('applicant_join_letter', $where_data_join)->row();

		$where_data_des['d_id'] = $aev_designation;
		$data['designation'] = $this->Common->get_data_multi_conditional('designation', $where_data_des)->row();

		$path = 'admin/result/joining_letter';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function get_total_applicant()
	{
		$ap_rec_id = $this->input->post("ap_rec_id");
		$where_data['ap_rec_id'] = $ap_rec_id;
		$where_data['ap_status'] = 1;
		$where_data['ap_interview_date'] = NULL;
		$data = $this->Common->get_data_multi_conditional('applicant', $where_data)->result();
		$result = count($data);
		echo json_encode($result);
	}

	public function registered_user_list()
	{

		$data = $this->engine->store_nav('user_list', 'user_list', 'Registered User List');
		$r_candidate_id = $this->input->post('r_candidate_id');
		$r_nid = $this->input->post('r_nid');
		$r_primary_mobile = $this->input->post('r_primary_mobile');
		$r_post = $this->input->post('r_post');
		$r_upazila = $this->input->post('r_upazila');
		$r_district = $this->input->post('r_district');
		$r_division = $this->input->post('r_division');
		if (!empty($r_candidate_id)) {
			$where_data['register.r_candidate_id'] = $r_candidate_id;
		}
		if (!empty($r_nid)) {
			$where_data['register.r_nid'] = $r_nid;
		}
		if (!empty($r_primary_mobile)) {
			$where_data['register.r_primary_mobile'] = $r_primary_mobile;
		}
		if (!empty($r_post)) {
			$where_data['register.r_post'] = $r_post;
		}
		if (!empty($r_upazila)) {
			$where_data['register.r_upazila'] = $r_upazila;
		}
		if (!empty($r_district)) {
			$where_data['register.r_district'] = $r_district;
		}
		if (!empty($r_division)) {
			$where_data['register.r_division'] = $r_division;
		}
		$where_data['register.r_status>='] = 1;

		$user_list = $this->Common->get_data_multi_conditional_desc('register', $where_data, 'r_id');
		$links = array('next' => 'Next', 'prev' => 'Previous', 'first' => 'First', 'last' => 'Last');
		$this->pagination_bootstrap->set_links($links);

		$this->pagination_bootstrap->offset(10);
		$url = "Admin/registered_user_list";
		$data['user_list'] = $this->pagination_bootstrap->config($url, $user_list);


		$path = 'admin/applicant/user_list';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function user_edit()
	{
		$data = $this->engine->store_nav('user_list', 'user_list', 'Registered User List');
		$where['r_id'] = $this->input->post('r_id');
		$data['applicant_info'] = $this->Common->get_data_multi_conditional('register', $where)->row();
		$path = 'admin/applicant/edit_user';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}

	public function applicant_cv_update()
	{
		$authenticationData = array(
			'a_credential' => $this->input->post('primary_mobile'),
		);
		$a_id = $this->input->post('r_a_id');
		$authId = $this->Common->update_data('authority', 'a_id', $a_id, $authenticationData);

		if (!empty($_FILES['applicant_image']['name'])) {
			$file_path_user_image = 'assets/uploads/applicant/';
			$preFileName = time();
			$applicant_image = $this->do_upload('applicant_image', $preFileName, $file_path_user_image);

			$where_data_edit['r_candidate_id'] = $this->input->post('r_candidate_id');
			$image_data = $this->Common->get_data_multi_conditional('register', $where_data_edit)->row();
			if (file_exists($file_path_user_image . $image_data->r_image)) {
				unlink($file_path_user_image . $image_data->r_image);
			}
		} else {
			$applicant_image = $this->input->post('applicant_img');
		}

		$updateData = array(
			'r_first_name' => $this->input->post('first_name'),
			'r_last_name' => $this->input->post('last_name'),
			'r_gender' => $this->input->post('gender'),
			'r_birth_date' => $this->input->post('birth_date'),
			'r_age' => $this->input->post('age'),
			'r_father_name' => $this->input->post('father_name'),
			'r_father_profession' => $this->input->post('father_profession'),
			'r_mother_name' => $this->input->post('mother_name'),
			'r_mother_profession' => $this->input->post('mother_profession'),
			'r_maritial_status' => $this->input->post('maritial_status'),
			'r_blood_group' => $this->input->post('blood_group'),
			'r_nationality' => $this->input->post('nationality'),
			'r_nid' => $this->input->post('nid'),
			'r_religion' => $this->input->post('religion'),
			'r_primary_mobile' => $this->input->post('primary_mobile'),
			'r_office_mobile' => $this->input->post('office_mobile'),
			'r_home_mobile' => $this->input->post('home_mobile'),
			'r_present_address' => $this->input->post('present_address'),
			'r_village' => $this->input->post('r_village'),
			'r_post' => $this->input->post('post'),
			'r_upazila' => $this->input->post('upazila'),
			'r_district' => $this->input->post('district'),
			'r_division' => $this->input->post('division'),
			'r_email' => $this->input->post('email'),
			'r_updated_at' => get_current_time(),
			'r_image' => $applicant_image,
			'r_career_objective' => $this->input->post('career_objective'),
			'r_profile_summary' => $this->input->post('profile_summary'),
		);
		$table = 'register';
		$r_candidate_id = $this->input->post('r_candidate_id');
		$registration_id = $this->Common->update_data($table, 'r_candidate_id', $r_candidate_id, $updateData);

		$pre_ae_id = $this->input->post('ae_id');
		if (!empty($pre_ae_id)) {
			$delete_arr = array();
			foreach ($pre_ae_id as $pkey => $pvalue) {
				$delete_arr[] = array('id' => $pvalue, );
			}
			$this->Common->delete_batch('applicant_education', 'ae_id', $delete_arr);
		}

		$exam_name = $this->input->post('exam_name');
		$institute_name = $this->input->post('institute_name');
		$education_board = $this->input->post('education_board');
		$group = $this->input->post('group');
		$gpa = $this->input->post('gpa');
		$get_gpa = $this->input->post('get_gpa');
		$pass_year = $this->input->post('pass_year');
		$data = array();
		$i = 0;
		foreach ($exam_name as $key => $value) {
			$detail = array(
				'ae_r_candidate_id' => $r_candidate_id,
				'ae_exam_name' => $exam_name[$i],
				'ae_institute_name' => $institute_name[$i],
				'ae_education_board' => $education_board[$i],
				'ae_group' => $group[$i],
				'ae_gpa' => $gpa[$i],
				'ae_get_gpa' => $get_gpa[$i],
				'ae_pass_year' => $pass_year[$i],
				'ae_status' => 1,
				'ae_created_at' => get_current_time(),
				'ae_created_by' => $registration_id,
				'ae_updated_at' => get_current_time(),
				'ae_updated_by' => $registration_id,
			);
			$data[] = $detail;
			$i++;
		}
		$this->Common->set_data_batch('applicant_education', $data);

		$pre_at_id = $this->input->post('at_id');
		if (!empty($pre_at_id)) {
			$delete_arr_at = array();
			foreach ($pre_at_id as $pkey => $pvalue) {
				$delete_arr_at[] = array('id' => $pvalue, );
			}
			$this->Common->delete_batch('applicant_training', 'at_id', $delete_arr_at);
		}

		$training_name = $this->input->post('training_name');
		$training_subject = $this->input->post('training_subject');
		$training_institution = $this->input->post('training_institution');
		$training_institution_address = $this->input->post('training_institution_address');
		$training_country = $this->input->post('training_country');
		$training_year = $this->input->post('training_year');
		$training_duration = $this->input->post('training_duration');
		$data1 = array();
		if (!empty($training_name)) {
			$i = 0;
			foreach ($training_name as $key => $value) {
				$detail1 = array(
					'at_r_candidate_id' => $r_candidate_id,
					'at_training_name' => $training_name[$i],
					'at_training_subject' => $training_subject[$i],
					'at_training_institution' => $training_institution[$i],
					'at_training_institution_address' => $training_institution_address[$i],
					'at_training_country' => $training_country[$i],
					'at_training_year' => $training_year[$i],
					'at_training_duration' => $training_duration[$i],
					'at_status' => 1,
					'at_created_at' => get_current_time(),
					'at_created_by' => $registration_id,
					'at_updated_at' => get_current_time(),
					'at_updated_by' => $registration_id,
				);
				$data1[] = $detail1;
				$i++;
			}
			$this->Common->set_data_batch('applicant_training', $data1);
		}

		$pre_ac_id = $this->input->post('ac_id');
		if (!empty($pre_ac_id)) {
			$delete_arr_ac = array();
			foreach ($pre_ac_id as $pkey => $pvalue) {
				$delete_arr_ac[] = array('id' => $pvalue, );
			}
			$this->Common->delete_batch('applicant_certification', 'ac_id', $delete_arr_ac);
		}
		$certification_name = $this->input->post('certification_name');
		$certification_institution = $this->input->post('certification_institution');
		$certification_institution_address = $this->input->post('certification_institution_address');
		$certification_duration_start = $this->input->post('certification_duration_start');
		$certification_duration_end = $this->input->post('certification_duration_end');
		$data2 = array();
		if (!empty($certification_name)) {
			$i = 0;
			foreach ($certification_name as $key => $value) {
				$detail2 = array(
					'ac_r_candidate_id' => $r_candidate_id,
					'ac_certification_name' => $certification_name[$i],
					'ac_certification_institution' => $certification_institution[$i],
					'ac_certification_institution_address' => $certification_institution_address[$i],
					'ac_certification_duration_start' => $certification_duration_start[$i],
					'ac_certification_duration_end' => $certification_duration_end[$i],
					'ac_status' => 1,
					'ac_created_at' => get_current_time(),
					'ac_created_by' => $registration_id,
					'ac_updated_at' => get_current_time(),
					'ac_updated_by' => $registration_id,
				);
				$data2[] = $detail2;
				$i++;
			}
			$this->Common->set_data_batch('applicant_certification', $data2);
		}

		$pre_aeh_id = $this->input->post('aeh_id');
		if (!empty($pre_aeh_id)) {
			$delete_arr_aeh = array();
			foreach ($pre_aeh_id as $pkey => $pvalue) {
				$delete_arr_aeh[] = array('id' => $pvalue, );
			}
			$this->Common->delete_batch('applicant_employment_history', 'aeh_id', $delete_arr_aeh);
		}
		$company_name = $this->input->post('company_name');
		$company_business = $this->input->post('company_business');
		$company_address = $this->input->post('company_address');
		$company_designation = $this->input->post('company_designation');
		$company_department = $this->input->post('company_department');
		$company_duration_start = $this->input->post('company_duration_start');
		$company_duration_end = $this->input->post('company_duration_end');
		$company_responsilities = $this->input->post('company_responsilities');
		$data3 = array();
		if (!empty($company_name)) {
			$i = 0;
			foreach ($company_name as $key => $value) {
				$detail3 = array(
					'aeh_r_candidate_id' => $r_candidate_id,
					'aeh_company_name' => $company_name[$i],
					'aeh_company_business' => $company_business[$i],
					'aeh_company_address' => $company_address[$i],
					'aeh_company_designation' => $company_designation[$i],
					'aeh_company_department' => $company_department[$i],
					'aeh_company_duration_start' => $company_duration_start[$i],
					'aeh_company_duration_end' => $company_duration_end[$i],
					'aeh_company_responsilities' => $company_responsilities[$i],
					'aeh_status' => 1,
					'aeh_created_at' => get_current_time(),
					'aeh_created_by' => $registration_id,
					'aeh_updated_at' => get_current_time(),
					'aeh_updated_by' => $registration_id,
				);
				$data3[] = $detail3;
				$i++;
			}
			$this->Common->set_data_batch('applicant_employment_history', $data3);
		}

		$pre_ar_id = $this->input->post('ar_id');
		if (!empty($pre_ar_id)) {
			$delete_arr_ar = array();
			foreach ($pre_ar_id as $pkey => $pvalue) {
				$delete_arr_ar[] = array('id' => $pvalue, );
			}
			$this->Common->delete_batch('applicant_reference', 'ar_id', $delete_arr_ar);
		}

		$reference_name = $this->input->post('reference_name');
		$designation = $this->input->post('designation');
		$organization = $this->input->post('organization');
		$relation = $this->input->post('relation');
		$email = $this->input->post('ref_email');
		$mobile = $this->input->post('mobile');
		$address = $this->input->post('address');
		$data4 = array();
		if (!empty($reference_name)) {
			$i = 0;
			foreach ($reference_name as $key => $value) {
				$detail4 = array(
					'ar_r_candidate_id' => $r_candidate_id,
					'ar_reference_name' => $reference_name[$i],
					'ar_designation' => $designation[$i],
					'ar_organization' => $organization[$i],
					'ar_relation' => $relation[$i],
					'ar_email' => $email[$i],
					'ar_mobile' => $mobile[$i],
					'ar_address' => $address[$i],
					'ar_status' => 1,
					'ar_created_at' => get_current_time(),
					'ar_created_by' => $registration_id,
					'ar_updated_at' => get_current_time(),
					'ar_updated_by' => $registration_id,
				);
				$data4[] = $detail4;
				$i++;
			}
			$this->Common->set_data_batch('applicant_reference', $data4);
		}

		$pre_al_id = $this->input->post('al_id');
		if (!empty($pre_al_id)) {
			$delete_arr_al = array();
			foreach ($pre_al_id as $pkey => $pvalue) {
				$delete_arr_al[] = array('id' => $pvalue, );
			}
			$this->Common->delete_batch('applicant_language', 'al_id', $delete_arr_al);
		}
		$language_name = $this->input->post('language_name');
		$reading_skill = $this->input->post('reading_skill');
		$wirting_skill = $this->input->post('wirting_skill');
		$speaking_skill = $this->input->post('speaking_skill');
		$data5 = array();
		if (!empty($language_name)) {
			$i = 0;
			foreach ($language_name as $key => $value) {
				$detail5 = array(
					'al_r_candidate_id' => $r_candidate_id,
					'al_language_name' => $language_name[$i],
					'al_reading_skill' => $reading_skill[$i],
					'al_wirting_skill' => $wirting_skill[$i],
					'al_speaking_skill' => $speaking_skill[$i],
					'al_status' => 1,
					'al_created_at' => get_current_time(),
					'al_created_by' => $registration_id,
					'al_updated_at' => get_current_time(),
					'al_updated_by' => $registration_id,
				);
				$data5[] = $detail5;
				$i++;
			}
			$this->Common->set_data_batch('applicant_language', $data5);
		}

		$pre_as_id = $this->input->post('as_id');
		if (!empty($pre_as_id)) {
			$delete_arr_as = array();
			foreach ($pre_as_id as $pkey => $pvalue) {
				$delete_arr_as[] = array('id' => $pvalue, );
			}
			$this->Common->delete_batch('applicant_skill', 'as_id', $delete_arr_as);
		}

		$skill_name = $this->input->post('skill_name');
		$duration = $this->input->post('duration');
		$data6 = array();
		if (!empty($skill_name)) {
			$i = 0;
			foreach ($skill_name as $key => $value) {
				$detail6 = array(
					'as_r_candidate_id' => $r_candidate_id,
					'as_skill_name' => $skill_name[$i],
					'as_duration' => $duration[$i],
					'as_status' => 1,
					'as_created_at' => get_current_time(),
					'as_created_by' => $registration_id,
					'as_updated_at' => get_current_time(),
					'as_updated_by' => $registration_id,
				);
				$data6[] = $detail6;
				$i++;
			}
			$this->Common->set_data_batch('applicant_skill', $data6);
		}

		$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h5><i class="icon fas fa-check"></i> Alert!</h5>
		Success. Data has been updated successfully.
	  	</div>');
		redirect('Admin/registered_user_list');
	}
	public function user_inactive_active()
	{

		$id = $this->input->post('id');

		$updateData = array(
			'r_status' => $this->input->post('status'),
		);
		$this->Common->update_data('register', 'r_id', $id, $updateData);

		$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h5><i class="icon fas fa-check"></i> Alert!</h5>
		Success. Data has been submitted successfully.
	  	</div>');

		redirect('Admin/registered_user_list');
	}
	public function check_number_code()
	{
		$NumberCode = $this->input->post('NumberCode');
		$where_data['e_primary_mobile'] = $NumberCode;
		$table = "employee";
		$res = $this->Common->get_data_multi_conditional($table, $where_data)->row();
		if (!empty($res)) {
			$this->load->view('admin/alert/code_alert_error');
		} else {
			$resX = $this->Common->checkNumberCodeAuth($NumberCode);
			if ($resX == 1) {
				$this->load->view('admin/alert/code_alert_error');
			} else {
				$this->load->view('admin/alert/code_alert_success');
			}
		}
	}
	// public function do_upload($file, $preFileName, $file_path)
	// {
	// 	//		return 'demo.jpg';
	// 	$config['upload_path'] = $file_path;
	// 	$config['allowed_types'] = 'pdf|gif|jpg|png';
	// 	// $config['max_size'] = 1024000;
	// 	// $config['max_width'] = 2500;
	// 	// $config['max_height'] = 2500;
	// 	$config['file_name'] = $preFileName . '_' . $file;
	// 	$this->load->library('upload', $config);

	// 	if (!$this->upload->do_upload($file)) {
	// 		$error = array('error' => $this->upload->display_errors());
	// 		$fileName = '';
	// 		echo $error['error'];
	// 	} else {
	// 		$upload_data = $this->upload->data();
	// 		$fileName = $upload_data['file_name'];
	// 	}
	// 	return $fileName;
	// }
	// ========= frontend ============

	public function homepage()
	{
		$data = $this->engine->store_nav('website_setting', 'homepage', 'Homepage');
		$data['homapage_info'] = $this->Common->get_data('job_homepage')->row();
		$path = 'admin/frontend/homepage';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}

	public function homepage_store()
	{

		$company_name = $this->input->post('company_name');
		$company_address = $this->input->post('company_address');
		$company_mobile = $this->input->post('company_mobile');
		$company_email = $this->input->post('company_email');
		$welcome_title = $this->input->post('welcome_title');
		$welcome_description = $this->input->post('welcome_description');
		$welcome_long_description = $this->input->post('welcome_long_description');
		$job_title = $this->input->post('job_title');
		$job_description = $this->input->post('job_description');
		$registration_title = $this->input->post('registration_title');
		$registration_description = $this->input->post('registration_description');
		$login_title = $this->input->post('login_title');
		$login_details = $this->input->post('login_details');
		$application_title = $this->input->post('application_title');
		$application_description = $this->input->post('application_description');
		$application_long_description = $this->input->post('application_long_description');
		$faq_title = $this->input->post('faq_title');
		$faq_description = $this->input->post('faq_description');
		$faq_long_description = $this->input->post('faq_long_description');
		$footer_description = $this->input->post('footer_description');
		$fb_link = $this->input->post('fb_link');
		$youtube_link = $this->input->post('youtube_link');
		$twitter_link = $this->input->post('twitter_link');
		$linkedin_link = $this->input->post('linkedin_link');

		$updateData = array(
			'h_company_name' => $company_name,
			'h_company_address' => $company_address,
			'h_company_mobile' => $company_mobile,
			'h_company_email' => $company_email,
			'h_welcome_title' => $welcome_title,
			'h_welcome_description' => $welcome_description,
			'h_welcome_long_description' => $welcome_long_description,
			'h_job_title' => $job_title,
			'h_job_description' => $job_description,
			'h_registration_title' => $registration_title,
			'h_registration_description' => $registration_description,
			'h_login_title' => $login_title,
			'h_login_details' => $login_details,
			'h_application_title' => $application_title,
			'h_application_description' => $application_description,
			'h_application_long_description' => $application_long_description,
			'h_faq_title' => $faq_title,
			'h_faq_description' => $faq_description,
			'h_faq_long_description' => $faq_long_description,
			'h_footer_description' => $footer_description,
			'h_fb_link' => $fb_link,
			'h_youtube_link' => $youtube_link,
			'h_twitter_link' => $twitter_link,
			'h_linkedin_link' => $linkedin_link,
		);
		$h_id = $this->input->post('h_id');

		$this->Common->update_data('job_homepage', 'h_id', $h_id, $updateData);

		$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h5><i class="icon fas fa-check"></i> Alert!</h5>
		Success. Data has been updated successfully.
	  	</div>');
		redirect('Admin/homepage');
	}
	public function logo_upload()
	{

		$file_path_user_image = 'assets/site/images/';
		$preFileName = time();
		$logo = $this->do_upload('logo', $preFileName, $file_path_user_image);

		$h_id = $this->input->post('h_id');

		$where_data_edit['h_id'] = $h_id;
		$image_data = $this->Common->get_data_multi_conditional('job_homepage', $where_data_edit)->row();

		if (file_exists($file_path_user_image . $image_data->h_logo)) {
			unlink($file_path_user_image . $image_data->h_logo);
		}
		$updateData = array(
			'h_logo' => $logo,
		);
		$this->Common->update_data('job_homepage', 'h_id', $h_id, $updateData);

		$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h5><i class="icon fas fa-check"></i> Alert!</h5>
		Success. Logo updated successfully.
	  	</div>');
		redirect('Admin/homepage');
	}
	public function right_image_upload()
	{

		$file_path_user_image = 'assets/site/images/';
		$preFileName = time();
		$header_side_image = $this->do_upload('header_side_image', $preFileName, $file_path_user_image);

		$h_id = $this->input->post('h_id');

		$where_data_edit['h_id'] = $h_id;
		$image_data = $this->Common->get_data_multi_conditional('job_homepage', $where_data_edit)->row();
		if (file_exists($file_path_user_image . $image_data->h_header_right_image)) {
			unlink($file_path_user_image . $image_data->h_header_right_image);
		}
		$updateData = array(
			'h_header_right_image' => $header_side_image,
		);
		$this->Common->update_data('job_homepage', 'h_id', $h_id, $updateData);


		$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h5><i class="icon fas fa-check"></i> Alert!</h5>
		Success. Data has been updated successfully.
	  	</div>');
		redirect('Admin/homepage');
	}

	public function active_inactive()
	{

		$id = $this->input->post('id');
		$table = $this->input->post('table');
		$url = $this->input->post('url');

		$updateData = array(
			'status' => $this->input->post('status'),
		);
		$this->Common->update_data($table, 'id', $id, $updateData);

		$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h5><i class="icon fas fa-check"></i> Alert!</h5>
		Success. Data has been submitted successfully.
	  	</div>');

		redirect($url);
	}
	public function active_inactive_parameter()
	{

		$id = $this->input->post('id');
		$parameter = $this->input->post('album_id');
		$table = $this->input->post('table');
		$url = $this->input->post('url');

		$updateData = array(
			'status' => $this->input->post('status'),
		);
		$this->Common->update_data($table, 'id', $id, $updateData);

		$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h5><i class="icon fas fa-check"></i> Alert!</h5>
		Success. Data has been submitted successfully.
	  	</div>');

		redirect($url . '/' . $parameter);
	}
	public function do_upload($file, $preFileName, $file_path)
	{
		//		return 'demo.jpg';
		$config['upload_path'] = $file_path;
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		// $config['max_size'] = 1024000;
		// $config['max_width'] = 2500;
		// $config['max_height'] = 2500;
		$config['file_name'] = $preFileName . '_' . $file;
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload($file)) {
			$error = array('error' => $this->upload->display_errors());
			$fileName = '';
			// echo $error['error'];
			redirect(current_url());
		} else {
			$upload_data = $this->upload->data();
			// $config['image_library'] = 'gd2';  
			// $config['source_image'] = $file_path.'/'.$upload_data["file_name"];  
			// $config['create_thumb'] = FALSE;  
			// $config['maintain_ratio'] = FALSE;  
			// $config['quality'] = '90%';  
			// $config['width'] = 2000;  
			// $config['height'] = 1500;  
			// $config['new_image'] = $file_path.'/'.$upload_data["file_name"];  
			// $this->load->library('image_lib', $config);  
			// $this->image_lib->resize();  

			$fileName = $upload_data['file_name'];
		}
		return $fileName;
	}
	public function videoc_upload($prefix = 'video')
	{
		$config['upload_path'] = 'assets/uploads/videos/';
		$config['allowed_types'] = 'mp4|webm|ogg';
		$config['max_size'] = '';
		$config['max_width'] = '200000000';
		$config['max_height'] = '1000000000000';
		if (!empty($_FILES['filename']['name'])) {
			$filename = $prefix . '_' . time() . $_FILES['filename']['name'];
			$config['file_name'] = $filename;
			$this->load->library('upload', $config);
			$ck = $this->upload->do_upload("filename");
			if (!$ck) {
				$error = array('error' => $this->upload->display_errors());
				//var_dump($error);
			}
		} else {
			$filename = '';
		}
		return $filename;
	}
}
