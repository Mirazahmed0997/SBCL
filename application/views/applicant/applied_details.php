<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="card-title">আবেদনকারীর বিস্তারিত</h3>
                        </div>
                    </div>
                    
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <h3>শিরোনামঃ <?php if(!empty($applied_details)) { echo $applied_details->rec_job_title; } ?></h3>
                            <p>আবেদনের তারিখঃ <?php if(!empty($applied_details)) { echo $applied_details->ap_created_at; } ?></p>
                            <p>পদবীঃ <?php if(!empty($applied_details)) { 
                                                $where_data_des['d_id'] = $applied_details->rec_designation;
                                                $where_data_des['d_status'] = 1;
                                                $designation = $this->Common->get_data_multi_conditional('designation', $where_data_des)->row();
                                            echo $designation->d_name; } ?></td></p>
                            <p>আইডি নম্বরঃ <?php if(!empty($applied_details)) { echo $applied_details->r_candidate_id; } ?></p>
                        </div>
                        <div class="col-3 text-right">
                        <img src="<?php echo base_url(); ?>assets/uploads/applicant/<?php if(!empty($applied_details)) { echo $applied_details->r_image; } ?>" style="width:200px;height:200px;" alt="Image">
                        </div>
                        <div class="col-6">
                            <?php echo "<br>"; ?>
                            <h4>ব্যক্তিগত তথ্য</h4>
                            <div class="row">
                                <div class="col-3">প্রথম নাম</div>
                                <div class="col-1">:</div>
                                <div class="col-8"><?php if(!empty($applied_details)) { echo $applied_details->r_first_name; } ?></div>
                            </div>
                            <div class="row">
                                <div class="col-3">পিতার নাম</div>
                                <div class="col-1">:</div>
                                <div class="col-8"><?php if(!empty($applied_details)) { echo $applied_details->r_father_name; } ?></div>
                            </div>
                            <div class="row">
                                <div class="col-3">পিতার পেশা</div>
                                <div class="col-1">:</div>
                                <div class="col-8"><?php if(!empty($applied_details)) { echo $applied_details->r_father_profession; } ?></div>
                            </div>
                            <div class="row">
                                <div class="col-3">লিঙ্গ</div>
                                <div class="col-1">:</div>
                                <div class="col-8"><?php if(!empty($applied_details)) { echo $applied_details->r_gender; } ?></div>
                            </div>
                            <div class="row">
                                <div class="col-3">বৈবাহিক অবস্থা</div>
                                <div class="col-1">:</div>
                                <div class="col-8"><?php if(!empty($applied_details)) { echo $applied_details->r_maritial_status; } ?></div>
                            </div>
                            <div class="row">
                                <div class="col-3">জাতীয়তা</div>
                                <div class="col-1">:</div>
                                <div class="col-8"><?php if(!empty($applied_details)) { echo $applied_details->r_nationality; } ?></div>
                            </div>
                            <div class="row">
                                <div class="col-3">ধর্ম</div>
                                <div class="col-1">:</div>
                                <div class="col-8"><?php if(!empty($applied_details)) { echo $applied_details->r_religion; } ?></div>
                            </div>
                            <div class="row">
                                <div class="col-3">মোবাইল </div>
                                <div class="col-1">:</div>
                                <div class="col-8"><?php if(!empty($applied_details)) { echo $applied_details->r_primary_mobile; } ?></div>
                            </div>
                            <div class="row">
                                <div class="col-3">বাসার মোবাইল </div>
                                <div class="col-1">:</div>
                                <div class="col-8"><?php if(!empty($applied_details)) { echo $applied_details->r_home_mobile; } ?></div>
                            </div>
                            <div class="row">
                                <div class="col-3">অফিস মোবাইল</div>
                                <div class="col-1">:</div>
                                <div class="col-8"><?php if(!empty($applied_details)) { echo $applied_details->r_office_mobile; } ?></div>
                            </div>
                            <div class="row">
                                <div class="col-3">ই-মেইল</div>
                                <div class="col-1">:</div>
                                <div class="col-8"><?php if(!empty($applied_details)) { echo $applied_details->r_email; } ?></div>
                            </div>
                        </div>
                        <div class="col-6">
                            <?php echo "<br><br>"; ?>
                            <div class="row">
                                <div class="col-3">শেষ নাম</div>
                                <div class="col-1">:</div>
                                <div class="col-8"><?php if(!empty($applied_details)) { echo $applied_details->r_last_name; } ?></div>
                            </div>
                            <div class="row">
                                <div class="col-3">মাতার নাম</div>
                                <div class="col-1">:</div>
                                <div class="col-8"><?php if(!empty($applied_details)) { echo $applied_details->r_mother_name; } ?></div>
                            </div>
                            <div class="row">
                                <div class="col-3">মাতার পেশা</div>
                                <div class="col-1">:</div>
                                <div class="col-8"><?php if(!empty($applied_details)) { echo $applied_details->r_mother_profession; } ?></div>
                            </div>
                            <div class="row">
                                <div class="col-3">জন্ম তারিখ</div>
                                <div class="col-1">:</div>
                                <div class="col-8"><?php if(!empty($applied_details)) { echo $applied_details->r_birth_date; } ?></div>
                            </div>
                            <div class="row">
                                <div class="col-3">বয়স</div>
                                <div class="col-1">:</div>
                                <div class="col-8"><?php if(!empty($applied_details)) { echo $applied_details->r_age; } ?></div>
                            </div>
                            <div class="row">
                                <div class="col-3">রক্তের গ্রুপ</div>
                                <div class="col-1">:</div>
                                <div class="col-8"><?php if(!empty($applied_details)) { echo $applied_details->r_blood_group; } ?></div>
                            </div>
                            <div class="row">
                                <div class="col-3">এনআইডি</div>
                                <div class="col-1">:</div>
                                <div class="col-8"><?php if(!empty($applied_details)) { echo $applied_details->r_nid; } ?></div>
                            </div>
                            <div class="row">
                                <div class="col-3">গ্রাম</div>
                                <div class="col-1">:</div>
                                <div class="col-8"><?php if(!empty($applied_details)) { echo $applied_details->r_village; } ?></div>
                            </div>
                            <div class="row">
                                <div class="col-3">পোস্ট </div>
                                <div class="col-1">:</div>
                                <div class="col-8"><?php if(!empty($applied_details)) { echo $applied_details->r_post; } ?></div>
                            </div>
                            <div class="row">
                                <div class="col-3">উপজেলা</div>
                                <div class="col-1">:</div>
                                <div class="col-8"><?php if(!empty($applied_details)) { echo $applied_details->r_upazila; } ?></div>
                            </div>
                            <div class="row">
                                <div class="col-3">জেলা</div>
                                <div class="col-1">:</div>
                                <div class="col-8"><?php if(!empty($applied_details)) { echo $applied_details->r_district; } ?></div>
                            </div>
                            <div class="row">
                                <div class="col-3">বিভাগ</div>
                                <div class="col-1">:</div>
                                <div class="col-8"><?php if(!empty($applied_details)) { echo $applied_details->r_division; } ?></div>
                            </div>
                            <div class="row">
                                <div class="col-3">বর্তমান ঠিকানা</div>
                                <div class="col-1">:</div>
                                <div class="col-8"><?php if(!empty($applied_details)) { echo $applied_details->r_present_address; } ?></div>
                            </div>
                        </div>
                        <div class="col-12">
                            <h4>শিক্ষাগত যোগ্যতা</h4>
                            <table class="table table-striped table-bordered table-hover" id="tableID">
                                <thead>
                                    <tr style="font-size: 13px">

                                        <th class="text-center">পরীক্ষার নাম </th>
                                        <th class="text-center">শিক্ষা প্রতিষ্ঠানের নাম </th>
                                        <th class="text-center">শিক্ষা বোর্ড </th>
                                        <th class="text-center">প্রাপ্ত জিপিএ/সিজিপিএ </th>
                                        <th class="text-center">উত্তীর্ণ সাল </th>
                                    </tr>
                                </thead>
                                <?php if(!empty($applied_details)) {
                                    $where_data['ae_r_candidate_id'] = $applied_details->ap_r_candidate_id;
                                    $where_data['ae_status'] = 1;
                                    $education = $this->Common->get_data_multi_conditional('applicant_education',$where_data)->result();
                                    foreach($education as $value) {
                                   ?>
                                <tr>
                                    <td class="text-center"><?php echo $value->ae_exam_name; ?></td>
                                    <td class="text-center"><?php echo $value->ae_institute_name; ?></td>
                                    <td class="text-center"><?php echo $value->ae_education_board; ?></td>
                                    <td class="text-center"><?php echo $value->ae_gpa; ?></td>
                                    <td class="text-center"><?php echo $value->ae_pass_year; ?></td>
                                    
                                </tr>
                                <?php } } ?>
                            </table>
                        </div>
                        <div class="col-12">
                            <h4>প্রশিক্ষণ তথ্য</h4>
                            <table class="table table-striped table-bordered table-hover" id="tableID">
                                <thead>
                                    <tr style="font-size: 13px">

                                    <th class="text-center">প্রশিক্ষণ শিরোনাম </th>
                                    <th class="text-center">বিষয় কভার </th>
                                    <th class="text-center">শিক্ষা প্রতিষ্ঠানের নাম </th>
                                    <th class="text-center">ঠিকানা </th>
                                    <th class="text-center">দেশ </th>
                                    <th class="text-center">প্রশিক্ষণের বছর </th>
                                    <th class="text-center">প্রশিক্ষণ সময়কাল </th>
                                    </tr>
                                </thead>
                                <?php if(!empty($applied_details)) {
                                    $where_data_training['at_r_candidate_id'] = $applied_details->r_candidate_id;
                                    $where_data_training['at_status'] = 1;
                                    $training = $this->Common->get_data_multi_conditional('applicant_training',$where_data_training)->result();
                                    foreach($training as $value) {
                                   ?>
                                <tr>
                                    <td class="text-center"><?php echo $value->at_training_name; ?></td>
                                    <td class="text-center"><?php echo $value->at_training_subject; ?></td>
                                    <td class="text-center"><?php echo $value->at_training_institution; ?></td>
                                    <td class="text-center"><?php echo $value->at_training_institution_address; ?></td>
                                    <td class="text-center"><?php echo $value->at_training_country; ?></td>
                                    <td class="text-center"><?php echo $value->at_training_year; ?></td>
                                    <td class="text-center"><?php echo $value->at_training_duration; ?></td>
                                    
                                </tr>
                                <?php } } ?>
                            </table>
                        </div>
                        <div class="col-12">
                            <h4>পেশাগত প্রশংসাপত্র</h4>
                            <table class="table table-striped table-bordered table-hover" id="tableID">
                                <thead>
                                    <tr style="font-size: 13px">

                                    <th class="text-center">প্রশংসাপত্রদান </th>
                                    <th class="text-center">শিক্ষা প্রতিষ্ঠানের নাম </th>
                                    <th class="text-center">ঠিকানা </th>
                                    <th class="text-center">সময়কাল শুরু </th>
                                    <th class="text-center">সময়কাল শেষ </th>
                                    </tr>
                                </thead>
                                <?php if(!empty($applied_details)) {
                                    $where_data_certi['ac_r_candidate_id'] = $applied_details->r_candidate_id;
                                    $where_data_certi['ac_status'] = 1;
                                    $certification = $this->Common->get_data_multi_conditional('applicant_certification',$where_data_certi)->result();
                                    foreach($certification as $value) {
                                   ?>
                                <tr>
                                    <td class="text-center"><?php echo $value->ac_certification_name; ?></td>
                                    <td class="text-center"><?php echo $value->ac_certification_institution; ?></td>
                                    <td class="text-center"><?php echo $value->ac_certification_institution_address; ?></td>
                                    <td class="text-center"><?php echo $value->ac_certification_duration_start; ?></td>
                                    <td class="text-center"><?php echo $value->ac_certification_duration_end; ?></td>
                                    
                                </tr>
                                <?php } } ?>
                            </table>
                        </div>
                        <div class="col-12">
                            <h4>কর্মসংস্থান ইতিহাস</h4>
                            <table class="table table-striped table-bordered table-hover" id="tableID">
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
                                    <th class="text-center">দক্ষতা সমূহ <small class="req" style="color:red;">*</small></th>
                                    </tr>
                                </thead>
                                <?php if(!empty($applied_details)) {
                                    $where_data_emp['aeh_r_candidate_id'] = $applied_details->r_candidate_id;
                                    $where_data_emp['aeh_status'] = 1;
                                    $employment = $this->Common->get_data_multi_conditional('applicant_employment_history',$where_data_emp)->result();
                                    foreach($employment as $value) {
                                   ?>
                                <tr>
                                    <td class="text-center"><?php echo $value->aeh_company_name; ?></td>
                                    <td class="text-center"><?php echo $value->aeh_company_business; ?></td>
                                    <td class="text-center"><?php echo $value->aeh_company_address; ?></td>
                                    <td class="text-center"><?php echo $value->aeh_company_designation; ?></td>
                                    <td class="text-center"><?php echo $value->aeh_company_department; ?></td>
                                    <td class="text-center"><?php echo $value->aeh_company_duration_start; ?></td>
                                    <td class="text-center"><?php echo $value->aeh_company_duration_end; ?></td>
                                    <td class="text-center"><?php echo $value->aeh_company_responsilities; ?></td>
                                    <td class="text-center"><?php echo $value->aeh_experties; ?></td>
                                    
                                </tr>
                                <?php } } ?>
                            </table>
                        </div>
                        <?php if(!empty($applied_details)) {
                            $where_data_skill['as_r_candidate_id'] = $applied_details->r_candidate_id;
                            $where_data_skill['as_status'] = 1;
                            $skill = $this->Common->get_data_multi_conditional('applicant_skill',$where_data_skill)->result();
                            if(!empty($skill)) {
                            ?>
                            <div class="col-12">
                                <h4 class="text-left">দক্ষতা সমূহ</h4>
                                <ul style="list-style-type:none;">
                                <?php   foreach($skill as $value) {
                                ?>
                                <li class="text-left"><i class="far fa-hand-point-right"></i> <?php echo $value->as_skill_name.' ('.$value->as_duration.')' ;?></li>
                                <?php }  ?> 
                                </ul>
                            </div>
                        <?php } } ?> 

                        
                        <?php if(!empty($applied_details)) {
                                    $where_data_lang['al_r_candidate_id'] = $applied_details->r_candidate_id;
                                    $where_data_lang['al_status'] = 1;
                                    $language = $this->Common->get_data_multi_conditional('applicant_language',$where_data_lang)->result();
                                  if(!empty($language)) {
                                   ?>
                        
                            <div class="col-12">
                                <h4>ভাষা</h4>
                                <table class="table table-striped table-bordered table-hover" id="tableID">
                                    <thead>
                                        <tr style="font-size: 13px">
                                            <th class="text-center">ভাষা নাম </th>
                                            <th class="text-center">পড়ার দক্ষতা </th>
                                            <th class="text-center">লেখার দক্ষতা </th>
                                            <th class="text-center">কথা বলার দক্ষতা </th>
                                        </tr>
                                    </thead>
                                    <?php 
                                        foreach($language as $value) {
                                    ?>
                                    <tr>
                                        <td class="text-center"><?php echo $value->al_language_name; ?></td>
                                        <td class="text-center"><?php echo $value->al_reading_skill; ?></td>
                                        <td class="text-center"><?php echo $value->al_wirting_skill; ?></td>
                                        <td class="text-center"><?php echo $value->al_speaking_skill; ?></td>
                                        
                                    </tr>
                                    <?php } ?>
                                </table>
                            </div>
                        <?php } } ?> 
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>