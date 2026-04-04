<div class="container-fluid mt-4">

    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger">
            <?php echo $this->session->flashdata('error'); ?>
        </div>
    <?php endif; ?>

    <div class="row justify-content-center">
        <div class="col-md-5">

            <div class="card card-primary shadow">

                <div class="card-header text-center">
                    <h3 class="card-title">
                        <i class="fas fa-user-shield"></i> অ্যাডমিন প্যানেল লগইন
                    </h3>
                </div>

                <div class="card-body">

                    <form action="<?php echo base_url('Admin_login/login_process'); ?>" method="post">

                        <input type="hidden" name="userType" value="1">

                        <div class="form-group">
                            <label>ইউজার নাম / মোবাইল নাম্বার</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-user"></i>
                                    </span>
                                </div>
                                <input type="text" name="mobile_number" class="form-control"
                                    placeholder="ইউজার নাম / মোবাইল নাম্বার" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>পাসওয়ার্ড</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </div>
                                <input type="password" name="password" id="password" class="form-control" placeholder="পাসওয়ার্ড"
                                    required>
                                <i class="fa fa-eye" onclick="togglePassword('password', this)"
                                    style="position:absolute; right:10px; top:10px; cursor:pointer;">
                                </i>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">
                            লগইন করুন
                        </button>

                    </form>

                    <div class="text-center mt-3">
                        <a href="#">পাসওয়ার্ড ভুলে গেছেন?</a>
                    </div>

                    <div class="text-center mt-2">
                        <p>
                            রেজিস্ট্রেশন করতে
                            <a href="<?php echo base_url('admin_registration_form'); ?>">
                                এখানে ক্লিক করুন
                            </a>
                        </p>
                    </div>

                    <div class="text-center mt-2">
                        <a href="<?php echo base_url(); ?>">
                            <i class="fas fa-arrow-left"></i> মূল ওয়েবসাইটে ফিরে যান
                        </a>
                    </div>

                </div>

            </div>

        </div>
    </div>

</div>


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