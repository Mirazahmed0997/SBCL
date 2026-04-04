<section class="gallary-section">
    <div class="gallary-section-title">
        <h2>ভিডিও গ্যালারি</h2>
    </div>

    <div class="gallery-grid">

        <div class="video-gallery-item">
            <video src="video1.mp4" onclick="openLightbox(this.src)" muted></video>
        </div>

        <div class="video-gallery-item">
            <video src="video2.mp4" onclick="openLightbox(this.src)" muted></video>
        </div>

        <div class="video-gallery-item">
            <video src="video3.mp4" onclick="openLightbox(this.src)" muted></video>
        </div>

        <div class="video-gallery-item">
            <video src="video4.mp4" onclick="openLightbox(this.src)" muted></video>
        </div>
        <div class="video-gallery-item">
            <video src="video1.mp4" onclick="openLightbox(this.src)" muted></video>
        </div>

        <div class="video-gallery-item">
            <video src="video2.mp4" onclick="openLightbox(this.src)" muted></video>
        </div>

        <div class="video-gallery-item">
            <video src="video3.mp4" onclick="openLightbox(this.src)" muted></video>
        </div>

        <div class="video-gallery-item">
            <video src="video4.mp4" onclick="openLightbox(this.src)" muted></video>
        </div>

    </div>

    <!-- Lightbox -->
    <div id="lightbox" class="lightbox" onclick="closeLightbox()">
        <video id="lightbox-video" controls autoplay></video>
    </div>
</section>


<style>
    .video-gallery-item video {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .video-gallery-item {
        position: relative;
    }

    .video-gallery-item::after {
        content: "▶";
        position: absolute;
        font-size: 40px;
        color: white;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        pointer-events: none;
    }
</style>


<script>
    function openLightbox(src) {
        const lightbox = document.getElementById("lightbox");
        const video = document.getElementById("lightbox-video");

        video.src = src;
        lightbox.style.display = "flex";
    }

    function closeLightbox() {
        const lightbox = document.getElementById("lightbox");
        const video = document.getElementById("lightbox-video");

        video.pause();
        video.src = "";
        lightbox.style.display = "none";
    }

    <script>
document.querySelectorAll(".video-gallery-item video").forEach(video => {
            video.addEventListener("mouseenter", () => video.play());
    video.addEventListener("mouseleave", () => {
            video.pause();
        video.currentTime = 0;
    });
});
</script>
</script>