<?php
$image_gallery = $this->db->order_by('id', 'asc')
    ->where('status', 1)
    ->get('image_gallery')
    ->result_array();
?>

<section class="py-5 bg-light">
    <div class="container">

        <div class="gallary-section-title">
            <h2>গ্যালারি</h2>
        </div>

        <div class="row g-4">
            <?php if (!empty($image_gallery)): ?>

                <?php foreach ($image_gallery as $image): ?>

                    <div class="col-6 col-sm-6 col-md-4 col-lg-3">
                        <div class="card border-0 shadow-sm">
                            <img src="<?= base_url('./assets/uploads/project/gallary_image/' . $image['image']) ?>"
                                class="card-img-top img-fluid" style="height:250px; object-fit:cover;" alt="Gallery Image">
                        </div>
                    </div>

                <?php endforeach; ?>

            <?php else: ?>

                <div class="col-12 text-center">
                    <div class="card mx-auto" style="max-width: 300px;">
                        <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="No data">
                        <div class="card-body">
                            <h5 class="card-title">No info available</h5>
                        </div>
                    </div>
                </div>

            <?php endif; ?>
        </div>

    </div>
</section>


<style>
    .gallary-section-title {
        padding: 10px;
        color: #fff;
        background-color: #7A1C87;
        text-align: center;
        border-radius: 4px;
        margin-bottom: 10px;
    }
</style>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>