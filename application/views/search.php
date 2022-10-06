        
        <!-- Start Page Title Area -->
        <div class="page-title-area page-title-bg2">
            <div class="container">
                <div class="page-title-content">
                    <h2>Search</h2>
                </div>
            </div>
        </div>
        <!-- End Page Title Area -->
        
        <!-- Start Latest Listing Area -->
        <section class="listing-area ptb-100">
            <div class="container">
            <p>Searching For : <?php echo $search_param; ?></p>
                <div class="row">
                    <div class="col-lg-9 col-md-12">
                        <div class="listing-filter-options">
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-sm-12 col-md-4">
                            <?php if(isset($contents)) { foreach($contents as $business){ ?>
                                <div class="single-listing-item">
                                    <div class="listing-image">
                                        <a href="<?php echo base_url('listing/'.$business['slug']) ?>" class="d-block"><img src="<?php echo base_url('uploads/'.$business['feature_image']) ?>" alt="image"></a>
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
        
                                        <h3><?php echo $business['business_name'] ?></h3>
        
                                        <span class="location"><i class="bx bx-map"></i> <?php echo $business['address'] ?></span>
                                    </div>
        
                                    <div class="listing-box-footer contact_seller">
                                    <a href="<?php echo base_url('listing/'.$business['slug']) ?>">Get Details</a>
                                    </div>
                                </div>
                                <?php } }
                                 else { echo '<div><h5>No Listing Found</h5></div>'; 
                                 } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Latest Listing Area -->