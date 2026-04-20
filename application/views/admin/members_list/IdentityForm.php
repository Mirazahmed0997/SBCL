<!DOCTYPE html>
<html lang="bn">

<head>
  <meta charset="UTF-8">
  <title>সদস্যের পরিচয় পত্রের ফরম</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      font-family: "SolaimanLipi", Arial, sans-serif;
      background: #f5f5f5;
    }

    .page {
      background: #fff;
      border: 1px solid #ccc;
      padding: 20px;
    }

    .dotted-line {
      border-bottom: 1px dotted #000;
      min-width: 200px;
      display: inline-block;
    }

    .note-box {
      border: 1px solid #000;
      font-size: 12px;
      padding: 10px;
    }

    .title {
      font-size: 20px;
      font-weight: bold;
    }

    .subtitle {
      font-size: 13px;
    }

    .form-no {
      font-size: 14px;
    }
  </style>
</head>

<body>

  <div class="content-wrapper  p-12">
    <div class="page shadow-sm">

      <!-- Header -->
      <!-- <div class="d-flex justify-content-between">
        <div></div>
        <div class="form-no">ফরম নং-০৮</div>
      </div> -->

      <div class="text-center title">সদস্যের পরিচয় পত্রের ফরম</div>
      <div class="text-center subtitle">[বিধি ৩৩(১) দ্রষ্টব্য]</div>
      <div class="text-center subtitle">(কেন্দ্রীয় ও জাতীয় সমিতির জন্য)</div>

      <div class="text-center mt-3">
        <strong><?= $member->association_name ?> সমবায় সমিতি লি.
          <div class="subtitle">(পরিচয়পত্র ইস্যুকারী সদস্য কমিটির নাম)</div>
      </div>

      <!-- Note -->
      <div class="row mt-3">
        <div class="col-md-9"></div>
        <div class="col-md-3">
          <div class="note-box" style="height: 150px; width: 50%;">
            সমিতির সভাপতি বা নির্বাহী কর্মকর্তা কর্তৃক সত্যায়িত এবং জেলা বা উপজেলা সমবায় অফিসার কর্তৃক প্রতিস্বাক্ষরিত এক কপি সংযোজন করিতে হইবে
          </div>
        </div>
      </div>

      <!-- Form Fields -->
      <div class="mt-4">

        <div class="row mb-2">
          <div class="col-4">০১. সদস্যের নাম </div>
          <div class="col-8">: <strong><?= $member->name ?></strong></span></div>
        </div>

        <div class="row mb-2">
          <div class="col-4">০২. পিতা/স্বামীর নাম</div>
          <div class="col-8">: <strong><?= $member->father_name ?></span></div>
        </div>

        <div class="row mb-2">
          <div class="col-4">০৩. মাতার নাম</div>
          <div class="col-8">: <strong><?= $member->mother_name ?></strong></span></div>
        </div>

        <div class="row mb-2">
          <div class="col-4">০৪. পূর্ণ ঠিকানা</div>
          <div class="col-8">
            : গ্রাম: <strong><?= $member->village ?></strong> , ডাকঘর: <strong><?= $member->post ?></strong>, উপজেলা:
            <strong><?= $member->sub_district ?>, জেলা: <strong><?= $member->district ?></strong>
          </div>
        </div>

        <div class="row mb-2">
          <div class="col-4">০৫. মোবাইল নম্বর</div>
          <div class="col-8">: <strong><?= $member->mobile_number ?></span></div>
        </div>

        <div class="row mb-2">
          <div class="col-4">০৬. সদস্য রেজিস্টার নম্বর</div>
          <div class="col-8">: <?= $member->Cooperative_association_registration_no ?></span></div>
        </div>

        <div class="row mb-3">
          <div class="col-12">
            ০৭. এই পরিচয়পত্র ধারী ব্যক্তি বাংলাদেশ জাতীয় সমবায় ইউনিয়ন,সমবায় ব্যাংক ভবন (অষ্টম তলা) ৯/ডি, মতিঝিল বাণিজ্যিক এলাকা, ঢাকা-১০০০ এর সদস্য পদের আবেদন করার সমিতি কর্তৃক ক্ষমতাপ্রাপ্ত
          </div>
        </div>

      </div>

      <!-- Signature -->
      <div class="">

        <div class="sign">
          সদস্যের স্বাক্ষর<br><br>
          (০১)<br><br>(০২)<br><br>(০৩)
        </div>

        <div class="w-50 text-left mt-5 seal d-flex justify-content-between">

          <div class=" mb-3 mb-md-0 seal">
            প্রত্যয়ন<br>
            জেলা/উপজেলা সমবায় অফিসার<br>
            স্বাক্ষর ও সীল
          </div>

          <div class="seal">
            সভাপতি/নিবন্ধন কর্মকর্তা<br>
            স্বাক্ষর ও সীল
          </div>

        </div>

      </div>


    </div>
  </div>

</body>

</html>


<style>
  .seal{
    margin-top: 30px;
  }
</style>







<!-- <!DOCTYPE html>
<html lang="bn">

<head>
    <meta charset="UTF-8">
    <title>সদস্য পদের আবেদন ফরম</title>
    <link rel="stylesheet" href="preview.css">
    

</head>

<body>

    <div class="form">

        <div class="header">
            <div style="display:flex;align-items:center;justify-content:center;">
                <div
                    style="width:70px;height:70px;border:1px solid #000;border-radius:50%;margin-right:15px;display:flex;justify-content:center;align-items:center;overflow:hidden;">
                    <img src="<?= base_url('assets/uploads/project/members/logo/' . $member->logo) ?>" alt="Logo"
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

        <div class="row">
            <div>স্মারক নং- <span style="width:150px; font-weight: bold;"><?= $member->sarok_no ?></div>
            <div>তারিখ : <span style="width:150px; font-weight: bold;"><?= $member->sarok_date ?></div>
        </div>

        <h2 style="text-align:center;text-decoration:underline;margin-top:20px;">
            সদস্য পদের আবেদন ফরম
        </h2>

        <div style="margin-bottom:10px;">
            <p style="margin:0;">সভাপতি/সম্পাদক</p>
            <p style="margin:0;">বাংলাদেশ জাতীয় সমবায় ইউনিয়ন,</p>
            <p style="margin:0;">সমবায় ব্যাংক ভবন,</p>
            <p style="margin:0;">৯-ডি, মতিঝিল বাণিজ্যিক এলাকা, ঢাকা-১০০০</p>
        </div>

        <p>জনাব,</p>

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

        <div class="section-list">

            <div class="item">
                <span class="label">১. সমিতির নাম :</span>
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
                    <img src="<?= base_url('assets/uploads/project/members/nominee_sign/' . $member->nomini_sign) ?>" width="80">
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

</html> -->