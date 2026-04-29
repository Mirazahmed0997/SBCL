<?php
$user = $this->session->userdata('login_user_info_all');

$cart_items = [];

if ($user) {
    $this->db->select('cart_items.*, products.title, products.price');
    $this->db->from('cart_items');
    $this->db->join('products', 'products.id = cart_items.product_id');
    $this->db->where('cart_items.user_id', $user->id);
    $this->db->order_by('cart_items.created_at', 'DESC');

    $cart_items = $this->db->get()->result();
}


$total = 0;
foreach ($cart_items as $item) {
    $total += $item->price * $item->quantity;
}
?>



<!DOCTYPE html>
<html>

<head>
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>


    <div class="container mt-4">

        <h3 class="mb-4">🧾 Checkout</h3>

        <div class="row">

            <!-- 🧍 Customer Info -->
            <div class="col-md-6">

                <div class="card shadow-sm">
                    <div class="card-body">

                        <h5>Shipping Information</h5>
                        <hr>

                        <form method="post" action="<?= base_url('place_order') ?>">

                            <div class="mb-3">
                                <label>User Name</label>
                                <input type="text" name="name" class="form-control"
                                    value="<?= htmlspecialchars($user->username ?? '') ?>" required>
                            </div>

                            <div class="mb-3">
                                <label>Phone Number</label>
                                <input type="text" name="mobile_number" class="form-control"
                                    value="<?= htmlspecialchars($user->mobile_number ?? '') ?>" required>
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control"
                                    value="<?= htmlspecialchars($user->email ?? '') ?>" required>
                            </div>

                            <div class="mb-3">
                                <label>Address</label>
                                <textarea name="address" class="form-control" rows="3" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label>Payment Method</label>
                                <select name="payment_method" id="payment_method" class="form-control" required>
                                    <option value="">Select Payment</option>
                                    <option value="cod">Cash on Delivery</option>
                                    <option value="bkash">bKash</option>
                                    <option value="bank">Bank</option>
                                </select>
                            </div>

                            <div class="mb-3" id="delivery_area_box">
                                <label>Delivery Area</label>
                                <select name="delivery_area" id="delivery_area" class="form-control" required>
                                    <option value="">Select Area</option>
                                    <option value="inside">Inside Dhaka (৳60)</option>
                                    <option value="outside">Outside Dhaka (৳120)</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-success w-100">
                                Place Order
                            </button>

                        </form>

                    </div>
                </div>

            </div>

            <!-- 🛒 Order Summary -->
            <div class="col-md-6">

                <div class="card shadow-sm">
                    <div class="card-body">

                        <h5>Order Summary</h5>
                        <hr>

                        <?php if (!empty($cart_items)): ?>

                            <ul class="list-group mb-3">

                                <?php foreach ($cart_items as $item): ?>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <div>
                                            <?= $item->title ?> <br>
                                            <small>Qty: <?= $item->quantity ?></small>
                                        </div>

                                        <span>
                                            ৳ <?= $item->price * $item->quantity ?>
                                        </span>
                                    </li>
                                <?php endforeach; ?>

                            </ul>

                            <!-- <h5 class="text-end text-success">
                                Total: ৳ <?= $item->price * $item->quantity ?>
                            </h5> -->

                            <h5 class="text-end text-success">
                                Delivery Charge: ৳ <span id="charge"></span><br>
                                Sub-Total: ৳ <span id="total_amount"><?= $total ?></span>
                            </h5>

                        <?php else: ?>

                            <div class="alert alert-info">
                                Cart is empty
                            </div>

                        <?php endif; ?>

                    </div>
                </div>

            </div>

        </div>

    </div>

</body>

</html>


<script>
    document.addEventListener("DOMContentLoaded", function () {

        let payment = document.getElementById('payment_method');
        let areaBox = document.getElementById('delivery_area_box');
        let area = document.getElementById('delivery_area');
        let chargeArea = document.getElementById('charge');

        let baseTotal = <?= $total ?>;
        let totalDisplay = document.getElementById('total_amount');


        area.addEventListener('change', function () {
            let charge = 0;

            if (this.value === 'inside') {
                charge = 60;
            }
            else if (this.value === 'outside') {
                charge = 120;
            }
            chargeArea.innerText = charge;

            totalDisplay.innerText = baseTotal + charge;
        });

    });
</script>