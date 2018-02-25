	

		<div class="content-wrapper">
			<div class="container-fluid">
				<legend><i class="fa fa-list-ul"> Purchase Order</i></legend>
				<hr>
				<form method="post" action="" enctype="multipart/form-data" id="submitForm">
					<div class="form-group">
						<div class="form-row">
							<div class="col-md-3">
								<?php echo form_dropdown('productName', productname(), set_value('productName'), 'class="form-control"'); ?>
							</div>
							<div class="col-md-2">
								<?php echo form_dropdown('quantity', quantity(), set_value('quantity'), 'class="form-control"'); ?>
							</div>
							<div class="col-md-2">
								<input type="text" name="amount" class="form-control" placeholder="Amount" id="price">
							</div>
							<div class="col-md-2">
								<input type="text" name="supplier" class="form-control" placeholder="Supplier">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="form-row">
							
							<div class="col-md-3">
								<input type="text" id="address" name="supp_address" class="form-control" placeholder="Supplier Address">
							</div>
							
							<div class="col-md-2">
								<input type="text" name="date_payment" id="payment" class="form-control" placeholder="Date of Payment">
							</div>
							<div class="col-md-2">
								<input type="text" name="date_delivered" id="delivered" class="form-control" placeholder="Date of Delivery">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="form-row">
							<div class="col-md-4">
								<button class="btn btn-success"><i class="fa fa-first-order" aria-hidden="true"> Order</i></button>
							</div>
						</div>
					</div>
				</form>
				<hr>
				<div class="form-group">
					<table class="table table-bordered" id="table-system">
						<thead>
							<tr>
								<th>Product Name</th>
								<th>Quantity</th>
								<th>Amount</th>
								<th>Supplier</th>
								<th>Supplier Address</th>
								<th>Expected Delivered Date</th>
								<th>Date of Payment</th>
								<th>Date Processed</th>
								<th>Processed By</th>
							</tr>
						</thead>
						<tbody id="display">
							
						</tbody>
					</table>
				</div>
			</div>
		</div>