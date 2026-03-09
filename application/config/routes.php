<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Site/index';
$route['admin'] = 'Login/index';
$route['applicant_login'] = 'Recruitment/login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['admin_dashboard'] = 'Admin/index';
$route['applicant_dashboard'] = 'Applicant/index';
$route['applicant_cv'] = 'Applicant/applicant_cv_view';
$route['member_registration'] = 'Site/member_application';
$route['member_register'] = 'Site/member_application_save';
$route['org_history'] = 'Site/history';
$route['org_mission'] = 'Site/mission_vission';
$route['exi_committee'] = 'Site/executive_committee';
$route['committee_mem_details'] = 'Site/committee_member_details';
$route['org_structure'] = 'Site/organization_structure';
$route['ex_presidents'] = 'Site/previous_presidents';
$route['ex_presidents_details'] = 'Site/previous_presidents_details';
$route['ex_secretaries'] = 'Site/previous_secretaries';
$route['ex_secretaries_details'] = 'Site/previous_secretaries_details';
$route['crnt_projects'] = 'Site/current_projects';
$route['crnt_projects_details'] = 'Site/current_projects_details';
$route['all_dev_works'] = 'Site/all_devlopment_works';
$route['dev_works'] = 'Site/devlopment_works';
$route['dev_works_details'] = 'Site/devlopment_works_details';
$route['omen_dev_works'] = 'Site/women_devlopment_works';
$route['omen_dev_works_details'] = 'Site/women_devlopment_works_details';


$route['logout'] = 'Login/authority';
$route['applicant_logout'] = 'Login/applicant_logout';
