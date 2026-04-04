<section class="gallary-section">
    <div class="gallary-section-title">
        <h2>গ্যালারি</h2>
    </div>

    <div class="gallery-grid">

        <div class="gallery-item">
            <img src="http://localhost:8080/bjsu/assets/uploads/project/slider_image/1775014060_18856.jpg" onclick="openLightbox(this.src)">
        </div>

        <div class="gallery-item">
            <img src="http://localhost:8080/bjsu/assets/uploads/project/slider_image/1775014045_18849.jpg" onclick="openLightbox(this.src)">
        </div>

        <div class="gallery-item">
            <img src="http://localhost:8080/bjsu/assets/uploads/project/slider_image/1775014023_18854.jpg" onclick="openLightbox(this.src)">
        </div>

        <div class="gallery-item">
            <img src="http://localhost:8080/bjsu/assets/uploads/project/slider_image/1775013983_18852.jpg" onclick="openLightbox(this.src)">
        </div>
        <div class="gallery-item">
            <img src="http://localhost:8080/bjsu/assets/uploads/project/slider_image/1775014060_18856.jpg" onclick="openLightbox(this.src)">
        </div>

        <div class="gallery-item">
            <img src="http://localhost:8080/bjsu/assets/uploads/project/slider_image/1775014045_18849.jpg" onclick="openLightbox(this.src)">
        </div>

        <div class="gallery-item">
            <img src="http://localhost:8080/bjsu/assets/uploads/project/slider_image/1775014023_18854.jpg" onclick="openLightbox(this.src)">
        </div>

        <div class="gallery-item">
            <img src="http://localhost:8080/bjsu/assets/uploads/project/slider_image/1775013983_18852.jpg" onclick="openLightbox(this.src)">
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
    width: 100%; /* FIXED */
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

/* GRID SYSTEM */
.gallery-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 10px;
}

/* ITEM */
.gallery-item {
    width: 100%;
    aspect-ratio: 1 / 1; /* PERFECT SQUARE */
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
    background: rgba(0,0,0,0.9);
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