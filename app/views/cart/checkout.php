<?php include_once 'app/views/layouts/header.php'; ?>

	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h2 class="text-success text-center page-header"><i class="fa fa-credit-card"></i> CHECKOUT</h2>
				<?php if (isset($errors) && count($errors)) : ?>
					<div class="page-header">
						<h3 class="text-danger"><i class="fa fa-exclamation-triangle"></i> Checkout failed. Please fix errors the following:</h3>
					</div>
				<?php endif; ?>
				<form action="/cart/checkout" method="POST" class="form-horizontal" role="form">
				<?php if (!isset($_SESSION['username'])) : ?>
					<h3 class="text-primary"><i class="fa fa-user"></i> Your information</h3>
					<div class="form-group">
						<label class="col-md-4 control-label">Fullname:<span class="text-danger">*</span></label>
						<div class="col-md-6">
							<input type="text" name="fullname" class="form-control" value="<?php echo isset($data['fullname']) ? $data['fullname'] : '' ; ?>" autofocus>
							<span class="help-block"><strong class="text-danger">
								<?php echo isset($errors['fullname']) ? $errors['fullname'] : '' ; ?>
							</strong></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">Address:<span class="text-danger">*</span></label>
						<div class="col-md-6">
							<input type="text" name="address" class="form-control" value="<?php echo isset($data['address']) ? $data['address'] : '' ; ?>">
							<span class="help-block"><strong class="text-danger">
								<?php echo isset($errors['address']) ? $errors['address'] : '' ; ?>
							</strong></span>
						</div>
					</div>
				<?php endif; ?>
					<h3 class="text-primary"><i class="fa fa-truck"></i> Shipping information</h3>
					<div class="form-group">
						<label class="col-md-4 control-label">Ship Name:</label>
						<div class="col-md-6">
							<input type="text" name="ship_name" class="form-control" value="<?php echo isset($data['ship_name']) ? $data['ship_name'] : '' ; ?>">
							<span class="help-block"><strong class="text-danger">
								<?php echo isset($errors['ship_name']) ? $errors['ship_name'] : '' ; ?>
							</strong></span>
							<span class="help-block"><i class="fa fa-tip"></i> Please enter for shipping. Ex: gift for friend, nothing..</span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">Ship Address:<span class="text-danger">*</span></label>
						<div class="col-md-6">
							<input type="text" name="ship_address" class="form-control" value="<?php echo isset($data['ship_address']) ? $data['ship_address'] : '' ; ?>">
							<span class="help-block"><strong class="text-danger">
								<?php echo isset($errors['ship_address']) ? $errors['ship_address'] : '' ; ?>
							</strong></span>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-10">
							<p class="pull-right">
								<button type="reset" class="btn btn-default"><i class="fa fa-eraser"></i> Reset</button>
								<button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Purchase</button>
							</p>
						</div>
					</div>
				</form>
				<p class="text-warning">Note: Please fill all the field has red star.</p>
			</div>
		</div>
	</div>

<?php include_once 'app/views/layouts/footer.php'; ?>
