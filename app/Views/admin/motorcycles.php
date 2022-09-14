
<div class="container col-lg-8 col-md-10 col-md-12 p-3">
	<h1>Motorcyle List</h1>

	<div class="d-flex justify-content-end mt-3">
		<a href="<?php echo base_url('motorcycles/create')?>" class="btn btn-red">Add Motorcycle</a>
	</div>

	<div class="p-3 col-12 shadow table-responsive">
		<table id="motor" class="table table-hover table-striped rounded" >
			<thead class="bg-theme text-white">
				<th>ID</th>
				<th>Brand</th>
				<th>Model</th>
				<th>Displacement</th>
				<th>Year</th>
				<th>Action</th>

			</tr>
		</thead>
		<tbody>
			<?php foreach($motorcycles as $motorcycle){
				?>
				<tr>
					<td><?php echo $motorcycle['motor_id']?></td>
					<td><?php echo $motorcycle['motor_brand']?></td>
					<td><?php echo $motorcycle['motor_model']?></td>
					<td><?php echo $motorcycle['motor_displacement']?></td>
					<td><?php echo $motorcycle['motor_year']?></td>
					<td class="" style="width: 15%">
						<a href="<?php echo base_url('motorcycles/'.$motorcycle['motor_id'])?>" class="btn btn-sm btn-success">View</a>
						<a href="<?php echo base_url('motorcycles/edit/'.$motorcycle['motor_id'])?>" class="btn btn-sm btn-primary">Edit</a>
					</td>
				</tr>
			<?php }?>

		</tbody>
	</table>


</div>

</div>


