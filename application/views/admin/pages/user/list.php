

		<div class="content-wrapper">
			<div class="container-fluid">
				<legend>User's List</legend>
				<center><div class="col-md-12">
					<div class="form-row">
						<?php echo $this->session->userdata('message'); ?>
					</div>
				</div></center>
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable">
						<thead>
							<tr>
								<th>Username</th>
								<th>Name</th>
								<th>Email</th>
								<th>Role</th>
								<th>Date Created</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($list as $key): ?>
								<?php $user = $this->session->userdata('userid'); ?>
								<?php if($user == $key->userid): ?>

								<?php else: ?>
									<tr>
										<td><?php echo $key->username; ?></td>
										<td><?php echo $key->first_name.' '.$key->last_name; ?></td>
										<td><?php echo $key->email; ?></td>
										<td><?php echo $key->role_name; ?></td>
										<td><?php echo date('M d, Y h:i:s a',strtotime($key->created_at)); ?></td>
										<td>
											<?php if($key->activated == 0): ?>
												<a href="<?php echo base_url('activate/'.$key->userid); ?>"><i class="fa fa-check" aria-hidden="true"></i></a>
											<?php else: ?>
												<a href="<?php echo base_url('suspend/'.$key->userid); ?>"><i class="fa fa-ban" aria-hidden="true"></i></a>
											<?php endif; ?>
										</td>
									</tr>
								<?php endif; ?>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>