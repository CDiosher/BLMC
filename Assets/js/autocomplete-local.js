var $m = jQuery.noConflict();
$m(document).ready(function(){
	$m(function() {
		$m("#p_name").autocomplete({
			source: "http://localhost/thesis/auto-complete"
		});
	});

	setInterval(checkField, 1000);

	function checkField() {
		var p = $m('#p_name').val();
		var unit = $m('#unitD').val();
		var pname = $m('#p_name').val();

		if(p != '') {
			$m('#unitD').removeAttr('disabled','disabled');

			if(unit == 'wholesale') {
				wholesale(pname);
			} else if(unit == 'retail') {
				retail(pname);
			} else {

			}
		} else {
			$m('#unitD').attr('disabled','disabled');
		}

	}

	$m('#quantity').on('blur', function(){
		var price = parseInt($m('#cprice').val());
		var quan = parseInt($m(this).val());
		var total = 0;

		total = price * quan;
		$m('#total').val(total);

	});

	//discount computation
	$m('#discount').on('blur',function() {
		var discount = $m(this).val();
		var total = $m('#total').val();
		var countMe = $m('#countMe').val();
		var percent = parseFloat(discount) / 100;
		var discounted = parseFloat(total) * parseFloat(percent);
		var grandtotal = total - discounted;
		var none = parseFloat(total) + parseFloat(countMe);

		if(discount != '') {
			$m('#countMe').val(discounted);
			$m('#total').val(grandtotal);
		} else {
			$m('#discount').val();
			$m('#total').val(none);
			$m('#countMe').val('0');
		}
							
	});

	function wholesale(pname) {
		$m.ajax({
			url:"http://localhost/thesis/wholesale",
			data: {pname: pname},
			type: "POST",
			success:function(data) {
				$m('#cprice').val(data);
			}
		});
	}

	function retail(pname) {
		$m.ajax({
			url:"http://localhost/thesis/prize",
			data: {pname: pname},
			type: "POST",
			success:function(data) {
				$m('#cprice').val(data);
			}
		});
	}
});