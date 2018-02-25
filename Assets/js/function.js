/*money mask*/
var $m = jQuery.noConflict();
$m(document).ready(function(){
    $m('#price').mask("#,##0.00", {reverse: true});
    $m('#pcs').mask("#,##0.00", {reverse: true});
    $m('#bundle').mask("#,##0.00", {reverse: true});
});

$m( function() {
	$m( "#payment" ).datepicker();
});

$m('#payment').on('changeDate', function(){
    $m(this).datepicker('hide');
});

$m( function() {
	$m( "#delivered" ).datepicker();
});

$m('#delivered').on('changeDate', function(){
    $m(this).datepicker('hide');
});

$m( function() {
	$m( "#start-date" ).datepicker();
});

$m('#start-date').on('changeDate', function(e){
    $m(this).datepicker('hide');
});

$m( function() {
	$m( "#end-date" ).datepicker();
});

$m('#end-date').on('changeDate', function(e){
    $m(this).datepicker('hide');
});

function search_products() {
	var input, filter, table, tr, td, i;
	input = document.getElementById("search");
	filter = input.value.toUpperCase();
	table = document.getElementById("table-system");
	tr = table.getElementsByTagName("tr");
	for (i = 0; i < tr.length; i++) {
		td = tr[i].getElementsByTagName("td")[0];
		if (td) {
			if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
				tr[i].style.display = "";
			} else {
				tr[i].style.display = "none";
			}
		}
	}
}

$m('form#itemsForm').submit(function(event){

	event.preventDefault();

	var formData = new FormData($m(this)[0]);

	$m.ajax({
		url:"http://themarketers.x10.bz/create-products",
		type: "POST",
		data: formData,
		async: true,
		cache: false,
		contentType:false,
		processData:false,
		success:function(data) {
			$m('#alert-message').modal('show');
		}
	});

});