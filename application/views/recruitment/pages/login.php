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
            <form action="<?php echo base_url('Login/authentication_process'); ?>" method="post">
                <input type="hidden" name="userType" value="2">
                <input type="hidden" name="login_value" value="1">
            <h1 class="text-center">Applicant Login</h1>
                            <div class="col-12">
                                <?php echo $this->session->flashdata('success') ?>
                            </div>
            <hr>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">Mobile No <span style="color:red">*</span></div>
                        <div class="col-md-8"><input type="number" name="number" class="form-control" required></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Password <span style="color:red">*</span></div>
                        <div class="col-md-8"><input type="password" name="password" class="form-control" required></div>
                    </div>
                <div class="col-md-3"></div>
                <div class="col-md-12 text-center">
                    <br>
                    <p>If your are not registered, please <a href="<?php echo base_url('Recruitment/registration'); ?>">click</a> here for registration</p>
                    <p><a href="<?php echo base_url('Recruitment/forgot_password'); ?>">Forgot Password?</a></p>
                    <input type="submit" value="Submit" class="btn btn-info">
                </div>

            </div>
            </form>
        </div>

      </div>
    </div>
  </section>
  <!-- welcome section end -->