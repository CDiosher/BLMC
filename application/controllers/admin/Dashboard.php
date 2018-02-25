<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('admin/M_dashboard', 'dashboard');
		if(!$this->session->userdata('logged_in')) redirect(base_url());

		if($this->session->userdata('role') == 1 || $this->session->userdata('role') == 2 ) {

		} else {

			redirect('customer');

		}
	}

	public function index() {
		$data['sitename'] = 'Admin Dashboard';
		$data['content'] = 'admin/pages/dashboard/home';
		$this->parser->parse('admin/template/template',$data);
	}

	public function daily() {

		$sumDaily = $this->dashboard->sales_daily();

		$output = '';
		
		if(count($sumDaily) > 0) {
			$output .="

	  		<script>
			    google.charts.load('current', {packages:['corechart']});
				google.charts.setOnLoadCallback(drawChart);
				    function drawChart() {
						var data = google.visualization.arrayToDataTable([
							['Element', 'Sales', { role: 'color' }, { role: 'annotation' } ],";


						foreach ($sumDaily as $val) {
							$output .= "['".date('M d, Y',strtotime($val->date))."', ".$val->sales.", '#b87333', '".date('D',strtotime($val->date))."'],";
						}

				$output .= "]);
			      

						var view = new google.visualization.DataView(data);
							view.setColumns([0, 1,
								{ calc: 'stringify',
									sourceColumn: 3,
									type: 'string',
									role: 'annotation' },
								2]);

						var options = {
							title: 'Daily Report',
							width: '100%',
							height: '100%',
							bar: {groupWidth: '50%'},
							legend: { position: 'none' }
						};
						var chart = new google.visualization.ColumnChart(document.getElementById('columnchart_values'));
						chart.draw(view, options);
				    }
	  		</script>";
		} else {
			$output .= '';
		}


  		echo $output;
	}

	public function column_graph_monthly() {

		if(isset($_GET['year'])) {
			$year = $_GET['year'];
			$months = $this->dashboard->get_month($year);

			$output = '';
				
			if(count($months) > 0) {
				$output .="

		  		<script>
				    google.charts.load('current', {packages:['corechart']});
					google.charts.setOnLoadCallback(drawChart);
					    function drawChart() {
							var data = google.visualization.arrayToDataTable([
								['Element', 'Sales', { role: 'color' }, { role: 'annotation' } ],";

							foreach ($months as $month){
					        	$smonth = $month->month;
					        	$sumSales = $this->dashboard->summary_sales_report($smonth);

								foreach ($sumSales as $key) {
									
									$output .= "['".date('M',strtotime($smonth))."', ".$key->subtotal.", '#b87333', '".date('M',strtotime($smonth))."'],";
								}
								
				        	}
					$output .= "]);
				      

							var view = new google.visualization.DataView(data);
								view.setColumns([0, 1,
									{ calc: 'stringify',
										sourceColumn: 3,
										type: 'string',
										role: 'annotation' },
									2]);

							var options = {
								title: 'Monthly Summary Report',
								width: '100%',
								height: '100%',
								bar: {groupWidth: '50%'},
								legend: { position: 'none' }
							};
							var chart = new google.visualization.ColumnChart(document.getElementById('columnchart_values'));
							chart.draw(view, options);
					    }
		  		</script>";
			} else {
				$output .= '';
			}


	  		echo $output;
	  	}
	}

	public function column_graph_yearly() {

		if(isset($_GET['year'])) {
			$year = $_GET['year'];
			$annual = $this->dashboard->get_annual($year);

			$output = '';
			$summary = '';

			if(count($annual) > 0) {
				$output .="

		  		<script>
				    google.charts.load('current', {packages:['corechart']});
					google.charts.setOnLoadCallback(drawChart);
					    function drawChart() {
							var data = google.visualization.arrayToDataTable([
								['Element', 'Sales', { role: 'color' }, { role: 'annotation' } ],";

							$year = $annual['annual'];
									
							$output .= "['".date('Y',strtotime($year))."', ".$annual['sales'].", '#b87333', '".date('Y',strtotime($year))."'],";

					$output .= "]);
				      

							var view = new google.visualization.DataView(data);
								view.setColumns([0, 1,
									{ calc: 'stringify',
										sourceColumn: 3,
										type: 'string',
										role: 'annotation' },
									2]);

							var options = {
								title: 'Yearly Summary Report',
								width: '100%',
								height: '100%',
								bar: {groupWidth: '50%'},
								legend: { position: 'none' }
							};
							var chart = new google.visualization.ColumnChart(document.getElementById('columnchart_values'));
							chart.draw(view, options);
					    }
		  		</script>";
		  	} else {
				$output .= '';
			}

	  		echo $output;
		}
	}
}
