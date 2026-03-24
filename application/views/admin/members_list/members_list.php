<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <!-- Search / Filter Form -->
            <form method="get" action="<?= base_url('Admin/members_list') ?>">
                <div class="row g-2 mb-3 align-items-center">
                    <div class="col-md-auto">
                        <button type="button" class="btn btn-primary"><i class="fas fa-search"></i> সদস্য
                            খুঁজুন</button>
                    </div>
                    <div class="col-md">
                        <input type="text" name="id" value="<?= $this->input->get('id') ?>" class="form-control"
                            placeholder="সদস্য নম্বর">
                    </div>
                    <div class="col-md">
                        <input type="text" name="Cooperative_association_number" class="form-control"
                            placeholder="সমিতির নিবন্ধন নম্বর">
                    </div>
                    <div class="col-md">
                        <input type="text" name="mobile_number" class="form-control" placeholder="মোবাইল নম্বর">
                    </div>
                    <div class="col-md">
                        <select name="branch_name" class="form-select">
                            <option value="">সদস্য সমিতির নাম</option>
                            <?php foreach ($members as $member): ?>
                                <option value="<?= $member->Cooperative_association_name ?>"
                                    <?= $this->input->get('Cooperative_association_name') == $member->Cooperative_association_name ? 'selected' : '' ?>>
                                    <?= $member->Cooperative_association_name ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="row g-2 align-items-center mb-3">
                    <div class="col-md-auto">
                        <button type="button" class="btn btn-primary"><i class="fas fa-calendar-alt"></i> তারিখ
                            নির্বাচন</button>
                    </div>
                    <div class="col-md">
                        <input type="date" name="from_date" class="form-control">
                    </div>
                    <div class="col-md">
                        <input type="date" name="to_date" class="form-control">
                    </div>
                    <div class="col-md-auto">
                        <button type="submit" class="btn btn-success"><i class="fas fa-search"></i> Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Members Table -->
    <section class="content">
        <div class="container-fluid">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0 text-center">সদস্য তালিকা</h5>
                </div>
                <div class="card-body p-2">
                    <div class="table-responsive" style="overflow:auto;">
                        <table id="membersTable" class="table table-bordered table-striped table-hover"
                            style="width:100%; white-space: nowrap;">
                            <thead class="thead-dark">
                                <tr>
                                    <th rowspan="2">ক্রমিক</th>
                                    <th rowspan="2">সদস্য নম্বর</th>
                                    <th rowspan="2">সমিতির নাম</th>
                                    <th rowspan="2">নিবন্ধন ঠিকানা</th>
                                    <th rowspan="2">নিবন্ধন নম্বর</th>
                                    <th rowspan="2">মোবাইল</th>
                                    <th rowspan="2">ভর্তির ফি</th>
                                    <th rowspan="2">ভর্তির তারিখ</th>
                                    <th rowspan="2">চাঁদার পরিমাণ</th>
                                    <th rowspan="2">চাঁদা পরিশোধের সাল</th>
                                    <th rowspan="2">সদস্য সমিতির মোবাইল নাম্বার</th>
                                    <th rowspan="2">ই-মেইল</th>
                                    <th class="text-center" colspan="3">ভর্তি ইস্যুকারী স্বাক্ষর </th>
                                    <th rowspan="2">ব্যবস্থাপনা কমিটি অনুমোদনের তারিখ</th>
                                    <th rowspan="2">অনুমোদনকারী</th>
                                    <th rowspan="2">প্রত্যাহার তারিখ</th>
                                    <th rowspan="2">প্রত্যাহার অনুমোদনকারী</th>
                                    <th rowspan="2">অবস্থান</th>
                                    <th rowspan="2">টাকা পরিশোধ</th>
                                    <th rowspan="2">খতিয়ান</th>
                                    <th rowspan="3"></th>
                                </tr>

                                <tr>
                                    <th>স্বাক্ষর </th>
                                    <th>পদবী </th>
                                    <th>তারিখ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($members as $row): ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $row->id; ?></td>
                                        <td><?= $row->Cooperative_association_name; ?></td>
                                        <td><?= $row->Cooperative_association_address; ?></td>
                                        <td><?= $row->Cooperative_association_registration_no; ?></td>
                                        <td><?= $row->Cooperative_association_number; ?></td>
                                        <td><?= $row->payable_amount; ?></td>
                                        <td><?= $row->created_at; ?></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><?= $row->approved_by; ?></td>
                                        <td><?= $row->widthdrawal_date; ?></td>
                                        <td><?= $row->widthdrawal_approved_by; ?></td>
                                        <td>
                                            <?php if ($row->active_status == 1): ?>
                                                <span class="badge bg-success">Active</span>
                                            <?php else: ?>
                                                <span class="badge bg-danger">Inactive</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if ($row->payment_status == 'paid'): ?>
                                                <span class="badge bg-success">Paid</span>
                                            <?php elseif ($row->payment_status == 'pending'): ?>
                                                <span class="badge bg-warning text-dark">Pending</span>
                                            <?php else: ?>
                                                <span class="badge bg-danger">Unpaid</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><a href="<?= base_url('Admin/members_account/'); ?>"
                                                class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a></td>
                                        <td>
                                            <a href="<?= base_url('Admin/view_member/' . $row->id); ?>"
                                                class="btn btn-success btn-sm">Details</a>
                                            <a href="<?= base_url('Admin/form_view/' . $row->id); ?>"
                                                class="btn btn-warning btn-sm">Preview</a>
                                            <a href="<?= base_url('Admin/delete_member/' . $row->id); ?>"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure?');">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function () {
        $('#membersTable').DataTable({
            responsive: false, 
            scrollX: true,
            scrollY: "500px",
            scrollCollapse: true,
            paging: false,
            fixedHeader: true,
            pageLength: 10,
            searching: false,       
            lengthMenu: [10, 25, 50, 100],
            language: {
                lengthMenu: "Show _MENU_ entries",
                info: "Showing _START_ to _END_ of _TOTAL_ members"
            }
        });
    });
</script>