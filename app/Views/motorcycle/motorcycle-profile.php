

<style type="text/css">
	.bg{
		height: 400px;
		background-image: url(<?php echo base_url('uploads/'.$motorcycle['motor_pic']);?>);
		background-repeat: repeat-x;
		background-position: center top;
		object-fit: cover;
	}	


</style>
<?php
$motor_name = $motorcycle['motor_brand'].' | '.$motorcycle['motor_model'].' '. $motorcycle['motor_displacement'];
$date_reg = date_format(date_create($motorcycle['motor_date_reg']), "F j, Y");
$status = ['Unavailable', 'Available'];
$rate = $motorcycle['motor_rate'].' per '.$motorcycle['motor_rate_type'];

?>
<div class="container col-lg-8 col-md-10 col-md-12">
	<div class="row p-3">
		<div class="col-lg-12 col-md-12 col-sm-12 p-2">
			<div class="shadow p-3 bg">
				<?php if($session->get('user_role') == 1){?>
					<form class="d-flex" method="POST" enctype="multipart/form-data"
					action="change-photo/<?php echo $motorcycle['motor_id']?>">
					<div class="form-group align-bottom">
						<label><b>Change Photo</b></label>
						<input type="file" name="image" size="20" class="form-control" 
						onchange="return form.submit()" />
					</div>
				</form>
			<?php }?>
		</div>
	</div>

	<div class="col-lg-6 col-md-12 col-sm-12 p-2">
		<div class="shadow p-4">
			<div class=" p-2">
				<p href="#" class="">
					<?php echo $motor_name;?>
					<sup><?php echo $motorcycle['motor_year'];?></sup>
				</p> 

			</div>				

			<div class="border-bottom p-2">
				<h6>Characteristics</h6>
			</div>

			<div class="row p-2">
				<div class="row">
					<div class="col">Displacement: </div>
					<div class="col"><b><?php echo $motorcycle['motor_displacement'];?></b></div>
				</div>

				<div class="row">
					<div class="col">Type: </div>
					<div class="col"><b><?php echo $motorcycle['motor_type'];?></b></div>
				</div>

				<div class="row">
					<div class="col">Mileage: </div>
					<div class="col"><b><?php echo $motorcycle['motor_mileage'];?> km.</b></div>
				</div>

				<div class="row">
					<div class="col">Registered On: </div>
					<div class="col"><b><?php echo $date_reg;?> </b></div>
				</div>

			</div>
		</div>
	</div>


	<div class="col-lg-6 col-md-12 col-sm-12 p-2">
		<div class="shadow p-4">
			<div class="border-bottom p-2">
				<h6>Pricing Details</h6>
			</div>

			<div class="row p-2">
				<div class="row">
					<div class="col">Pick Up Location: </div>
					<div class="col"><b><?php echo $motorcycle['motor_location'];?></b></div>
				</div>

				<div class="row">
					<div class="col">Motorcyle Status </div>
					<div class="col"><b><?php echo $status[$motorcycle['motor_status']];?></b></div>
				</div>

				<div class="row">
					<div class="col">Rate: </div>
					<div class="col"><b>&#8369 <?php echo $rate;?></b></div>
				</div>
			</div>

			<div class="border-bottom p-2">
				<h6>Start Booking</h6>
			</div>

			
			<form class="row p-2" method="POST" action="<?php echo base_url('booking/add')?>">
				<div class="form-group row mb-2 d-none">
					<input type="number" name="motor-id" class="form-control" 
					value="<?php echo $motorcycle['motor_id']?>">
				</div>

				<div class="form-group row mb-2">
					<label class="col">Pick-up Date:</label>
					<input type="date" name="date" class="col form-control" required="">
				</div>

				<div class="form-group row mb-2 d-none">
					<input type="number" name="rate" class="col form-control" id="rate"
					value="<?php echo $motorcycle['motor_rate']?>">
				</div>

				<div class="form-group row mb-2">
					<label class="col">No. Of <?php echo $motorcycle['motor_rate_type']?>:</label>
					<input type="number" name="mul" class="col form-control" value="1" id="mul" 
					oninput="myFunction()" required>
				</div>

				<div class="row mb-2">
					<h4 class="col">Total Price: </h4>
					<div class="col" style="font-size: 25px" >
						<b  id="total">&#8369 0</b>
					</div>
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-red col-12">Start Booking</button>
				</div>
			</form>
		</div>
	</div>

</div>
</div>
</div>

<script>
	function myFunction() {
		var mul = document.getElementById("mul").value;
		var rate = document.getElementById("rate").value;
		document.getElementById("total").innerHTML = "&#8369 " + (mul * rate);
	}
</script>