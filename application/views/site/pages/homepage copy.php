<div class="container homepage" style="background-color: #fff;">
<!-- welcome section start -->
<section class="welcome" id="welcome">
    <div class="container">
      <div class="row">
        <div class="col-md-6 content" data-aos="fade-right">
          <div class="box">
            <div class="row">
              <div class="col-8">
                <h4><?php if(!empty($homapage_info)) { echo $homapage_info->h_welcome_title; } ?></h4>
                <p><?php if(!empty($homapage_info)) { echo $homapage_info->h_welcome_description; } ?></p>

              </div>
              <div class="col-4">
                <img src="<?php echo base_url(); ?>assets/site/images/erecruitment.jpg" style="height:80%;width:100%;">
              </div>
            </div>
            <hr>
            <a href="<?php echo base_url('site/welcome'); ?>" class="btn btn-info">Read More</a>
          </div>
          
        </div>
        <div class="col-md-6 d-md-block" data-aos="fade-left">	
          <div class="box">
            <div class="row">
              <div class="col-8">
                <h4><?php if(!empty($homapage_info)) { echo $homapage_info->h_job_title; } ?></h4>
                <p><?php if(!empty($homapage_info)) { echo $homapage_info->h_job_description; } ?></p>

              </div>
              <div class="col-4">
                <img src="<?php echo base_url(); ?>assets/site/images/job.jpg" style="height:80%;width:100%;">
              </div>
            </div>
            <hr>
            <a href="<?php echo base_url('site/job_openings'); ?>" class="btn btn-info">Read More</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- welcome section end -->
  <!-- career section start -->
<section class="career" id="career">
    <div class="container">
      <div class="row">
        <div class="col-md-6 content" data-aos="fade-right">
          <div class="box">
            <div class="row">
              <div class="col-8">
                <h4><?php if(!empty($homapage_info)) { echo $homapage_info->h_registration_title; } ?></h4>
                <p><?php if(!empty($homapage_info)) { echo $homapage_info->h_registration_description; } ?></p>
              </div>
              <div class="col-4">
                <img src="<?php echo base_url(); ?>assets/site/images/registration.jpg" style="height:80%;width:100%;">
              </div>
            </div>
            <hr>
            <a href="<?php echo base_url('site/registration'); ?>" class="btn btn-info">Read More</a>
          </div>
          
        </div>
        <div class="col-md-6 d-md-block" data-aos="fade-left">
          <div class="box">
            <div class="row">
              <div class="col-8">
                <h4><?php if(!empty($homapage_info)) { echo $homapage_info->h_login_title; } ?></h4>
                <p><?php if(!empty($homapage_info)) { echo $homapage_info->h_login_details; } ?></p>
              </div>
              <div class="col-4">
                <img src="<?php echo base_url(); ?>assets/site/images/login.jpg" style="height:80%;width:100%;">
              </div>
            </div>
            <hr>
            <a href="<?php echo base_url('site/login'); ?>" class="btn btn-info">Read More</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- career section end -->
  <!-- benifits section start -->
<section class="benifits" id="benifits">
    <div class="container">
      <div class="row">
        <div class="col-md-6 content" data-aos="fade-right">
          <div class="box">
            <div class="row">
              <div class="col-8">
                <h4><?php if(!empty($homapage_info)) { echo $homapage_info->h_application_title; } ?></h4>
                <p><?php if(!empty($homapage_info)) { echo $homapage_info->h_application_description; } ?></p>
              </div>
              <div class="col-4">
                <img src="<?php echo base_url(); ?>assets/site/images/apply.jpg" style="height:80%;width:100%;">
              </div>
            </div>
            <hr>
            <a href="<?php echo base_url('site/how_to_apply'); ?>" class="btn btn-info">Read More</a>
          </div>
          
        </div>
        <div class="col-md-6 d-md-block" data-aos="fade-left">
          <div class="box">
            <div class="row">
              <div class="col-8">
                <h4><?php if(!empty($homapage_info)) { echo $homapage_info->h_faq_title; } ?></h4>
                <p><?php if(!empty($homapage_info)) { echo $homapage_info->h_faq_description; } ?></p>
              </div>
              <div class="col-4">
                <img src="<?php echo base_url(); ?>assets/site/images/faq.jpg" style="height:80%;width:100%;">
              </div>
            </div>
            <hr>
            <a href="<?php echo base_url('site/faq'); ?>" class="btn btn-info">Read More</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- benifits section end -->
  
  </div>
  <!-- review section start -->
  <!-- <section class="review" id="review">
    <div class="container">
      <h1 class="heading"><span>'</span> People's Review <span>'</span></h1>
      <div class="box-container">
        <div class="box" data-aos="fade-right">
          <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eius quia qui repellendus, laudantium nemo sint,
            ea tempore repudiandae esse voluptatum odit doloribus maxime! Hic itaque repellendus magnam debitis
            reiciendis cumque?</p>
          <h3>someone's name</h3>
          <span>jan 5, 2022</span>
          <img src="assets/site/images/pic1.jpg" alt="">
        </div>
        <div class="box" data-aos="fade-up">
          <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eius quia qui repellendus, laudantium nemo sint,
            ea tempore repudiandae esse voluptatum odit doloribus maxime! Hic itaque repellendus magnam debitis
            reiciendis cumque?</p>
          <h3>someone's name</h3>
          <span>jan 7, 2022</span>
          <img src="assets/site/images/pic2.jpg" alt="">
        </div>
        <div class="box" data-aos="fade-left">
          <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eius quia qui repellendus, laudantium nemo sint,
            ea tempore repudiandae esse voluptatum odit doloribus maxime! Hic itaque repellendus magnam debitis
            reiciendis cumque?</p>
          <h3>someone's name</h3>
          <span>jan 9, 2022</span>
          <img src="assets/site/images/pic3.jpg" alt="">
        </div>
      </div>

    </div>
  </section> -->
  <!-- review section end -->