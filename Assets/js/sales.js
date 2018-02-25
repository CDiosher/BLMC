var $m = jQuery.noConflict();
$m(document).ready(function(){

	daily_report();

	//display daily
	function daily_report() {
		$m.ajax({
			url:"http://themarketers.x10.bz/daily-summary-report",
			success:function(data) {
				$m('#report').html(data);
			}
		})
	}

	//display Monthly
	function monthly_report(year) {
		$m.ajax({
			url:"http://themarketers.x10.bz/monthly-summary-report",
			data: {year: year},
			success:function(data) {
				$m('#report').html(data);
			}
		})
	}

	//display Yearly
	function yearly_report(year) {
		$m.ajax({
			url:"http://themarketers.x10.bz/yearly-summary-report",
			data: {year: year},
			success:function(data) {
				$m('#report').html(data);
			}
		})
	}

	$m('#reports').on('change', function() {
		var report = $m(this).val();
		var year = $m('#year').val();

		if(report == 'daily') {
			daily_report();
		} else if(report == 'monthly') {
			monthly_report(year);
		} else if(report == 'yearly') {
			yearly_report(year);
		}
	});

	$m('#gen-report').on('click', function() {
		$m('#dl-date').show();
		$m(this).hide();
	});

	setInterval(validation_field, 1000);

	function validation_field() {
		var start = $m('#start-date').val();
		var end = $m('#end-date').val();

		if(start == '' || end == '') {
			$m('#dl-report').attr('disabled','disabled');
		} else {
			$m('#dl-report').removeAttr('disabled');
		}
	}
});