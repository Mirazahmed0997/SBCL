<!DOCTYPE html>
<html lang="bn">
<head>
<meta charset="UTF-8">
<title>নগদ প্রবাহ বিবরণী নোট</title>

<style>

/* General Form Styles */
body {
    font-family: 'Poppins', sans-serif;
    background-color: #f5f6fa;
    margin: 0;
    padding: 0;
}

.form-container {
    max-width: 900px;
    margin: 30px auto;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    padding: 30px 40px;
}

.form-header {
    text-align: center;
    margin-bottom: 30px;
}

.form-header h2 {
    margin: 10px 0;
    font-size: 28px;
    color: #2f3640;
}

.form-header p {
    color: #718093;
    font-size: 14px;
}

/* Section Title */
.form-section-title {
    font-weight: 600;
    font-size: 18px;
    color: #2f3640;
    margin: 25px 0 10px 0;
    border-bottom: 2px solid #dcdde1;
    padding-bottom: 5px;
}

/* Grid Layout */
.grid-container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 20px;
}

/* Form Groups */
.form-group {
    display: flex;
    flex-direction: column;
}

.form-group label {
    font-weight: 500;
    margin-bottom: 5px;
    color: #2f3640;
}

.form-group input,
.form-group select,
.form-group textarea {
    padding: 10px 12px;
    border: 1px solid #dcdde1;
    border-radius: 5px;
    font-size: 14px;
    transition: 0.3s;
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    outline: none;
    border-color: #4cd137;
    box-shadow: 0 0 5px rgba(76, 209, 55, 0.3);
}

.form-group textarea {
    resize: vertical;
}

/* File Upload */
.file-upload input[type="file"] {
    padding: 5px;
    border: 1px solid #dcdde1;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
}

/* Checkbox */
input[type="checkbox"] {
    width: auto;
    margin-right: 8px;
}

/* Buttons */
.submit-btn {
    display: inline-block;
    background-color: #4cd137;
    color: #fff;
    font-weight: 600;
    padding: 12px 25px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-size: 16px;
    margin-top: 20px;
    transition: 0.3s;
}

.submit-btn:hover {
    background-color: #44bd32;
}

/* Images & PDF Previews */
img {
    border-radius: 5px;
    margin-top: 5px;
    max-height: 50px;
}

a {
    color: #0984e3;
    text-decoration: none;
    font-weight: 500;
}

a:hover {
    text-decoration: underline;
}

/* Responsive */
@media (max-width: 768px) {
    .grid-container {
        grid-template-columns: 1fr;
    }
}

</style>
</head>

<body>
    <div class="form-container">
    <div class="form-header">
        <i class="fas fa-user-plus" style="font-size: 40px; color: var(--secondary);"></i>
        <h2>সদস্য পদের আবেদন ফরম (Update)</h2>
        <p>সঠিক তথ্য দিয়ে নিচের ফরমটি পূরণ করুন</p>
    </div>

    <form action="<?= base_url('site/update_member/'.$member->id); ?>" method="POST" enctype="multipart/form-data">
        
        <!-- Sarok Info -->
        <div class="grid-container">
            <div class="form-group">
                <label>স্মারক নং</label>
                <input type="text" name="sarok_no" value="<?= $member->sarok_no ?>" placeholder="স্মারক নং" >
            </div>
            <div class="form-group">
                <label>তারিখ</label>
                <input type="date" name="sarok_date" value="<?= $member->sarok_date ?>" >
            </div>
        </div>

        <!-- Personal Information -->
        <div class="form-section-title">১. ব্যক্তিগত তথ্য (Personal Information)</div>
        <div class="grid-container">
            <div class="form-group">
                <label>নাম</label>
                <input type="text" name="name" value="<?= $member->name ?>" placeholder="নাম..." >
            </div>
            <div class="form-group">
                <label>পিতা</label>
                <input type="text" name="father_name" value="<?= $member->father_name ?>" placeholder="পিতা..." >
            </div>
            <div class="form-group">
                <label>মাতা</label>
                <input type="text" name="mother_name" value="<?= $member->mother_name ?>" placeholder="মাতা..." >
            </div>
            <div class="form-group">
                <label>জাতীয় পরিচয়পত্র নম্বর (NID)</label>
                <input type="number" name="nid" value="<?= $member->nid ?>" pattern="[0-9]{10}|[0-9]{13}|[0-9]{17}|[0-9]{19}" placeholder="জাতীয় পরিচয়পত্র নম্বর..." >
            </div>
            <div class="form-group">
                <label>জন্ম তারিখ</label>
                <input type="date" name="birth_date" value="<?= $member->birth_date ?>" >
            </div>
            <div class="form-group">
                <label>মোবাইল নম্বর</label>
                <input type="tel" name="mobile_number" value="<?= $member->mobile_number ?>" pattern="^\d{11}$" placeholder="017XXXXXXXX" >
            </div>
            <div class="form-group">
                <label>লিঙ্গ</label>
                <select name="gender">
                    <option value="">নির্বাচন করুন</option>
                    <option value="male" <?= $member->gender == 'male' ? 'selected' : '' ?>>পুরুষ</option>
                    <option value="female" <?= $member->gender == 'female' ? 'selected' : '' ?>>মহিলা</option>
                    <option value="other" <?= $member->gender == 'other' ? 'selected' : '' ?>>অন্যান্য</option>
                </select>
            </div>
            <div class="form-group">
                <label>গ্রাম</label>
                <input type="text" name="village" value="<?= $member->village ?>" placeholder="গ্রাম..." >
            </div>
            <div class="form-group">
                <label>ডাকঘর</label>
                <input type="text" name="post" value="<?= $member->post ?>" placeholder="ডাকঘর..." >
            </div>
            <div class="form-group">
                <label>উপজেলা</label>
                <input type="text" name="sub_district" value="<?= $member->sub_district ?>" placeholder="উপজেলা..." >
            </div>
            <div class="form-group">
                <label>জেলা</label>
                <input type="text" name="district" value="<?= $member->district ?>" placeholder="জেলা..." >
            </div>
            <div class="form-group">
                <label>সমিতিতে পদবী</label>
                <input type="text" name="branch_designation" value="<?= $member->branch_designation ?>" placeholder="সমিতিতে পদবী..." >
            </div>
            <div class="form-group">
                <label>সমিতি জেলা</label>
                <input type="text" name="branch_district" value="<?= $member->branch_district ?>" placeholder="সমিতি জেলা..." >
            </div>
            <div class="form-group">
                <label>সমিতি নাম</label>
                <input type="text" name="branch_work_name" value="<?= $member->branch_work_name ?>" placeholder="সমিতি নাম..." >
            </div>
            <div class="form-group">
                <label>টাকার পরিমাণ</label>
                <input type="number" name="paid_amount" value="<?= $member->paid_amount ?>" >
            </div>
            <div class="form-group">
                <label>পরিশোধের রশিদ নম্বর</label>
                <input type="text" name="voucher_no" value="<?= $member->voucher_no ?>" >
            </div>
            <div class="form-group">
                <label>ব্যবস্থাপনা কমিটির তারিখ</label>
                <input type="date" name="managing_committee_date" value="<?= $member->managing_committee_date ?>" >
            </div>
        </div>

        <!-- Co-operative Info -->
        <div class="form-section-title">২. সমবায় সংক্রান্ত তথ্য (Co-operative Info)</div>
        <div class="grid-container">
            <div class="form-group">
                <label>সমিতির নাম</label>
                <input type="text" name="branch_name" value="<?= $member->branch_name ?>" >
            </div>
            <div class="form-group">
                <label>সমিতির মোবাইল নম্বর</label>
                <input type="tel" name="branch_mobile_number" value="<?= $member->branch_mobile_number ?>" >
            </div>
            <div class="form-group">
                <label>সমিতির নিবন্ধিত ঠিকানা</label>
                <textarea name="branch_registration_address"><?= $member->branch_registration_address ?></textarea>
            </div>
            <div class="form-group">
                <label>বর্তমান ঠিকানা</label>
                <textarea name="branch_address"><?= $member->branch_address ?></textarea>
            </div>
            <div class="form-group">
                <label>সভাপতি</label>
                <input type="text" name="branch_chairman" value="<?= $member->branch_chairman ?>" >
            </div>
            <div class="form-group">
                <label>সম্পাদক</label>
                <input type="text" name="branch_secretary" value="<?= $member->branch_secretary ?>" >
            </div>
            <div class="form-group">
                <label>সমিতির রেজিষ্ট্রেশন নং</label>
                <input type="text" name="branch_registration_no" value="<?= $member->branch_registration_no ?>" >
            </div>
            <div class="form-group">
                <label>তারিখ</label>
                <input type="date" name="branch_registration_date" value="<?= $member->branch_registration_date ?>" >
            </div>
            <div class="form-group">
                <label>সমিতির শ্রেনি</label>
                <input type="text" name="branch_class" value="<?= $member->branch_class ?>" >
            </div>
            <div class="form-group">
                <label>টাইপ</label>
                <select name="branch_type">
                    <option value="">নির্বাচন করুন</option>
                    <option value="male" <?= $member->branch_type=='male'?'selected':'' ?>>প্রাথমিক</option>
                    <option value="other" <?= $member->branch_type=='other'?'selected':'' ?>>কেন্দ্রীয়</option>
                    <option value="female" <?= $member->branch_type=='female'?'selected':'' ?>>জাতীয়</option>
                </select>
            </div>
            <div class="form-group">
                <label>সমিতির সদস্য সংখ্যা</label>
                <input type="number" name="branch_member" value="<?= $member->branch_member_count ?>" >
            </div>
            <div class="form-group">
                <label>সমিতির সদস্য নির্বাচনী ও কর্ম এলাকা</label>
                <input type="text" name="branch_working_area" value="<?= $member->branch_working_area ?>" >
            </div>
        </div>

        <!-- Nominee Info -->
        <div class="form-section-title">৩. সমিতির পক্ষে মনোনিত সদস্য তথ্য (Nomini Information)</div>
        <div class="grid-container">
            <div class="form-group">
                <label>নাম</label>
                <input type="text" name="nomini_name" value="<?= $member->nomini_name ?>" >
            </div>
            <div class="form-group">
                <label>পদবী</label>
                <input type="text" name="nomini_designation" value="<?= $member->nomini_designation ?>" >
            </div>
            <div class="form-group">
                <label>মোবাইল নম্বর</label>
                <input type="text" name="nomini_mobile_no" value="<?= $member->nomini_mobile_no ?>" >
            </div>
            <div class="form-group">
                <label>তারিখ</label>
                <input type="date" name="nomini_date" value="<?= $member->nomini_date ?>" >
            </div>
            <div class="form-group">
                <label>স্বাক্ষর</label>
                <input type="file" name="nomini_sign">
                <?php if($member->nomini_sign): ?>
                    <img src="<?= base_url('assets/uploads/project/members/nominee_sign/'.$member->nomini_sign) ?>" width="50">
                <?php endif; ?>
            </div>
        </div>

        <!-- Documents -->
        <div class="form-section-title">৪. প্রয়োজনীয় কাগজপত্র (Documents)</div>
        <div class="grid-container">
            <div class="form-group">
                <label>লোগো (PNG)</label>
                <input type="file" name="logo">
                <?php if($member->logo): ?>
                    <img src="<?= base_url('assets/uploads/project/members/' . $member->logo) ?>" width="50">
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label>সকল ডকুমেন্ট (PDF)</label>
                <input type="file" name="document_1">
                <?php if($member->document_1): ?>
                    <a href="<?= base_url('assets/uploads/project/members/members_document/'.$member->document_1) ?>" target="_blank">View PDF</a>
                <?php endif; ?>
            </div>
        </div>

      

        <button type="submit" class="submit-btn">Update</button>
    </form>
</div>
</body>
</html>







