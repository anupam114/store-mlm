  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default">
        <div class="card-header">
          <div class="d-inline-block">
            <h3 class="card-title">
             <?php echo $title; ?> </h3>
           </div>
           <div class="d-inline-block float-right">
            <a href="<?php echo base_url('admin/cms'); ?>" class="btn btn-success"><i class="fa fa-arrow-left"></i>  <?php echo('Back') ?></a>
          </div>
        </div>
        <div class="card-body">
         
         <!-- For Messages -->
         <?php $this->load->view('admin/includes/_messages.php') ?>

         <?php echo form_open_multipart(base_url('admin/cms/update'), 'class="form-horizontal"');  ?> 

         <div class="form-group">
          <label for="name" class="col-md-2 control-label">Page Name</label>

          <div class="col-md-12">
            <input type="text" name="page_name" class="form-control" id="name" placeholder="" value="<?php echo $cms['page_name'] ?>" readonly>
          </div>
        </div>

        <div class="form-group">
          <label for="name" class="col-md-2 control-label">Page Content</label>
          <div class="col-md-12">
            <textarea name="page_content" class="form-control summernote"><?php echo $cms['page_content'] ?></textarea>
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-12">
            <input type="hidden" name="id" value="<?php echo $cms['id'] ?>">
            <input type="hidden" name="page_key" value="<?php echo $cms['page_key'] ?>">
            <input type="submit" name="submit" value="Update" class="btn btn-primary pull-right">
          </div>
        </div>
        <?php echo form_close( ); ?>
      </div>
      <!-- /.box-body -->
    </div>
  </section> 
</div>
