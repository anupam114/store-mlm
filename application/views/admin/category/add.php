  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper container">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default">
        <div class="card-header">
          <div class="d-inline-block">
            <h3 class="card-title">
              <?php echo $title; ?> </h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="<?php echo base_url('admin/category'); ?>" class="btn btn-success"><i class="fa fa-arrow-left"></i> <?php echo ('category') ?></a>
          </div>
        </div>
        <div class="card-body">

          <!-- For Messages -->
          <?php $this->load->view('admin/includes/_messages.php') ?>

          <?php echo form_open_multipart(base_url('admin/category/save'), 'class="form-horizontal"');  ?>

          <div class="form-group">
            <label for="name" class="col-md-2 control-label">Category Name</label>

            <div class="col-md-12">
              <input type="text" name="category_name" class="form-control" id="name" placeholder="" required>
            </div>
          </div>

          <div class="form-group">
            <label for="name" class="col-md-2 control-label">Category Image</label>

            <div class="col-md-12">
              <input type="file" name="category_image" class="form-control" id="name" placeholder="">
            </div>
          </div>

          <div class="form-group">
            <label for="file_upload" class="col-md-2 control-label">Category Icon</label>

            <div class="col-md-12">
              <Label for="file_upload" class="file-upload-label">
                <span class="btn btn-secondary">Chose File</span>
                <span class="file-text">No file chosen</span>
              </Label>
              <input type="file" name="category_image_icon" class="form-control form-file" id="file_upload" placeholder="">
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
          <?php echo form_close(); ?>
        </div>
        <!-- /.box-body -->
      </div>
    </section>
  </div>