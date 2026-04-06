<style>
    [class*=sidebar-dark-] {
        background-image: linear-gradient(to bottom,
                #000080,
                #0000CD,
                #4169E1);
    }
</style>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">

        <span class="brand-text font-weight-light">Admin</span>
    </a>

    <?php $login_user_info_all = $this->session->userdata('login_user_info_all'); ?>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo base_url('assets/backend/dist/img/user.jpg'); ?>" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Admin</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item has-treeview menu-open">
                    <a href="<?php echo base_url('admin_dashboard') ?>"
                        class="nav-link <?= active_nav('dashboard', $main_nav); ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview <?= active_open('homepage', $main_nav); ?>">
                    <a href="#" class="nav-link <?= active_nav('homepage', $main_nav); ?>">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            হোমপেজ ব্যবস্থাপনা
                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url('news_list') ?>"
                                class="nav-link <?= active_nav('news_list', $sub_nav); ?>">
                                <i class="fas fa-newspaper nav-icon"></i>
                                <p>সংবাদ</p>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('slider_list') ?>"
                                class="nav-link <?= active_nav('applicant_pending_list', $sub_nav); ?>">
                                <i class="fas fa-newspaper nav-icon"></i>
                                <p>সংবাদ ছবি</p>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('notice_list') ?>"
                                class="nav-link <?= active_nav('applicant_pending_list', $sub_nav); ?>">
                                <i class="fas fa-newspaper nav-icon"></i>
                                <p>নোটিশ</p>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('projects_list') ?>"
                                class="nav-link <?= active_nav('applicant_pending_list', $sub_nav); ?>">
                                <i class="fas fa-newspaper nav-icon"></i>
                                <p>প্রজেক্টস</p>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('banner_list') ?>"
                                class="nav-link <?= active_nav('applicant_pending_list', $sub_nav); ?>">
                                <i class="fas fa-newspaper nav-icon"></i>
                                <p>ব্যানার</p>

                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url('managment_list') ?>"
                                class="nav-link <?= active_nav('applicant_pending_list', $sub_nav); ?>">
                                <i class="fas fa-newspaper nav-icon"></i>
                                <p>ব্যবস্থাপক</p>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('achievements_list') ?>"
                                class="nav-link <?= active_nav('applicant_pending_list', $sub_nav); ?>">
                                <i class="fas fa-newspaper nav-icon"></i>
                                <p>অর্জন</p>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('image_gallery_list') ?>"
                                class="nav-link <?= active_nav('applicant_pending_list', $sub_nav); ?>">
                                <i class="fas fa-newspaper nav-icon"></i>
                                <p>ইমেজ গ্যালারি</p>

                            </a>
                        </li>
                    </ul>
                </li>


                <br>



                <a href="<?php echo base_url('Admin/registered_user_list') ?>"
                    class="nav-link <?= active_nav('user_list', $main_nav); ?>">
                    <i class="nav-icon fas fa-list"></i>
                    <p>
                        রেজিস্টার্ড ইউজার তালিকা
                    </p>
                </a>

                </li>
                <li class="nav-item has-treeview <?= active_open('applicant', $main_nav); ?>">
                    <a href="#" class="nav-link <?= active_nav('applicant', $main_nav); ?>">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            সদস্য ব্যবস্থাপনা
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url('admin/members_list/members_list') ?>"
                                class="nav-link <?= active_nav('applicant_pending_list', $sub_nav); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>সদস্য তালিকা</p>

                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="<?php echo base_url('Admin/applicant_list') ?>"
                                class="nav-link <?= active_nav('applicant_list', $sub_nav); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>আবেদন তালিকা</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Admin/reject_applicant_list') ?>"
                                class="nav-link <?= active_nav('reject_applicant_list', $sub_nav); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>আবেদন বাতিলকৃত তালিকা </p>
                            </a>
                        </li> -->

                    </ul>
                </li>


                <li class="nav-item has-treeview <?= active_open('applicant', $main_nav); ?>">
                    <a href="#" class="nav-link <?= active_nav('applicant', $main_nav); ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            ইউজার ব্যবস্থাপনা
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url('admin/users_list/users_list') ?>"
                                class="nav-link <?= active_nav('applicant_pending_list', $sub_nav); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ইউজার</p>

                            </a>
                        </li>


                    </ul>
                </li>



            </ul>
            </li>


            </ul>
        </nav>
    </div>
</aside>