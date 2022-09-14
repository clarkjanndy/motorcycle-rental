<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Motorcycle Rental</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
	<link rel="stylesheet"  href="<?php echo base_url('assets/css/bootstrap.min.css')?>"/>
	<link rel="stylesheet"  href="<?php echo base_url('assets/css/style.css')?>"/>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body>
	
	<div class="container col-lg-6 col-md-10 col-sm-12 p-3 mt-lg-5 mt-md-1 mt-sm-1">
		<div class="card shadow">
			<div class="card-header">
				<center>
					<h4>Sign Up Form</h4>
					<p>Create you account. It's free and only takes a few minutes<p>
					</center>
				</div>

				<div class="card-body">

					<form method="POST">
						<div class="row">
							<div class="form-group col-lg-6 p-2">
								<input type="text" name="fname" id=fname placeholder="First Name" class="form-control
								<?php echo (isset($validation) && $validation->hasError('fname')) ? 'is-invalid' : '';?>" 
								value="<?php echo(set_value('fname'))?>">

								<?php 
								if(isset($validation) && $validation->hasError('fname')){
									echo '<small class="invalid-feedback">'.$validation->getError('fname').'</small>';
								}
								?>
							</div>

							<div class="form-group col-lg-6 p-2">
								<input type="text" name="lname" id=lname placeholder="Last Name" class="form-control 
								<?php echo (isset($validation) && $validation->hasError('lname')) ? 'is-invalid' : '';?>"
								value="<?php echo(set_value('lname'))?>">

								<?php 
								if(isset($validation) && $validation->hasError('lname')){
									echo '<small class="invalid-feedback">'.$validation->getError('lname').'</small>';
								}
								?>
							</div>
						</div>

						<div class="row">
							<div class="form-group col p-2">
								<input type="text" name="email" id=email placeholder="Email Adress" class="form-control 
								<?php echo (isset($validation) && $validation->hasError('email')) ? 'is-invalid' : '';?>"
								value="<?php echo(set_value('email'))?>">

								<?php 
								if(isset($validation) && $validation->hasError('email')){
									echo '<small class="invalid-feedback">'.$validation->getError('email').'</small>';
								}
								?>
							</div>
						</div>

						<div class="row">
							<div class="form-group col p-2">
								<input type="number" name="contact" id=contact placeholder="Contact Number" class="form-control 
								<?php echo (isset($validation) && $validation->hasError('contact')) ? 'is-invalid' : '';?>"
								value="<?php echo(set_value('contact'))?>">

								<?php 
								if(isset($validation) && $validation->hasError('contact')){
									echo '<small class="invalid-feedback">'.$validation->getError('contact').'</small>';
								}
								?>
							</div>
						</div>

						<div class="row">
							<div class="form-group col p-2">
								<input type="text" name="address" id=address placeholder="Address" class="form-control 
								<?php echo (isset($validation) && $validation->hasError('address')) ? 'is-invalid' : '';?>"
								value="<?php echo(set_value('address'))?>">

								<?php 
								if(isset($validation) && $validation->hasError('address')){
									echo '<small class="invalid-feedback">'.$validation->getError('address').'</small>';
								}
								?>
							</div>
						</div>

						<div class="row">

							<div class="form-group col p-2">
								<label>Gender:</label>
								<select class="form-select <?php echo (isset($validation) && $validation->hasError('gender')) ? 'is-invalid' : '';?>"
									value="<?php echo(set_value('gender'))?>" name=gender id="gender">
									<option value="">--select--</option>
									<option value="Male" <?php echo ((isset($_POST['gender']) && $_POST['gender'] == 'Male')) ? 'selected' : '';?>>Male</option>
									<option value="Female" <?php echo ((isset($_POST['gender']) && $_POST['gender'] == 'Female')) ? 'selected' : '';?>>Female</option>

								</select>
					

								<?php 
								if(isset($validation) && $validation->hasError('gender')){
									echo '<small class="invalid-feedback">'.$validation->getError('gender').'</small>';
								}
								?>
							</div>

							<div class="form-group col p-2">
								<label>Birthday:</label>
								<input type="date" name="bday" id=bday class="form-control 
								<?php echo (isset($validation) && $validation->hasError('bday')) ? 'is-invalid' : '';?>"
								value="<?php echo(set_value('bday'))?>">

								<?php 
								if(isset($validation) && $validation->hasError('bday')){
									echo '<small class="invalid-feedback">'.$validation->getError('bday').'</small>';
								}
								?>
							</div>

							
						</div>

						<div class="row">
							<div class="form-group col-lg-6 p-2">
								<input type="password" name="password" id=password placeholder="Password" class="form-control 
								<?php echo (isset($validation) && $validation->hasError('password')) ? 'is-invalid' : '';?>"
								value="<?php echo(set_value('password'))?>">

								<?php 
								if(isset($validation) && $validation->hasError('password')){
									echo '<small class="invalid-feedback">'.$validation->getError('password').'</small>';
								}
								?>
							</div>

							<div class="form-group col-lg-6 p-2">
								<input type="password" name="password1" id=password1 placeholder="Confirm Password" class="form-control 
								<?php echo (isset($validation) && $validation->hasError('password1')) ? 'is-invalid' : '';?>"
								value="<?php echo(set_value('password1'))?>">

								<?php 
								if(isset($validation) && $validation->hasError('password1')){
									echo '<small class="invalid-feedback">'.$validation->getError('password1').'</small>';
								}
								?>
							</div>
						</div>

						<div class="row p-2">
							<div class="form-check">
								<input class="form-check-input 
								<?php echo (isset($accept_terms)) ? 'is-invalid' : '';?>" 
								type="checkbox" name="check">
								<label class="form-check-label" >
									Agree to Terms and Conditions
								</label>
								<div class="invalid-feedback">
									You must agree before submitting.
								</div>
							</div>
						</div>

						<div class="row">
							<div class="form-group col-12 p-2">
								<input type="submit" class="btn btn-red form-control">
							</div>
						</div>

					</form>
				</div>
			</div>

		</div>

	</div>

</body>
<script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
</html>