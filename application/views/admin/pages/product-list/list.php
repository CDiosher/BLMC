		<div class="content-wrapper">
			<div class="container-fluid">
				<legend><i class="fa fa-list-alt"> Product List</i></legend>
				<hr>
				<div class="form-group">
					<div class="form-row">
						<div class="col-md-2">
							<input class="form-control" type="text" id="search" placeholder="Product Code..." onkeyup="search()">
						</div>
						<div class="col-md-8">
							<button class="btn btn-success" data-toggle="modal" data-target="#items"><i class="fa fa-plus"> Add Product</i></button>
						</div>
						<div class="col-md-2">
							
						</div>
					</div>
				</div>
				<div class="table-responsive">
					<table id="table-system" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>Product Code</th>
								<th>Product Name</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($list as $val): ?>
								<tr>
									<td><?php echo $val->productcode; ?></td>
									<td><?php echo $val->productname; ?></td>
									<td><a href="#" data-toggle="modal" data-target="#edit<?php echo $val->id; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> &nbsp;&nbsp;<!-- <a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a> --></td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>