<?php
$managment_info = $this->db->order_by('id', 'asc')
    ->get('managment_info')
    ->result_array();
?>


<title>ব্যবস্থাপনা কমিটি</title>
<section class="management-section">
     <?php $this->load->view('site/pages/home_page_header'); ?>
    <h2 class="section-title">
        ব্যবস্থাপনা কমিটি
    </h2>
    <div class="container">

        <!-- TOP 2 MEMBERS -->
        <div class="top-members">
            <?php foreach (array_slice($managment_info, 0, 2) as $row): ?>
                <div class="member-card large">
                    <img src="<?= base_url('./assets/uploads/project/management_img/' . $row['image']) ?>" alt="">
                    <p style="font-size: 14px; line-height: 1.1; font-weight: bold; "><?= htmlspecialchars($row['name']) ?></p>
                    <p style="font-size: 14px;" class=" designation"><?= htmlspecialchars($row['designation']) ?></p>
                    <!-- <p class="details" style="font-size: 14px; line-height: 1.1;">
                        <?= htmlspecialchars(mb_substr($row['details'], 0, 30)) ?>
                        <?= mb_strlen($row['details']) > 30 ? '...' : '' ?>
                    </p> -->
                    <a style="font-size: 14px; line-height: 1.1;"
                        href="<?= base_url('management_details/' . $row['id']); ?>" class="dashed-link">বিস্তারিত</a>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- REST MEMBERS -->
        <div class="other-members">
            <?php foreach (array_slice($managment_info, 2) as $row): ?>
                <div class="member-card">
                    <img src="<?= base_url('./assets/uploads/project/management_img/' . $row['image']) ?>" alt="">
                    <p style="font-size: 14px; line-height: 1; font-weight: bold"><?= htmlspecialchars($row['name']) ?></p>
                    <p style="font-size: 14px;" class=" designation"><?= htmlspecialchars($row['designation']) ?></p>
                    <!-- <p class="details" style="font-size: 14px; line-height: 1.1;">
                        <?= htmlspecialchars(mb_substr($row['details'], 0, 30)) ?>
                        <?= mb_strlen($row['details']) > 30 ? '...' : '' ?>
                    </p> -->
                    <a style="font-size: 14px; line-height: 1.1;"
                        href="<?= base_url('management_details/' . $row['id']); ?>" class="dashed-link">বিস্তারিত</a>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>


<style>
    .section-title {
        margin-top: 10px;
        background: #7a1c87;
        color: #fff !important;
        padding: 13px !important;
        font-size: 20px;
        font-weight: 600;
        text-align: center;
        border-radius: 6px 6px 0 0;
    }

    .management-section {
        padding: 20px;
        background-color: blanchedalmond;
    }

    .top-members {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 300px));
        justify-content: center;
        gap: 15px;
        margin-bottom: 20px;
    }

    .member-card.large {
        padding: 5px;
        text-align: center;
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .member-card.large img {
        
        width: 100%;
        height: 250px;
        object-fit: contain;
    }

    .other-members {
        display: grid;
        grid-template-columns: repeat(5, 5fr);
        gap: 15px;
    }

    .member-card {
        padding: 5px;
        text-align: center;
        background: #fff;
        border-radius: 8px;
        overflow: hidden;
        padding-bottom: 10px;
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.08);
    }

    .member-card img {
        width: 100%;
        height: 160px;
        object-fit: contain;
    }

    .member-card h5,
    .member-card h6 {
        margin: 10px 0 5px;
    }

    .member-card p,
    .member-card small {
        color: #555;
    }


    .other-members {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 15px;
}

/* Large devices (laptops/desktops) */
@media (max-width: 1200px) {
    .other-members {
        grid-template-columns: repeat(4, 1fr);
    }
}

/* Tablets */
@media (max-width: 992px) {
    .other-members {
        grid-template-columns: repeat(3, 1fr);
    }
}

/* Small tablets / large phones */
@media (max-width: 768px) {
    .other-members {
        grid-template-columns: repeat(2, 1fr);
    }
}

/* Mobile devices */
@media (max-width: 480px) {
    .other-members {
        grid-template-columns: 1fr;
    }
}
</style>