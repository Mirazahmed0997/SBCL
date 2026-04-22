<div class="content-wrapper container-fluid mt-3">

    <div class="card shadow-sm">

        <div class="card-header">
            <h5 class="mb-0">Edit Product</h5>
        </div>

        <div class="card-body">

            <form action="<?= base_url('update_product/' . $product->id); ?>" method="post"
                enctype="multipart/form-data">

                <input type="hidden" name="product_id" value="<?= $product->id ?>">

                <!-- Category -->
                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select name="category_id" class="form-control" required>
                        <option value="">Select Category</option>

                        <?php foreach ($categories as $cat): ?>
                            <option value="<?= $cat->id ?>" <?= ($cat->id == $product->category_id) ? 'selected' : '' ?>>
                                <?= $cat->name ?>
                            </option>
                        <?php endforeach; ?>

                    </select>
                </div>

                <!-- Title -->
                <div class="mb-3">
                    <label class="form-label">Product Title</label>
                    <input type="text" name="title" class="form-control" value="<?= $product->title ?>" required>
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="4"><?= $product->description ?></textarea>
                </div>

                <!-- Price -->
                <div class="mb-3">
                    <label class="form-label">Price</label>
                    <input type="number" name="price" class="form-control" value="<?= $product->price ?>" required>
                </div>

                <!-- Discount Price -->
                <div class="mb-3">
                    <label class="form-label">Discount Price</label>
                    <input type="number" name="discount_price" class="form-control"
                        value="<?= $product->discount_price ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Product Images</label>
                    <input type="file" name="images[]" class="form-control" multiple>
                </div>


                <label>Change Images</label><br>

                <?php foreach ($images as $img): ?>
                    <div class="img-box">

                        <img src="<?= base_url('assets/uploads/products/' . $img->image) ?>" class="product-img">

                        <div class="img-overlay">

                            <a href="<?= base_url('delete_product_image/' . $img->id) ?>" class="btn btn-sm btn-danger"
                                onclick="return confirm('Delete this image?')">
                                ✖
                            </a>

                            <label class="btn btn-sm btn-warning mb-0">
                                ✏
                                <input type="file" name="replace_image[<?= $img->id ?>]" hidden>
                            </label>

                        </div>

                    </div>
                <?php endforeach; ?>
                <button type="submit" class="btn btn-success">
                    Update Product
                </button>
        </div>
        </form>


    </div>
</div>
</div>



<style>
    .img-box {
        position: relative;
        display: inline-block;
        margin-right: 8px;
    }

    .product-img {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 6px;
        border: 1px solid #ddd;
    }

    /* Overlay */
    .img-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);

        display: flex;
        justify-content: center;
        align-items: center;
        gap: 5px;

        opacity: 0;
        transition: 0.3s;
    }

    /* Show on hover */
    .img-box:hover .img-overlay {
        opacity: 1;
    }
</style>