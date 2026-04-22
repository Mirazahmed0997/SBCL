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
                            : base_url('assets/no-image.png') ?>"
                            class="card-img-top"
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
                            <a href="#" class="btn btn-primary btn-sm w-100">
                                Add Cart
                            </a>
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
