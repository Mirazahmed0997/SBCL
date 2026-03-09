<div class="container">
    <div class="login-card">
        <div class="logo-icon"><i class="fas fa-user-shield"></i></div>
        <h2>অ্যাডমিন প্যানেল</h2>
        
        <form id="loginForm" action="<?php echo base_url('Login/authentication_process'); ?>" method="post">
                <input type="hidden" name="userType" value="1">
            <div class="input-group">
                <i class="fas fa-person"></i>
                <input type="text" name="number" placeholder="ইউজার নাম" required>
            </div>
            
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="পাসওয়ার্ড" required>
            </div>
            <button type="submit" class="login-btn">লগইন করুন</button>
        </form>

        <div class="footer-links">
            <a href="#">পাসওয়ার্ড ভুলে গেছেন?</a>
        </div>
        
        <a href="<?php echo base_url(); ?>" class="back-home"><i class="fas fa-arrow-left"></i> মূল ওয়েবসাইটে ফিরে যান</a>
    </div>

    <!-- <script>
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            // এখানে আপনি আপনার ব্যাকএন্ড লজিক যোগ করবেন
            alert('লগইন রিকোয়েস্ট পাঠানো হয়েছে!');
        });
    </script> -->

</div> 