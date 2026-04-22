<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <!-- Search / Filter Form -->
            <form method="get" action="<?= base_url('Products_controller/product_list') ?>">
                <div class="row g-2 mb-3 align-items-center">
                    <div class="col-md-auto">
                        <button type="button" class="btn btn-primary"><i class="fas fa-search"></i> 
                            খুঁজুন</button>
                    </div>
                    <div class="col-md">
                        <input type="text" name="id" value="<?= $this->input->get('id') ?>" class="form-control"
                            placeholder="id">
                    </div>
                    <div class="col-md">
                        <input type="text" name="title" class="form-control"
                            placeholder="title">
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

                            <a href="<?= base_url('product_create_form') ?>" class="btn btn-primary btn-sm m-3">
                                + Add Product
                            </a>

                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th style="">Image</th>
                                    <th style="">Title</th>
                                    <th style="">Category</th>
                                    <th style="">Price</th>
                                    <th style="">Discount</th>
                                    <th style="">Created</th>
                                    <th style="">Status</th>
                                    <th style="">Actions</th>
                                </tr>

                                <!-- <tr>
                                    <th>স্বাক্ষর </th>
                                    <th>পদবী </th>
                                    <th>তারিখ</th>
                                </tr> -->
                            </thead>
                            <tbody>

                                <?php if (!empty($products)): ?>
                                    <?php foreach ($products as $key => $product): ?>

                                        <tr>
                                            <td class="text-center"><?= $key + 1 ?></td>

                                            <!-- Image -->
                                            <td class="text-center">
                                                <?php
                                                $img = $this->db->get_where('product_images', [
                                                    'product_id' => $product->id
                                                ])->row();
                                                ?>

                                                <?php if ($img): ?>
                                                    <img src="<?= base_url('assets/uploads/products/' . $img->image) ?>" width="50"
                                                        height="50" class="img-thumbnail" style="object-fit:cover;">
                                                <?php else: ?>
                                                    <span class="text-muted small">No Image</span>
                                                <?php endif; ?>
                                            </td>

                                            <td><?= $product->title ?></td>

                                            <td>
                                                <span class="badge bg-info text-dark">
                                                    <?= $product->category_name ?>
                                                </span>
                                            </td>

                                            <td class="text-success fw-bold">
                                                ৳ <?= $product->price ?>
                                            </td>

                                            <td>
                                                <?php if ($product->discount_price): ?>
                                                    <span class="text-danger fw-semibold">
                                                        ৳ <?= $product->discount_price ?>
                                                    </span>
                                                <?php else: ?>
                                                    <span class="text-muted">N/A</span>
                                                <?php endif; ?>
                                            </td>

                                            <td><?= date('d M Y', strtotime($product->created_at)) ?></td>

                                            <td>
                                            <form action="<?= base_url('product_active_status/' . $product->id); ?>" method="post">
                                                <select name="status" onchange="this.form.submit()"
                                                    class="form-control form-control-sm">
                                                    <option value=1 <?= $product->status == 1 ? 'selected' : '' ?>>Active
                                                    </option>
                                                    <option value=0 <?= $product->status == 0 ? 'selected' : '' ?>>Inactive
                                                    </option>

                                                </select>
                                            </form>
                                        </td>

                                            <td class="text-center">
                                                <a href="<?= base_url('product_edit_form/' . $product->id) ?>"
                                                    class="btn btn-sm btn-warning">
                                                    Edit
                                                </a>

                                                <a href="<?= base_url('delete_product/' . $product->id) ?>"
                                                    class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                                    Delete
                                                </a>
                                            </td>
                                        </tr>

                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="8" class="text-center text-muted">
                                            No products found
                                        </td>
                                    </tr>
                                <?php endif; ?>

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



<style>
    @media print {

        thead {
            display: table-header-group !important;
        }



        table {
            width: 100%;
            border-collapse: collapse !important;
            white-space: normal !important;
            font-size: 9px;
            page-break-inside: auto;
        }

        thead th {
            color: #000 !important;
            background: #fff !important;

            border: 1px solid #000 !important;
            font-weight: bold;
            text-align: center;
        }

        table th,
        table td {
            border: 1px solid #000 !important;
            padding: 5px !important;
            font-size: 10px;
            text-align: center;
            vertical-align: middle;
        }

        tr {
            page-break-inside: avoid;
            page-break-after: auto;
        }

        .btn,
        .open-charge-modal,
        .active-button,
        a {
            display: none !important;
        }

        table th:last-child,
        table td:last-child {
            display: none !important;
        }

        .table-responsive {
            overflow: visible !important;
        }


    }
</style>