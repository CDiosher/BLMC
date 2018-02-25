		<!-- Navigation-->
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
			<a class="navbar-brand" href="#">BLMC Dashboard</a>
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
					<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
						<a class="nav-link" href="<?php echo base_url(); ?>">
							<i class="fa fa-fw fa-dashboard"></i>
							<span class="nav-link-text">Dashboard</span>
						</a>
					</li>
					<?php if($this->session->userdata('role') == 1): ?>
						<?php $this->load->view('admin/includes/admin-nav'); ?>
					<?php elseif($this->session->userdata('role') == 4): ?>
						<?php $this->load->view('admin/includes/cashier-nav'); ?>
					<?php else: ?>
					<?php endif; ?>
				</ul>
				<ul class="navbar-nav ml-auto">
					<div class="dropdown nav-link">
						Welcome <?php echo $this->session->userdata('username'); ?>!
						<ul class="dropdown-content">
							<li>
								<a href='<?php echo base_url('profile/').$this->session->userdata('username'); ?>'>
									<i class="fa fa-fw fa-user"></i> Profile
								</a>
							</li>
							<li>
								<a href='' data-toggle="modal" data-target="#exampleModal">
									<i class="fa fa-fw fa-sign-out"></i>Logout
								</a>
							</li>
						</ul>
					</div>
				</ul>
			</div>
		</nav>