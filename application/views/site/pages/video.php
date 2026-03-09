 <!-- Post Content
============================================= -->
<!-- <div class="postcontent bothsidebar nobottommargin clearfix"> -->

    <!-- Posts<div class="postcontent nobottommargin clearfix">
    ============================================= -->
    <div id="posts" class="small-thumbs alt">

        <div class="promo promo-dark promo-flat promo-center bottommargin">
            <h3>ভিডিও</h3>
        </div>
        <div class="entry nobottomborder">
            
            <div class="clear"></div>

            <div class="row"> 
                <?php
                if($videos != '') {
                foreach($videos as $row) {
                ?>
                <div class="col-md-3 gallery-items" style="margin-bottom: 8px;">
                
                  <div class="embed-responsive embed-responsive-16by9 thumbnail">
                        
                  <iframe width="360" height="315" <?php if($row->type == 1) { ?> src="<?php echo base_url(); ?>assets/uploads/videos/<?php echo $row->title; ?>" <?php } elseif($row->type == 2) { ?>src="<?php echo $row->title; ?>"<?php } ?> title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        
                  </div>
                </div>
                <?php } } ?>
                <?php echo "<br>"; ?>
                <?php echo $this->pagination->create_links(); ?>
            </div>
            

        </div>

    </div><!-- #posts end -->

<!-- </div> -->
<!-- .postcontent end -->