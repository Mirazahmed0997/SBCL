<?php
$products = $this->db->select('products.*, categories.name as category_name')
    ->from('products')
    ->join('categories', 'categories.id = products.category_id', 'left')
    ->where('products.status', 1)
    ->order_by('products.created_at', 'DESC')
    ->get()
    ->result();
?>


<title>Products</title>



<div class="container mt-4">
    <div class="row">

        <?php if (!empty($products)): ?>
            <?php foreach ($products as $product): ?>

                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">

                    <div class="card h-100 shadow-sm">

                        <?php
                        $img = $this->db->get_where('product_images', [
                            'product_id' => $product->id
                        ])->row();
                        ?>

                        <!-- Image -->
                        <img src="<?= $img
                            ? base_url('assets/uploads/products/' . $img->image)
                            : base_url('assets/no-image.png') ?>" class="card-img-top"
                            style="height:200px; object-fit:contain;">

                        <!-- Body -->
                        <div class="card-body text-start">
                            <h6 class="card-title"><?= $product->title ?></h6>

                            <!-- <p class="text-muted mb-1">
                                <?= $product->category_name ?>
                            </p> -->

                            <strong class="text-success">
                                ৳ <?= $product->price ?>
                            </strong>
                        </div>

                        <!-- Footer -->
                        <div class="card-footer bg-white border-0">
                            <form action="<?= base_url('Cart_controller/add/' . $product->id) ?>" method="post">

                                <div class="d-flex justify-content-center align-items-center mb-2">

                                    <button type="button" class="btn btn-sm btn-danger qty-minus">-</button>

                                    <input type="text" name="quantity" class="form-control text-center mx-2 qty-input" value="1"
                                        style="width:50px;" readonly>

                                    <button type="button" class="btn btn-sm btn-success qty-plus">+</button>

                                </div>

                                <button type="submit" class="btn btn-primary w-100">
                                    Add Cart
                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            <?php endforeach; ?>
        <?php else: ?>
            <div class="text-center">No product available</div>
        <?php endif; ?>

    </div>
</div>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


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