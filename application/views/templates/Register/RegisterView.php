<div class="container">
			<div class="row main">
				
				<div class="main-login main-center">
                <h1 class="title">Login to Your Account</h1><br>
					<form class="form-horizontal" id="regForm">
                        <div id="responseDiv" class="alert text-center" style="margin-top:20px; display:none;">
                            <button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
                            <span id="message"></span>
                        </div>


						<div class="form-group">
							<label for="fname" class="cols-sm-2 control-label">First Name</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="fname" id="fname"  placeholder="Enter First Name"/>
								</div>
							</div>
						</div>
                        <div class="form-group">
							<label for="lname" class="cols-sm-2 control-label">Last name</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="lname" id="lname"  placeholder="Enter last name"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Your Email*</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
								</div>
							</div>
						</div>	

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Your Phone Number*</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="number" class="form-control" name="phone" id="phone"  placeholder="Enter your Phone Numnber"/>
								</div>
							</div>
						</div>	

						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Password*</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
								</div>
							</div>
						</div>
						<div class="form-group ">
                            <button type="submit" class="login loginmodal-submit"><span id="logText"></span></button>

						</div>
						<div class="login-register">
				            <a href="<?php echo base_url()?>">Login</a>
				         </div>
					</form>
                    </div>
			</div>
		</div>
        <script type="text/javascript">
	$(document).ready(function(){
		$('#logText').html('Register');
		$('#regForm').submit(function(e){
			e.preventDefault();
			$('#logText').html('Checking...');
			var url = '<?php echo base_url(); ?>';
			var user = $('#regForm').serialize();
			var login = function(){
				$.ajax({
					type: 'POST',
					url: url + 'doregister',
					dataType: 'json',
					data: user,
					success:function(response){
                       // {console.log('response',response)}
						$('#message').html(response.message);
						$('#logText').html('Login');
						if(response.error&&response.error!=true){
							$('#responseDiv').removeClass('alert-success').addClass('alert-danger').show();
                            $('#responseDiv').append(response.error);
						}
						else{
							$('#responseDiv').removeClass('alert-danger').addClass('alert-success').show();							
							$('#responseDiv').append(response.message);
							$('#regForm')[0].reset();
							// setTimeout(function(){
							// 	window.location.href= "<?php echo base_url(); ?>";
							// }, 2000);
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
