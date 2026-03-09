<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Applicant extends CI_Controller {

    private $main_layout = 'applicant/master_layout';
    private $side_menu = 'applicant/side_menu';
	private $serverDateTime = '';
    public function __construct()
    {
        parent::__construct();
		$date = new DateTime();
		$this->serverDateTime = $date->format('Y-m-d H:i') . "\n";
        if ($this->session->userdata('current_type') == 2) {
        } else {
            $this->session->set_flashdata('login_failed', 'Link is broken');
            redirect('applicant_login');
        }
    }

    public function index()
    {
        $data = $this->engine->store_nav('Nothing', 'Nothing', 'শিক্ষিত বেকার কেন্দ্রীয় সঞ্চয় ও ঋণদান সমবায় সমিতি');
		
        $login_user_info_all = $this->session->userdata('login_user_info_all');
		
		$where_data['applicant.ap_r_candidate_id'] = $login_user_info_all->r_candidate_id;
		$data['applied_list'] = $this->Common->get_data_applicant_list($where_data)->result();
        $path = 'applicant/dashboard';
        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
    }
    public function applicant_cv_view()
    {
        $data = $this->engine->store_nav('applicant_cv', 'applicant_cv_view', 'শিক্ষিত বেকার কেন্দ্রীয় সঞ্চয় ও ঋণদান সমবায় সমিতি');
        $login_user_info_all = $this->session->userdata('login_user_info_all');

		$where_data['r_status'] = 1;
		$where_data['r_candidate_id'] = $login_user_info_all->r_candidate_id;

		$data['applicant_info'] = $this->Common->get_data_multi_conditional('register',$where_data)->row();

        $path = 'applicant/applicant_cv_view';
        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
    }
    public function applicant_cv_edit()
    {
        $data = $this->engine->store_nav('applicant_cv', 'applicant_cv_view', 'শিক্ষিত বেকার কেন্দ্রীয় সঞ্চয় ও ঋণদান সমবায় সমিতি');
        $r_candidate_id = $this->input->post('r_candidate_id');
        
		$where_data['r_status'] = 1;
		$where_data['r_candidate_id'] = $r_candidate_id;

		$data['applicant_info'] = $this->Common->get_data_multi_conditional('register',$where_data)->row();
        $path = 'applicant/applicant_cv_edit';
        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
    }
    
    public function applicant_cv_update()
    {
        $authenticationData = array(
			'a_credential' => $this->input->post('primary_mobile'),
		);
        $a_id = $this->input->post('r_a_id');
		$authId = $this->Common->update_data('authority','a_id',$a_id, $authenticationData);
		
		if (!empty($_FILES['applicant_image']['name'])) {
			$file_path_user_image = 'assets/uploads/applicant/';
			$preFileName = time();
			$applicant_image = $this->do_upload('applicant_image', $preFileName, $file_path_user_image);
            
            $where_data_edit['r_candidate_id'] = $this->input->post('r_candidate_id');
            $image_data = $this->Common->get_data_multi_conditional('register',$where_data_edit)->row();
            if(file_exists($file_path_user_image.$image_data->r_image)) {
                unlink($file_path_user_image.$image_data->r_image);
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
		$registration_id = $this->Common->update_data($table,'r_candidate_id', $r_candidate_id, $updateData);

        $pre_ae_id = $this->input->post('ae_id');
        if(!empty($pre_ae_id)) {
            $delete_arr = array();
            foreach ($pre_ae_id as $pkey => $pvalue) {
                $delete_arr[] = array('id' => $pvalue,);
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
        if(!empty($pre_at_id)) {
            $delete_arr_at = array();
            foreach ($pre_at_id as $pkey => $pvalue) {
                $delete_arr_at[] = array('id' => $pvalue,);
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
        if(!empty($training_name)) {
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
        if(!empty($pre_ac_id)) {
            $delete_arr_ac = array();
            foreach ($pre_ac_id as $pkey => $pvalue) {
                $delete_arr_ac[] = array('id' => $pvalue,);
            }
            $this->Common->delete_batch('applicant_certification', 'ac_id', $delete_arr_ac);    

        }
        $certification_name = $this->input->post('certification_name');
        $certification_institution = $this->input->post('certification_institution');
        $certification_institution_address = $this->input->post('certification_institution_address');
        $certification_duration_start = $this->input->post('certification_duration_start');
        $certification_duration_end = $this->input->post('certification_duration_end');
        $data2 = array();
        if(!empty($certification_name)) {
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
        if(!empty($pre_aeh_id)) {
            $delete_arr_aeh = array();
            foreach ($pre_aeh_id as $pkey => $pvalue) {
                $delete_arr_aeh[] = array('id' => $pvalue,);
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
        if(!empty($company_name)) {
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
        if(!empty($pre_ar_id)) {
            $delete_arr_ar = array();
            foreach ($pre_ar_id as $pkey => $pvalue) {
                $delete_arr_ar[] = array('id' => $pvalue,);
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
		if(!empty($reference_name)) {
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
        if(!empty($pre_al_id)) {
            $delete_arr_al = array();
            foreach ($pre_al_id as $pkey => $pvalue) {
                $delete_arr_al[] = array('id' => $pvalue,);
            }
            $this->Common->delete_batch('applicant_language', 'al_id', $delete_arr_al);    

        }
		$language_name = $this->input->post('language_name');
		$reading_skill = $this->input->post('reading_skill');
		$wirting_skill = $this->input->post('wirting_skill');
		$speaking_skill = $this->input->post('speaking_skill');
		$data5 = array();
		if(!empty($language_name)) {
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
        if(!empty($pre_as_id)) {
            $delete_arr_as = array();
            foreach ($pre_as_id as $pkey => $pvalue) {
                $delete_arr_as[] = array('id' => $pvalue,);
            }
            $this->Common->delete_batch('applicant_skill', 'as_id', $delete_arr_as);
        }
		
		$skill_name = $this->input->post('skill_name');
		$duration = $this->input->post('duration');
		$data6 = array();
		if(!empty($skill_name)) {
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
		Success. CV has been updated successfully.
	  	</div>');
		redirect('Applicant/applicant_cv_view');
    }
    
    public function applied_list()
    {
        $data = $this->engine->store_nav('applicant', 'applied_list', 'আবেদনকৃত তালিকা ');
        $login_user_info_all = $this->session->userdata('login_user_info_all');
		
		$where_data['applicant.ap_r_candidate_id'] = $login_user_info_all->r_candidate_id;
		$data['applied_list'] = $this->Common->get_data_applicant_list($where_data)->result();

        $path = 'applicant/applied_list';
        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
    }
    
    public function applied_details()
    {
        $data = $this->engine->store_nav('applicant', 'applied_list', 'আবেদনকৃত তালিকা ');
		$ap_id = $this->input->post('ap_id');
		$ap_status = $this->input->post('ap_status');

		// $where_data['applicant.ap_status'] = $ap_status;
		$where_data['applicant.ap_id'] = $ap_id;
		$data['applied_details'] = $this->Common->get_data_applicant_list($where_data)->row();
        
        $path = 'applicant/applied_details';
        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
    }
    
	public function password_setting() {
        $data = $this->engine->store_nav('password_setting', 'password_setting', 'চান্দ্রা শিক্ষিত বেকার যুব বহুমূখী সমবায় সমিতি লিঃ');

        $path = 'Applicant/password_setting';
        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);


	}
	
    public function do_upload($file, $preFileName, $file_path)
	{
		//		return 'demo.jpg';
		$config['upload_path'] = $file_path;
		$config['allowed_types'] = 'pdf|gif|jpg|png';
		// $config['max_size'] = 1024000;
		// $config['max_width'] = 2500;
		// $config['max_height'] = 2500;
		$config['file_name'] = $preFileName . '_' . $file;
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload($file)) {
			$error = array('error' => $this->upload->display_errors());
			$fileName = '';
			echo $error['error'];
		} else {
			$upload_data = $this->upload->data();
			$fileName = $upload_data['file_name'];
		}
		return $fileName;
	} 
}