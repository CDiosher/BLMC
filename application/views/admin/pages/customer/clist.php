	

		<div class="content-wrapper">
			<div class="container-fluid">
				<legend><i class="fa fa-th-list"> Customer List</i></legend>
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
								<th>Customer Name</th>
								<th>Address</th>
								<th>Date of Birth</th>
								<th>Processed By</th>
								<th>Date Created</th>
							</tr>
						</thead>
						<tbody id="display">
							<?php foreach ($cutomerList as $_k): ?>
								<tr>
									<td><?php echo $_k->full_name; ?></td>
									<td><?php echo $_k->address; ?></td>
									<td><?php echo $_k->dob; ?></td>
									<td><?php echo $_k->processed_by; ?></td>
									<td><?php echo $_k->date_created; ?></td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>