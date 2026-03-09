<!-- Post Content
                                ============================================= -->
<div class="postcontent bothsidebar nobottommargin clearfix">

    <!-- Posts<div class="postcontent nobottommargin clearfix">
    ============================================= -->
    <div id="posts" class="small-thumbs alt">

        <div class="promo promo-dark promo-flat promo-center bottommargin">
            <h3>যোগাযোগ</h3>
        </div>

        <div class="entry nobottomborder" style="margin: 0px 0px -50px 0px;">
        </div>

        <div class="entry nobottomborder" style="margin: 0px 0px -50px 0px;">
            <div class="heading-block fancy-title nobottomborder title-bottom-border">
                <h4><span>কারেন্ট লোকেশন</span>.</h4>
            </div>

           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3667.1459734917194!2d90.73601961532432!3d23.20135026544401!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3754fab748d8e7ed%3A0x2c35d86758e1bdcb!2sChandra%20Bazar!5e0!3m2!1sen!2sbd!4v1614161926158!5m2!1sen!2sbd" width="600" height="450" frameborder="0" style="border:0;height:300px;" allowfullscreen></iframe>

            <!-- 
            <div class="">
		<img  src="<?php echo base_url();?>assets/images/map.png" alt="" width="600" >
	    </div> -->



            <div class="line"></div>
            <!-- Contact Info
            ============================================= -->
           <div class="entry nobottomborder">
                <div class="heading-block fancy-title nobottomborder title-bottom-border">
                    <h4><span>যোগাযোগ</span></h4>
                </div>
                <address>
                    <strong>Address:</strong><br>
                    <?php echo $this->lib->getwebSet('contact_address') ?><br>
                </address>
                <abbr title="Phone Number"><strong>Phone:</strong></abbr> <?php echo $this->lib->getwebSet('contact_phone') ?><br>
                <abbr title="Email Address"><strong>Email:</strong></abbr> <a href="mailto:<?php echo $this->lib->getwebSet('contact_email') ?>"><?php echo $this->lib->getwebSet('contact_email') ?></a>
            </div><!-- Contact Info End -->
            <br><br>
            <div class="heading-block fancy-title nobottomborder title-bottom-border">
                    <h4><span>Submit Complain</span></h4>
                </div>
            <form enctype="multipart/form-data" <?php echo form_open('main/send_mail_new'); ?>
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name" class="form-control"  placeholder="Name">
  </div>
  <div class="form-group" >
    <label for="exampleInputPassword1">Complain</label>

    <textarea name="message" type="text" class="form-control"  placeholder=""></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputFile">File input</label>
    <input name="file" type="file" id="exampleInputFile">
    
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

        </div>

    </div><!-- #posts end -->

</div><!-- .postcontent end -->