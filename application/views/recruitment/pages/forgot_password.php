<!-- welcome section start -->
<style>
    .row {
        margin-top: 5px;
    }
</style>
<section class="welcome" id="welcome">
    <div class="container job_details">
      <div class="row align-items-center">
        <div class="col-12 text-justify">
            <form action="<?php echo base_url('Login/forgot_password'); ?>" method="post">
                <input type="hidden" name="userType" value="2">
                <input type="hidden" name="login_value" value="1">
            <h1 class="text-center">Password Reset</h1>
            <hr>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-12 text-center">
                            <?php echo $this->session->flashdata('success') ?>
                        </div>
                        <div class="col-md-2">Email <span style="color:red">*</span></div>
                        <div class="col-md-8"><input type="email" name="email" class="form-control" required placeholder="Enter your email..."></div>
                        <div class="col-md-2"><input type="submit" value="Submit" class="btn btn-info"></div>
                    </div>
                <div class="col-md-3"></div>
                <div class="col-md-12 text-center">
                    <br>
                    <p>If your are not registered, please <a href="<?php echo base_url('Recruitment/registration'); ?>">click</a> here for registration</p>
                    <p>Or <a href="<?php echo base_url('Recruitment/Login'); ?>">Login</a></p>
                    
                </div>

            </div>
            </form>
        </div>

      </div>
    </div>
  </section>
  <!-- welcome section end -->