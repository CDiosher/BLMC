		 <!-- Logout Modal-->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
					<div class="modal-footer">
						<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
						<a class="btn btn-primary" href="<?php echo base_url('logout'); ?>">Logout</a>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="alert-message" role="dialog">
			<div class="modal-dialog modal-sm"> 
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Success</h4>
					</div>
					<div class="modal-body">
						<br>
						<br>
						<p class="text-center">Successfully Saved.
							<br><i class="fa fa-check fa-3x" aria-hidden="true" style="color:green;margin:auto;"></i>
						</p>
						
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal" id="alert-close">Close</button>
					</div>
				</div>
			</div>
		</div>


			<div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">My Account</h5>
							<button class="close" type="button" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
						</div>
						<div class="modal-body">
							<form method="post" action="" id="myAccounts">
								<div class="form-group">
									<div class="form-row">
										<div class="col-md-6">
											<label for="Username">Username</label>
											<input class="form-control" type="text" name="username" placeholder="Enter Username">
										</div>
										<div class="col-md-6">
											<label for="Email">Email address</label>
											<input class="form-control" type="email" name="email" placeholder="Enter email">
										</div>
									</div>
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
									<button class="btn btn-primary btn-block">Update</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div> 