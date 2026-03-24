<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">

            <form method="get" action="<?= base_url('Admin/users_list') ?>">
                <!-- Row 1 -->
                <div class="row g-2 mb-2 align-items-center">



                    <div class="col-md">
                        <input type="text" name="id" value="<?= $this->input->get('id') ?>" class="form-control"
                            placeholder="সদস্য নম্বর">
                    </div>

                    <div class="col-md">
                        <input type="text" name="username" class="form-control" placeholder="ইউজার নাম">
                    </div>

                    <div class="col-md">
                        <input type="text" name="mobile_number" class="form-control" placeholder="মোবাইল নম্বর">
                    </div>
                    <div class="col-md-auto">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-search"></i> Search
                        </button>
                    </div>

                    <!-- <div class="col-md">
                        <select name="role" class="form-select">
                            <option value="">ভূমিকা</option>

                            <?php foreach ($users as $user): ?>
                                <option value="admin">Admin</option>
                                <option value="super_admn">Super Admin</option>
                                <option value="user">User</option>
                            <?php endforeach; ?>

                        </select>
                    </div> -->



                </div>
            </form>

        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger">
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
            <?php endif; ?>
            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h5 class="mb-0 text-center">ইউজার তালিকা</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="membersTable"
                            class="table table-bordered table-striped table-hover dt-responsive nowrap"
                            style="width:100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ক্রমিক</th>
                                    <th>ইউজার আইডি</th>
                                    <th>ইউজার নাম</th>
                                    <th>পদবি</th>
                                    <th>যোগাযোগ</th>
                                    <th>ভূমিকা</th>
                                    <th>বিস্তারিত</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($users as $row) { ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $row->id; ?></td>
                                        <td><?= $row->username; ?></td>
                                        <td><?= $row->designation; ?></td>
                                        <td><?= $row->mobile_number; ?></td>
                                        <td>
                                            <form action="<?= base_url('update_user_role/' . $row->id); ?>" method="post">
                                                <select name="role" onchange="this.form.submit()"
                                                    class="form-control form-control-sm">
                                                    <option value="admin" <?= $row->role == 'admin' ? 'selected' : '' ?>>Admin
                                                    </option>
                                                    <option value="user" <?= $row->role == 'user' ? 'selected' : '' ?>>User
                                                    </option>
                                                    <option value="manager" <?= $row->role == 'super_admin' ? 'selected' : '' ?>>
                                                        Super Admin</option>
                                                </select>
                                            </form>
                                        </td>



                                        <td><a href="<?= base_url('Admin/view_user/' . $row->id); ?>"
                                                class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a></td>
                                        <td>
                                            <a href="<?= base_url('Admin/delete_user/' . $row->id); ?>"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure?');">Delete</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </section>

</div>

<!-- DataTables Scripts -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.3.2/js/dataTables.fixedHeader.min.js"></script>

<script>
    $(document).ready(function () {
        $('#membersTable').DataTable({
            responsive: true,
            scrollY: "400px",
            scrollX: true,
            scrollCollapse: true,
            paging: true,
            pageLength: 10,
            fixedHeader: true,
            lengthMenu: [10, 25, 50, 100],
            language: {
                search: "Search:",
                lengthMenu: "Show _MENU_ entries",
                info: "Showing _START_ to _END_ of _TOTAL_ members"
            }
        });
    });
</script>