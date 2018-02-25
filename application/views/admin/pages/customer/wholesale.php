	

		<div class="content-wrapper">
			<div class="container-fluid">
				<legend><i class="fa fa-th-list"> Wholesale List</i></legend>
				<hr>
				<div class="form-group">
					<div class="form-row">
						<div class="col-md-2">
							<input class="form-control" type="text" id="search" placeholder="Product Name..." onkeyup="search()">
						</div>
						<div class="col-md-8">
							
						</div>
						<div class="col-md-2">
							
						</div>
					</div>
				</div>
				<?php echo $this->session->flashdata('msg'); ?>
				<div class="form-group">
					<table class="table table-bordered" id="table-system">
						<thead>
							<tr>
								<th>Product Name</th>
								<th>Quantity</th>
								<th>Amount</th>
								<th>Supplier</th>
								<th>Supplier Address</th>
							</tr>
						</thead>
						<tbody id="display">
							<?php foreach ($getRecieved as $_k): ?>
								<tr>
									<td><?php echo $_k->productname; ?></td>
									<td><?php echo $_k->quantity; ?></td>
									<td><?php echo $_k->amount; ?></td>
									<td><?php echo $_k->supplier; ?></td>
									<td><?php echo $_k->vendor_address; ?></td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>