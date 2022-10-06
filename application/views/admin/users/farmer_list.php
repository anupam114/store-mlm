<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<section class="content">
		<!-- For Messages -->
		<?php $this->load->view('admin/includes/_messages.php') ?>
		<div class="card">
			<div class="card-header">
				<div class="d-inline-block">
					<h3 class="card-title"><i class="fa fa-list"></i>&nbsp; <?php echo $title; ?></h3>
				</div>

			</div>
		</div>
		<div class="card">
			<div class="card-body table-responsive">
				<table id="na_datatable" class="table table-bordered table-striped" width="100%">
					<thead>
						<tr>
							<th>#<?php echo ('id') ?></th>
							<th><?php echo ('name') ?></th>
							<th><?php echo ('username') ?></th>
							<th><?php echo ('email') ?></th>
							<th><?php echo ('Markerter Name') ?></th>
							<th><?php echo ('Wallet Balance') ?></th>
							<th><?php echo ('status') ?></th>
							<th width="100" class="text-right"><?php echo ('action') ?></th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</section>
</div>


<!-- DataTables -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>


<script>
	$(document).ready(function() {
		$('#na_datatable').DataTable({
			dom: 'lBfrtip',
			buttons: [
				'copy', 'csv', 'excel', 'pdf', 'print'
			],
			// Processing indicator
			"processing": true,
			// DataTables server-side processing mode
			"serverSide": false,
			// Initial no order.
			"order": [],
			// Load data from an Ajax source
			"ajax": {
				"url": "<?php echo base_url('admin/users/farmer_datatable_json/'); ?>",
				"type": "GET"
			},
			//Set column definition initialisation properties
			"columnDefs": [{
				"targets": [0],
				"orderable": false
			}]
		});
	});
</script>

<script type="text/javascript">
	$("body").on("change", ".tgl_checkbox", function() {
		console.log('checked');
		$.post('<?= base_url("admin/product/change_status") ?>', {
				'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
				id: $(this).data('id'),
				status: $(this).is(':checked') == true ? 1 : 0
			},
			function(data) {
				$.notify("Status Changed Successfully", "success");
			});
	});
</script>
