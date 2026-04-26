<?php
echo '<pre>';

$product_ids = [];
foreach ($items as $item) {
    $product_ids[] = $item->product_id;
}

$images = [];

foreach ($product_ids as $product_id) {
    $img = $this->db->get_where('product_images', [
        'product_id' => $product_id
    ])->row();

    $images[] = $img;
}

echo '</pre>';
?>





<!DOCTYPE html>
<html>

<head>
    <title>Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .invoice-box {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .table th {
            background: #f8f9fa;
        }

        .title {
            font-size: 28px;
            font-weight: bold;
        }

        .container {
            width: 82%;
        }
    </style>
</head>

<body>

    <div class="content-wrapper  container mt-4 ">

        <div class="invoice-box">

            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <div class="title">INVOICE</div>
                    <small>Order Details</small>
                </div>

                <div class="text-end">
                    <h5>Order ID: #<?= $orders->id ?? '' ?></h5>
                    <small>Date: <?= $orders->created_at ?? '' ?></small>
                </div>
            </div>

            <hr>

            <!-- Customer Info -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <h6>Customer Info</h6>
                    <p>
                        <strong>Name:</strong> <?= $orders->name ?? '' ?><br>
                        <strong>Phone:</strong> <?= $orders->mobile_number ?? '' ?><br>
                        <strong>Address:</strong> <?= $orders->address ?? '' ?>
                    </p>
                </div>

                <div class="col-md-6 text-end">
                    <h6>Order Status</h6>
                    <span class="badge bg-warning text-dark">
                        <?= $orders->status ?? 'Pending' ?>
                    </span>
                </div>
            </div>

            <!-- Items Table -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Total</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $i = 1;
                    $grand_total = 0;

                    foreach ($items as $item):

                        $img_path = '';
                        foreach ($images as $img) {
                            if ($img->product_id == $item->product_id) {
                                $img_path = $img->image;
                                break;
                            }
                        }

                        $total = $item->price * $item->quantity;
                        $grand_total += $total;
                        ?>
                        <tr>
                            <td><?= $i++ ?></td>

                            <td>
                                <img src="<?= base_url('assets/uploads/products/' . $img_path) ?>" width="60" height="60">
                            </td>

                            <td><?= $item->title ?></td>
                            <td>৳ <?= $item->price ?></td>
                            <td><?= $item->quantity ?></td>
                            <td>৳ <?= $total ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <!-- Total -->
            <div class="text-end mt-3">
                <h5>Sub-Total: ৳ <?= $grand_total ?></h5>
                <h5>Delivery Charge: ৳ <?= $orders->total_amount - $grand_total ?> </h5>
                <h6>Grand Total: <strong>৳ <?= $orders->total_amount ?></strong></h6>
            </div>

            <hr>

            <!-- Footer -->
            <div class="text-center">
                <small>Thank you for your purchase ❤️</small>
            </div>

        </div>

    </div>

</body>

</html>