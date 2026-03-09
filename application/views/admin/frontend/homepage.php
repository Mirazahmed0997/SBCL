<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="card-title">Homepage Setting</h3>
                        </div>
                    </div>
                </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <?php echo $this->session->flashdata('success') ?>
                            </div>
                            <div class="col-md-4"> 
                                <form action="<?php echo base_url(); ?>Admin/logo_upload" method="post"  enctype="multipart/form-data">
                                <div class="card card-info">
                                    <div class="card-header">
                                        <p class="card-title">LOGO</p>
                                    </div>
                                    <div class="card-body">

                                        <input onchange="preview_image(event)" type="file" name="logo"
                                            class="form-control-file" value="" id="logo">
                                        <img id="output_image" <?php if (!empty($homapage_info->h_logo)){?> src="<?php echo base_url('assets/site/images/'.$homapage_info->h_logo); ?>" <?php } ?> width="180" height="150">
                                        <input type="hidden" name="h_id" value="<?php if(!empty($homapage_info)) { echo $homapage_info->h_id; } ?>">
                                        <br>
                                        <br>
									<button type="submit" class="btn btn-info">Submit</button>
                                    </div>
                                </div>
                                </form>
                                <form action="<?php echo base_url(); ?>Admin/right_image_upload" method="post"  enctype="multipart/form-data">
                                <div class="card card-info">
                                    <div class="card-header">
                                        <p class="card-title">Header Right Side Image</p>
                                    </div>
                                    <div class="card-body">

                                        <input onchange="preview_side_image(event)" type="file" name="header_side_image" class="form-control-file" value="" id="header_side_image">
                                        <img id="output_side_image" <?php if (!empty($homapage_info->h_header_right_image)){?> src="<?php echo base_url('assets/site/images/'.$homapage_info->h_header_right_image); ?>" <?php } ?> width="180" height="150"> <br><br>
                                        <input type="hidden" name="h_id" value="<?php if(!empty($homapage_info)) { echo $homapage_info->h_id; } ?>">
									<button type="submit" class="btn btn-info">Submit</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                            <div class="col-md-8">
                        <form action="<?php echo base_url('') ?>Admin/homepage_store" method="post">
                                <label>প্রতিষ্ঠান নাম</label>
                                <span class="text-danger">*</span>
                                <input type="text" class="form-control" value="<?php if(!empty($homapage_info)) { echo $homapage_info->h_company_name; } ?>" name="company_name"
                                        placeholder="প্রতিষ্ঠান নাম" data-validation="length"
                                        data-validation-length="min2">
                                        
                                <label>প্রতিষ্ঠান ঠিকানা</label>
                                <span class="text-danger">*</span>
                                <input type="text" class="form-control" value="<?php if(!empty($homapage_info)) { echo $homapage_info->h_company_address; } ?>" name="company_address"
                                        placeholder="প্রতিষ্ঠান ঠিকানা" data-validation="length"
                                        data-validation-length="min2">
                                <label>প্রতিষ্ঠান মোবাইল</label>
                                <span class="text-danger">*</span>
                                <input type="text" class="form-control" value="<?php if(!empty($homapage_info)) { echo $homapage_info->h_company_mobile; } ?>" name="company_mobile"
                                        placeholder="প্রতিষ্ঠান মোবাইল" data-validation="length"
                                        data-validation-length="min2">
                                        
                                <label>প্রতিষ্ঠান ইমেইল</label>
                                <span class="text-danger">*</span>
                                <input type="text" class="form-control" value="<?php if(!empty($homapage_info)) { echo $homapage_info->h_company_email; } ?>" name="company_email"
                                        placeholder="প্রতিষ্ঠান ইমেইল" data-validation="length"
                                        data-validation-length="min2">
                                <label>স্বাগতম শিরোনাম</label>
                                <span class="text-danger">*</span>
                                <input type="text" class="form-control" value="<?php if(!empty($homapage_info)) { echo $homapage_info->h_welcome_title; } ?>" name="welcome_title"
                                        placeholder="স্বাগতম শিরোনাম" data-validation="length"
                                        data-validation-length="min2">
                                        
                                <label>স্বাগতম বিস্তারিত (Short)</label>
                                <span class="text-danger">*</span>
                                <input type="text" class="form-control" value="<?php if(!empty($homapage_info)) { echo $homapage_info->h_welcome_description; } ?>" name="welcome_description"
                                        placeholder="স্বাগতম বিস্তারিত" data-validation="length"
                                        data-validation-length="min2">
                                <label>স্বাগতম বিস্তারিত (Long)</label>
                                <span class="text-danger">*</span>
                                        
                                <textarea name="welcome_long_description" id="editor1" class="form-control"><?php if(!empty($homapage_info->h_welcome_long_description)) { echo $homapage_info->h_welcome_long_description; } ?></textarea>

                                <label>চাকরী শিরোনাম</label>
                                <span class="text-danger">*</span>
                                <input type="text" class="form-control" value="<?php if(!empty($homapage_info)) { echo $homapage_info->h_job_title; } ?>" name="job_title"
                                        placeholder="চাকরী শিরোনাম" data-validation="length"
                                        data-validation-length="min2">
                                        
                                <label>চাকরী বিস্তারিত</label>
                                <span class="text-danger">*</span>
                                <input type="text" class="form-control" value="<?php if(!empty($homapage_info)) { echo $homapage_info->h_job_description; } ?>" name="job_description"
                                        placeholder="চাকরী বিস্তারিত" data-validation="length"
                                        data-validation-length="min2">
                                <label>রেজিস্ট্রেশন শিরোনাম</label>
                                <span class="text-danger">*</span>
                                <input type="text" class="form-control" value="<?php if(!empty($homapage_info)) { echo $homapage_info->h_registration_title; } ?>" name="registration_title"
                                        placeholder="রেজিস্ট্রেশন শিরোনাম" data-validation="length"
                                        data-validation-length="min2">
                                        
                                <label>রেজিস্ট্রেশন বিস্তারিত</label>
                                <span class="text-danger">*</span>
                                <input type="text" class="form-control" value="<?php if(!empty($homapage_info)) { echo $homapage_info->h_registration_description; } ?>" name="registration_description"
                                        placeholder="রেজিস্ট্রেশন বিস্তারিত" data-validation="length"
                                        data-validation-length="min2">
                                <label>লগইন শিরোনাম</label>
                                <span class="text-danger">*</span>
                                <input type="text" class="form-control" value="<?php if(!empty($homapage_info)) { echo $homapage_info->h_login_title; } ?>" name="login_title"
                                        placeholder="লগইন শিরোনাম" data-validation="length"
                                        data-validation-length="min2">
                                        
                                <label>লগইন বিস্তারিত</label>
                                <span class="text-danger">*</span>
                                <input type="text" class="form-control" value="<?php if(!empty($homapage_info)) { echo $homapage_info->h_login_details; } ?>" name="login_details"
                                        placeholder="লগইন বিস্তারিত" data-validation="length"
                                        data-validation-length="min2">
                                <label>আবেদন পদ্ধতি শিরোনাম</label>
                                <span class="text-danger">*</span>
                                <input type="text" class="form-control" value="<?php if(!empty($homapage_info)) { echo $homapage_info->h_application_title; } ?>" name="application_title"
                                        placeholder="আবেদন শিরোনাম" data-validation="length"
                                        data-validation-length="min2">
                                        
                                <label>আবেদন পদ্ধতি বিস্তারিত (Short)</label>
                                <span class="text-danger">*</span>
                                <input type="text" class="form-control" value="<?php if(!empty($homapage_info)) { echo $homapage_info->h_application_description; } ?>" name="application_description"
                                        placeholder="আবেদন বিস্তারিত" data-validation="length"
                                        data-validation-length="min2">
                                <label>আবেদন পদ্ধতি বিস্তারিত (Long)</label>
                                <span class="text-danger">*</span>
                                        
                                <textarea name="application_long_description" id="editor2" class="form-control"><?php if(!empty($homapage_info->h_application_long_description)) { echo $homapage_info->h_application_long_description; } ?></textarea>
                                
                                <label>এফএকিউ শিরোনাম</label>
                                <span class="text-danger">*</span>
                                <input type="text" class="form-control" value="<?php if(!empty($homapage_info)) { echo $homapage_info->h_faq_title; } ?>" name="faq_title"
                                        placeholder="এফএকিউ শিরোনাম" data-validation="length"
                                        data-validation-length="min2">
                                        
                                <label>এফএকিউ বিস্তারিত (Short)</label>
                                <span class="text-danger">*</span>
                                <input type="text" class="form-control" value="<?php if(!empty($homapage_info)) { echo $homapage_info->h_faq_description; } ?>" name="faq_description"
                                        placeholder="এফএকিউ বিস্তারিত" data-validation="length"
                                        data-validation-length="min2">

                                <label>এফএকিউ বিস্তারিত (Long)</label>
                                <span class="text-danger">*</span>
                                        
                                <textarea name="faq_long_description" id="editor3" class="form-control"><?php if(!empty($homapage_info->h_faq_long_description)) { echo $homapage_info->h_faq_long_description; } ?></textarea>

                                <label>ফুটার বিস্তারিত</label>
                                <span class="text-danger">*</span>
                                <input type="text" class="form-control" value="<?php if(!empty($homapage_info)) { echo $homapage_info->h_footer_description; } ?>" name="footer_description"
                                        placeholder="ফুটার বিস্তারিত" data-validation="length"
                                        data-validation-length="min2">

                                        
                                <label>সামাজিক যোগাযোগ মাধ্যম <br> ফেসবুক লিংক</label>
                                <span class="text-danger">*</span>
                                <input type="text" class="form-control" value="<?php if(!empty($homapage_info)) { echo $homapage_info->h_fb_link; } ?>" name="fb_link"
                                        placeholder="ফেসবুক লিংক" data-validation="length"
                                        data-validation-length="min2">
                                <label>ইউটিউব লিংক</label>
                                <span class="text-danger">*</span>
                                <input type="text" class="form-control" value="<?php if(!empty($homapage_info)) { echo $homapage_info->h_youtube_link; } ?>" name="youtube_link"
                                        placeholder="ইউটিউব লিংক" data-validation="length"
                                        data-validation-length="min2">
                                        
                                <label>টুইটার লিংক</label>
                                <span class="text-danger">*</span>
                                <input type="text" class="form-control" value="<?php if(!empty($homapage_info)) { echo $homapage_info->h_twitter_link; } ?>" name="twitter_link"
                                        placeholder="টুইটার লিংক" data-validation="length"
                                        data-validation-length="min2">
                                <label>লিংকডইন শিরোনাম</label>
                                <span class="text-danger">*</span>
                                <input type="text" class="form-control" value="<?php if(!empty($homapage_info)) { echo $homapage_info->h_linkedin_link; } ?>" name="linkedin_link"
                                        placeholder="লিংকডইন শিরোনাম" data-validation="length"
                                        data-validation-length="min2">
                                        <br>
                                    <input type="hidden" name="h_id" value="<?php if(!empty($homapage_info)) { echo $homapage_info->h_id; } ?>">
								<button type="submit" class="btn btn-info">Submit</button>
                                        
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
	function preview_image(event) {
		var reader = new FileReader();
		reader.onload = function () {
			var output = document.getElementById('output_image');
			output.src = reader.result;
		}
		reader.readAsDataURL(event.target.files[0]);
	}
	function preview_side_image(event) {
		var reader = new FileReader();
		reader.onload = function () {
			var output = document.getElementById('output_side_image');
			output.src = reader.result;
		}
		reader.readAsDataURL(event.target.files[0]);
	}
</script>

<script src="<?php echo base_url(); ?>assets/backend/plugins/ckeditor/ckeditor.js"></script> 
<script> 
    CKEDITOR.replace( 'editor1' ); 
    CKEDITOR.replace( 'editor2' ); 
    CKEDITOR.replace( 'editor3' ); 
</script> 