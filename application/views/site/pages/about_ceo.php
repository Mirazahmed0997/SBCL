
<!-- .......this page copy form pageload...........................start.................................. -->



<!-- Post Content
                                ============================================= -->
                                <div class="container text-justify">
    <div class="row">
<div class="col-md-12 col-lg-12">
    <!-- Posts<div class="postcontent nobottommargin clearfix">
    ============================================= -->
    <div id="posts" class="small-thumbs alt">
        <div class="text-center"  style="height:45px; ">
            <h3 style="background-color:#25A454;color: white;margin:5px;  padding:8px;">প্রধান নির্বাহী কর্মকর্তা</h3>
        </div>

        <div class="align-middle" style="margin-top:15px;">
        <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <h3>নামঃ <?php if(!empty($ftchAboutCeo)) { echo $ftchAboutCeo->title; } ?></h3>
                            <p>পদবীঃ প্রধান নির্বাহী কর্মকর্তা <br>সময়কালঃ <?php if(!empty($ftchAboutCeo)) { echo $ftchAboutCeo->time; } ?></p>
                            <p><?php echo $ftchAboutCeo->description; ?></p>

                        </div>
                    </div>
                    
                </div>
                <div class="col-4 text-center">
                    <div class="card">
                        <div class="card-body">
                            <img id="output_image" <?php if (!empty($ftchAboutCeo->image)){?> src="<?php echo base_url('assets/uploads/photos/'.$ftchAboutCeo->image); ?>" <?php } ?> width="80%" height="250px">
                            
                        </div>
                    </div>
                </div>
            </div>

    </div><!-- #posts end -->

</div>
</div>
</div>