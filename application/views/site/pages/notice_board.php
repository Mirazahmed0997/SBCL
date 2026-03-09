<div class="col-lg-12" style="background: #fff;">
<!-- Post Content
                                ============================================= -->
<!-- <div class="postcontent bothsidebar nobottommargin clearfix"> -->

    <!-- Posts<div class="postcontent nobottommargin clearfix">
    ============================================= -->
    <div id="posts" class="small-thumbs alt">

        <div class="promo promo-dark promo-flat promo-center bottommargin">
            <h3>নোটিশ বোর্ড</h3>
        </div>

        <div class="entry nobottomborder">
            <div class="heading-block fancy-title nobottomborder title-bottom-border">
                <!-- <h4><span>নোটিশ তালিকা</span></h4> -->
            </div>
            <div class="table table-responsive">
                <table class="table table-bordered table-striped nobottommargin">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Publish Date</th>
                        <!-- <th>File</th> -->
                        <th>Download</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    
                    
                    $sl = '';
                    $count = count($notice_boards);
                    foreach ($notice_boards as $row):
                        if(strtotime($row->publish_date) <= strtotime(current_date())) :
                        ?>
                        <tr>
                            <td><?php echo $count; ?></a></td>
                            <td>
                                <a style="color:#333;" href="<?php echo base_url(); ?>Site/notice_details/<?php echo $row->id ?>"><?php echo $row->title; ?></a>
                            </td>
                            <td><?php echo $row->publish_date; ?></a></td>
                            <!-- <td>
                                <?php if(!empty($row->filename)):?> -->
                                    <!-- <img src="<?php echo base_url(); ?>assets/uploads/notice/<?php echo $row->filename; ?>" alt=""> -->
                                    <!-- <iframe src="<?php echo base_url(); ?>assets/uploads/notice/<?php echo $row->filename; ?>" style="width: 100%;height: 100%;border: none;"></iframe> -->
                                    <!-- <embed src="<?php echo base_url(); ?>assets/uploads/notice/<?php echo $row->filename; ?>" width="100px" height="100px" /> -->
                                <?php endif; ?>
                            <!-- </td> -->
                            <td class="text-center">
                                <?php if(!empty($row->filename)):?>
                               
                                    <a href="<?php echo base_url(); ?>Site/file_download/<?php echo $row->filename ?>" class="btn btn-info btn-xs"><i class="fas fa-download"></i></a>
                                <?php endif; ?>
                                <a href="http://www.facebook.com/sharer.php?u=<?php echo base_url(); ?>Site/notice_details/<?php echo $row->id ?>" target="_blank">Share to FaceBook</a>

                            </td>
                        </tr>
                    <?php
                        $count--; endif; endforeach; ?>
                    </tbody>
                </table>
                <?= $this->pagination_bootstrap->render() ?>
            </div>
        </div>

    </div>
    <!-- #posts end -->

</div><!-- .postcontent end -->
