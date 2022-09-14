
<div class="container col-lg-8 col-md-10 col-md-12 p-3">
	<h1>User List</h1>

	<div class="p-3 col-12 shadow table-responsive">
		<table id="motor" class="table table-hover table-striped rounded" >
			<thead class="bg-theme text-white">
				<th>Name</th>
				<th>Email</th>
				<th>Contact</th>
				<th>Address</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($users as $user){
				$fullname = $user['user_fname'].' '.$user['user_lname'];
				$date_reg = date_format(date_create($user['user_date_reg']), "F j, Y");
				?>
				<tr>
					<td><?php echo $user['user_id']?></td>
					<td><?php echo $user['user_email']?></td>
					<td><?php echo $user['user_contact']?></td>
					<td><?php echo $user['user_address']?></td>
					<td class="" style="width: 15%">
						<a href="<?php echo base_url('user/'.$user['user_slug'])?>" class="btn btn-sm btn-success">View</a>
					</td>
				</tr>
			<?php }?>

		</tbody>
	</table>


</div>

</div>


