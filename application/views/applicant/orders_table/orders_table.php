<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success">
        <?= $this->session->flashdata('success'); ?>
    </div>
<?php endif; ?>

<?php if ($this->session->flashdata('failed')): ?>
    <div class="alert alert-danger">
        <?= $this->session->flashdata('failed'); ?>
    </div>
<?php endif; ?>
<?php if ($this->session->flashdata('canceled')): ?>
    <div class="alert alert-danger">
        <?= $this->session->flashdata('canceled'); ?>
    </div>
<?php endif; ?>

<div class="content-wrapper">



    <div class="content-header">
        <div class="container-fluid">
            <!-- Search / Filter Form -->
            <form method="get" action="<?= base_url('my_orders') ?>">
                <div class="row g-2 mb-3 align-items-center">
                    <div class="col-md-auto">
                        <button type="button" class="btn btn-primary"><i class="fas fa-search"></i>
                            খুঁজুন</button>
                    </div>
                    <div class="col-md">
                        <input type="text" name="id" value="<?= $this->input->get('id') ?>" class="form-control"
                            placeholder="Order ID">
                    </div>
                    <div class="col-md">
                        <input type="text" name="mobile_number" class="form-control" placeholder="মোবাইল নম্বর">
                    </div>
                    <!-- <div class="col-md">
                        <select name="branch_name" class="form-select">
                            <option value="">সদস্য সমিতির নাম</option>
                            <?php foreach ($orders as $order): ?>
                                <option value="<?= $order->status ?>"
                                    <?= $this->input->get('status') == $order->status ? 'selected' : '' ?>>
                                    <?= $order->status ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div> -->
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
                    <h5 class="mb-0 text-center">অর্ডার তালিকা</h5>
                </div>
                <div class="card-body p-2">
                    <div class="table-responsive" style="overflow:auto;">
                        <table id="membersTable" class="table table-bordered table-striped table-hover"
                            style="width:100%; white-space: nowrap;">
                            <!-- <button onclick="window.print()" class="btn btn-success">
                                <i class="fas fa-print"></i> Print
                            </button> -->
                            <thead class="thead-dark">
                                <tr>
                                    <th rowspan=""></th>
                                    <th rowspan="">Order ID</th>
                                    <th rowspan="">Name</th>
                                    <th rowspan="">mobile_number</th>
                                    <th rowspan="">payment_method</th>
                                    <th rowspan="">Order Status</th>
                                    <th rowspan="">Transaction ID</th>
                                    <th rowspan="">total_amount</th>
                                    <th rowspan=""></th>
                                </tr>


                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($orders as $row): ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $row->id; ?></td>
                                        <td><?= $row->name; ?></td>
                                        <td><?= $row->mobile_number; ?></td>
                                        <td><?= $row->payment_method; ?></td>
                                        <td><?= $row->status; ?></td>
                                        <td><?= $row->tran_id; ?></td>
                                        <td><?= $row->total_amount; ?></td>
                                        <td>
                                            <a href="<?= base_url('order_details/' . $row->id); ?>"
                                                class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                            <a href="" class="btn btn-success btn-sm"><?= $row->payment_status; ?></a>

                                            

                                            <?php if ($row->status != 'completed') { ?>

                                                <?php if ($row->payment_status != 'paid') { ?>

                                                <a href="<?= base_url('Payment_controller/ssl_payment/' . $row->id) ?>"
                                                    class="btn btn-success">
                                                    Pay Now
                                                </a>

                                            <?php } else { ?><?php } ?>

                                            <?php } else { ?>

                                              

                                            <?php } ?>
                                        </td>
                                        <td>

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