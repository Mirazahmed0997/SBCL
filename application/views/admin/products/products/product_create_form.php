<?php
$categories = $this->db->get('categories')
                 ->result_array();
?>

<div class="content-wrapper container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Create Product</h5>
        </div>

        <div class="card-body">

            <!-- Flash Messages -->
            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger">
                    <?= $this->session->flashdata('error'); ?>
                </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success">
                    <?= $this->session->flashdata('success'); ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('create_product') ?>" method="post" enctype="multipart/form-data">

                <!-- Title -->
                <div class="mb-3">
                    <label class="form-label">Product Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter product title" required>
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="4" placeholder="Enter description"></textarea>
                </div>

                <!-- Category (FOREIGN KEY) -->
                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select name="category_id" class="form-select" required>
                        <option value="">-- Select Category --</option>

                        <?php foreach ($categories as $cat): ?>
                            <option value="<?= $cat['id'] ?>">
                                <?= $cat['name'] ?>
                            </option>
                        <?php endforeach; ?>

                    </select>
                </div>

                <!-- Price -->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Price</label>
                        <input type="number" step="0.01" name="price" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Discount Price</label>
                        <input type="number" step="0.01" name="discount_price" class="form-control">
                    </div>
                </div>

                <!-- Images -->
                <div class="mb-3">
                    <label class="form-label">Product Images</label>
                    <input type="file" name="images[]" class="form-control" multiple required>
                    <small class="text-muted">You can upload multiple images</small>
                </div>

                <!-- Submit -->
                <div class="text-end">
                    <button type="submit" class="btn btn-success">
                        Save Product
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>