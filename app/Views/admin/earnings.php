
<div class="container col-lg-8 col-md-10 col-md-12 p-3">
	<h1>Earning History</h1>


	<div class="p-3 col-12 shadow table-responsive">
		<table id="motor" class="table table-hover table-striped rounded" >
			<thead class="bg-theme text-white">
				<th>ID</th>
				<th>Customer</th>
				<th>Motorcycle</th>
				<th>Total Payment</th>
				<th>Status</th>

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
					<td><?php echo $booking['book_id']?></td>
					<td><?php echo $fullname?></td>
					<td><?php echo $motor_name?></td>
					<td>&#8369; <?php echo $total?></td>
					<td><?php echo $status[$booking['book_status']]?></td>
				</tr>
			<?php }?>

		</tbody>
	</table>


</div>

</div>




