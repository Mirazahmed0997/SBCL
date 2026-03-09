<!-- Sidebar
============================================= -->
<div class="col-lg-3">
  <div class="left_sidebar nobottommargin col_last clearfix">
    <div class="sidebar-widgets-wrap">
      <div class="row text-center">
        <div class="col-lg-12 col-md-12" data-aos="fade-left">
          <div class="name">  সভাপতি</a> </div>
          <?php
                            if(!empty($president)) :
                            ?>
          <div class="" style="margin: 10px 0;">
            <img src="<?php echo base_url(); ?>assets/uploads/photos/<?php echo $president->image;?>" alt="<?php echo $president->title; ?>" style="width:146px; height: 148px;">
          </div>

          <div style="margin:10px 0;">
            <a href="<?php echo base_url(); ?>Site/aboutpresident/<?php echo $president->id; ?>" target="" style="font-size: 15px;"> <?php echo $president->title; ?></a><br>
          </div>
          <?php
                            endif;
                            ?>
                            
                            <a href="<?php echo base_url(); ?>Site/aboutpresident/<?php echo $president->id; ?>"  class="btn btn-info">
                            বিস্তারিত</a>
                            <br>
                            <br>
                            <a href="<?php echo base_url(); ?>Site/president"  class="btn btn-info">
                            সভাপতিগণের তালিকা</a>
        </div>

        <!--  This is send mayor complain div ceo -->


        <div class="col-lg-12 col-md-12" data-aos="fade-left">
          <div class="name"> প্রধান নির্বাহী কর্মকর্তা </div>
          <?php
                      if(!empty($ceo)) :
                            ?>
          <div class="" style="margin:10px 0;">
            <img src="<?php echo base_url(); ?>assets/uploads/photos/<?php echo $ceo->image;?>" alt="<?php echo $ceo->title; ?>" style="width:146px; height: 148px;">
          </div>

          <div style="margin:10px 0;">
            <a href="<?php echo base_url(); ?>Site/about_ceo/<?php echo $ceo->id; ?>" target="" style="font-size: 15px;"><?php echo $ceo->title; ?>
          </div>
          <?php
                          endif;
                            ?>
                            <a href="<?php echo base_url(); ?>Site/about_ceo/<?php echo $ceo->id; ?>" class="btn btn-info">বিস্তারিত</a>
                            
                            <br>
                            <br>
                            
                            <a href="<?php echo base_url(); ?>Site/ceo" class="btn btn-info">প্রধান নির্বাহী কর্মকর্তাগণের তালিকা</a>
                            
        </div>

        <div class="col-lg-12 col-md-12" data-aos="fade-left">
          <div class="name"> সম্পাদক </div>
          <?php
                          if(!empty($secretary)) :
                            ?>
          <div class="" style="margin:10px 0;">
            <img src="<?php echo base_url(); ?>assets/uploads/photos/<?php echo $secretary->image;?>" alt="<?php echo $secretary->title; ?>" style="width:146px; height: 148px;">
          </div>

          <div style="margin:10px 0;">
            <a href="<?php echo base_url(); ?>Site/about_secr/<?php echo $secretary->id; ?>"style="font-size: 15px;" target=""><?php echo $secretary->title; ?></a>
          </div>
          <?php
                          endif;
                            ?>
                            
                            <a href="<?php echo base_url(); ?>Site/about_secr/<?php echo $secretary->id; ?>" class="btn btn-info">বিস্তারিত</a>
                            <br>
                            <br>
                            
                            <a href="<?php echo base_url(); ?>Site/jointsecretary" class="btn btn-info">সম্পাদকগণের তালিকা</a>
        </div>
        </div>

       
    <div class="widget" style="margin-top:1vw; " data-aos="fade-left">
      <div class="panel panel-height panel-default" style="">
              <div class="panel-heading">
                <h3 class="panel-title"> কর্মকর্তা-কর্মচারী নিয়োগ  </h3>
              </div>
              <div class="panel-body" style="" >
                <div class="row" style="margin-top: 10px;">
                <?php
                    if(!empty($emp_recruitment)) :
                    $i = 0;
                    foreach ($emp_recruitment as $key => $emp_recruit) :
                        $i++;
                    ?>
                    <div class="col-md-12 col-sm-12" style="margin-top:10px;">
                        <a href="<?php echo base_url("Site/view/$emp_recruit->url");?>">
                            <div class="somity_main_work_box menu_box<?php echo $i ?> somity_menu_box5">
                                <?php echo $emp_recruit->title; ?>
                                
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

    <div class="widget" data-aos="fade-left">
        
      <div class="panel panel-height panel-default" >
              <div class="panel-heading">
                <h3 class="panel-title"> ব্যবস্থাপনা পদ্ধতি </h3>
              </div>
              <div class="panel-body" style="" >
              <div class="row" style="margin-top: 10px;">
                <?php
                    if(!empty($management_info)) :
                    $i = 0;
                    foreach ($management_info as $key => $management) :
                        $i++;
                    ?>
                    <div class="col-md-12 col-sm-12" style="margin-top:10px;">
                        <a href="<?php echo base_url("Site/view/$management->url");?>">
                            <div class="somity_main_work_box menu_box<?php echo $i ?> somity_menu_box2">
                                <?php echo $management->title; ?>
                                
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

  </div><!-- .sidebar end -->
</div>
</div>
</div>