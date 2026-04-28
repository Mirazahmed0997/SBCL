<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Payment Failed</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container">
    <div class="card text-center mt-5 p-4 shadow-sm">

        <h1 class="text-danger">❌ Payment Failed</h1>

        <p class="mt-3">
            Your payment could not be processed.<br>
            Please try again.
        </p>

        <div class="mt-4">
            <a href="<?= base_url('my_orders') ?>" class="btn btn-warning">
                Try Again
            </a>

            <a href="<?= base_url() ?>" class="btn btn-secondary">
                Back to Home
            </a>
        </div>

    </div>
</div>

</body>
</html>