 <!-- Post Content
============================================= -->
<!-- <div class="postcontent bothsidebar nobottommargin clearfix"> -->

    <!-- Posts<div class="postcontent nobottommargin clearfix">
    ============================================= -->
    <div id="posts" class="small-thumbs alt">

        <div class="promo promo-dark promo-flat promo-center bottommargin">
            <h3>অ্যালবাম</h3>
        </div>
        <div class="entry nobottomborder">
            
            <div class="clear"></div>

            <div class="row"> 
                <?php
                if($albums != '') {
                foreach($albums as $row) {
                ?>
                <div class="col-md-3"> 
                    <div class="thumbnail"> 
                        <a href="<?php echo base_url(); ?>Site/gallery_photo/<?php echo $row->gallery_album_id ?>" title="<?php echo $row->gallery_album_title ?>">
                            <img src="<?php echo base_url('assets/uploads/gallery/'.$row->gallery_album_photo)?>" style="height:180px; width:100%;" />
                            <div class="caption" style="height:50px; width:250px;">
                                <p><?php echo $row->gallery_album_title; ?></p>
                            </div>
                        </a>
                    </div>
                </div>
                <?php } } ?>
                <?php echo $this->pagination->create_links(); ?>
            </div>
            

        </div>

    </div><!-- #posts end -->

<!-- </div> -->
<!-- .postcontent end -->