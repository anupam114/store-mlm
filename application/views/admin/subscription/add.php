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
            <a href="<?php echo base_url('admin/business'); ?>" class="btn btn-success"><i class="fa fa-arrow-left"></i>Back</a>
          </div>
        </div>
        <div class="card-body">

          <!-- For Messages -->
          <?php $this->load->view('admin/includes/_messages.php') ?>

          <?php echo form_open_multipart(base_url('admin/subscriptions/save'), 'class="form-horizontal"');  ?>

          <div class="form-group">
            <label for="name" class="col-md-2 control-label">Package Name<span class="text-danger">*</span></label>

            <div class="col-md-12">
              <input type="text" name="package_name" class="form-control" id="name" placeholder="">
            </div>
          </div>

          <div class="form-group">
            <label for="address" class="col-md-2 control-label">Descriptions</label>

            <div class="col-md-12">
              <textarea name="descriptions" class="form-control"></textarea>
            </div>
          </div>

          <div class="form-group">
            <label for="name" class="col-md-2 control-label">Price<span class="text-danger">*</span></label>

            <div class="col-md-12">
              <input type="number" name="price" class="form-control" id="name" placeholder="">
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

<script type="text/javascript">
let i = 1;
$(document).ready(function(){

  $('.ammenities_wrapper .add_button').on('click', function(event){
    event.preventDefault();
    var wrapper = $('.ammenities_wrapper');
    var fieldHTML = '<div><input style="margin: 20px;" type="text" name="ammenities[]" value=""/><a href="javascript:void(0);" class="btn btn-danger remove_button"><i class="fa fa-minus-circle" aria-hidden="true"></i></a></div>';
    $(wrapper).append(fieldHTML);

  });

  $('.ammenities_wrapper').on('click', '.remove_button', function(event){
    event.preventDefault();
    $(this).parent('div').remove();
  });


  $('.opening_wrapper .add_button').on('click', function(event){
    event.preventDefault();
    var wrapper = $('.opening_wrapper');
    var fieldHTML = `<div>Key:<input style="margin: 20px;" type="text" name="opening_hour[${i}][key]" value=""/>&nbsp;Value:<input style="margin: 20px;" type="text" name="opening_hour[${i}][value]" value="" /><a href="javascript:void(0);" class="btn btn-danger remove_button"><i class="fa fa-minus-circle" aria-hidden="true"></i></a></div>`;
    $(wrapper).append(fieldHTML);
    i++;

  });

  $('.opening_wrapper').on('click', '.remove_button', function(event){
    event.preventDefault();
    $(this).parent('div').remove();
    i--;
  });

});

</script>