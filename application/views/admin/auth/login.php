<div class="form-background">
  <div class="login-box">
    <div class="login-logo">
    <img class="img-fluid" src="<?php echo base_url($this->general_settings['logo']) ?>" alt="logo">
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <h4 class="login-box-msg">Admin Login</h4>

        <?php $this->load->view('admin/includes/_messages.php') ?>
        
        <?php echo form_open(base_url('admin/auth/login'), 'class="login-form" '); ?>
          <div class="form-group has-feedback">
            <input type="text" name="username" id="name" class="form-control" placeholder="<?= trans('username') ?>" >
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" id="password" class="form-control" placeholder="<?= trans('password') ?>" >
          </div>
          <div class="row">
            <div class="col-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> <?= trans('remember_me') ?>
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <input type="submit" name="submit" id="submit" class="btn btn-primary btn-block btn-flat" value="<?= trans('signin') ?>">
            </div>
            <!-- /.col -->
          </div>
        <?php echo form_close(); ?>

        <p class="mb-1">
          <a href="<?= base_url('admin/auth/forgot_password'); ?>"><?= trans('i_forgot_my_password') ?></a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->
</div>
          