			<div class="modal fade" id="items" tabindex="-1" role="dialog" aria-labelledby="Items" aria-hidden="true">
				<div class="modal-dialog" style="margin-top:10%;">
					<div class="modal-content">
						<div class="modal-body">
							<form method="post" action="<?php echo base_url(); ?>create-products" enctype="multipart/form-data">
								<div class="form-group">
									<div class="form-row">
										<div class="col-md-6">
											<input type="text" name="productCode" id="productCode" placeholder="Product Code" class="form-control">
										</div>
										<div class="col-md-4">
											<input type="text" name="productName" id="productName" placeholder="Product Name" class="form-control">
										</div>
										<div class="col-md-2">
											<input type="submit" name="submit" value="Add" class="btn btn-success">
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

			<!-- Update Form -->
			<?php foreach ($list as $val): ?>
			<div class="modal fade" id="edit<?php echo $val->id; ?>" tabindex="-1" role="dialog" aria-labelledby="Items" aria-hidden="true">
				<div class="modal-dialog" style="margin-top:10%;">
					<div class="modal-content">
						<div class="modal-body">
							<form method="post" action="<?php echo base_url('update-products/'.$val->id); ?>" enctype="multipart/form-data">
								<div class="form-group">
									<div class="form-row">
										<div class="col-md-6">
											<input type="text" name="productCode" id="productCode" value="<?php echo $val->productcode; ?>" class="form-control">
										</div>
										<div class="col-md-4">
											<input type="text" name="productName" id="productName" value="<?php echo $val->productname; ?>" class="form-control">
										</div>
										<div class="col-md-2">
											<input type="submit" name="submit" value="Update" class="btn btn-info">
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<?php endforeach; ?>