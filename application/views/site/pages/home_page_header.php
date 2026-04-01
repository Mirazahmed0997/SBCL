<div class="top-header">
    <div class="container">
        <div class="header-flex">
            <div class="logo ">
                <a href="<?= base_url(); ?>">
                    <img src="<?= base_url('assets/uploads/project/members/logo/91a0505bc70a4089f271d1f87c828ad0.png'); ?>"
                        alt="BJSU Logo">
                </a>
            </div>

            <div class="company_info">
                <h1>বাংলাদেশ জাতীয় সমবায় ইউনিয়ন</h1>
                <h4>৯/ডি, মতিঝিল বাণিজ্যিক এলাকা, ঢাকা-১০০০, বাংলাদেশ।</h4>
            </div>
        </div>
    </div>
</div>

<style>

    .logo{
        background-color: white;
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
        font-weight:900;
        margin: 0;
        color: white;
        /* -webkit-text-stroke: 1px #000;
        text-stroke: 1px #000; */
    }

    @media (max-width: 768px) {
        .header-flex {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .header-flex .logo img {
            max-height: 40px;
        }

        .header-flex .company_info h3 {
            font-size: 16px;
        }
    }
</style>