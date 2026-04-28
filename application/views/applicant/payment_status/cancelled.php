<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Payment Cancelled</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container">
    <div class="card text-center mt-5 p-4 shadow-sm">

        <h1 class="text-warning">⚠️ Payment Cancelled</h1>

        <p class="mt-3">
            You cancelled the payment.<br>
            You can complete it later from your orders.
        </p>

        <div class="mt-4">
            <a href="<?= base_url('my_orders') ?>" class="btn btn-primary">
                Go to My Orders
            </a>

            <a href="<?= base_url() ?>" class="btn btn-secondary">
                Back to Home
            </a>
        </div>

    </div>
</div>

</body>
</html>