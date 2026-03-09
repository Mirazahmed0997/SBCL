 <!-- Post Content
============================================= -->
<!-- <div class="postcontent bothsidebar nobottommargin clearfix"> -->

    <!-- Posts<div class="postcontent nobottommargin clearfix">
    ============================================= -->
    <div id="posts" class="small-thumbs alt">

        <div class="promo promo-dark promo-flat promo-center bottommargin">
            <h3>গ্যালারী</h3>
        </div>
        <div class="entry nobottomborder">
            
            <div class="clear"></div>

            <div class="row box-container"> 
                <?php
                if($result != '') {
                foreach($result as $row) {
                ?>
                <div class="col-md-3"> 
                    <div class="thumbnail"> 
                        <a href="<?php echo base_url('assets/uploads/gallery/'.$row->photo)?>" title="<?php echo $row->title ?>" target="_blank">
                            <img src="<?php echo base_url('assets/uploads/gallery/'.$row->photo)?>" style="height:180px; width:100%;" />
                            <div class="caption" style="height:50px; width:250px;">
                                <p><?php echo $row->title; ?></p>
                            </div>
                        </a>
                    </div>
                </div>
                <?php } } ?>
            </div>
            <!-- </?= $this->pagination_bootstrap->render() ?> -->
            

        </div>

    </div><!-- #posts end -->

<!-- </div> -->
<!-- .postcontent end -->

<script src="<?php echo base_url(); ?>assets/backend/jquery-3.2.1.js"></script>
<!-- magnific popup cdn link -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<script>
      
      $('.box-container').magnificPopup({
          delegate:'a',
          type:'image',
          gallery:{
              enabled:true
          }
      });
    </script>