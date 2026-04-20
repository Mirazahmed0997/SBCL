<div class="content-wrapper container mt-4">
    <div class="card shadow-sm border-0">

        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Add New Category</h5>
        </div>

        <div class="card-body">

            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show">
                    <?= $this->session->flashdata('success'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show">
                    <?= $this->session->flashdata('error'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('create_category') ?>" method="post">

                <div class="mb-3">
                    <label class="form-label">Category Name</label>
                    <input type="text" 
                           name="name" 
                           class="form-control" 
                           placeholder="Enter category name"
                           required>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="reset" class="btn btn-secondary">
                        Reset
                    </button>

                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Save Category
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>