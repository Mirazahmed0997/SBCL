<?php
$image_gallery = $this->db->order_by('id', 'asc')
    ->where('status',1)
    ->limit(8)
    ->get('image_gallery')
    ->result_array();
?>

<section class="gallary-section">
    <div class="gallary-section-title">
        <h2>গ্যালারি</h2>
    </div>

    <div class="gallery-grid">


        <?php if (!empty($image_gallery)): ?>
            <?php foreach ($image_gallery as $image): ?>



                <div class="gallery-item">
                    <img src="<?= base_url('./assets/uploads/project/gallary_image/' . $image['image']) ?>"
                        onclick="openLightbox(this.src)">
                </div>

            <?php endforeach; ?>
        <?php else: ?>
            <div class="swiper-slide">
                <div class="card">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="No slides">
                    <div class="card-body">
                        <h5 class="card-title">No info available</h5>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="more-btn">
            <a href="all_images">আরো দেখুন</a>
        </div>

    </div>

    <!-- Lightbox -->
    <div id="lightbox" class="lightbox" onclick="closeLightbox()">
        <img id="lightbox-img">
    </div>
</section>



<style>
    .gallary-section {
        background-color: antiquewhite;
        width: 100%;
        padding: 10px;
    }

    .gallary-section-title {
        padding: 10px;
        color: #fff;
        background-color: #7A1C87;
        text-align: center;
        border-radius: 4px;
        margin-bottom: 10px;
    }
    .more-btn {
        color: #fff;
        text-align: center;
    }

    /* GRID SYSTEM */
    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 10px;
    }

    /* ITEM */
    .gallery-item {
        width: 100%;
        aspect-ratio: 1 / 1;
        /* PERFECT SQUARE */
        overflow: hidden;
        border-radius: 10px;
        cursor: pointer;
    }

    .gallery-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: 0.4s;
    }

    .gallery-item:hover img {
        transform: scale(1.1);
    }

    /* LIGHTBOX */
    .lightbox {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.9);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    .lightbox img {
        max-width: 90%;
        max-height: 90%;
        border-radius: 10px;
    }

    /* RESPONSIVE */

    /* Tablet */
    @media (max-width: 992px) {
        .gallery-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    /* Mobile */
    @media (max-width: 600px) {
        .gallery-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    /* Small mobile */
    @media (max-width: 400px) {
        .gallery-grid {
            grid-template-columns: 1fr;
        }
    }
</style>