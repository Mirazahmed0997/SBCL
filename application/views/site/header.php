<!DOCTYPE html>
<html lang="bn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>বাংলাদেশ জাতীয় সমবায় ইউনিয়ন | অফিসিয়াল ওয়েবসাইট</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="<?php echo base_url('') ?>assets/backend/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <?php if ($this->session->flashdata('login_success')): ?>
        <div class="alert alert-danger">
            <?= $this->session->flashdata('login_success'); ?>
        </div>
    <?php endif; ?>

    <?php $this->load->view('site/pages/home_page_header'); ?>


    <div class="sticky-header-container">

        <header style="padding: 0% !important;">
            <?php $this->load->view('site/pages/navbar'); ?>
        </header>

    </div>
    <?php $this->load->view('site/pages/news_headline'); ?>
    

</body>

<style>
    body {
        /* background: linear-gradient(90deg, #32aaba, #feb47b); */
    }
</style>