<!DOCTYPE html>
<html>
<head>
    <title>My Cart</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php $this->load->view('site/pages/home_page_header'); ?>

<div class="container mt-4">

    <h3 class="mb-4">🛒 My Cart</h3>
    <div class="d-flex justify-content-between p-2">
        <a href="<?= base_url('all_products') ?>"> আরো কিনুন</a>
        <a href="<?= base_url() ?>"> হোমে ফিরে যান</a>
    </div>

    <?php if (!empty($items)): ?>

    <div class="table-responsive">

        <table class="table table-bordered align-middle text-center">

            <thead class="table-dark">
                <tr>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                <?php foreach ($items as $item): ?>

                    <?php
                    $subtotal = $item->price * $item->quantity;

                    $img = $this->db->get_where('product_images', [
                        'product_id' => $item->product_id
                    ])->row();
                    ?>

                    <tr>

                        <!-- Image -->
                        <td>
                            <img src="<?= $img 
                                ? base_url('assets/uploads/products/' . $img->image)
                                : base_url('assets/no-image.png') ?>"
                                width="60" height="60"
                                style="object-fit:cover;">
                        </td>

                        <!-- Name -->
                        <td class="text-start">
                            <?= $item->title ?>
                        </td>

                        <!-- Price -->
                        <td>৳ <?= $item->price ?></td>

                        <!-- Quantity -->
                        <td>

                            <div class="card-footer bg-white border-0">
                            <form action="<?= base_url('update_cart_quantity/'.$item->id) ?>" method="post">

                                <div class="d-flex justify-content-center align-items-center mb-2">

                                    <button type="submit" class="btn btn-sm btn-danger qty-minus">-</button>

                                    <input type="text" name="quantity" class="form-control text-center mx-2 qty-input" value=<?= $item->quantity ?>
                                        style="width:50px;" readonly>

                                    <button type="submit" class="btn btn-sm btn-success qty-plus">+</button>

                                </div>

                               

                            </form>

                        </div>

                        </td>

                        <!-- Subtotal -->
                        <td>
                            ৳ <?= $subtotal ?>
                        </td>

                        <!-- Action -->
                        <td>
                            <a href="<?= base_url('remove_cart_item/' . $item->id) ?>" 
                               class="btn btn-sm btn-outline-danger"
                               onclick="return confirm('Are you sure you want to delete this Information?')">
                                Remove
                            </a>
                        </td>

                    </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

    </div>

    <!-- Summary -->
    <div class="row justify-content-end">

        <div class="col-md-4">

            <div class="card shadow-sm">

                <div class="card-body">

                    <h5>Total Summary</h5>
                    <hr>

                    <h4 class="text-success">
                        ৳ <?= $total ?>
                    </h4>

                    <a href="<?= base_url('checkout') ?>" class="btn btn-primary w-100 mt-3">
                        Proceed to Checkout
                    </a>

                    <a href="<?= base_url('clear_cart') ?>" class="btn btn-danger w-100 mt-2"
                    onclick="return confirm('Are you sure you want to delete this Information?')">
                        Clear Cart
                    </a>

                </div>

            </div>

        </div>

    </div>

    <?php else: ?>

        <div class="alert alert-info text-center">
            Your cart is empty 🛒
            <a href="<?= base_url('all_products') ?>"> এখনই কিনুন</a>
        </div>

    <?php endif; ?>

</div>

</body>
</html>


<script>
    document.addEventListener("DOMContentLoaded", function () {

        // Increase
        document.querySelectorAll('.qty-plus').forEach(btn => {
            btn.addEventListener('click', function () {
                let input = this.parentElement.querySelector('.qty-input');
                input.value = parseInt(input.value) + 1;
            });
        });

        // Decrease
        document.querySelectorAll('.qty-minus').forEach(btn => {
            btn.addEventListener('click', function () {
                let input = this.parentElement.querySelector('.qty-input');
                let value = parseInt(input.value);

                if (value > 1) {
                    input.value = value - 1;
                }
            });
        });

        // Attach quantity to Add Cart
        document.querySelectorAll('.add-to-cart').forEach(btn => {
            btn.addEventListener('click', function (e) {
                let qty = this.parentElement.querySelector('.qty-input').value;
                let url = this.getAttribute('href');

                this.setAttribute('href', url + '?qty=' + qty);
            });
        });

    });
</script>