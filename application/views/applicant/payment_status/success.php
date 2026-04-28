<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Payment Successful</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f8f9fa;
        }

        .success-box {
            max-width: 500px;
            margin: 80px auto;
            background: #fff;
            padding: 40px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }

        .success-icon {
            font-size: 60px;
            color: green;
        }
    </style>
</head>

<body>

<div class="success-box">

    <div class="success-icon">
        ✔
    </div>

    <h2 class="mt-3 text-success">Payment Successful!</h2>

    <p class="mt-3">
        Thank you for your payment. Your order has been confirmed.
    </p>

    <p>
        <strong>Order ID:</strong> #<?= $order_id ?? '' ?>
    </p>

    <div class="mt-4">
        <a href="<?= base_url('my_orders') ?>" class="btn btn-primary">
            View My Orders
        </a>

        <a href="<?= base_url() ?>" class="btn btn-outline-secondary">
            Back to Home
        </a>
    </div>

</div>

</body>
</html>