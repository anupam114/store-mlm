<div class="page-title-area page-title-bg2" style="background-image: url(<?php echo base_url('uploads/' . $business['feature_image']) ?>);">
    <div class="container">
        <!--  <div class="page-title-content">
                    <h2>Listing Details</h2>
                </div> -->
    </div>
</div>
<!-- Start listing Details Area -->
<section class="listing-details-area pt-100 pb-70">
    <div class="container">
        <div class="listing-details-header">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="listing-title">
                        <h2><?php echo $business['business_name']; ?></h2>
                        <p class="text-success"><i class="bx bx-map"></i><?php echo $business['address']; ?></p>
                        <p><?php echo $business['short_description']; ?></p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="listing-price">
                        <?php if (isset($business['price'])) { ?>
                            <h3><?php echo '$' . $business['price'] ?></h3>
                        <?php } ?>
                        <!-- <div class="listing-review">
                                    <div class="review-stars">
                                        <i class="bx bxs-star"></i>
                                        <i class="bx bxs-star"></i>
                                        <i class="bx bxs-star"></i>
                                        <i class="bx bxs-star"></i>
                                        <i class="bx bxs-star"></i>
                                    </div>
                                    <span class="reviews-total d-inline-block">(2 reviews)</span>
                                </div> -->
                        <!-- <a href="#" class="default-btn">Get a Quote</a> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="listing-details-image-slides owl-carousel owl-theme">

                    <?php $gallery = json_decode($business['image_gllery'], TRUE); ?>
                    <?php $k = 0;
                    if (isset($gallery)) {
                        while ($k < count($gallery)) { ?>
                            <div class="listing-details-image text-center">
                                <img src="<?php echo base_url('uploads/' . $gallery[$k]) ?>" alt="image">
                            </div>
                    <?php $k++;
                        }
                    } ?>
                </div>

                <div class="listing-details-desc">
                    <h3>Description</h3>

                    <?php echo $business['long_description'] ?>

                    <h3>Amenities</h3>

                    <div class="amenities-list">
                        <ul>
                            <?php $ammenities = json_decode($business['amenities']); ?>
                            <?php $i = 0;
                            if (isset($ammenities)) {
                                while ($i < count($ammenities)) { ?>
                                    <li>
                                        <span>
                                            <i class='bx bx-check'></i>
                                            <?php echo $ammenities[$i] ?>
                                        </span>
                                    </li>
                            <?php $i++;
                                }
                            } ?>
                        </ul>
                    </div>

                    <h3>Location</h3>

                    <!-- Map -->
                    <div class="map-area">
                        <?php echo $business['map']; ?>
                    </div>
                    <!-- End Map -->

                    <!-- <div class="listing-review-comments">
                        <h3>3 Reviews</h3>

                        <div id="rating"></div>



                        <div class="user-review">
                            <img src="assets/img/user1.jpg" alt="image">

                            <div class="review-rating">
                                <div class="review-stars">
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                </div>

                                <span class="d-inline-block">James Anderson</span>
                            </div>

                            <span class="d-block sub-comment">Excellent</span>
                            <p>Very well built theme, couldn't be happier with it. Can't wait for future updates to see what else they add in.</p>
                        </div>

                        <div class="user-review">
                            <img src="<?php base_url('assets/front/') ?>assets/img/user2.jpg" alt="image">

                            <div class="review-rating">
                                <div class="review-stars">
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                </div>

                                <span class="d-inline-block">Sarah Taylor</span>
                            </div>

                            <span class="d-block sub-comment">Video Quality!</span>
                            <p>Was really easy to implement and they quickly answer my additional questions!</p>
                        </div>

                        <div class="user-review">
                            <img src="assets/img/user3.jpg" alt="image">

                            <div class="review-rating">
                                <div class="review-stars">
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                </div>

                                <span class="d-inline-block">David Warner</span>
                            </div>

                            <span class="d-block sub-comment">Perfect Coding!</span>
                            <p>Stunning design, very dedicated crew who welcome new ideas suggested by customers, nice support.</p>
                        </div>
                    </div> -->
                </div>

                <!-- <div class="related-listing">
                    <h3>Related Listing</h3>

                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-md-6">
                            <div class="single-listing-item">
                                <div class="listing-image">
                                    <a href="#" class="d-block"><img src="assets/img/listing/img5.jpg" alt="image"></a>

                                    <div class="listing-tag">
                                        <a href="#" class="d-block">Restaurant</a>
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
                                        <img src="assets/img/user1.jpg" class="rounded-circle mr-2" alt="image">
                                        <span>Steven Smith</span>
                                    </div>

                                    <h3><a href="#" class="d-inline-block">Farmis Garden Hotel & Restaurant</a></h3>

                                    <span class="location"><i class="bx bx-map"></i> 40 Journal Square, NG USA</span>
                                </div>

                                <div class="listing-box-footer">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="price">
                                            <span data-bs-toggle="tooltip" data-placement="top" title="Ultra Hight">
                                                $1500 - $2000
                                            </span>
                                        </div>

                                        <div class="listing-option-list">
                                            <a href="#" data-bs-toggle="tooltip" data-placement="top" title="Find Directions"><i class='bx bx-directions'></i></a>
                                            <a href="#" data-bs-toggle="tooltip" data-placement="top" title="Save"><i class='bx bx-heart'></i></a>
                                            <a href="#" data-bs-toggle="tooltip" data-placement="top" title="On the Map"><i class='bx bx-map'></i></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="listing-badge">Open!</div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-12 col-md-6">
                            <div class="single-listing-item">
                                <div class="listing-image">
                                    <a href="#" class="d-block"><img src="assets/img/listing/img6.jpg" alt="image"></a>

                                    <div class="listing-tag">
                                        <a href="#" class="d-block">Shopping</a>
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
                                        <img src="assets/img/user2.jpg" class="rounded-circle mr-2" alt="image">
                                        <span>Sarah Taylor</span>
                                    </div>

                                    <h3><a href="#" class="d-inline-block">Skyview Shopping Complex Center</a></h3>

                                    <span class="location"><i class="bx bx-map"></i> 55 County Laois, Ireland</span>
                                </div>

                                <div class="listing-box-footer">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="price">
                                            <span data-bs-toggle="tooltip" data-placement="top" title="Pricey">
                                                $100 - $200
                                            </span>
                                        </div>

                                        <div class="listing-option-list">
                                            <a href="#" data-bs-toggle="tooltip" data-placement="top" title="Find Directions"><i class='bx bx-directions'></i></a>
                                            <a href="#" data-bs-toggle="tooltip" data-placement="top" title="Save"><i class='bx bx-heart'></i></a>
                                            <a href="#" data-bs-toggle="tooltip" data-placement="top" title="On the Map"><i class='bx bx-map'></i></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="listing-badge">Open!</div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>

            <div class="col-lg-4 col-md-12">
                <div class="listing-sidebar-widget">
                    <div class="listing-opening-hours">
                        <h3>Opening Hours</h3>

                        <ul style="text-transform: capitalize;">
                            <?php $openings = json_decode($business['opening_hours'], TRUE); ?>
                            <?php if (isset($openings)) {
                                foreach ($openings as $opening) { ?>

                                    <li><span><?= $opening['key'] ?>:</span><?= $opening['value'] ?></li>
                            <?php }
                            } ?>
                        </ul>
                    </div>

                    <div class="listing-contact-info">
                        <h3>Contact Info</h3>

                        <ul>
                            <li><span>Adress:</span> <a href="#"><?php echo $business['address'] ?></a></li>
                            <li><span>Phone:</span> <a href="tel:+<?php echo $business['mobile_number'] ?>"><?php echo $business['mobile_number'] ?></a></li>
                            <li><span>Email:</span> <a href="emailto:<?php echo $business['email'] ?>"><span><?php echo $business['email'] ?></span></a></li>
                            <li><span>Website:</span> <a href="<?php echo $business['website'] ?>"><?php echo $business['website'] ?></a></li>
                        </ul>
                    </div>

                    <div class="listing-book-table">
                        <h3>Booking</h3>
                        <?php $this->load->view('admin/includes/_messages.php') ?>
                        <?php echo form_open('home/bookings'); ?>
                        <div class="form-group">
                            <label>Name:</label>
                            <input type="text" class="form-control" name="name">
                            <!-- <span class="text-danger"><?php echo form_error('name') ?></span> -->
                        </div>

                        <div class="form-group">
                            <label>Email:</label>
                            <input type="email" class="form-control" name="email">
                        </div>

                        <div class="form-group">
                            <label>Mobile:</label>
                            <input type="number" class="form-control" name="mobile">
                        </div>

                        <div class="form-group">
                            <label>Date:</label>
                            <input type="text" id="datepicker" class="form-control" name="date">
                        </div>
                        <input type="submit" name="submit" value="Book Now!" class="default-btn form-control">
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End listing Details Area -->

<!-- <script src="/path/to/cdn/jquery.slim.min.js"></script> -->
<script src="<?php echo base_url('assets/rating/') ?>rating.js"></script>
<script>
    $('#rating').starRating({
        starIconEmpty: 'far fa-star',
        starIconFull: 'fas fa-star',
        starColorEmpty: 'lightgray',
        starColorFull: '#FFC107',
        starsSize: 4, // em
        stars: 5,
    });
</script>