<?php
$managment_info = $this->db->order_by('id', 'asc')
    ->get('managment_info')
    ->result_array();
?>

<div class="employees">
    <h2 class="section-title">
        ব্যবস্থাপনা কমিটি
    </h2>
    <div class="employee-cards">
        <?php if (!empty($managment_info)): ?>
            <?php foreach ($managment_info as $info): ?>

                <div class="employee-card">
                    <img src="<?= base_url('./assets/uploads/project/management_img/' . $info['image']) ?>" alt="Jane Smith">
                   <div class="card-body" style="padding: 10px;box-shadow: 10px 10px 18px rgba(0, 0, 0, 0.12);">
                     <p style="font-size: 14px; line-height: 1.1;"><?= htmlspecialchars($info['name']) ?></p>
                    <p style="font-size: 14px;" class=" designation"><?= htmlspecialchars($info['designation']) ?></p>
                    <p class="details" style="font-size: 14px; line-height: 1.1;">
                        <?= htmlspecialchars(mb_substr($info['details'], 0, 50)) ?>
                        <?= mb_strlen($info['details']) > 50 ? '...' : '' ?>
                    </p>
                    <a style="font-size: 14px; line-height: 1.1;" href="<?= base_url('management_details/' . $info['id']); ?>"
                        class="dashed-link">বিস্তারিত</a>
                   </div>
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
    </div>
</div>


<style>
    .employees .section-title {
        margin-top: 10px;
        background: #7a1c87;
        color: #fff !important;
        padding: 13px !important;
        font-size: 20px;
        font-weight: 600;
        text-align: center;
        border-radius: 6px 6px 0 0;
    }

    .employees {
        flex: 1 1 55%;
        display: flex;
        flex-direction: column;
        height: 660px;
        padding: 10px;
        box-shadow: 10px 10px 18px rgba(0, 0, 0, 0.12);
        overflow: hidden;
    }

    .employees h2 {
        flex-shrink: 0;
        margin-bottom: 10px;
    }

    .employee-cards {
        flex: 1;
        overflow-y: auto;
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        padding-right: 10px;
        align-content: flex-start;
    }

    .employee-cards::-webkit-scrollbar {
        width: 8px;
    }

    .employee-cards::-webkit-scrollbar-thumb {
        background: #32aaba;
        border-radius: 4px;
    }

    .employee-card.employee-card {
        flex: 0 0 calc(50% - 10px);
        max-width: calc(50% - 10px);
        background: #9ab6ba;
        /* border-radius: 10px; */
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        /* padding: 5px; */
        text-align: center;

    }

    .employee-card:hover {
        transform: translateY(-5px);
    }

    .employee-card img {
        width: 100%;
        height: 310px;
        object-fit: cover;
        margin-bottom: 6px;
    }

    .employee-card h3 {
        margin-bottom: 5px;
        font-size: 1.2rem;
        color: #333;
    }

    .employee-card .designation {
        font-size: 0.95rem;
        color: #32aaba;
        margin-bottom: 10px;
        font-weight: 600;
    }

    .employee-card .details {
        font-size: 0.9rem;
        color: #555;
    }
</style>




<!-- <div class="card" style="width: 18rem;">
                    <img src="<?= base_url('./assets/uploads/project/management_img/' . $info['image']) ?>" class="card-img-top"
                        alt="...">
                    <div class="card-body">
                        <p  style="font-size:10px"><?= htmlspecialchars($info['name']) ?></p>
                        <p style="font-size:14px" class="designation"><?= htmlspecialchars($info['designation']) ?></p>
                        <p class="details"m style="font-size:12px">
                            <?= htmlspecialchars(mb_substr($info['details'], 0, 50)) ?>
                            <?= mb_strlen($info['details']) > 50 ? '...' : '' ?>
                        </p>
                        <a style="font-size:12px" href="<?= base_url('management_details/' . $info['id']); ?>" class="dashed-link">বিস্তারিত</a>
                    </div>
                </div> -->