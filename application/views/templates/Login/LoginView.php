<div tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    	  <div class="modal-dialog">
				<div class="loginmodal-container">
					<h1>Login to Your Account</h1><br>
				  <form id="logForm">
					<input type="text" name="email" placeholder="Enter Email or Phone Number">
					<input type="password" name="password" placeholder="Password">
				  
                    <button type="submit" class="login loginmodal-submit"><span id="logText"></span></button>
                  </form>
					
				  <div class="login-help">
					<a href="<?php echo base_url();?>register">Register</a> - <a href="#">Forgot Password</a>
				  </div>

				  <div id="responseDiv" class="alert text-center" style="margin-top:20px; display:none;">
					<button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
					<span id="message"></span>
				  </div>

				</div>
			</div>
		  </div>
         	
<script type="text/javascript">
	$(document).ready(function(){
		$('#logText').html('Login');
		$('#logForm').submit(function(e){
			e.preventDefault();
			$('#logText').html('Checking...');
			var url = '<?php echo base_url(); ?>';
			var user = $('#logForm').serialize();
			var login = function(){
				$.ajax({
					type: 'POST',
					url: url + 'LoginController/login',
					dataType: 'json',
					data: user,
					success:function(response){
                        {console.log('response',response)}
						$('#message').html(response.message);
						$('#logText').html('Login');
						if(response.error){
							$('#responseDiv').removeClass('alert-success').addClass('alert-danger').show();
						}
						else{
							$('#responseDiv').removeClass('alert-danger').addClass('alert-success').show();
							$('#logForm')[0].reset();
							setTimeout(function(){
								location.reload();
							}, 3000);
						}
					}
				});
			};
			setTimeout(login, 3000);
		});
 
		$(document).on('click', '#clearMsg', function(){
			$('#responseDiv').hide();
		});
	});
</script>