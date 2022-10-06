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

        <?php echo form_open_multipart(base_url('admin/business/save'), 'class="form-horizontal"');  ?>

        <div class="form-group">
          <label for="name" class="col-md-2 control-label">Business Name</label>

          <div class="col-md-12">
            <input type="text" name="business_name" class="form-control" id="name" placeholder="" value="<?php echo $single_business['business_name']; ?>">
          </div>
        </div>

        <div class="form-group">
          <label for="name" class="col-md-2 control-label">Title</label>

          <div class="col-md-12">
            <input type="text" name="title" class="form-control" id="name" placeholder="" value="<?php echo $single_business['title'] ?>">
          </div>
        </div>

        <div class="form-group">
          <label for="description" class="col-md-2 control-label">Short Description</label>

          <div class="col-md-12">
            <textarea name="short_description" class="form-control"><?php echo $single_business['short_description'] ?></textarea>
          </div>
        </div>

        <div class="form-group">
          <label for="description" class="col-md-2 control-label">Long Description</label>

          <div class="col-md-12">
            <textarea rows="5" col="5" name="long_description" class="form-control editors"><?php echo $single_business['long_description'] ?></textarea>
          </div>
        </div>

        <div class="form-group">
          <label for="description" class="col-md-2 control-label">Ammenities</label>
          <div class="ammenities_wrapper">
            <div>
              <input style="margin: 20px;" type="text" name="ammenities[]" value="" />
              <a href="javascript:void(0);" class="btn btn-primary add_button" title="Add field"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="address" class="col-md-2 control-label">Price</label>

          <div class="col-md-12">
          <input type="text" name="price" class="form-control" id="name" placeholder="" value="<?php echo $single_business['price'] ?>"> 
          </div>
        </div>

        <div class="form-group">
          <label for="description" class="col-md-2 control-label">Image Gallery<span class="text-danger">*</span></label>
          <div class="gallery_wrapper">
            <div>
              <input style="margin: 20px;" type="file" name="gallery[]" value="" class="form-control" multiple accept="image/png, image/jpeg"/>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="description" class="col-md-2 control-label">Opening Hours</label>
          <div class="opening_wrapper">
            <div>
              Key:<input style="margin: 20px;" type="text" name="opening_hour[0][key]" value="" />&nbsp;Value:<input style="margin: 20px;" type="text" name="opening_hour[0][value]" value="" />
              <a href="javascript:void(0);" class="btn btn-primary add_button" title="Add field"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="role" class="col-md-12 control-label">Select Category</label>

          <div class="col-md-12">
            <select name="category_id" class="form-control">
              <option value="0">Select Category</option>
              <?php if (isset($category)) {
                foreach ($category as $cat) { ?>
                  <option value="<?php echo $cat['id'] ?>" <?= ($single_business['category_id'] == $cat['id'])?'selected': '' ?>><?php echo $cat['category_name'] ?></option>
              <?php }
              } ?>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="name" class="col-md-2 control-label">Feature Images<span class="text-danger">*</span></label>

          <div class="col-md-12">
            <input type="file" name="feature_image" class="form-control" id="name" placeholder="">
          </div>
        </div>

        <div class="form-group">
          <label for="address" class="col-md-2 control-label">Address<span class="text-danger">*</span></label>

          <div class="col-md-12">
            <textarea name="address" class="form-control"><?php echo $single_business['address'] ?></textarea>
          </div>
        </div>

        <div class="form-group">
          <label for="address" class="col-md-2 control-label">Mobile No<span class="text-danger">*</span></label>

          <div class="col-md-12">
          <input type="text" name="mobile_number" class="form-control" id="name" placeholder="" value="<?php echo $single_business['mobile_number'] ?>">
          </div>
        </div>

        <div class="form-group">
          <label for="address" class="col-md-2 control-label">Email<span class="text-danger">*</span></label>

          <div class="col-md-12">
          <input type="email" name="email" class="form-control" id="name" placeholder="" value="<?php echo $single_business['email'] ?>">
          </div>
        </div>

        <div class="form-group">
          <label for="address" class="col-md-2 control-label">Website Link</label>

          <div class="col-md-12">
          <input type="text" name="website" class="form-control" id="name" placeholder="" value="<?php echo $single_business['website'] ?>">
          </div>
        </div>

        <div class="form-group">
          <label for="address" class="col-md-2 control-label">Map</label>

          <div class="col-md-12">
            <textarea name="map" class="form-control"><?php echo $single_business['map'] ?></textarea>
          </div>
        </div>

        <div class="form-group">
            <label for="role" class="col-md-12 control-label">Status</label>

            <div class="col-md-12">
              <select name="is_active" class="form-control">
              <option value="1" <?= ($single_business['is_active'] == 1)?'selected': '' ?> >Active</option>
                <option value="0" <?= ($single_business['is_active'] == 0)?'selected': '' ?>>Deactive</option>
              </select>
            </div>
          </div>

        <div class="form-group">
          <input type="checkbox" name="is_propular" id="is_propular" value="1" <?= ($single_business['is_propular'] == 1)?'checked': '' ?>> Mark as Featured
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