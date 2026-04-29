<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        background: #f4f6f9;
    }

    .form-container {
        width: 500px;
        margin: 60px auto;
        background: #ffffff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-title {
        text-align: center;
        margin-bottom: 25px;
        font-size: 22px;
        font-weight: bold;
        color: #333;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: 600;
    }

    .form-group input,
    .form-group select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
    }

    .form-group input:focus,
    .form-group select:focus {
        border-color: #007bff;
        outline: none;
    }

    .button-group {
        text-align: center;
        margin-top: 20px;
    }

    .btn {
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        font-size: 14px;
        cursor: pointer;
    }

    .btn-register {
        background: #28a745;
        color: white;
    }

    .btn-register:hover {
        background: #218838;
    }

    .btn-reset {
        background: #dc3545;
        color: white;
    }

    .btn-reset:hover {
        background: #c82333;
    }
</style>




<?php if ($this->session->flashdata('error')): ?>

    <div style="width:500px;margin:20px auto;" class="alert alert-danger">
        <?php echo $this->session->flashdata('error'); ?>
    </div>

<?php endif; ?>


<?php if ($this->session->flashdata('success')): ?>

    <div style="width:500px;margin:20px auto;" class="alert alert-success">
        <?php echo $this->session->flashdata('success'); ?>
    </div>

<?php endif; ?>






<div class="form-container">

    <div class="form-title">Admin Registration</div>

    <form action="<?php echo base_url('admin_registration'); ?>" method="post" onsubmit="return validatePassword();">

        <div class="form-group">
            <label>First Name</label>
            <input type="text" name="first_name" required>
        </div>

        <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="last_name" required>
        </div>

        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" required>
        </div>

        <div class="form-group">
            <label>Mobile Number</label>
            <input type="text" name="mobile_number" required>
        </div>


        <div class="form-group">
            <label>Designation</label>
            <select name="designation" required>
                <option value="">Select Designation</option>
                <option value="Admin">Chairman</option>
                <option value="Manager">Manager</option>
                <option value="Staff">Staff</option>
            </select>
        </div>

        <div class="form-group">
            <label>পাসওয়ার্ড</label>
            <div style="position:relative;">
                <input type="password" name="password" id="password" class="form-control">

                <i class="fa fa-eye" onclick="togglePassword('password', this)"
                    style="position:absolute; right:10px; top:10px; cursor:pointer;">
                </i>
            </div>
        </div>

        <div class="form-group">
            <label>কন্ফার্ম পাসওয়ার্ড</label>
            <div style="position:relative;">
                <input type="password" name="confirm_password" id="confirm_password" class="form-control">

                <i class="fa fa-eye" onclick="togglePassword('confirm_password', this)"
                    style="position:absolute; right:10px; top:10px; cursor:pointer;">
                </i>
            </div>
        </div>


        <div class="button-group">
            <button type="submit" class="btn btn-register">Register</button>
            <button type="reset" class="btn btn-reset">Reset</button>
        </div>

        <div class="text-center mt-2">
            <p>
                লগইন করতে
                <a href="<?php echo base_url('admin_dashboard'); ?>">
                    এখানে ক্লিক করুন
                </a>
            </p>
        </div>

    </form>

</div>



<script>
    function validatePassword() {

        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirm_password").value;

        if (password.length < 8) {
            alert("পাসওয়ার্ড কমপক্ষে ৮ ডিজিট হতে হবে");
            return false;
        }
        if (password !== confirmPassword) {
            alert("পাসওয়ার্ড মিলছে না!");
            return false;
        }


        return true;
    }


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