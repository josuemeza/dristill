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

<!-- Script -->
<script type="text/javascript" src="<?php echo $root;?>scripts/perfil.js"></script>

<div id="error-alert" class="alert alert-danger top" style="display: none;">
	<strong>Campos erroneos: </strong>
	<span></span>
</div>
<div class="container no-slider" id="casilla">
	<div class="row">
		<h1 class="col-md-6 col-md-offset-3">Crear Evento</h1>
		<div class="col-md-6 col-md-offset-3">
			<form id="nuevo-evento" class="form-horizontal" method="post" action="# ">
				<div class="form-group">
					<label class="col-md-3 control-label">Rubro</label>
					<div class="col-md-9">
						<select id="rubro" name="rubro" data-label="Rubro" class="form-control">
							<option value="1" selected>Fiesta</option>
							<option value="2">Paseo</option>
							<option value="3">Otros</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">Nombre</label>
					<div class="col-md-9">
						<input id="nombre" name="nombre" data-label="Nombre" type="text" class="form-control"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">Dirección</label>
					<div class="col-md-9">
						<input id="direccion" name="direccion" data-label="Dirección" type="text" class="form-control"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">Ciudad</label>
					<div class="col-md-9">
						<select id="ciudad" name="ciudad" data-label="Ciudad" class="form-control">
							<option value="1" selected>Santiago</option>
							<option value="2" >Arica</option>
							<option value="3" >Antofagasta</option>
							<option value="4" >Concepción</option>
							<option value="5" >Valparaíso</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">Fecha del evento</label>
					<div class="col-md-9">
						<div id="date" class="input-group">
							<input id="fecha" name="fecha" data-label="fecha" type="text" placeholder="AAAA-MM-DD" class="form-control" readonly/>
							<span class="input-group-btn">
								<button id="datepicker" class="btn btn-default" type="button" data-date-format="yyyy-mm-dd" data-date="">
									<span class="glyphicon glyphicon-calendar"></span>
								</button>
							</span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">Imagen</label>
					<div class="col-md-9">
						<input id="file-data" name="file-data" class="form-control" type="file" style="display: none;"/>
						<div class="input-group">
							<input id="file-label" type="text" class="form-control" readonly/>
							<span class="input-group-btn">
								<button id="file-select" class="btn btn-default" type="button">
									<span class="glyphicon glyphicon-picture"></span>
								</button>
							</span>
						</div>
					</div>
				</div>
				<div class="text-right">
					<button id="clean" class="btn btn-default" type="reset">Limpiar</button>
					<button id="submit" class="btn btn-primary" type="submit">Guardar</button>
				</div>
			</form>
		</div>
	</div>
</div>


<?php include($root.'assets/html/footer.php');?>