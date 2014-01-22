<?php 
	$root = '../';
	$titulo = 'Dristill - Perfil';
	$nav_elements = NULL;
	$nav_active = "perfil";
	session_start();
	if (!$_SESSION['loguser']) echo '<script type="text/javascript">window.location="'. $root . 'views/login.php"</script>';
	else $nav_elements = array("inicio", "perfil", "logout");
	include($root.'controller/events.php');
	include($root.'assets/html/header.php');
?>

<!-- Script -->
<script type="text/javascript" src="<?php echo $root;?>scripts/perfil.js"></script>

<div id="error-alert" class="alert alert-danger top" style="display: none;">
	<strong>Campos erroneos: </strong>
	<span></span>
</div>
<section class="container no-slider" id="casilla">
	<article class="row">
		<div class="col-md-10 col-md-offset-1">	
			<ul id="inner-nav" class="nav nav-pills">
				<li class="active"><a data-view="mis_datos" href="#">Mis datos</a></li>
				<li><a data-view="crear_evento" href="#">Crear evento</a></li>
				<li><a data-view="lista_eventos" href="#">Lista de eventos</a></li>
			</ul>
		</div>
	</article>
	<article id="mis_datos" class="row">
		<div class="col-md-10 col-md-offset-1">
			<h2 class="col-md-12">Mis datos</h2>
			<div class="col-md-2 col-md-offset-1" style="text-align: center">
				<img src="<?php echo $root;?>assets/img/user.png" width="180" class="img-circle"/>
			</div>
			<div class="col-md-8">
				<form id="form-editar" class="form-horizontal" role="form" method="post" action="<?php echo $root.'controller/';?>UserController.php" enctype="multipart/form-data">
					<div class="form-group">
						<label for="run_input" class="col-md-3 control-label">RUN</label>
						<div class="col-md-9">
							<input id="run_input" name="run_input" data-label="RUN" type="text" value="<?php echo $_SESSION['loguser']['rut'];?>" class="form-control"/>
						</div>
					</div>
					<div class="form-group">
						<label for="correo" class="col-md-3 control-label">Correo</label>
						<div class="col-md-9">
							<input id="correo" name="correo" data-label="Correo" type="text" value="<?php echo $_SESSION['loguser']['mail'];?>" class="form-control"/>
							<span id="correo-loader">
								<img src="<?php echo $root;?>assets/img/loader.gif" style="display: none;"/>
								<span></span>
							</span>
						</div>
					</div>
					<div class="form-group">
						<label for="password" class="col-md-3 control-label">Contraseña</label>
						<div class="col-md-9">
							<input id="password" name="password" data-label="Contraseña" type="password" value="password" class="form-control"/>
						</div>
					</div>
					<div class="form-group confirmacion" style="display: none;">
						<label for="confirmacion" class="col-md-3 control-label">Confirme</label>
						<div class="col-md-9">
							<input id="confirmacion" name="confirmacion" data-label="Confirmación" type="password" placeholder="confirmación de contraseña" class="form-control"/>
						</div>
					</div>
					<div class="text-right">
						<div>
							<button id="editar_datos" class="btn btn-default" type="button">Editar</button>
						</div>
						<div class="buttons" style="display: none;">
							<input name="correo-actual" type="hidden" value="<?php echo $_SESSION['loguser']['mail'];?>" />
							<input name="action" value="editar" type="hidden" />
							<button id="clean" class="clean btn btn-default" type="reset">Limpiar</button>
							<button class="submit btn btn-primary" type="submit">Guardar</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</article>
	<article id="crear_evento" class="row" style="display: none;">
		<div class="col-md-6 col-md-offset-3">
			<h2 class="col-md-12">Crear Evento</h2>
			<form id="nuevo-evento" class="form-horizontal" method="post" action="<?php echo $root;?>index.php">
				<div class="form-group">
					<label for="rubro" class="col-md-3 control-label">Rubro</label>
					<div class="col-md-9">
						<select id="rubro" name="rubro" data-label="Rubro" class="form-control">
							<option value="1" selected>Fiesta</option>
							<option value="2">Paseo</option>
							<option value="3">Otros</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="nombre" class="col-md-3 control-label">Nombre</label>
					<div class="col-md-9">
						<input id="nombre" name="nombre" data-label="Nombre" type="text" class="form-control"/>
					</div>
				</div>
				<div class="form-group">
					<label for="direccion" class="col-md-3 control-label">Dirección</label>
					<div class="col-md-9">
						<input id="direccion" name="direccion" data-label="Dirección" type="text" class="form-control"/>
					</div>
				</div>
				<div class="form-group">
					<label for="ciudad" class="col-md-3 control-label">Ciudad</label>
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
					<label for="fecha" class="col-md-3 control-label">Fecha del evento</label>
					<div class="col-md-9">
						<div id="date" class="input-group">
							<input id="date-label" name="date-label" data-label="Fecha" type="text" placeholder="AAAA-MM-DD" class="form-control" readonly/>
							<span class="input-group-btn">
								<button id="datepicker" class="btn btn-default" type="button" data-date-format="yyyy-mm-dd" data-date="">
									<span class="glyphicon glyphicon-calendar"></span>
								</button>
							</span>
						</div>
						<input id="fecha" name="fecha" data-label="Fecha" type="hidden" placeholder="AAAA-MM-DD"/>
					</div>
				</div>
				<div class="form-group">
					<label for="file_data" class="col-md-3 control-label">Imagen</label>
					<div class="col-md-9">
						<div class="input-group">
							<input id="file-label" type="text" class="form-control" readonly/>
							<span class="input-group-btn">
								<button id="file-select" class="btn btn-default" type="button">
									<span class="glyphicon glyphicon-picture"></span>
								</button>
							</span>
						</div>
						<input id="file_data" name="file_data" data-label="Archivo" class="form-control" type="file" style="display: none;"/>
					</div>
				</div>
				<div class="text-right">
					<button class="clean btn btn-default" type="reset">Limpiar</button>
					<button class="submit btn btn-primary" type="submit">Guardar</button>
				</div>
			</form>
		</div>
	</article>
	<article id="lista_eventos" class="row" style="display: none;">
		<div class="col-md-10 col-md-offset-1">
			<h2>Mis eventos</h2>
			<table id="my-events" class="table table-striped table-hover" summary="Tabla historial de eventos">
				<thead>
					<tr>
						<th class="table-col-1">Fecha</th>
						<th class="table-col-2">Nombre</th>
						<th class="table-col-3">Dirección</th>
						<th class="table-col-4">Ciudad</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($history_events as $e) {?>
						<tr>
							<td>
								<?php echo $e->getFecha();?>
							</td>
							<td>
								<a href="#">
									<?php echo $e->getTitulo();?>
								</a>
							</td>
							<td>
								<?php echo $e->getDireccion();?>
							</td>
							<td>
								<?php echo $e->getCiudad();?>
							</td>
						</tr>
					<?php }?>
				</tbody>
			</table>
		</div>
	</article>
</section>


<?php include($root.'assets/html/footer.php');?>