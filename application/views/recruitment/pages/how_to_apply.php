<!-- welcome section start -->
<section class="welcome" id="welcome">
    <div class="container job_details">
      <div class="row align-items-center">
        <div class="col-md-8 col-xs-12 text-justify">
            <h1><?php if(!empty($homapage_info)) { echo $homapage_info->h_application_title; } ?></h1>
            <hr>
            <?php if(!empty($homapage_info)) { echo $homapage_info->h_application_long_description; } ?>
            
        </div>
        <div class="col-4"></div>

      </div>
    </div>
  </section>
  <!-- welcome section end -->