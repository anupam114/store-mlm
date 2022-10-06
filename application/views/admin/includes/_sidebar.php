<?php
$cur_tab = $this->uri->segment(2) == '' ? 'dashboard' : $this->uri->segment(2);
$userdata = $this->session->userdata();
// dd($userdata);
?>


<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="<?= base_url('admin'); ?>" class="brand-link">
		<img src="<?= base_url($this->general_settings['favicon']); ?>" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light"><?= $this->general_settings['application_name']; ?></span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="<?= base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="<?= base_url('admin'); ?>" class="d-block"><?= ucwords($userdata['username']); ?></a>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->


				<li id="profile" class="nav-item has-treeview has-treeview">

					<a href="#" class="nav-link">
						<i class="nav-icon fa fa-user"></i>
						<p>
							Profile <i class="right fa fa-angle-left"></i> </p>
					</a>

					<!-- sub-menu -->
					<ul class="nav nav-treeview">


						<li class="nav-item">
							<a href="<?php echo base_url('admin/profile'); ?>" class="nav-link">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>View Profile</p>
							</a>
						</li>


						<li class="nav-item">
							<a href="<?php echo base_url('admin/profile/change_pwd'); ?>" class="nav-link">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>Change Password</p>
							</a>
						</li>


					</ul>
					<!-- /sub-menu -->
				</li>

				<li class="nav-item ">
					<a href="<?php echo base_url() ?>admin/category" class="nav-link">
					<i class="nav-icon fa fa-slideshare"></i>
						<p>Category</p>
					</a>
				</li>

				<li class="nav-item ">
					<a href="<?php echo base_url() ?>admin/subcategory" class="nav-link">
					<i class="nav-icon fa fa-slideshare"></i>
						<p>Sub Category</p>
					</a>
				</li>

				<li class="nav-item ">
					<a href="<?php echo base_url() ?>admin/business" class="nav-link">
					<i class="nav-icon fa fa-briefcase"></i>
						<p>Business</p>
					</a>
				</li>

				<li class="nav-item ">
					<a href="<?php echo base_url() ?>admin/testimonials" class="nav-link">
					<i class="nav-icon fa fa-commenting"></i>
						<p>Testimonials</p>
					</a>
				</li>

				<li class="nav-item ">
					<a href="<?php echo base_url() ?>admin/cms" class="nav-link">
					<i class="nav-icon fa fa-file"></i>
						<p>CMS Pages</p>
					</a>
				</li>

				<li class="nav-item ">
					<a href="<?php echo base_url() ?>admin/contents" class="nav-link">
					<i class="nav-icon fa fa-file"></i>
						<p>Static Contents</p>
					</a>
				</li>

				<li class="nav-item ">
					<a href="<?php echo base_url() ?>/admin/subscriptions" class="nav-link">
					<i class="nav-icon fa fa-cog"></i>
						<p>Subscriptions</p>
					</a>
				</li>


				<li class="nav-item ">
					<a href="<?php echo base_url() ?>/admin/general_settings" class="nav-link">
					<i class="nav-icon fa fa-cog"></i>
						<p>General Settings</p>
					</a>
				</li>

				
				<li class="nav-item ">
					<a href="<?= base_url('admin/auth/logout') ?>" class="nav-link">
					<i class="nav-icon fa fa-power-off"></i>
						<p>Logout</p>
					</a>
				</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>

<script>
	$("#<?= $cur_tab ?>").addClass('menu-open');
	$("#<?= $cur_tab ?> > a").addClass('active');
</script>
