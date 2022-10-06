<!-- Start Latest Listing Area -->
<section class="listing-area ptb-100">
  <div class="container">
    <div class="col-12">
      <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">

        <?php if (isset($subscription)) {
          foreach ($subscription as $subsc) { ?>

            <div class="col">
              <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                  <h4 class="my-0 fw-normal"><?php echo $subsc['package_name'] ?></h4>
                </div>
                <div class="card-body">
                  <h1 class="card-title pricing-card-title">$<?php echo $subsc['price'] ?><small class="text-muted fw-light">/mo</small></h1>
                  <p>(Billed Anually)</p>
                  <p><?php echo $subsc['descriptions'] ?></p>
                  <a href="<?php echo base_url('home/subscribe/' . $subsc['id']) ?>" class="w-100 btn btn-lg btn-primary">Get started</a>
                </div>
              </div>
            </div>

        <?php }
        } ?>

      </div>
    </div>
  </div>
</section>
<!-- End Latest Listing Area -->