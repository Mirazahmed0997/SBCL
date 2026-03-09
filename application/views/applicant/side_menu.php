<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">

        <span class="brand-text font-weight-light">Applicant</span>
    </a>

	<?php $login_user_info_all = $this->session->userdata('login_user_info_all'); ?>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php if(!empty($login_user_info_all->r_image)){ echo base_url('assets/uploads/applicant/'.$login_user_info_all->r_image); } else { echo base_url('assets/backend/dist/img/user.jpg'); }?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php 
                                            echo $login_user_info_all->r_first_name.' '.$login_user_info_all->r_last_name;
                                            ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
					 with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="<?php echo base_url('applicant_dashboard') ?>" class="nav-link <?= active_nav('dashboard', $main_nav); ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <!--								<i class="right fas fa-angle-left"></i>-->
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview <?= active_open('applicant_cv', $main_nav); ?>">
                    <a href="#" class="nav-link <?= active_nav('applicant_cv', $main_nav); ?>">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            সিভি
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url('Applicant/applicant_cv_view') ?>" class="nav-link <?= active_nav('applicant_cv_view', $sub_nav); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>সিভি </p>
                            </a>
                        </li>
                        
                    </ul>
                </li>
                <li class="nav-item has-treeview <?= active_open('applicant', $main_nav); ?>">
                    <a href="#" class="nav-link <?= active_nav('applicant', $main_nav); ?>">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            নিয়োগ
                            <i class="fas fa-angle-left right"></i>
                            
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url('Recruitment/job_openings') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>নিয়োগ বিজ্ঞপ্তি</p>
                            </a>
                        </li>
                        
                    </ul>
                </li>
                <li class="nav-item has-treeview <?= active_open('applicant', $main_nav); ?>">
                    <a href="#" class="nav-link <?= active_nav('applicant', $main_nav); ?>">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            আবেদন
                            <i class="fas fa-angle-left right"></i>
                            
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url('Applicant/applied_list') ?>" class="nav-link <?= active_nav('applied_list', $sub_nav); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>আবেদন তালিকা</p>
                            </a>
                        </li>
                        
                    </ul>
                </li>
                <li class="nav-item has-treeview menu-open">
                    <a href="<?php echo base_url('Applicant/password_setting') ?>" class="nav-link <?= active_nav('password_setting', $main_nav); ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            পাসওয়ার্ড পরিবর্তন
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>