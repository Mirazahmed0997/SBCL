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



// --------------for user home page view ----------------------

$route['view_all_news'] = 'View_content_controller/view_news';
$route['company_details'] = 'View_content_controller/details_description';
$route['news_details/(:num)'] = 'View_content_controller/news_details/$1';
$route['notice_details/(:num)'] = 'View_content_controller/notice_details/$1';
$route['management_details/(:num)'] = 'View_content_controller/mamagement_details/$1';



// -----------------------News managment------------------------

// -----------------------news for Admin view---------------
$route['news_list'] = 'news_notice_management/news_list';
$route['update_news_status/(:num)'] = 'news_notice_management/news_active_status/$1';
$route['delete_news/(:num)'] = 'news_notice_management/delete_news/$1';

// -----------------------notice for Admin view---------------

$route['notice_list'] = 'news_notice_management/notice_list';
$route['update_notice_status/(:num)'] = 'news_notice_management/notice_active_status/$1';
$route['delete_notice/(:num)'] = 'news_notice_management/delete_notice/$1';


// ---------------------Slider managment----------------------


$route['slider_list'] = 'home_Page_managment_controller/slider_list';
$route['update_slider_status/(:num)'] = 'home_Page_managment_controller/slider_active_status/$1';
$route['delete_slider/(:num)'] = 'home_Page_managment_controller/delete_slider/$1';

// -----------------------------managment list-----------------------

$route['managment_list'] = 'home_Page_managment_controller/managment_list';
$route['delete_info/(:num)'] = 'home_Page_managment_controller/delete_info/$1';



// --------------------------banner list----------------------------
$route['banner_list'] = 'home_Page_managment_controller/banner_list';
// $route['update_banner/(:num)'] = 'home_Page_managment_controller/banner_list/$1';
$route['delete_banner/(:num)'] = 'home_Page_managment_controller/delete_banner/$1';





// --------------------Member Registration----------------------


$route['member_registration'] = 'Site/member_application';
$route['member_register'] = 'Site/member_application_save';
$route['member_login'] = 'Member_login/index';
$route['member_logout'] = 'Member_login/logout';
$route['change_password/(:id)'] = 'Member_login/change_password/$1';




// --------------------Member dashboard----------------------

$route['applicant_dashboard'] = 'Applicant/members_count';
$route['members'] = 'Applicant/members_list/members_list';
$route['view_member/(:id)'] = 'Applicant/view_member/$1';
$route['edit_member/(:id)'] = 'Applicant/edit_member/$1';
$route['delete_member/(:id)'] = 'Applicant/delete_member/$1';
$route['members_account_details'] = 'Applicant/members_account';
$route['update_member/(:id)'] = 'Site/update_member/$1';


// ---------------------managment details-------------------

// $route['management_details'] = 'Applicant/members_account';










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


