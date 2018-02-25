		<footer class="sticky-footer">
			<div class="container">
				<div class="text-center">
					<small>Copyright © BLMC <?php echo date('Y'); ?></small>
				</div>
			</div>
		</footer>
		<?php $this->load->view('admin/modal/profile'); ?>
		<?php $this->load->view('admin/modal/user'); ?>
		<?php $this->load->view('admin/modal/alert-message'); ?>
		<script src="<?php echo base_url('Assets/'); ?>vendor/jquery/jquery.min.js"></script>
		<script src="<?php echo base_url('Assets/'); ?>js/jquery-1.12.4.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
		<script src="<?php echo base_url('Assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

		<!-- Money Masking -->
		<script src="<?php echo base_url('Assets/'); ?>js/jquery.mask.min.js"></script>
		<script src="<?php echo base_url('Assets/'); ?>js/jquery.maskMoney.js"></script>
		<!-- Date Picker -->
		<script src="<?php echo base_url('Assets/'); ?>js/bootstrap-datepicker.min.js"></script>
		<?php $this->load->view('admin/modal/alert-message'); ?>

		<?php $this->load->view('admin/includes/jsfile'); ?>
		<script type="text/javascript">
			function search() {
				search_products();
			}
		</script>
	</body>
</html>