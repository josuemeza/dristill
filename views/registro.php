<?php 
	$titulo = 'Dristill - Registro';
	$root = '../';
	$nav_active = "registro";
	if (!$_SESSION['loguser']) $nav_elements = array("inicio", "registro", "login");
	else $nav_elements = array("inicio", "perfil", "logout");
	include($root.'assets/html/header.php');
?>

<!-- Script -->
<script type="text/javascript" src="<?php echo $root;?>scripts/registro.js"></script>

<div id="error-alert" class="alert alert-danger top" style="display: none;">
	<strong>Campos erroneos: </strong>
	<span></span>
</div>
<section class="container no-slider">
	<article id="registro" class="row">
		<h1 class="col-md-4 col-md-offset-4">Registro</h1>
		<div class="col-md-4 col-md-offset-4">
			<form id="form-registro" class="form-horizontal" role="form" method="post" action="<?php echo $root.'controller/';?>UserController.php" enctype="multipart/form-data">
				<div class="form-group">
					<label for="run_input" class="col-md-3 control-label">RUN</label>
					<div class="col-md-9">
						<input id="run_input" name="run_input" data-label="RUN" type="text" placeholder="12.345.678-9" class="form-control"/>
					</div>
				</div>
				<div class="form-group">
					<label for="correo" class="col-md-3 control-label">Correo</label>
					<div class="col-md-9">
						<input id="correo" name="correo" data-label="Correo" type="text" placeholder="correo@correo.correo" class="form-control"/>
						<span id="correo-loader">
							<img src="<?php echo $root;?>assets/img/loader.gif" style="display: none;"/>
							<span></span>
						</span>
					</div>
				</div>
				<div class="form-group">
					<label for="password" class="col-md-3 control-label">Contraseña</label>
					<div class="col-md-9">
						<input id="password" name="password" data-label="Contraseña" type="password" placeholder="contraseña" class="form-control"/>
					</div>
				</div>
				<div class="form-group">
					<label for="confirmacion" class="col-md-3 control-label">Confirme</label>
					<div class="col-md-9">
						<input id="confirmacion" name="confirmacion" data-label="Confirmación" type="password" placeholder="confirmación de contraseña" class="form-control"/>
					</div>
				</div>
				<div class="text-right">
					<input name="action" value="registro" type="hidden" />
					<button id="clean" class="btn btn-default btn-lg" type="reset">Limpiar</button>
					<button id="submit" class="btn btn-primary btn-lg" type="submit">Registrar</button>
				</div>
			</form>
		</div>
	</article>
</section>

<?php include($root.'assets/html/footer.php');?>