<?php 
	$root = '../';
	$titulo = 'Dristill - Registro';
	$nav_elements = NULL;
	$nav_active = "registro"; // Si es nuevo hay que agregarlo
	$nav_elements = array("inicio", "perfil", "registro", "login");
	include($root.'assets/html/header.php');
?>

<section class="container no-slider">
	<article id="registrado" class="row">
		<h2 class="col-md-6 col-md-offset-3 text-center">Registro realizado con éxito</h2>
		<div class="col-md-6 col-md-offset-3 text-center">
			<a href="index.php" class="btn btn-primary">Regresar</a>
		</div>
	</article>
</section>

<?php include($root.'assets/html/footer.php');?>