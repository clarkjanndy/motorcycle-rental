
<div class="container col-lg-8 col-md-10 col-md-12 p-3">
	<div class="card mb-3 shadow">
		<div class="card-header text-theme">
			Search Motorcyle
		</div>
		<div class="card-body">
			<form method="GET">
				<div class="row">
					<div class="form-group ">
						<input type="search" name="search" id="search" class="form-control" 
						placeholder="Type motorcyle brand/model or location...">
					</div>

				</div>

			</form>
		</div>
	</div>

	<h4>Available Motorcycles</h4>

	<div class="row">

		<?php 
		if(!empty($motorcycles)){
			foreach($motorcycles as $motorcycle){
				$motor_name = $motorcycle['motor_brand'].' | '.$motorcycle['motor_model'].' '. $motorcycle['motor_displacement'];
				$date_reg = date_format(date_create($motorcycle['motor_date_reg']), "F j, Y");
				$status = ['Unavailable', 'Available'];
				$rate = $motorcycle['motor_rate'].' per '.$motorcycle['motor_rate_type'];

				?>

				<div class="col-12">
					<div class="card mb-3 shadow">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-center">
								<img src="<?php echo base_url('uploads/'.$motorcycle['motor_pic']);?>" class="img-fluid motorcycle-img">
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12 p-3">
								<a href="<?php echo(base_url('motorcycles/'.$motorcycle['motor_id']));?>" class="link-theme">
									<?php echo $motor_name?>
								</a> <sup>2012</sup>


								<ul class="list-unstyled">
									<li>
										<span>
											<i class="bi bi-geo-alt-fill text-theme"></i> 
											<?php echo $motorcycle['motor_location']?> 
										</span>
									</li>
									<li>
										<span>
											<i class="bi bi-exclamation-circle-fill text-success"></i>
											<?php echo $status[$motorcycle['motor_status']]?> 
										</span>
									</li>
								</ul>
								<div class="col ">
									Rate:<br>
									<b>&#8369 <?php echo $rate?> </b>
								</div>

							</div>

						</div>
					</div>
				</div>
			<?php }
		}else{?>
			<div class="col-12">
				<div class="card mb-3 shadow p-3">
					<center>No data found</center>
					<center>
						<a href="<?php echo base_url('motorcycles')?>" class="link-theme">Show All Motorcycle</a>
					</center>
				</div>
			</div>
		<?php }?>


		
	</div>

</div>

