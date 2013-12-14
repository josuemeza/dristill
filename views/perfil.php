<?php 
	$root = '../';
	$titulo = 'Dristill - Perfil';
	$nav_elements = NULL;
	$nav_active = "perfil";
	/*session_start();
	if (!$_SESSION['loguser']) echo '<script type="text/javascript">window.location="'. $root . 'views/perfil.php"</script>';
	else*/ $nav_elements = array("inicio", /*"registro",*/ "perfil", "logout");
	include($root.'app/events.php');
	include($root.'assets/html/header.php');
?>

<div class="container no-slider" id="casilla">
	<form id="nuevo-evento" method="post" action="# ">
		<p>Nombre</p>
		<textarea id="nombre_evento" maxlenght="10" onBlur="limita(10)" ></textarea></br></br>

		<p>Dirección</p>
		<textarea id="direccion" maxlenght="100"></textarea></br></br>

		<p>Ciudad</p>
		<select id="ciudad" name="ciudad">
			<option value="1" selected>Santiago</option>
			<option value="2" >Arica</option>
			<option value="3" >Antofagasta</option>
			<option value="4" >Concepción</option>
			<option value="5" >Valparaíso</option>
		</select></br></br>

		<p>Fecha del evento</p>
		<input type="text" placeholder="año">
		<input type="text" placeholder="mes">
		<input type="text" placeholder="dia"></br></br>

		<p>Rubro</p>
		<select id="rubro" name="oprubro">
			<option value="1" selected>Fiesta</option>
			<option value="2">Paseo</option>
			<option value="3">Otro</option>
		</select></br></br>
		<button>Guardar evento</button>
	</form>
</div>


<?php include($root.'assets/html/footer.php');?>