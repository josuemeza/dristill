<?php 
	$root = '../';
	$titulo = 'Dristill - Registro';
	$nav_elements = NULL;
	$nav_active = "perfil";
	session_start();
	if(!$_SESSION['loguser']) echo '<script type="text/javascript">window.location="'. $root . 'views/login.php"</script>';
	else $nav_elements = array("inicio", "perfil", "logout");
	include($root.'assets/html/header.php');
?>

<section class="container no-slider">
	<article id="registrado" class="row">
		<h2 class="col-md-6 col-md-offset-3 text-center">Error al ingresar el evento</h2>
		<div class="col-md-6 col-md-offset-3 text-center">
			<a href="perfil.php" class="btn btn-primary">Regresar</a>
		</div>
	</article>
</section>

<?php include($root.'assets/html/footer.php');?>