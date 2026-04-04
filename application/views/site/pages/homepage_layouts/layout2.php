<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3 Section Layout</title>


</head>

<body>

    <div class="container">

        <!-- LEFT -->
        <div class="left">
          <?php $this->load->view('site/pages/objectives/objectives'); ?>
           
        </div>

        <!-- CENTER -->
        <div class="center">
           <?php $this->load->view('site/pages/gallary/gallary'); ?>
        </div>

        <!-- RIGHT -->
        <div class="right">
           <?php $this->load->view('site/pages/Organization_Management_System/Organization_Management_System'); ?>
        </div>

    </div>

</body>

</html>


<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, sans-serif;
    }

    body {
        background: #f2f2f2;
    }

    .container {
        display: flex;
        gap: 20px;
        padding: 20px;
    }

    /* LEFT SECTION */
    .left {
        flex: 1;
        background: #fff;
        border-radius: 6px;
        overflow: hidden;
    }

    .left h3 {
        background: purple;
        color: #fff;
        padding: 12px;
        font-size: 16px;
    }

    .notice {
        padding: 10px;
        border-bottom: 1px solid #ddd;
        font-size: 14px;
        display: flex;
        justify-content: space-between;
    }

    .notice span {
        color: #007bff;
        font-size: 12px;
    }

    /* CENTER SECTION */
    .center {
        flex: 2;
        background: #fff;
        border-radius: 6px;
        overflow: hidden;
    }

    .center img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* RIGHT SECTION */
    .right {
        flex: 1;
        background: #fff;
        border-radius: 6px;
        text-align: center;
        padding-bottom: 20px;
    }

    .right h3 {
        background: purple;
        color: #fff;
        padding: 12px;
    }

    .profile {
        padding: 15px;
    }

    .profile img {
        width: 120px;
        height: 140px;
        object-fit: cover;
        border-radius: 6px;
    }

    .profile h4 {
        margin: 10px 0;
        font-size: 15px;
    }

    .btn {
        display: inline-block;
        padding: 8px 16px;
        background: teal;
        color: #fff;
        border-radius: 4px;
        text-decoration: none;
        margin-top: 10px;
    }

    /* RESPONSIVE */

    @media (max-width: 992px) {
        .container {
            flex-wrap: wrap;
        }

        .left,
        .right {
            flex: 1 1 45%;
        }

        .center {
            flex: 1 1 100%;
        }
    }

    @media (max-width: 600px) {
        .container {
            flex-direction: column;
        }

        .left,
        .center,
        .right {
            flex: 1 1 100%;
        }
    }
</style>