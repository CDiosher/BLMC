	<div class="content-wrapper">
		<div class="container-fluid">
			<div class="form-inline">
				<div class="form-group">
					<div class="form-row">
						<div class="col-md-3">
							<?php echo form_dropdown('year', year(), set_value('year'), 'id="year" class="form-control"'); ?>
						</div>
					</div>
					&nbsp;
					<div class="form-row">
						<div class="col-md-3">
							<?php echo form_dropdown('reports', reports(), set_value('reports'), 'id="reports" class="form-control"'); ?>
						</div>
					</div>
				</div>
				&nbsp;
				<form action="<?php echo base_url('download'); ?>" method="post" id="dl-date">
					<div class="form-group">
						<div class="form-row">
							<div class="col-md-3">
								<input class="form-control" type="text" name="start" id="start-date" placeholder="Start Date">
							</div>
						</div>
						&nbsp;
						<div class="form-row">
							<div class="col-md-3">
								<input class="form-control" type="text" name="end" id="end-date" placeholder="End Date">
							</div>
						</div>
						&nbsp;
						<div class="form-row">
							<div class="col-md-3">
								<input type="submit" id="dl-report" class="btn btn-success" value="Download" disabled="disabled">
							</div>
						</div>
					</div>
				</form>
				&nbsp;
				<div class="form-group">
					<button class="btn btn-info" id="gen-report">Generate Report</button>
				</div>
			</div>
			<div id="column_wrap">
				<div id="columnchart_values"></div>
			</div>
			<div id="report"></div>
		</div>
	</div>