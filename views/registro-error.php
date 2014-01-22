<?php 
	$root = '../';
	$titulo = 'Dristill - Registro';
	$nav_elements = NULL;
	$nav_active = "registro";
	if (!$_SESSION['loguser']) $nav_elements = array("inicio", "registro", "login");
	else $nav_elements = array("inicio", "perfil", "logout");
	include($root.'assets/html/header.php');
?>

<section class="container no-slider">
	<article id="registrado" class="row">
		<h2 class="col-md-6 col-md-offset-3 text-center">No se pudo completar el registro</h2>
		<div class="col-md-6 col-md-offset-3 text-center">
			<a href="registro.php" class="btn btn-primary">Regresar</a>
		</div>
	</article>
</section>

<?php include($root.'assets/html/footer.php');?>