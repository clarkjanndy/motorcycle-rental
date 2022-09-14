<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Motorcycle Rental</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
	<link rel="stylesheet"  href="<?php echo base_url('assets/css/bootstrap.min.css')?>"/>
	<link rel="stylesheet"  href="<?php echo base_url('assets/css/style.css')?>"/>
	<link rel="stylesheet"  href="<?php echo base_url('assets/css/datatable.css')?>"/>
	

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body>
	
	<nav class="navbar navbar-expand-lg navbar-light bg-light custom-nav">
		<div class="container col-lg-8 col-md-12 col-sm-12">
			<a class="navbar-brand" href="<?php echo base_url()?>">Motorcycle Rental System</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">

					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url('motorcycles');?>">Rent a Motorcycle</a>
					</li>
					
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url('contact');?>">Contact</a>
					</li>
					
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url('about');?>">About</a>
					</li>
				</ul>
				<?php
				if(!($session->has('loggedIn') && $session->get('loggedIn') == true)){
					
					?>
					<form class="d-flex">
						<ul class="navbar-nav me-auto mb-2 mb-lg-0">
							<li class="nav-item">
								<a class="nav-link"  href="<?php echo base_url('login');?>">Sign In</a>
							</li>
							<li class="nav-item">
								<a class="nav-link"  href="<?php echo base_url('register');?>">Sign Up</a>
							</li>
						</ul>
					</form>
				<?php }else{
					$fullname = $session->get('user_fname').' '.$session->get('user_lname');
					?>
					<form class="d-flex">
						<ul class="navbar-nav me-auto mb-2 mb-lg-0">
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
									<?php echo $fullname;?>
								</a>
								<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
									<li>
										<a class="dropdown-item" href="<?php echo base_url('user/'.$session->get('user_slug'));?>">My Profile</a>
									</li>
									<?php if($session->get('user_role') == 1){?>
									<li>
										<a class="dropdown-item" href="<?php echo base_url('admin');?>">Admin Panel</a>
									</li>
									<?php }?>
									<li>
										<a class="dropdown-item" href="<?php echo base_url('booking/'.$session->get('user_slug'));?>">My Bookings</a>
									</li>
									<li><hr class="dropdown-divider"></li>
									<li><a class="dropdown-item" href="<?php echo base_url('logout');?>">Logout</a></li>
								</ul>
							</li>
						</ul>
					</form>
				<?php }?>
			</div>
		</div>
	</nav>
