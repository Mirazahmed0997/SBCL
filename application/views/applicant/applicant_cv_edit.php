<!-- Content Wrapper. Contains page content -->
<style>
    .row {
        margin-top: 5px;
    }
</style>
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="card-title">সিভি সম্পাদন</h3>
                        </div>
                    </div>
                    
                </div>
                <div class="card-body">
                    <div class="row">
                            <div class="col-12">
                                <?php echo $this->session->flashdata('success') ?>
                            </div>
                        <div class="col-12">
                            <form action="<?php echo base_url('Applicant/applicant_cv_update') ?>" method="post" enctype='multipart/form-data'>
                            
                            <div class="row">
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-4">পেশাগত লক্ষ্য <span style="color:red">*</span></div>
                                        <div class="col-8">
                                            <textarea name="career_objective" class="form-control"><?php if (!empty($applicant_info->r_career_objective)){ echo $applicant_info->r_career_objective; } ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-4">সংক্ষিপ্ত প্রোফাইল <span style="color:red">*</span></div>
                                        <div class="col-8">
                                            <textarea name="profile_summary" class="form-control"><?php if (!empty($applicant_info->r_profile_summary)){ echo $applicant_info->r_profile_summary; } ?></textarea>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h4>ব্যক্তিগত তথ্য</h4>
                            <div class="row">
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-4">প্রথম নাম <span style="color:red">*</span></div>
                                        <div class="col-8"><input type="text" name="first_name" class="form-control" required data-validation="length"
                                                        data-validation-length="min2" value="<?php if(!empty($applicant_info)) { echo $applicant_info->r_first_name;} ?>"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">পিতার নাম <span style="color:red">*</span></div>
                                        <div class="col-8"><input type="text" name="father_name" class="form-control" required data-validation="length"
                                                        data-validation-length="min2" value="<?php if(!empty($applicant_info)) { echo $applicant_info->r_father_name;} ?>"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">পিতার পেশা (বর্তমান/ পূর্বের অবস্থান, প্রতিষ্ঠান নাম, বিজিনেস টাইপ/ ঠিকানা) <span style="color:red">*</span></div>
                                        <div class="col-8">
                                            <textarea name="father_profession" class="form-control" required data-validation="length"
                                                        data-validation-length="min2"><?php if(!empty($applicant_info)) { echo $applicant_info->r_father_profession;} ?></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">লিঙ্গ <span style="color:red">*</span></div>
                                        <div class="col-8">
                                            <select name="gender" class="form-control" required data-validation="length"
                                                        data-validation-length="min2">
                                                <option value="">--- select ---</option>
                                                <option value="পুরুষ" <?php if(!empty($applicant_info)) { if($applicant_info->r_gender == "পুরুষ") { echo "selected"; } } ?>>পুরুষ</option>
                                                <option value="মহিলা" <?php if(!empty($applicant_info)) { if($applicant_info->r_gender == "মহিলা") { echo "selected"; } } ?>>মহিলা</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">বৈবাহিক অবস্থা <span style="color:red">*</span></div>
                                        <div class="col-8">
                                            <select name="maritial_status" class="form-control" required data-validation="length"
                                                        data-validation-length="min2">
                                                <option value="">--- select ---</option>
                                                <option value="অবিবাহিত" <?php if(!empty($applicant_info)) { if($applicant_info->r_maritial_status == "অবিবাহিত") { echo "selected"; } } ?>>অবিবাহিত</option>
                                                <option value="বিবাহিত" <?php if(!empty($applicant_info)) { if($applicant_info->r_maritial_status == "বিবাহিত") { echo "selected"; } } ?>>বিবাহিত</option>
                                                <option value="বিচ্ছিন্ন" <?php if(!empty($applicant_info)) { if($applicant_info->r_maritial_status == "বিচ্ছিন্ন") { echo "selected"; } } ?>>বিচ্ছিন্ন</option>
                                                <option value="তালাকপ্রাপ্ত" <?php if(!empty($applicant_info)) { if($applicant_info->r_maritial_status == "তালাকপ্রাপ্ত") { echo "selected"; } } ?>>তালাকপ্রাপ্ত</option>
                                                <option value="বিধবা" <?php if(!empty($applicant_info)) { if($applicant_info->r_maritial_status == "বিধবা") { echo "selected"; } } ?>>বিধবা</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">জাতীয়তা <span style="color:red">*</span></div>
                                        <div class="col-8"><input type="text" name="nationality" class="form-control" required data-validation="length"
                                                        data-validation-length="min2" value="<?php if(!empty($applicant_info)) { echo $applicant_info->r_nationality;} ?>"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">ধর্ম <span style="color:red">*</span></div>
                                        <div class="col-8">
                                            <select name="religion" class="form-control" required data-validation="length"
                                                        data-validation-length="min2">
                                                <option value="">--- select ---</option>
                                                <option value="ইসলাম" <?php if(!empty($applicant_info)) { if($applicant_info->r_religion == "ইসলাম") { echo "selected"; } } ?>>ইসলাম</option>
                                                <option value="সনাতন" <?php if(!empty($applicant_info)) { if($applicant_info->r_religion == "সনাতন") { echo "selected"; } } ?>>সনাতন</option>
                                                <option value="খিষ্টান" <?php if(!empty($applicant_info)) { if($applicant_info->r_religion == "খিষ্টান") { echo "selected"; } } ?>>খিষ্টান</option>
                                                <option value="বৌদ্ধ" <?php if(!empty($applicant_info)) { if($applicant_info->r_religion == "বৌদ্ধ") { echo "selected"; } } ?>>বৌদ্ধ</option>
                                                <option value="অন্যান্য" <?php if(!empty($applicant_info)) { if($applicant_info->r_religion == "অন্যান্য") { echo "selected"; } } ?>>অন্যান্য</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">মোবাইল নম্বর <span style="color:red">*</span></div>
                                        <div class="col-8">
                                            <input type="text" name="primary_mobile"id="NumberCode" class="form-control" required data-validation="length"
                                                        data-validation-length="min11" value="<?php if(!empty($applicant_info)) { echo $applicant_info->r_primary_mobile;} ?>">
                                                <div id="number_result" class="direct-chat-msg">
                                                    <div class="direct-chat-text">
                                                        This number should be unique
                                                    </div>

                                                </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">বাসা মোবাইল</div>
                                        <div class="col-8"><input type="text" name="home_mobile" class="form-control" value="<?php if(!empty($applicant_info)) { echo $applicant_info->r_home_mobile;} ?>"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">অফিস মোবাইল</div>
                                        <div class="col-8"><input type="text" name="office_mobile" class="form-control" value="<?php if(!empty($applicant_info)) { echo $applicant_info->r_office_mobile;} ?>"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">ই-মেইল <span style="color:red">*</span></div>
                                        <div class="col-8"><input type="text" name="email" class="form-control" required data-validation="length"
                                                        data-validation-length="min2" value="<?php if(!empty($applicant_info)) { echo $applicant_info->r_email;} ?>"></div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    
                                    <div class="row">
                                        <div class="col-4">শেষ নাম <span style="color:red">*</span></div>
                                        <div class="col-8"><input type="text" name="last_name" class="form-control" required data-validation="length"
                                                        data-validation-length="min2" value="<?php if(!empty($applicant_info)) { echo $applicant_info->r_last_name;} ?>"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">মাতার নাম <span style="color:red">*</span></div>
                                        <div class="col-8"><input type="text" name="mother_name" class="form-control" required data-validation="length"
                                                        data-validation-length="min2" value="<?php if(!empty($applicant_info)) { echo $applicant_info->r_mother_name;} ?>"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">মাতার পেশা (বর্তমান/ পূর্বের অবস্থান, প্রতিষ্ঠান নাম, বিজিনেস টাইপ/ ঠিকানা) <span style="color:red">*</span></div>
                                        <div class="col-8">
                                            <textarea name="mother_profession" class="form-control" required data-validation="length"
                                                        data-validation-length="min2" value=""><?php if(!empty($applicant_info)) { echo $applicant_info->r_mother_profession;} ?></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">জন্ম তারিখ <span style="color:red">*</span></div>
                                        <div class="col-8"><input type="date" name="birth_date" class="form-control" required data-validation="length"
                                                        data-validation-length="min2" value="<?php if(!empty($applicant_info)) { echo $applicant_info->r_birth_date;} ?>"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">বয়স (শুধু বছর)<span style="color:red">*</span></div>
                                        <div class="col-8"><input type="number" name="age" class="form-control" required data-validation="length"
                                                        data-validation-length="min2" value="<?php if(!empty($applicant_info)) { echo $applicant_info->r_age;} ?>"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">	রক্তের গ্রুপ <span style="color:red">*</span></div>
                                        <div class="col-8">
                                            <select name="blood_group" class="form-control" required data-validation="length"
                                                        data-validation-length="min2">
                                                <option value="">--- select ---</option>
                                                <option value="A+" <?php if(!empty($applicant_info)) { if($applicant_info->r_blood_group == "A+") { echo "selected"; } } ?>>A+</option>
                                                <option value="A-" <?php if(!empty($applicant_info)) { if($applicant_info->r_blood_group == "A-") { echo "selected"; } } ?>>A-</option>
                                                <option value="B+" <?php if(!empty($applicant_info)) { if($applicant_info->r_blood_group == "B+") { echo "selected"; } } ?>>B+</option>
                                                <option value="B-" <?php if(!empty($applicant_info)) { if($applicant_info->r_blood_group == "B-") { echo "selected"; } } ?>>B-</option>
                                                <option value="AB+" <?php if(!empty($applicant_info)) { if($applicant_info->r_blood_group == "AB+") { echo "selected"; } } ?>>AB+</option>
                                                <option value="AB-" <?php if(!empty($applicant_info)) { if($applicant_info->r_blood_group == "AB-") { echo "selected"; } } ?>>AB-</option>
                                                <option value="O+" <?php if(!empty($applicant_info)) { if($applicant_info->r_blood_group == "O+") { echo "selected"; } } ?>>O+</option>
                                                <option value="O-" <?php if(!empty($applicant_info)) { if($applicant_info->r_blood_group == "O-") { echo "selected"; } } ?>>O-</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">এনআইডি <span style="color:red">*</span></div>
                                        <div class="col-8"><input type="text" name="nid" class="form-control" required data-validation="length"
                                                        data-validation-length="min2" value="<?php if(!empty($applicant_info)) { echo $applicant_info->r_nid;} ?>"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">গ্রাম <span style="color:red">*</span></div>
                                        <div class="col-8"><input type="text" name="r_village" class="form-control" required data-validation="length"
                                                        data-validation-length="min2" value="<?php if(!empty($applicant_info)) { echo $applicant_info->r_village;} ?>"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">পোস্ট <span style="color:red">*</span></div>
                                        <div class="col-8"><input type="text" name="post" class="form-control" required data-validation="length"
                                                        data-validation-length="min2" value="<?php if(!empty($applicant_info)) { echo $applicant_info->r_post;} ?>"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">উপজেলা <span style="color:red">*</span></div>
                                        <div class="col-8"><input type="text" name="upazila" class="form-control" required data-validation="length"
                                                        data-validation-length="min2" value="<?php if(!empty($applicant_info)) { echo $applicant_info->r_upazila;} ?>"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">জেলা <span style="color:red">*</span></div>
                                        <div class="col-8"><input type="text" name="district" class="form-control" data-validation="length" data-validation-length="min2" value="<?php if(!empty($applicant_info)) { echo $applicant_info->r_district;} ?>" required></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">বিভাগ <span style="color:red">*</span></div>
                                        <div class="col-8"><input type="text" name="division" class="form-control" required data-validation="length"
                                                        data-validation-length="min2" value="<?php if(!empty($applicant_info)) { echo $applicant_info->r_division;} ?>"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">বর্তমান ঠিকানা <span style="color:red">*</span></div>
                                        <div class="col-8">
                                            <textarea name="present_address" class="form-control" required data-validation="length"
                                                        data-validation-length="min2" value=""><?php if(!empty($applicant_info)) { echo $applicant_info->r_present_address;} ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h4>শিক্ষাগত যোগ্যতা</h4>
                            <div class="row">
                                <div class="col-md-12" style="clear:both;">
                                    <div class="">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr style="font-size: 13px">

                                                    <th class="text-center" width="100px">পরীক্ষার নাম <small class="req" style="color:red;"> *</small></th>
                                                    <th class="text-center">শিক্ষা প্রতিষ্ঠানের নাম <small class="req" style="color:red;"> *</small></th>
                                                    <th class="text-center">শিক্ষা বোর্ড <small class="req" style="color:red;">*</small></th>
                                                    <th class="text-center">বিভাগ <small class="req" style="color:red;">*</small></th>
                                                    <th class="text-center">জিপিএ/সিজিপিএ <small class="req" style="color:red;">*</small></th>
                                                    <th class="text-center">প্রাপ্ত জিপিএ/সিজিপিএ <small class="req" style="color:red;">*</small></th>
                                                    <th class="text-center">উত্তীর্ণ সাল <small class="req" style="color:red;">*</small></th>
                                                    <!-- <th class="text-center">Action</th> -->
                                                </tr>
                                            </thead>
                                            <?php if(!empty($applicant_info)) {
                                                $where_data['ae_r_candidate_id'] = $applicant_info->r_candidate_id;
                                                $where_data['ae_status'] = 1;
                                                $education = $this->Common->get_data_multi_conditional('applicant_education',$where_data)->result();
                                                if(!empty($education)) {
                                                $i = 0;
                                                foreach($education as $value) {
                                            ?>
                                            <input type="hidden" name="ae_id[]" id="ae_id<?php echo $i; ?>" value="<?php echo $value->ae_id; ?>">
                                            <tr>
                                                <td class="text-center align-middle">
                                                    <?php echo $value->ae_exam_name; ?>
                                                    <input type="hidden" name="exam_name[]"  id="exam_name<?php echo $i; ?>" class="form-control" value="<?php echo $value->ae_exam_name; ?>">

                                                </td>
                                                <td>
                                                    <input type="text" name="institute_name[]"  id="institute_name<?php echo $i; ?>" class="form-control" value="<?php echo $value->ae_institute_name; ?>">

                                                </td>
                                                <td>
                                                    <input type="text" name="education_board[]"  id="education_board<?php echo $i; ?>" class="form-control" value="<?php echo $value->ae_education_board; ?>">

                                                </td>
                                                <td>
                                                    <input type="text" name="group[]"  id="group<?php echo $i; ?>" class="form-control" value="<?php echo $value->ae_group; ?>">

                                                </td>
                                                <td>
                                                    <input type="number" name="gpa[]" step="0.01"  id="gpa<?php echo $i; ?>" class="form-control" value="<?php echo $value->ae_gpa; ?>">

                                                </td>
                                                <td>
                                                    <input type="number" name="get_gpa[]" step="0.01"  id="get_gpa<?php echo $i; ?>" class="form-control" value="<?php echo $value->ae_get_gpa; ?>">

                                                </td>
                                                <td>
                                                    <input type="text" name="pass_year[]"  id="pass_year<?php echo $i; ?>" class="form-control" value="<?php echo $value->ae_pass_year; ?>">

                                                </td>
                                                <!-- <td><button type="button" onclick="addMore()" style="color: #2196f3" class="closebtn"><i class="fa fa-plus"></i></button></td> -->
                                            </tr>
                                            
                                            <?php $i++; } } else { ?>
                                                <tr>
                                                    <td class="text-center align-middle">
                                                        এসএসসি
                                                        <input type="hidden" name="exam_name[]"  id="exam_name0" class="form-control" value="এসএসসি">

                                                    </td>
                                                    <td>
                                                        <input type="text" name="institute_name[]"  id="institute_name0" class="form-control">

                                                    </td>
                                                    <td>
                                                        <input type="text" name="education_board[]"  id="education_board0" class="form-control">

                                                    </td>
                                                    <td>
                                                        <input type="text" name="group[]"  id="group0" class="form-control">

                                                    </td>
                                                    <td>
                                                        <input type="number" name="gpa[]" step="0.01"  id="gpa0" class="form-control" value="5">

                                                    </td>
                                                    <td>
                                                        <input type="number" name="get_gpa[]" step="0.01"  id="get_gpa0" class="form-control" value="0">

                                                    </td>
                                                    <td>
                                                        <input type="text" name="pass_year[]"  id="pass_year0" class="form-control">

                                                    </td>
                                                    <!-- <td><button type="button" onclick="addMore()" style="color: #2196f3" class="closebtn"><i class="fa fa-plus"></i></button></td> -->
                                                </tr>
                                                <tr>
                                                    <td class="text-center align-middle">
                                                        এইচএসসি
                                                        <input type="hidden" name="exam_name[]"  id="exam_name1" class="form-control" value="এইচএসসি">

                                                    </td>
                                                    <td>
                                                        <input type="text" name="institute_name[]"  id="institute_name1" class="form-control">

                                                    </td>
                                                    <td>
                                                        <input type="text" name="education_board[]"  id="education_board1" class="form-control">

                                                    </td>
                                                    <td>
                                                        <input type="text" name="group[]"  id="group1" class="form-control">

                                                    </td>
                                                    <td>
                                                        <input type="number" name="gpa[]" step="0.01"  id="gpa1" class="form-control" value="5">

                                                    </td>
                                                    <td>
                                                        <input type="number" name="get_gpa[]" step="0.01"  id="get_gpa1" class="form-control" value="0">

                                                    </td>
                                                    <td>
                                                        <input type="text" name="pass_year[]"  id="pass_year1" class="form-control">

                                                    </td>
                                                    <!-- <td><button type="button" onclick="addMore()" style="color: #2196f3" class="closebtn"><i class="fa fa-plus"></i></button></td> -->
                                                </tr>
                                                <tr>
                                                    <td class="text-center align-middle">
                                                        স্নাতক
                                                        <input type="hidden" name="exam_name[]"  id="exam_name2" class="form-control" value="স্নাতক">

                                                    </td>
                                                    <td>
                                                        <input type="text" name="institute_name[]"  id="institute_name2" class="form-control">

                                                    </td>
                                                    <td>
                                                        <input type="text" name="education_board[]"  id="education_board2" class="form-control">

                                                    </td>
                                                    <td>
                                                        <input type="text" name="group[]"  id="group2" class="form-control">

                                                    </td>
                                                    <td>
                                                        <input type="number" name="gpa[]" step="0.01"  id="gpa2" class="form-control" value="4">

                                                    </td>
                                                    <td>
                                                        <input type="number" name="get_gpa[]" step="0.01"  id="get_gpa2" class="form-control" value="0">

                                                    </td>
                                                    <td>
                                                        <input type="text" name="pass_year[]"  id="pass_year2" class="form-control">

                                                    </td>
                                                    <!-- <td><button type="button" onclick="addMore()" style="color: #2196f3" class="closebtn"><i class="fa fa-plus"></i></button></td> -->
                                                </tr>
                                                <tr>
                                                    <td class="text-center align-middle">
                                                        স্নাতকোত্তর
                                                        <input type="hidden" name="exam_name[]"  id="exam_name3" class="form-control" value="স্নাতকোত্তর">

                                                    </td>
                                                    <td>
                                                        <input type="text" name="institute_name[]"  id="institute_name3" class="form-control">

                                                    </td>
                                                    <td>
                                                        <input type="text" name="education_board[]"  id="education_board3" class="form-control">

                                                    </td>
                                                    <td>
                                                        <input type="text" name="group[]"  id="group3" class="form-control">

                                                    </td>
                                                    <td>
                                                        <input type="number" name="gpa[]" step="0.01"  id="gpa3" class="form-control" value="4">

                                                    </td>
                                                    <td>
                                                        <input type="number" name="get_gpa[]" step="0.01"  id="get_gpa3" class="form-control" value="0">

                                                    </td>
                                                    <td>
                                                        <input type="text" name="pass_year[]"  id="pass_year3" class="form-control">

                                                    </td>
                                                    <!-- <td><button type="button" onclick="addMore()" style="color: #2196f3" class="closebtn"><i class="fa fa-plus"></i></button></td> -->
                                                </tr>
                                                <?php } } else { ?>
                                                    <tr>
                                                        <td class="text-center align-middle">
                                                            এসএসসি
                                                            <input type="hidden" name="exam_name[]"  id="exam_name0" class="form-control" value="এসএসসি">

                                                        </td>
                                                        <td>
                                                            <input type="text" name="institute_name[]"  id="institute_name0" class="form-control">

                                                        </td>
                                                        <td>
                                                            <input type="text" name="education_board[]"  id="education_board0" class="form-control">

                                                        </td>
                                                        <td>
                                                            <input type="text" name="group[]"  id="group0" class="form-control">

                                                        </td>
                                                        <td>
                                                            <input type="number" name="gpa[]" step="0.01"  id="gpa0" class="form-control" value="5">

                                                        </td>
                                                        <td>
                                                            <input type="number" name="get_gpa[]" step="0.01"  id="get_gpa0" class="form-control" value="0">

                                                        </td>
                                                        <td>
                                                            <input type="text" name="pass_year[]"  id="pass_year0" class="form-control">

                                                        </td>
                                                        <!-- <td><button type="button" onclick="addMore()" style="color: #2196f3" class="closebtn"><i class="fa fa-plus"></i></button></td> -->
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center align-middle">
                                                            এইচএসসি
                                                            <input type="hidden" name="exam_name[]"  id="exam_name1" class="form-control" value="এইচএসসি">

                                                        </td>
                                                        <td>
                                                            <input type="text" name="institute_name[]"  id="institute_name1" class="form-control">

                                                        </td>
                                                        <td>
                                                            <input type="text" name="education_board[]"  id="education_board1" class="form-control">

                                                        </td>
                                                        <td>
                                                            <input type="text" name="group[]"  id="group1" class="form-control">

                                                        </td>
                                                        <td>
                                                            <input type="number" name="gpa[]" step="0.01"  id="gpa1" class="form-control" value="5">

                                                        </td>
                                                        <td>
                                                            <input type="number" name="get_gpa[]" step="0.01"  id="get_gpa1" class="form-control" value="0">

                                                        </td>
                                                        <td>
                                                            <input type="text" name="pass_year[]"  id="pass_year1" class="form-control">

                                                        </td>
                                                        <!-- <td><button type="button" onclick="addMore()" style="color: #2196f3" class="closebtn"><i class="fa fa-plus"></i></button></td> -->
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center align-middle">
                                                            স্নাতক
                                                            <input type="hidden" name="exam_name[]"  id="exam_name2" class="form-control" value="স্নাতক">

                                                        </td>
                                                        <td>
                                                            <input type="text" name="institute_name[]"  id="institute_name2" class="form-control">

                                                        </td>
                                                        <td>
                                                            <input type="text" name="education_board[]"  id="education_board2" class="form-control">

                                                        </td>
                                                        <td>
                                                            <input type="text" name="group[]"  id="group2" class="form-control">

                                                        </td>
                                                        <td>
                                                            <input type="number" name="gpa[]" step="0.01"  id="gpa2" class="form-control" value="4">

                                                        </td>
                                                        <td>
                                                            <input type="number" name="get_gpa[]" step="0.01"  id="get_gpa2" class="form-control" value="0">

                                                        </td>
                                                        <td>
                                                            <input type="text" name="pass_year[]"  id="pass_year2" class="form-control">

                                                        </td>
                                                        <!-- <td><button type="button" onclick="addMore()" style="color: #2196f3" class="closebtn"><i class="fa fa-plus"></i></button></td> -->
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center align-middle">
                                                            স্নাতকোত্তর
                                                            <input type="hidden" name="exam_name[]"  id="exam_name3" class="form-control" value="স্নাতকোত্তর">

                                                        </td>
                                                        <td>
                                                            <input type="text" name="institute_name[]"  id="institute_name3" class="form-control">

                                                        </td>
                                                        <td>
                                                            <input type="text" name="education_board[]"  id="education_board3" class="form-control">

                                                        </td>
                                                        <td>
                                                            <input type="text" name="group[]"  id="group3" class="form-control">

                                                        </td>
                                                        <td>
                                                            <input type="number" name="gpa[]" step="0.01"  id="gpa3" class="form-control" value="4">

                                                        </td>
                                                        <td>
                                                            <input type="number" name="get_gpa[]" step="0.01"  id="get_gpa3" class="form-control" value="0">

                                                        </td>
                                                        <td>
                                                            <input type="text" name="pass_year[]"  id="pass_year3" class="form-control">

                                                        </td>
                                                        <!-- <td><button type="button" onclick="addMore()" style="color: #2196f3" class="closebtn"><i class="fa fa-plus"></i></button></td> -->
                                                    </tr>
                                                <?php } ?>
                                            
                                        </table>
                                    </div>  
                                </div><!--./col-md-12-->
                                
                            </div>
                            <h4>প্রশিক্ষণ তথ্য</h4>
                            <div class="row">
                                <div class="col-md-12" style="clear:both;">
                                    <div class="">
                                        <table class="table table-striped table-bordered table-hover" id="tableID2">
                                            <thead>
                                                <tr style="font-size: 13px">

                                                    <th class="text-center">প্রশিক্ষণ শিরোনাম <small class="req" style="color:red;"> *</small></th>
                                                    <th class="text-center">বিষয় কভার <small class="req" style="color:red;"> *</small></th>
                                                    <th class="text-center">শিক্ষা প্রতিষ্ঠানের নাম <small class="req" style="color:red;">*</small></th>
                                                    <th class="text-center">ঠিকানা <small class="req" style="color:red;">*</small></th>
                                                    <th class="text-center">দেশ <small class="req" style="color:red;">*</small></th>
                                                    <th class="text-center">প্রশিক্ষণের বছর <small class="req" style="color:red;">*</small></th>
                                                    <th class="text-center">প্রশিক্ষণ সময়কাল <small class="req" style="color:red;">*</small></th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            
                                            <?php if(!empty($applicant_info)) {
                                                $where_data_training['at_r_candidate_id'] = $applicant_info->r_candidate_id;
                                                $where_data_training['at_status'] = 1;
                                                $training = $this->Common->get_data_multi_conditional('applicant_training',$where_data_training)->result();
                                                if(!empty($training)) {
                                                $i = 0;
                                                foreach($training as $value) {
                                            ?>
                                            <input type="hidden" name="at_id[]" id="at_id<?php echo $i; ?>" value="<?php echo $value->at_id; ?>">
                                            <tr id="row<?php echo $i; ?>">
                                                <td class="text-center align-middle">
                                                    <input type="text" name="training_name[]"  id="training_name<?php echo $i; ?>" class="form-control" value="<?php echo $value->at_training_name; ?>">

                                                </td>
                                                <td>
                                                    <input type="text" name="training_subject[]"  id="training_subject<?php echo $i; ?>" class="form-control" value="<?php echo $value->at_training_subject; ?>">

                                                </td>
                                                <td>
                                                    <input type="text" name="training_institution[]"  id="training_institution<?php echo $i; ?>" class="form-control" value="<?php echo $value->at_training_institution; ?>">

                                                </td>
                                                <td>
                                                    <input type="text" name="training_institution_address[]"  id="training_institution_address<?php echo $i; ?>" class="form-control" value="<?php echo $value->at_training_institution_address; ?>">

                                                </td>
                                                <td>
                                                    <input type="text" name="training_country[]"  id="training_country<?php echo $i; ?>" class="form-control" value="<?php echo $value->at_training_country; ?>">

                                                </td>
                                                <td>
                                                    <input type="text" name="training_year[]"  id="training_year<?php echo $i; ?>" class="form-control" value="<?php echo $value->at_training_year; ?>">

                                                </td>
                                                <td>
                                                    <input type="text" name="training_duration[]"  id="training_duration<?php echo $i; ?>" class="form-control" value="<?php echo $value->at_training_duration; ?>">

                                                </td>
                                                    
                                                <?php if ($i != 0) { ?>
                                                    <td><button type='button' onclick="delete_row('<?php echo $i ?>')" class='closebtn btn-danger'><i class='fas fa-trash'></i></button></td>
                                                    <?php } else { ?>
                                                    <td><button type="button" onclick="addMore()" style="color:#2196f3" class="closebtn"><i class="fa fa-plus"></i></button></td>
                                                <?php } ?>
                                            </tr>
                                            <?php $i++; } } else { ?>
                                                <tr id="row0">
                                                    <td class="text-center align-middle">
                                                        <input type="text" name="training_name[]"  id="training_name0" class="form-control" value="">

                                                    </td>
                                                    <td>
                                                        <input type="text" name="training_subject[]"  id="training_subject0" class="form-control">

                                                    </td>
                                                    <td>
                                                        <input type="text" name="training_institution[]"  id="training_institution0" class="form-control">

                                                    </td>
                                                    <td>
                                                        <input type="text" name="training_institution_address[]"  id="training_institution_address0" class="form-control">

                                                    </td>
                                                    <td>
                                                        <input type="text" name="training_country[]"  id="training_country0" class="form-control" value="">

                                                    </td>
                                                    <td>
                                                        <input type="text" name="training_year[]"  id="training_year0" class="form-control" value="">

                                                    </td>
                                                    <td>
                                                        <input type="text" name="training_duration[]"  id="training_duration0" class="form-control">

                                                    </td>
                                                    <td><button type="button" onclick="addMore()" style="color: #2196f3" class="closebtn"><i class="fa fa-plus"></i></button></td>
                                                </tr>
                                            <?php } } ?>
                                        </table>
                                    </div>  
                                </div><!--./col-md-12-->
                                
                            </div>
                            <h4>পেশাগত প্রশংসাপত্র</h4>
                            <div class="row">
                                <div class="col-md-12" style="clear:both;">
                                    <div class="">
                                        <table class="table table-striped table-bordered table-hover" id="tableID3">
                                            <thead>
                                                <tr style="font-size: 13px">

                                                    <th class="text-center">প্রশংসাপত্রদান <small class="req" style="color:red;"> *</small></th>
                                                    <th class="text-center">শিক্ষা প্রতিষ্ঠানের নাম <small class="req" style="color:red;">*</small></th>
                                                    <th class="text-center">ঠিকানা <small class="req" style="color:red;">*</small></th>
                                                    <th class="text-center">সময়কাল শুরু <small class="req" style="color:red;">*</small></th>
                                                    <th class="text-center">সময়কাল শেষ <small class="req" style="color:red;">*</small></th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <?php if(!empty($applicant_info)) {
                                                $where_data_certi['ac_r_candidate_id'] = $applicant_info->r_candidate_id;
                                                $where_data_certi['ac_status'] = 1;
                                                $certification = $this->Common->get_data_multi_conditional('applicant_certification',$where_data_certi)->result();
                                                if(!empty($certification)) {
                                                $i = 0;
                                                foreach($certification as $value) {
                                            ?>
                                            <input type="hidden" name="ac_id[]" id="ac_id<?php echo $i; ?>" value="<?php echo $value->ac_id; ?>">
                                            <tr id="row_<?php echo $i; ?>">
                                                <td class="text-center align-middle">
                                                    <input type="text" name="certification_name[]"  id="certification_name<?php echo $i; ?>" class="form-control" value="<?php echo $value->ac_certification_name; ?>">

                                                </td>
                                                <td>
                                                    <input type="text" name="certification_institution[]"  id="certification_institution<?php echo $i; ?>" class="form-control" value="<?php echo $value->ac_certification_institution; ?>">

                                                </td>
                                                <td>
                                                    <input type="text" name="certification_institution_address[]"  id="certification_institution_address<?php echo $i; ?>" class="form-control" value="<?php echo $value->ac_certification_institution_address; ?>">

                                                </td>
                                                <td>
                                                    <input type="text" name="certification_duration_start[]"  id="certification_duration_start<?php echo $i; ?>" class="form-control" value="<?php echo $value->ac_certification_duration_start; ?>">

                                                </td>
                                                <td>
                                                    <input type="text" name="certification_duration_end[]"  id="certification_duration_end<?php echo $i; ?>" class="form-control" value="<?php echo $value->ac_certification_duration_end; ?>">

                                                </td>
                                                <?php if ($i != 0) { ?>
                                                    <td><button type='button' onclick="delete_profession_row('<?php echo $i ?>')" class='closebtn btn-danger'><i class='fas fa-trash'></i></button></td>
                                                    <?php } else { ?>
                                                    <td><button type="button" onclick="add_more()" style="color:#2196f3" class="closebtn"><i class="fa fa-plus"></i></button></td>
                                                <?php } ?>
                                            </tr>
                                            <?php $i++; } } else { ?>
                                                <tr id="row_0">
                                                    <td class="text-center align-middle">
                                                        <input type="text" name="certification_name[]"  id="certification_name0" class="form-control" value="">

                                                    </td>
                                                    <td>
                                                        <input type="text" name="certification_institution[]"  id="certification_institution0" class="form-control">

                                                    </td>
                                                    <td>
                                                        <input type="text" name="certification_institution_address[]"  id="certification_institution_address0" class="form-control">

                                                    </td>
                                                    <td>
                                                        <input type="text" name="certification_duration_start[]"  id="certification_duration_start0" class="form-control">

                                                    </td>
                                                    <td>
                                                        <input type="text" name="certification_duration_end[]"  id="certification_duration_end0" class="form-control">

                                                    </td>
                                                    <td><button type="button" onclick="add_more()" style="color: #2196f3" class="closebtn"><i class="fa fa-plus"></i></button></td>
                                                </tr>
                                            <?php } } ?>
                                        </table>
                                    </div>  
                                </div><!--./col-md-12-->
                                
                            </div>
                            <h4>কর্মসংস্থান ইতিহাস</h4>
                            <div class="row">
                                <div class="col-md-12" style="clear:both;">
                                    <div class="">
                                        <table class="table table-striped table-bordered table-hover" id="tableID4">
                                            <thead>
                                                <tr style="font-size: 13px">

                                                    <th class="text-center">কোম্পানি নাম <small class="req" style="color:red;"> *</small></th>
                                                    <th class="text-center">কোম্পানি বিজিনেস <small class="req" style="color:red;">*</small></th>
                                                    <th class="text-center">কোম্পানি ঠিকানা <small class="req" style="color:red;">*</small></th>
                                                    <th class="text-center">পদবী <small class="req" style="color:red;">*</small></th>
                                                    <th class="text-center">ডিপার্টমেন্ট <small class="req" style="color:red;">*</small></th>
                                                    <th class="text-center">কর্মসংস্থান সময়কাল শুরু <small class="req" style="color:red;">*</small></th>
                                                    <th class="text-center">কর্মসংস্থান সময়কাল শেষ <small class="req" style="color:red;">*</small></th>
                                                    <th class="text-center">দায়িত্ব <small class="req" style="color:red;">*</small></th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <?php if(!empty($applicant_info)) {
                                                $where_data_emp['aeh_r_candidate_id'] = $applicant_info->r_candidate_id;
                                                $where_data_emp['aeh_status'] = 1;
                                                $employment = $this->Common->get_data_multi_conditional('applicant_employment_history',$where_data_emp)->result();
                                                if(!empty($employment)) {
                                                $i=0;
                                                foreach($employment as $value) {
                                            ?>
                                            <input type="hidden" name="aeh_id[]" id="aeh_id<?php echo $i; ?>" value="<?php echo $value->aeh_id; ?>">
                                            <tr id="row_emp<?php echo $i ?>">
                                                <td class="text-center align-middle">
                                                    <input type="text" name="company_name[]"  id="company_name<?php echo $i ?>" class="form-control" value="<?php echo $value->aeh_company_name; ?>">

                                                </td>
                                                <td>
                                                    <input type="text" name="company_business[]"  id="company_business<?php echo $i ?>" class="form-control" value="<?php echo $value->aeh_company_business; ?>">

                                                </td>
                                                <td>
                                                    <input type="text" name="company_address[]"  id="company_address<?php echo $i ?>" class="form-control" value="<?php echo $value->aeh_company_address; ?>">

                                                </td>
                                                <td>
                                                    <input type="text" name="company_designation[]"  id="company_designation<?php echo $i ?>" class="form-control" value="<?php echo $value->aeh_company_designation; ?>">

                                                </td>
                                                <td>
                                                    <input type="text" name="company_department[]"  id="company_department<?php echo $i ?>" class="form-control" value="<?php echo $value->aeh_company_department; ?>">

                                                </td>
                                                <td>
                                                    <input type="text" name="company_duration_start[]"  id="company_duration_start<?php echo $i ?>" class="form-control" value="<?php echo $value->aeh_company_duration_start; ?>">

                                                </td>
                                                <td>
                                                    <input type="text" name="company_duration_end[]"  id="company_duration_end<?php echo $i ?>" class="form-control" value="<?php echo $value->aeh_company_duration_end; ?>">

                                                </td>
                                                <td>
                                                    <input type="text" name="company_responsilities[]"  id="company_responsilities<?php echo $i ?>" class="form-control" value="<?php echo $value->aeh_company_responsilities; ?>">

                                                </td>
                                                
                                                <?php if ($i != 0) { ?>
                                                    <td><button type='button' onclick="delete_employment_row('<?php echo $i ?>')" class='closebtn btn-danger'><i class='fas fa-trash'></i></button></td>
                                                    <?php } else { ?>
                                                    <td><button type="button" onclick="add_emp_more()" style="color:#2196f3" class="closebtn"><i class="fa fa-plus"></i></button></td>
                                                <?php } ?>
                                            </tr>
                                            <?php $i++; } } else { ?>
                                                <tr id="row_emp0">
                                                    <td class="text-center align-middle">
                                                        <input type="text" name="company_name[]"  id="company_name0" class="form-control" value="">

                                                    </td>
                                                    <td>
                                                        <input type="text" name="company_business[]"  id="company_business0" class="form-control">

                                                    </td>
                                                    <td>
                                                        <input type="text" name="company_address[]"  id="company_address0" class="form-control">

                                                    </td>
                                                    <td>
                                                        <input type="text" name="company_designation[]"  id="company_designation0" class="form-control">

                                                    </td>
                                                    <td>
                                                        <input type="text" name="company_department[]"  id="company_department0" class="form-control">

                                                    </td>
                                                    <td>
                                                        <input type="text" name="company_duration_start[]"  id="company_duration_start0" class="form-control">

                                                    </td>
                                                    <td>
                                                        <input type="text" name="company_duration_end[]"  id="company_duration_end0" class="form-control">

                                                    </td>
                                                    <td>
                                                        <input type="text" name="company_responsilities[]"  id="company_responsilities0" class="form-control">

                                                    </td>
                                                    <td><button type="button" onclick="add_emp_more()" style="color: #2196f3" class="closebtn"><i class="fa fa-plus"></i></button></td>
                                                </tr>
                                            <?php } } ?>
                                        </table>
                                    </div>  
                                </div><!--./col-md-12-->
                                
                            </div>
                            <h4>রেফারেন্স</h4>
                            <div class="row">
                                <div class="col-md-12" style="clear:both;">
                                    <div class="">
                                        <table class="table table-striped table-bordered table-hover" id="tableID5">
                                            <thead>
                                                <tr style="font-size: 13px">

                                                    <th class="text-center"> নাম <small class="req" style="color:red;"> *</small></th>
                                                    <th class="text-center">পদবী <small class="req" style="color:red;">*</small></th>
                                                    <th class="text-center">প্রতিষ্ঠান নাম <small class="req" style="color:red;">*</small></th>
                                                    <th class="text-center">সম্পর্ক <small class="req" style="color:red;">*</small></th>
                                                    <th class="text-center">ইমেল <small class="req" style="color:red;">*</small></th>
                                                    <th class="text-center">মোবাইল নম্বর <small class="req" style="color:red;">*</small></th>
                                                    <th class="text-center">ঠিকানা <small class="req" style="color:red;">*</small></th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <?php if(!empty($applicant_info)) {
                                                $where_data_ref['ar_r_candidate_id'] = $applicant_info->r_candidate_id;
                                                $where_data_ref['ar_status'] = 1;
                                                $reference = $this->Common->get_data_multi_conditional('applicant_reference',$where_data_ref)->result();
                                                if(!empty($reference)) {
                                                $i=0;
                                                foreach($reference as $value) {
                                            ?>
                                            <input type="hidden" name="ar_id[]" id="ar_id<?php echo $i; ?>" value="<?php echo $value->ar_id; ?>">
                                            <tr id="row_ref<?php echo $i ?>">
                                                <td class="text-center align-middle">
                                                    <input type="text" name="reference_name[]"  id="reference_name<?php echo $i ?>" class="form-control" value="<?php echo $value->ar_reference_name; ?>">

                                                </td>
                                                <td>
                                                    <input type="text" name="designation[]"  id="designation<?php echo $i ?>" class="form-control" value="<?php echo $value->ar_designation; ?>">

                                                </td>
                                                <td>
                                                    <input type="text" name="organization[]"  id="organization<?php echo $i ?>" class="form-control" value="<?php echo $value->ar_organization; ?>">

                                                </td>
                                                <td>
                                                    <input type="text" name="relation[]"  id="relation<?php echo $i ?>" class="form-control" value="<?php echo $value->ar_relation; ?>">

                                                </td>
                                                <td>
                                                    <input type="text" name="ref_email[]"  id="email<?php echo $i ?>" class="form-control" value="<?php echo $value->ar_email; ?>">

                                                </td>
                                                <td>
                                                    <input type="text" name="mobile[]"  id="mobile<?php echo $i ?>" class="form-control" value="<?php echo $value->ar_mobile; ?>">

                                                </td>
                                                <td>
                                                    <input type="text" name="address[]"  id="address<?php echo $i ?>" class="form-control" value="<?php echo $value->ar_address; ?>">

                                                </td>
                                                
                                                <?php if ($i != 0) { ?>
                                                    <td><button type='button' onclick="delete_reference_row('<?php echo $i ?>')" class='closebtn btn-danger'><i class='fas fa-trash'></i></button></td>
                                                    <?php } else { ?>
                                                    <td><button type="button" onclick="add_ref_more()" style="color:#2196f3" class="closebtn"><i class="fa fa-plus"></i></button></td>
                                                <?php } ?>
                                            </tr>
                                            <?php $i++; } } else { ?>
                                                <tr id="row_ref0">
                                                    <td class="text-center align-middle">
                                                        <input type="text" name="reference_name[]"  id="reference_name0" class="form-control" value="">

                                                    </td>
                                                    <td>
                                                        <input type="text" name="designation[]"  id="designation0" class="form-control">

                                                    </td>
                                                    <td>
                                                        <input type="text" name="organization[]"  id="organization0" class="form-control">

                                                    </td>
                                                    <td>
                                                        <input type="text" name="relation[]"  id="relation0" class="form-control">

                                                    </td>
                                                    <td>
                                                        <input type="text" name="ref_email[]"  id="email0" class="form-control">

                                                    </td>
                                                    <td>
                                                        <input type="text" name="mobile[]"  id="mobile0" class="form-control">

                                                    </td>
                                                    <td>
                                                        <input type="text" name="address[]"  id="address0" class="form-control">

                                                    </td>
                                                    <td><button type="button" onclick="add_ref_more()" style="color: #2196f3" class="closebtn"><i class="fa fa-plus"></i></button></td>
                                                </tr>
                                            <?php } } else { ?>
                                                
                                                <tr id="row_emp0">
                                                    <td class="text-center align-middle">
                                                        <input type="text" name="reference_name[]"  id="reference_name0" class="form-control" value="">

                                                    </td>
                                                    <td>
                                                        <input type="text" name="designation[]"  id="designation0" class="form-control">

                                                    </td>
                                                    <td>
                                                        <input type="text" name="organization[]"  id="organization0" class="form-control">

                                                    </td>
                                                    <td>
                                                        <input type="text" name="relation[]"  id="relation0" class="form-control">

                                                    </td>
                                                    <td>
                                                        <input type="text" name="ref_email[]"  id="email0" class="form-control">

                                                    </td>
                                                    <td>
                                                        <input type="text" name="mobile[]"  id="mobile0" class="form-control">

                                                    </td>
                                                    <td>
                                                        <input type="text" name="address[]"  id="address0" class="form-control">

                                                    </td>
                                                    <td><button type="button" onclick="add_ref_more()" style="color: #2196f3" class="closebtn"><i class="fa fa-plus"></i></button></td>
                                                </tr>
                                            <?php } ?>
                                        </table>
                                    </div>  
                                </div><!--./col-md-12-->
                                
                            </div>
                            <h4>ভাষা </h4>
                            <div class="row">
                                <div class="col-md-12" style="clear:both;">
                                    <div class="">
                                        <table class="table table-striped table-bordered table-hover" id="tableID6">
                                            <thead>
                                                <tr style="font-size: 13px">

                                                    <th class="text-center">ভাষা নাম <small class="req" style="color:red;"> *</small></th>
                                                    <th class="text-center">পড়ার দক্ষতা <small class="req" style="color:red;">*</small></th>
                                                    <th class="text-center">লেখার দক্ষতা <small class="req" style="color:red;">*</small></th>
                                                    <th class="text-center">কথা বলার দক্ষতা <small class="req" style="color:red;">*</small></th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <?php if(!empty($applicant_info)) {
                                                $where_data_lang['al_r_candidate_id'] = $applicant_info->r_candidate_id;
                                                $where_data_lang['al_status'] = 1;
                                                $language = $this->Common->get_data_multi_conditional('applicant_language',$where_data_lang)->result();
                                                if(!empty($language)) {
                                                $i=0;
                                                foreach($language as $value) {
                                            ?>
                                            <input type="hidden" name="al_id[]" id="al_id<?php echo $i; ?>" value="<?php echo $value->al_id; ?>">
                                            <tr id="row_lang<?php echo $i ?>">
                                                <td class="text-center align-middle">
                                                    <input type="text" name="language_name[]"  id="language_name<?php echo $i ?>" class="form-control" value="<?php echo $value->al_language_name; ?>">

                                                </td>
                                                <td class="text-center align-middle">
                                                    <select name="reading_skill[]" class="form-control">
                                                        <option value="">---select---</option>
                                                        <option value="উচ্চ" <?php if($value->al_reading_skill == "উচ্চ") { echo "selected"; } ?>>উচ্চ</option>
                                                        <option value="মধ্যম" <?php if($value->al_reading_skill == "মধ্যম") { echo "selected"; } ?>>মধ্যম</option>
                                                        <option value="নিম্ন" <?php if($value->al_reading_skill == "নিম্ন") { echo "selected"; } ?>>নিম্ন</option>
                                                    </select>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <select name="wirting_skill[]" class="form-control">
                                                        <option value="">---select---</option>
                                                        <option value="উচ্চ" <?php if($value->al_wirting_skill == "উচ্চ") { echo "selected"; } ?>>উচ্চ</option>
                                                        <option value="মধ্যম" <?php if($value->al_wirting_skill == "মধ্যম") { echo "selected"; } ?>>মধ্যম</option>
                                                        <option value="নিম্ন" <?php if($value->al_wirting_skill == "নিম্ন") { echo "selected"; } ?>>নিম্ন</option>
                                                    </select>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <select name="speaking_skill[]" class="form-control">
                                                        <option value="">---select---</option>
                                                        <option value="উচ্চ" <?php if($value->al_speaking_skill == "উচ্চ") { echo "selected"; } ?>>উচ্চ</option>
                                                        <option value="মধ্যম" <?php if($value->al_speaking_skill == "মধ্যম") { echo "selected"; } ?>>মধ্যম</option>
                                                        <option value="নিম্ন" <?php if($value->al_speaking_skill == "নিম্ন") { echo "selected"; } ?>>নিম্ন</option>
                                                    </select>
                                                </td>
                                                <?php if ($i != 0) { ?>
                                                    <td><button type='button' onclick="delete_language_row('<?php echo $i ?>')" class='closebtn btn-danger'><i class='fas fa-trash'></i></button></td>
                                                    <?php } else { ?>
                                                    <td><button type="button" onclick="add_lang_more()" style="color:#2196f3" class="closebtn"><i class="fa fa-plus"></i></button></td>
                                                <?php } ?>
                                            </tr>
                                            <?php $i++; } } else { ?>
                                                <tr id="row_lang0">
                                                    <td class="text-center align-middle">
                                                        <input type="text" name="language_name[]" id="language_name0" class="form-control" value="">

                                                    </td>
                                                    
                                                    <td class="text-center align-middle">
                                                        <select name="reading_skill[]" id="reading_skill0" class="form-control">
                                                            <option value="">---select---</option>
                                                            <option value="উচ্চ">উচ্চ</option>
                                                            <option value="মধ্যম">মধ্যম</option>
                                                            <option value="নিম্ন">নিম্ন</option>
                                                        </select>
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <select name="wirting_skill[]" id="wirting_skill0" class="form-control">
                                                            <option value="">---select---</option>
                                                            <option value="উচ্চ">উচ্চ</option>
                                                            <option value="মধ্যম">মধ্যম</option>
                                                            <option value="নিম্ন">নিম্ন</option>
                                                        </select>
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <select name="speaking_skill[]" id="speaking_skill0" class="form-control">
                                                            <option value="">---select---</option>
                                                            <option value="উচ্চ">উচ্চ</option>
                                                            <option value="মধ্যম">মধ্যম</option>
                                                            <option value="নিম্ন">নিম্ন</option>
                                                        </select>
                                                    </td>
                                                    <td><button type="button" onclick="add_lang_more()" style="color: #2196f3" class="closebtn"><i class="fa fa-plus"></i></button></td>
                                                </tr>
                                            <?php } } else { ?>
                                                
                                                <tr id="row_lang0">
                                                    <td class="text-center align-middle">
                                                        <input type="text" name="language_name[]"  id="language_name0" class="form-control" value="">

                                                    </td>
                                                    
                                                    <td class="text-center align-middle">
                                                        <select name="reading_skill[]" id="reading_skill0" class="form-control">
                                                            <option value="">---select---</option>
                                                            <option value="উচ্চ">উচ্চ</option>
                                                            <option value="মধ্যম">মধ্যম</option>
                                                            <option value="নিম্ন">নিম্ন</option>
                                                        </select>
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <select name="wirting_skill[]" id="wirting_skill0" class="form-control">
                                                            <option value="">---select---</option>
                                                            <option value="উচ্চ">উচ্চ</option>
                                                            <option value="মধ্যম">মধ্যম</option>
                                                            <option value="নিম্ন">নিম্ন</option>
                                                        </select>
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <select name="speaking_skill[]" id="speaking_skill0" class="form-control">
                                                            <option value="">---select---</option>
                                                            <option value="উচ্চ">উচ্চ</option>
                                                            <option value="মধ্যম">মধ্যম</option>
                                                            <option value="নিম্ন">নিম্ন</option>
                                                        </select>
                                                    </td>
                                                    <td><button type="button" onclick="add_lang_more()" style="color: #2196f3" class="closebtn"><i class="fa fa-plus"></i></button></td>
                                                </tr>
                                            <?php } ?>
                                        </table>
                                    </div>  
                                </div><!--./col-md-12-->
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-5">ইমেজ আপলোড (jpg|png) <span style="color:red">*</span></div>
                                        <div class="col-6">
                                            <input onchange="preview_image(event)" type="file" name="applicant_image"
                                                    class="form-control-file" value="" id="applicant_image">
                                            
                                            <img id="output_image" <?php if (!empty($applicant_info->r_image)){?> src="<?php echo base_url('assets/uploads/applicant/'.$applicant_info->r_image); ?>" <?php } ?> width="300" height="200">
                                            <input type="hidden" value="<?= $applicant_info->r_image ?>" name="applicant_img">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <h4>দক্ষতা </h4>
                                    <div class="row">
                                        <div class="col-md-12" style="clear:both;">
                                            <div class="">
                                                <table class="table table-striped table-bordered table-hover" id="tableID7">
                                                    <thead>
                                                        <tr style="font-size: 13px">

                                                            <th class="text-center">দক্ষতা <small class="req" style="color:red;"> *</small></th>
                                                            <th class="text-center">অভিজ্ঞতা সময়কাল <small class="req" style="color:red;"> *</small></th>
                                                            <th class="text-center">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <?php if(!empty($applicant_info)) {
                                                        $where_data_skill['as_r_candidate_id'] = $applicant_info->r_candidate_id;
                                                        $where_data_skill['as_status'] = 1;
                                                        $skill = $this->Common->get_data_multi_conditional('applicant_skill',$where_data_skill)->result();
                                                        if(!empty($skill)) {
                                                        $i=0;
                                                        foreach($skill as $value) {
                                                    ?>
                                                    <input type="hidden" name="as_id[]" id="as_id<?php echo $i; ?>" value="<?php echo $value->as_id; ?>">
                                                    <tr id="row_skill<?php echo $i ?>">
                                                        <td class="text-center align-middle">
                                                            <input type="text" name="skill_name[]"  id="skill_name<?php echo $i ?>" class="form-control" value="<?php echo $value->as_skill_name; ?>">

                                                        </td>
                                                        <td class="text-center align-middle">
                                                            <input type="text" name="duration[]"  id="duration<?php echo $i ?>" class="form-control" value="<?php echo $value->as_duration; ?>">

                                                        </td>
                                                    
                                                        <?php if ($i != 0) { ?>
                                                            <td><button type='button' onclick="delete_skill_row('<?php echo $i ?>')" class='closebtn btn-danger'><i class='fas fa-trash'></i></button></td>
                                                            <?php } else { ?>
                                                            <td><button type="button" onclick="add_skill_more()" style="color:#2196f3" class="closebtn"><i class="fa fa-plus"></i></button></td>
                                                        <?php } ?>
                                                    </tr>
                                                    <?php $i++; } } else { ?>
                                                        <tr id="row_skill0">
                                                            <td class="text-center align-middle">
                                                                <input type="text" name="skill_name[]" id="skill_name0" class="form-control" value="">

                                                            </td>
                                                            <td class="text-center align-middle">
                                                                <input type="text" name="duration[]"  id="duration0" class="form-control" value="">

                                                            </td>
                                                            
                                                            <td><button type="button" onclick="add_skill_more()" style="color: #2196f3" class="closebtn"><i class="fa fa-plus"></i></button></td>
                                                        </tr>
                                                    <?php } } else { ?>
                                                        
                                                        <tr id="row_skill0">
                                                            <td class="text-center align-middle">
                                                                <input type="text" name="skill_name[]"  id="skill_name0" class="form-control" value="">

                                                            </td>
                                                            <td class="text-center align-middle">
                                                                <input type="text" name="duration[]"  id="duration0" class="form-control" value="">

                                                            </td>
                                                            
                                                            <td><button type="button" onclick="add_skill_more()" style="color: #2196f3" class="closebtn"><i class="fa fa-plus"></i></button></td>
                                                        </tr>
                                                    <?php } ?>
                                                </table>
                                            </div>  
                                        </div><!--./col-md-12-->
                                    </div>
                                </div>
                                <div class="col-12 text-center">
                                <input type="hidden" name="r_candidate_id" value="<?php if(!empty($applicant_info)) { echo $applicant_info->r_candidate_id; } ?>">
                                <input type="hidden" name="r_a_id" value="<?php if(!empty($applicant_info)) { echo $applicant_info->r_a_id; } ?>">
                                    <input type="submit" value="Update" class="btn btn-info">
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<script src="<?php echo base_url('') ?>assets/backend/plugins/jquery/jquery.min.js"></script>

<script>
    
    function check(input) {
        if (input.value != document.getElementById('password').value) {
            document.getElementById("output").innerHTML = "Password not matched!";
        } else {
            document.getElementById("output").innerHTML = "Password matched!";
        }
    }
	$(document).ready(function () {
		$("#NumberCode").change(function () {
			var NumberCode = $('#NumberCode').val();
			$.ajax({
				type: 'POST',
				url: "<?php echo base_url('Recruitment/check_number_code') ?>",
				data: 'NumberCode=' + NumberCode,

				success: function (resp) {
					$('#number_result').html(resp);
				}
			});

		});


	});
	function preview_image(event) {
		var reader = new FileReader();
		reader.onload = function () {
			var output = document.getElementById('output_image');
			output.src = reader.result;
		}
		reader.readAsDataURL(event.target.files[0]);
	}

    function addMore() {
        var table = document.getElementById("tableID2");
        var table_len = (table.rows.length);
        var id = parseInt(table_len - 1);
        var div = '<td><input type="text" name="training_name[]"  id="training_name'+ id +'" class="form-control" value=""></td><td><input type="text" name="training_subject[]"  id="training_subject'+ id +'" class="form-control"></td><td><input type="text" name="training_institution[]"  id="training_institution'+ id +'" class="form-control"></td><td><input type="text" name="training_institution_address[]"  id="training_institution_address'+ id +'" class="form-control"></td><td><input type="text" name="training_country[]"  id="training_country'+ id +'" class="form-control" value=""></td><td><input type="text" name="training_year[]"  id="training_year'+ id +'" class="form-control" value=""></td><td><input type="text" name="training_duration[]"  id="training_duration'+ id +'" class="form-control"></td>';

        var row = table.insertRow(table_len).outerHTML = "<tr id='row" + id + "'>" + div + "<td><button type='button' onclick='delete_row(" + id + ")' class='closebtn btn-danger'><i class='fas fa-trash'></i></button></td></tr>";
        
    }
    
    function delete_row(id) {
        var table = document.getElementById("tableID2");
        var rowCount = table.rows.length;
        $("#row" + id).remove();
    }

    function add_more() {
        var table = document.getElementById("tableID3");
        var table_len = (table.rows.length);
        var id = parseInt(table_len - 1);
        var div = '<td><input type="text" name="certification_name[]"  id="certification_name'+ id +'" class="form-control" value=""></td><td><input type="text" name="certification_institution[]"  id="certification_institution'+ id +'" class="form-control"></td><td><input type="text" name="certification_institution_address[]"  id="certification_institution_address'+ id +'" class="form-control"></td><td><input type="text" name="certification_duration_start[]"  id="certification_duration_start'+ id +'" class="form-control"></td><td><input type="text" name="certification_duration_end[]"  id="certification_duration_end'+ id +'" class="form-control"></td>';

        var row = table.insertRow(table_len).outerHTML = "<tr id='row_" + id + "'>" + div + "<td><button type='button' onclick='delete_profession_row(" + id + ")' class='closebtn btn-danger'><i class='fas fa-trash'></i></button></td></tr>";
        
    }
    
    function delete_profession_row(id) {
        var table = document.getElementById("tableID3");
        var rowCount = table.rows.length;
        $("#row_" + id).remove();
    }

    function add_emp_more() {
        var table = document.getElementById("tableID4");
        var table_len = (table.rows.length);
        var id = parseInt(table_len - 1);
        var div = '<td><input type="text" name="company_name[]"  id="company_name'+ id +'" class="form-control" value=""></td><td><input type="text" name="company_business[]"  id="company_business'+ id +'" class="form-control"></td><td><input type="text" name="company_address[]"  id="company_address'+ id +'" class="form-control"></td><td><input type="text" name="company_designation[]"  id="company_designation'+ id +'" class="form-control"></td><td><input type="text" name="company_department[]"  id="company_department'+ id +'" class="form-control"></td><td><input type="text" name="company_duration_start[]"  id="company_duration_start'+ id +'" class="form-control"></td><td><input type="text" name="company_duration_end[]"  id="company_duration_end'+ id +'" class="form-control"></td><td><input type="text" name="company_responsilities[]"  id="company_responsilities'+ id +'" class="form-control"></td>';

        var row = table.insertRow(table_len).outerHTML = "<tr id='row_emp" + id + "'>" + div + "<td><button type='button' onclick='delete_employment_row(" + id + ")' class='closebtn btn-danger'><i class='fas fa-trash'></i></button></td></tr>";
        
    }
    
    function delete_employment_row(id) {
        var table = document.getElementById("tableID4");
        var rowCount = table.rows.length;
        $("#row_emp" + id).remove();
    }
    
    function add_ref_more() {
        var table = document.getElementById("tableID5");
        var table_len = (table.rows.length);
        var id = parseInt(table_len - 1);
        var div = '<td><input type="text" name="reference_name[]"  id="reference_name'+ id +'" class="form-control" value=""></td><td><input type="text" name="designation[]"  id="designation'+ id +'" class="form-control"></td><td><input type="text" name="organization[]"  id="organization'+ id +'" class="form-control"></td><td><input type="text" name="relation[]"  id="relation'+ id +'" class="form-control"></td><td><input type="text" name="ref_email[]"  id="email'+ id +'" class="form-control"></td><td><input type="text" name="mobile[]"  id="mobile'+ id +'" class="form-control"></td><td><input type="text" name="address[]"  id="address'+ id +'" class="form-control"></td>';

        var row = table.insertRow(table_len).outerHTML = "<tr id='row_ref" + id + "'>" + div + "<td><button type='button' onclick='delete_reference_row(" + id + ")' class='closebtn btn-danger'><i class='fas fa-trash'></i></button></td></tr>";
        
    }
    
    function delete_reference_row(id) {
        var table = document.getElementById("tableID5");
        var rowCount = table.rows.length;
        $("#row_ref" + id).remove();
    }

    function add_lang_more() {
        var table = document.getElementById("tableID6");
        var table_len = (table.rows.length);
        var id = parseInt(table_len - 1);
        var div = '<td class="text-center align-middle"><input type="text" name="language_name[]" id="language_name'+ id +'" class="form-control" value=""></td><td class="text-center align-middle"><select name="reading_skill[]" id="reading_skill'+ id +'" class="form-control"><option value="">---select---</option><option value="উচ্চ">উচ্চ</option><option value="মধ্যম">মধ্যম</option><option value="নিম্ন">নিম্ন</option></select></td><td class="text-center align-middle"><select name="wirting_skill[]" id="wirting_skill'+ id +'" class="form-control"><option value="">---select---</option><option value="উচ্চ">উচ্চ</option><option value="মধ্যম">মধ্যম</option><option value="নিম্ন">নিম্ন</option></select></td><td class="text-center align-middle"><select name="speaking_skill[]" id="speaking_skill'+ id +'" class="form-control"><option value="">---select---</option><option value="উচ্চ">উচ্চ</option><option value="মধ্যম">মধ্যম</option><option value="নিম্ন">নিম্ন</option></select></td>';

        var row = table.insertRow(table_len).outerHTML = "<tr id='row_lang" + id + "'>" + div + "<td><button type='button' onclick='delete_language_row(" + id + ")' class='closebtn btn-danger'><i class='fas fa-trash'></i></button></td></tr>";
        
    }
    
    function delete_language_row(id) {
        var table = document.getElementById("tableID6");
        var rowCount = table.rows.length;
        $("#row_lang" + id).remove();
    }

    function add_skill_more() {
        var table = document.getElementById("tableID7");
        var table_len = (table.rows.length);
        var id = parseInt(table_len - 1);
        var div = '<td class="text-center align-middle"><input type="text" name="skill_name[]" id="skill_name'+ id +'" class="form-control" value=""></td><td class="text-center align-middle"><input type="text" name="duration[]" id="duration'+ id +'" class="form-control" value=""></td>';

        var row = table.insertRow(table_len).outerHTML = "<tr id='row_skill" + id + "'>" + div + "<td><button type='button' onclick='delete_skill_row(" + id + ")' class='closebtn btn-danger'><i class='fas fa-trash'></i></button></td></tr>";
        
    }
    
    function delete_skill_row(id) {
        var table = document.getElementById("tableID7");
        var rowCount = table.rows.length;
        $("#row_skill" + id).remove();
    }

</script>