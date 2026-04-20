<?php
$categories = $this->db->get('categories')
                 ->result_array();
?>


<div class="content-wrapper container-fluid mt-4">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-3 bg-secondary">
        <h4 class="mb-0">Category List</h4>
        <a href="<?= base_url('create_category_form') ?>" class="btn btn-primary btn-sm ">
            + Add Category
        </a>
    </div>

    <!-- Flash Message -->
    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show">
            <?= $this->session->flashdata('success'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <!-- Table Card -->
    <div class="card shadow-sm">
        <div class="card-body p-0">

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">

                    <thead class="table-dark">
                        <tr>
                            <th width="60">#</th>
                            <th>Category Name</th>
                            <th>Slug</th>
                            <!-- <th width="120">Status</th> -->
                            <th width="180" class="text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if (!empty($categories)) : ?>
                            <?php $i = 1; foreach ($categories as $row) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>

                                    <td>
                                        <strong> <?= $row['name'] ?></strong>
                                    </td>

                                    <td>
                                        <span class="text-muted"> <?= $row['slug'] ?></span>
                                    </td>
<!-- 
                                    <td>
                                        <?php if ($row->status == 1): ?>
                                            <span class="badge bg-success">Active</span>
                                        <?php else: ?>
                                            <span class="badge bg-secondary">Inactive</span>
                                        <?php endif; ?>
                                    </td> -->

                                    <!-- <td class="text-center">

                                        <a href="<?= base_url('category/edit/' . $row->id) ?>"
                                           class="btn btn-sm btn-warning">
                                            Edit
                                        </a>

                                        <a href="<?= base_url('category/delete/' . $row->id) ?>"
                                           onclick="return confirm('Are you sure?')"
                                           class="btn btn-sm btn-danger">
                                            Delete
                                        </a>

                                    </td> -->
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">
                                    No categories found
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>

                </table>
            </div>

        </div>
    </div>

</div>