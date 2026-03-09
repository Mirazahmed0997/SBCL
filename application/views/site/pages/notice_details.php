<div class="col-lg-12" style="background: #fff;">
    <!-- Post Content
============================================= -->

    <!-- Posts<div class="postcontent nobottommargin clearfix">
    ============================================= -->
    <div id="posts" class="small-thumbs alt">
        <div class="promo promo-dark promo-flat promo-center bottommargin">
            <h3>Notice Details</h3>
        </div>
        <div class="entry nobottomborder" style="padding: 5px;">
            <div class="heading-block fancy-title nobottomborder title-bottom-border">
                <p><?php echo $row->title; ?><br /><small><?php echo $row->publish_date; ?></small></p>
                <br>
                <?php echo htmlspecialchars_decode($row->description); ?>
                <?php if (!empty($row->filename)) {
                    $ext = pathinfo($row->filename, PATHINFO_EXTENSION);
                    if ($ext == 'pdf') {
                ?>
                        <embed src="<?php echo base_url(); ?>/assets/uploads/notice/<?php echo $row->filename; ?>" width="100%" height="600px" />
                <?php } elseif ($ext == 'jpg') { ?>
                    <img src="<?php echo base_url(); ?>/assets/uploads/notice/<?php echo $row->filename; ?>" alt="Notice" width="100%" height="100%">
                <?php } } ?>
                <?php if (!empty($row->filename)) : ?>

                    <a href="<?php echo base_url(); ?>Site/file_download/<?php echo $row->filename ?>" class="btn btn-primary"><i class="fa fa-cloud-download"></i>Download</a>
                <?php endif; ?>
            </div>
            <div class="divider"></div>
            <br>
            <a href="<?php echo base_url(); ?>Site/notice_board" class="btn btn-default"><i class="fa fa-angle-double-left"></i> Back to Notice board</a>
        </div>

    </div><!-- #posts end -->
</div><!-- .postcontent end -->