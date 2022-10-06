  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default">
        <div class="card-header">
          <div class="d-inline-block">
            <h3 class="card-title"> <i class="fa fa-plus"></i>
             <?php echo $title; ?> </h3>
           </div>
           <div class="d-inline-block float-right">
            <a href="<?php echo base_url('admin/category'); ?>" class="btn btn-success"><i class="fa fa-arrow-left"></i>  <?php echo('category') ?></a>
          </div>
        </div>
        <div class="card-body">
         
         <!-- For Messages -->
         <?php $this->load->view('admin/includes/_messages.php') ?>

         <?php echo form_open_multipart(base_url('admin/category/update'), 'class="form-horizontal"');  ?> 

         <div class="form-group">
          <label for="name" class="col-md-2 control-label">Category Name</label>

          <div class="col-md-12">
            <input type="text" name="category_name" class="form-control" id="name" placeholder="" value="<?php echo $single_category['category_name'] ?>" required>
          </div>
        </div>

        <div class="form-group">
          <label for="name" class="col-md-2 control-label">Category Image</label>

          <div class="col-md-12">
            <input type="file" name="category_image" class="form-control" id="name" placeholder="">
          </div>
          <img style="height: 200px;" src="<?php echo base_url('uploads/'.$single_category['category_image']) ?>" alt="">
          <input type="hidden" name="category_image_text" class="form-control"  value="<?php echo $single_category['category_image'] ?>">
        </div>

        <div class="form-group">
          <label for="name" class="col-md-2 control-label">Category Icon</label>

          <div class="col-md-12">
            <input type="file" name="category_image_icon" class="form-control" id="name" placeholder="">
          </div>
          <img style="height: 200px; background: black" src="<?php echo base_url('uploads/'.$single_category['category_image_icon']) ?>" alt="">
          <input type="hidden" name="category_image_icon_text" class="form-control"  value="<?php echo $single_category['category_image_icon'] ?>">
        </div>

        <div class="form-group">
          <div class="col-md-12">
            <input type="hidden" name="id" value="<?php echo $single_category['id'] ?>">
            <input type="submit" name="submit" value="Update" class="btn btn-primary pull-right">
          </div>
        </div>
        <?php echo form_close( ); ?>
      </div>
      <!-- /.box-body -->
    </div>
  </section> 
</div>
