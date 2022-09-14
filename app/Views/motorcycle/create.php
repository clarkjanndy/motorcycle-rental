<div class="container col-lg-6 col-md-10 col-sm-12 p-3 mt-lg-5 mt-md-1 mt-sm-1">
	<div class="card shadow">
		<div class="card-header">
			<h4>Add Motorcyle Form</h4>
		</div>

		<div class="card-body">

			<form method="POST">
				<div class="row">
					<div class="form-group col-lg-6 p-2">
						<input type="text" name="brand" id=brand placeholder="Motorcycle Brand"
						class="form-control
						<?php echo (isset($validation) && $validation->hasError('brand')) ? 'is-invalid' : '';?>" 
						value="<?php echo(set_value('brand'))?>">

						<?php 
						if(isset($validation) && $validation->hasError('brand')){
							echo '<small class="invalid-feedback">'.$validation->getError('brand').'</small>';
						}
						?>
					</div>

					<div class="form-group col-lg-6 p-2">
						<input type="text" name="model" id=lname placeholder="Motorcycle Model" 
						class="form-control 
						<?php echo (isset($validation) && $validation->hasError('model')) ? 'is-invalid' : '';?>"
						value="<?php echo(set_value('model'))?>">

						<?php 
						if(isset($validation) && $validation->hasError('model')){
							echo '<small class="invalid-feedback">'.$validation->getError('model').'</small>';
						}
						?>
					</div>
				</div>

				<div class="row">
					<div class="form-group col-lg-6 p-2">
						<input type="text" name="year" id=year placeholder="Year Released"
						class="form-control
						<?php echo (isset($validation) && $validation->hasError('year')) ? 'is-invalid' : '';?>" 
						value="<?php echo(set_value('year'))?>">

						<?php 
						if(isset($validation) && $validation->hasError('year')){
							echo '<small class="invalid-feedback">'.$validation->getError('year').'</small>';
						}
						?>
					</div>

					<div class="form-group col-lg-6 p-2">

						<select class="form-select 
						<?php echo (isset($validation) && $validation->hasError('type')) ? 'is-invalid' : '';?>"
						name="type" id="type">
						<option value="">--Type--</option>
						<option value="Automatic" <?php echo ((isset($_POST['type']) && $_POST['type'] == 'Automatic')) ? 'selected' : '';?>>Automatic</option>
						<option value="Manual" <?php echo ((isset($_POST['type']) && $_POST['type'] == 'Manual')) ? 'selected' : '';?>>Manual</option>
					</select>


					<?php 
					if(isset($validation) && $validation->hasError('type')){
						echo '<small class="invalid-feedback">'.$validation->getError('type').'</small>';
					}
					?>
				</div>
			</div>


			<div class="row">
				<div class="form-group col-lg-6 p-2">
					<input type="text" name="displacement" id=displacement 
					placeholder="Displacement (e.g, 150 cc, 125 cc)"
					class="form-control
					<?php echo (isset($validation) && $validation->hasError('displacement')) ? 'is-invalid' : '';?>" 
					value="<?php echo(set_value('displacement'))?>">

					<?php 
					if(isset($validation) && $validation->hasError('displacement')){
						echo '<small class="invalid-feedback">'.$validation->getError('displacement').'</small>';
					}
					?>
				</div>

				<div class="form-group col-lg-6 p-2">
					<input type="text" name="mileage" id=mileage 
					placeholder="Mileage (in km.)"
					class="form-control
					<?php echo (isset($validation) && $validation->hasError('mileage')) ? 'is-invalid' : '';?>" 
					value="<?php echo(set_value('mileage'))?>">

					<?php 
					if(isset($validation) && $validation->hasError('mileage')){
						echo '<small class="invalid-feedback">'.$validation->getError('mileage').'</small>';
					}
					?>
				</div>
			</div>

			<div class="row">
				<div class="form-group col-lg-6 p-2">
					<select class="form-select 
					<?php echo (isset($validation) && $validation->hasError('rate-type')) ? 'is-invalid' : '';?>"
					name="rate-type" id="rate-type">
					<option value="">--Rate Type--</option>
					<option value="hour" <?php echo ((isset($_POST['rate-type']) && $_POST['rate-type'] == 'hour')) ? 'selected' : '';?>>per hour</option>
					<option value="day" <?php echo ((isset($_POST['rate-type']) && $_POST['rate-type'] == 'day')) ? 'selected' : '';?>>per day</option>
				</select>


				<?php 
				if(isset($validation) && $validation->hasError('rate-type')){
					echo '<small class="invalid-feedback">'.$validation->getError('rate-type').'</small>';
				}
				?>
			</div>

			<div class="form-group col-lg-6 p-2">
				<input type="text" name="rate" id=rate 
				placeholder="Rate (in pesos)"
				class="form-control
				<?php echo (isset($validation) && $validation->hasError('rate')) ? 'is-invalid' : '';?>" 
				value="<?php echo(set_value('rate'))?>">

				<?php 
				if(isset($validation) && $validation->hasError('rate')){
					echo '<small class="invalid-feedback">'.$validation->getError('rate').'</small>';
				}
				?>
			</div>
		</div>

		<div class="row">

			<div class="form-group col p-2">
				<input type="text" name="location" id=location 
				placeholder="Location"
				class="form-control
				<?php echo (isset($validation) && $validation->hasError('location')) ? 'is-invalid' : '';?>" 
				value="<?php echo(set_value('location'))?>">

				<?php 
				if(isset($validation) && $validation->hasError('location')){
					echo '<small class="invalid-feedback">'.$validation->getError('location').'</small>';
				}
				?>
			</div>
		</div>

		<div class="row">
			<div class="form-group col-12 p-2">
				<input type="submit" class="btn btn-red form-control">
			</div>
		</div>

	</form>
</div>
</div>

</div>