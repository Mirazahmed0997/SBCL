<!DOCTYPE html>
<html lang="bn">

<head>
    <meta charset="UTF-8">
    <title>সদস্য পদের আবেদন ফরম</title>
    <link rel="stylesheet" href="preview.css">
    <style>
        body {
            background: #eee;
            display: flex;
            justify-content: center;
            padding: 20px;
        }


        .form {
            width: 800px;
            /* margin:10px auto; */
            padding: 40px;
            border: 1px solid #ccc;
            font-family: "Times New Roman", Times, serif;
            line-height: 1.4;
            color: #800000;
            background-color: #fff;
            font-size: 10px;
        }

        .header {
            text-align: center;
            margin-bottom: 10px;
            border-bottom: 2px solid #800000;
            padding-bottom: 10px;
        }

        .row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .input-line {
            border: none;
            border-bottom: 1px dotted #000;
            outline: none;
            min-height: 20px;
        }

        .flex {
            display: flex;
            margin-top: 10px;
        }

        .flex input {
            flex: 1;
            margin-left: 5px;
        }

        .section-list {
            margin-top: 20px;
        }

        .section-list .item {
            display: flex;
            margin-bottom: 8px;
        }

        .section-list .label {
            min-width: 250px;
        }

        .footer {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .seal-box {
            width: 150px;
            height: 80px;
            border: 1px dashed #ccc;
            margin-bottom: 5px;
            margin-top: 40px;
        }

        .right-footer {
            width: 300px;
        }

        .small-input {
            border: none;
            border-bottom: 1px dotted #000;
            outline: none;
            flex: 1;
            margin-left: 5px;
        }

        .print-btn {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            font-size: 16px;
            background: #800000;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .print-btn:hover {
            background: #a00000;
        }


        @media print {
            body {
                margin: 0;
                padding: 0;
            }

            .print-btn {
                display: none !important;
            }
        }
    </style>

</head>

<body>

    <div class="form">
        <!-- <button onclick="printForm()" class="print-btn">Print Form</button> -->

        <!-- Header -->
        <div class="header">
            <div style="display:flex;align-items:center;justify-content:center;">
                <div
                    style="width:70px;height:70px;border:1px solid #000;border-radius:50%;margin-right:15px;display:flex;justify-content:center;align-items:center;overflow:hidden;">
                    <img src="<?= base_url('assets/uploads/project/members/' . $member->logo) ?>" alt="Logo"
                        style="width:100%;height:100%;object-fit:cover;border-radius:50%;">
                </div>
                <div>
                    <h1 style="margin:0;font-size:28px;">বাংলাদেশ জাতীয় সমবায় ইউনিয়ন</h1>
                    <p style="margin:0;font-size:12px;">
                        নিবন্ধন নং- ৩৪, তারিখ: ১৬.০৬.১৯৬১ খ্রি. (সংশোধিত) নং-০১, তারিখ: ০৭.০৭.২০২৫ খ্রি.
                    </p>
                    <p style="margin:0;font-size:12px;">
                        কার্যালয় সমবায় ব্যাংক ভবন (৮ম তলা), ৯/ডি, মতিঝিল বা/এ, ঢাকা-১০০০।
                    </p>
                    <p style="margin:0;font-size:12px;">
                        ই-মেইল: bjsu61@gmail.com, মোবাইল: ০১৭১৬৬৫৩৫৯৯
                    </p>
                </div>
            </div>
        </div>

        <!-- Reference -->
        <div class="row">
            <div>স্মারক নং- <span style="width:150px; font-weight: bold;"><?= $member->sarok_no ?></div>
            <div>তারিখ : <span style="width:150px; font-weight: bold;"><?= $member->sarok_date ?></div>
        </div>

        <h2 style="text-align:center;text-decoration:underline;margin-top:20px;">
            সদস্য পদের আবেদন ফরম
        </h2>

        <!-- Recipient -->
        <div style="margin-bottom:10px;">
            <p style="margin:0;">সভাপতি/সম্পাদক</p>
            <p style="margin:0;">বাংলাদেশ জাতীয় সমবায় ইউনিয়ন,</p>
            <p style="margin:0;">সমবায় ব্যাংক ভবন,</p>
            <p style="margin:0;">৯-ডি, মতিঝিল বাণিজ্যিক এলাকা, ঢাকা-১০০০</p>
        </div>

        <p>জনাব,</p>

        <!-- Personal Info -->
        <div class="Personal-info ">
            <p style="font-size:12px;">
                আমি (নাম) : <span style="font-weight: bold">
                    <?= $member->name ?> ,</span>

                পিতা : <span style="font-weight: bold;">
                    <?= $member->father_name ?> ,</span>

                মাতা : <span style="font-weight: bold;">
                    <?= $member->mother_name ?> ,</span>

                গ্রাম : <span style="font-weight: bold;"><?= $member->village ?> ,
                </span>

                ডাকঘর : <span style="font-weight: bold;"><?= $member->post ?>
                </span>,

                উপজেলা : <span style="font-weight: bold;"><?= $member->sub_district ?> ,</span>
                জেলা : <span style="font-weight: bold;"><?= $member->district ?></span>,
                সমিতিতে পদবী :<span style="font-weight: bold;"> <?= $member->branch_designation ?></span>,
                জেলার অন্তর্গত, সমিতির নাম :<span style="font-weight: bold;"><?= $member->branch_work_name ?></span>
            </p>

        </div>

        <p style="text-align:justify;">
            জানাইতেছি যে, আমাদের সমিতি বাংলাদেশ জাতীয় সমবায় ইউনিয়ন এর সদস্যভুক্ত হইতে ইচ্ছুক এবং সদস্য পদের জন্য ভর্তি
            ফি বাবদ ২,০০০/-(দুই হাজার) টাকা এবং বার্ষিক চাঁদা ১,০০০/-(এক হাজার) টাকা সর্বমোট ৩০০০/-(তিন হাজার) টাকা এবং
            বাংলাদেশ জাতীয় সমবায় ইউনিয়ন এর ব্যাংক হিসাব নং ০০৬৭০১০০০৩৯৯৭, রূপালী ব্যাংক পিএলসি, ফরেন এক্সচেঞ্জ কর্পোরেট
            ব্রাঞ্চ ঢাকা, জমা করে জমার রশিদ সংযুক্ত করেছি।
        </p>

        <p style="text-align:justify;">
            আমরা বাংলাদেশ জাতীয় সমবায় ইউনিয়ন এর উপ-আইন, সমবায় সমিতি আইন, ২০০১ (সংশোধিত ২০০২,২০১৩) ও সমবায় সমিতি
            বিধিমালা, ২০০৪ (সংশোধিত ২০২০) মানিয়া চলিতে সম্মত আছি।
        </p>

        <!-- List Section -->
        <div class="section-list">

            <div class="item">
                <span class="label">১. সমিতির নাম : branch_work_name</span>
                <span style="margin-left:10px; font-weight:bold;"><?= $member->branch_name ?></span>
            </div>

            <div class="item">
                <span class="label">২. সমিতির নিবন্ধিত ঠিকানা :</span>
                <span style="margin-left:10px; font-weight:bold;"><?= $member->branch_registration_address ?></span>
            </div>

            <div class="item">
                <span class="label">৩. বর্তমান ঠিকানা :</span>
                <span style="margin-left:10px; font-weight:bold;"><?= $member->branch_address ?></span>
            </div>

            <div class="item">
                <span class="label">৪. যোগাযোগের মোবাইল নম্বর সমিতির :</span>
                <span style="margin-left:10px; font-weight:bold;"><?= $member->branch_mobile_number ?></span>
            </div>

            <div class="item">
                <span class="label">৫. সভাপতি :</span>
                <span style="margin-left:10px; font-weight:bold;"><?= $member->branch_chairman ?></span>
            </div>

            <div class="item">
                <span class="label">৬. সম্পাদক :</span>
                <span style="margin-left:10px; font-weight:bold;"><?= $member->branch_secretary ?></span>
            </div>

            <div class="item">
                <span class="label">৭. তারিখ :</span>
                <span style="margin-left:10px; font-weight:bold;"> <?= date('Y-m-d', strtotime($member->created_at)) ?></span>
            </div>

            <div class="item">
                <span class="label">৮. সমিতির রেজিস্ট্রেশন নং :</span>
                <span style="margin-left:10px; font-weight:bold;"><?= $member->branch_registration_no ?></span>
            </div>

            <div class="item">
                <span class="label">৯. সমিতির শ্রেণি :</span>
                <span style="margin-left:10px; font-weight:bold;"><?= $member->branch_class ?></span>
            </div>

            <div class="item">
                <span class="label">১০. সমিতির সদস্য সংখ্যা :</span>
                <span style="margin-left:10px; font-weight:bold;"><?= $member->branch_member_count ?></span>
            </div>

            <div class="item">
                <span class="label">১১. সমিতির সদস্য নির্বাচনী ও কর্ম এলাকা :</span>
                <span style="margin-left:12px; font-weight:bold;"><?= $member->branch_working_area ?></span>
            </div>

            <div class="item">
                <span class="label">১২. মনোনীত সদস্যের পরিচয়পত্র (সংযুক্ত) </span>
            </div>

            <div class="item">
                <span class="label">১৩. সমিতি জেলা সমবায় ইউনিয়নের সদস্যভুক্ত/সদস্যভুক্ত নহে</span>
            </div>

        </div>
     

        <!-- Footer -->
        <div class="footer">
            <div style="text-align:center;">
                <div class="seal-box"></div>
                <p>সমিতির সীলমোহর</p>
            </div>

            <div class="right-footer">
                <p style="text-align:center;font-weight:bold;">আপনার বিশ্বস্ত</p>
                <p style="text-align:center;font-size:12px;">সমিতির পক্ষে মনোনীত সদস্যের নাম ও স্বাক্ষর</p>

                <div style="margin-top:20px;">
                    <div style="display: flex; gap: 5px; align-items: center;">
                        (০১) স্বাক্ষর
                    <img src="<?= base_url('assets/uploads/project/members/nominee_sign/'.$member->nomini_sign) ?>" width="80">
                    </div>
                    <div class="flex">নাম : <span style="font-weight: bold;"><?= $member->name ?></div>
                    <div class="flex">পদবী : <span style="font-weight: bold;"><?= $member->branch_designation ?></div>
                    <div class="flex">মোবাইল নম্বর : <span style="font-weight: bold;"><?= $member->mobile_number ?></div>
                    <div class="flex">তারিখ : <span style="font-weight: bold;"> <?= date('Y-m-d', strtotime($member->created_at)) ?></div>
                </div>
            </div>
        </div>

    </div>

</body>

</html>