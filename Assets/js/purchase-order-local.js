var $m = jQuery.noConflict();
$m(document).ready(function(){

	$m('form#submitForm').submit(function(e){

	e.preventDefault();

	var formData = new FormData($(this)[0]);

	$m.ajax({
			url: "http://localhost/thesis/purchase-order/add",
			type: "POST",
			data: formData,
			async: true,
			cache: false,
			contentType:false,
			processData:false,
			success: function(data) {
				display_data();
			},
			error: function() {

			}
		});
	});

	function display_data() {
		$m.ajax({
			url:"http://localhost/thesis/purchase-order/display-list",
			success:function(data) {
				$m('#display').html(data);
				
				$m("#submitForm")[0].reset();
			}
		})
	}
});