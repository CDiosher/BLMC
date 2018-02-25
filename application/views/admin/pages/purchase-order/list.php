	

		<div class="content-wrapper">
			<div class="container-fluid">
				<legend><i class="fa fa-th-list"> Purchase List</i></legend>
				<hr>
				<div id="editForm"></div>
				<div class="form-group">
					<div class="form-row">
						<div class="col-md-2">
							<input class="form-control" type="text" id="search" placeholder="Product Name..." onkeyup="search()">
						</div>
						<div class="col-md-8">
							<button class="btn btn-success" id="retail"><i class="fa fa-plus"> Retail</i></button>
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
								<th>Expected Delivery Date</th>
								<th>Date of Payment</th>
								<th>Date Delivered</th>
								<th>Remarks</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody id="display">
							<?php foreach ($getRecieved as $_k): ?>
								<?php if($_k->recieved != NULL): ?>
									<?php
										if($_k->inactive == 0) {
											$thumbs = '&nbsp;&nbsp;<a href="'.base_url('sell/').$_k->id.'"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>';
										} else {
											$thumbs = '&nbsp;&nbsp;<a href="'.base_url('not-sell/').$_k->id.'"><i class="fa fa-product-hunt" aria-hidden="true"></i></a>';
										}
									?>
								<?php else: ?>
									<?php
										$thumbs = '&nbsp;&nbsp;<a href="'.base_url('recieved/').$_k->id.'"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>';
									?>
								<?php endif; ?>
								<tr>
									<td><?php echo $_k->productname; ?></td>
									<td><?php echo $_k->quantity; ?></td>
									<td><?php echo $_k->amount; ?></td>
									<td><?php echo $_k->supplier; ?></td>
									<td><?php echo $_k->vendor_address; ?></td>
									<td><?php echo date('M d, Y',strtotime($_k->date_delivered)); ?></td>
									<td><?php echo date('M d, Y',strtotime($_k->date_payment)); ?></td>
									<td><?php if($_k->recieved == NULL){ echo '';}else{echo date('M d, Y | h:i:s',strtotime($_k->recieved));} ?></td>
									<td><?php if($_k->defective == 0){echo 'Good';}else{echo 'Defective';} ?></td>
									<td><a href="#" id="editProduct" data-id="<?php echo $_k->id; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a><?php echo $thumbs; ?>&nbsp;&nbsp;<a href="<?php echo base_url('remove/').$_k->id; ?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>