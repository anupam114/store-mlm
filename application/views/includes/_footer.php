        <!-- Start Footer Area -->
        <footer class="footer-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-12 col-sm-12">
                        <div class="single-footer-widget">
                            <h3>Contact Info</h3>

                            <div class="about-the-store">
                                <ul class="footer-contact-info">
                                    <li><i class='bx bx-map'></i><?php echo $this->general_settings['address'] ?></li>
                                    <li><i class='bx bx-phone-call'></i> <a href="tel:<?php echo $this->general_settings['mobile'] ?>"><?php echo $this->general_settings['mobile'] ?></a></li>
                                    <li><i class='bx bx-envelope'></i><?php echo $this->general_settings['email_from'] ?></li>
                                </ul>
                            </div>

                            <ul class="social-link">
                                <li><a href="#" class="d-block" target="_blank"><i class='bx bxl-facebook'></i></a></li>
                                <li><a href="#" class="d-block" target="_blank"><i class='bx bxl-twitter'></i></a></li>
                                <li><a href="#" class="d-block" target="_blank"><i class='bx bxl-instagram'></i></a></li>
                                <li><a href="#" class="d-block" target="_blank"><i class='bx bxl-linkedin'></i></a></li>
                                <li><a href="#" class="d-block" target="_blank"><i class='bx bxl-pinterest-alt'></i></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="single-footer-widget pl-4">
                            <h3>Quick Links</h3>

                            <ul class="quick-links">

                            <?php $foonavigation = get_navigation(); if(isset($foonavigation)){ foreach($foonavigation as $foonav) { ?>
                                <li><a href="<?php echo base_url('category/'.$foonav['slug']) ?>"><?php echo $foonav['category_name'] ?></a></li>
                            <?php } } ?>

                                <!-- <li><a href="#">About Us</a></li>
                                <li><a href="#">MLM </a></li>
                                <li><a href="#">Distributor </a></li>
                                <li><a href="#">Nutrition </a></li>
                                <li><a href="#">Health </a></li>
                                <li><a href="#">Wellness </a></li>
                                <li><a href="#">Technology </a></li>
                                <li><a href="#">Services </a></li>
                                <li><a href="#"> Self Development </a></li>
                                <li><a href="#"> Personal Growth </a></li>
                                <li><a href="#">Cryptocurrency </a></li>
                                <li><a href="#">Contact Us </a></li> -->
                            </ul>
                        </div>
                    </div>

                    

                    <div class="col-lg-3 col-md-12 col-sm-12">
                        <div class="single-footer-widget">
                            <h3>Newsletter</h3>

                            <div class="footer-newsletter-box">
                                <p>To get the latest news and latest updates from us.</p>

                                <form class="newsletter-form" data-bs-toggle="validator">
                                    <label>Your E-mail Address:</label>
                                    <input type="email" class="input-newsletter" placeholder="Enter your email" name="EMAIL" required autocomplete="off">
                                    <button type="submit">Subscribe</button>
                                    <div id="validator-newsletter" class="form-result"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="footer-bottom-area">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6">
                            <p>Copyright <i class='bx bx-copyright'></i>2022 <a href="#" target="_blank">MLM News</a>  | All rights reserved.</p>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <ul>
                                <li><a href="<?php echo base_url('pages/privacy-policy') ?>">Privacy Policy</a></li>
                                <li><a href="<?php echo base_url('pages/terms-conditions') ?>">Terms & Conditions</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            
        </footer>
        <!-- End Footer Area -->

        <div class="go-top"><i class='bx bx-chevron-up'></i></div>

        <!-- Links of JS files -->
        <script src="<?php echo base_url('assets/front/') ?>assets/js/popper.min.js"></script>
        <script src="<?php echo base_url('assets/front/') ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url('assets/front/') ?>assets/js/owl.carousel.min.js"></script>
        <script src="<?php echo base_url('assets/front/') ?>assets/js/magnific-popup.min.js"></script>
        <script src="<?php echo base_url('assets/front/') ?>assets/js/appear.min.js"></script>
        <script src="<?php echo base_url('assets/front/') ?>assets/js/odometer.min.js"></script>
        <script src="<?php echo base_url('assets/front/') ?>assets/js/jquery-ui.min.js"></script>
        <script src="<?php echo base_url('assets/front/') ?>assets/js/parallax.min.js"></script>
        <script src="<?php echo base_url('assets/front/') ?>assets/js/slick.min.js"></script>
        <script src="<?php echo base_url('assets/front/') ?>assets/js/rangeSlider.min.js"></script>
        <script src="<?php echo base_url('assets/front/') ?>assets/js/nice-select.min.js"></script>
        <script src="<?php echo base_url('assets/front/') ?>assets/js/isotope.pkgd.min.js"></script>
        <script src="<?php echo base_url('assets/front/') ?>assets/js/meanmenu.min.js"></script>
        <script src="<?php echo base_url('assets/front/') ?>assets/js/wow.min.js"></script>
        <script src="<?php echo base_url('assets/front/') ?>assets/js/form-validator.min.js"></script>
        <script src="<?php echo base_url('assets/front/') ?>assets/js/contact-form-script.js"></script>
        <script src="<?php echo base_url('assets/front/') ?>assets/js/ajaxchimp.min.js"></script>
        <script src="<?php echo base_url('assets/front/') ?>assets/js/main.js"></script>
    </body>
</html>