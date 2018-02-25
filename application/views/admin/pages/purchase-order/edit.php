	

		<div class="content-wrapper">
			<div class="container-fluid">
				<legend><i class="fa fa-th-list"> Purchase List</i></legend>
				<hr>
				<div class="col-md-6">
					<div class="form-group">
						<div class="form-row">
							<div class="col-md-8">
								<a href="<?php echo base_url('purchase-list'); ?>" class="btn btn-info"><i class="fa fa-arrow-left">  Back</i></a>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<form method="post" action="<?php echo base_url('purchase-list/update/'.$products['id']); ?>">
						<div class="col-md-4">
							<div class="form-group">
								<div class="form-row">
									<div class="col-md-6">
										<?php echo form_dropdown('productName', productname(), (isset($products['product_name'])) ? $products['product_name'] : '', 'class="form-control"'); ?>
									</div>
									<div class="col-md-6">
										<?php echo form_dropdown('quantity', quantity(), (isset($products['quantity'])) ? $products['quantity'] : '', 'class="form-control"'); ?>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="form-row">
									<div class="col-md-6">
										<input type="text" name="amount" id="price" value="<?php echo $products['amount']; ?>" class="form-control">
									</div>
									<div class="col-md-6">
										<input type="text" name="supplier" id="supplier" value="<?php echo $products['supplier']; ?>" class="form-control">
									</div>
								</div>
							</div>
							<div class="form-group">
										<input type="text" name="supp_address" id="supp_address" value="<?php echo $products['vendor_address']; ?>" class="form-control">
							</div>
							<div class="form-group">
								<div class="form-row">
									<div class="col-md-6">
										<input type="text" name="date_payment" id="payment" value="<?php echo date('m/d/Y', strtotime($products['date_payment'])); ?>" class="form-control">
									</div>
									<div class="col-md-6">
										<input type="text" name="date_delivered" id="delivered" value="<?php echo date('m/d/Y', strtotime($products['date_payment'])); ?>" class="form-control">
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button class="btn btn-info btn-block">Update</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>