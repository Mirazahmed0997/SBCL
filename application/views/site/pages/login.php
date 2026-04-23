<!-- welcome section start -->
<style>
    .row {
        margin-top: 5px;
    }
</style>
<section class="welcome" id="welcome">
    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger">
            <?= $this->session->flashdata('error'); ?>
        </div>
    <?php endif; ?>
    <div class="container job_details">
        <div class="row align-items-center">
            <div class="col-12 text-justify">
                <form action="<?php echo base_url('members_login'); ?>" method="post">
                    <input type="hidden" name="userType" value="2">
                    <input type="hidden" name="login_value" value="1">
                    <h1 class="text-center">Member Login</h1>
                    <?php echo $this->session->flashdata('success') ?>
                    <hr>
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-6">
                            <div class="row">
                                <div class="col-4">Mobile No <span style="color:red">*</span></div>
                                <div class="col-8"><input type="number" name="mobile_number" class="form-control"
                                        required></div>
                            </div>
                            <div class="row">
                                <div class="col-4">Password <span style="color:red">*</span></div>
                                <div class="col-8"><input type="password" name="password" class="form-control"
                                        id="password" required>
                                    <i class="fa fa-eye" onclick="togglePassword('password', this)"
                                        style="position:absolute; right:10px; top:10px; cursor:pointer;">
                                    </i>
                                </div>

                            </div>
                            <div class="col-3"></div>
                            <div class="col-12 text-center">
                                <br>
                                <p>If your are not registered, please <a
                                        href="<?php echo base_url('site/registration'); ?>">click</a> here for
                                    registration</p>
                                <input type="submit" value="Submit" class="btn btn-info">
                            </div>

                        </div>
                </form>
            </div>

        </div>
    </div>
</section>


<!-- welcome section end -->


<script>
    function togglePassword(fieldId, icon) {

        var input = document.getElementById(fieldId);

        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            input.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }

    }
</script>