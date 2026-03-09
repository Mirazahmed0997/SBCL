<!-- footer section  -->
<section id="footer">
        <img src="<?php echo base_url(); ?>/assets/site/images/wave2.png" class="footer_img">
        <div class="container">
            <div class="row">
                <div class="col-md-4 footer-box">
                <img <?php if (!empty($homapage_info->h_logo)){?> src="<?php echo base_url('assets/site/images/'.$homapage_info->h_logo); ?>" <?php } else { ?>src="<?php echo base_url(); ?>assets/site/images/logo.png" <?php } ?> >
                    <p><?php if(!empty($homapage_info)) { echo $homapage_info->h_footer_description; } ?></p>
                </div>
                <div class="col-md-4 footer-box">
                    <p><b>CONTACT US</b></p>
                    <p><i class="fas fa-map-marker"></i> <?php if(!empty($homapage_info)) { echo $homapage_info->h_company_address; } ?></p>
                    <p><i class="fas fa-phone-alt"></i> <?php if(!empty($homapage_info)) { echo $homapage_info->h_company_mobile; } ?></p>
                    <p><i class="fas fa-envelope"></i> <?php if(!empty($homapage_info)) { echo $homapage_info->h_company_email; } ?></p>
                </div>
                <div class="col-md-4 footer-box">
                    <!-- social links -->
                    <section id="social_media">
                        <div class="container text-center">
                            <p>FIND US IN SOCIAL MEDIA</p>
                            <div class="social-icons">
                                <a href="<?php if(!empty($homapage_info)) { echo $homapage_info->h_fb_link; } ?>"><img src="<?php echo base_url(); ?>/assets/site/images/facebook-icon.png"></a>
                                <a href="<?php if(!empty($homapage_info)) { echo $homapage_info->h_youtube_link; } ?>"><img src="<?php echo base_url(); ?>/assets/site/images/youtube.png"></a>
                                <a href="<?php if(!empty($homapage_info)) { echo $homapage_info->h_twitter_link; } ?>"><img src="<?php echo base_url(); ?>/assets/site/images/twitter-icon.png"></a>
                                <a href="<?php if(!empty($homapage_info)) { echo $homapage_info->h_linkedin_link; } ?>"><img src="<?php echo base_url(); ?>/assets/site/images/linkedin-icon.png"></a>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <hr>
            <p class="copyright">All Copyrights Reserved by RTSOFTBD</p>
        </div>
    </section>