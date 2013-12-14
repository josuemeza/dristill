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

<script type="text/javascript" src="<?php echo $root;?>scripts/perfil.js"></script>

<div class="container no-slider" id="casilla">
	<div class="row">
		<h1 class="col-md-6 col-md-offset-3">Crear Evento</h1>
		<div class="col-md-6 col-md-offset-3">
			<form id="nuevo-evento" class="form-horizontal" method="post" action="# ">
				<div class="form-group">
					<label class="col-md-3 control-label">Nombre</label>
					<div class="col-md-9">
						<input id="nombre_evento" type="text" class="form-control" maxlenght="100" onBlur="limita(10)"/>
					</div>
					<span class="error col-md-9 col-md-offset-3"></span>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">Dirección</label>
					<div class="col-md-9">
						<input id="direccion" type="text" class="form-control" maxlenght="100" onBlur="limita(10)"/>
					</div>
					<span class="error col-md-9 col-md-offset-3"></span>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">Ciudad</label>
					<div class="col-md-9">
						<select id="ciudad" class="form-control" name="ciudad">
							<option value="1" selected>Santiago</option>
							<option value="2" >Arica</option>
							<option value="3" >Antofagasta</option>
							<option value="4" >Concepción</option>
							<option value="5" >Valparaíso</option>
						</select>
					</div>
					<span class="error col-md-9 col-md-offset-3"></span>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">Rubro</label>
					<div class="col-md-9">
						<select id="rubro" class="form-control" name="oprubro">
							<option value="1" selected>Fiesta</option>
							<option value="2">Paseo</option>
							<option value="3">Otro</option>
						</select>
					</div>
					<span class="error col-md-9 col-md-offset-3"></span>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">Fecha del evento</label>
					<div class="col-md-9">
						<div id="date" class="input-group">
							<input type="text" placeholder="AAAA-MM-DD" class="form-control" readonly/>
							<span class="input-group-btn">
								<button id="datepicker" class="btn btn-default" type="button" data-date-format="yyyy-mm-dd" data-date="">
									<span class="glyphicon glyphicon-calendar"></span>
								</button>
							</span>
						</div>
					</div>
					<span class="error col-md-9 col-md-offset-3"></span>
				</div>
				<div class="text-right">
					<button class="btn btn-primary">Guardar</button>
				</div>
			</form>
		</div>
	</div>
</div>


<?php include($root.'assets/html/footer.php');?>