<?php include($root.'app/nav.php');?>

<!DOCTYPE html>
<html lang="es">
<head>
	<!-- Meta data -->
	<meta charset="UTF-8"/>
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo $root;?>assets/css/animate.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $root;?>assets/css/liquid-slider.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $root;?>assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $root;?>assets/css/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $root;?>assets/css/style.css">
	<link rel="icon" type="image/png" href="<?php echo $root;?>assets/img/favicon.png" />
	<!-- Scripts -->
	<script type="text/javascript" src="<?php echo $root;?>scripts/jquery-1.9.0.js"></script>
	<script type="text/javascript" src="<?php echo $root;?>scripts/easing.js"></script>
	<script type="text/javascript" src="<?php echo $root;?>scripts/touchSwipe.js"></script>
	<script type="text/javascript" src="<?php echo $root;?>scripts/liquid-slider.js"></script>
	<script type="text/javascript" src="<?php echo $root;?>scripts/bootstrap.js"></script>
	<title>
		<?php echo $titulo;?>
	</title>
</head>
<body>
	<nav class="navbar navbar-default" role="navigation">
		<div class="navbar-header">
			<a class="navbar-brand" href="<?php echo $root.'views/index.php'?>">Dristill</a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<?php foreach($nav_elements as $ne){?>
					<li <?php echo $nav_active==$ne ? 'class="active"' : '';?>>
						<a href="<?php echo $navbar[$ne]["url"];?>">
							<?php echo $navbar[$ne]["titulo"];?>
						</a>
					</li>
				<?php }?>
			</ul>
			<form class="navbar-form navbar-right" role="search">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Buscar">
				</div>
				<button type="submit" class="btn btn-default">Buscar</button>
			</form>
		</div>
	</nav>
	<div class="container">