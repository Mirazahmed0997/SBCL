<div class="top-header">
    <div class="container">
        <div class="header">
            <div class="header-flex">
                <div class="logo">
                    <a href="<?= base_url(); ?>">
                        <img src="<?= base_url('assets/uploads/project/members/logo/91a0505bc70a4089f271d1f87c828ad0.png'); ?>"
                            alt="BJSU Logo">
                    </a>
                </div>

                <div class="company_info">
                    <h2>বাংলাদেশ জাতীয় সমবায় ইউনিয়ন</h2>
                    <h6 style=" text-align:center;">৯/ডি, মতিঝিল বাণিজ্যিক এলাকা, ঢাকা-১০০০, বাংলাদেশ।</h6>
                </div>
            </div>

            <div class="coop ">
                <a href="<?= base_url(); ?>">
                    <img width="200px" src="assets/uploads/coop-removebg-preview.png" alt="BJSU Logo" />
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    .header {
        padding-top: 5px;
        display: flex;
        justify-content: space-between;
        align-items: start;
        flex: 1;
    }

    .coop {
        right: 0;
    }

    .logo {
        background-color: white;
        border-radius: 50%;
        border: none !important;
    }


    .top-header {
        border-bottom: 1px solid white;
        padding: 5px 10px;
        background: linear-gradient(90deg, #32aaba, #feb47b);
    }

    .header-flex {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .header-flex .logo img {
        max-height: 100px;
        width: auto;
    }

    .header-flex .company_info h3 {
        font-size: 24px;
        font-weight: 600;
        margin: 0;
        padding-bottom: 2px;
    }

    .header-flex .company_info {
        font-size: 18px;
        font-weight: 900;
        margin: 0;
        color: white;

    }

    /* Responsive adjustments */
    @media (max-width: 992px) {
        .coop img {
            max-width: 150px;
        }
    }

    @media (max-width: 768px) {
        .header {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .header-flex {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .logo img {
            max-height: 60px;
        }

        .company_info h2 {
            font-size: 18px;
        }

        .company_info h6 {
            font-size: 14px;
        }

        .coop img {
            max-width: 120px;
            margin-top: 10px;
        }
    }

    @media (max-width: 480px) {
        .logo img {
            max-height: 50px;
        }

        .company_info h2 {
            font-size: 16px;
        }

        .company_info h6 {
            font-size: 12px;
        }

        .coop img {
            max-width: 100px;
        }

        .header-flex .company_info h2{
        font-size: 18px;
        }
        .header-flex .company_info h6{
        font-size: 8px;
        }
    }
</style>