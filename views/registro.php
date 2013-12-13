<?php 
	$titulo = 'Dristill - Registro';
	$root = '../';
	$nav_elements = array("inicio", "registro", "login");
	$nav_active = "registro";
	include($root.'assets/html/header.php');
?>

<div class="container no-slider">
	<div id="registro" class="row">
		<h1 class="col-md-4 col-md-offset-4">Registro</h1>
		<div class="col-md-4 col-md-offset-4">
			<form class="form-horizontal" role="form" method="post" action="felicitaciones.html" enctype="multipart/form-data">
				<div class="form-group">
					<label class="col-md-3 control-label">Correo</label>
					<div class="col-md-9">
						<input type="text" placeholder="correo@correo.correo" class="form-control"/>
					</div>
					<div class="col-md-9 col-md-offset-3">
						<span class="error"></span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">Usuario</label>
					<div class="col-md-9">
						<input type="text" placeholder="nombre de usuario" class="form-control"/>
					</div>
					<div class="col-md-9 col-md-offset-3">
						<span class="error"></span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">Contraseña</label>
					<div class="col-md-9">
						<input type="password" placeholder="contraseña" class="form-control"/>
					</div>
					<div class="col-md-9 col-md-offset-3">
						<span class="error"></span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">Confirme</label>
					<div class="col-md-9">
						<input type="text" placeholder="confirmación de contraseña" class="form-control"/>
					</div>
					<div class="col-md-9 col-md-offset-3">
						<span class="error"></span>
					</div>
				</div>
				<div class="text-right">
					<button class="btn btn-default btn-lg" type="button">Regístrate</button>
					<button class="btn btn-primary btn-lg" type="submit">Entrar</button>
				</div>
			</form>
		</div>
	</div>

	<div id="registrado" class="row" style="display: none;">
		<h2 class="col-md-6 col-md-offset-3 text-center">Registro realizado con éxito</h2>
		<div class="col-md-6 col-md-offset-3 text-center">
			<button type="button" class="btn btn-primary">Regresar</button>
		</div>
	</div>
</div>

<?php include($root.'assets/html/footer.php');?>