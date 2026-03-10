<div class="form-container">
    <div class="form-header">
        <i class="fas fa-user-plus" style="font-size: 40px; color: var(--secondary);"></i>
        <h2>সদস্য পদের আবেদন ফরম</h2>
        <p>সঠিক তথ্য দিয়ে নিচের ফরমটি পূরণ করুন</p>
    </div>

    <form action="<?php echo base_url('member_register'); ?>" method="POST" enctype="multipart/form-data">
        <div class="grid-container">
            <div class="form-group">
                <label>স্মারক নং</label>
                <input type="text" name="sarok_no" placeholder="স্মারক নং" >
            </div>
            <div class="form-group">
                <label>তারিখ</label>
                <input type="date" name="sarok_date" >
            </div>
        </div>
        <div class="form-section-title">১. ব্যক্তিগত তথ্য (Personal Information)</div>
        <div class="grid-container">
            <div class="form-group">
                <label>নাম</label>
                <input type="text" name="name" placeholder="নাম..." >
            </div>
            <div class="form-group">
                <label>পিতা</label>
                <input type="text" name="father_name" placeholder="পিতা..." >
            </div>
            <div class="form-group">
                <label>মাতা</label>
                <input type="text" name="mother_name" placeholder="মাতা..." >
            </div>
            <div class="form-group">
                <label>জাতীয় পরিচয়পত্র নম্বর (NID)</label>
                <input type="number" name="nid" id="digit-input" inputmode="numeric" pattern="[0-9]{10}|[0-9]{13}|[0-9]{17}|[0-9]{19}" title="অনুগ্রহ পূর্বক ১০, ১৩, ১৭ অথবা ১৯ টি সংখ্যা দিন" placeholder="জাতীয় পরিচয়পত্র নম্বর..." >
            </div>
            <div class="form-group">
                <label>জন্ম তারিখ</label>
                <input type="date" name="birth_date" >
            </div>
            <div class="form-group">
                <label>মোবাইল নম্বর</label>
                <input type="tel" name="mobile_number" pattern="^\d{11}$" placeholder="017XXXXXXXX" >
            </div>
            <div class="form-group">
                <label>লিঙ্গ</label>
                <select name="gender" >
                    <option value="">নির্বাচন করুন</option>
                    <option value="male">পুরুষ</option>
                    <option value="female">মহিলা</option>
                    <option value="other">অন্যান্য</option>
                </select>
            </div>
            <div class="form-group">
                <label>গ্রাম</label>
                <input type="text" name="village" placeholder="গ্রাম..." >
            </div>
            <div class="form-group">
                <label>ডাকঘর</label>
                <input type="text" name="post" placeholder="ডাকঘর..." >
            </div>
            <div class="form-group">
                <label>উপজেলা</label>
                <input type="text" name="sub_district" placeholder="উপজেলা..." >
            </div>
            <div class="form-group">
                <label>জেলা</label>
                <input type="text" name="district" placeholder="জেলা..." >
            </div>
            <div class="form-group">
                <label>সমিতিতে পদবী</label>
                <input type="text" name="branch_designation" placeholder="সমিতিতে পদবী..." >
            </div>
            <div class="form-group">
                <label>সমিতি জেলা</label>
                <input type="text" name="branch_district" placeholder="সমিতি জেলা..." >
            </div>
            <div class="form-group">
                <label>সমিতি নাম</label>
                <input type="text" name="branch_work_name" placeholder="সমিতি নাম..." >
            </div>
            <div class="form-group">
                <label>টাকার পরিমাণ</label>
                <input type="number" name="paid_amount" placeholder="সমিতি নাম..." >
            </div>
            <div class="form-group">
                <label>পরিশোধের রশিদ নম্বর</label>
                <input type="text" name="voucher_no" placeholder="পরিশোধের রশিদ নম্বর..." >
            </div>
            <div class="form-group">
                <label>ব্যবস্থাপনা কমিটির তারিখ</label>
                <input type="date" name="managing_committee_date" >
            </div>
        </div>

        <div class="form-section-title">২. সমবায় সংক্রান্ত তথ্য (Co-operative Info)</div>
        <div class="grid-container">
            <div class="form-group">
                <label>সমিতির নাম</label>
                <input type="text" name="branch_name" placeholder="নিবন্ধিত সমিতির নাম" >
            </div>
            <div class="form-group">
                <label>সমিতির মোবাইল নম্বর</label>
                <input type="tel" name="branch_mobile_number" pattern="^\d{11}$" placeholder="017XXXXXXXX" >
            </div>
            <div class="form-group">
                <label>সমিতির নিবন্ধিত ঠিকানা</label>
                <textarea rows="3" name="branch_registration_address" placeholder="গ্রাম, ডাকঘর, উপজেলা, জেলা"></textarea>
            </div>
            <div class="form-group">
                <label>বর্তমান ঠিকানা</label>
                <textarea rows="3" name="branch_address" placeholder="গ্রাম, ডাকঘর, উপজেলা, জেলা"></textarea>
            </div>
            <div class="form-group">
                <label>সভাপতি</label>
                <input type="text" name="branch_chairman" >
            </div>
            <div class="form-group">
                <label>সম্পাদক</label>
                <input type="text" name="branch_secretary" >
            </div>
            <div class="form-group">
                <label>সমিতির রেজিষ্ট্রেশন নং</label>
                <input type="text" name="branch_registration_no" >
            </div>
            <div class="form-group">
                <label>তারিখ</label>
                <input type="date" name="branch_registration_date" >
            </div>
            <div class="form-group">
                <label>সমিতির শ্রেনি</label>
                <input type="text" name="branch_class" >
            </div>
            <div class="form-group">
                <label>টাইপ</label>
                <select name="branch_type" >
                    <option value="">নির্বাচন করুন</option>
                    <option value="male">প্রাথমিক</option>
                    <option value="other">কেন্দ্রীয়</option>
                    <option value="female">জাতীয়</option>
                </select>
            </div>
            <div class="form-group">
                <label>সমিতির সদস্য সংখ্যা</label>
                <input type="number" name="branch_member" >
            </div>
            <div class="form-group">
                <label>সমিতির সদস্য নির্বাচনী ও কর্ম এলাকা</label>
                <input type="text" name="branch_working_area" >
            </div>
        </div>

        <div class="form-section-title">৩. সমিতির পক্ষে মনোনিত সদস্য তথ্য (Nomini Information)</div>
        <div class="grid-container">
            <div class="form-group">
                <label>নাম</label>
                <input type="text" name="nomini_name" >
            </div>
            <div class="form-group">
                <label>পদবী</label>
                <input type="text" name="nomini_designation" >
            </div>
            <div class="form-group">
                <label>মোবাইল নম্বর</label>
                <input type="text" name="nomini_mobile_no" pattern="^\d{11}$" placeholder="017XXXXXXXX" >
            </div>
            <div class="form-group">
                <label>তারিখ</label>
                <input type="date" name="nomini_date" >
            </div>
            <div class="form-group">
                <label>স্বাক্ষর</label>
                <div class="file-upload">
                    <input type="file" name="nomini_sign" accept="image/*" >
                </div>
            </div>
        </div>

        <div class="form-section-title">৪. প্রয়োজনীয় কাগজপত্র (Documents)</div>
        <div class="grid-container">
            <div class="form-group">
                <label>লোগো (PNG)</label>
                <div class="file-upload">
                    <input name="logo" type="file" accept="image/*" >
                </div>
            </div>
            <div class="form-group">
                <label>সকল ডকুমেন্ট (PDF)</label>
                <div class="file-upload">
                    <input name="document_1" type="file" accept="application/pdf" >
                </div>
            </div>
        </div>

        <div style="margin-top: 20px;">
            <input type="checkbox" name="check_option" id="terms" >
            <label for="terms" style="display: inline; font-weight: 400; font-size: 14px;">
                আমি শপথ করছি যে, উপরে প্রদত্ত সকল তথ্য সত্য এবং আমি সমবায় ইউনিয়নের সকল নিয়মাবলী মেনে চলব।
            </label>
        </div>

        <button type="submit" class="submit-btn">আবেদন জমা দিন</button>
    </form>
</div>