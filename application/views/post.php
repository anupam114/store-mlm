<!-- Start Latest Listing Area -->
<section class="listing-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12">


                <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Add your Ads Here</h3>
                <?php echo form_open('submit-add') ?>
                <div class="row">
                    <div class="col-md-6 mb-4">

                        <div class="form-outline">
                            <label class="form-label">Add Title</label>
                            <input type="text" class="form-control form-control-lg" placeholder="Your Add Title" name="title" />
                        </div>

                    </div>
                    <div class="col-md-6 mb-4">

                        <div class="form-outline">
                            <label class="form-label">Business Name</label>
                            <input type="text" class="form-control form-control-lg" placeholder="Enter Your Business Name" name="business_name" />
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="form-outline">
                            <label class="form-label">Description</label>
                            <textarea class="form-control form-control-lg editor" name="description"></textarea>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <label class="form-label">Image</label>
                    <input type="file" class="form-control form-control-lg" />
                </div>

                <div class="row">
                    <div class="col-md-6 mb-4 pb-2">

                        <label class="form-label">Select Category</label>

                        <select class="select form-control-lg" name="category_id">
                            <option value="0">Choose option</option>
                            <?php if (isset($category)) {
                                foreach ($category as $cat) { ?>
                                    <option value="<?php echo $cat['id'] ?>"><?php echo $cat['category_name'] ?></option>
                            <?php }
                            } ?>
                        </select>
                    </div>
                    <!-- <div class="col-md-6 mb-4 pb-2">

                            <label class="form-label">Select sub Category</label>

                            <select class="select form-control-lg">
                                <option value="1" disabled>Choose option</option>
                                <option value="2">Subject 1</option>
                                <option value="3">Subject 2</option>
                                <option value="4">Subject 3</option>
                            </select>

                        </div> -->
                </div>

                <div class="row">
                    <div class="col-md-6 mb-4 pb-2">
                        <div class="form-outline">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control form-control-lg" placeholder="Enter Your Business Email" name="email" />
                        </div>
                    </div>
                    <div class="col-md-6 mb-4 pb-2">
                        <div class="form-outline">
                            <label class="form-label">Mobile Number</label>
                            <input type="number" class="form-control form-control-lg" placeholder="Enter Your Business Mobile Number" name="mobile" />
                        </div>
                    </div>
                </div>

                <div class="mt-4 pt-2">
                    <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
                </div>

                <?php echo form_close() ?>
            </div>
        </div>
    </div>

</section>
<!-- End Latest Listing Area -->
<script>
    $(document).ready(function() {
        $('.editor').summernote();
    });
</script>