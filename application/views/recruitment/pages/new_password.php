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
            <form action="<?php echo base_url('Login/update_new_password'); ?>" method="post">
                <input type="hidden" name="userType" value="2">
                <input type="hidden" name="login_value" value="1">
            <h1 class="text-center">New Password</h1>
            <hr>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <?php echo $this->session->flashdata('success') ?>
                        </div>
                        <div class="col-md-12">Password <span style="color:red">*</span></div>
                        <div class="col-md-12"><input type="password" name="password" id="password" class="form-control" required data-validation="length"
                                        data-validation-length="min2" placeholder="New Password"></div>
                        <div class="col-md-12">Confirm Password <span style="color:red">*</span></div>
                        <div class="col-md-12">
                            <input type="password" name="password_confirm" id="password_confirm" class="form-control" required data-validation="length"
                                        data-validation-length="min2"  oninput="check(this)" placeholder="Confirm Password">
                            <span id="output"></span>
                    
                        </div>
                        <div class="col-md-12"><br><input type="submit" value="Submit" class="btn btn-info"></div>
                        
                    </div>
                <div class="col-md-3"></div>
                <div class="col-md-12 text-center">
                    <br>
                    <!-- <p>If your are not registered, please <a href="<?php echo base_url('Recruitment/registration'); ?>">click</a> here for registration</p>
                    <p><a href="<?php echo base_url('Recruitment/Login'); ?>">Login</a></p> -->
                    
                </div>

            </div>
            </form>
        </div>

      </div>
    </div>
  </section>
  <!-- welcome section end -->

  <script>
    
    function check(input) {
        if (input.value != document.getElementById('password').value) {
            document.getElementById("output").innerHTML = "Password not matched!";
        } else {
            document.getElementById("output").innerHTML = "Password matched!";
        }
    }
  </script>