
<div class="container col-lg-8 col-md-10 col-md-12 p-3">
	<h1>My Bookings</h1>

	<?php if(!empty($session->getFlashData('booked'))){?>
		<div class="row p-3">
			<small class="alert alert-success">
				<?php echo $session->getFlashData('booked');?>
			</small>
		</div>
	<?php }?>

	<div class="row">
		<?php foreach($bookings as $b){
			$motor_name = $b['motor_brand'].' | '.$b['motor_model'].' '. $b['motor_displacement'];
			$date = date_format(date_create($b['book_date']), "F j, Y");
			$payment = $b['book_mul'] * $b['motor_rate'];
			$status = ['Pending', 'Approved', 'Complete'];
			?>
			<div class="col-lg-6 col-md-12 col-sm-12  p-3">
				<div class="card">
					<div class="card-header">
						<div>
							Ticket Number: <b class="text-theme"><?php echo $b['book_ticket']?></b>
						</div>
					</div>

					<div class="card-body">
						<ul class="list-unstyled">
							<li class="row">
								<div class="col">Motorcycle: </div>
								<div  class="col"><b><?php echo $motor_name?></b></div>
							</li>
							<li class="row">
								<div class="col">Pick-up Date: </div>
								<div  class="col"><b><?php echo $date?></b></div>
							</li>
							<li class="row">
								<div class="col">Number of <?php echo $b['motor_rate_type']?>: </div>
								<div  class="col"><b><?php echo $b['book_mul']?></b></div> 
							</li>
							<li class="row">
								<div class="col">Total Payment:  </div>
								<div  class="col"><b>&#8369 <?php echo $payment?></b></div> 
							</li>
							<li class="row">
								<div class="col">Status:  </div>
								<div  class="col">
								<b><?php echo $status[$b['book_status']]?></b>
							</div>  
						</li>
					</ul>
				</div>
				<div class="card-footer">
					<small><i>Note: Show ticket when picking up the motorcycle.</i></small>
				</div>
			</div>
		</div>
	<?php }?>


</div>

</div>


