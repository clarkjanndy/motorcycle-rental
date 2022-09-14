
<div class="container col-lg-8 col-md-10 col-md-12 p-3">
	<h1>Booking List</h1>

	<div class="mt-3">
		<h6>Note</h6>
		<ul class="">
			<li class="text-success">Click A to approve booking</li>
			<li class="text-primary">Click C to complete booking</li>
		</ul>

		<?php if(!empty($session->getFlashData('approved'))){?>
			<div class="alert alert-success">
				<center>
					<?php echo $session->getFlashData('approved')?>
				</center>
			</div>
		<?php }?>

		<?php if(!empty($session->getFlashData('complete'))){?>
			<div class="alert alert-primary">
				<center>
					<?php echo $session->getFlashData('complete')?>
				</center>
			</div>
		<?php }?>

	</div>

	<div class="p-3 col-12 shadow table-responsive">
		<table id="motor" class="table table-hover table-striped rounded" >
			<thead class="bg-theme text-white">
				<th>Ticket</th>
				<th>Customer</th>
				<th>Motorcycle</th>
				<th>Total Payment</th>
				<th>Status</th>
				<th>Action</th>

			</tr>
		</thead>
		<tbody>
			<?php foreach($bookings as $booking){
				$fullname = $booking['user_fname'].' '.$booking['user_lname'];
				$motor_name = $booking['motor_brand'].' | '.$booking['motor_model'].' '.
				$booking['motor_displacement'];
				$total = $booking['motor_rate'] * $booking['book_mul'];
				$status = ['Pending', 'Approved', 'Complete'];
				?>
				<tr>
					<td><?php echo $booking['book_ticket']?></td>
					<td><?php echo $fullname?></td>
					<td><?php echo $motor_name?></td>
					<td>&#8369; <?php echo $total?></td>
					<td><?php echo $status[$booking['book_status']]?></td>
					<td class="" style="width: 15%">
						<?php if($booking['book_status'] != 2){?>
							<a href="<?php echo base_url('booking/change/1/'.$booking['book_id'].
							'/'.$booking['book_motor_id'])?>" class="btn btn-sm btn-success"
							onclick="return confirm('Are you sure?')">A</a>
							<a href="<?php echo base_url('booking/change/2/'.$booking['book_id'].
							'/'.$booking['book_motor_id'])?>" class="btn btn-sm btn-primary"
							onclick="return confirm('By clicking you confirm that you recieve the payment?')">C</a>
						<?php }?>
					</td>
				</tr>
			<?php }?>

		</tbody>
	</table>


</div>

</div>




