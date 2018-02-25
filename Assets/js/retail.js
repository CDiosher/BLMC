var $m = jQuery.noConflict();
$m(document).ready(function(){

	$m(document).on('click','#editRetail',function(){
		var list = new Array();
		var id = $m(this).attr('data-id');
		list.push(id);
		$m.ajax({
			url:"http://themarketers.x10.bz/retail/edit/" + id,
			method:"POST",
			data: {id:id},
			success:function(data) {
				$m('#editForm').html(data);
			}
		})
	});

});