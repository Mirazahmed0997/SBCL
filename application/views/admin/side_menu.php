<style>
    [class*=sidebar-dark-] {
        background-image: linear-gradient(
            to bottom,      /* Direction: top to bottom */
            #000080,        /* Color 1: Navy Blue (starts at 0%) */
            #0000CD,        /* Color 2: Medium Blue (starts by default at 50%) */
            #4169E1          /* Color 3: Royal Blue (ends at 100%) */
        );
    }
</style>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">

        <span class="brand-text font-weight-light">Admin</span>
    </a>

	<?php $login_user_info_all = $this->session->userdata('login_user_info_all'); ?>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo base_url('assets/backend/dist/img/user.jpg'); ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Admin</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
					 with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="<?php echo base_url('admin_dashboard') ?>" class="nav-link <?= active_nav('dashboard', $main_nav); ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <!--								<i class="right fas fa-angle-left"></i>-->
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview <?= active_open('homepage', $main_nav); ?>">
                    <a href="#" class="nav-link <?= active_nav('homepage', $main_nav); ?>">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            হোমপেজ
                            <i class="fas fa-angle-left right"></i>
                            
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <!-- <li class="nav-item">
                            <a href="<?php echo base_url('Admin/president_list') ?>" class="nav-link <?= active_nav('president_list', $sub_nav); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>সভাপতি গনের তালিকা</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Admin/secretary_list') ?>" class="nav-link <?= active_nav('secretary_list', $sub_nav); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>সহ-সভাপতি গনের তালিকা </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Admin/jointsecretary_list') ?>" class="nav-link <?= active_nav('jointsecretary_list', $sub_nav); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>সম্পাদক গনের তালিকা </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Admin/ceo_list') ?>" class="nav-link <?= active_nav('ceo_list', $sub_nav); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>প্রধান নির্বাহী কর্মকর্তাগনের তালিকা</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Admin/prize') ?>" class="nav-link <?= active_nav('prize', $sub_nav); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>জাতীয় পুরস্কার গ্রহণ</p>
                            </a>
                        </li> -->
                        <!-- <li class="nav-item">
                            <a href="<?php echo base_url('Admin/presidentpic') ?>" class="nav-link <?= active_nav('presidentpic', $sub_nav); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>সভাপতির ছবি</p>
                            </a>
                        </li> -->
                        <!-- <li class="nav-item">
                            <a href="<?php echo base_url('Admin/joinsecretarypic') ?>" class="nav-link <?= active_nav('joinsecretarypic', $sub_nav); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>প্রধান নির্বাহী কর্মকর্তা</p>
                            </a>
                        </li> -->
                        <!-- <li class="nav-item">
                            <a href="<?php echo base_url('Admin/secretarypic') ?>" class="nav-link <?= active_nav('secretarypic', $sub_nav); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>সম্পাদকের ছবি</p>
                            </a>
                        </li> -->
                        <!-- <li class="nav-item">
                            <a href="<?php echo base_url('Admin/video') ?>" class="nav-link <?= active_nav('video', $sub_nav); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ভিডিও</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Admin/media') ?>" class="nav-link <?= active_nav('media', $sub_nav); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>মিডিয়া লিংক</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Admin/logo') ?>" class="nav-link <?= active_nav('logo', $sub_nav); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ওয়েভ লোগো </p>
                            </a>
                        </li> -->
                        
                    </ul>
                </li>
                <li class="nav-item has-treeview <?= active_open('site', $main_nav); ?>">
                    <a href="#" class="nav-link <?= active_nav('site', $main_nav); ?>">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            সাইট পরিচালনা
                            <i class="fas fa-angle-left right"></i>
                            
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url('Admin/weblogo') ?>" class="nav-link <?= active_nav('weblogo', $sub_nav); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Header</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Admin/slider') ?>" class="nav-link <?= active_nav('slider', $sub_nav); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Slider </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Admin/webpages') ?>" class="nav-link <?= active_nav('webpages', $sub_nav); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Menu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Admin/notice_board') ?>" class="nav-link <?= active_nav('notice_board', $sub_nav); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Notice Board</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Admin/gallery') ?>" class="nav-link <?= active_nav('gallery', $sub_nav); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Gallery</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Admin/breaking_news') ?>" class="nav-link <?= active_nav('breaking_news', $sub_nav); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Breaking News</p>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="<?php echo base_url('Admin/about_president') ?>" class="nav-link <?= active_nav('about_president', $sub_nav); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>সভাপতি</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Admin/about_ceo') ?>" class="nav-link <?= active_nav('about_ceo', $sub_nav); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>প্রধান নির্বাহী কর্মকর্তা</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Admin/about_secretary') ?>" class="nav-link <?= active_nav('about_secretary', $sub_nav); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>সম্পাদক</p>
                            </a>
                        </li> -->
                    </ul>
                </li>
                <!-- <li class="nav-item has-treeview <?= active_open('manage_page', $main_nav); ?>">
                    <a href="#" class="nav-link <?= active_nav('manage_page', $main_nav); ?>">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Manage Page
                            <i class="fas fa-angle-left right"></i>
                            
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url('Admin/page7') ?>" class="nav-link <?= active_nav('page7', $sub_nav); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>সাংগঠনিক উৎপত্তি ও পরিচিত</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Admin/page1') ?>" class="nav-link <?= active_nav('page1', $sub_nav); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>সমিতির উদ্দেশ্য ও মুল কার্যক্রম</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Admin/page2') ?>" class="nav-link <?= active_nav('page2', $sub_nav); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>সহযোগী প্রতিষ্ঠান </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Admin/page3') ?>" class="nav-link <?= active_nav('page3', $sub_nav); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ব্যবস্থাপনা পদ্ধতি</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Admin/page4') ?>" class="nav-link <?= active_nav('page4', $sub_nav); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>সামাজিক কর্মকাণ্ডের চিত্র</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Admin/page5') ?>" class="nav-link <?= active_nav('page5', $sub_nav); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>কর্মকর্তা-কর্মচারী নিয়োগ</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Admin/page6') ?>" class="nav-link <?= active_nav('page6', $sub_nav); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>সংগঠন পরিচালনা পদ্ধতি</p>
                            </a>
                        </li>
                        
                    </ul>
                </li> -->
                <li class="nav-item has-treeview <?= active_open('setting', $main_nav); ?>">
                    <a href="#" class="nav-link <?= active_nav('setting', $main_nav); ?>">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            সেটিংস
                            <i class="fas fa-angle-left right"></i>
                            
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url('Admin/general_setting') ?>" class="nav-link <?= active_nav('general_setting', $sub_nav); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>General Settings</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Admin/password_setting') ?>" class="nav-link <?= active_nav('password_setting', $sub_nav); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Password Settings</p>
                            </a>
                        </li>
                        
                    </ul>
                </li>
                <!-- job portal  -->
                <br>
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link <?= active_nav('dashboard', $main_nav); ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            সদস্য তথ্য
                            <!--								<i class="right fas fa-angle-left"></i>-->
                        </p>
                    </a>
                </li>
                <!-- <li class="nav-item has-treeview menu-open">
                    <a href="<?php echo base_url('Admin/registered_user_list') ?>" class="nav-link <?= active_nav('user_list', $main_nav); ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            রেজিস্টার্ড ইউজার তালিকা
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview <?= active_open('recruitment_committee', $main_nav); ?>">
                    <a href="#" class="nav-link <?= active_nav('recruitment_committee', $main_nav); ?>">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            নিয়োগ কমিটি
                            <i class="fas fa-angle-left right"></i>
                            
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url('Admin/recruitment_committee_create') ?>" class="nav-link <?= active_nav('recruitment_committee_create', $sub_nav); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>নিয়োগ কমিটি তৈরি</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Admin/recruitment_committee_list') ?>" class="nav-link <?= active_nav('recruitment_committee_list', $sub_nav); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>নিয়োগ কমিটি তালিকা </p>
                            </a>
                        </li>
                        
                    </ul>
                </li>
                <li class="nav-item has-treeview <?= active_open('recruitment', $main_nav); ?>">
                    <a href="#" class="nav-link <?= active_nav('recruitment', $main_nav); ?>">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            নিয়োগ
                            <i class="fas fa-angle-left right"></i>
                            
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url('Admin/recruitment_create') ?>" class="nav-link <?= active_nav('recruitment_create', $sub_nav); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>নিয়োগ বিজ্ঞপ্তি তৈরি</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Admin/recruitment_list') ?>" class="nav-link <?= active_nav('recruitment_list', $sub_nav); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>নিয়োগ বিজ্ঞপ্তি তালিকা </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Admin/designation') ?>" class="nav-link <?= active_nav('designation', $sub_nav); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>পদবী </p>
                            </a>
                        </li>
                        
                    </ul>
                </li> -->
                <li class="nav-item has-treeview <?= active_open('applicant', $main_nav); ?>">
                    <a href="#" class="nav-link <?= active_nav('applicant', $main_nav); ?>">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            আবেদন
                            <i class="fas fa-angle-left right"></i>
                            <!-- </?php
                                $data['ap_status'] = -1;
                                $table="applicant";
                                $pending_number_ap = count_pending($table, $data);
                                if (!empty($pending_number_ap)) {
                            ?><span class="badge badge-danger right">
                            </?php
                            echo $number_count = count($pending_number_ap);
                            ?></span>
                        </?php
                        } ?> -->
                            
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url('Admin/applicant_pending_list') ?>" class="nav-link <?= active_nav('applicant_pending_list', $sub_nav); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>আবেদন অ. তালিকা</p>
                                <!-- </?php
								if (!empty($pending_number_ap)) {
								?><span class="badge badge-danger right">
										</?php
										echo count($pending_number_ap);
										?></span>
								</?php
								} ?> -->
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Admin/applicant_list') ?>" class="nav-link <?= active_nav('applicant_list', $sub_nav); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>আবেদন তালিকা</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Admin/reject_applicant_list') ?>" class="nav-link <?= active_nav('reject_applicant_list', $sub_nav); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>আবেদন বাতিলকৃত তালিকা </p>
                            </a>
                        </li>
                        
                    </ul>
                </li>
                <!-- <li class="nav-item has-treeview <?= active_open('interview_committee', $main_nav); ?>">
                    <a href="#" class="nav-link <?= active_nav('interview_committee', $main_nav); ?>">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            সাক্ষাৎকার কমিটি
                            <i class="fas fa-angle-left right"></i>
                            
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url('Admin/interview_committee_create') ?>" class="nav-link <?= active_nav('interview_committee_create', $sub_nav); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>সাক্ষাৎকার কমিটি তৈরি</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Admin/interview_committee_list') ?>" class="nav-link <?= active_nav('interview_committee_list', $sub_nav); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>সাক্ষাৎকার কমিটি তালিকা </p>
                            </a>
                        </li>
                        
                    </ul>
                </li>
                <li class="nav-item has-treeview <?= active_open('interview', $main_nav); ?>">
                    <a href="#" class="nav-link <?= active_nav('interview', $main_nav); ?>">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            সাক্ষাৎকার
                            <i class="fas fa-angle-left right"></i>
                            
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url('Admin/interview_schedule_create') ?>" class="nav-link <?= active_nav('interview_schedule_create', $sub_nav); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>সাক্ষাৎকার সময়সূচী তৈরি</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Admin/interview_schedule_list') ?>" class="nav-link <?= active_nav('interview_schedule_list', $sub_nav); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>সাক্ষাৎকার সময়সূচী তালিকা </p>
                            </a>
                        </li>
                        
                    </ul>
                </li>
                <li class="nav-item has-treeview <?= active_open('result', $main_nav); ?>">
                    <a href="#" class="nav-link <?= active_nav('result', $main_nav); ?>">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            ফলাফল
                            <i class="fas fa-angle-left right"></i>
                            
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url('Admin/result_list') ?>" class="nav-link <?= active_nav('result_list', $sub_nav); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ফলাফল তালিকা</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Admin/final_result_list') ?>" class="nav-link <?= active_nav('final_result_list', $sub_nav); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>চুড়ান্ত ফলাফল</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Admin/joining_letter_list') ?>" class="nav-link <?= active_nav('joining_letter_list', $sub_nav); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>জয়েনিং লেটার তালিকা </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Admin/reject_result_list') ?>" class="nav-link <?= active_nav('reject_result_list', $sub_nav); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>বাতিলকৃত ফলাফল</p>
                            </a>
                        </li> -->
                        
                    </ul>
                </li>
<!-- 
                <li class="nav-item has-treeview <?= active_open('website_setting', $main_nav); ?>">
                    <a href="#" class="nav-link <?= active_nav('website_setting', $main_nav); ?>">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Website Setting
                            <i class="fas fa-angle-left right"></i>
                            
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url('Admin/homepage') ?>" class="nav-link <?= active_nav('homepage', $sub_nav); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Homepage</p>
                            </a>
                        </li>
                        
                    </ul>
                </li> -->

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>