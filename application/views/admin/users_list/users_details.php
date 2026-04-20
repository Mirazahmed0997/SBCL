<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">

            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold text-dark">👤 User Details</h2>
                <a href="<?= base_url('Admin/users_list') ?>" class="btn btn-outline-secondary btn-sm">
                    ← Back to List
                </a>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-8 mx-auto">

                    <div class="card border-0 shadow-lg rounded-3">
                        
                        <!-- Card Header -->
                        <div class="card-header bg-gradient-primary text-white py-3">
                            <h5 class="mb-0">ইউজার তথ্য (User Information)</h5>
                        </div>

                        <!-- Card Body -->
                        <div class="card-body px-4 py-4">

                            <div class="row mb-3">
                                <div class="col-5 text-muted">ইউজার নাম</div>
                                <div class="col-7 fw-semibold"><?= $user->username ?></div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-5 text-muted">ফার্স্ট নাম</div>
                                <div class="col-7 fw-semibold"><?= $user->first_name ?></div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-5 text-muted">লাস্ট নাম</div>
                                <div class="col-7 fw-semibold"><?= $user->last_name ?></div>
                            </div>

                            <hr>

                            <div class="row mb-3">
                                <div class="col-5 text-muted">পদবি</div>
                                <div class="col-7 fw-semibold"><?= $user->designation ?></div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-5 text-muted">যোগাযোগ</div>
                                <div class="col-7 fw-semibold text-success">
                                    <?= $user->mobile_number ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-5 text-muted">ভূমিকা</div>
                                <div class="col-7">
                                    <?php if ($user->role == 'admin'): ?>
                                        <span class="badge bg-danger">Admin</span>
                                    <?php elseif ($user->role == 'super_admin'): ?>
                                        <span class="badge bg-warning text-dark">Super Admin</span>
                                    <?php else: ?>
                                        <span class="badge bg-info">User</span>
                                    <?php endif; ?>
                                </div>
                            </div>

                        </div>

                        <!-- Footer -->
                        <!-- <div class="card-footer text-end bg-light">
                            <a href="<?= base_url('Admin/edit_member/' . $user->id); ?>"
                                class="btn btn-primary btn-sm">
                                ✏️ Edit
                            </a>
                        </div> -->

                    </div>

                </div>
            </div>

        </div>
    </div>
</div>