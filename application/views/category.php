        
        <!-- Start Page Title Area -->
        <div class="page-title-area page-title-bg2" style="background-image: url(<?php echo base_url('uploads/'.$category['category_image']) ?>);">
            <div class="container">
                <div class="page-title-content">
                    <h2><?php echo $category['category_name'] ?></h2>
                   <input id="catId" type='hidden' name="cat_id" value="<?php echo $category['id'] ?>">
                </div>
            </div>
        </div>
        <!-- End Page Title Area -->
        
        <!-- Start Latest Listing Area -->
        <section class="listing-area ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-12">
                        <div class="widget-area mb-3">
                            <section class="widget widget_search">
                                <form class="search-form">
                                    <label>
                                        <span class="screen-reader-text">Search for:</span>
                                        <input type="search" name="search_param" class="search-field" placeholder="Search..." required>
                                    </label>
                                    <button type="submit"><i class="bx bx-search-alt"></i></button>
                                </form>
                            </section>
                        </div>
                        <div class="listing-widget-area">
                            <div class="listing-widget facilities-list-widget">
                                <h3 class="listing-widget-title"><?php echo $category['category_name'] ?></h3>
                                <form>
                                <ul class="facilities-list-row">
                                <?php if(isset($subcategory)) { foreach($subcategory as $subcat){ ?>
                                    <li>
                                     <input type="checkbox" name="subcat[]" value="<?php echo $subcat['id']; ?>"> <?php echo $subcat['subcat_name'] ?>
                                    </li>
                                <?php }} ?>
                                </ul>
                                </form>
                            </div>
                            <!-- <div class="listing-widget categories-list-widget">
                                <h3 class="listing-widget-title">Categories</h3>

                                <ul class="categories-list-row">
                                <?php if(isset($all_category)) { foreach($all_category as $cat){ ?>
                                    <li>
                                      <label><input type="checkbox" name="categories" value="<?php $cat['id'] ?>"><?php echo ' '. $cat['category_name']; ?></label>
                                    </li>
                                <?php } } ?>
                                </ul>
                            </div> -->
                        </div>
                    </div>

                    <div class="col-lg-9 col-md-12">
                        <div class="listing-filter-options">
                            <div class="row align-items-center">
                                <div class="col-lg-7">
                                    <p>Showing 1 – 18 of 100</p>
                                </div>

                                <div class="col-lg-5">
                                    <div class="listing-ordering-list">
                                        <select>
                                            <option>Sort by Price: Low to High</option>
                                            <option>Default Sorting</option>
                                            <option>Sort by Popularity</option>
                                            <option>Sort by Average Rating</option>
                                            <option>Sort by Latest</option>
                                            <option>Sort by Price: High to Low</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row" id="display-card">

                        <?php if(isset($all_business)) { foreach($all_business as $business){ ?>
                            <div class="col-lg-4 col-sm-12 col-md-4">
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
                                        <h3><?php echo '$'.$business['price'] ?></h3>
                                        <span class="location"><i class="bx bx-map"></i> <?php echo $business['address'] ?></span>
                                    </div>
        
                                    <div class="listing-box-footer contact_seller">
                                    <a href="<?php echo base_url('listing/'.$business['slug']) ?>">Get Details</a>
                                    </div>
                                </div>
                            </div>
                        <?php } } else { echo '<p>No Listing Found</p>'; } ?>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                                <div class="pagination-area text-center">
                                    <a href="#" class="prev page-numbers"><i class="bx bx-chevron-left"></i></a>
                                    <span class="page-numbers current" aria-current="page">1</span>
                                    <a href="#" class="page-numbers">2</a>
                                    <a href="#" class="page-numbers">3</a>
                                    <a href="#" class="page-numbers">4</a>
                                    <a href="#" class="page-numbers">5</a>
                                    <a href="#" class="next page-numbers"><i class="bx bx-chevron-right"></i></a>
                                </div>
                            </div>
                </div>
            </div>
        </section>
        <!-- End Latest Listing Area -->

<style>
#loading {
    text-align: center;
    background: url('<?php echo base_url(); ?>assets/front/loader.gif') no-repeat center;
    height: 150px;
}
</style>

<script>

    function getFilterValues(category_id, search_param = ''){
        $('#display-card').html('<div id="loading" style="" ></div>');
        $.ajax
            ({
            type: "GET",
            url: "<?php echo base_url('home/ajax_business_listing') ?>",
            data: {category:category_id, search:search_param},
            success: function(response)
            {
                console.log(response);
                $('#display-card').html(response);
            }
        });
    }

    // function get_filter()
    // {
    //     var filter = [];
    //     $("input[name='subcat']").each(function(){
    //         filter.push($(this).val());
    //     });
    //     // return filter;
    //     console.log(filter);
    // }


    $(document).ready(function(){
        var catId = <?php echo $category['id'] ?>;
        // var subcategory = get_filter();
        // console.log(subcategory);
        $('.search-form').on('submit', function(e){
            e.preventDefault();
            var searchParam = $('.search-field').val();
            getFilterValues(catId, searchParam);
        });       
        
    });
</script>