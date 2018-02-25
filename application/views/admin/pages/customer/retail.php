	

		<div class="content-wrapper">
			<div class="container-fluid">
				<legend><i class="fa fa-th-list"> Retail List</i></legend>
				<hr>
				<div id="editForm"></div>
				<div class="form-group">
					<div class="form-row">
						<div class="col-md-2">
							<input class="form-control" type="text" id="search" placeholder="Product Name..." onkeyup="search()">
						</div>
						<div class="col-md-2">
							
						</div>
					</div>
				</div>
				<div class="form-group">
					<table class="table table-bordered" id="table-system">
						<thead>
							<tr>
								<th>Product Name</th>
								<th>Quantity</th>
								<th>Amount</th>
								<th>Unit Description</th>
							</tr>
						</thead>
						<tbody id="display">
							<?php foreach ($retail as $_k): ?>
								<tr>
									<td><?php echo $_k->productname; ?></td>
									<td><?php echo $_k->quantity; ?></td>
									<td><?php echo $_k->amount; ?></td>
									<td><?php echo $_k->unit_description; ?></td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>