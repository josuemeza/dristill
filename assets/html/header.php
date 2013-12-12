<?php include($root.'app/nav.php');?>

<!DOCTYPE html>
<html lang="es">
<head>
	<!-- Meta data -->
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo $root;?>assets/css/bootstrap.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo $root;?>assets/css/bootstrap-theme.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo $root;?>assets/css/carousel.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo $root;?>assets/css/style.css"/>
	<link rel="icon" type="image/png" href="<?php echo $root;?>assets/img/favicon.png"/>
	<!-- Casos especiales de IE -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
	<!-- Scripts -->
	<script type="text/javascript" src="<?php echo $root;?>scripts/jquery-1.9.0.js"></script>
	<script type="text/javascript" src="<?php echo $root;?>scripts/jquery.Rut.js"></script>
	<script type="text/javascript" src="<?php echo $root;?>scripts/jquery.validate.js"></script>
	<script type="text/javascript" src="<?php echo $root;?>scripts/bootstrap.js"></script>
	<script type="text/javascript" src="<?php echo $root;?>scripts/holder.js"></script>
	<title>
		<?php echo $titulo;?>
	</title>
</head>
<body>
	<div class="navbar-wrapper">
		<div class="container">
			<div class="navbar navbar-inverse navbar-static-top" role="navigation">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Boton de navegación</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="<?php echo $root.'views/index.php'?>">Dristill</a>
					</div>
					<div class="navbar-collapse collapse">
						<ul class="nav navbar-nav">
							<?php foreach($nav_elements as $ne){?>
								<li <?php echo $nav_active==$ne ? 'class="active"' : '';?>>
									<a href="<?php echo $navbar[$ne]["url"];?>">
										<?php echo $navbar[$ne]["titulo"];?>
									</a>
								</li>
							<?php }?>
						</ul>
					</div>
				</div>
			</div>
		</div>
    </div>