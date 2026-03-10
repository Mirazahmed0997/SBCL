<!DOCTYPE html>
<html>

<head>
    <title>Member Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }

        .btn-edit {
            padding: 6px 12px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
            float: right;
        }

        .container {
            width: 90%;
            margin: 20px auto;
        }

        h2 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            text-align: left;
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }

        th {
            background-color: #f4f4f4;
        }

        img {
            max-width: 150px;
            height: auto;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Member Details</h2>
        <a class="btn-edit" href=" <?php echo base_url('Site/edit_member/' . $member->id); ?>" class="btn-edit">Edit</a>


        <table>
            <tr>
                <th>স্মারক নং</th>
                <td><?= $member->sarok_no ?></td>
            </tr>
            <tr>
                <th>তারিখ</th>
                <td><?= $member->sarok_date ?></td>
            </tr>
            <tr>
                <th>নাম</th>
                <td><?= $member->name ?></td>
            </tr>
            <tr>
                <th>পিতা</th>
                <td><?= $member->father_name ?></td>
            </tr>
            <tr>
                <th>মাতা</th>
                <td><?= $member->mother_name ?></td>
            </tr>
            <tr>
                <th>NID</th>
                <td><?= $member->nid ?></td>
            </tr>
            <tr>
                <th>জন্ম তারিখ</th>
                <td><?= $member->birth_date ?></td>
            </tr>
            <tr>
                <th>মোবাইল</th>
                <td><?= $member->mobile_number ?></td>
            </tr>
            <tr>
                <th>লিঙ্গ</th>
                <td><?= ucfirst($member->gender) ?></td>
            </tr>
            <tr>
                <th>গ্রাম</th>
                <td><?= $member->village ?></td>
            </tr>
            <tr>
                <th>ডাকঘর</th>
                <td><?= $member->post ?></td>
            </tr>
            <tr>
                <th>উপজেলা</th>
                <td><?= $member->sub_district ?></td>
            </tr>
            <tr>
                <th>জেলা</th>
                <td><?= $member->district ?></td>
            </tr>
            <tr>
                <th>সমিতিতে পদবী</th>
                <td><?= $member->branch_designation ?></td>
            </tr>
            <tr>
                <th>সমিতি জেলা</th>
                <td><?= $member->branch_district ?></td>
            </tr>
            <tr>
                <th>সমিতি নাম</th>
                <td><?= $member->branch_work_name ?></td>
            </tr>
            <tr>
                <th>টাকার পরিমাণ</th>
                <td><?= $member->paid_amount ?></td>
            </tr>
            <tr>
                <th>রশিদ নম্বর</th>
                <td><?= $member->voucher_no ?></td>
            </tr>
            <tr>
                <th>ব্যবস্থাপনা কমিটির তারিখ</th>
                <td><?= $member->managing_committee_date ?></td>
            </tr>
            <!-- Co-operative Info -->
            <tr>
                <th>সমিতির নাম</th>
                <td><?= $member->branch_name ?></td>
            </tr>
            <tr>
                <th>সমিতির মোবাইল</th>
                <td><?= $member->branch_mobile_number ?></td>
            </tr>
            <tr>
                <th>নিবন্ধিত ঠিকানা</th>
                <td><?= $member->branch_registration_address ?></td>
            </tr>
            <tr>
                <th>বর্তমান ঠিকানা</th>
                <td><?= $member->branch_address ?></td>
            </tr>
            <tr>
                <th>সভাপতি</th>
                <td><?= $member->branch_chairman ?></td>
            </tr>
            <tr>
                <th>সম্পাদক</th>
                <td><?= $member->branch_secretary ?></td>
            </tr>
            <tr>
                <th>রেজিস্ট্রেশন নং</th>
                <td><?= $member->branch_registration_no ?></td>
            </tr>
            <tr>
                <th>রেজিস্ট্রেশন তারিখ</th>
                <td><?= $member->branch_registration_date ?></td>
            </tr>
            <tr>
                <th>সমিতির শ্রেনি</th>
                <td><?= $member->branch_class ?></td>
            </tr>
            <tr>
                <th>টাইপ</th>
                <td><?= $member->branch_type ?></td>
            </tr>
            <tr>
                <th>সদস্য সংখ্যা</th>
                <td><?= $member->branch_member_count ?></td>
            </tr>
            <tr>
                <th>কর্ম এলাকা</th>
                <td><?= $member->branch_working_area ?></td>
            </tr>
            <!-- Nominee Info -->
            <tr>
                <th>নমিনি নাম</th>
                <td><?= $member->nomini_name ?></td>
            </tr>
            <tr>
                <th>নমিনি পদবী</th>
                <td><?= $member->nomini_designation ?></td>
            </tr>
            <tr>
                <th>নমিনি মোবাইল</th>
                <td><?= $member->nomini_mobile_no ?></td>
            </tr>
            <tr>
                <th>নমিনি তারিখ</th>
                <td><?= $member->nomini_date ?></td>
            </tr>
            <tr>
                <th>নমিনি স্বাক্ষর</th>
                <td>
                    <?php if ($member->nomini_sign): ?>
                        <img src="<?= base_url('assets/uploads/project/members/nominee_sign/' . $member->nomini_sign) ?>"
                            width="150">
                    <?php else: ?>
                        No Image
                    <?php endif; ?>
                </td>
            </tr>
            <!-- Documents -->
            <tr>
                <th>Logo</th>
                <td>
                    <?php if ($member->logo): ?>
                        <img src="<?= base_url('assets/uploads/project/members/' . $member->logo) ?>" width="150">
                    <?php else: ?>
                        No Logo
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <th>Document</th>
                <td>
                    <?php if ($member->document_1): ?>
                        <a href="<?= base_url('assets/uploads/project/members/' . $member->document_1) ?>"
                            target="_blank">View PDF</a>
                    <?php else: ?>
                        No Document
                    <?php endif; ?>
                </td>
            </tr>
        </table>
    </div>

</body>

</html>