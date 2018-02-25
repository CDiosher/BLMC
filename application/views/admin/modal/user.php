			
			<div class="modal fade" id="newuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Create New Account</h5>
							<button class="close" type="button" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
						</div>
						<div class="modal-body">
							<form method="post" action="<?php echo base_url('create'); ?>">
								<div class="form-group">
									<div class="form-row">
										<div class="col-md-6">
											<label for="FirstName">First name</label>
											<input class="form-control" type="text" name="first" placeholder="Enter first name">
										</div>
										<div class="col-md-6">
											<label for="LastName">Last name</label>
											<input class="form-control" type="text" name="last" placeholder="Enter last name">
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="form-row">
										<div class="col-md-6">
											<label for="Username">Username</label>
											<input class="form-control" type="text" name="username" placeholder="Enter Username">
										</div>
										<div class="col-md-6">
											<label for="Email">User Role</label>
											<?php echo form_dropdown('role', role(), set_value('role'), 'class="form-control"'); ?>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="Email">Email address</label>
									<input class="form-control" type="email" name="email" placeholder="Enter email">
								</div>
								<div class="form-group">
									<div class="form-row">
										<div class="col-md-6">
											<label for="Password">Password</label>
											<input class="form-control" type="password" name="password" placeholder="Password">
										</div>
										<div class="col-md-6">
											<label for="ConfirmPassword">Confirm password</label>
											<input class="form-control" type="password" name="cpass" placeholder="Confirm password">
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button class="btn btn-primary btn-block">Register</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div> 