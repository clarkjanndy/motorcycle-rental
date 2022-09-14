
<div class="container col-lg-8 col-md-10 col-md-12">
	<div class="row p-3">

		<div class="col-lg-4 col-md-12 col-sm-12 p-2">
			<div class="shadow p-3">
				<center class="border-bottom">
					<i class="bi bi-bicycle bi-5x"></i>
					<p class="bi-2x"><?php echo $motorCount?></p>
					<h3>Motorcyles</h3>
				</center>
				<div class="p-3 d-flex justify-content-end">
				<a href="<?php echo base_url('admin/motorcycles')?>" class="btn btn-red">See All</a>
				</div>
			</div>
		</div>

		<div class="col-lg-4 col-md-12 col-sm-12 p-2">
			<div class="shadow p-3">
				<center class="border-bottom">
					<i class="bi bi-people bi-5x"></i>
					<p class="bi-2x"><?php echo $userCount?></p>
					<h3>Users</h3>
				</center>
				<div class="p-3 d-flex justify-content-end">
				<a href="<?php echo base_url('admin/users')?>" class="btn btn-red">See All</a>
				</div>
			</div>
		</div>

		<div class="col-lg-4 col-md-12 col-sm-12 p-2">
			<div class="shadow p-3">
				<center class="border-bottom">
					<i class="bi bi-card-checklist bi-5x"></i>
					<p class="bi-2x"><?php echo $bookingCount?></p>
					<h3>Bookings</h3>
				</center>
				<div class="p-3 d-flex justify-content-end">
				<a href="<?php echo base_url('admin/bookings')?>" class="btn btn-red">See All</a>
				</div>
			</div>
		</div>

		<div class="col-lg-4 col-md-12 col-sm-12 p-2">
			<div class="shadow p-3">
				<center class="border-bottom">
					<p class="bi-5x">&#8369;</p>
					<p class="bi-2x"><?php echo $earnings.'.00'?></p>
					<h3>Earnings</h3>
				</center>
				<div class="p-3 d-flex justify-content-end">
				<a href="admin/earnings" class="btn btn-red">See All</a>
				</div>
			</div>
		</div>



	</div>
</div>
