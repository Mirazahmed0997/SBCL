<?php

$product_ids = [];
foreach ($items as $item) {
    $product_ids[] = $item->product_id;
}

//  echo '<pre>';
//         print_r($product_ids);
//         exit;

$images = [];

foreach ($product_ids as $product_id) {
    $img = $this->db->get_where('product_images', [
        'product_id' => $product_id
    ])->row();

    $images[] = $img;

    //  echo '<pre>';
    //     print_r($images);
    //     exit;
}

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Invoice</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 13px;
            color: #333;
        }

        .header {
            display: flex;
            justify-content: space-between;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
        }

        .logo {
            font-size: 22px;
            font-weight: bold;
        }

        .invoice-title {
            font-size: 18px;
            font-weight: bold;
            text-align: right;
        }

        .info {
            margin-top: 20px;
        }

        .info-box {
            width: 48%;
            display: inline-block;
            vertical-align: top;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th {
            background: #f2f2f2;
            padding: 8px;
            text-align: left;
        }

        td {
            padding: 8px;
        }

        .text-right {
            text-align: right;
        }

        .total-box {
            margin-top: 20px;
            text-align: right;
        }

        .grand-total {
            font-size: 16px;
            font-weight: bold;
        }

        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 11px;
            color: #777;
        }
    </style>
</head>

<body>

    <div class="header">
        <div class="logo">বাংলাদেশ জাতীয় সমবায় ইউনিয়ন</div>
        <div class="invoice-title">
            INVOICE
            #<?= $orders->id ?>
        </div>
    </div>

    <div class="info">
        <div class="info-box">
            <strong>Bill To:</strong><br>
            <?= $orders->name ?><br>
            <?= $orders->mobile_number ?><br>
            <?= $orders->address ?>
        </div>

        <div class="info-box text-right">
            <strong>Order Date:</strong><br>
            <?= $orders->created_at ?><br><br>

            <strong>Status:</strong>
            <?= $orders->status ?? 'Pending' ?>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th></th>
                <th>Product</th>
                <th class="text-right">Price</th>
                <th class="text-right">Qty</th>
                <th class="text-right">Total</th>
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
                        <img src="https://bjsucoop.org/assets/uploads/products/<?= $img_path ?>" width="30" height="30">
                        <!-- <img src="<?= base_url('assets/uploads/products/' . $img_path) ?>" width="30" height="30"> -->
                    </td>
                    <td><?= $item->title ?></td>
                    <td class="text-right">৳ <?= $item->price ?></td>
                    <td class="text-right"><?= $item->quantity ?></td>
                    <td class="text-right">৳ <?= $total ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="total-box">
        <p>Subtotal: ৳ <?= $grand_total ?></p>
        <p>Delivery: ৳ <?= $orders->total_amount - $grand_total ?></p>

        <p class="grand-total">
            Grand Total: ৳ <?= $orders->total_amount ?>
        </p>
    </div>

    <div class="footer">
        Thank you for shopping with us ❤️
    </div>

</body>

</html>

