				<script type="text/javascript">
					var $m = jQuery.noConflict();
					$m(document).ready(function(){
						
						$m('#myAccountEdit').on('click',function(){

							$('#myAccount').show();
							$('#editAccount').hide();
						})

						$m('#cpass').on('blur', function() {
							var pass = $m('#password').val();
							var cpass = $m(this).val();
							if(pass != cpass) {
								$m(this).css('border-color', 'red');
			        			$m('#password').css('border-color', 'red');
							} else {
								$m(this).css('border-color', '');
			        			$m('#password').css('border-color', '');
			        			$m('#myUpdate').removeAttr('disabled');
							}
						})
					});
				</script>