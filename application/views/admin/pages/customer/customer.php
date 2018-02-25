	

		<div class="content-wrapper">
			<div class="container-fluid">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="<?php echo base_url('dashboard'); ?>">Dashboard</a>
					</li>
					<li class="breadcrumb-item active">Customer</li>
				</ol>
				<div class="col-md-12">
					<div class="form-row" id="error-msg">
						<?php echo $this->session->userdata('success'); ?>
					</div>
				</div>
				<div id="err"></div>
				<div class="form-group">
					<div class="col-md-12">
						<div class="form-row">
							<div class="col-md-2">
								<input type="text" class="form-control" name="c_name" id="c_name" placeholder="Customer Name">
								<input hidden id="count_name" value="1">
							</div>
							<div class="col-md-2">
								<input type="text" class="form-control" name="p_name" id="p_name" placeholder="Product Name">
							</div>
							<div class="col-md-2">
								<?php echo form_dropdown('unitDescription', unit_description(), set_value('unitDescription'), 'class="form-control" id="unitD" disabled'); ?>
							</div>
							<div class="col-md-2" d="display-price">
								<input type="text" class="form-control" name="price" id="cprice" placeholder="Price" readonly>
								<div hidden id="dprice"></div>
							</div>
							
						</div>
						<br>
						<div class="form-row">
							<div class="col-md-2">
								<input type="text" class="form-control" name="quantity" id="quantity" placeholder="Quantity" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
							</div>
							<div class="col-md-2">
								<input type="text" class="form-control" id="discount" placeholder="0.05%">
							</div>
							<div class="col-md-2">
								<input type="text" class="form-control" name="subtotal" id="total" placeholder="Subtotal" readonly>
								<input type="hidden" id="countMe" value="0" readonly>
							</div>
							<div class="col-md-2">
								<button class="btn btn-success" id="add-to-cart" disabled="disabled">Add to Cart</button>
							</div>
						</div>
					</div>
				</div>
				<form action="<?php echo base_url(); ?>customer/transaction" method="post" enctype="multipart/form-data">
					<?php if($this->uri->segment(1) == 'customer'): ?>
						<?php $this->load->view('admin/modal/customer'); ?>
					<?php endif; ?>
					<div id="grandtotal">
					</div>
					<br>
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable">
							<thead>
								<tr>
									<th>Date / Time</th>
									<th>Customer Name</th>
									<th>Unit Description</th>
									<th>Product Name</th>
									<th>Quantity</th>
									<th>Unit Price</th>
									<th>Sub-Total</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody id="display">
								
							</tbody>
						</table>
					</div>
				</form>
			</div>
		</div>