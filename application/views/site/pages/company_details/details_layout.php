<section class="company-details">
    <div class="container">
        <div class="company-wrapper">
            <!-- Company Description -->
            <?php $this->load->view('site/pages/company_details/short_description'); ?>

            <!-- Managment info Cards -->
            <?php $this->load->view('site/pages/company_details/managment_introduction'); ?>
        </div>
    </div>
</section>

<style>
    /* General */
    .company-details {
        /* background-color: #f9f9f9; */
        padding: 60px 20px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
    }

    /* Flex layout */
    .company-wrapper {
        display: flex;
        flex-wrap: wrap;
        gap: 40px;
    }

    /* Company Description */
    .company-description {
        flex: 1 1 40%;
    }

    

    /* Employee Section */
    .employees {
        flex: 1 1 55%;
    }

    

    

    /* Responsive */
    @media (max-width: 992px) {
        .company-wrapper {
            flex-direction: column;
        }

        .employee-card {
            flex: 1 1 100%;
        }
    }

    @media (max-width: 576px) {

        .company-description,
        .employees {
            flex: 1 1 100%;
        }

        .employee-card img {
            width: 80px;
            height: 80px;
        }
    }
</style>