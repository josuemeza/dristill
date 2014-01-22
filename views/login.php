<?php
	$root = '../';
	$titulo = 'Dristill - Log in';
	session_start();
	$nav_active = "login";
	if($_SESSION['loguser']) echo '<script type="text/javascript">window.location="'. $root . 'views/perfil.php"</script>';
	$nav_elements = array("inicio", "registro", "login");
	include($root.'assets/html/header.php');
?>
<section class="container no-slider">
	<article class="row">
		<h2 class="col-md-4 col-md-offset-4">Inicio de sesión</h2>
		<div class="col-md-4 col-md-offset-4">
			<form class="form-signin" role="form" action="<?php echo $root;?>controller/UserController.php" method="POST">
				<input name="mail" type="text" class="form-control" placeholder="correo"/>
				<input name="password" type="password" class="form-control" placeholder="contraseña"/>
				<label for="recordarme" class="checkbox">
					<input id="recordarme" name="recordarme" type="checkbox" value="remember-me"> Recordar esta cuenta
				</label>
				<div class="text-right">
					<input name="action" value="login" type="hidden" />
					<button class="btn btn-default btn-lg" type="button">Regístrate</button>
					<button class="btn btn-primary btn-lg" type="submit">Entrar</button>
				</div>
			</form>
		</div>
	</article>
</section>

<?php include($root.'assets/html/footer.php');?>