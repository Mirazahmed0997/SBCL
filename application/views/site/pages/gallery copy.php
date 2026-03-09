 <!-- Post Content
============================================= -->
<div class="postcontent bothsidebar nobottommargin clearfix">

    <!-- Posts<div class="postcontent nobottommargin clearfix">
    ============================================= -->
    <div id="posts" class="small-thumbs alt">

        <div class="promo promo-dark promo-flat promo-center bottommargin">
            <h3>Gallery</h3>
        </div>

        <div class="entry nobottomborder" style="margin: 0px 0px -50px 0px;">
        </div>

        <div class="entry nobottomborder" style="margin: 0px 0px -50px 0px;">
            
            <div class="clear"></div>

            <div class="row"> 
                <?php
                if($gallery_photo != '') {
                foreach($gallery_photo as $row) {
                ?>
                <div class="col-md-6"> 
                    <div class="thumbnail"> 
                        <img src="<?php echo base_url('assets/uploads/photos/'.$row->photo)?>" style="height:200px; width:250px;" />
                        <div class="caption" style="height:100px; width:250px;">
                            <p><?php echo $row->title; ?></p>
                        </div>
                    </div>
                </div>
                <?php } } ?>
                <?php echo $this->pagination->create_links(); ?>
            </div>
            
            <!-- Portfolio Script
            ============================================= -->
            <script type="text/javascript">

                jQuery(window).load(function() {

                    var $container = $('#portfolio');

                    $container.isotope({transitionDuration: '0.65s'});

                    $('#portfolio-filter a').click(function() {
                        $('#portfolio-filter li').removeClass('activeFilter');
                        $(this).parent('li').addClass('activeFilter');
                        var selector = $(this).attr('data-filter');
                        $container.isotope({filter: selector});
                        return false;
                    });

                    $('#portfolio-shuffle').click(function() {
                        $container.isotope('updateSortData').isotope({
                            sortBy: 'random'
                        });
                    });

                    $(window).resize(function() {
                        $container.isotope('layout');
                    });

                });

            </script><!-- Portfolio Script End -->

        </div>

    </div><!-- #posts end -->

</div><!-- .postcontent end -->