<!-- welcome section start -->
<section class="welcome" id="welcome">
    <div class="container job_details">
      <div class="row align-items-center">
        <div class="col-md-8 col-xs-12 text-justify">
            <h5><?php if(!empty($recruitment)) { echo $recruitment->rec_job_title; } ?></h5>
            <p>ঠিকানাঃ <?php if(!empty($recruitment)) { echo $recruitment->rec_job_location; } ?></p>
            <p>প্রকাশের তারিখঃ <?php if(!empty($recruitment)) { echo $recruitment->rec_publish_date; } ?></p>
            <p>শেষ তারিখঃ <?php if(!empty($recruitment)) { echo $recruitment->rec_last_date; } ?></p>
            <p>পদবীঃ <?php if(!empty($recruitment)) {
                                $where_data['d_id'] = $recruitment->rec_designation;
                                $where_data['d_status'] = 1;
                                $designation = $this->Common->get_data_multi_conditional('designation', $where_data)->row();
                            echo $designation->d_name; } ?></p>
        </div>
        <div class="col-md-8 col-xs-12 text-justify">
            <?php if(!empty($recruitment)) { echo $recruitment->rec_job_description; } ?>
            <br>
            <form action="<?php echo base_url(); ?>Recruitment/apply" method="post">
                <input type="hidden" name="rec_id" value="<?php if(!empty($recruitment)) { echo $recruitment->rec_id; } ?>">
                <button type="submit" class="btn bg-info">Apply Now</button>
            </form>
        </div>
        <div class="col-4"></div>

      </div>
    </div>
  </section>
  <!-- welcome section end -->