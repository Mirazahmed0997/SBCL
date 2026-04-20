<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" rel="stylesheet">

<?php
$image_slider = $this->db->order_by('created_at', 'DESC')
  ->where('status', 1)
  ->get('image_slider')
  ->result_array();
?>

<div class="container my-2">
  <div class="swiper mySwiper">
    <div class="swiper-wrapper">

      <?php if (!empty($image_slider)): ?>
        <?php foreach ($image_slider as $slide): ?>
          <div class="swiper-slide">

            <div class="card">
              <img src="<?= base_url('/assets/uploads/project/slider_image/' . $slide['image']) ?>" class="card-img-top" alt="<?= htmlspecialchars($slide['title']) ?>">
              <div class="card-body hover-show">
                <h5 class="card-title"><?= htmlspecialchars($slide['title']) ?></h5>
              </div>
            </div>
            
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <div class="swiper-slide">
          <div class="card">
            <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="No slides">
            <div class="card-body">
              <h5 class="card-title">No slides available</h5>
            </div>
          </div>
        </div>
      <?php endif; ?>

    </div>

    <div class="swiper-pagination"></div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>
</div>

<style>
  .swiper {
    padding-bottom: 50px;
  }

  .swiper-slide {
    display: flex;
    justify-content: center;
    width: auto !important; 
  }

  .card {
    width: 100%;          
    max-width: 18rem;     
    box-shadow: 10px 10px 18px rgba(0, 0, 0, 0.12);
    border-radius: 12px;
    overflow: hidden;
    background: #fff;
  }

  .card-img-top {
    height: 250px;
    object-fit: cover;
    width: 100%;
  }

  .card-body {
    background-color: transparent;
    position: relative;
  }

  .card-body.hover-show {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    background: rgba(0, 0, 0, 0.7);
    color: #fff;
    padding: 15px;
    opacity: 0;
    transform: translateY(100%);
    transition: all 0.4s ease;
    border-bottom-left-radius: 12px;
    border-bottom-right-radius: 12px;
  }

  .card:hover .card-body.hover-show {
    opacity: 1;
    transform: translateY(0);
  }

  .card-body.hover-show h5 {
    margin: 0;
    font-size: 16px;
    font-weight: 600;
  }

  /* Responsive tweaks */

  @media (max-width: 576px) {
    .card-img-top {
      height: 150px; 
    }
  }
</style>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    spaceBetween: 2,
    loop: false,

    autoplay: {
      delay: 2000,
      disableOnInteraction: false,
    },

    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },

    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },

    breakpoints: {
      576: {
        slidesPerView: 2
      },
      768: {
        slidesPerView: 3
      },
      992: {
        slidesPerView: 4
      }
    }
  });
</script>