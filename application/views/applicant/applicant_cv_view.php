
<div id="printableArea">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="card-title">সিভি</h3>
                        </div>
                    </div>
                    
                </div>
                

                <div class="card-body">
                    <div class="row text-right" id="print_button" style="margin-bottom: 20px;">
                        <div class="col-8"></div>
                        <div class="col-2">
                            <button class="btn btn-primary" onclick="printDiv('printableArea')"><i class="fas fa-print"> Print</i></button>
                        </div>
                        <div class="col-2">
                            <form action="<?php echo base_url(); ?>Applicant/applicant_cv_edit" method="post">
                                <input type="hidden" name="r_candidate_id" value="<?php echo $applicant_info->r_candidate_id; ?>">
                                
                                <button type="submit" class="btn bg-info">Edit CV</button>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <h3><?php if(!empty($applicant_info)) { echo $applicant_info->r_first_name.' '.$applicant_info->r_last_name; } ?></h3>
                            <br>
                            <p><?php if(!empty($applicant_info)) { echo 'আইডি নম্বরঃ '.$applicant_info->r_candidate_id; } ?><br><?php if(!empty($applicant_info)) { echo 'ঠিকানাঃ '.$applicant_info->r_present_address; } ?><br>
                            <?php if(!empty($applicant_info)) { echo 'মোবাইল নম্বরঃ '.$applicant_info->r_primary_mobile; } ?><br><?php if(!empty($applicant_info)) { echo 'ইমেইলঃ '.$applicant_info->r_email; } ?></p>
                        </div>
                        <div class="col-4 text-center">
                            <img src="<?php echo base_url(); ?>assets/uploads/applicant/<?php if(!empty($applicant_info)) { echo $applicant_info->r_image; } ?>" style="width:200px;height:200px;" alt="Image">
                        </div>
                        <?php if(!empty($applicant_info->r_career_objective)) {  ?>
                            <div class="col-12">
                                <h4>পেশাগত লক্ষ্য</h4>
                                <?php echo $applicant_info->r_career_objective; ?>
                            </div>
                        <?php } ?>
                        <?php if(!empty($applicant_info->r_profile_summary)) {  ?>
                            <div class="col-12">
                                <?php echo "<br>"; ?>
                                <h4>সংক্ষিপ্ত প্রোফাইল</h4>
                                <?php echo $applicant_info->r_profile_summary; ?>
                            </div>
                        <?php } ?>
                        
                        <?php if(!empty($applicant_info)) {
                                    $where_data['ae_r_candidate_id'] = $applicant_info->r_candidate_id;
                                    $where_data['ae_status'] = 1;
                                    $education = $this->Common->get_data_multi_conditional('applicant_education',$where_data)->result();
                                    if(!empty($education)) {
                                   ?>
                        <div class="col-12">
                            <br>
                            <h4>শিক্ষাগত যোগ্যতা</h4>
                            <table class="table table-striped table-bordered table-hover" id="tableID">
                                <thead>
                                    <tr style="font-size: 13px">

                                        <th class="text-center">পরীক্ষার নাম </th>
                                        <th class="text-center">শিক্ষা প্রতিষ্ঠানের নাম </th>
                                        <th class="text-center">শিক্ষা বোর্ড </th>
                                        <th class="text-center">বিভাগ</th>
                                        <th class="text-center">জিপিএ/সিজিপিএ </th>
                                        <th class="text-center">প্রাপ্ত জিপিএ/সিজিপিএ </th>
                                        <th class="text-center">উত্তীর্ণ সাল </th>
                                    </tr>
                                </thead>
                                <?php 
                                    foreach($education as $value) {
                                   ?>
                                <tr>
                                    <td class="text-center"><?php echo $value->ae_exam_name; ?></td>
                                    <td class="text-center"><?php echo $value->ae_institute_name; ?></td>
                                    <td class="text-center"><?php echo $value->ae_education_board; ?></td>
                                    <td class="text-center"><?php echo $value->ae_group; ?></td>
                                    <td class="text-center"><?php echo $value->ae_gpa; ?></td>
                                    <td class="text-center"><?php echo $value->ae_get_gpa; ?></td>
                                    <td class="text-center"><?php echo $value->ae_pass_year; ?></td>
                                    
                                </tr>
                                <?php } ?>
                            </table>
                        </div>
                        <?php } } ?>
                        
                        <?php if(!empty($applicant_info)) {
                                    $where_data_training['at_r_candidate_id'] = $applicant_info->r_candidate_id;
                                    $where_data_training['at_status'] = 1;
                                    $training = $this->Common->get_data_multi_conditional('applicant_training',$where_data_training)->result();
                                    if(!empty($training)) {
                                   ?>
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
                                <?php 
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
                                <?php } ?>
                            </table>
                        </div>
                        <?php } } ?>
                        
                        <?php if(!empty($applicant_info)) {
                                    $where_data_certi['ac_r_candidate_id'] = $applicant_info->r_candidate_id;
                                    $where_data_certi['ac_status'] = 1;
                                    $certification = $this->Common->get_data_multi_conditional('applicant_certification',$where_data_certi)->result();
                                    if(!empty($certification)) {
                                   ?>
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
                                <?php 
                                    foreach($certification as $value) {
                                   ?>
                                <tr>
                                    <td class="text-center"><?php echo $value->ac_certification_name; ?></td>
                                    <td class="text-center"><?php echo $value->ac_certification_institution; ?></td>
                                    <td class="text-center"><?php echo $value->ac_certification_institution_address; ?></td>
                                    <td class="text-center"><?php echo $value->ac_certification_duration_start; ?></td>
                                    <td class="text-center"><?php echo $value->ac_certification_duration_end; ?></td>
                                    
                                </tr>
                                <?php } ?>
                            </table>
                        </div>
                        <?php } } ?>
                        
                        <?php if(!empty($applicant_info)) {
                                    $where_data_emp['aeh_r_candidate_id'] = $applicant_info->r_candidate_id;
                                    $where_data_emp['aeh_status'] = 1;
                                    $employment = $this->Common->get_data_multi_conditional('applicant_employment_history',$where_data_emp)->result();
                                    if(!empty($employment)) {
                                   ?>
                        <div class="col-12">
                            <h4>কর্মসংস্থান ইতিহাস</h4>
                            <table class="table table-striped table-bordered table-hover" id="tableID">
                                <thead>
                                    <tr style="font-size: 13px">

                                    <th class="text-center">কোম্পানি নাম </th>
                                    <th class="text-center">কোম্পানি বিজিনেস </th>
                                    <th class="text-center">কোম্পানি ঠিকানা </th>
                                    <th class="text-center">পদবী </th>
                                    <th class="text-center">ডিপার্টমেন্ট </th>
                                    <th class="text-center">কর্মসংস্থান সময়কাল শুরু </th>
                                    <th class="text-center">কর্মসংস্থান সময়কাল শেষ </th>
                                    <th class="text-center">দায়িত্ব </th>
                                    </tr>
                                </thead>
                                <?php 
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
                                    
                                </tr>
                                <?php } ?>
                            </table>
                        </div>
                        <?php } } ?>
                        <?php if(!empty($applicant_info)) {
                            $where_data_skill['as_r_candidate_id'] = $applicant_info->r_candidate_id;
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

                        
                        <?php if(!empty($applicant_info)) {
                                    $where_data_lang['al_r_candidate_id'] = $applicant_info->r_candidate_id;
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
                        <div class="col-6">
                            <?php echo "<br>"; ?>
                            <h4>ব্যক্তিগত তথ্য</h4>
                            <div class="row">
                                <div class="col-3">পিতার নাম</div>
                                <div class="col-1">:</div>
                                <div class="col-8"><?php if(!empty($applicant_info)) { echo $applicant_info->r_father_name; } ?></div>
                            </div>
                            <div class="row">
                                <div class="col-3">মাতার নাম</div>
                                <div class="col-1">:</div>
                                <div class="col-8"><?php if(!empty($applicant_info)) { echo $applicant_info->r_mother_name; } ?></div>
                            </div>
                            <div class="row">
                                <div class="col-3">জন্ম তারিখ</div>
                                <div class="col-1">:</div>
                                <div class="col-8"><?php if(!empty($applicant_info)) { echo $applicant_info->r_birth_date; } ?></div>
                            </div>
                            <div class="row">
                                <div class="col-3">রক্তের গ্রুপ</div>
                                <div class="col-1">:</div>
                                <div class="col-8"><?php if(!empty($applicant_info)) { echo $applicant_info->r_blood_group; } ?></div>
                            </div>
                            <div class="row">
                                <div class="col-3">এনআইডি</div>
                                <div class="col-1">:</div>
                                <div class="col-8"><?php if(!empty($applicant_info)) { echo $applicant_info->r_nid; } ?></div>
                            </div>
                            <div class="row">
                                <div class="col-3">লিঙ্গ</div>
                                <div class="col-1">:</div>
                                <div class="col-8"><?php if(!empty($applicant_info)) { echo $applicant_info->r_gender; } ?></div>
                            </div>
                            <div class="row">
                                <div class="col-3">বৈবাহিক অবস্থা</div>
                                <div class="col-1">:</div>
                                <div class="col-8"><?php if(!empty($applicant_info)) { echo $applicant_info->r_maritial_status; } ?></div>
                            </div>
                            <div class="row">
                                <div class="col-3">জাতীয়তা</div>
                                <div class="col-1">:</div>
                                <div class="col-8"><?php if(!empty($applicant_info)) { echo $applicant_info->r_nationality; } ?></div>
                            </div>
                            <div class="row">
                                <div class="col-3">ধর্ম</div>
                                <div class="col-1">:</div>
                                <div class="col-8"><?php if(!empty($applicant_info)) { echo $applicant_info->r_religion; } ?></div>
                            </div>
                            <div class="row">
                                <div class="col-3">স্থায়ী ঠিকানাঃ</div>
                                <div class="col-1">:</div>
                                <div class="col-8"><?php if(!empty($applicant_info)) { echo $applicant_info->r_village.', '.$applicant_info->r_post.', '.$applicant_info->r_upazila.', '.$applicant_info->r_district.', '.$applicant_info->r_division; } ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php if(!empty($applicant_info)) {
                                    $where_data_ref['ar_r_candidate_id'] = $applicant_info->r_candidate_id;
                                    $where_data_ref['ar_status'] = 1;
                                    $reference = $this->Common->get_data_multi_conditional('applicant_reference',$where_data_ref)->result();
                                    if(!empty($reference)) {
                                ?>
                                
                        <div class="col-6">
                            <br>
                            <h4>রেফারেন্স</h4>
                            <?php 
                                foreach($reference as $value) {
                            ?>
                                
                            <div class="row">
                                <div class="col-3">নাম</div>
                                <div class="col-1">:</div>
                                <div class="col-8"><?php echo $value->ar_reference_name; ?></div>
                            </div>
                            <div class="row">
                                <div class="col-3">প্রতিষ্ঠান</div>
                                <div class="col-1">:</div>
                                <div class="col-8"><?php echo $value->ar_organization; ?></div>
                            </div>
                            <div class="row">
                                <div class="col-3">পদবী</div>
                                <div class="col-1">:</div>
                                <div class="col-8"><?php echo $value->ar_designation; ?></div>
                            </div>
                            <div class="row">
                                <div class="col-3">মোবাইল</div>
                                <div class="col-1">:</div>
                                <div class="col-8"><?php echo $value->ar_mobile; ?></div>
                            </div>
                            <div class="row">
                                <div class="col-3">ইমেইল</div>
                                <div class="col-1">:</div>
                                <div class="col-8"><?php echo $value->ar_email; ?></div>
                            </div>
                            <div class="row">
                                <div class="col-3">সম্পর্ক</div>
                                <div class="col-1">:</div>
                                <div class="col-8"><?php echo $value->ar_relation; ?></div>
                            </div>
                            <?php echo "<br>"; ?>
                            <?php } ?>
                        </div>
                        <?php } } ?>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

</div>

<script type="text/javascript">
	function printDiv(divName) {
		$(".card-title").hide();
		$("#print_button").hide();

		var printContents = document.getElementById(divName).innerHTML;
		var originalContents = document.body.innerHTML;
        
		document.body.innerHTML = printContents;
		window.print();
		document.body.innerHTML = originalContents;

		$(".card-title").show();
		$("#print_button").show();

	}
</script>