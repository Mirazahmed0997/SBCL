<?php if ($this->session->flashdata('error')): ?>
    <script>
        alert("<?php echo $this->session->flashdata('error'); ?>");
    </script>
<?php endif; ?>

<?php if ($this->session->flashdata('success')): ?>
    <script>
        alert("<?php echo $this->session->flashdata('success'); ?>");
    </script>
<?php endif; ?>



<div class="form-container">
    <div class="form-header">
        <i class="fas fa-user-plus" style="font-size: 40px; color: var(--secondary);"></i>
        <h2>সদস্য পদের আবেদন ফরম</h2>
        <p>সঠিক তথ্য দিয়ে নিচের ফরমটি পূরণ করুন</p>
    </div>

    <form action="<?php echo base_url('member_register'); ?>" method="POST" enctype="multipart/form-data"
        onsubmit="return validatePassword()">
        <div class="grid-container">
            <div class="form-group">
                <label>স্মারক নং</label>
                <input type="text" name="sarok_no" placeholder="স্মারক নং" required>
            </div>
            <div class="form-group">
                <label>তারিখ</label>
                <input type="date" name="sarok_date" required>
            </div>
        </div>
        <div class="form-section-title">১. ব্যক্তিগত তথ্য (Personal Information)</div>
        <div class="grid-container">
            <div class="form-group">
                <label>নাম</label>
                <input type="text" name="name" placeholder="নাম..." required>
            </div>
            <div class="form-group">
                <label>পিতা</label>
                <input type="text" name="father_name" placeholder="পিতা..." required>
            </div>
            <div class="form-group">
                <label>মাতা</label>
                <input type="text" name="mother_name" placeholder="মাতা..." required>
            </div>
            <div class="form-group">
                <label>জাতীয় পরিচয়পত্র নম্বর (NID)</label>
                <input type="number" name="nid" id="digit-input" inputmode="numeric"
                    pattern="[0-9]{10}|[0-9]{13}|[0-9]{17}|[0-9]{19}"
                    title="অনুগ্রহ পূর্বক ১০, ১৩, ১৭ অথবা ১৯ টি সংখ্যা দিন" placeholder="জাতীয় পরিচয়পত্র নম্বর..." required>
            </div>
            <div class="form-group">
                <label>জন্ম তারিখ</label>
                <input type="date" name="birth_date" required>
            </div>
            <div class="form-group">
                <label>মোবাইল নম্বর</label>
                <input type="tel" name="mobile_number" pattern="^\d{11}$" placeholder="017XXXXXXXX" required>
            </div>
            <div class="form-group">
                <label>ই-মেইল</label>
                <input type="tel" name="email" placeholder="xxxxx@gmail.com" required>
            </div>
            <div class="form-group">
                <label>লিঙ্গ</label>
                <select name="gender" required>
                    <option value="">নির্বাচন করুন</option>
                    <option value="পুরুষ">পুরুষ</option>
                    <option value="মহিলা">মহিলা</option>
                    <option value="অন্যান্য">অন্যান্য</option>
                </select>
            </div>
            <div class="form-group">
                <label>গ্রাম</label>
                <input type="text" name="village" placeholder="গ্রাম..." required>
            </div>
            <div class="form-group">
                <label>ডাকঘর</label>
                <input type="text" name="post" placeholder="ডাকঘর..." required>
            </div>
            <div class="form-group">
                <label>উপজেলা</label>
                <input type="text" name="sub_district" placeholder="উপজেলা..." required>
            </div>
            <div class="form-group">
                <label>জেলা</label>
                <input type="text" name="district" placeholder="জেলা..." required>
            </div>
            <div class="form-group">
                <label>সমিতিতে পদবী</label>
                <input type="text" name="association_designation" placeholder="সমিতিতে পদবী..." required>
            </div>
            <div class="form-group">
                <label>সমিতি জেলা</label>
                <input type="text" name="association_district" placeholder="সমিতি জেলা..." required>
            </div>
            <div class="form-group">
                <label>সমিতি নাম</label>
                <input type="text" name="association_name" placeholder="সমিতি নাম..." required>
            </div>
            <!-- <div class="form-group">
                <label>টাকার পরিমাণ</label>
                <input type="number" name="paid_amount" placeholder="সমিতি নাম...">
            </div> -->
            <!-- <div class="form-group">
                <label>পরিশোধের রশিদ নম্বর</label>
                <input type="text" name="voucher_no" placeholder="পরিশোধের রশিদ নম্বর...">
            </div> -->
            <div class="form-group">
                <label>ব্যবস্থাপনা কমিটির তারিখ</label>
                <input type="date" name="managing_committee_date" required>
            </div>
        </div>

        <div class="form-section-title">২. সমবায় সংক্রান্ত তথ্য (Co-operative Info)</div>
        <div class="grid-container">
            <div class="form-group">
                <label>সমিতির নাম</label>
                <input type="text" name="Cooperative_association_name" placeholder="নিবন্ধিত সমিতির নাম" required>
            </div>
            <div class="form-group">
                <label>সমিতির মোবাইল নম্বর</label>
                <input type="tel" name="Cooperative_association_number" pattern="^\d{11}$" placeholder="017XXXXXXXX">
            </div>
            <div class="form-group">
                <label>সমিতির নিবন্ধিত ঠিকানা</label>
                <textarea rows="3" name="Cooperative_association_registration_address"
                    placeholder="গ্রাম, ডাকঘর, উপজেলা, জেলা" required></textarea>
            </div>
            <div class="form-group">
                <label>বর্তমান ঠিকানা</label>
                <textarea rows="3" name="Cooperative_association_address"
                    placeholder="গ্রাম, ডাকঘর, উপজেলা, জেলা" required></textarea>
            </div>
            <div class="form-group">
                <label>সভাপতি</label>
                <input type="text" name="Cooperative_association_chairman" required>
            </div>
            <div class="form-group">
                <label>সম্পাদক</label>
                <input type="text" name="Cooperative_association_secretary" required>
            </div>
            <div class="form-group">
                <label>সমিতির রেজিষ্ট্রেশন নং</label>
                <input type="text" name="Cooperative_association_registration_no" required>
            </div>
            <div class="form-group">
                <label>তারিখ</label>
                <input type="date" name="Cooperative_association_registration_date" required>
            </div>
            <!-- <div class="form-group">
                <label>সমিতির শ্রেনি</label>
                <input type="text" name="Cooperative_association_class">
            </div> -->
            <div class="form-group">
                <label>সমিতির শ্রেনি</label>
                <select name="Cooperative_association_class" required>
                    <option value="">নির্বাচন করুন</option>
                    <option value="প্রাথমিক">প্রাথমিক</option>
                    <option value="কেন্দ্রীয়">কেন্দ্রীয়</option>
                    <option value="জাতীয়">জাতীয়</option>
                </select>
            </div>
            <div class="form-group">
                <label>সমিতির সদস্য সংখ্যা</label>
                <input type="number" name="Cooperative_association_member_count" required>
            </div>
            <div class="form-group">
                <label>সমিতির সদস্য নির্বাচনী ও কর্ম এলাকা</label>
                <input type="text" name="Cooperative_association_working_area" required>
            </div>
        </div>

        <div class="form-section-title">৩. সমিতির পক্ষে মনোনিত সদস্যের নাম ও স্বাক্ষর (Nomini Information)</div>
        <div class="grid-container">
            <div class="form-group">
                <label>নাম</label>
                <input type="text" name="nomini_name" required>
            </div>
            <div class="form-group">
                <label>পদবী</label>
                <input type="text" name="nomini_designation" required>
            </div>
            <div class="form-group">
                <label>মোবাইল নম্বর</label>
                <input type="text" name="nomini_mobile_no" pattern="^\d{11}$" placeholder="017XXXXXXXX" required>
            </div>
            <div class="form-group">
                <label>তারিখ</label>
                <input type="date" name="nomini_date" required>
            </div>
            <div class="form-group">
                <label>স্বাক্ষর</label>
                <div class="file-upload">
                    <input type="file" name="nomini_sign" accept="image/*" required>
                </div>
            </div>
        </div>

        <div class="form-section-title">৪. প্রয়োজনীয় কাগজপত্র (Documents)</div>
        <div class="grid-container">
            <div class="form-group">
                <label>লোগো (PNG)</label>
                <div class="file-upload">
                    <input name="logo" type="file" accept="image/*" required>
                </div>
            </div>
            <div class="form-group">
                <label>সকল ডকুমেন্ট (PDF)</label>
                <div class="file-upload">
                    <input name="document_1" type="file" accept="application/pdf" required>
                </div>
            </div>

            <div class="form-group">
                <label>পাসওয়ার্ড</label>
                <div style="position:relative;">
                    <input type="password" name="password" id="password" class="form-control" required>

                    <i class="fa fa-eye" onclick="togglePassword('password', this)"
                        style="position:absolute; right:10px; top:10px; cursor:pointer;">
                    </i>
                </div>
            </div>

            <div class="form-group">
                <label>কন্ফার্ম পাসওয়ার্ড</label>
                <div style="position:relative;">
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>

                    <i class="fa fa-eye" onclick="togglePassword('confirm_password', this)"
                        style="position:absolute; right:10px; top:10px; cursor:pointer;">
                    </i>
                </div>
            </div>



        </div>


        <!-- <div class="form-section-title">৫. ভর্তি ইস্যুকারী তথ্য</div>
        <div class="grid-container">
            <div class="form-group">
                <label>ভর্তি ইস্যুকারী স্বাক্ষর</label>
                <div class="file-upload">
                    <input name="Admission_Issuer_sign" type="file" accept="image/*" required>
                </div>
            </div>

            <div class="form-group">
                <label>পদবী</label>
                <input type="text" name="Admission_Issuer_designation" required>
            </div>

            <div class="form-group">
                <label>তারিখ</label>
                <input type="date" name="Admission_Issue_date" required>
            </div>





        </div> -->

        <div style="margin-top: 20px;">
            <input type="checkbox" name="check_option" id="terms" required>
            <label for="terms" style="display: inline; font-weight: 400; font-size: 14px;">
                আমি শপথ করছি যে, উপরে প্রদত্ত সকল তথ্য সত্য এবং আমি সমবায় ইউনিয়নের সকল নিয়মাবলী মেনে চলব।
            </label>
        </div>

        <button type="submit" class="submit-btn">আবেদন জমা দিন</button>
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