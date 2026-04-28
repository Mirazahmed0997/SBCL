<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Site/index';
$route['home'] = 'Site/index';
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
$route['view_member/(:num)'] = 'Admin/view_member/$1';
// $route['edit_member/(:num)'] = 'Admin/edit_member/$1';
$route['delete_member/(:num)'] = 'Admin/delete_member/$1';
$route['members_account_details_admin'] = 'Admin/members_account';



// --------------for user home page view ----------------------

$route['view_all_news'] = 'View_content_controller/view_news';
$route['company_details'] = 'View_content_controller/details_description';
$route['news_details/(:num)'] = 'View_content_controller/news_details/$1';
$route['notice_details/(:num)'] = 'View_content_controller/notice_details/$1';
$route['management_details/(:num)'] = 'View_content_controller/management_details/$1';
$route['all_managment'] = 'View_content_controller/all_managment';
$route['all_products'] = 'Site/all_products';



$route['checkout'] = 'Site/checkout';






// -----------------------News managment------------------------

// -----------------------news for Admin view---------------
$route['news_list'] = 'News_notice_management/news_list';
$route['update_news_status/(:num)'] = 'News_notice_management/news_active_status/$1';
$route['delete_news/(:num)'] = 'News_notice_management/delete_news/$1';

// -----------------------notice for Admin view---------------

$route['notice_list'] = 'News_notice_management/notice_list';
$route['update_notice_status/(:num)'] = 'News_notice_management/notice_active_status/$1';
$route['delete_notice/(:num)'] = 'News_notice_management/delete_notice/$1';


// ---------------------Slider managment----------------------


$route['slider_list'] = 'Home_Page_managment_controller/slider_list';
$route['update_slider_status/(:num)'] = 'Home_Page_managment_controller/slider_active_status/$1';
$route['delete_slider/(:num)'] = 'Home_Page_managment_controller/delete_slider/$1';

// -----------------------------managment list-----------------------

$route['managment_list'] = 'Home_Page_managment_controller/managment_list';
$route['delete_info/(:num)'] = 'Home_Page_managment_controller/delete_info/$1';




// --------------------------banner list----------------------------
$route['banner_list'] = 'Home_Page_managment_controller/banner_list';
// $route['update_banner/(:num)'] = 'home_Page_managment_controller/banner_list/$1';
$route['delete_banner/(:num)'] = 'Home_Page_managment_controller/delete_banner/$1';



// -----------------achievements_list------------------
$route['achievements_list'] = 'Home_Page_managment_controller/achievements_list';
$route['delete_achievement/(:num)'] = 'Home_Page_managment_controller/delete_achievement/$1';
$route['achievement_active_status/(:num)'] = 'Home_Page_managment_controller/achievement_active_status/$1';


// ------------------------gallary list----------------------------

$route['image_gallery_list'] = 'Gallary_controller/image_gallery_list';
$route['all_images'] = 'Gallary_controller/all_images';
$route['image_active_status/(:num)'] = 'Gallary_controller/image_active_status/$1';
$route['delete_image/(:num)'] = 'Gallary_controller/delete_image/$1';


// --------------------------------------------------
$route['ica_member'] = 'View_content_controller/ica/$1';




// -------------------------Cart---------------------------------
$route['add_to_cart/(:num)'] = 'Cart_controller/add/$1';
$route['update_cart_quantity/(:num)'] = 'Cart_controller/update_cart_quantity/$1';
$route['remove_cart_item/(:num)'] = 'Cart_controller/remove_cart_item/$1';
$route['clear_cart'] = 'Cart_controller/clear_cart';
$route['my_carts'] = 'Cart_controller/my_carts';


// ------------------- order  ------------------
$route['place_order'] = 'Order_controller/place_order';

// -----------------------------Admin projects list------------------------
$route['projects_list'] = 'Home_Page_managment_controller/projects_list';
$route['delete_project/(:num)'] = 'Home_Page_managment_controller/delete_project/$1';
$route['projects_active_status/(:num)'] = 'Home_Page_managment_controller/projects_active_status/$1';
$route['project_details/(:num)'] = 'View_content_controller/project_details/$1';


$route['admin_orders_table'] = 'Admin/admin_orders_table';
$route['admin_order_details/(:num)'] = 'Admin/order_details/$1';
$route['order_status/(:num)'] = 'Admin/order_status/$1';







// --------------------Member Registration----------------------


$route['member_registration'] = 'Site/member_application';
$route['member_register'] = 'Site/member_application_save';
$route['member_login'] = 'Member_login/index';
$route['members_login'] = 'Member_login/login_process';
$route['member_logout'] = 'Member_login/logout';
$route['change_password/(:num)'] = 'Member_login/change_password/$1';
$route['member_logout'] = 'Member_login/logout';





// --------------------Member dashboard----------------------

$route['applicant_dashboard'] = 'Applicant/members_count';
$route['members'] = 'Applicant/members_list';
$route['single_member/(:num)'] = 'Applicant/view_member/$1';
$route['edit_member/(:num)'] = 'Applicant/edit_member/$1';
// $route['delete_member/(:num)'] = 'Applicant/delete_member/$1';
$route['members_account_details'] = 'Applicant/members_account';
$route['update_member/(:num)'] = 'Site/update_member/$1';


$route['my_orders'] = 'Applicant/my_orders';
$route['order_details/(:num)'] = 'Applicant/order_details/$1';


// ---------------------products managment details-------------------

$route['create_category_form'] = 'Products_controller/create_category_form';
$route['create_category'] = 'Products_controller/create_category';
$route['category_list'] = 'Products_controller/category_list';
$route['product_create_form'] = 'Products_controller/create_product_form';
$route['create_product'] = 'Products_controller/create_product';
$route['product_list'] = 'Products_controller/product_list';
$route['product_edit_form/(:num)'] = 'Products_controller/edit_product/$1';
$route['update_product/(:num)'] = 'Products_controller/update_product/$1';
$route['delete_product/(:num)'] = 'Products_controller/delete_product/$1';
$route['product_active_status/(:num)'] = 'Products_controller/product_active_status/$1';
$route['update_product_images/(:num)'] = 'Products_controller/update_product_images/$1';










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


