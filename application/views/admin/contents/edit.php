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
            <a href="<?php echo base_url('admin/contents'); ?>" class="btn btn-success"><i class="fa fa-arrow-left"></i>  <?php echo('contents') ?></a>
          </div>
        </div>
        <div class="card-body">
         
         <!-- For Messages -->
         <?php $this->load->view('admin/includes/_messages.php') ?>

         <?php echo form_open_multipart(base_url('admin/contents/update'), 'class="form-horizontal"');  ?> 

         <div class="form-group">
          <label for="name" class="col-md-2 control-label">Section Name</label>

          <div class="col-md-12">
            <input type="text" name="content_heading" class="form-control" id="name" placeholder="" value="<?php echo $contents['content_heading'] ?>" readonly>
          </div>
        </div>

        <div class="form-group">
          <label for="name" class="col-md-2 control-label">Contents</label>

          <div class="col-md-12">
            <textarea name="content_value" class="form-control" cols="30" rows="10"><?php echo $contents['content_value'] ?></textarea>
          </div>
        </div>


        <div class="form-group">
          <label for="name" class="col-md-2 control-label">Content Image</label>

          <div class="col-md-12">
            <input type="file" name="content_img" class="form-control" id="name" placeholder="">
          </div>
          <img style="height: 200px;" src="<?php echo base_url('uploads/'.$contents['content_img']) ?>" alt="">
          <input type="hidden" name="content_img_text" class="form-control"  value="<?php echo $contents['content_img'] ?>">
        </div>

        <div class="form-group">
          <div class="col-md-12">
            <input type="hidden" name="id" value="<?php echo $contents['id'] ?>">
            <input type="submit" name="submit" value="Update" class="btn btn-primary pull-right">
          </div>
        </div>
        <?php echo form_close( ); ?>
      </div>
      <!-- /.box-body -->
    </div>
  </section> 
</div>
