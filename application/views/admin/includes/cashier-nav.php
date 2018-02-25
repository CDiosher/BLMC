					<!-- <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Products">
						<a class="nav-link" href="<?php echo base_url('customer'); ?>">
							<i class="fa fa-fw fa-users"></i>
							<span class="nav-link-text">Customer</span>
						</a>
					</li> -->

					<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Stocks">
						<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#customer" data-parent="#po">
							<i class="fa fa-fw fa-users"></i>
							<span class="nav-link-text">Customer</span>
						</a>
						<ul class="sidenav-second-level collapse" id="customer">
							<li>
								<a class="nav-link" href="<?php echo base_url('customer'); ?>">
									<i class="fa fa-fw fa-list"></i>
									<span class="nav-link-text">Purchase</span>
								</a>
							</li>
							<li>
								<a class="nav-link" href="<?php echo base_url('customer/list'); ?>">
									<i class="fa fa-fw fa-list"></i>
									<span class="nav-link-text">List</span>
								</a>
							</li>
						</ul>
					</li>

					<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Stocks">
						<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#purchase" data-parent="#po">
							<i class="fa fa-fw fa-table"></i>
							<span class="nav-link-text">Stocks</span>
						</a>
						<ul class="sidenav-second-level collapse" id="purchase">
							<li>
								<a class="nav-link" href="<?php echo base_url('stocks/wholesale'); ?>">
									<i class="fa fa-fw fa-list"></i>
									<span class="nav-link-text">WholeSale</span>
								</a>
							</li>
							<li>
								<a class="nav-link" href="<?php echo base_url('stocks/retail'); ?>">
									<i class="fa fa-fw fa-list"></i>
									<span class="nav-link-text">Retail</span>
								</a>
							</li>
						</ul>
					</li>