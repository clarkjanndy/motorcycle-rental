
<div class="container col-lg-8 col-md-10 col-md-12">
	<div class="row p-3">
		<div class="col-lg-12 p-2">
			<div class="shadow p-3">
				<center>
					<img src="<?php echo base_url('assets/images/motorcycles/ducati.jpg');?>" 
					class="rounded-circle mb-2" width=150>
					<?php 
					$fullname = $user['user_fname'].' '.$user['user_lname'];
					$date_reg = date_format(date_create($user['user_date_reg']), "F j, Y");
					$bday = date_format(date_create($user['user_bday']), "F j, Y");
					$age = date_diff(date_create($user['user_bday']), date_create(date('d-m-Y')));
					?>
					<div class="text-theme"><?php echo $fullname;?></div>
					<div class="text-muted">
						<div><?php echo $user['user_email'];?></div>
						<div><?php echo $user['user_contact'];?></div>
						<div>Member Since: <?php echo $date_reg;?></div>
					</div>

					<?php if($session->get('user_slug') == $user['user_slug']){?>
						<div class="mt-3">
							<a class="btn btn-red" href="<?php echo base_url('user/edit/'.$user['user_slug'])?>">
								Edit Profile
							</a>
						</div>
					<?php }?>

				</center>
			</div>

			
		</div>

		<div class="col-lg-12 p-2">
			<div class="shadow p-4">
				<h6>Personal Details</h6>

				<div class="row border-bottom p-2">
					<div class="col text-theme">Fullname: </div>
					<div class="col"><b><?php echo $fullname;?></b></div>
				</div>

				<div class="row border-bottom p-2">
					<div class="col text-theme">Gender: </div>
					<div class="col"><b><?php echo $user['user_gender'];?></b></div>
				</div>

				<div class="row border-bottom p-2">
					<div class="col text-theme">Email: </div>
					<div class="col"><b><?php echo $user['user_email'];?></b></div>
				</div>

				<div class="row border-bottom p-2">
					<div class="col text-theme">Contact Number: </div>
					<div class="col"><b><?php echo $user['user_contact'];?></b></div>
				</div>

				<div class="row border-bottom p-2">
					<div class="col text-theme">Birthday: </div>
					<div class="col"><b><?php echo $bday;?></b></div>
				</div>

				<div class="row border-bottom p-2">
					<div class="col text-theme">Age: </div>
					<div class="col"><b><?php echo $age->format("%y");?></b></div>
				</div>

			</div>


			
		</div>


	</div>
</div>
</div>