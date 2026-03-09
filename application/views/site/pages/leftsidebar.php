<!-- Sidebar
============================================= -->
<div class="col-lg-3">
<div class="left_sidebar nobottommargin clearfix">
    <div class="sidebar-widgets-wrap">

        <div class="widget clearfix" data-aos="fade-right">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">নোটিশ বোর্ড</h3>
                </div>
                <div id="feeds">
                    <div class="feedlist testimonial_wrapp">
                        <ul>
                            <?php
                            if(!empty($notices)) :
                            foreach ($notices as $notice) :
                                if(strtotime($notice->publish_date) <= strtotime(current_date())) :
                            ?>
                                <li>
                                    <div class="entry-c clearfix">
                                        <div class="entry-title">
                                            <h5><a href="<?php echo base_url(); ?>Site/notice_details/<?php echo $notice->id ?>"><i class="fa fa-play"></i> <?php echo $notice->title; ?></a>

                                                <span class="meta"><?php echo $notice->publish_date; ?></span>
                                        </div>
                                    </div>
                                </li>
                            <?php
                            endif;
                            endforeach;
                            endif;
                            ?>
                        </ul>
                    </div>
                    <div class="slidebuttons">
                        <p class="txt"><a href="<?php echo base_url(); ?>Site/notice_board" class="button">View All</a></p>
                    </div>
                </div>
            </div>
        </div>

    </div> 

    <div class="widget" data-aos="fade-right">
        <div class="panel panel-height panel-default" style="">
              <div class="panel-heading">
                <h3 class="panel-title"> সামাজিক কর্মকাণ্ডের চিত্র  </h3>
              </div>
              <div class="panel-body" style="" >
                    <div class="row" style="margin-top: 10px;">
                    <?php
                        if(!empty($social_works)) :
                        $i = 0;
                        foreach ($social_works as $key => $social_work) :
                            $i++;
                        ?>
                        <div class="col-md-12 col-sm-12" style="margin-top:10px;">
                            <a href="<?php echo base_url("Site/view/$social_work->url");?>">
                                <div class="somity_main_work_box menu_box<?php echo $i ?> somity_menu_box3">
                                    <?php echo $social_work->title; ?>
                                    
                                </div>
                            </a>
                        </div>
                        <?php
                            endforeach;
                            endif;
                            ?>
                        
                    </div>
              </div>
            </div>
    </div>
    <div class="widget" data-aos="fade-right">
        
        <div class="panel panel-height panel-default" style="">
              <div class="panel-heading">
                <h3 class="panel-title"> সমিতির উদ্দেশ্য ও মূল কার্যক্রম  </h3>
              </div>
              <div class="panel-body" style="" >
                  <div class="row" style="margin-top: 10px;">
                  <?php
                     if(!empty($somity_works)) :
                      $i = 0;
                      foreach ($somity_works as $key => $somity_work) :
                          $i++;
                      ?>
                      <div class="col-md-12 col-sm-12" style="margin-top:10px;">
                          <a href="<?php echo base_url("Site/view/$somity_work->url");?>">
                              <div class="somity_main_work_box menu_box<?php echo $i ?> somity_menu_box6">
                                  <?php echo $somity_work->title; ?>
                                  
                              </div>
                          </a>
                      </div>
                      <?php
                          endforeach;
                        endif;
                          ?>
                      
                  </div>
              </div>
            </div>
    </div>

    <div class="widget" data-aos="fade-right">
        <div class="panel panel-height panel-default" data-aos="fade-down">
              <div class="panel-heading">
                <h3 class="panel-title">সংগঠন পরিচালনা পদ্ধতি </h3>
              </div>
              <div class="panel-body" style="" >
                
        <div class="row" style="margin-top: 10px;">
        <?php
            if(!empty($songothon_works)) :
            $i = 0;
            foreach ($songothon_works as $key => $songothon_work) :
                $i++;
            ?>
            <div class="col-md-12 col-sm-12" style="margin-top:10px;">
                <a href="<?php echo base_url("Site/view/$songothon_work->url");?>">
                    <div class="somity_main_work_box menu_box<?php echo $i ?> somity_menu_box1">
                        <?php echo $songothon_work->title; ?>
                        
                    </div>
                </a>
            </div>
            <?php
                endforeach;
                endif;
                ?>
            
        </div>
                <!-- <a href="#" class="btn btn-info pull-right" style="margin-bottom: 10px;">View more</a> -->

              </div>


            </div>
    </div>

   


</div><!-- .sidebar end -->
</div>