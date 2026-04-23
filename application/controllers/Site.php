<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller
{

	private $main_layout = 'site/master_layout';
	private $header = 'site/header';
	private $footer = 'site/footer';
	private $serverDateTime = '';
	public function __construct()
	{
		parent::__construct();
	}

	protected function check_login()
	{
		$user = $this->session->userdata('login_user_info_all');

		if (!$user) {
			$this->session->set_flashdata('error', 'পেইজটি এক্সেসেস করতে, দয়া করে মেম্বার আইডি লগইন করুন');
			redirect('member_login');
			// exit;
		}

		echo($user->active_status);

		if ($user->active_status != 1) {
			$this->session->set_flashdata('error', 'আপনার মেম্বারশিপ একটিভ নয়, দয়া করে কতৃপক্ষের সাথে যোগাযোগ করুন');
			redirect('member_login');
			exit;
		}


		return $user;
	}


	public function index()
	{
		$data = $this->engine->store_nav('site', 'Nothing', 'শিক্ষিত বেকার কেন্দ্রীয় সঞ্চয় ও ঋণদান সমবায় সমিতি');
		$ip = $this->input->ip_address();
		$db_ip = $this->Common->get_data_single_conditional('visitors', 'ip', $ip)->row();
		if (!empty($db_ip)) {
			$data_table = array(
				'date' => get_current_time(),
				'hits' => $db_ip->hits + 1,
			);
			$table = 'visitors';
			$this->Common->update_data($table, 'id', $db_ip->id, $data_table);

		} else {
			$data_table = array(
				'date' => get_current_time(),
				'ip' => $ip,
				'hits' => 1,
			);
			$table = 'visitors';
			$this->Common->set_data($table, $data_table);

		}

		$where_notice['status'] = 1;
		$data['notices'] = $this->Common->get_data_multi_conditional_desc('notice_board', $where_notice, 'id')->result();
		$data['prize'] = $this->Common->get_data('prize')->result();
		$data['social_works'] = $this->Common->get_data('page4')->result();
		$data['somity_works'] = $this->Common->get_data('page1')->result();
		$data['songothon_works'] = $this->Common->get_data('page6')->result();
		$where_data_slide['status'] = 1;
		$data['slider_images'] = $this->Common->get_data_multi_conditional_desc('slider', $where_data_slide, 'id')->result();
		$data['our_info'] = $this->Common->get_data('page7')->result();
		$data['partners'] = $this->Common->get_data('page2')->result();
		$data['president'] = $this->Common->get_data_multi_conditional_limit_desc('president', 'id', 1)->row();
		$data['secretary'] = $this->Common->get_data_multi_conditional_limit_desc('jointsecretary', 'id', 1)->row();
		$data['ceo'] = $this->Common->get_data_multi_conditional_limit_desc('ceo', 'id', 1)->row();
		// $data['vice_presidents'] = $this->Common->get_data('vpresidentpic')->result();
		$data['emp_recruitment'] = $this->Common->get_data('page5')->result();
		$data['management_info'] = $this->Common->get_data('page3')->result();
		$data['social_media'] = $this->Common->get_data('media')->row();
		$where_data_br['status'] = 1;
		$data['ftchBrakingNws'] = $this->Common->get_data_multi_conditional_desc('tbl_breking_news', $where_data_br, 'id')->result();
		$where_data_vd['status'] = 1;
		$data['videos'] = $this->Common->get_data_conditional_limit_desc('video', $where_data_vd, 'id', 6)->result();
		$path = 'site/pages/homepage';
		$this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);
	}




	//   ---------------------------- function for file uploads------------------

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

	



	public function all_products()
	{
		$this->check_login();
		$data = $this->engine->store_nav('site', 'Nothing', 'products');
		$path = 'site/pages/all_products/product_card';
		$this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);
	}

	// ---------------------create member-----------------

	public function member_application()
	{
		$data = $this->engine->store_nav('site', 'Nothing', 'সদস্য আবেদন ফরম');

		$path = "site/pages/member_application";
		$this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);
	}


	public function member_application_save()
	{

		$mobile_number = $this->input->post('mobile_number');

		// Check if mobile number already exists
		$this->db->where('mobile_number', $mobile_number);
		$existing_member = $this->db->get('members_n')->row();

		if ($existing_member) {
			$this->session->set_flashdata('error', 'ইতিমধ্যে এই নম্বর যে একজন সদস্য বিদ্যমান!');
			redirect('member_registration');
			return;
		}

		$logo = $this->upload_file('logo', './assets/uploads/project/members/logo/');
		$document_1 = $this->upload_file('document_1', './assets/uploads/project/members/members_document/');
		$nomini_sign = $this->upload_file('nomini_sign', './assets/uploads/project/members/nominee_sign/');
		$Admission_Issuer_sign = $this->upload_file('Admission_Issuer_sign', './assets/uploads/project/members/admission_issuer_sign/');

		$data = array(

			'sarok_no' => $this->input->post('sarok_no'),
			'sarok_date' => $this->input->post('sarok_date'),

			'name' => $this->input->post('name'),
			'father_name' => $this->input->post('father_name'),
			'mother_name' => $this->input->post('mother_name'),
			'nid' => $this->input->post('nid'),
			'birth_date' => $this->input->post('birth_date'),
			'mobile_number' => $this->input->post('mobile_number'),
			'email' => $this->input->post('email'),
			'gender' => $this->input->post('gender'),

			'village' => $this->input->post('village'),
			'post' => $this->input->post('post'),
			'sub_district' => $this->input->post('sub_district'),
			'district' => $this->input->post('district'),

			'association_designation' => $this->input->post('association_designation'),
			'association_district' => $this->input->post('association_district'),
			'association_name' => $this->input->post('association_name'),

			'paid_amount' => $this->input->post('paid_amount'),
			'voucher_no' => $this->input->post('voucher_no'),
			'managing_committee_date' => $this->input->post('managing_committee_date'),

			'Cooperative_association_name' => $this->input->post('Cooperative_association_name'),
			'Cooperative_association_number' => $this->input->post('Cooperative_association_number'),
			'Cooperative_association_registration_address' => $this->input->post('Cooperative_association_registration_address'),
			'Cooperative_association_address' => $this->input->post('Cooperative_association_address'),
			'Cooperative_association_chairman' => $this->input->post('Cooperative_association_chairman'),
			'Cooperative_association_secretary' => $this->input->post('Cooperative_association_secretary'),
			'Cooperative_association_registration_no' => $this->input->post('Cooperative_association_registration_no'),
			'Cooperative_association_registration_date' => $this->input->post('Cooperative_association_registration_date'),
			'Cooperative_association_class' => $this->input->post('Cooperative_association_class'),
			'Cooperative_association_type' => $this->input->post('Cooperative_association_type'),
			'Cooperative_association_member_count' => $this->input->post('Cooperative_association_member_count'),
			'Cooperative_association_working_area' => $this->input->post('Cooperative_association_working_area'),

			'nomini_name' => $this->input->post('nomini_name'),
			'nomini_designation' => $this->input->post('nomini_designation'),
			'nomini_mobile_no' => $this->input->post('nomini_mobile_no'),
			'nomini_date' => $this->input->post('nomini_date'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),

			'Admission_Issue_date' => $this->input->post('Admission_Issue_date'),
			'Admission_Issuer_designation' => $this->input->post('Admission_Issuer_designation'),

			'logo' => $logo,
			'document_1' => $document_1,
			'nomini_sign' => $nomini_sign,
			'Admission_Issuer_sign' => $Admission_Issuer_sign,
		);

		$this->db->insert('members_n', $data);
		$this->session->set_flashdata('success', 'অভিনন্দন, আপনার আবেদন সফলভাবে জমা দেওয়া হয়েছে। সদস্যপদ টি একটিভ করতে সদস্য ফী প্রদান করুন ');
		redirect('member_login');
	}



	// // ---------------------get all members-----------------
	// public function members_list()
	// {
	// 	$data['members'] = $this->db->get('members_n')->result();
	// 	$this->load->view('site/members_list/members_list', $data);
	// }


	// // ---------------------get single members-----------------


	// public function view_member($id)
	// {
	// 	$data['member'] = $this->Common->get_data_single_conditional('members_n', 'id', $id)->row();
	// 	$this->load->view('site/members_list/member_Details', $data);
	// }






	// ---------------------Edit member's Data-----------------


	public function edit_member($id)
	{
		$data['member'] = $this->db->get_where('members_n', ['id' => $id])->row();
		$this->load->view('site/members_list/updateForm', $data);
	}


	public function update_member($id)
	{
		$member = $this->db->get_where('members_n', ['id' => $id])->row();

		$update_data = [
			'sarok_no' => $this->input->post('sarok_no'),
			'sarok_date' => $this->input->post('sarok_date'),

			'name' => $this->input->post('name'),
			'father_name' => $this->input->post('father_name'),
			'mother_name' => $this->input->post('mother_name'),
			'nid' => $this->input->post('nid'),
			'birth_date' => $this->input->post('birth_date'),
			'mobile_number' => $this->input->post('mobile_number'),
			'email' => $this->input->post('email'),
			'gender' => $this->input->post('gender'),

			'village' => $this->input->post('village'),
			'post' => $this->input->post('post'),
			'sub_district' => $this->input->post('sub_district'),
			'district' => $this->input->post('district'),

			'association_designation' => $this->input->post('association_designation'),
			'association_district' => $this->input->post('association_district'),
			'association_name' => $this->input->post('association_name'),

			'paid_amount' => $this->input->post('paid_amount'),
			'voucher_no' => $this->input->post('voucher_no'),
			'managing_committee_date' => $this->input->post('managing_committee_date'),

			'Cooperative_association_name' => $this->input->post('Cooperative_association_name'),
			'Cooperative_association_number' => $this->input->post('Cooperative_association_number'),
			'Cooperative_association_registration_address' => $this->input->post('Cooperative_association_registration_address'),

			'Cooperative_association_address' => $this->input->post('Cooperative_association_address'),
			'Cooperative_association_chairman' => $this->input->post('Cooperative_association_chairman'),
			'Cooperative_association_secretary' => $this->input->post('Cooperative_association_secretary'),
			'Cooperative_association_registration_no' => $this->input->post('Cooperative_association_registration_no'),
			'Cooperative_association_registration_date' => $this->input->post('Cooperative_association_registration_date'),
			'Cooperative_association_class' => $this->input->post('Cooperative_association_class'),
			'Cooperative_association_type' => $this->input->post('Cooperative_association_type'),
			'Cooperative_association_member_count' => $this->input->post('Cooperative_association_member_count'),
			'Cooperative_association_working_area' => $this->input->post('Cooperative_association_working_area'),

			'nomini_name' => $this->input->post('nomini_name'),
			'nomini_designation' => $this->input->post('nomini_designation'),
			'nomini_mobile_no' => $this->input->post('nomini_mobile_no'),
			'nomini_date' => $this->input->post('nomini_date'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),

			'Admission_Issue_date' => $this->input->post('Admission_Issue_date'),
			'Admission_Issuer_designation' => $this->input->post('Admission_Issuer_designation'),

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

		$update_data['logo'] = update_file(
			'logo',
			'./assets/uploads/project/members/logo/',
			$member->logo,
			'jpg|jpeg|png'
		);

		$update_data['nomini_sign'] = update_file(
			'nomini_sign',
			'./assets/uploads/project/members/nominee_sign/',
			$member->nomini_sign,
			'jpg|jpeg|png'
		);

		$update_data['document_1'] = update_file(
			'document_1',
			'./assets/uploads/project/members/members_document',
			$member->document_1,
			'pdf'
		);


		$update_data['Admission_Issuer_sign'] = update_file(
			'Admission_Issuer_sign',
			'./assets/uploads/project/members/admission_issuer_sign/',
			$member->Admission_Issuer_sign,
			'jpg|jpeg|png'
		);

		$this->db->where('id', $id);
		$this->db->update('members_n', $update_data);

		redirect(base_url('applicant/members_list/member_Details/' . $id));
	}




















	public function view($uri)
	{
		$data = $this->engine->store_nav('site', 'Nothing', 'শিক্ষিত বেকার কেন্দ্রীয় সঞ্চয় ও ঋণদান সমবায় সমিতি');
		$data['social_media'] = $this->Common->get_data('media')->row();
		$where_data_br['status'] = 1;
		$data['ftchBrakingNws'] = $this->Common->get_data_multi_conditional_desc('tbl_breking_news', $where_data_br, 'id')->result();
		$q = $this->db->get_where("website", array("uri" => $uri));
		$data['row'] = $q->row();

		// print_r($data['row']->type);
		// exit();
		if ($uri == "our_info") {
			$data['our_info'] = $this->Common->get_data('page7')->row();
		}

		if ($uri == 'contact')
			$page = "contact";
		else if ($uri == 'gallery')
			$page = "gallery";
		else if ($uri == 'result')
			$page = "result";
		else if ($uri == 'download')
			$page = "download";
		else if ($uri == "our_info")
			$page = "info_details";
		else
			$page = "pageload";

		if (!empty($data['row'])) {
			if ('custom' == $data['row']->type) {
				$path = 'site/pages/body';
			} else {
				$path = 'site/pages/' . $page;
			}
		} else {
			$path = 'site/pages/' . $page;
		}
		$this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);

	}
	public function president()
	{
		$data = $this->engine->store_nav('site', 'Nothing', 'শিক্ষিত বেকার কেন্দ্রীয় সঞ্চয় ও ঋণদান সমবায় সমিতি');
		$data['social_media'] = $this->Common->get_data('media')->row();
		$where_data_br['status'] = 1;
		$data['ftchBrakingNws'] = $this->Common->get_data_multi_conditional_desc('tbl_breking_news', $where_data_br, 'id')->result();

		$data['abc'] = 'xyz';
		$data['vice_principle'] = $this->db->query("select * from president order by id desc")->result();

		$path = 'site/pages/president';
		$this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);


	}
	public function ceo()
	{
		$data = $this->engine->store_nav('site', 'Nothing', 'শিক্ষিত বেকার কেন্দ্রীয় সঞ্চয় ও ঋণদান সমবায় সমিতি');
		$data['social_media'] = $this->Common->get_data('media')->row();
		$where_data_br['status'] = 1;
		$data['ftchBrakingNws'] = $this->Common->get_data_multi_conditional_desc('tbl_breking_news', $where_data_br, 'id')->result();

		$data['abc'] = 'xyz';
		$data['vice_principle'] = $this->db->query("select * from ceo order by id desc")->result();

		$path = 'site/pages/ceo';
		$this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);


	}

	public function secretary()
	{
		$data = $this->engine->store_nav('site', 'Nothing', 'শিক্ষিত বেকার কেন্দ্রীয় সঞ্চয় ও ঋণদান সমবায় সমিতি');
		$data['social_media'] = $this->Common->get_data('media')->row();
		$where_data_br['status'] = 1;
		$data['ftchBrakingNws'] = $this->Common->get_data_multi_conditional_desc('tbl_breking_news', $where_data_br, 'id')->result();

		$data['abc'] = 'xyz';
		$data['vice_principle'] = $this->db->query("select * from secretary order by id desc")->result();

		$path = 'site/pages/secretary';
		$this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);


	}
	public function jointsecretary()
	{
		$data = $this->engine->store_nav('site', 'Nothing', 'শিক্ষিত বেকার কেন্দ্রীয় সঞ্চয় ও ঋণদান সমবায় সমিতি');
		$data['social_media'] = $this->Common->get_data('media')->row();
		$where_data_br['status'] = 1;
		$data['ftchBrakingNws'] = $this->Common->get_data_multi_conditional_desc('tbl_breking_news', $where_data_br, 'id')->result();

		$data['abc'] = 'xyz';
		$data['vice_principle'] = $this->db->query("select * from jointsecretary order by id desc")->result();

		$path = 'site/pages/jointsecretary';
		$this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);

	}

	public function notice_board()
	{
		$data = $this->engine->store_nav('site', 'Nothing', 'শিক্ষিত বেকার কেন্দ্রীয় সঞ্চয় ও ঋণদান সমবায় সমিতি');
		$data['social_media'] = $this->Common->get_data('media')->row();
		$where_data_br['status'] = 1;
		$data['ftchBrakingNws'] = $this->Common->get_data_multi_conditional_desc('tbl_breking_news', $where_data_br, 'id')->result();

		$where_notice['status'] = 1;
		$notices = $this->Common->get_data_multi_conditional_desc('notice_board', $where_notice, 'id');
		$links = array('next' => 'Next', 'prev' => 'Previous', 'first' => 'First', 'last' => 'Last');
		$this->pagination_bootstrap->set_links($links);

		$this->pagination_bootstrap->offset(10);
		$url = "Site/notice_board";
		$data['notice_boards'] = $this->pagination_bootstrap->config($url, $notices);
		$path = 'site/pages/notice_board';
		$this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);
	}

	public function notice_details($id)
	{
		$data = $this->engine->store_nav('site', 'Nothing', 'শিক্ষিত বেকার কেন্দ্রীয় সঞ্চয় ও ঋণদান সমবায় সমিতি');
		$data['social_media'] = $this->Common->get_data('media')->row();
		$data_where['id'] = $id;
		$data['row'] = $this->Common->get_data_multi_conditional('notice_board', $data_where)->row();
		$where_data_br['status'] = 1;
		$data['ftchBrakingNws'] = $this->Common->get_data_multi_conditional_desc('tbl_breking_news', $where_data_br, 'id')->result();

		$path = 'site/pages/notice_details';
		$this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);

	}

	public function aboutpresident($id)
	{
		$data = $this->engine->store_nav('site', 'Nothing', 'শিক্ষিত বেকার কেন্দ্রীয় সঞ্চয় ও ঋণদান সমবায় সমিতি');
		$data['social_media'] = $this->Common->get_data('media')->row();
		$data['ftchAboutMayor'] = $this->Common->get_data_single_conditional('president', 'id', $id)->row();
		$where_data_br['status'] = 1;
		$data['ftchBrakingNws'] = $this->Common->get_data_multi_conditional_desc('tbl_breking_news', $where_data_br, 'id')->result();

		$path = 'site/pages/about_mayor';
		$this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);
	}

	public function about_ceo($id)
	{
		$data = $this->engine->store_nav('site', 'Nothing', 'শিক্ষিত বেকার কেন্দ্রীয় সঞ্চয় ও ঋণদান সমবায় সমিতি');
		$data['social_media'] = $this->Common->get_data('media')->row();
		$data['ftchAboutCeo'] = $this->Common->get_data_single_conditional('ceo', 'id', $id)->row();
		$where_data_br['status'] = 1;
		$data['ftchBrakingNws'] = $this->Common->get_data_multi_conditional_desc('tbl_breking_news', $where_data_br, 'id')->result();

		$path = 'site/pages/about_ceo';
		$this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);

	}
	public function about_vice_president($id)
	{
		$data = $this->engine->store_nav('site', 'Nothing', 'শিক্ষিত বেকার কেন্দ্রীয় সঞ্চয় ও ঋণদান সমবায় সমিতি');
		$data['social_media'] = $this->Common->get_data('media')->row();
		$data['ftchAboutVicePresident'] = $this->Common->get_data_single_conditional('secretary', 'id', $id)->row();
		$where_data_br['status'] = 1;
		$data['ftchBrakingNws'] = $this->Common->get_data_multi_conditional_desc('tbl_breking_news', $where_data_br, 'id')->result();

		$path = 'site/pages/about_vice_president';
		$this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);

	}

	public function about_secr($id)
	{
		$data = $this->engine->store_nav('site', 'Nothing', 'শিক্ষিত বেকার কেন্দ্রীয় সঞ্চয় ও ঋণদান সমবায় সমিতি');
		$data['social_media'] = $this->Common->get_data('media')->row();
		$data['ftchAboutsecr'] = $this->Common->get_data_single_conditional('jointsecretary', 'id', $id)->row();
		$where_data_br['status'] = 1;
		$data['ftchBrakingNws'] = $this->Common->get_data_multi_conditional_desc('tbl_breking_news', $where_data_br, 'id')->result();

		$path = 'site/pages/about_secr';
		$this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);

	}

	public function gallery()
	{
		$data = $this->engine->store_nav('site', 'Nothing', 'শিক্ষিত বেকার কেন্দ্রীয় সঞ্চয় ও ঋণদান সমবায় সমিতি');
		$data['social_media'] = $this->Common->get_data('media')->row();
		$data['albums'] = $this->Common->get_data('gallery_album')->result();
		$where_data_br['status'] = 1;
		$data['ftchBrakingNws'] = $this->Common->get_data_multi_conditional_desc('tbl_breking_news', $where_data_br, 'id')->result();
		// $this->load->library('pagination');

		// $config = [
		// 		'base_url'      => base_url('Site/gallery'),
		// 		'per_page'      => 8,
		// 		'total_rows'    => $this->Common->count_all('gallery_photo'),
		// 		'full_tag_open' => "<ul class='pagination'>",
		// 		'full_tag_close'=> "</ul>",
		// 		'first_tag_open' => '<li>',
		// 		'first_tag_close' => '</li>',
		// 		'last_tag_open' => '<li>',
		// 		'last_tag_close' => '</li>',
		// 		'next_tag_open' => '<li>',
		// 		'next_tag_close' => '</li>',
		// 		'prev_tag_open' => '<li>',
		// 		'prev_tag_close' => '</li>',
		// 		'num_tag_open' => '<li>',
		// 		'num_tag_close' => '</li>',
		// 		'cur_tag_open'  => "<li class='active'><a>",
		// 		'cur_tag_close' => '</a></li>',
		// 	];
		// $this->pagination->initialize($config);

		// $data['gallery_photo'] = $this->Common->gallery_photo( $config['per_page'], $this->uri->segment(3) );

		$path = 'site/pages/gallery';
		$this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);

	}

	public function gallery_photo($gallery_album_id)
	{
		$data = $this->engine->store_nav('site', 'gallery', 'শিক্ষিত বেকার কেন্দ্রীয় সঞ্চয় ও ঋণদান সমবায় সমিতি');

		$where_data['gallery_album_id'] = $gallery_album_id;
		$where_data['status'] = 1;
		$data['result'] = $this->Common->get_data_multi_conditional_desc('gallery_photo', $where_data, 'id')->result();

		$path = 'site/pages/gallery_photo';
		$this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);
	}
	public function video()
	{
		$data = $this->engine->store_nav('site', 'Nothing', 'শিক্ষিত বেকার কেন্দ্রীয় সঞ্চয় ও ঋণদান সমবায় সমিতি');
		$data['social_media'] = $this->Common->get_data('media')->row();
		$where_data_br['status'] = 1;
		$data['ftchBrakingNws'] = $this->Common->get_data_multi_conditional_desc('tbl_breking_news', $where_data_br, 'id')->result();
		$videos = $this->Common->get_data('video');

		$links = array('next' => 'Next', 'prev' => 'Previous', 'first' => 'First', 'last' => 'Last');
		$this->pagination_bootstrap->set_links($links);

		$this->pagination_bootstrap->offset(8);
		$url = "Site/video";
		$data['videos'] = $this->pagination_bootstrap->config($url, $videos);

		$path = "site/pages/video";
		$this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);
	}
	public function all_breaking_news()
	{
		$data = $this->engine->store_nav('site', 'Nothing', 'শিক্ষিত বেকার কেন্দ্রীয় সঞ্চয় ও ঋণদান সমবায় সমিতি');
		$data['social_media'] = $this->Common->get_data('media')->row();
		$where_data_br['status'] = 1;
		$data['ftchBrakingNws'] = $this->Common->get_data_multi_conditional_desc('tbl_breking_news', $where_data_br, 'id')->result();

		$path = "site/pages/all_breaking_news";
		$this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);
	}
	public function breaking_news_details($id)
	{
		$data = $this->engine->store_nav('site', 'Nothing', 'শিক্ষিত বেকার কেন্দ্রীয় সঞ্চয় ও ঋণদান সমবায় সমিতি');
		$data['social_media'] = $this->Common->get_data('media')->row();
		$where_data_br['status'] = 1;
		$data['ftchBrakingNws'] = $this->Common->get_data_multi_conditional_desc('tbl_breking_news', $where_data_br, 'id')->result();
		$where_data['id'] = $id;
		$data['news'] = $this->Common->get_data_multi_conditional('tbl_breking_news', $where_data)->row();

		$path = "site/pages/breaking_news_details";
		$this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);
	}
	public function file_download($documents)
	{

		if (!empty($documents)) {
			$this->load->helper('download');
			$filepath = "assets/uploads/notice/" . $documents;
			$data = file_get_contents($filepath);
			$name = $documents;
			force_download($name, $data);
		}
	}

	public function history()
	{
		$data = $this->engine->store_nav('site', 'Nothing', 'সংগঠনের ইতিহাস');

		$path = "site/pages/history";
		$this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);
	}
	public function mission_vission()
	{
		$data = $this->engine->store_nav('site', 'Nothing', 'লক্ষ্য ও উদ্দেশ্য');

		$path = "site/pages/mission_vission";
		$this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);
	}
	public function executive_committee()
	{
		$data = $this->engine->store_nav('site', 'Nothing', 'ব্যবস্থাপনা কমিটি');

		$path = "site/pages/executive_committee";
		$this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);
	}
	public function organization_structure()
	{
		$data = $this->engine->store_nav('site', 'Nothing', 'সাংগঠনিক কাঠামো');

		$path = "site/pages/organization_structure";
		$this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);
	}
	public function previous_presidents()
	{
		$data = $this->engine->store_nav('site', 'Nothing', 'সাবেক সভাপতিগণ');

		$path = "site/pages/previous_presidents";
		$this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);
	}
	public function previous_presidents_details()
	{
		$data = $this->engine->store_nav('site', 'Nothing', 'সাবেক সভাপতিগণ');

		$path = "site/pages/previous_presidents_details";
		$this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);
	}
	public function previous_secretaries()
	{
		$data = $this->engine->store_nav('site', 'Nothing', 'সাবেক সম্পাদকগণ');

		$path = "site/pages/previous_secretaries";
		$this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);
	}
	public function previous_secretaries_details()
	{
		$data = $this->engine->store_nav('site', 'Nothing', 'সাবেক সম্পাদকগণ');

		$path = "site/pages/previous_secretaries_details";
		$this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);
	}
	public function current_projects()
	{
		$data = $this->engine->store_nav('site', 'Nothing', 'চলমান প্রকল্প');

		$path = "site/pages/current_projects";
		$this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);
	}
	public function current_projects_details()
	{
		$data = $this->engine->store_nav('site', 'Nothing', 'চলমান প্রকল্প');

		$path = "site/pages/current_projects_details";
		$this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);
	}
	public function all_devlopment_works()
	{
		$data = $this->engine->store_nav('site', 'Nothing', 'চলমান প্রকল্প');

		$path = "site/pages/all_devlopment_works";
		$this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);
	}
	public function devlopment_works()
	{
		$data = $this->engine->store_nav('site', 'Nothing', 'চলমান প্রকল্প');

		$path = "site/pages/devlopment_works";
		$this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);
	}
	public function devlopment_works_details()
	{
		$data = $this->engine->store_nav('site', 'Nothing', 'চলমান প্রকল্প');

		$path = "site/pages/devlopment_works_details";
		$this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);
	}
	public function women_devlopment_works()
	{
		$data = $this->engine->store_nav('site', 'Nothing', 'চলমান প্রকল্প');

		$path = "site/pages/women_devlopment_works";
		$this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);
	}
	public function women_devlopment_works_details()
	{
		$data = $this->engine->store_nav('site', 'Nothing', 'চলমান প্রকল্প');

		$path = "site/pages/women_devlopment_works_details";
		$this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);
	}






	// // ---------------------Delete single members-----------------

	// public function delete_member($id)
	// {
	// 	$this->Common->delete_data('members_n', 'id', $id);
	// 	redirect('members');
	// }
































	// public function member_application_save()
	// // {
	// // 	$current_time = get_current_time();
	// // 	$reg_no = $this->input->post('branch_registration_no');

	// // 	// $where_data_m['m_b_registration_no'] = $reg_no;
	// // 	// $where_data_m['m_status!='] = -100;
	// // 	// $select='m_nid,m_candidate_id';
	// // 	// $check_member = $this->Common->get_data_multi_conditional_sum('member', $select, $where_data_m)->row();
	// // 	// if(!empty($check_member)) {
	// // 	// 	$where_data_m['m_candidate_id'] = $check_member->m_candidate_id;
	// // 	// 	$where_data_m['m_status>='] = -10;
	// // 	// 	$where_data_m['m_status<='] = 101;
	// // 	// 	$select_m='m_candidate_id';
	// // 	// 	$check_member = $this->Common->get_data_multi_conditional_sum('member', $select_m, $where_data_m)->row();
	// // 	// 	if(!empty($check_member)) {

	// // 	// 		$this->session->set_flashdata('success', '<div class="alert alert-danger alert-dismissible">
	// // 	// 		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	// // 	// 		<h5><i class="icon fas fa-check"></i> Alert!</h5>
	// // 	// 		দুঃখিত, পূর্বে সদস্য হওয়ায় নতুন করে সদস্য করা সম্ভব হচ্ছে না। 
	// // 	// 		</div>');

	// // 	// 		redirect('member_registration');
	// // 	// 	}
	// // 	// }


	// // 	$image_path = 'assets/uploads/project/members/user_image/';

	// // 	$preFileName = time();
	// // 	$nomini_sign = $this->do_upload('nomini_sign', $preFileName, $image_path);
	// // 	$logo = $this->do_upload('logo', $preFileName, $image_path);
	// // 	$document_1 = $this->do_upload('document_1', $preFileName, $image_path);
	// // 	$random_number = 'bjsu-'.time();
	// // 	$data_insert_member_table = array(
	// // 		'm_subscription_fee' => 1000,
	// // 		'm_admission_fee' => 2000,
	// // 		'm_status' => -1,
	// // 		'm_voucher_no' => $random_number,
	// // 		'm_sarok_no' => $this->input->post('sarok_no'),
	// // 		'm_sarok_date' => $this->input->post('sarok_date'),
	// // 		'm_name' => $this->input->post('name'),
	// // 		'm_father_name' => $this->input->post('father_name'),
	// // 		'm_mother_name' => $this->input->post('mother_name'),
	// // 		'm_nid' => $this->input->post('nid'),
	// // 		'm_birth_date' => $this->input->post('birth_date'),
	// // 		'm_mobile' => $this->input->post('mobile_number'),
	// // 		'm_gender' => $this->input->post('gender'),
	// // 		'm_village' => $this->input->post('village'),
	// // 		'm_post' => $this->input->post('post'),
	// // 		'm_upzilla' => $this->input->post('sub_district'),
	// // 		'm_zilla' => $this->input->post('district'),
	// // 		'm_b_work_designation' => $this->input->post('branch_designation'),
	// // 		'm_b_work_district' => $this->input->post('branch_district'),
	// // 		'm_b_work_name' => $this->input->post('branch_work_name'),
	// // 		'm_paid_amount' => $this->input->post('paid_amount'),
	// // 		'm_txd_id' => $this->input->post('voucher_no'),
	// // 		'm_mc_date' => $this->input->post('managing_committee_date'),
	// // 		'm_b_name' => $this->input->post('branch_name'),
	// // 		'm_b_mobile_number' => $this->input->post('branch_mobile_number'),
	// // 		'm_b_registration_address' => $this->input->post('branch_registration_address'),
	// // 		'm_b_address' => $this->input->post('branch_address'),
	// // 		'm_b_chairman' => $this->input->post('branch_chairman'),
	// // 		'm_b_secretary' => $this->input->post('branch_secretary'),
	// // 		'm_b_registration_no' => $this->input->post('branch_registration_no'),
	// // 		'm_b_registration_date' => $this->input->post('branch_registration_date'),
	// // 		'm_b_class' => $this->input->post('branch_class'),
	// // 		'm_b_type' => $this->input->post('branch_type'),
	// // 		'm_b_member' => $this->input->post('branch_member'),
	// // 		'm_b_working_area' => $this->input->post('branch_working_area'),
	// // 		'm_nomini_name' => $this->input->post('nomini_name'),
	// // 		'm_nomini_designation' => $this->input->post('nomini_designation'),
	// // 		'm_nomini_mobile_no' => $this->input->post('nomini_mobile_no'),
	// // 		'm_nomini_date' => $this->input->post('nomini_date'),
	// // 		'm_nomini_sign' => $nomini_sign,
	// // 		'm_logo' => $logo,
	// // 		'm_document' => $document_1,
	// // 		'm_application_at' => $current_time,
	// // 	);
	// // 	$member_last_insert_id = $this->Common->set_data($table, $data_insert_member_table);
	// // 	//			member table end

	// // 	$index_field_name = 'm_id';
	// // 	$m_candidate_id = '100000' . $member_last_insert_id; //online(11)/offline(10)+Branch code+primary key
	// // 	$data_update_member_table = array(
	// // 		'm_identification' => $m_candidate_id,
	// // 	);
	// // 	$member_update = $this->Common->update_data($table, $index_field_name, $member_last_insert_id, $data_update_member_table);

	// // 	$data_insert_member_subscription_table = array(
	// // 		'ms_m_identification' => $m_candidate_id,
	// // 		'ms_amount' => 1000,
	// // 		'ms_created_by' => $authorityId,
	// // 		'ms_created_at' => $current_time,
	// // 		'ms_status' => -1,
	// // 		'ms_updated_at' => $current_time,
	// // 		'ms_voucher_no' => $random_number,
	// // 	);
	// // 	$table = 'member_subscription';
	// // 	$member_subscription_table_id = $this->Common->set_data($table, $data_insert_member_subscription_table);
	// // 	$ms_identification = '100000' . $member_subscription_table_id;
	// // 	$shareUpdate = array('ms_identification' => $ms_identification);
	// // 	$index = 'ms_id';
	// // 	$member_share_update = $this->Common->update_data($table, $index, $member_subscription_table_id, $shareUpdate);


	// // 	$data = array(
	// // 		'success' => '<div class="alert alert-success alert-dismissible">
	// //               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	// //               <h5><i class="icon fas fa-check"></i> Alert!</h5>
	// //               Success. Data has been insert successfully.
	// //             </div>'
	// // 	);
	// // 	redirect('mem_application');
	// // }
	// public function do_upload($file, $preFileName, $file_path)
	// {
	// 	$config['upload_path'] = $file_path;
	// 	$config['allowed_types'] = 'pdf|jpeg|gif|jpg|png';
	// 	$config['file_name'] = $preFileName . '_' . $file;

	// 	if (!compact($this->upload)) {
	// 		$this->load->library('upload', $config);
	// 	}

	// 	$this->upload->initialize($config);

	// 	if (!$this->upload->do_upload($file)) {
	// 		return '';
	// 	} else {
	// 		$upload_data = $this->upload->data();
	// 		return $upload_data['file_name'];
	// 	}
	// }


}