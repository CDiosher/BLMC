		<div class="content-wrapper">
			<div class="container-fluid">
				<legend><i class="fa fa-fw fa-user"></i>My Account</legend>
					<div class="col-md-8" id="editAccount">
						<?php echo $this->session->flashdata('msg'); ?>	
						<div class="form-group">
							<div class="form-row">
								<div class="col-md-6">
									<label for="Username"><i>First Name: </i></label>
									<b><?php echo $this->session->userdata('first'); ?></b>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-6">
									<label for="Email"><i>Last Name: </i></label>
									<b><?php echo $this->session->userdata('last'); ?></b>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-6">
									<label for="Username"><i>Username: </i></label>
									<b><?php echo $this->session->userdata('username'); ?></b>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-6">
									<label for="Email"><i>Email address: </i></label>
									<b><?php echo $this->session->userdata('email'); ?></b>
								</div>
							</div>
						</div>
						<div class="form-row">
							<div class="col-md-2">
								<button class="btn btn-info btn-block" id="myAccountEdit">Edit</button>
							</div>
						</div>
					</div>
				<form method="post" action="<?php echo base_url('update-profile'); ?>" id="myAccount">
					<div class="col-md-6">
						<div class="form-group">
							<div class="form-row">
								<div class="col-md-6">
									<label for="Username"><i>First Name</i></label>
									<input class="form-control" type="text" name="first" placeholder="Enter Username" value="<?php echo $this->session->userdata('first'); ?>">
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-6">
									<label for="Email"><i>Last Name</i></label>
									<input class="form-control" type="text" name="last" placeholder="Enter email" value="<?php echo $this->session->userdata('last'); ?>">
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-6">
									<label for="Username"><i>Username</i></label>
									<input class="form-control" type="text" name="username" placeholder="Enter Username" value="<?php echo $this->session->userdata('username'); ?>">
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-6">
									<label for="Email"><i>Email address</i></label>
									<input class="form-control" type="email" name="email" placeholder="Enter email" value="<?php echo $this->session->userdata('email'); ?>">
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-6">
									<label for="Password"><i>Password</i></label>
									<input class="form-control" type="password" name="password" id="password" placeholder="Password"><?php echo form_error('password'); ?>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-6">
									<label for="ConfirmPassword"><i>Confirm password</i></label>
									<input class="form-control" type="password" name="cpass" id="cpass" placeholder="Confirm password">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<button class="btn btn-primary btn-block" id="myUpdate" disabled="disabled">Update</button>
						</div>
					</div>
				</form>
			</div>
		</div>