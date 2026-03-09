
<div class="col-lg-12" style="background: #fff;">
<!-- Post Content
============================================= -->

    <!-- Posts<div class="postcontent nobottommargin clearfix">
    ============================================= -->
    <div id="posts" class="small-thumbs alt">
        <div class="promo promo-dark promo-flat promo-center bottommargin">
            <h3>ব্রেকিং নিউজ</h3>
        </div>
        <div class="entry nobottomborder" style="padding: 5px;">
            <div class="heading-block fancy-title nobottomborder title-bottom-border">
                <p><?php echo $news->news; ?></p>
                <p><?php echo $news->description; ?></p>
                
            </div>
            <div class="divider"></div>
            <a href="<?php echo base_url(); ?>Site/all_breaking_news" class="btn btn-default"><i class="fa fa-angle-double-left"></i> Back to Breaking News</a>
        </div>
        
    </div><!-- #posts end -->
</div><!-- .postcontent end -->