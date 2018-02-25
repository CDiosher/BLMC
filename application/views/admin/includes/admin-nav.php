					
					<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Stocks">
						<a class="nav-link" href="<?php echo base_url('product-list'); ?>">
							<i class="fa fa-fw fa-list"></i>
							<span class="nav-link-text">Product List</span>
						</a>
					</li>

					<li class="nav-item" data-toggle="tooltip" data-placement="right" title="User">
						<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#purchase" data-parent="#po">
							<i class="fa fa-shopping-bag"></i>
							<span class="nav-link-text">Purchase Order</span>
						</a>
						<ul class="sidenav-second-level collapse" id="purchase">
							<li>
								<a class="nav-link" href="<?php echo base_url('purchase-order'); ?>">
									<i class="fa fa-shopping-cart"></i>
									<span class="nav-link-text">New</span>
								</a>
							</li>
							<li>
								<a class="nav-link" href="<?php echo base_url('purchase-list'); ?>">
									<i class="fa fa-fw fa-list"></i>
									<span class="nav-link-text">List</span>
								</a>
							</li>
						</ul>
					</li>
					<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Stocks">
						<a class="nav-link nav-link-collapse collapsed"  data-toggle="collapse" href="#inventory" data-parent="#Inventory">
							<i class="fa fa-fw fa-table"></i>
							<span class="nav-link-text">Inventory</span>
						</a>
						<ul class="sidenav-second-level collapse" id="inventory">
							<li>
								<a class="nav-link" href="<?php echo base_url('inventory/wholesale'); ?>">
									<i class="fa fa-fw fa-list"></i>
									<span class="nav-link-text">WholeSale</span>
								</a>
							</li>
							<li>
								<a class="nav-link" href="<?php echo base_url('inventory/retail'); ?>">
									<i class="fa fa-fw fa-list"></i>
									<span class="nav-link-text">Retail</span>
								</a>
							</li>
						</ul>
					</li>
					<li class="nav-item" data-toggle="tooltip" data-placement="right" title="User">
						<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#user" data-parent="#userthis">
							<i class="fa fa-fw fa-users"></i>
							<span class="nav-link-text">Users</span>
						</a>
						<ul class="sidenav-second-level collapse" id="user">
							<li>
								<a class="nav-link" href="<?php echo base_url('user-list'); ?>">
									<i class="fa fa-fw fa-list"></i>
									<span class="nav-link-text">List</span>
								</a>
							</li>
							<li>
								<a class="nav-link" data-toggle="modal" data-target="#newuser">
									<i class="fa fa-fw fa-user-circle"></i>
									<span class="nav-link-text">New</span>
								</a>
							</li>
						</ul>
					</li>
