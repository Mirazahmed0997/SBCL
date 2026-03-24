<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Site/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;





// --------------------Admin Registration----------------------

$route['admin'] = 'Admin_login/index';
$route['admin_registration_form'] = 'Admin_login/admin_registration';
$route['admin_registration'] = 'Admin_login/admin_registration_saved';
$route['update_user_role/(:num)'] = 'Admin/update_users_role/$1';
$route['logout'] = 'Admin_login/logout';




// --------------------Admin dashboard-------------------------

$route['admin_dashboard'] = 'Admin/index';
$route['members_list'] = 'Admin/members_list/members_list';
$route['view_member/(:id)'] = 'Admin/view_member/$1';
$route['edit_member/(:id)'] = 'Admin/edit_member/$1';
$route['delete_member/(:id)'] = 'Admin/delete_member/$1';
$route['members_account_details_admin'] = 'Admin/members_account';








// --------------------Member Registration----------------------


$route['member_registration'] = 'Site/member_application';
$route['member_register'] = 'Site/member_application_save';
$route['member_login'] = 'Member_login/index';
$route['member_logout'] = 'Member_login/logout';

// $route['applicant_login'] = 'Member_login/index';




// --------------------Member dashboard----------------------

$route['applicant_dashboard'] = 'Applicant/members_count';
$route['members'] = 'Applicant/members_list/members_list';
$route['view_member/(:id)'] = 'Applicant/view_member/$1';
$route['edit_member/(:id)'] = 'Applicant/edit_member/$1';
$route['delete_member/(:id)'] = 'Applicant/delete_member/$1';
$route['members_account_details'] = 'Applicant/members_account';

$route['update_member/(:id)'] = 'Site/update_member/$1';














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


