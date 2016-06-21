<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo isset($data['title']) ?: 'E-commerce'; ?></title>
	<link rel="stylesheet" href="<?php echo App::APP_URL . '/public/assets/css/bootstrap.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo App::APP_URL . '/public/assets/css/bootstrap-theme.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo App::APP_URL . '/public/assets/css/font-awesome.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo App::APP_URL . '/public/assets/css/style.css'; ?>">

	<?php if (isset($data['css'])) : ?>
		<script src="<?php echo App::APP_URL . '/public/css/' . $data['css']; ?>"></script>
	<?php endif; ?>

	<?php if (isset($data['javascript-in-head'])) : ?>
		<script src="<?php echo App::APP_URL . '/public/js/' . $data['javascript-in-head']; ?>"></script>
	<?php endif; ?>
</head>
<body>
	<nav class="navbar navbar-default" role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/">E-commerce</a>
				<span id="cart" class="pull-left">
					<a href="#" title="Your cart" data-toggle="tooltip" data-placement="bottom">
						<i class="fa fa-cart-plus fa-2x"></i> <span class="badge">0</span>
					</a>
				</span>
			</div>
	
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav navbar-right">		
				<?php if (isset($_SESSION['username'])) : ?>

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['username']; ?> <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="#">Profile</a></li>
							<li><a href="#">Change password</a></li>
							<li class="divider"></li>
							<li><a href="#">Logout</a></li>
						</ul>
					</li>

				<?php else : ?>

					<li id="signin"><a href="#"><i class="fa fa-key"></i> Sign in</a></li>
					<li id="signup"><a href="#"><i class="fa fa-user"></i> Sign up</a></li>
				
				<?php endif; ?>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>
	<main>
