<?php
	$root = '../';
	$titulo = 'Dristill - Log in';
	session_start();
	if($_SESSION['loguser']) echo '<script type="text/javascript">window.location="'. $root . 'views/perfil.php"</script>';
	$nav_elements = array("inicio", "registro", "login");
	$nav_active = "login";
	include($root.'assets/html/header.php');
?>

<div class="row">
	<h2 class="col-md-4 col-md-offset-4">Inicio de sesión</h2>
	<div class="col-md-4 col-md-offset-4">
		<form class="form-signin" role="form">
			<input type="text" class="form-control" placeholder="nombre de usuario" autofocus>
			<input type="password" class="form-control" placeholder="contraseña">
			<label class="checkbox">
				<input type="checkbox" value="remember-me"> Recordar esta cuenta
			</label>
			<div class="text-right">
				<button class="btn btn-default" type="button">Regístrate</button>
				<button class="btn btn-primary" type="submit">Entrar</button>
			</div>
		</form>
	</div>
</div>

<?php include($root.'assets/html/footer.php');?>