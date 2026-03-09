<div class="col-lg-12" style="background: #fff;">
<!-- Post Content
                                ============================================= -->
<!-- <div class="postcontent bothsidebar nobottommargin clearfix"> -->

    <!-- Posts<div class="postcontent nobottommargin clearfix">
    ============================================= -->
    <div id="posts" class="small-thumbs alt">

        <div class="promo promo-dark promo-flat promo-center bottommargin">
            <h3>ব্রেকিং নিউজ</h3>
        </div>

        <div class="entry nobottomborder">
            <div class="heading-block fancy-title nobottomborder title-bottom-border">
                <!-- <h4><span>ব্রেকিং নিউজ তালিকা</span></h4> -->
            </div>
            <div class="table table-responsive">
                <table class="table table-bordered table-striped nobottommargin">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>ব্রেকিং নিউজ</th>
                        <!-- <th>বিস্তারিত</th> -->
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    
                    
                    $sl = '';
                    $count = count($ftchBrakingNws);
                    foreach ($ftchBrakingNws as $row):
                        ?>
                        <tr>
                            <td><?php echo $count; ?></a></td>
                            <td>
                                <a style="color:#333;" href="<?php echo base_url(); ?>Site/breaking_news_details/<?php echo $row->id ?>"><?php echo $row->news; ?></a>
                            </td>
                            <!-- <td><?php echo $row->description; ?></a></td> -->
                        </tr>
                    <?php $count--; endforeach; ?>
                    </tbody>
                </table>
                <?= $this->pagination_bootstrap->render() ?>
            </div>
        </div>

    </div>
    <!-- #posts end -->

</div><!-- .postcontent end -->
