<!-- Start Search Overlay -->
<!-- <div class="search-overlay">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="search-overlay-layer"></div>
            <div class="search-overlay-layer"></div>
            <div class="search-overlay-layer"></div>

            <div class="search-overlay-close">
                <span class="search-overlay-close-line"></span>
                <span class="search-overlay-close-line"></span>
            </div>

            <div class="search-overlay-form">
                <form action="#" method="GET">
                    <input type="text" name="search_param" class="input-search" placeholder="Search here...">
                    <input type="submit" name="search" value="Search">
                </form>
            </div> 
        </div>
    </div>
</div> -->
<!-- End Search Overlay -->

<!-- Start Main Banner Area -->
<section class="main-banner-wrapper">
    <div class="container">
        <div class="banner-wrapper-content">
            <h1>Search local Directories and <a href="#" class="typewrite" data-period="2000"
                    data-type='[ "MLM", "Distributor", "Nutrition", "Health", "Wellness ", "Technology" ]'><span
                        class="wrap"></span></a> </h1>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum is simply dummy
                text of the printing and typesetting industry</p>

            <form action="<?php echo base_url('home/search') ?>" method="GET">
                <input type="text" name="search_param" class="input-search" placeholder="What are you looking for?" required>
                <button type="submit">Search</button>
            </form>
        </div>
    </div>
</section>
<!-- End Main Banner Area -->

<!-- Start Listing Categories Area -->
<section class="listing-categories-area pt-100 pb-70">
    <div class="container">
        <div class="section-title text-start">
            <span class="sub-title">Categories</span>
            <h2>Browse Trending Categories</h2>
            <a href="#" class="section-title-btn">See All <i class='bx bx-chevrons-right'></i></a>
        </div>

        <div class="row justify-content-center">

            <?php if($category){ foreach($category as $cat) {?>

            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-categories-listing-item"
                    style="background-image:url(<?php echo base_url('uploads/'.$cat['category_image']) ?>)">
                    <div class="icon">
                        <img src="<?php echo base_url('uploads/'.$cat['category_image_icon']) ?>">
                    </div>
                    <h3><?php echo $cat['category_name'] ?></h3>
                <?php $count_list = $this->db->where(['category_id'=> $cat['id']])->from("ci_businesses")->count_all_results() ?>
                    <span><?php echo $count_list.' LISTING'; ?></span>

                    <a href="<?php echo base_url('category/'.$cat['slug']) ?>" class="learn-more-btn">Learn More <i class='bx bx-chevron-right'></i></a>

                    <a href="<?php echo base_url('category/'.$cat['slug']) ?>" class="link-btn"></a>
                </div>
            </div>

            <?php } }?>


        </div>
    </div>
</section>
<!-- End Listing Categories Area -->

<!-- Start Listing Area -->
<section class="listing-area pb-70">
    <div class="container">
        <div class="section-title text-start">
            <span class="sub-title">Discover Listing</span>
            <h2>Trending Listing</h2>
            <a href="#" class="section-title-btn">See All <i class='bx bx-chevrons-right'></i></a>
        </div>

        <div class="row">

            <?php if($business){ foreach($business as $buss) {?>

            <div class="col-lg-4 col-sm-12 col-md-6">
                <div class="single-listing-item">
                    <div class="listing-image">
                        <a href="<?php echo base_url('listing/'.$buss['slug']) ?>" class="d-block"><img src="<?php echo base_url('uploads/'.$buss['feature_image']) ?>"
                                alt="image"></a>

                        <div class="listing-tag">
                            <a href="<?php echo base_url('listing/'.$buss['slug']) ?>" class="d-block">Health</a>
                        </div>

                        <div class="listing-rating">
                            <div class="review-stars-rated">
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                            </div>

                            <div class="rating-total">
                                5.0 (1 reviews)
                            </div>
                        </div>
                    </div>

                    <div class="listing-content">
                        <div class="listing-author d-flex align-items-center">
                            <img src="<?php echo base_url('assets/front/') ?>assets/img/user1.jpg"
                                class="rounded-circle mr-2" alt="image">
                            <span><?php echo $buss['business_name'] ?></span>
                        </div>

                        <h3><a href="<?php echo base_url('listing/'.$buss['slug']) ?>" class="d-inline-block"><?php echo $buss['title'] ?></a></h3>

                        <span class="location"><i class="bx bx-map"></i> <?php echo $buss['address'] ?></span>
                    </div>

                </div>
            </div>
            <?php }}  ?>

        </div>
    </div>
</section>
<!-- End Listing Area -->

<!-- Start Listing Area -->
<section class="listing-area pb-70">
    <div class="container">
        <div class="section-title text-start">
            <span class="sub-title">Discover Listing</span>
            <h2>Most Popular Listing</h2>
            <a href="#" class="section-title-btn">See All <i class='bx bx-chevrons-right'></i></a>
        </div>

        <div class="row">
            <?php if($propular_business){ foreach($propular_business as $prop_buss) {?>

            <div class="col-lg-4 col-sm-12 col-md-6">
                <div class="single-listing-item">
                    <div class="listing-image">
                        <a href="#" class="d-block"><img
                                src="<?php echo base_url('uploads/'.$prop_buss['feature_image']) ?>" alt="image"></a>

                        <div class="listing-tag">
                            <a href="#" class="d-block">Health</a>
                        </div>

                        <div class="listing-rating">
                            <div class="review-stars-rated">
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                            </div>

                            <div class="rating-total">
                                5.0 (1 reviews)
                            </div>
                        </div>
                    </div>

                    <div class="listing-content">
                        <div class="listing-author d-flex align-items-center">
                            <img src="<?php echo base_url('assets/front/') ?>assets/img/user1.jpg"
                                class="rounded-circle mr-2" alt="image">
                            <span><?php echo $prop_buss['business_name'] ?></span>
                        </div>

                        <h3><a href="#" class="d-inline-block"><?php echo $prop_buss['title'] ?></a></h3>

                        <span class="location"><i class="bx bx-map"></i> <?php echo $prop_buss['address'] ?></span>
                    </div>

                </div>
            </div>
            <?php }}  ?>
        </div>
    </div>
</section>
<!-- End Listing Area -->

<!-- Start Process Area -->
<section class="process-area ptb-100">
    <div class="container">
        <div class="section-title">
            <span class="sub-title">Process</span>
            <h2>See How It Works</h2>
        </div>

        <div class="row">
            <div class="col-lg-4 col-sm-6 col-md-6">
                <div class="single-process-box">
                    <div class="icon">
                        <i class="flaticon-tap"></i>
                    </div>
                    <div class="content">
                        <h3>Choose A Category</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
                        <div class="number">1</div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6 col-md-6">
                <div class="single-process-box">
                    <div class="icon">
                        <i class="flaticon-find"></i>
                    </div>
                    <div class="content">
                        <h3>Find What You Want</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
                        <div class="number">2</div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6 col-md-6 offset-lg-0 offset-md-3 offset-sm-3">
                <div class="single-process-box">
                    <div class="icon">
                        <i class="flaticon-explore"></i>
                    </div>
                    <div class="content">
                        <h3>Go Out & Explore</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
                        <div class="number">3</div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-sm-12 col-md-12">
                <div class="process-arrow-icon">
                    <img src="<?php echo base_url('assets/front/') ?>assets/img/arrow.png" alt="image">
                </div>
            </div>
        </div>
    </div>

    <div class="lines">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </div>
</section>
<!-- End Process Area -->

<!-- Start Feedback Area -->
<section class="feedback-area ptb-100">
    <div class="section-title">
        <span class="sub-title">Client</span>
        <h2>Testimonials</h2>
    </div>
    <div class="container">
        <div class="feedback-slides owl-carousel owl-theme">
        <?php if(isset($testimonial)) { foreach($testimonial as $testi){ ?>
            <div class="single-feedback-item">
                <p>“<?php echo $testi['comments'] ?>”</p>

                <div class="info">
                    <h3><?php echo $testi['name'] ?></h3>
                    <span><?php echo $testi['location'] ?></span>
                    <img src="<?php echo base_url('uploads/'.$testi['image']) ?>" class="shadow rounded-circle"
                        alt="image">
                </div>
            </div>
        <?php } } ?>
        </div>
    </div>
</section>
<!-- End Feedback Area -->



<!-- Start Shopping Cart Modal -->
<div class="modal right fade shoppingCartModal" id="shoppingCartModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class='bx bx-x'></i></span>
            </button>

            <div class="modal-body">
                <h3>My Cart (3)</h3>

                <div class="products-cart-content">
                    <div class="products-cart">
                        <div class="products-image">
                            <a href="#"><img src="<?php echo base_url('assets/front/') ?>assets/img/products/img1.jpg"
                                    alt="image"></a>
                        </div>

                        <div class="products-content">
                            <h3><a href="#">Ham Salad</a></h3>
                            <span>Quantity: 01</span>
                            <div class="products-price">
                                $20
                            </div>
                            <a href="#" class="remove-btn"><i class='bx bx-trash'></i></a>
                        </div>
                    </div>

                    <div class="products-cart">
                        <div class="products-image">
                            <a href="#"><img src="<?php echo base_url('assets/front/') ?>assets/img/products/img2.jpg"
                                    alt="image"></a>
                        </div>

                        <div class="products-content">
                            <h3><a href="#">Fresh Cappuccino</a></h3>
                            <span>Quantity: 02</span>
                            <div class="products-price">
                                $25
                            </div>
                            <a href="#" class="remove-btn"><i class='bx bx-trash'></i></a>
                        </div>
                    </div>

                    <div class="products-cart">
                        <div class="products-image">
                            <a href="#"><img src="<?php echo base_url('assets/front/') ?>assets/img/products/img3.jpg"
                                    alt="image"></a>
                        </div>

                        <div class="products-content">
                            <h3><a href="#">Honey Cake</a></h3>
                            <span>Quantity: 01</span>
                            <div class="products-price">
                                $11
                            </div>
                            <a href="#" class="remove-btn"><i class='bx bx-trash'></i></a>
                        </div>
                    </div>
                </div>

                <div class="products-cart-subtotal">
                    <span>Subtotal</span>

                    <span class="subtotal">$524.00</span>
                </div>

                <div class="products-cart-btn">
                    <a href="cart.html" class="default-btn">View Bag & Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Shopping Cart Modal -->