<?php
$current_projects = $this->db->order_by('created_at', 'DESC')
    ->where('status', 1)
    ->get('current_projects')
    ->result_array();
?>



<!-- ------------------------------------------- -->

<div class="current-projects">
    <h3><i class="fas fa-tasks"></i> বিজ্ঞাপন</h3>
    <div class="project-viewport">
        <div class="project-list-scroll" id="projectList">

            <?php if (!empty($current_projects)): ?>
                <?php foreach ($current_projects as $row): ?>
                    <div>
                        <img
                            src="<?= base_url('assets/uploads/project/project_image/' . $row['image']) ?>"
                            alt="বিজ্ঞাপন"
                            class="clickable-image"
                            data-full="<?= base_url('assets/uploads/project/project_image/' . $row['image']) ?>"
                        >
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <li>No news available</li>
            <?php endif; ?>

        </div>
    </div>
</div>

<div id="imageModal" class="modal">
    <span class="close">&times;</span>
    <img class="modal-content" id="modalImage" alt="Full Image">
</div>


<style>
    .project-viewport {
        width: 100%;
        height: 320px;
        overflow: hidden;
    }

    .project-list-scroll {
        height: 100%;
        overflow-y: scroll;
        scroll-behavior: auto;
        width: 100%;
        background: #fff;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        margin-bottom: 15px;
    }

    .project-list-scroll img {
        width: 100%;
        height: 100%;
        margin-top: 10px;
        object-fit: contain;
        display: block;
        cursor: pointer;
        transition: transform 0.4s ease;
    }

    .project-list-scroll img:hover {
        transform: scale(1.05);
    }

    .modal {
        display: none; 
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0,0,0,0.8);
    }

    .modal-content {
        margin: auto;
        display: block;
        width: 100%;
        height: 100%;
        box-shadow: 0 0 25px rgba(255,255,255,0.4);
        animation: zoomIn 0.3s;
    }

    @keyframes zoomIn {
        from {transform: scale(0.8); opacity: 0;}
        to {transform: scale(1); opacity: 1;}
    }

    .close {
        position: absolute;
        top: 20px;
        right: 35px;
        color: #fff;
        font-size: 40px;
        font-weight: bold;
        cursor: pointer;
        transition: color 0.3s ease;
    }

    .close:hover {
        color: #bbb;
    }

</style>

<script>
    const projectList = document.getElementById('projectList');
    let scrollSpeed = 1;
    let scrollInterval;

    function autoScroll() {
        projectList.scrollTop += scrollSpeed;

        if (projectList.scrollTop >= projectList.scrollHeight / 2) {
            projectList.scrollTop = 0;
        }
    }

    // Start auto scroll
    scrollInterval = setInterval(autoScroll, 30);

    // Pause scroll on hover
    projectList.addEventListener('mouseenter', () => {
        clearInterval(scrollInterval);
    });

    // Resume scroll on mouse leave
    projectList.addEventListener('mouseleave', () => {
        scrollInterval = setInterval(autoScroll, 30);
    });

    // Lightbox modal functionality
    const modal = document.getElementById('imageModal');
    const modalImg = document.getElementById('modalImage');
    const closeBtn = document.querySelector('.close');

    // Open modal on image click
    document.querySelectorAll('.clickable-image').forEach(img => {
        img.addEventListener('click', () => {
            modal.style.display = 'block';
            modalImg.src = img.dataset.full;
            modalImg.alt = img.alt;
        });
    });

    // Close modal on close button click
    closeBtn.addEventListener('click', () => {
        modal.style.display = 'none';
        modalImg.src = '';
    });

    // Close modal on clicking outside the image
    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.style.display = 'none';
            modalImg.src = '';
        }
    });

    // Optional: Close modal with ESC key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            modal.style.display = 'none';
            modalImg.src = '';
        }
    });
</script>




<!-- -------------------------------------->
 <!-- <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">

  <div class="carousel-indicators">
    <?php foreach ($current_projects as $index => $row): ?>
      <button type="button"
        data-bs-target="#carouselExampleIndicators"
        data-bs-slide-to="<?= $index; ?>"
        class="<?= ($index == 0) ? 'active' : ''; ?>">
      </button>
    <?php endforeach; ?>
  </div>

  <div class="carousel-inner">
    <?php foreach ($current_projects as $index => $row): ?>
      <div class="carousel-item <?= ($index == 0) ? 'active' : ''; ?>">
        <img class="d-block w-100"
          src="<?= base_url('assets/uploads/project/project_image/' . $row['image']) ?>"
          alt="Slide <?= $index; ?>">
      </div>
    <?php endforeach; ?>
  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>

  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>

</div> -->
