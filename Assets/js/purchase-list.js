var $m = jQuery.noConflict();
$m(document).ready(function(){


	$m(document).on('click','#editProduct',function(){
		var list = new Array();
		var id = $m(this).attr('data-id');
		list.push(id);
		$m.ajax({
			url:"http://themarketers.x10.bz/purchase-list/edit/" + id,
			method:"POST",
			data: {id:id},
			success:function(data) {
				$m('#editForm').html(data);
				showScript();
			}
		})
	});

	$m(document).on('click','#retail',function(){
		$m.ajax({
			url:"http://themarketers.x10.bz/retail/form",
			success:function(data) {
				$m('#editForm').html(data);
				showScript();
			}
		})
	});

	function showScript() {
		$m.ajax({
			url:"http://themarketers.x10.bz/dateScript",
			success:function(data) {
				$m('#dateScript').html(data);
			}
		})
	}
});