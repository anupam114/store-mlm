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
            <a href="<?php echo base_url('admin/testimonials'); ?>" class="btn btn-success"><i class="fa fa-arrow-left" aria-hidden="true"></i><?php echo('Back') ?></a>
          </div>
        </div>
        <div class="card-body">
         
         <!-- For Messages -->
         <?php $this->load->view('admin/includes/_messages.php') ?>

         <?php echo form_open_multipart(base_url('admin/testimonials/save'), 'class="form-horizontal"');  ?> 

         <div class="form-group">
          <label for="name" class="col-md-2 control-label">Customer Name</label>
          <div class="col-md-12">
            <input type="text" name="name" class="form-control" placeholder="">
          </div>
        </div>

        <div class="form-group">
          <label for="name" class="col-md-2 control-label">Image</label>
          <div class="col-md-12">
            <input type="file" name="image" class="form-control" placeholder="">
          </div>
        </div>

        <div class="form-group">
          <label for="name" class="col-md-2 control-label">location</label>
          <div class="col-md-12">
            <input type="text" name="location" class="form-control" placeholder="">
          </div>
        </div>

        <div class="form-group">
          <label for="name" class="col-md-2 control-label">Comments</label>
          <div class="col-md-12">
            <textarea name="comments" id="" cols="30" rows="10" class="form-control"></textarea>
          </div>
        </div>

        <div class="form-group">
          <label for="role" class="col-md-12 control-label">Status</label>

          <div class="col-md-12">
            <select name="is_active" class="form-control">
                <option value="1">Active</option>
								<option value="0">De-Active</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-12">
            <input type="submit" name="submit" value="ADD" class="btn btn-primary pull-right">
          </div>
        </div>
        <?php echo form_close( ); ?>
      </div>
      <!-- /.box-body -->
    </div>
  </section> 
</div>
