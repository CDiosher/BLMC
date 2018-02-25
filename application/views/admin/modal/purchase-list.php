			<div class="modal fade" id="edit<?php echo $products['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="Items" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Purchase List</h5>
							<button class="close" type="button" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
						</div>
						<div class="modal-body">
							<form method="post" action="<?php echo base_url('purchase-list/update/'.$key->id); ?>">
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
											<input type="text" name="supplierss" id="supplier" value="<?php echo $products['supplier']; ?>" class="form-control">
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
							</form>
						</div>
					</div>
				</div>
			</div>