<?php
$achievements = $this->db->order_by('created_at', 'DESC')
    ->where('status', 1)
    ->get('achievements')
    ->result_array();
?>


<div class="history-section-title">
    <h2>সদস্য সমিতির সাফল্য গাঁথা</h2>
</div>

<div class="history-flex">
    <section class="container" id="history" class="history-section">
        <div class="history-container">

            <div class="history-flex">
                <div class="history-text">
                    <p>বাংলাদেশ সমবায় ইউনিয়ন একটি দীর্ঘ ঐতিহ্যবাহী প্রতিষ্ঠান যা বাংলাদেশের তৃণমূল পর্যায়ের সমবায়ীদের
                        অধিকার রক্ষায় কাজ করে আসছে। স্বাধীনতার পর থেকে গ্রামীণ অর্থনীতি পুনর্গঠনে এই ইউনিয়নের ভূমিকা
                        অপরিসীম।</p>
                    <p>সমবায়ের মাধ্যমে আত্মনির্ভরশীল বাংলাদেশ গড়ার লক্ষ্যে আমরা জাতীয় এবং আন্তর্জাতিক পর্যায়ের সমবায়
                        আন্দোলনকে ত্বরান্বিত করছি। আমাদের মূল লক্ষ্য হলো সমবায়ী সদস্যদের অর্থনৈতিক ও সামাজিক সুরক্ষা
                        প্রদান
                        করা।</p>
                    <ul class="history-list">
                        <li><i class="fas fa-check-circle"></i> সমবায় মূল্যবোধের প্রসার</li>
                        <li><i class="fas fa-check-circle"></i> দক্ষ নেতৃত্ব তৈরি</li>
                        <li><i class="fas fa-check-circle"></i> নীতি নির্ধারণী সহায়তা</li>
                    </ul>
                </div>
            </div>


        </div>




        <!-- <div class="success-slider-wrapper">
            <div class="success-track" id="successTrack">
                <?php if (!empty($achievements)): ?>
                    <?php foreach ($achievements as $row): ?>
                        <div class="story-card">
                            <img src="<?= base_url('./assets/uploads/project/achievement_image/' . $row['image']) ?>"
                                alt="Success">
                            <div class="story-info">
                                <h4><?= $row['title']; ?></h4>
                                <p><?= $row['details']; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <li>No history available</li>
                <?php endif; ?>

        </div> -->
    </section>
</div>





<style>
    .history-section-title {
        padding: 10px;
        color: #fff;
        background-color: #7A1C87;
        text-align: center;
        border-radius: 4px;
        width: 80%;
        margin: 0 auto;
    }




    .history-flex {
        display: flex;
        gap: 30px;
        align-items: flex-start;
    }

    .history-text {
        flex: 1;
    }

    .history-slider {
        flex: 1;
    }


    .success-slider-wrapper {
        overflow: hidden;
        width: 100%;
    }

    .success-track {
        display: flex;
        gap: 20px;
        transition: transform 0.5s ease;
    }


    .story-card {
        min-width: 250px;
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .story-card img {
        width: 100%;
        height: 150px;
        object-fit: cover;
    }

    .story-info {
        padding: 10px;
    }

    @media (max-width: 768px) {
        .history-flex {
            flex-direction: column;
        }
    }
</style>


<script>
    let track = document.getElementById('successTrack');
    let scrollAmount = 0;

    function autoSlide() {
        scrollAmount += 270;

        if (scrollAmount >= track.scrollWidth - track.clientWidth) {
            scrollAmount = 0;
        }

        track.style.transform = `translateX(-${scrollAmount}px)`;
    }

    setInterval(autoSlide, 3000);
</script>