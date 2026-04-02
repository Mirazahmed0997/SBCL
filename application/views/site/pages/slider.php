<?php
$banner_image = $this->db->order_by('created_at', 'DESC')
    ->get('banner_image')
    ->result_array();
?>

<section class="slider-container">
    <div class="slider">
        <?php if (!empty($banner_image)): ?>
            <?php foreach ($banner_image as $index => $row): ?>
                <div class="slide <?= $index === 0 ? 'active' : '' ?>">
                    <img src="<?= base_url('assets/uploads/project/banner_image/' . $row['image']) ?>" alt="Slide <?= $index + 1 ?>">
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No banners available</p>
        <?php endif; ?>
    </div>

    <div class="slider-dots">
        <?php foreach ($banner_image as $index => $row): ?>
            <span class="dot <?= $index === 0 ? 'active' : '' ?>" onclick="showSlide(<?= $index ?>)"></span>
        <?php endforeach; ?>
    </div>
</section>

<script>
    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('.dot');
    let currentIndex = 0;
    const slideInterval = 4000;

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.toggle('active', i === index);
            dots[i].classList.toggle('active', i === index);
        });
        currentIndex = index;
    }

    function nextSlide() {
        const nextIndex = (currentIndex + 1) % slides.length;
        showSlide(nextIndex);
    }

    let auto = setInterval(nextSlide, slideInterval);

    dots.forEach((dot, i) => {
        dot.addEventListener('click', () => {
            showSlide(i);
            clearInterval(auto);
            auto = setInterval(nextSlide, slideInterval);
        });
    });
</script>


<style>
    .slide {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        transition: opacity 1s ease-in-out;
        z-index: 0;
    }

    .slide.active {
        opacity: 1;
        z-index: 1;
    }

    .slider-dots {
        position: absolute;
        bottom: 15px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 10px;
    }

    .slider-dots .dot {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.6);
        cursor: pointer;
        transition: background 0.3s;
    }

    .slider-dots .dot.active {
        background: rgba(255, 255, 255, 1);
    }


    .slider-container {
        width: 100%;
        max-width: 1200px;
        height: 400px;
        margin: 0 auto;
        padding: 0 10px;
    }

    .slider {
        width: 100%;
        height: 400px;
        overflow: hidden;
        border-radius: 8px;
        position: relative;
    }

    .slide img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        display: block;
    }

    @media (max-width: 1024px) {
        .slider {
            height: 350px;
        }
    }

    @media (max-width: 768px) {
        .slider {
            height: 300px;
        }
    }

    @media (max-width: 480px) {
        .slider {
            height: 220px;
        }
    }
</style>

