<!DOCTYPE html>
<html>
<head>
	<noscript>confirm('Please enable javascript and come back website!');</noscript>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo isset($data['title']) ?: 'E-commerce'; ?></title>
	<meta content="<?php echo App::APP_URL; ?>" property="og:url">
	<meta content="website" property="og:type">
	<meta content="https://web.facebook.com/thoai.nguyn" property="fb:admins">
	<meta content="<?php echo 'public/upload/icon.png'; ?>" property="og:image">
	<meta content="E-commerce" property="og:title">
	<meta content="Website supplied the products for book, information technology book, programming application book" property="og:description">
	<meta content="en" property="og:locale">
	<link rel="shortcut icon" href="<?php echo App::APP_URL . '/public/upload/icon.png'; ?>">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="https://use.fontawesome.com/4cb785ad0e.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo App::APP_URL . '/public/assets/css/style.css'; ?>">

	<?php if (isset($data['css'])) : ?>
		<script src="<?php echo App::APP_URL . '/public/css/' . $data['css']; ?>"></script>
	<?php endif; ?>

	<?php if (isset($data['javascript-in-head'])) : ?>
		<script src="<?php echo App::APP_URL . '/public/js/' . $data['javascript-in-head']; ?>"></script>
	<?php endif; ?>
</head>
<body>
	<nav id="top" class="navbar navbar-default" role="navigation">
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
					<a href="/cart/" title="Your cart" data-toggle="tooltip" data-placement="bottom">
						<i class="fa fa-cart-plus fa-2x"></i> 
						<span class="badge items <?php echo isset($_SESSION['items']) ? 'cart-has-item' : 'empty-cart'; ?>">
						<?php echo isset($_SESSION['items']) ? $_SESSION['items'] : 0; ?></span>
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
	<main class="page-header">

<?php if (isset($data)) extract($data); ?>
