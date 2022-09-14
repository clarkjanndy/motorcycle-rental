

<div class="container col-lg-8 col-md-10 col-sm-12 p-3 mt-5 mb-5">
	<div class="card shadow">
		<div class="row">
			<div class="col-lg-6 d-none d-lg-block">
				<img src="<?php echo base_url('assets/images/logo.jpeg')?>"
				class="img-fluid">
			</div>
			<div class="col-lg-6 p-3">
				<center class="mb-3">
					<h5>Motorcyle Rental System</h5>
					<small>Fill in the form with your login details</small>
				</center>
				<form  method="POST"> 
					<div class="form-group p-2">
						<input type="text" name="email" placeholder="Email" class="form-control
						<?php echo (isset($validation) && $validation->hasError('email')) ? 'is-invalid' : '';?>" 
						value="<?php echo(set_value('email'))?>">

						<?php 
						if(isset($validation) && $validation->hasError('email')){
							echo '<small class="invalid-feedback">'.$validation->getError('email').'</small>';
						}
						?>
					</div>

					<div class="form-group p-2">
						<input type="password" name="password" placeholder="Password" class="form-control
						<?php echo (isset($validation) && $validation->hasError('password')) ? 'is-invalid' : '';?>" 
						value="<?php echo(set_value('password'))?>">

						<?php 
						if(isset($validation) && $validation->hasError('password')){
							echo '<small class="invalid-feedback">'.$validation->getError('password').'</small>';
						}
						?>
					</div>

					<div class="form-group p-2 d-flex justify-content-center ">
						<?php if(!empty($session->getFlashData('failed'))){?>
							<small class="alert alert-danger">
								<?php echo $session->getFlashData('failed');?>
							</small>
						<?php }?>
					</div>

					<div class="form-group p-2">
						<button type="submit" class="btn btn-red col-12">Login</button>
					</div>

					<div class="p-2">
						<p>Dont have an account yet? Click <a href="register" class="link-theme">here</a> to sign up.</p>
					</div>

				</form>
			</div>
		</div>
	</div>

</div>

<script type="text/javascript">

	(function () {
		'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
  .forEach(function (form) {
  	form.addEventListener('submit', function (event) {
  		if (!form.checkValidity()) {
  			event.preventDefault()
  			event.stopPropagation()
  		}

  		form.classList.add('was-validated')
  	}, false)
  })
})()
</script>




