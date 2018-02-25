			<div id="payment-checkout" class="modal fade" role="dialog">
				<div class="modal-dialog modal-sm" role="document">
					<div class="modal-content" id="pcheck">
						<div class="modal-header">
							<h4 class="modal-title text-info">Payment</h4>
						</div>
						<div class="modal-body">
							<label for="Total Amount">Total Amount:</label>
							<input type="text" id="amount-check" readonly class="form-control">
							<label for="Payment">Cash:</label>
							<input type="text" name="payCheck[]" id="payCheck" class="form-control">
							<label for="Change">Change:</label>
							<input type="text" id="change-check" class="form-control" readonly>
						</div>
						<div class="modal-footer">
							<input type="submit" class="btn btn-success" id="checkout" data-toggle="modal" data-target="#ransaction-complete" name="submit" value="Checkout" disabled="disabled">
						</div>
					</div>
				</div>
			</div>

			<div id="loading" class="modal fade in" role="dialog">
				<div class="modal-dialog modal-sm">
					<div class="modal-body">
						<img src="<?php echo base_url('uploads/loading/loading.gif'); ?>" id="loading">
					</div>
				</div>
			</div>