<script type="text/javascript">
	setInterval(validation_field, 1000);

	function validation_field() {
	        
		var c_name = $m('#c_name').val();
		var pname = $('#p_name').val();
	        var category = $('#category').val();
	        var quantity = $('#quantity').val();
	        var cprice = $('#cprice').val();
	        var	total = $('#total').val();

	        if(c_name == '' || pname == '' || category == '' || quantity == '' || cprice == '' || total == '') {
	        	$m('#add-to-cart').attr('disabled','disabled');
	        } else if(cprice == '0') {
	        	$m('#add-to-cart').attr('disabled','disabled');
	        } else {
	        	$m('#add-to-cart').removeAttr('disabled');
	        }

	}

	$(document).on('click','#add-to-cart',function(){
		
	    //add row
	    $('#dataTable').prepend('<tr><td><input hidden name="count_name[]" value="'+ $m('#count_name').val() +'"><input hidden name="c_name[]" value="'+ $m('#c_name').val() +'"><input hidden name="p_name[]" value="'+ $m('#p_name').val() +'"><input hidden name="category[]" value="'+ $m('#unitD').val() +'"><input hidden name="price[]" value="'+ $m('#quantity').val() +'"><input hidden name="tag_price[]" value="'+ $m('#cprice').val() +'"><input hidden name="total[]" id="grand" value="'+ $('#total').val() +'"><?php echo date('M d, Y | h:i:s a') ?></td>'+
	                        '<td>' + $('#c_name').val() + '</td><td>' + $('#unitD').val() + '</td><td>' + $('#p_name').val() + '</td><td>' + $('#quantity').val() + '</td><td>' + $('#cprice').val() + '</td><td class="grand">' + $('#total').val() + '</td><td><a href="#" class="btn btn-danger item">remove</a></td></tr>');

	    $('#p_name').val('');$('#unitD').val('');$('#quantity').val('');$('#cprice').val('');$('#total').val('');$('#discount').val('');

	    	var sum = 0;
	        $m(".grand").each(function () {
	                sum += parseFloat($m(this).html());
	    });
	    $m('#amount-check').val(sum);
	    $m('#due').val(sum);
	    $m('#grandtotal').html('<button type="button" class="btn btn-info" data-toggle="modal" data-target="#payment-checkout" id="check-good">Process</button> &nbsp; <strong>Total: ' + sum +'</strong>');

	    disabledCname();
	});
	function disabledCname() {
		var checkGood = $('#grand').val();
		if(checkGood != 0) {
			$('#c_name').attr('disabled','disabled');
		} else {
			$('#c_name').removeAttr('disabled');
		}
	}

	$(document).on('click','.item',function(){

		$(this).closest('tr').remove();
		var sum = 0;
		$m(".grand").each(function () {
			sum += parseFloat($m(this).html());
		});
		$m('#amount-check').val(sum);
		$m('#due').val(sum);
		$m('#grandtotal').html('<button type="button" class="btn btn-info" data-toggle="modal" data-target="#payment-checkout" id="check-good">Process</button> &nbsp; <strong>Total: ' + sum +'</strong>');
	});

	$m('#payCheck').on('blur',function() {
		var payCheck = parseInt($m(this).val());
		var amountC = parseInt($m('#amount-check').val());
		var total = 0;

		total = amountC - payCheck;
		if(payCheck == '') {
			$m('#checkout').attr('disabled','disabled');
		} else {
			if(payCheck < amountC) {
				$m('#payCheck').css('border-color', 'red');
				$m('#change-check').val('');
				$m('#checkout').attr('disabled','disabled');
			} else {
				$m('#payCheck').css('border-color', '');
				$m('#checkout').removeAttr('disabled');
				$m('#pdue').val(payCheck);
				$m('#cdue').val(Math.abs(total));
				$m('#change-check').val(Math.abs(total));
			}
		}

	});
</script>