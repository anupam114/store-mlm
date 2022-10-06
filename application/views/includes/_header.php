<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Links of CSS files -->
    <link rel="stylesheet" href="<?php echo base_url('assets/front/') ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/front/') ?>assets/css/jquery-ui.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/front/') ?>assets/css/animate.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/front/') ?>assets/css/boxicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/front/') ?>assets/css/flaticon.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/front/') ?>assets/css/magnific-popup.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/front/') ?>assets/css/odometer.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/front/') ?>assets/css/nice-select.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/front/') ?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/front/') ?>assets/css/slick.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/front/') ?>assets/css/rangeSlider.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/front/') ?>assets/css/meanmenu.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/front/') ?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/front/') ?>assets/css/responsive.css">
    <script src="<?php echo base_url('assets/front/') ?>assets/js/jquery.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>



    <title>MLM News</title>

    <link rel="icon" type="image/png" href="assets/img/favicon.png">
</head>

<body>

    <!-- Start Header Area -->
    <header class="header-area">

        <!-- Start Navbar Area -->
        <div class="navbar-area navbar-style-two">
            <div class="braike-responsive-nav">
                <div class="container">
                    <div class="braike-responsive-menu">
                        <div class="logo">
                            <a href="<?php echo base_url('/') ?>">
                                <img src="<?php echo base_url($this->general_settings['logo']) ?>" alt="logo">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="topheadder py-2">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-4">
                            <a class="navbar-brand" href="<?php echo base_url('/') ?>">
                                <img src="<?php echo base_url($this->general_settings['logo']) ?>" alt="logo">
                            </a>
                        </div>
                        <div class="col-lg-8">
                            <?php if (isset($home['content_img'])) { ?>
                                <a href="#"><img src="<?php echo base_url('uploads/' . $home['content_img']) ?>"></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="braike-nav">
                <div class="container">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <div class="collapse navbar-collapse mean-menu">
                            <ul class="navbar-nav">
                                <li class="nav-item"><a href="<?php echo base_url() ?>" class="nav-link active">Home</a></li>
                                <?php $navigation = get_navigation();
                                if (isset($navigation)) {
                                    foreach ($navigation as $nav) { ?>
                                        <li class="nav-item"><a href="<?php echo base_url('category/' . $nav['slug']) ?>" class="nav-link"><?php echo $nav['category_name'] ?></a></li>
                                <?php }
                                } ?>
                                <!-- <li class="nav-item"><a href="#" class="nav-link">MLM </a></li>
                                    <li class="nav-item"><a href="#" class="nav-link">Distributor </a></li>
                                    <li class="nav-item"><a href="#" class="nav-link">Nutrition </a></li>
                                    <li class="nav-item"><a href="#" class="nav-link">Health & Wellness</a></li>
                                    <li class="nav-item"><a href="#" class="nav-link">Technology   </a></li>
                                    <li class="nav-item"><a href="#" class="nav-link">Services</a></li>
                                    <li class="nav-item"><a href="#" class="nav-link"> Self Development</a></li>
                                    <li class="nav-item"><a href="#" class="nav-link"> Cryptocurrency</a></li> -->
                            </ul>
                        </div>
                        <a href="<?php echo base_url('post-add') ?>" class="btn btn-primary me-auto">Post Add</a>
                    </nav>
                </div>
            </div>
        </div>
        <!-- End Navbar Area -->

    </header>
    <!-- End Header Area -->