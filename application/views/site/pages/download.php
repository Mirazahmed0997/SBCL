<?php
$q = $this->db->get_where("download");
?>
<!-- Post Content
                                ============================================= -->
<div class="postcontent bothsidebar nobottommargin clearfix">

    <!-- Posts<div class="postcontent nobottommargin clearfix">
    ============================================= -->
    <div id="posts" class="small-thumbs alt">

        <div class="promo promo-dark promo-flat promo-center bottommargin">
            <h3>Download</h3>
        </div>

        <div class="entry nobottomborder" style="margin: 0px 0px -50px 0px;">
        </div>

        <div class="entry nobottomborder" style="margin: 0px 0px -50px 0px;">
            <div class="heading-block fancy-title nobottomborder title-bottom-border">
                <h4><span>Download</span></h4>
            </div>
            <div class="table table-responsive">
                <table class="table table-bordered table-striped nobottommargin">

                    <thead>
                        <tr>
                            <td>#SL</td>
                            <td>Title</td>
                            <td>Download</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sl = '';
                        foreach ($q->result() as $row):
                            ?>
                            <tr>
                                <td><?php echo ++$sl; ?></td>
                                <td><?php echo $row->download_title; ?></td>
                                <td><a href="<?php echo base_url(); ?>admin/content/upload_files/<?php echo $row->download_file; ?>" class="btn btn-primary"><i class="fa fa-cloud-download"></i> Download</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div><!-- #posts end -->

</div><!-- .postcontent end -->